<?php
setcookie("username2", "Barney rubble", time()+3600);
echo "another cookie has been set in your browser.";
?>
<a href="viewcookie.php">Click here to view the cookie</a><br/><br/>
Here is the code the produces this page<br>
<?php highlight_string('setcookie("username2", "Barney rubble", time()+3600);'); ?>
