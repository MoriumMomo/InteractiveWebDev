<?php

session_start();
// Is the admin logged in?
if (!isset($_SESSION['user']))
{
   header("location:login.php");
   exit();
}

@ $db = new mysqli ('localhost', 'root', '', 'concertbookings');
if (mysqli_connect_error())
{
  echo 'Error connecting to database :<br  />'.mysqli_connect_error();
  Exit;
}


?>


<!DOCTYPE html>
<html>

   <head>
     <title>add concert Form</title>
     <script language="JaveScript"  type="text/javascript">
     function ValidateForm()
       {
         // Create a variable to refer to the form
         var form = document.addconcertform;

         if (new Date(form.concert_date.value) < new Date()) {
           alert('Date is in the past.');
           return false;
         }
         return true;
         }
         </script>
      <form name="addconcertform" method="post" action="addconcertvalidate.php"  onsubmit="return ValidateForm();">

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
			   <b>Add Concert</b>
			   <br />
			   <br />
			   <br />

	<ul>

        <li>
          <a href="manageband.php">Manage band</a>
        </li>
        <li>
          <a href="managevenues.php">Manage Venues</a>
        </li>
        <li>
          <a href="logout.php">Log Out</a>
        </li>
      </ul>
            </td>

            <td bgcolor = "#dce6f2" width = "100" height = "200">
	<p>
    <br>
    <li>
      <a href="concertView.php">Press here to view all concerts</a>
    </li>

        <br />
      Add Concert:

    <label for="bands">Band:</label>
	<select name="band_id">
	   <?php
	   $band_query = 'SELECT * FROM bands';
	   $band_results = $db->query($band_query);

	   while ($band_row = $band_results->fetch_assoc())
	   {
		   echo '<option value="'.$band_row['band_id'].'">';
		   echo $band_row['band_name'].'</option>';
	   }
	   ?>
	</select>
	<br><br>
	<label for="venues">Venue:</label>
	<select name="venue_id">

	   <?php
	   $venue_query = 'SELECT * FROM venues';
	   $venue_results = $db->query($venue_query);

	   while ($venue_row = $venue_results->fetch_assoc())
	   {
		   echo '<option value ="'.$venue_row['venue_id'].'">';
		   echo $venue_row['venue_name'].'</option>';

	   }
	   ?>

    </select>
	<label>Date: <input type='datetime-local' name='concert_date' placeholder='YYYY-MM-DD' required pattern="\d{4}-\d{2}-\d{2}">
	<span class="validity"></span>



	<br />
  </fieldset>
  <br />
    <input type="submit" name="Add Cocert" value="Add Cocert" />

</td>
	</label>
	<br><br>
    <label>





	</label>
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
</form>
</html>
