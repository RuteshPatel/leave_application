<?php
include_once('connect.php');
$pagename = "Login";
include('header.php');
$error_message = '';

if(isset($_POST['submit']) && $_POST['submit'] != "")
{
	$user_class = new UserClass($conn);
	$response = $user_class->CheckLoginPassword($_POST);
	if($response['status'] == "error"){
		$error_message = $response['msg'];
	} else {
		header('location:list.php');
	}

}
?>
<style type="text/css">
td input[type=text],input[type=password] { width: 80%; }
</style>
<form name="login_form" id="login_form" method="post">
	<table align="center" border="1" cellpadding="5" cellspacing="0" width="50%">
		<tr>
			<th colspan="2">LOGIN</th>
		</tr>
		<tr id="display_error" <?php echo empty($error_message) ? 'style="display:none;"' : ''; ?> >
			<td colspan="2" style="color: red;text-align: center;font-size: 20px;"><?php echo $error_message; ?></td>
		</tr>
		<tr>
			<td>Username Or Email</td>
			<td>
				<input type="text" name="username_email" id="username_email"><br/>
				<label id="username_email-error" class="error" for="username_email" style="display: none">Please enter Username Or Email</label>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="login_psd" id="login_psd" maxlength="8"><i class="fa fa-eye" id="show_pass" title="Show Password"></i><br>
				<label id="login_psd-error" class="error" for="login_psd"  style="display: none">Please enter Password</label>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="reset" name="reset" id="reset" value="Reset" style="float: left;">
				<input type="submit" name="submit" id="submit" value="Login In">
				<input type="button" name="singup" id="signup" value="Sign Up" style="float: right;">
			</td>
		</tr>
	</table>
</form>
<?php include('footer.php'); ?>
<script type="text/javascript" src="js/login.js"></script>