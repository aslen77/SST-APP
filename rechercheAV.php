<?php
/*
* iTech Empires:  How to Import Data from CSV File to MySQL Using PHP Script
* Version: 1.0.0
* Page: DB Connection
*/

// Connection variables
ini_set("display_errors",0);error_reporting(0);
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on local server)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "csv_db"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$result = $con->query("SELECT DISTINCT ap_model FROM produit") or die($con->error);
$result1 = $con->query("SELECT DISTINCT ap_sw_version FROM produit") or die($con->error);

$result2 = $con->query("SELECT DISTINCT sta_sw_version FROM produit") or die($con->error);
$result3 = $con->query("SELECT DISTINCT location_name FROM produit") or die($con->error);


?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<link rel="stylesheet" type="text/javascript" href="httpscdnjs.cloudflare.comajaxlibsjquery2.1.3jquery.min.js">
<link rel="stylesheet" type="text/css" href="Feuille_ajouter.css">


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />


    <link rel="stylesheet" href="assets/multiple-select.css" />
	    <script src="httpscdnjs.cloudflare.comajaxlibsjquery2.1.3jquery.min.js" type="text/javascript"></script>


      <script src="assets/jquery.min.js"></script>
<script src="assets/multiple-select.js"></script>

	<title></title>
	<style type="text/css">

  </style>
</head>
<body>
	<form name='Form0' action="rechercheAV.php">

	<fieldset class="source">
    	    		<legend> Search Product Information</legend>
   		 
       
   <p class="formulairePolice"> appliquer le filtre sur les champs suivants: </p> <br> <br>
  

   ap_model:<select id="ap_Model" name="ap_Model">
  <?php
    
    $final  = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
  

        echo "<option value='" . $row['ap_model'] . "'>" . $row["ap_model"] . "</option>";

      
    }




    ?> 
</select><br>
ap_sw_version:	<select id="ap_sw_version" name="ap_sw_version">
 
  <?php
    
    $final  = mysqli_num_rows($result1);
    while ($row = mysqli_fetch_array($result1)) {
  

        echo "<option value='" . $row['ap_sw_version'] . "'>" . $row["ap_sw_version"] . "</option>";

      
    }



    ?> 
</select><br>
sta_sw_version:	<select id="sta_sw_version" name="sta_sw_version">
 <?php
    
    $final  = mysqli_num_rows($result2);
    while ($row = mysqli_fetch_array($result2)) {
  

        echo "<option value='" . $row['sta_sw_version'] . "'>" . $row["sta_sw_version"] . "</option>";

      
    }




    ?> 
</select><br> <br>
location_name:<select id="location_name" name="location_name">
   <?php
    
    $final  = mysqli_num_rows($result3);
    while ($row = mysqli_fetch_array($result3)) {
  

        echo "<option value='" . $row['location_name'] . "'>" . $row["location_name"] . "</option>";

      
    }




    ?> 


</select><br> <br>
configuration_transfert_type:<br>	<br><center>	<input type="checkbox" name="configuration_transfert_type" value="DS"> DS  &nbsp; &nbsp; &nbsp;

<input type="checkbox" name="configuration_transfert_type" value="US"> US

</center>
<br>
configuration_protocol:	<br> <br> <center>  <input type="checkbox" name="configuration_protocol" value="UDD"> UDD  &nbsp; &nbsp; &nbsp;

<input type="checkbox" name="configuration_protocol" value="TCP"> TCP
<br><br>
</center>
		 <center><input type="submit" value="Appliquer"> </center>
    <center> <h4><a href="index.php"> Home </a> </h4> <h4><a href="Filtrage.php"> Recherche Simple </a> </h4>
   
</Fieldset>


<script>
    $(function() {
        $('#ap_Model').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });

    $(function() {
        $('#ap_sw_version').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });

    $(function() {
        $('#sta_sw_version').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });

    $(function() {
        $('#location_name').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>
</form>


</body>
</html>