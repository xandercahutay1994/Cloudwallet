<?php
	session_start();
	include('../../models/AccountModel.php');
	$account = new AccountModel();
	$counterSession = "";
	if(!isset($_SESSION['username'])){
		header('location:../User/views/user_LoginView.php');
		exit;	
	}else{
		$fullname =  $_SESSION['username'];	
		$id = $_SESSION['user_id'];			
		$session_accountID = $_SESSION['myaccount_id'];
	}

	$balance = $account -> getAccountInfo("user_id",$id);
	date_default_timezone_set('Asia/Manila');// g:i:a  
	$datetime = new DateTime('now',new DateTimeZone('Asia/Manila'));// g:i:a  
	$timeFormat = $datetime -> format("H:i A"); 
	$date = date('m/d/Y');
	$account_id = $session_accountID;
	foreach ($balance as $bal) {
		$totalbalance = $bal['total_current_bal'];
		if(isset($_POST['add_amount'])){
			$amount = $_POST['amount'];
			$checkDiv = intval($amount) % 100;	
			if($totalbalance != 0){
				if(!empty($amount)){
					if($amount <= $totalbalance && $amount >= 100 && $checkDiv == 0){
						$getWithdraw = $totalbalance - $amount;
						$ok = $account -> edit(array("total_current_bal"),array($getWithdraw),'user_id',$id);
						$oka = $account -> addUserTransaction(array("account_id","recipient_no","transactType","transactDate","transactTime","transactAmt","transactBalance"),array($account_id,"-","W",$date,$timeFormat,$amount,$getWithdraw));
						$msg = "Amount succesfully withdrawed!<br>";
						$secondWait = 1;
						header("Refresh:$secondWait");
					}else{
						$err = "<span class='w3-text-red'>* Withraw amount minimum of 100 and must be lesser or equal to total balance!Amount must be divisible by 100...</span><br>";
					}
				}else{
					$err2 = "<span class='w3-text-red'>* Please input an amount you want to withdraw!</span><br>";
				}
			}else{
				$err3 = "<span class='w3-text-red'>* Insufficient fund can't perform withdraw transaction!</span><br>";
			}
		}
	}
	
?>