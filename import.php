<?php
/*
* iTech Empires:  How to Import Data from CSV File to MySQL Using PHP Script
* Version: 1.0.0
* Page: Import.PHP
*/

// Database Connection
require 'db_connection.php';

$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'Invalid file type, please use .CSV file!';
    } else {

        move_uploaded_file($_FILES["file"]["tmp_name"], "C:/EasyPHP-Devserver-17/eds-www/" . $_FILES['file']['name']);

        $file = "C:/EasyPHP-Devserver-17/eds-www/" . $_FILES['file']['name'];

        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE produit
         FIELDS TERMINATED BY ';'
         ENCLOSED BY '"'
         LINES TERMINATED BY '\r\n'
         IGNORE 1 LINES
(wlan_test_run_date,wlan_test_run_time,tester_company,tester_operator_name,location_site,location_description,location_name,location_distance,location_floor,location_thin_wall,location_thick_wall,location_pathloss,location_conducted_attenuation,wlan_test_run_info,ap_manufacturer,ap_model,ap_serial_number,ap_hw_version,ap_sw_version,ap_wifi_driver_version,ap_certification,ap_calibration_version,sta_manufacturer,sta_model,sta_serial_number,sta_hw_version,sta_sw_version,sta_wifi_driver_version,configuration_band,configuration_modulation	,configuration_bandwidth,configuration_channel,configuration_transfert_type,configuration_radiated_mode,configuration_conducted_attenuation,configuration_security,configuration_protocol,configuration_anglev,configuration_angleh,measurement_throughput,measurement_sta_rssi,measurement_rx_rate,measurement_tx_rate,measurement_rx_stream,measurement_tx_stream,measurement_channel,measurement_tput_mean	,measurement_txbw,measurement_txmode,measurement_txpower_0,measurement_txpower_1,measurement_txpower_2,measurement_txpower_3,measurement_evm_0,measurement_evm_1,measurement_evm_2,measurement_evm_3,measurement_ap_rssi,measurement_plot,measurement_rx_mcs,measurement_tx_mcs,configuration_apname,configuration_staname,configuration_group,configuration_test_duration,targets_status,targets_date,targets_certification)
eof;
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        $reussi = "CSV file successfully imported!";
    }
}

// View records from the table
$produit = '<table class="table table-bordered">
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
                               <th> configuration_band </th>
                                 <th> configuration_modulation </th>
                                   <th>  configuration_bandwidth</th>
                                     <th> configuration_channel </th>
                                       <th> 
                                       configuration_transfert_type</th>
                               <th> configuration_radiated_mode </th>
                                 <th> configuration_conducted_attenuation </th>
                                   <th> configuration_security</th>
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
                                               <th>measurement_txpower_0	 </th>
                                                 <th>measurement_txpower_1 </th>
                                                   <th>measurement_txpower_2	 </th>
                                                     <th> measurement_txpower_3</th>
                                                       <th> measurement_evm_0</th>
                                                         <th>measurement_evm_1 </th>
                                                        
                                                           <th> measurement_evm_2 </th>
                                                            <th> measurement_evm_3	</th>
                                                                <th>measurement_ap_rssi	 </th>
                                                                    <th>measurement_plot	 </th>
                                                                        <th> measurement_rx_mcs	</th>
    <th>measurement_tx_mcs	 </th>
        <th> configuration_apname	</th>
            <th> configuration_staname	</th>
                <th>configuration_group	 </th>
                    <th> configuration_test_duration	</th>
                        <th> targets_status	</th>
                            <th>targets_date	 </th>
                                <th>targets_certification</th>


</tr>
';
$query = "SELECT * FROM produit";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}
if (mysqli_num_rows($result) > 0) {
   
    while ($row = mysqli_fetch_assoc($result)) {

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
} else {
    $produit.= '<tr>
        <td colspan="68">Records not found!</td>
        </tr>';
}
$produit .= '</table>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>


</head>
<style type="text/css">
	body {

background-color: lightgray;
}
#UnderClor
{color: green; font-weight: bold;}
#UnderrClor
{color: red; font-weight: bold;}
h4 
{
	margin-bottom:50%;
}

</style>
<body>
    <div id="wrap">
        <div class="container">
            <div class="row">

                <form class="form-horizontal" action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Import Data From CSV File To My DataBase</legend>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="file" name="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                          
                        </div>
                          <div class="form-group"> <br>
                   <div id="UnderrClor"> <?php echo $message; ?> </div>
                     <div id="UnderClor"> <?php echo $reussi; ?> </div>
                </div>

                    </fieldset>
                </form>
                 <div class="form-group">
               <!--<?php echo $produit ?> --> 
            </div>

            </div>
            
        </div>
    </div>
<footer> <center> <h4><a href="index.php"> Home </a> </h4> </center> </footer>
</body>

</html>
