<?php 
include('connect.php');
$action = $_GET['action'];
if($action == "checkemail")
{
	$query = "SELECT * FROM user_master WHERE email = '".$_GET['email_address']."' AND is_deleted = '0'";
	$exceute_query = mysqli_query($query, $conn);
	$num_rows = mysqli_num_rows($exceute_query);
	if($num_rows > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}
else if($action == "submit_user_data")
{
	$userclass = new UserClass($conn);
	$response = $userclass->InsertUser($_POST);
	echo json_encode($response);
	exit;
}
?>