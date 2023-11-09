<?php

include "library/db.php";

$conn = connect();

$query = "DELETE FROM tblpets WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i",$_GET["id"]);
$stmt->execute();

header('Location: http://localhost/php-practise/php-practise/db-editing/display-all-pets.php?msg=delete-success');