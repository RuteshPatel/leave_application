<?php
include_once('connect.php');
$pagename = "Apply Leave";
include('header.php');
$user_id = '';
if(isset($_GET['user_id']) && $_GET['user_id'] != "")
{
	$user_id = $_GET['user_id'];
}
$userclass = new UserClass($conn);
if(isset($_POST['apply']) && $_POST['apply'] != "")
{
	$response = $userclass->InsertLeaveApplication($_POST);
	if($response['status'] == "success")
	{
		header("location:leave_list.php");
	}
}
$user_data = $userclass->GetAllUser();
?>
<style type="text/css">
#from_date,#to_date { width: 40%; }
td input[type=text] { width: 80%; }
td textarea[type=text] { width: 80%; }
td select { width: 80%; }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<form name="leave_form" id="leave_form" method="post">
	<table  align="center" border="1" cellpadding="5" cellspacing="0" width="50%">
		<tr>
			<th colspan="2">Apply Leave</th>
		</tr>
		<?php 
		if(empty($user_id) && $user_id == "") { ?>
		<tr>
			<td>Select User's</td>
			<td>
				<select id="user_name" name="user_name">
					<option value="">Select</option>
					<?php foreach($user_data as $value) { ?>
					<option value="<?php echo $value['user_id']; ?>"><?php echo $value['name']; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td>Select Date (From - To)</td>
			<td><input type="text" name="from_date" id="from_date" value=""> &nbsp; <input type="text" name="to_date" id="to_date" value=""></td>
		</tr>
		<tr>
			<td>Reason</td>
			<td><textarea type="text" id="reason" name="reason" rows="5" ></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="reset" name="reset" id="reset" value="Reset" style="float: left;">
				<input type="submit" name="apply" id="apply" value="Apply" style="float: right;">
			</td>
		</tr>
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
	</table>
</form>
<?php include('footer.php'); ?>
<script type="text/javascript" src="js/apply_leave.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>