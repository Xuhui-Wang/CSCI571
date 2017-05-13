<!doctype html>
<head><title>Show $_SERVER, $_POST, $_GET Variables</title></head>
<body>

<?php  

    function print_tabs($tabs) {  
        for($i = 0; $i < $tabs; $i++) {  
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
        } 
    } 

    function print_array($arr, $tabs = 0) { 
        if(!empty($arr)) {  
            foreach($arr as $k=> $v) { 
                print_tabs($tabs); 
                echo $k . ":" . $v . "<br/>"; 
                if(is_array($v)) { 
                    print_array($v, $tabs+1); 
                } 
            } 
        } else {  
            echo "empty"; 
        } 
    } 
?> 


<table> 
    <tr><th width="33%">$_SERVER</th><th width="34%">$_POST</th><th width="33%">$_GET</th></tr> 
    <tr> 
<td valign="top"> 
<?php print_array($_SERVER); ?> 
</td> 
<td valign="top"> 
<?php print_array($_POST); ?> 
</td> 
<td valign="top"> 
<?php print_array($_GET); ?> 
</td> 
    </tr> 
</table> 
    
    <ul>
	<li>$_SERVER array is initialized by the server, and contains special parameters such as headers, server version.</li>
	<li>The $_POST array is set when a form of method=POST has an action to this page and is submitted.
		<ul>
		<li>
<a href="?fname=Hello&lname=World">A form with method = POST</a>
			<div>
			<form method="POST" action="">
			<p>
			<label for="fname">First Name</label>
			<input type="text" value="" name="fname"></p>
			<p>
			<label for="lname">Last Name</label>
			<input type="text" value="" name="lname"></p>
				<p>
		<input type="submit" value="Submit" name="submit"></p>
			</form></div></li></ul>
        
        </body>
    </html>