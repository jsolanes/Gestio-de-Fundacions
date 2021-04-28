
<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'spygames';
$DATABASE_NAME = 'fundlogin';

$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$datos = $con-> query("SELECT * FROM Login");

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Filtrar Fitxes</title>
    </head>
    
    <body>
        
      
       <?php while($user = mysqli_fetch_array($datos)) { 
       echo session_id();
       echo $user['idLogin'];
       echo $user['Fundacio'];
       echo $user['Esquema'];
       echo $user['NomCognoms'];
         
       }
       ?>
    </body>
</html>
