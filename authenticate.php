<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'spygames';
$DATABASE_NAME = 'fundlogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT idLogin, Fundacio, Esquema, NomCognoms FROM login WHERE Usuari = ?')) {
	$stmt->bind_param('s', $_POST['username']);
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
		echo 'Usuari o Password Incorrectes!';
	}
	$stmt->close();
}
?>