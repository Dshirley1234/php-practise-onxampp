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
};

function get_all_pets($conn) {
    $sql = "SELECT name FROM tblpets";
    $result = $conn->query($sql);
    return $result;

};

function sort_by_name($conn) {
    $query = "SELECT * FROM tblpets ORDER BY name ASC";
    $stmt = $conn->prepare($query);
    $stmt -> execute();
    return $stmt->get_result();
};



?>