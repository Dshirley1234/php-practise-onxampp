<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "pets");

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM tblpets";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">

        <title>Display Pets Stored in th pets mysql table</title>
        <link type="text/css" href="style.css" rel="stylesheet" />
    <style>
        table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width:400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        table th {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        table th,
        table td {
            padding: 12px 15px;
        }

        table tr{
            border-bottom: 1px solid #dddddd;
        }
        table tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

    </style>
    
    </head>

    <body>
        <h1>Regestered Pets</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Type</th>
            </tr>
    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
        <tr>
            <td><?= $row["id"]   ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["age"]  ?></td>
            <td><?= $row["type"] ?></td>
        </tr>

<?php endwhile; ?>
    </table>                             
    </body>
</html>
