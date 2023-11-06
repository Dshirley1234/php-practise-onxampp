<html>
    <title>database connection</title>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpmyadmin";
//sets the username server name and password

try {  
    $conn = new mysqli($servername, $username, $password, "phpmyadmin");
}
 catch (Exception $ex) {
    header("Location: error.html");
}
//if the code can't connect to the database it will redirect the user to an error page

echo 'You have connected successfully!';
?>