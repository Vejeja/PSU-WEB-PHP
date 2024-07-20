<?php
session_start();

require_once "db.php";
include "paging.php";
function print_exec_res($res){
    $data = '<ul class="list-group">';
    foreach($res as $row){
        $data .= '<ul class="list-group list-group-horizontal">
        <li class="list-group-item flex-sm-fill">'. $row['name'] . '</li>
        <li class="list-group-item">'. $row['price'] . '</li>
        <li class="list-group-item"> <button type="button" class="btn btn-success btn-sm add">+</button> </li>
        </ul>';
    }
    $data .= '</ul>';
    return $data;
}
$limit_items = 3;
if (isset($_COOKIE['save_limit'])){
    $limit_items = $_COOKIE['limit_items'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['set_limit'])){
    $limit_items = $_POST['set_limit'];
    $status   = !empty($_POST['save_limit']) ? 1 : 0;
    setcookie("limit_items", $limit_items, time() + 3600);
    setcookie("save_limit", $status, time() + 3600);
    header("location: mainpage.php");
    exit();
} else if (!isset($_COOKIE['save_limit'])){
    $limit_items = 3;
    $status = 0;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>    
    </head>
    <body>
    <script>
        $(document).ready(function() {
            $('.add').click(function() {
                var item = (this).parentNode.parentNode;
                var item_name = item.childNodes[1].textContent;
                var request = $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    data: JSON.stringify({ ch_count_by_name: item_name }),
                    success: function(response){
                    },
                    error: function(e){
                        console.log(e.message);
                    }
                }).done(function(msg) {
                    item.childNodes[3].innerHTML=msg;
                });

            })
		});	
    </script>

        <div class="container">
            <div class="row">
                    <h1>Список предметов:</h1>
            </div>
            <div class="row"> <p style="padding-right:10px; padding-top:10px;">Выводить по: </p> 
            <form action="" method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                    <label class="mr-sm-2 sr-only" for="set_limit" >Выводить по</label>
                    <select class="custom-select mr-sm-2" id="set_limit" name="set_limit">
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                    </div>
                    <div class="col-auto my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="save_limit">
                        <label class="custom-control-label" name="save_limit" for="save_limit">Запомнить</label>
                    </div>
                    </div>
                    <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="row justify-content-left">
                <?php
                    $sqlCount = "SELECT COUNT(*) FROM items";
                    $fr_count = $db->scalar($sqlCount);
                    $sqlSelect = limit_query("SELECT * FROM items", $fr_count, $limit_items);
                    $res = $db->query($sqlSelect);
                    echo print_exec_res($res);
                ?>
            </div>
            <div class="row justify-content-left"> 
                <?php echo paginator_navbar($fr_count, $limit_items); ?>
            </div>
            <div class="row justify-content-center">
                <a href="index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Вернуться в меню</a>
            </div>
        </div>
    </body>
</html>