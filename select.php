<?php
ini_set("display_errors",0);error_reporting(0);
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on local server)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "csv_db"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);
$result = $con->query("SELECT Distinct ap_model FROM produit") or die($con->error);
if(isset($_POST['submit'])){
$selected_val = $_POST['ap_Model'];  // Storing Selected Value In Variable
  // Displaying Selected Value
}
$sql1 = "Select  wlan_test_run_date  Distinct from produit where (ap_model ='$selected_val')"; 
$res1 = mysqli_query($con, $sql1) or die ("Erreur dans la requete ".mysqli_error($con));
 if (mysqli_num_rows($res1)>0)
    $produit = '<table border ="1">
<tr>
    <th>wlan_test_run_date</th>
  
</tr>
';
while ($row  = mysqli_fetch_assoc($res1)) {
     $produit .= '<tr>
            <td>' . $row['wlan_test_run_date'] . '</td>
            
          

        </tr>';
       
  
}
        
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
  <form name='Form0' action="select.php" method="post">

  <fieldset class="source">
              <legend> Search Product Information</legend>
       
       
   <p class="formulairePolice"> appliquer le filtre sur les champs suivants: </p> <br> <br>
  

   ap_model:<select id="ap_Model" name="ap_Model" multiple>
  <?php
    
    $final  = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
  

        echo "<option value='" . $row['ap_model'] . "'>" . $row["ap_model"] . "</option>";

      
    }

foreach ($selected_val as $select ) {
    echo $select;
}


    ?> 
</select><br>

     <center><input type="submit" name="submit" value="Appliquer"> </center>
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

    
</script>
</form>


</body>
</html>