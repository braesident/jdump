<?php

function jdump($value)
{
	if(is_bool($value) || is_numeric($value)) die(var_dump($value));
  
	if (is_string($value)) {
	  try {
	    $d = json_decode($value);
	    if (is_null($d) && !is_null($value)) die(var_dump($value, json_last_error_msg()));
	    
	    if (ob_get_length()) {$d = ['buffer' => ob_get_contents(), 'value' => $d];}
	    ob_clean();
	    $j = json_encode($d, 512);
	    header('Content-Type: application/json');
	    die($j);
	  }
	  catch (Exception $e) {
	    die(var_dump($value));
	  }
	}
	header('Content-Type: application/json');
	if (ob_get_length()) {$value = ['buffer' => ob_get_contents(), 'value' => $value];}
	ob_clean();
	die(json_encode($value, 512));
}
