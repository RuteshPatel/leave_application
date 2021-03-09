<?php
include_once('connect.php');
$pagename = "User's List";
include('header.php');

$user_class = new UserClass($conn);
$users_data = $user_class->GetAllUser();
?>
<table align="center" border="1" cellpadding="5" cellspacing="0" width="50%" id="listtable">
	<tr>
		<th colspan="4">User's List</th>
		<th><a href="apply_leave.php">Apply User's Leave</a></th>
	</tr>
	<tr>
		<th>Name</th>
		<th>Username</th>
		<th>Email</th>
		<th>Added Datetime</th>
		<th>Apply Leave</th>
	</tr>
	<?php foreach($users_data as $value) { ?>
	<tr>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['username']; ?></td>
		<td><?php echo $value['email']; ?></td>
		<td><?php echo $value['created_datetime']; ?></td>
		<td><a href="apply_leave.php?user_id=<?php echo base64_encode($value['user_id']); ?>">Apply Leave</a></td>
	</tr>
	<?php } ?>
</table>
<?php include('footer.php'); ?>