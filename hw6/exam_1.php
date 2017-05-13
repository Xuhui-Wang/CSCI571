<?php
//show all the errors;
error_reporting(E_ALL);

$arr = array('fruit' => 'apple', 'veggie' => 'carrot');

//
print $arr['fruit'];
print $arr['veggie'];
echo '<br>';

define('fruit', 'veggie');
print $arr['fruit'];
print $arr[fruit];
echo '<br>';

print "Hello $arr[fruit]";
echo '<br>';

print "Hello {$arr[fruit]}";
print "Hello {$arr['fruit']}";
echo '<br>';

//print "Hello $_GET['foo']";
print "Hello".$arr['fruit'];

?>