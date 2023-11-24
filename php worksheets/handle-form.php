<!DOCTYPE html>
    <html> 
        <head>
          <title>Details Accepted</title>
        </head> 
        <body> 
            <p>Thank you for submitting the following information:</p>
            <?php 
            $name = $_POST['name'];
            $age = $_POST['age']; 
            echo 'Name = ' . $name . ' and Age = ' . $age . '.'; 
            echo '<br />Have a good day.<hr />'; 
            ?> 
        </body> 
    </html>