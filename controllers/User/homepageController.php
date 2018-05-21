<?php
	session_start();
	include('../../models/UserModel.php');
	$user = new UserModel();

	if(!isset($_SESSION['username'])){
		header('location:../../views/User/user_LoginView.php');
		exit;	
	}else{
		if(isset($_POST['notify'])){
			$notify = "";
		}
		$fullname =  $_SESSION['username'];	
		$idnum =  $_SESSION['user_id'];	
		$session_username = $_SESSION['email'];
		$userInfo = $user -> getAccountUsernameId("user_username",$session_username);
		foreach ($userInfo as $info) {
			$vUsername = $info['user_username'];
			$validId = $info['user_id'];
			$cnt = 0;
			$tmp = 0;
			if($vUsername != $session_username){
				$cnt = 1;
			}
			if($cnt == 0){
				$_SESSION['user_id'] = $validId;
				if(isset($idnum)){
					$tmp = 1;
				}
				if($tmp == 1){
				$accountInfo = $user -> getAccountInfo("user_id",$validId);
				foreach ($accountInfo as $info){
						$account_id = $info['account_id'];
						$user_id = $info['user_id'];
						$account_no = $info['account_no'];
						$date_registered = $info['date_registered'];
						$current_bal = $info['total_current_bal'];
						$total_sent = $info['total_sent_amt'];
						$_SESSION['myaccount_no'] = $account_no;
						$_SESSION['myaccount_id'] = $account_id;
 					}
				}
			}
		}
	}
	$receiveNotification = $user -> receiveNotification("receiver_no",$account_no);	
	if (isset($_POST['deposit'])){
		header('location:../../views/Account/depositView.php');
	}else if (isset($_POST['withdraw'])){
		header('location:../../views/Account/withdrawView.php');
	}else if (isset($_POST['send'])){
		header('location:../../views/Account/sendView.php');
	}
	if(isset($_POST['notify'])){
		$notify = "";
	}
	if(isset($_POST['zero'])){
		$updateClickNotification = $user -> updateClickNotification(array("status"),array('1'),'receiver_no',$account_no);
		$secondWait = 0.1;
		header("Refresh:$secondWait");
	}
?>