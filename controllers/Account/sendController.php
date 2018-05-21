<?php
	session_start();
	include('../../models/AccountModel.php');
	$account = new AccountModel();
	
	if(!isset($_SESSION['username'])){
		header('location:../User/views/user_LoginView.php');
		exit;	
	}else{
		$fullname =  $_SESSION['username'];	
		$session_username = $_SESSION['email'];
	}
	$account_no = $account -> searchAccountInfo();

	if(isset($_SESSION['myaccount_no'])){
		$myaccount_no = $_SESSION['myaccount_no'];
		foreach ($account_no as $account) {
			$search_account = $account['account_no'];
			$user_idnum = $account['user_id'];
			$account_id = $account['account_id'];
			if(isset($_POST['search'])){
			    $send_account = $_POST['account_no'];
			    if(!empty($send_account)){
			    	if($search_account == $myaccount_no){
			    		$err3 = "* You can't send to your own account number please enter other account #!<br><br>";
			    	}else
			    	if($search_account == $send_account){
				   		$_SESSION['account_no'] = $search_account;
				   		$_SESSION['account_id'] = $user_idnum;
				   		$count = 1;
				   		header('location:../../views/Account/sendMoneyView.php');
				   	}else{
				   		$err = "* The account number you entered is invalid!<br><br>"; 
				   	}	
			    }else{
			    	$err2 = "* Please enter the recipient's account #!<br><br>"; 
			    }
			}	
		}
	}
?>