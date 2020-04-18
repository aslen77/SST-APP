<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mydatabase';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

/* Your query */
$result = $mysqli->query("SELECT DISTINCT name FROM identifier") or die($mysqli->error);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>avoir des donnés</title>
</head>

<body>
<form name="form0" action="Get.php" method="POST">
<select name="namee">
    <option value="Select School">Select name</option>
    <?php
    
    $final  = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;

        echo "<option value='" . $row['name'] . "'>" . $row["name"] . "</option>";

      
    }
   
?>        

</select>
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['Color'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_val;  // Displaying Selected Value
}
?>
	<input type="submit" name="envoyer" value="Valider"> <br>
	

</form>
</body>
</html>