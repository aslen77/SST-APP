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
$database = "mydatabase"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

$name = $_POST ['nom'];
$email = $_POST ['email'];
$hotel = $_POST ['address'];

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
	// requete 1:
$sql1 = "select * from identifier where (name ='$name')";
$res1 = mysqli_query($con, $sql1) or die ("Erreur dans la requete ".mysqli_error($con));
 if (mysqli_num_rows($res1)>0)
 	$produit ='<table >
<tr>
<th> name	</th>
                            <th>email	 </th>
                                <th>address</th>


</tr>
';
 	while ($row  = mysqli_fetch_assoc($res1)) {
 		$produit .='<tr>
 		<td>' . $row['name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['address'] . '</td>
            </tr>';
 	}
$result = mysqli_query("select address from identifier");
while ($data = musqli_fetch_array($result))

  	

			echo ' adress : <input type="text" name="address" value="'.$data[0].'">';
?>
<!DOCTYPE html>
<html>
<head>
	<title>import</title>
</head>
<body>

<form name="form0" action="test.php" method="POST">
	<table border="1">
		<tr>
			<td> name : <select id="location_name" name="nom">
  <option value="Guesmi">Guesmi </option>
 <option value="Sondes">Sondes</option>
  <option value="Sdiri">Sdiri </option>
   <option value="sdiri">sdiri </option>
      <option value="GARAGE">GARAGE </option>
      <option></option>


</select>
			<td> email : <input type="mail" name="email"> </td>
			
		
	</table>
	<input type="submit" name="envoyer" value="Valider">

</form>
</body>
</html>