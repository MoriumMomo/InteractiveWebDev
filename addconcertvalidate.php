<!DOCTYPE html>
<html>
<head>
  <title>add concert Form</title>


<body>
<?php

//create short variable names from the data received from the form
$band_id = $_POST['band_id'];
$venue_id = $_POST['venue_id'];
$concert_date= $_POST['concert_date'];


session_start();
if ( !isset($_SESSION['user']) || $_SESSION['user'] == '' )
{
	header('Location: login.php');
	exit;
}
@ $db = new mysqli ('localhost', 'root', '', 'concertbookings');
if (mysqli_connect_error())
{
  echo 'Error connecting to database :<br  />'.mysqli_connect_error();
  Exit;
}



$query = "INSERT INTO concerts VALUES (NULL, '".$band_id."', '".$venue_id."', '".$concert_date."')";
$result = $db->query($query);
if ($result)
{
   echo '<p>Concert added!</p>';

}
else
{
  echo '<p>Erorr inserting details. Erorr message:</p>';
  echo '<p>'.$db->error.'</p>';
}

?>



<a href="addconcert.php">Back to add concert Page</a>

<h2><strong>add concert Form</strong></h2>
  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">
    <tr style="background-color: #FFFFFF;">
      <td>band</td>
      <td>
        <?php echo $band_id; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>venue</td>
      <td>
        <?php echo $venue_id; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
    <tr style="background-color: #FFFFFF;">
      <td>concertdate</td>
      <td>
        <?php echo $concert_date; ?></td>
    </tr>


    </tr>
  </table>
</body>
</head>
</html>
