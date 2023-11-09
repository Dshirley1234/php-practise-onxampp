<?php
include "library/db.php";

$conn = connect();

$show_results=false;
$user_search_string = "";

if (isset($_POST['search'])) {
    $show_results = true;
    $result = find_pet($_POST['search'], $conn);
    $user_search_string = $_POST['search'];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>

    <body>
        <?php include "partials/menu.php"; ?>
        <h1>Search</h1>
        <form action="search.php" method="POST">
            <p>
                Enter the pets name:
                <input type="text" name="search" value="<?= $user_search_string ?>">
                <input type="submit" value="Find">
            </p>
        </form>
<?php if ($show_results): ?>

<?php include "partials/table.php"?>


<?php endif ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>