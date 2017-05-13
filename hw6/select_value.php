<?php
if(isset($_POST['submit'])){
if(!empty($_POST['Color'])) {
echo "<span>You have selected :</span><br/>";
// As output of $_POST['Color'] is an array we have to use Foreach Loop to display individual value
foreach ($_POST['Color'] as $select)
{
echo "<span><b>".$select."</b></span><br/>";
}
}
else { echo "<span>Please Select Atleast One Color.</span><br/>";}
}
?>