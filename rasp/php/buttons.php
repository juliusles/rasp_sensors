<?php

//1. Listaa kaikki tietokannan sensoreiden arvot erikseen
//     kustakin huoneesta (ota kuvakaappaus vastauksesta)
//2. Listaa lämpötilalukemat huoneittain eriteltynä
//3. Etsi pesuhuoneen maksimikosteus
//4. Etsi olohuoneen minilämpötila
//5. Tulosta keittiön hiilidioksidin keskiarvo
//6. Listaa huoneittain häkäpitoisuus

    // ---------------- 1. PRINT ALL ---------------- //
    if(isset($_POST['print_all']))
    {
          // Connect to database
          include("connect.php");
          // Select all
          $search="SELECT * FROM Measurements;";
          $result = mysql_query($search);

          // Print stuff
          while($new_table = mysql_fetch_array($result))
          {
              $target_idMeasurement = $new_table['idMeasurement'];
              $target_Timestamp     = $new_table['Timestamp'];
              $target_Temperature   = $new_table['Temperature'];
              $target_Humidity      = $new_table['Humidity'];
              $target_CO2           = $new_table['CO2'];
              $target_CO            = $new_table['CO'];
              $target_Room_idRoom   = $new_table['Room_idRoom'];

              print "<td>$target_idMeasurement</td>";
              print "<td>$target_Timestamp</td>";
              print "<td>$target_Temperature</td>";
              print "<td>$target_Humidity</td>";
              print "<td>$target_CO2</td>";
              print "<td>$target_CO</td>";
              //print "<td>$target_Room_idRoom</td></tr>;
              if($target_Room_idRoom == 1)
                print "<td>Pesuhuone</td></tr>";
              else if ($target_Room_idRoom == 2)
                print "<td>Keittiö</td></tr>";
              else
                print "<td>Olohuone</td></tr>";
          }
          mysql_close($connection);
    }
    // ---------------- 2. TEMPS BY ROOM ---------------- //
    // Display most recent temperature from each room
    if(isset($_POST['list_temp']))
    {
          // Connect to database
          include("connect.php");

          $search="SELECT
                     idMeasurement,
                     Timestamp,
                     Temperature,
                     Room_idRoom

                   FROM Measurements
                   WHERE Timestamp =
                     (SELECT MAX(Timestamp)
                     FROM Measurements
                     WHERE Room_idRoom = '1')

                   OR Timestamp =
                     (SELECT MAX(Timestamp)
                     FROM Measurements
                     WHERE Room_idRoom = '2')

                   OR Timestamp =
                     (SELECT MAX(Timestamp)
                     FROM Measurements
                     WHERE Room_idRoom = '3');";
          $result = mysql_query($search);


          // Print stuff
          while($new_table = mysql_fetch_array($result))
          {
              $target_idMeasurement = $new_table['idMeasurement'];
              $target_Timestamp     = $new_table['Timestamp'];
              $target_Temperature   = $new_table['Temperature'];
              $target_Humidity      = $new_table['Humidity'];
              $target_CO2           = $new_table['CO2'];
              $target_CO            = $new_table['CO'];
              $target_Room_idRoom   = $new_table['Room_idRoom'];

              print "<td>$target_idMeasurement</td>";
              print "<td>$target_Timestamp</td>";
              print "<td>$target_Temperature</td>";
              print "<td>$target_Humidity</td>";
              print "<td>$target_CO2</td>";
              print "<td>$target_CO</td>";
              //print "<td>$target_Room_idRoom</td></tr>;
              if($target_Room_idRoom == 1)
                print "<td>Pesuhuone</td></tr>";
              else if ($target_Room_idRoom == 2)
                print "<td>Keittiö</td></tr>";
              else
                print "<td>Olohuone</td></tr>";
          }
          mysql_close($connection);
    }
    // -------------- 3. BATHROOM MAX HUMIDITY ---------------- //
    if(isset($_POST['bath_max_humid']))
    {
          // Connect to database
          include("connect.php");
          // Select max humidity from bathroom
          $search="SELECT 
                     idMeasurement,
                     Timestamp,
                     MAX(Humidity) AS Humidity,
                     Room_idRoom
                   FROM Measurements
                   JOIN Room
                   ON Measurements.Room_idRoom = Room.idRoom
                   WHERE Room.RoomName = 'Bathroom';";
          $result = mysql_query($search);

          // Print stuff
          while($new_table = mysql_fetch_array($result))
          {
              $target_idMeasurement = $new_table['idMeasurement'];
              $target_Timestamp     = $new_table['Timestamp'];
              $target_Temperature   = $new_table['Temperature'];
              $target_Humidity      = $new_table['Humidity'];
              $target_CO2           = $new_table['CO2'];
              $target_CO            = $new_table['CO'];
              $target_Room_idRoom   = $new_table['Room_idRoom'];

              print "<td>$target_idMeasurement</td>";
              print "<td>$target_Timestamp</td>";
              print "<td>$target_Temperature</td>";
              print "<td>$target_Humidity</td>";
              print "<td>$target_CO2</td>";
              print "<td>$target_CO</td>";
              //print "<td>$target_Room_idRoom</td></tr>;
              if($target_Room_idRoom == 1)
                print "<td>Pesuhuone</td></tr>";
              else if ($target_Room_idRoom == 2)
                print "<td>Keittiö</td></tr>";
              else
                print "<td>Olohuone</td></tr>";
              //print "</tr>";
          }
          mysql_close($connection);
    }

   // -------------- 4. LIVING ROOM MIN TEMP ---------------- //
    if(isset($_POST['living_min_temp']))
    {
          // Connect to database
          include("connect.php");
          // Select min temperature from living room
          $search="SELECT 
                     idMeasurement,
                     Timestamp,
                     MIN(Temperature) AS Temperature,
                     Room_idRoom
                   FROM Measurements
                   JOIN Room
                   ON Measurements.Room_idRoom = Room.idRoom
                   WHERE Room.RoomName = 'LivingRoom';";
          $result = mysql_query($search);

          // Print stuff
          while($new_table = mysql_fetch_array($result))
          {
              $target_idMeasurement = $new_table['idMeasurement'];
              $target_Timestamp     = $new_table['Timestamp'];
              $target_Temperature   = $new_table['Temperature'];
              $target_Humidity      = $new_table['Humidity'];
              $target_CO2           = $new_table['CO2'];
              $target_CO            = $new_table['CO'];
              $target_Room_idRoom   = $new_table['Room_idRoom'];

              print "<td>$target_idMeasurement</td>";
              print "<td>$target_Timestamp</td>";
              print "<td>$target_Temperature</td>";
              print "<td>$target_Humidity</td>";
              print "<td>$target_CO2</td>";
              print "<td>$target_CO</td>";
              //print "<td>$target_Room_idRoom</td></tr>;
              if($target_Room_idRoom == 1)
                print "<td>Pesuhuone</td></tr>";
              else if ($target_Room_idRoom == 2)
                print "<td>Keittiö</td></tr>";
              else
                print "<td>Olohuone</td></tr>";
              //print "</tr>";
          }
          mysql_close($connection);
    }
    // -------------- 5. KITCHEN AVG CO2 ---------------- //
    if(isset($_POST['kitchen_co2_avg']))
    {
          // Connect to database
          include("connect.php");
          // Select AVG CO2 from kitchen
          $search="SELECT 
                     AVG(CO2) AS CO2,
                     Room_idRoom
                   FROM Measurements
                   JOIN Room
                   ON Measurements.Room_idRoom = Room.idRoom
                   WHERE Room.RoomName = 'Kitchen';";
          $result = mysql_query($search);

          // Print stuff
          while($new_table = mysql_fetch_array($result))
          {
              $target_idMeasurement = $new_table['idMeasurement'];
              $target_Timestamp     = $new_table['Timestamp'];
              $target_Temperature   = $new_table['Temperature'];
              $target_Humidity      = $new_table['Humidity'];
              $target_CO2           = $new_table['CO2'];
              $target_CO            = $new_table['CO'];
              $target_Room_idRoom   = $new_table['Room_idRoom'];

              print "<td>$target_idMeasurement</td>";
              print "<td>$target_Timestamp</td>";
              print "<td>$target_Temperature</td>";
              print "<td>$target_Humidity</td>";
              print "<td>$target_CO2</td>";
              print "<td>$target_CO</td>";
              //print "<td>$target_Room_idRoom</td></tr>;
              if($target_Room_idRoom == 1)
                print "<td>Pesuhuone</td></tr>";
              else if ($target_Room_idRoom == 2)
                print "<td>Keittiö</td></tr>";
              else
                print "<td>Olohuone</td></tr>";
              //print "</tr>";
          }
          mysql_close($connection);
    }
    // ---------------- 6. CO BY ROOM ---------------- //
    // Display most recent CO value from each room
    if(isset($_POST['list_co']))
    {
          // Connect to database
          include("connect.php");

          $search="SELECT
                     idMeasurement,
                     Timestamp,
                     CO,
                     Room_idRoom

                   FROM Measurements
                   WHERE Timestamp =
                     (SELECT MAX(Timestamp)
                     FROM Measurements
                     WHERE Room_idRoom = '1')

                   OR Timestamp =
                     (SELECT MAX(Timestamp)
                     FROM Measurements
                     WHERE Room_idRoom = '2')

                   OR Timestamp =
                     (SELECT MAX(Timestamp)
                     FROM Measurements
                     WHERE Room_idRoom = '3');";
          $result = mysql_query($search);


          // Print stuff
          while($new_table = mysql_fetch_array($result))
          {
              $target_idMeasurement = $new_table['idMeasurement'];
              $target_Timestamp     = $new_table['Timestamp'];
              $target_Temperature   = $new_table['Temperature'];
              $target_Humidity      = $new_table['Humidity'];
              $target_CO2           = $new_table['CO2'];
              $target_CO            = $new_table['CO'];
              $target_Room_idRoom   = $new_table['Room_idRoom'];

              print "<td>$target_idMeasurement</td>";
              print "<td>$target_Timestamp</td>";
              print "<td>$target_Temperature</td>";
              print "<td>$target_Humidity</td>";
              print "<td>$target_CO2</td>";
              print "<td>$target_CO</td>";
              //print "<td>$target_Room_idRoom</td></tr>;
              if($target_Room_idRoom == 1)
                print "<td>Pesuhuone</td></tr>";
              else if ($target_Room_idRoom == 2)
                print "<td>Keittiö</td></tr>";
              else
                print "<td>Olohuone</td></tr>";
          }
          mysql_close($connection);
    }
?>
