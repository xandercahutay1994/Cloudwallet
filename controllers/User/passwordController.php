<?php
	session_start();
	include('../../models/UserModel.php');
	$user = new UserModel();
	$count = 0;

	if(!isset($_SESSION['username'])){
		header('location:../User/views/user_LoginView.php');
		exit;	
	}else{
		$fullname =  $_SESSION['username'];	
		$session_username = $_SESSION['email'];
	}

	if(isset($_SESSION['myaccount_no'])){
		$myaccount_no = $_SESSION['myaccount_no'];
	}

	$confirmPass = $user -> getAccountUsernameInfo("user_username", $session_username);
	if(isset($_POST['confirm'])){
		$curr_pass = $_POST['curr_pass'];
		$count = 0;
		$temp = 0;
		foreach ($confirmPass as $key) {
			$validUsername = $key['user_username'];
			$validId = $key['user_id'];
			$validPass = $key['user_password'];
			if($session_username == $validUsername){
				$count = 1;
				$_SESSION['orig_id'] = $validId;
			}
			if($count == 1){
				if($curr_pass == $validPass){
					$password = "";
					$_SESSION['orig_pass'] = $validPass;
					$temp = 1;
				}		
			}
		}
		if($temp == 0){
			$err = "* Password is invalid!<br><br>";
			
		}
	}
	if(isset($_POST['save'])){
		$orig = $_SESSION['orig_id'];
		
		$one = $_POST['password_one'];
		$two = $_POST['password_two'];
		$validPass = $_SESSION['orig_pass'];
		if(!empty($one) && !empty($two)){
			$count = 0;
			if($one == $validPass){
				$error = "";
				$count = 1;
			}else if($one != $two){
			 	$notMatch = "";
			 	$count = 1;
			}
			if($count == 0){
				if(preg_match("^(?=.*\d)(?=.*[a-zA-Z]).{8}$^", $one)){	
					$ok = $user -> edit(array("user_password"),array($one),'user_id',$orig);	
					$match = "";	
				}else{
					$notValid = "";	
				}		
			}
		}else{
			$empty = "";			
		}
	
	}
?>