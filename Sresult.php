<?php
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
$model = $_POST['mod'];

  // requete 1:
$sql1 = "select * from produit where (sta_model ='$model')";
$res1 = mysqli_query($con, $sql1) or die ("Erreur dans la requete ".mysqli_error($con));
 if (mysqli_num_rows($res1)>0)
  // View records from the table
$produit = '<table border ="1">
<tr>
    <th>wlan_test_run_date</th>
    <th>wlan_test_run_time</th>
    <th>tester_company</th>
    <th>tester_operator_name</th>
    <th>location_site</th>
      <th> location_description </th>
        <th> location_name</th>
          <th> location_distance </th>
            <th> location_floor </th>
              <th> location_thin_wall </th>
                <th> location_thick_wall </th>
                  <th> location_pathloss </th>
                    <th> location_conducted_attenuation</th>
                      <th> wlan_test_run_info </th>
                        <th> ap_manufacturer </th>
                          <th> ap_model</th>
                            <th> ap_serial_number </th>
                              <th> ap_hw_version </th>
                                <th> ap_sw_version </th>
                                  <th> ap_wifi_driver_version </th>

                                  <th> ap_certification </th>
                                  <th> ap_calibration_version </th>
                                  <th> sta_manufacturer </th>
                                  <th> sta_model </th>
								  <th> sta_serial_number </th>
                                  <th> sta_hw_version </th>
                                  <th> sta_sw_version </th>
                                  <th> sta_wifi_driver_version </th>





                               <th> configuration_band </th>
                                 <th> configuration_modulation </th>
                                   <th>  configuration_bandwidth</th>
                                     <th> configuration_channel </th>
                                       <th> 
                                       configuration_transfert_type</th>
                               <th> configuration_radiated_mode </th>
                                 <th> configuration_conducted_attenuation </th>
                                   <th> configuration_security</th>
                                      <th> configuration_protocol</th>
                       <th> configuration_anglev </th>
                         <th> configuration_angleh </th>
                           <th>measurement_throughput </th>
                             <th>measurement_sta_rssi</th>
                               <th> measurement_rx_rate</th>
                                 <th> measurement_tx_rate</th>
                                   <th> measurement_rx_stream</th>
                                     <th>measurement_tx_stream </th>
                                       <th> measurement_channel</th>
                                         <th> measurement_tput_mean</th>
                                           <th>measurement_txbw </th>
                                             <th>measurement_txmode </th>
                                               <th>measurement_txpower_0   </th>
                                                 <th>measurement_txpower_1 </th>
                                                   <th>measurement_txpower_2   </th>
                                                     <th> measurement_txpower_3</th>
                                                       <th> measurement_evm_0</th>
                                                         <th>measurement_evm_1 </th>
                                                        
                                                           <th> measurement_evm_2 </th>
                                                            <th> measurement_evm_3  </th>
                                                                <th>measurement_ap_rssi  </th>
                                                                    <th>measurement_plot   </th>
                                                                        <th> measurement_rx_mcs </th>
    <th>measurement_tx_mcs   </th>
        <th> configuration_apname </th>
            <th> configuration_staname  </th>
                <th>configuration_group  </th>
                    <th> configuration_test_duration  </th>
                        <th> targets_status </th>
                            <th>targets_date   </th>
                                <th>targets_certification</th>


</tr>
';

