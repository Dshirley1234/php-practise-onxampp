<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {  
        $conn = new mysqli($servername, $username, $password, "pets");
    }
     catch (Exception $ex) {
        header("Location: error.html");
    }

    $query = "INSERT INTO tblpets (name, age, type) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST['name'], $_POST['age'], $_POST['type']);
    $stmt->execute();

    echo "You have successfully added ". $_POST['name'] . " successfully."
    ?>
    </body>
</html>