<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
include "partials/menu.php";
include "library/db.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <title>Added a pet</title>
    </head>
    <body>

    <?php
    $conn = connect();
    #adds a connection
    $query = "INSERT INTO tblpets (name, age, type) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST['name'], $_POST['age'], $_POST['type']);
    $stmt->execute();
    

    echo "You have successfully added ". $_POST['name'] . " successfully."
    ?>
    </body>
</html>