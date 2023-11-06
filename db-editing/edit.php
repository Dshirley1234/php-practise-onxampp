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
<style>

    table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
    }

    table th {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    table th,
    table td{
        padding:12px 15px;
    }

    table tr{
        border-bottom:1px solid #dddddd;
    }

    table tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    </style>
</head>

<body>

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
        <input type="text" name="name" value="<?= $pet["type"] ?>">
    </p>
    <p>
        <input type="submit" value="Update">
    </p>
    <input type="hidden" name="id" value="<?= $pet["id"]?>">
</form>
</body>
</html>

<?php
    //
    $result->free_result();
    $conn->close();
    //
?>