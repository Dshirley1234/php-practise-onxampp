<!DOCTYPE html>
<html>
    <?php
include "partials/menu.php"
?>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <head>
        <title>Add a pet to the database</title>
    </head>

    <body>
        <br/>
        <form action="add-a-pet-action.php" method="post">
            <p>Enter Pet Name: <input type="text" name="name"/></p>
            <p>Enter Pet Age: <input type="text" name="age"/></p>
            <p><label for="type">Choose a car:</label>
                <select name="type" id="type">
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="fish">Fish</option>
                    <option value="rabbit">Rabbit</option>
                    <option value="bird">Bird</option>
                </select></p>

            <p> <input type="submit" value="Add Pet Details" /></p>
        </form>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>