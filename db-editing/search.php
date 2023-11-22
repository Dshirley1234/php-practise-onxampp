<?php
include "library/db.php";

$conn = connect();
#adds connection
$show_results=false;
$user_search_string = "";

if (isset($_POST['search'])) {
    $show_results = true;
    $result = find_pet($_POST['search'], $conn);
    $user_search_string = $_POST['search'];
#result of search
}




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

$all_pets = get_all_pets($conn);
$petsnames = array();
while ($row = $all_pets->fetch_array(MYSQLI_ASSOC)) {
    $petsnames[] = $row['name'];
}
$petsnames_json = json_encode($petsnames);

#gets pets and turns them into a json

?>

<style>
    .dropdown_c{
    background-color: #009879;
    color: white;
    border-style: solid;
    border-radius: 10px; 
}
</style>
<!--for some reason this css only works internally not externally-->


<!DOCTYPE html>
<html>
    <head>
    <?php include "partials/menu.php"; ?>
    </head>
    <body>
        <div class = "container">
        <h1>Search</h1>

        <form action="search.php" method="POST" class="form-floating">
            <p>
                <input type="text" id="search" class="form-control" name="search" value="<?= $user_search_string ?>"
                 onkeyup="autofill()" placeholder="Enter the pets name:">

                <input type="submit" value="Find">
                <!--user enters pet names here-->
                <div class="row">
                    <div class="col col-lg-2">
                    <div id="autofill" class="dropdown_c"></div>
                    </div>
                </div>
            </p>
                <script>
                    var petnames = <?= $petsnames_json?>;
                    function autofill() {
                        var current = document.getElementById("search").value;
                        console.log(current);
                        var autofillDiv = document.getElementById("autofill");
                        autofillDiv.innerHTML = "";
                        if (current !== "") {
                            var matches = petnames.filter(function(petname){
                                return petname.startsWith(current);
                            });
                            matches.forEach(function(match){
                                var p = document.createElement("p");
                                p.innerText = match;
                                p.onclick = function() {
                                    document.getElementById("search").value = match;
                                    autofillDiv.innerHTML = "";
                                    document.querySelector('form').submit();
                                
                                };
                                autofillDiv.appendChild(p);
                            });
                        }
                    }
                </script>
                <!--script for autofill-->
                </form>
            
<?php if ($show_results): ?>

<?php include "partials/table.php"?>
<!--tables-->

<?php endif ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>