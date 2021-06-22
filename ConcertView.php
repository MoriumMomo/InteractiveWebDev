
<?php

$link = mysqli_connect("localhost", "root", "", "concertbookings");
   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }

//Start or resume a session
session_start();

if ( !isset($_SESSION['user']) || $_SESSION['user'] == '' )
{
	header('Location: LoginUser.php');
	exit;
}


?>


               <?php


               $link = mysqli_connect("localhost", "root", "", "concertbookings");
                  // Check connection
                  if($link === false){
                      die("ERROR: Could not connect. " . mysqli_connect_error());
                  }

                  $query = "SELECT concert_date,band_name, venue_name, concert_id
                  FROM concerts as c join bands as b on c.band_id = b.band_id join venues as v on c.venue_id = v.venue_id
                  order by concert_date";






                  if($result = mysqli_query($link, $query)){
                      if(mysqli_num_rows($result) > 0){

                      echo "<tr><h1>Concert Lists:</h1></tr>";
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>";
                                  echo "<li><a>" . $row['concert_date'] . "\n";

                                  echo "<td>" . $row['band_name'] . "\n";
                                  echo "<td> Is Playing At \n";
                                  echo "<td>" . $row['venue_name'] . "<br />\n";

                                  echo "</tr>";
                              }

                          mysqli_free_result($result);
                      } else{
                          echo "No records matching your query were found.";
                      }
                   }else{
                      echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
                  }

                  // Close connection
                  mysqli_close($link);

                ?>
 <p>
   <a href="addconcert.php">Press here to go back to Add concert page</a>
 </p>
