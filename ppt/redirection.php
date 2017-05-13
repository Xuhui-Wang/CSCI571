<?php if($_POST["submit"]): ?>
<?php header("Location: $_POST[url]"); ?>
<?php else: ?>
<html><head><title>Test Redirection</title></head>
<body>
<h2>Test Redirection</h2>
<form method="post" action="">
<select name="url">
<option selected=selected value="">Select a Site</option>
<option value="http://www.usc.edu">USC</option>
<option value="http://www-scf.usc.edu/~csci571/index.html">Class Home Page</option>
<option value="http://www.yahoo.com">Yahoo!</option>
</select> <input type="submit" value="Go" name="submit">
</form></body></html>
<?php endif; ?>
