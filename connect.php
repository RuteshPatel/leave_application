<?php 
$conn = mysqli_connect("localhost","root","","leave_application");
if(!$conn)
{
	die("Failed to connect: " . mysqli_connect_error());
}
else
{
	mysqli_select_db($conn,"leave_application"); 
}
//session_start();
spl_autoload_register(function ($class_name) {
    include($class_name . '.php');
});
?>