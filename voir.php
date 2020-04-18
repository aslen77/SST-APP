<?php
/*ini_set("display_errors",0);error_reporting(0);*/
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on local server)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "mydatabase"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

if(isset($_POST['submit'])){
$selected_val = $_POST['Color'];  // Storing Selected Value In Variable
  // Displaying Selected Value
}
$sql1 = $con->query("SELECT Distinct name,email,address FROM identifier where name='$selected_val'") or die($con->error);
$res1 = mysqli_query($con, $sql1) or die ("Erreur dans la requete ".mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="voir.php" method="post">
<select name="Color[]" multiple> // Initializing Name With An Array
<option value="Guesmi">Guesmi</option>
<option value="Guesmi">Guesmi</option>
<option value="guesmi">guesmi</option>
<option value="rami">rami</option>
<option value="salim">salim</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
if (mysqli_num_rows($res1)>0)



    $produit = '<table border ="1">
<tr>
    <th>name</th>
   <th>email</th>
    <th>address</th>
</tr>
';

while ($row  = mysqli_fetch_assoc($res1)) {
    
        
    
     $produit .= '<tr>
           
            <td>' . $row['name'] . '</td>
             <td>' . $row['email'] . '</td>
              <td>' . $row['address'] . '</td>
            
          

        </tr>';
       
  
}
       
    while ($row = mysqli_fetch_array($res1)) {
  

        echo "<option value='" . $row['Color'] . "'>" . $row["Color"] . "</option>";

      
    }

    echo $produit;

     
?>
</body>
</html>