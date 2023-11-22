<DOCTYPE html>
<html>
<head>
    <?php
    include "partials/menu.php";
    include "library/db.php";
    ?>
    <title>Editted a pet</title>

<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    $conn = connect();

    $query = "UPDATE tblpets SET name=?, age=?, type=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt -> bind_param("ssss", $_POST['name'], $_POST['age'], $_POST['type'], $_POST['id']);
    $stmt->execute();

    header("Location: http://localhost/php-practise/php-practise/db-editing/edit.php?id={$_POST["id"]}&msg=success");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>