<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'spygames';
$DATABASE_NAME = 'fundacio';

$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$datos = $con-> query("SELECT * FROM Fitxa");

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Gestió Fundacions</title>
        <link href="styleform.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="minimal.css">
</head>

<body>	
    
 <div class="topnav"> 
   <a href="#home"> <?php echo $_SESSION['Fundacio'] ?></a>
   <a href="#home"> <?php echo $_SESSION['NomCognoms'] ?></a>
   <a class="active" href="brwFitxes.php">Fitxes</a>
   <a href="filtre.php">Cercar</a>
   <a href="activitats.php"> Activitats</a>
   <a href="cobraments.php">Cobraments</a>
</div>
  
     <hr>
     <div class="datagrid">
      <table>
        <tr><th>Estat</th><th>Tipus</th><th>Nom i Cognoms</th><th>DniNIf</th><th>Email</th><th>Telefon</th><th>Població</th><th>Provincia</th><th>Cuota</th><th>IBAN</th></tr>
        <?php  while ($user = mysqli_fetch_array($datos)){
        echo "<tr>";
            $link = $user['idFitxa'];
            $link = "<a href=editFitxa.php?idFitxa=" . $link . " </a>";
            echo "<td>"; echo $link; echo $user['Estat']; echo "</td>";
            echo "<td>"; echo $user['Tipus']; echo "</td>";
            echo "<td>"; echo $user['NomCognoms']; echo "</td>";
            echo "<td>"; echo $user['DniNif']; echo "</td>";
            echo "<td>"; echo $user['Email']; echo "</td>";
            echo "<td>"; echo $user['Telefon']; echo "</td>";
            echo "<td>"; echo $user['Poblacio']; echo "</td>"; 
            echo "<td>"; echo $user['Provincia']; echo "</td>";
            echo "<td>"; echo $user['ImportCuota']; echo "</td>";
            echo "<td>"; echo $user['IBAN']; echo "</td>";
       echo "</tr>"; 
        }
    ?>        
      </table>
    </div>    

</body>
</html>
