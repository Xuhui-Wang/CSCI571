	<!– sample.php -->		
	<html><body>
	<strong>Hello World!</strong><br />
     	<?php 
         echo "<h2>Hello, World</h2>"; 
         echo $_SERVER['PHP_SELF'];
         
		?>
    	<?php
		$myvar = "Hello World";
		echo $myvar;
        define("a", true);
        echo "<h2>That one is : ", gettype(a), "</h2>"
		?>
        <?php
            $foo = 25;
            $bar = "Hello";
            $foo = ($foo * 7);
            $bar = ($bar * 7);
            echo "<p>", $bar, "/ \n  \\ &amp; &lt; &quot; &apos;  $foo", $bar, "</p>";
            echo '<p> // \\  \n &amp; &lt; &quot; &apos;$foo</p> ';
            echo '// \\  \n &amp; &lt; &quot; &apos; $foo';
        ?>
        <?php
            $a=15;
            $b=30;
            $total=$a+$b;
            Print $total;
            Print "<p><h1>$total</h1>";
            // total is 45
        ?> 

        <?php
        $heading="\"Computer Science\"";
        Print $heading;
        ?> 

        <?php
        $count=0;
        While($count<3)
        {
            Print "hello PHP. \n" ;
            $count += 1;
            // $count = $count + 1;
            // or
            // $count++;
        }
        ?> 


	</body></html>
