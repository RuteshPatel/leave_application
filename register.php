<?php
include_once('connect.php');
$pagename = "Sign Up";
include('header.php');
/*if(isset($_POST['submit']) && $_POST['submit'] != "")
{
	echo "<pre>";
	print_r($_POST);
	$userclass = new UserClass($conn);
	$user_response = $userclass->InsertUser($_POST);
	if($user_response['status'] == "success")
	{
		header("location:index.php");
	}
}*/
?>
<form name="register_form" id="register_form" method="post">
	<table align="center" border="1" cellpadding="5" cellspacing="0" width="50%">
		<tr>
			<th colspan="2">Sign Up</th>
		</tr>
		<tr id="display_error" style="display:none;"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="name" id="name"><br/>
				<label id="name-error" class="error" for="name" style="display: none">Please enter Name</label>
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username" id="username"><br/>
				<label id="username-error" class="error" for="username" style="display: none">Please enter Username</label>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="email" name="email_address" id="email_address"><br/>
				<label id="email_address-error" class="error" for="email_address" style="display: none">Please enter Email</label>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="register_password" id="register_password"><i class="fa fa-eye" id="show_pass" title="Show Password"></i><br/>
				<label id="register_password-error" class="error" for="register_password" style="display: none">Please enter Username</label>
			</td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td>
				<input type="password" name="confirm_password" id="confirm_password"><br/>
				<label id="confirm_password-error" class="error" for="confirm_password" style="display: none">Please enter Confirm Password</label>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="reset" name="reset" id="reset" value="Reset" style="float: left;">
				<input type="submit" name="submit" id="submit" value="Sign Up" style="float: right;">
			</td>
		</tr>
	</table>
</form>
<?php include('footer.php'); ?>
<script type="text/javascript" src="js/register.js"></script>