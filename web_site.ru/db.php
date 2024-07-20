<?php
class MySQL {
    public $conn;
    private $conf_path;
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    protected $conf;

    public function __construct($path) {
        $this->conf_path = $path;
        $this->initConnect();
    }

    protected function initConnect() {
        if (file_exists($this->conf_path)){
            $this->conf = parse_ini_file($this->conf_path);
            $this->host = $this->conf['hostname'];
            $this->username = $this->conf['username'];
            $this->password = $this->conf['password'];
            $this->database = $this->conf['db'];
            
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
      
        } else {
           echo "File not exist";
        }
    }

    public function escape($value) {
        return $this->conn->real_escape_string($value);
    }

    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);

        if ($params) {
            $types = str_repeat('s', count($params));
            $params = array_map([$this, 'escape'], $params);
            $stmt->bind_param($types, ...$params);
        }

        $success = $stmt->execute();

        // Для INSERT возвращаем ID новой записи и успешность выполнения
        if (stripos($sql, 'INSERT') === 0) {
            return [
                'success' => $success,
                'insert_id' => $success ? $this->conn->insert_id : null
            ];
        }

        if (stripos($sql, 'UPDATE') === 0 || stripos($sql, 'DELETE') === 0) {
            return [
                'success' => $success,
                'affected_rows' => $success ? $stmt->affected_rows : null
            ];
        }

        // Для SELECT возвращаем результирующий набор данных
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }

    public function scalar($sql, $params = []) {
        $result = $this->query($sql, $params);
        
        // Если $result не является массивом, возвращаем его как есть
        if (!is_array($result)) {
            return $result;
        }
        
        // Если массив пустой, возвращаем null
        if (empty($result)) {
            return null;
        }
        
        // Возвращаем первое скалярное значение первой строки
        return reset($result[0]);
    }

    public function __destruct() {
        $this->conn->close();
    }
}

$db = new MySQL("dbconf.ini");
?>