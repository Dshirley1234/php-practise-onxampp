<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername , $username , $password, "pets");

if($conn->connect_error) {
    die("connection failed"  . $conn->connection_error);
}

$sql = "SELECT * FROM tblpets WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET["id"]);
$row = $stmt->execute();
$result = $stmt->get_result();
$pet = $result->fetch_assoc();

?>


<!DOCTYPE html>
<head>
<?php
include "partials/menu.php"
?>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
<div class="container">
    <h1>Edit <?= $pet['name'] ?></h1>
<form action="edit-action.php" method="POST">
    <p>
        name:
        <input type="text" name="name" value="<?= $pet["name"] ?>">
    </p>
    <p>
        Age:
        <input type="text" name="age" value="<?= $pet["age"] ?>">
    </p>
    <p>
        Type:
        <input type="text" name="type" value="<?= $pet["type"] ?>">
    </p>
    <p>
        <input type="submit" value="Update">
    </p>
    <input type="hidden" name="id" value="<?= $pet["id"]?>">
</form>


<?php if(isset($_GET["msg"]) && $_GET["msg"]=="success"): ?>
    <div class="success">
        Updated successful.
</div>
<?php endif ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

<?php
    //
    $result->free_result();
    $conn->close();
    //
?>