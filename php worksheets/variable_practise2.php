<!DOCTYPE html> 
<html> 
    <head> 
        <title>PHP Variables</title> 
    </head> 
    <body> 
        <?php 
        $firstName = 'Jeff';
        $lastName = 'Jones'; 
        $fullName = $firstName . ' ' . $lastName; 
        echo '<p>Hello, <strong>' . $fullName . '</strong> welcome back.<br />It is good to see you again.</p>'; 
        ?> 
    </body> 
</html>