while ($row  = mysqli_fetch_assoc($res1)) {
     $produit .= '<tr>
            <td>' . $row['wlan_test_run_date'] . '</td>
            <td>' . $row['wlan_test_run_time'] . '</td>
            <td>' . $row['tester_company'] . '</td>
            <td>' . $row['tester_operator_name'] . '</td>
            <td>' . $row['location_site'] . '</td>
            <td>' . $row['location_description'] . '</td>
            <td>' . $row['location_name'] . '</td>
            <td>' . $row['location_distance'] . '</td>
            <td>' . $row['location_floor'] . '</td>
            <td>' . $row['location_thin_wall'] . '</td>
            <td>' . $row['location_thick_wall'] . '</td>
            <td>' . $row['location_pathloss'] . '</td>
            <td>' . $row['location_conducted_attenuation'] . '</td>
            <td>' . $row['Wlan_test_run_info'] . '</td>
            <td>' . $row['ap_manufacturer'] . '</td>
            <td>' . $row['ap_model'] . '</td>
            <td>' . $row['ap_serial_number'] . '</td>
            <td>' . $row['ap_hw_version'] . '</td>
            <td>' . $row['ap_sw_version'] . '</td>
            <td>' . $row['ap_wifi_driver_version'] . '</td>
            <td>' . $row['ap_certification'] . '</td>
            <td>' . $row['ap_calibration_version'] . '</td>
            <td>' . $row['sta_manufacturer'] . '</td>
            <td>' . $row['sta_model'] . '</td>
            <td>' . $row['sta_serial_number'] . '</td>
            <td>' . $row['sta_hw_version'] . '</td>
            <td>' . $row['sta_sw_version'] . '</td>
            <td>' . $row['sta_wifi_driver_version'] . '</td>
            <td>' . $row['configuration_band'] . '</td>
            <td>' . $row['configuration_modulation'] . '</td>
            <td>' . $row['configuration_bandwidth'] . '</td>
            <td>' . $row['configuration_channel'] . '</td>
            <td>' . $row['configuration_transfert_type'] . '</td>
            <td>' . $row['configuration_radiated_mode'] . '</td>
            <td>' . $row['configuration_conducted_attenuation'] . '</td>
            <td>' . $row['configuration_security'] . '</td>
            <td>' . $row['configuration_protocol'] . '</td>
            <td>' . $row['configuration_anglev'] . '</td>
            <td>' . $row['configuration_angleh'] . '</td>
            <td>' . $row['measurement_throughput'] . '</td>
            <td>' . $row['measurement_sta_rssi'] . '</td>
            <td>' . $row['measurement_rx_rate'] . '</td>
            <td>' . $row['measurement_tx_rate'] . '</td>
            <td>' . $row['measurement_rx_stream'] . '</td>
            <td>' . $row['measurement_tx_stream'] . '</td>
            <td>' . $row['measurement_channel'] . '</td>
            <td>' . $row['measurement_tput_mean'] . '</td>
            <td>' . $row['measurement_txbw'] . '</td>
            <td>' . $row['measurement_txmode'] . '</td>
            <td>' . $row['measurement_txpower_0'] . '</td>
                   <td>' . $row['measurement_txpower_1'] . '</td>
                          <td>' . $row['measurement_txpower_2'] . '</td>
                                 <td>' . $row['measurement_txpower_3'] . '</td>
            <td>' . $row['measurement_evm_0'] . '</td>
            <td>' . $row['measurement_evm_1'] . '</td>
            <td>' . $row['measurement_evm_2'] . '</td>
            <td>' . $row['measurement_evm_3'] . '</td>

            <td>' . $row['measurement_ap_rssi'] . '</td>
            <td>' . $row['measurement_plot'] . '</td>
            <td>' . $row['measurement_rx_mcs'] . '</td>
            <td>' . $row['measurement_tx_mcs'] . '</td>
            <td>' . $row['configuration_apname'] . '</td>
            <td>' . $row['configuration_staname'] . '</td>
            <td>' . $row['configuration_group'] . '</td>
            <td>' . $row['configuration_test_duration'] . '</td>
            <td>' . $row['targets_status'] . '</td>
            <td>' . $row['targets_date'] . '</td>
            <td>' . $row['targets_certification'] . '</td>

        </tr>';
       
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>resultat Sta</title>
	<style type="text/css">
		body 
		{
			background-color: lightgray;

		}
		/*table {
border: medium solid #6495ed;
border-collapse: collapse;
width: 50%;
}
th {
font-family: monospace;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
background-color: #D0E3FA;
background-image: url(sky.jpg);
}
td {
font-family: sans-serif;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
text-align: center;
background-color: #ffffff;
}
caption {
font-family: sans-serif;
}*/

/******************************************* */

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {background-color: #f2f2f2;}
	</style>
</head>
<body>
<?php echo $produit; ?>
</body>
</html>