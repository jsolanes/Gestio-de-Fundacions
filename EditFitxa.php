<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'spygames';
$DATABASE_NAME = 'fundacio';

$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$postIdFitxa = $_REQUEST["idFitxa"];

$query = "SELECT * FROM Fitxa WHERE idFitxa = ";
$query = $query . $postIdFitxa;
$datos = $con-> query($query);
$row = mysqli_fetch_array($datos);

?>

<script>
var modal = document.getElementById('id01');

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<html>
<head>
	<meta charset="utf-8">
	<title>Gestió Fundacions</title>
        <link href="style.css" rel="stylesheet" type="text/css">        
        <!-- <link href="minimal.css" rel="stylesheet" > -->
        <link href="tableEdit.css" rel="stylesheet">
        <link href="delete.css" rel="stylesheet" type="text/css">
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
   <form action="#">

       <div class="datagrid">
       <table>
        <tbody> 
            <tr>
                <td><label for="NomCognoms">Nom i Cognoms</label></td><td><input type="text" name="NomCognoms" value="<?=$row['NomCognoms']?>" maxlength="32"></td>
                <td><label for="Tipus">Tipus</label> </td><td><input type="text" name="Tipus" value="<?=$row['Tipus']?>" maxlength="75"></td>
                <td><label for="Email">Email</label></td><td><input type="text"  name="Email" value="<?=$row['Email']?>" maxlength="75"></td>
                <td><label for="Estat">Estat</label></td><td><input type="text"  name="Estat" value="<?=$row['Estat']?>" maxlength="75"></td>
            </tr>
            <tr>
                <td><label for="DniNif">DniNif</label></td><td><input type="text" name="DniNIf" value="<?=$row['DniNif']?>" maxlength="75"></td>
                <td><label for="DataNaixament">Data de Naixement</label></td><td><input type="text" name="DataNaixament" value="<?=$row['DataNaixament']?>" maxlength="75"></td>
            </tr>
            <tr>
                <td> <label for="Adress">Adreça</label></td><td> <input type="text" name="Adress" value="<?=$row['Adress']?>" maxlength="150"></td>
                <td><label for="CPostal">Codi Postal</label></td><td><input type="text" name="CPostal"  value="<?=$row['CPostal']?>" maxlength="75"></td>
                <td> <label for="Poblacio">Poblacio</label></td><td> <input type="text" name="Poblacio" value="<?=$row['Poblacio']?>" maxlength="75"></td>
                <td><label for="Provincia">Provincia</label></td><td>  <input type="text" name="Provincia" value="<?=$row['Provincia']?>" maxlength="75"></td>
             </tr>
             
             <tr>
                <td><label for="PeriodicitatCuota">Periodicitat de la Cuota</label></td><td> <input type="text" name="PeriodicitatCuota" value="<?=$row['PeriodicitatCuota']?>" maxlength="75"></td>
                <td><label for="ImportCuota">Import de la Cuota</label></td><td><input type="text" name="ImportCuota" value="<?=$row['ImportCuota']?>" maxlength="75"></td>
                <td> <label for="IBAN">IBAN</label></td><td><input type="text" name="IBAN" value="<?=$row['IBAN']?>" maxlength="75"></td>
             </tr>
             
             <tr>
                <td>  <label for="DataAlta">Data Alta Fitxa</label></td><td><input type="text" name="DataAlta" value="<?=$row['DataAlta']?>" maxlength="75"></td>
                <td><label for="DataBaixa">Data Baixa Fitxa</label></td><td><input type="text" name="DataBaixa" value="<?=$row['DataBaixa']?>" maxlength="75"></td>
                <td><label for="MotiusBaixa">Motius de la Baixa</label></td><td><input type="text" name="MotiusBaixa" value="<?=$row['MotiusBaixa']?>" maxlength="75"></td>
             </tr>
          </tbody>
      </table>
    </div>
 
    <div class="datagrid">
       <table>
        <tbody> 
            <tr><td>  <div class="form-group">
            <textarea class="form-control" rows="5" cols='200' id="Memo" value="<?=$row['Memo']?>"></textarea>
            </div></td></tr>
          </tbody>
      </table>
    </div>      
    <button type="button" class="block">ACTUALITZAR FITXA</button>
   </form>
        
        <button onclick="document.getElementById('id01').style.display='block'">BORRAR FITXA</button>
        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="BORRAR FITXA">&times;</span>
          <form class="modal-content" action="/action_page.php">
            <div class="container">
              <h1>Borrar Fitxa</h1>
              <p>Estas segur de Borrar la Fitxa?</p>

              <div class="clearfix">
                <button type="button" class="cancelbtn">Cancelar</button>
                <button type="button" class="deletebtn">Borrar</button>
              </div>
            </div>
          </form>
        </div>
            <button type="button" class="block">NOVA FITXA</button>
    </body>
</html>
