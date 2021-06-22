<?php
session_start(); 
// Is the admin logged in? 
if (!isset($_SESSION['user']))
{
   header("location:login.php");
   exit();
}
?>


<?php
include("connection.php");   
error_reporting(0);

$vn = $_GET['vn']; 
$edit = $_GET['edit_id']; 
?> 





<html>
<head>
   <title>Edit Venue</title>
   
<body>
<form action="" method="GET">
<tr>
<td>New Details</td>
<td><input type="hidden" value="<?php echo "$edit" ?>" name="venue_id" ></td>
<td><input type="text" value="<?php echo "$vn" ?>" name="venue_name" ></td>

</tr>
<tr>
<td><input type="submit" id="button" name="submit" value="Update"><td>
</tr>
</form>
</body>
</html>

<?php
if($_GET['submit'])
{
	
    $venue_id = $_GET ['venue_id'];
	$venue_name = $_GET['venue_name'];
	
$query = "UPDATE venues SET venue_name='$venue_name', venue_id='$venue_id' WHERE venue_id='$venue_id'";
$results =$dbcon->query($query);

if($results)
{
	echo "<meta http-equiv='refresh' content='0;url=manageVenues.php'>";
}
else 
{
	echo "Not updated";
}
}
?> 