<!DOCTYPE html>
<html><body><body style="background-color:#D3D3D3;">
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "netwoeck_esp_data";
// REPLACE with Database user
$username = "netwoeck_esp_board";
// REPLACE with Database user password
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, deviceid, temp, humidity, localip, reading_time FROM SensorData ORDER BY reading_time DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        
        <td style="text-align:center; color:blue;font-size:125%">ID</td> 
        <td style="text-align:center; color:blue;font-size:125%">Device ID</td> 
        <td style="text-align:center; color:blue;font-size:125%">Temperature</td> 
        <td style="text-align:center; color:blue;font-size:125%">Humidity</td>
        <td style="text-align:center; color:blue;font-size:125%">Local IP</td> 
        <td style="text-align:center; color:blue;font-size:125%">Timestamp</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_deviceid = $row["deviceid"];
        $row_custid = $row["custid"];
        $row_temp = $row["temp"];
        $row_humidity = $row["humidity"]; 
        $row_localip = $row["localip"]; 
        $row_reading_time = $row["reading_time"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        $row_reading_time = date("H:i:s m-d-Y", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_deviceid . '</td> 
                <th>' . $row_temp . '°F</th> 
                <th>' . $row_humidity  . '%</th>
                <td>' . $row_localip. '</td> 
                <td>' . $row_reading_time . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>