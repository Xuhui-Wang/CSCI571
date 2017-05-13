<HTML>
<HEAD><TITLE>Example of Encoding</TITLE></HEAD>
<BODY>
<?php if($_POST["submit"]): ?>
        Your text is: <?php echo $_POST["input"]; ?>, right?
<?php else: ?>
        <H1>Please enter some text</H1>
        <FORM ACTION=""  METHOD=POST>
        Enter text: <INPUT NAME=input><BR>
        <INPUT TYPE=submit name="submit">
        <INPUT TYPE=reset></form>
<?php endif; ?>
</BODY>
</HTML>
