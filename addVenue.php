<?php
session_start();
if (!isset($_SESSION['user']))
{
   header("location:login.php");
   exit();
}
?>

<?php

$newrecord='';

if (isset($_POST['submitted'])) {

  @ $db = new mysqli ('localhost', 'root', '', 'concertbookings');
  if (mysqli_connect_error())
  {
    echo 'Error connecting to database :<br  />'.mysqli_connect_error();
    Exit;
  }

	$vname = $_POST['vname'];

	if (empty($vname)) {

    die('You forgot to enter a new venue name!');
	}

  $venue_query = "SELECT venue_name FROM venues WHERE venue_name  = '$vname'";
  $venue_results = $db->query($venue_query);

  if ($venue_results->num_rows > 0)
  {
    $newrecord = 'Your venue already exits, choose another. ';
  }
  else {
    $sqlinsert = "INSERT INTO Venues (venue_name) VALUES ('$vname')";
    if (!mysqli_query($db, $sqlinsert)) {
      die('error inserting new record');
        }
$newrecord = " New Venue has been added";

  }

  }

?>

<!DOCTYPE html>
<html>

   <head>
      <title>Assignment</title>
   </head>

   <body>
      <table width = "100%" border = "0">

         <tr>
            <td colspan = "2" bgcolor = "#dce6f2">
               <h1><center>Welcome to Free-Gigs, the Free Concert Website!</center></h1>
            </td>
         </tr>
         <tr valign = "top">
            <td bgcolor = "#dce6f2" width = "50">
               <b>Admin</b></br>
			   <br>
			   <b>Manage Venues</b>
			   <br />
			   <br />
			   <br />

	<ul>
        <li>
          <a href="manageband.php">Manage band</a>
        </li>
		<li>
          <a href="manageVenue.php">Manage Venues</a>
        </li>
        <li>
          <a href="addconcert.php">Add Concert</a>
        </li>
        <li>
          <a href="logout.php">Log Out</a>
        </li>
      </ul>
            </td>

            <td bgcolor = "#dce6f2" width = "100" height = "200">
	<p>
      Current Venues:
    </p>
    <h2><strong>List of Venues</strong></h2>

    <?php
      include ('connection.php');
      $query = "SELECT DISTINCT venues.venue_name, venues.venue_id FROM concerts INNER JOIN  venues ON (concerts.venue_id = venues.venue_id)";


      $results = $dbcon->query($query);
      echo '<table><tr>';
    	foreach($results as $row)

      {

    	 echo '<tr><td>'.'<li>'.$row['venue_name'].'</td>'.'</li>';

    	 echo '<td><a href="EditVenue.php?edit_id='.$row['venue_id'].'&bn='.$row['venue_name'].'">Edit</a> </tr> ';
      }

      $con = "SELECT venues.venue_name, venues.venue_id FROM venues WHERE NOT EXISTS (SELECT venue_id FROM concerts WHERE concerts.venue_id = venues.venue_id)";
      $result = $dbcon->query($con);
      foreach($result as $ro)

      {

    	 echo '<tr><td>'.'<li>'.$ro['venue_name'].'</td>'.'</li>';
    	 echo '<td><a href="EditVenue.php?edit_id='.$ro['venue_id'].'&bn='.$ro['venue_name'].'">Edit</a> ';
    	  echo '<a href="DeleteVenue.php?del_id='.$ro['venue_id'].'"
    	  onclick="return confirm(\'Do you want to delete the venue?\');">Delete</a> </td></tr>';
      }
      echo '</table>';

     ?>
    <p>
      <h2>Add New Venue:</h2>
    </p>

	<form method="POST" action="">
	<input type="hidden" name="submitted" value="true" />
	<fieldset>

		<label>Name:<input type="text" name="vname" /></label>
	</fieldset>
	<br />
	<input type="submit" value="Add Venue" />
	</form>
	<span><?php echo $newrecord; ?></span>
            </td>
         </tr>
         <tr>
            <td colspan = "2" bgcolor = "#dce6f2">
               <center>

               </center>
            </td>
         </tr>

      </table>
   </body>

</html>
