<?php

function connect(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername , $username , $password, "pets");
    //connects to database
    if($conn->connect_error) {
        die("connection failed"  . $conn->connection_error);
    }
    //if connection failed send error
    return $conn;
}

function find_pet($search , $conn) {
    $query = "SELECT * FROM tblpets WHERE name LIKE ?";
    //select everything from tblpets where the name is similar to 
    //the user input
    $stmt = $conn->prepare($query);

    $search = "%{$_POST['search']}%";

    $stmt->bind_param("s" , $search);
    $stmt->execute();
    return $stmt->get_result();
}
?>