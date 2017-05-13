<!DOCTYPE html>
<head>
<title>PHP Get Value of Select Option and Radio Button</title> <!-- Include CSS File Here-->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="main">
<h2>PHP Multiple Select Options and Radio Buttons</h2>
<form action="form_processing.php" method="post">
<!----- Select Option Fields Starts Here ----->
<label class="heading">To Select Multiple Options Press ctrl+left click :</label>
<select multiple name="Color[]">
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Blue">Blue</option>
<option value="Pink">Pink</option>
<option value="Yellow">Yellow</option>
<option value="White">White</option>
<option value="Black">Black</option>
<option value="Violet">Violet</option>
<option value="Limegreen">Limegreen</option>
<option value="Brown">Brown</option>
<option value="Orange">Orange</option>
</select>
<?php include'select_value.php'; ?>
<!---- Radio Button Starts Here ----->
<label class="heading">Radio Buttons :</label>
<input name="radio" type="radio" value="Radio 1">Radio 1
<input name="radio" type="radio" value="Radio 2">Radio 2
<input name="radio" type="radio" value="Radio 3">Radio 3
<input name="radio" type="radio" value="Radio 4">Radio 4
<?php include'radio_value.php'; ?>
<input name="submit" type="submit" value="Get Selected Values">
</form>
</div>
</div>
</body>
</html>