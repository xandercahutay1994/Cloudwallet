<?php
	session_start();
	include('../../models/AccountModel.php');
	$account = new AccountModel();
	$count = 0;

	if(!isset($_SESSION['username'])){
		header('location:../User/views/user_LoginView.php');
		exit;	
	}else{
		$fullname =  $_SESSION['username'];	
		$idnum = $_SESSION['account_id'];		
		$session_username = $_SESSION['email'];
		$session_accountID = $_SESSION['myaccount_id'];
	}

	if(isset($_SESSION['account_no']) || isset($_SESSION['account_id']) ){
		$account_no =  $_SESSION['account_no'];
		$user_idnum = $_SESSION['account_id'];
		$account_num = $account -> getUserInfo("user_id", $user_idnum);

		foreach($account_num as $ac){
			$fname = $ac['user_firstname'];
			$lname = $ac['user_lastname'];
			$concat = $lname . ", " . $fname;
		}
	}
	$balance = $account -> getAccountInfo("user_id",$idnum);
	if(isset($_POST['send'])){
		$amount = $_POST['amount'];
		foreach($balance as $bal){
			$totalbalance = $bal['total_current_bal'];
			if($totalbalance != 0){
				$checkDiv = intval($amount) % 100;
				if(!empty($amount)){
					if($amount <= 2000 && $amount >=100 && $checkDiv == 0){
						$password = "";
						$_SESSION['amount'] = $amount;	
					}else{
						$err = "<span class='w3-text-red'>* Send amount minimum of 100 and maximum of 2000 only!Amount must be divisible by 100...</span><br>";
					}
				}else{
					$err2 = "<span class='w3-text-red'>* Please input within a range amount you want to deposit</span><br>";
				}
			}
 		}
	}
		
	$getUserId = $account -> getAccountInfo("account_id",$session_accountID);
	foreach($getUserId as $key){
		$myAccount_ID = $key['account_no'];
	}
	$pushAccount = $account -> getAccountInfo("account_no",$account_no);
	foreach ($pushAccount as $push) {
		$total_sent_amt = $push['total_sent_amt'];
		$total_curr_bal = $push['total_current_bal'];
	}
	date_default_timezone_set('Asia/Manila');// g:i:a  
	$date = date('m/d/Y');
	$datetime = new DateTime('now',new DateTimeZone('Asia/Manila'));// g:i:a  
	$timeFormat = $datetime -> format("H:i A"); 
	$account_id = $session_accountID;
	if (isset($_POST['confirm'])) {
		if(isset($_SESSION['amount'])){
			$amount = $_SESSION['amount'];
			$passInput = $_POST['password'];
			$confirmPass = $account -> getAccountUsernameInfo("user_username", $session_username);
			foreach ($confirmPass as $key) {
				$validUsername = $key['user_username'];
				$validId = $key['user_id'];
				$validPass = $key['user_password'];
				if($session_username == $validUsername){
					if($validPass == $passInput){
						$send = "";
						$tempBalance = $account -> getAccountInfo("user_id",$validId);
						foreach ($tempBalance as $deductBalance) {
							$holdBalance = $deductBalance['total_current_bal'];
							$holdSentAmount = $deductBalance['total_sent_amt'];
							if($holdBalance != 0){
								if($amount > $holdBalance){
									$restrict = "";	
								}else{
									$actualBalance = intval($holdBalance) - intval($amount);
									$actualBalance2 = intval($total_curr_bal) + intval($amount);
									$actualSentAmount = $holdSentAmount + $amount;
									$rest = $amount + $total_curr_bal;
									if($rest <= 10000){
										$oka = $account -> edit(array("total_current_bal","total_sent_amt"),array($actualBalance,$actualSentAmount),'user_id',$validId);	
										$ok = $account -> edit(array("total_current_bal"),array($actualBalance2),'user_id',$idnum);
										$oks = $account -> addUserTransaction(array("account_id","recipient_no","transactType","transactDate","transactTime","transactAmt","transactBalance"),array($user_idnum,$myAccount_ID,"D",$date,$timeFormat,$amount,$actualBalance2));
										$okay = $account -> addUserTransaction(array("account_id","recipient_no","transactType","transactDate","transactTime","transactAmt","transactBalance"),array($account_id,$account_no,"W",$date,$timeFormat,$amount,$actualBalance));
										$notify = $account -> addNotification(array("notify_id","receiver_no","sender_no","sendDate","sendTime","sendAmount","status"),array("",$account_no,$myAccount_ID,$date,$timeFormat,$amount,0));
										$amount="";
									}else{
										$trap = "";
									}
								}
							}else{
								$noAction = "";
							}
						}
					}else{
						$err4 = "<script>alert('* Password is invalid!Please try again with a valid password...')</script>";
					}
				}
			}	
		}
	}
?>