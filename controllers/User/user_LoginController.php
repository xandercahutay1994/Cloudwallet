<?php
	session_start();
	include('../../models/UserModel.php');
	$user = new UserModel();

	$getId = $user -> getUserId();
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$count = 0;
		if(!empty($username) && !empty($password)){
			foreach ($getId as $key) {	
				$user_username = $key['user_username'];
				$user_idnum = $key['user_id'];
				$user_password = $key['user_password'];
				$user_lastname = $key['user_lastname'];
				$user_firstname = $key['user_firstname'];
				$concat = $user_firstname . " " . $user_lastname;
				$idnum = $user_idnum;
				if($user_username == $username && $user_password == $password){
					$session_username = $username;
					$count = 1;
					$_SESSION['username'] = $concat;
					$_SESSION['user_id'] = $idnum;
					$_SESSION['email'] = $session_username;
	 				header("location:../../views/User/homepageView.php?name=$concat");
				}
			}
			if($count == 0){
				$error = "<span class='w3-text-red'>* Username/Password is incorrect</span><br>";		
			}
		}else{
			$error2 = "<span class='w3-text-red'>* All fields must be fill out!</span>";
		}
	}
?>