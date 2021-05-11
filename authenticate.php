<?php
session_start();
$DATABASE_HOST = 'papersgchospital.mysql.db';
$DATABASE_USER = 'papersgchospital';
$DATABASE_PASS = 'zS70j3yYAImt';
$DATABASE_NAME = 'papersgchospital';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
$q = "SELECT idLogin, Fundacio, Esquema, NomCognoms FROM login WHERE Usuari = '" .$_POST['username'] . "' AND Password = '" . $_POST['password'] . "'" ;
// echo $q;
if ($stmt = $con->prepare($q)) {
	$stmt->execute();
	$stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            
                $datos = $con-> query("SELECT * FROM Login");
                $user = mysqli_fetch_array($datos);
                        
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['idLogin']= $user['idLogin'];
                $_SESSION['Fundacio']= $user['Fundacio'];
                $_SESSION['Esquema']= $user['Esquema'];
                $_SESSION['NomCognoms']= $user['NomCognoms'];  
                
               header('Location: /GestFundacions/brwFitxes.php');
               
	        
	} else {
	    echo "<html>";	 
            echo "<head>";
            echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
            echo "</head>";            
            echo "<body>";
            echo "<br>";
            echo " <p class='bg-danger text-white'>Usuari o Password Incorrectes</p>";
            // echo 'Usuari o Password Incorrectes!';
            echo "</body>";
            echo "</html>";
	}
	$stmt->close();
}
?>

