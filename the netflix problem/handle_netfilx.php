<!DOCTYPE html>
    <html> 
        <head>
          <title>Details Accepted</title>
        </head> 
        <body> 
            <p>Thank you for submitting the following information:</p>
            <?php 
            $tier = $_POST['tier']
            if ($tier = 'teir1') {
                $month_cost = 599
            } 
            else {
                $month_cost = 999
            }
            
            ?> 
        </body> 
    </html>