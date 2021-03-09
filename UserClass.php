<?php
include_once('connect.php');
class UserClass
{
	public $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}

	function CheckLoginPassword($data)
	{
		$response = array();
		$query = "SELECT * FROM user_master WHERE (email = '".$data['username_email']."' OR username = '".$data['username_email']."') AND is_deleted = '0'";
		$exceute_query = mysqli_query($this->conn,$query);
		$result = mysqli_fetch_assoc($exceute_query);
		if(password_verify($data['login_psd'],$result['password']))
		{
			$response['status'] = "success";
		}
		else
		{
			$response['status'] = "error";
			$response['code'] = "1";
			$response['msg']	= "Invalid Username/Email & Password";
		}
		return $response;
	}
	function GetAllUser()
	{
		$response = array();
		$query = "SELECT * FROM user_master WHERE is_deleted = '0'";
		$exceute_query = mysqli_query($this->conn,$query);
		while($result = mysqli_fetch_assoc($exceute_query))
		{
			$response[] = $result;
		}
		return $response;
	}
	function InsertUser($data)
	{
		$response = array();
		$username = $data['username'];
		$name = $data['name'];
		$email_address = $data['email_address'];
		$register_password = password_hash($data['register_password'],PASSWORD_DEFAULT);
		$created_datetime = date('Y-m-d H:i');

		$query = "INSERT INTO user_master (username,name,email,password,created_datetime) VALUES ('".$username."','".$name."','".$email_address."','".$register_password."','".$created_datetime."')";
		mysqli_query($this->conn,$query);
		$response['status'] = 'success';
		return $response;
	}
	function InsertLeaveApplication($data)
	{
		$response = array();
		$from_date = str_replace('/','-', $data['from_date']);
		$to_date = str_replace('/','-', $data['to_date']);
		$reason = $data['reason'];
		if(empty($data['user_name']) && $data['user_name'] == "")
		{
			$user_id = base64_decode($data['user_id']);
		}
		else
		{
			$user_id = $data['user_name'];
		}

		$query = "INSERT INTO leave_list (user_id,from_date,to_date,reason) VALUES (".$user_id.",'".date('Y-m-d',strtotime($from_date))."','".date('Y-m-d',strtotime($to_date))."','".$reason."')";
		mysqli_query($this->conn,$query);
		$response['status'] = 'success';
		return $response;
	}
	function GetAllLeaveApplication()
	{
		$response = array();
		$query = "SELECT um.name,ll.from_date,ll.to_date,ll.reason FROM leave_list ll LEFT JOIN user_master um ON ll.user_id = um.user_id  WHERE is_deleted = '0'";
		$exceute_query = mysqli_query($this->conn,$query);
		while($result = mysqli_fetch_assoc($exceute_query))
		{
			$response[] = $result;
		}
		return $response;
	}
}
?>