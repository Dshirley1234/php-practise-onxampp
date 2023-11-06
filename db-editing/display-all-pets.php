
<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername , $username , $password, "pets");

if($conn->connect_error) {
    die("connection failed"  . $conn->connection_error);
}

$sql ="SELECT * FROM tblpets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h1>Registered pets</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Type</th>
            <th>#</th>
        </tr>


<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["age"] ?></td>
        <td><?= $row["type"] ?></td>
        <td><a href="edit.php?id=<?= $row["id"]?>">edit</a></td>
    </tr>
<?php endwhile; ?>


</table>
</body>
</html>