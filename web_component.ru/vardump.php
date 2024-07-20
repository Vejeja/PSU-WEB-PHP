<?php
  function func($arr, $lvl){
    if (is_array($arr)){
      echo "Array(" . count($arr) ."){<br>";
      foreach ($arr as $key => $value) {
        for ($i=0; $i <= $lvl; $i++)
          echo "\t";
        if (is_array($value)) {
          func($value, $lvl+1);
        } else {
          echo $key . " => ". $value . ",<br>";
          }
      }
      for ($i=0; $i <= $lvl; $i++)
        echo "\t";
      echo "}<br>";
    } else {
      echo $arr;
    }
  }
  
  function user_vd($arr) {
    echo "<pre>";
    func($arr, 0);
    echo "</pre>";
	}
  
  user_vd(array(
	'key1' => 'value1',
	'key2' => array(
		'key21' => 'value21',
		'key22' => 22,
		'key23' => array('value231', 232, 233.01, 'value234'),
		),
	'key3' => 'value3',
  ));
  
  user_vd(123);
  
  user_vd([1,[1,2,[1,2,[3]]]]);
?>