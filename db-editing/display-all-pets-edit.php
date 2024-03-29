<?php
include "library/db.php";

$conn = connect();
$sql = "SELECT * FROM tblpets";
$result = $conn->query($sql);


$file_name = basename($_SERVER['SCRIPT_FILENAME']);
if (isset($_POST['sortBy'])) {
    $show_results=true;
    if(($_POST['sortBy']) == "name") {
        $result = sort_by_name($conn);
    };
    if(($_POST['sortBy']) == "id") {
        $result = sort_by_id($conn);
    };
    if(($_POST['sortBy']) == "age") {
        $result = sort_by_age($conn);
    };
}

#provides the name of the current file for the autosort button to use
#also code fot when autosort is pressed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pets database</title>
    
</head>
<body>
    <?php
    include "partials/menu.php";
    ?>
<div class="container">
    <h1>Registered pets</h1>
<?php if(isset($_GET["msg"]) && $_GET["msg"]=="delete-success"): ?>
    <div class="success">
        Delete successful.
    </div>
<?php endif ?>
<br/>
<?php include "partials/table.php"?>


<br/>
<br/>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>