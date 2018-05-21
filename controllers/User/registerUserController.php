<?php
	include('../../models/UserModel.php');
	$user = new UserModel();

	$getId = $user -> getUserId();
	$getTransactId = $user -> getTransactId();
	$getAccountID = $user -> getAccountId();
	$getMaxID = $user -> getMaxID("user_id");
	

	// !preg_match("^[_a-z0-9]+(\._[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",
	if(isset($_POST['register'])){
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$username  = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$current_bal = 2000;
		$set_amt = 0;
		$count = 0;
		$temp = 0;
		date_default_timezone_set('Asia/Manila');// g:i:a  
		$date = date('F j, Y');

		$datetime = new DateTime('now',new DateTimeZone('Asia/Manila'));// g:i:a  
		$timeFormat = $datetime -> format("H:i A");
		$dateFormat = date('m/d/Y');
		//account #
		$min = intval(1000000000);
		$max = intval(9999999999);
		$cnt = 0;
		$randId = mt_rand($min,$max);		
		if(!empty($lastname) && !empty($firstname) && !empty($username) && !empty($password) && !empty($password2)){
			foreach ($getId as $key) {	
				$user_id = $key['user_id'] + 1;
				$uName = $key['user_username'];
				if($uName == $username){
					$error3  = "* Username already registered please enter a unique username!<br>";
					$temp = 1;
				}
			}
			if($temp == 0){
				if(!preg_match("^[A-Za-z]$^", $firstname)){
					$error5 = "* Username must only be a letter!<br>";
					$count = 1;
				}
				if(!preg_match("^[A-Za-z]$^", $lastname)){
					$error6 = "* Lastname must only be a letter!<br>";
					$count = 1;
				}
				if(!preg_match("^(?=.*\d)(?=.[a-zA-Z0-9]).{8}$^", $password)){
					$error = "* Password must be 8 in length,at least 1 numeric and 1 alphabetic & special character!<br>";
					$count = 1;
				}
				if($password != $password2){
					$error2 = "* Password didn't match please fill out the fields with correct data!<br>";
					$count = 1;
				}
				if($count == 0){
					if(is_null($user_id)){
						$user_id = 1;
					}else{
						$user_id = $key['user_id'] + 1;
					}
					$ok = $user -> addUser(array("",$lastname,$firstname,$username,$password));
					$oka = $user -> addUserAccount(array("user_id","account_no","date_registered","total_current_bal","total_sent_amt","status"),array($user_id,$randId,$date,$current_bal,$set_amt,"ACTIVE"));
						$okay = $user -> addTransaction(array("account_id","recipient_no","transactType","transactDate","transactTime","transactAmt","transactBalance"),array($user_id,"-","D",$dateFormat,$timeFormat,"-",$current_bal));
				    $lastname="";$firstname="";$username="";$password="";$password2 = "";
					$msg = "<span class='w3-text-yellow'>You are successfully registered!</span><br>";		
				}
			}
		}else{
			$error4 = "* All fields are required to fill out!<br>";
		}
	}
	//!preg_match("^[_a-z0-9]+(\._[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$")
?>
