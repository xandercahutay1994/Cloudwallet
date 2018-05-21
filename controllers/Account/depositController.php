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
		$idnum = $_SESSION['user_id'];	
	    $session_username = $_SESSION['email'];
	    $session_accountID = $_SESSION['myaccount_id'];
	}
	
	$balance = $account -> getAccountInfo("user_id",$idnum);
	$temp = 0;
	foreach($balance as $bal){
		$totalbalance = $bal['total_current_bal'];
		if($totalbalance >= intval(10000)){
			$err3 = "<span class='w3-text-red'>* You already reached the total balance limit of 10,000.00!Can't perform deposit action! </span><br>";
			$count = 1;
		}
	}
	if($count == 0){
		date_default_timezone_set('Asia/Manila');// g:i:a  
		$date = date('m/d/Y');
		$cnt = 0;
		$datetime = new DateTime('now',new DateTimeZone('Asia/Manila'));// g:i:a  
		$timeFormat = $datetime -> format("H:i A");
		$account_id = $session_accountID;
		$total = 10000;
		if($totalbalance >= 1000 && $totalbalance <= 10000 || $totalbalance >= 0){
			$trapAmount = $total - $totalbalance;
			$count = 1;
		}
		if($count == 1){
			if(isset($_POST['add_amount'])){
				$amount = $_POST['amount'];
				$checkDiv = intval($amount) % 100;
				if(!empty($amount)){
					if($amount <= $trapAmount){
						if($amount <= 2000 && $amount >= 100 && $checkDiv == 0){
							$getDeposit = $totalbalance + $amount;
							$transactBalance = $totalbalance + $amount;
							$oka = $account -> edit(array("total_current_bal"),array($getDeposit),'user_id',$idnum);
							$ok = $account -> addUserTransaction(array("account_id","recipient_no","transactType","transactDate","transactTime","transactAmt","transactBalance"),array($account_id,"-","D",$date,$timeFormat,$amount,$transactBalance));
							$amount = "";
							$msg = "Amount succesfully deposit!<br>";
						}else{
							$err = "<span class='w3-text-red'>* Deposit amount minimum of 100 and maximum of 2000 only!Amount must be divisible by 100...</span><br>"; 
						}
					}else{
						$err4 = "<span class='w3-text-green'>Your current balance is " . number_format($totalbalance,2) . "!<br><br></span>* Not allowed to deposit greater than " . number_format($trapAmount,2) . "!Maximum deposit is 10,000 only...<br>";
						$err3 = "";
					}
				}else{
					$err2 = "<span class='w3-text-red'>* Please input within a range amount you want to deposit!</span><br>";
				}
			}	
		}
	}
?>