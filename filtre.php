
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
	<meta charset="utf-8">
	<title>Gestió Fundacions</title>
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
   
<form action="brwFitxes.php" method="post">
  <div class="container">
    <h2>Cercar Fitxes</h2>
    <hr>
    <label class="container">Soci
      <input type="checkbox" checked="checked">
      <span class="checkmark"></span>
    </label>

    <label class="container">Col.laborador
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>

    <label class="container">Professional
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>

    <label class="container">Interessat
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
      <hr>
    <label for="email"><b>Nom/Cognoms</b></label>
    <input type="text" placeholder="" name="NomCognoms" id="nomCognoms" >
    <hr>

    <label for="email"><b>Malaltia</b></label>
    <input type="text" placeholder="" name="Telèfon" id="telefon" >
    <hr>

    <label for="email"><b>Telèfon</b></label>
    <input type="text" placeholder="" name="Telèfon" id="telefon" >
    <hr>
    
    <label for="email"><b>eMail</b></label>
    <input type="text" placeholder="" name="Telèfon" id="telefon" >
    <hr>
    
    <label for="email"><b>Adreça</b></label>
    <input type="text" placeholder="" name="Telèfon" id="telefon" >
    <hr>
    
    <label for="email"><b>IBAN</b></label>
    <input type="text" placeholder="" name="Telèfon" id="telefon" >
    <hr>


    
    <hr>
    
    <button type="submit" class="registerbtn">Cercar</button>
  </div>

  
</form>
    

    
</body>
</html>
