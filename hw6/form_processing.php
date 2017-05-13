<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Form Processing</title>
	</head>
	<body>

		<pre>
		<?php
			print_r($_POST);
		?>
		</pre>
		<br />
		<?php
			// detect form submission
			if (isset($_POST['submit'])) {
				echo "form was submitted<br />";

				// set default values
				if (isset($_POST["username"])) {
					$username = $_POST["username"];
				} else {
					$username = "";
				}
				if (isset($_POST["pw"])) {
					$password = $_POST["pw"];
				} else {
					$password = "";
				}
				
				// set default values using ternary operator
				//   boolean_test ? value_if_true : value_if_false
				$username = isset($_POST['username']) ? $_POST['username'] : "";
				$password = isset($_POST['pw']) ? $_POST['pw'] : "";
				
			} else {
				$username = "";
				$password = "";
			}
		?>

		<?php
			echo "{$username}: {$password}";
		?>
		
	</body>
</html>
