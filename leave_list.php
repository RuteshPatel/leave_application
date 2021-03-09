<?php
include_once('connect.php');
$pagename = "Apply Leave";
include('header.php');
$userclass = new UserClass($conn);
$user_leave_data = $userclass->GetAllLeaveApplication();
?>
<table  align="center" border="1" cellpadding="5" cellspacing="0" width="50%">
	<tr>
		<th colspan="3">Leave Applications</th>
		<th><a href="apply_leave.php">Apply User's Leave</a></th>
	</tr>
	<tr>
		<th>Sr. No.</th>
		<th>Name</th>
		<th>Date</th>
		<th>Reason</th>
	</tr>
	<?php 
	$i = 1;
	foreach($user_leave_data as $value) { ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['from_date'].' - '.$value['to_date']; ?></td>
		<td><?php echo $value['reason']; ?></td>
	</tr>
	<?php $i++; } ?>
</table>
<?php include('footer.php'); ?>