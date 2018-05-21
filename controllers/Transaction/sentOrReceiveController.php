<?php
	session_start();
	include('../../models/TransactionModel.php');
	$transaction = new TransactionModel();
	date_default_timezone_set('Asia/Manila');// g:i:a  
	$date = date('m/d/Y');

	$count = 1;
	if(!isset($_SESSION['username'])){
		header('location:../User/views/user_LoginView.php');
		exit;	
	}else{
		$fullname =  $_SESSION['username'];	
		$idnum = $_SESSION['user_id'];	
	    $session_username = $_SESSION['email'];
	    $session_accountID = $_SESSION['myaccount_id'];
	}
	//	$transactionRecord = $transaction -> getTransactionRecord("account_id",$session_accountID);
	$transactionFilterRecordType = 	$transaction -> getTransactionFilterRecordType("account_id",$session_accountID,"transactDate","","","transactType","");
	$getFilterAllRecordType = 	$transaction -> getFilterAllRecordType("account_id",$session_accountID,"transactDate","","");
	if(!isset($_POST['list'])){
		$displayAccount = $transaction -> displayAccount("account_id",$session_accountID); 
	}else
	if(isset($_POST['list'])){	
		$displayAccount = $transaction -> displayAccount("account_id",""); 
		$temp = 0;$tmp = 0;
		$current_date = date('m/d/Y');
		$cnt = 0;$bla=0;
		$from = strtotime($_POST['from']);
		$formatFrom = date("m/d/Y",$from);
	    $to = strtotime($_POST['to']);
	    $formatTo = date("m/d/Y",$to);
		$type = $_POST['select'];
		if(empty($type)){
			$err4 = "<br><br>* Please select type of transaction first!";
		}else
		if(!empty($from) && !empty($to)){
			if($from < $to){
				if ($current_date < $formatFrom || $current_date < $formatTo){
					$err2 = "<br><br>* The Date must not be exceed to current date!";
					$cnt = 1;
				}
				if($cnt == 0){
					$transactionFilterRecordType = 	$transaction -> getTransactionFilterRecordType("account_id",$session_accountID,"transactDate",$formatFrom,$formatTo,"transactType",$type);
						$tmp = 1;$bla = 0;
					if($transactionFilterRecordType == false){
						$bla=1;
					}
					if(isset($type) && $type == "DW"){
						$getFilterAllRecordType = 	$transaction -> getFilterAllRecordType("account_id",$session_accountID,"transactDate",$formatFrom,$formatTo);
						$bla = 0;
						if($getFilterAllRecordType == false ){
							$bla=1;
						}
					}
				}
				if($tmp == 0){
					 $err = "<br><br>* Select valid date range and type of transaction!";
				}
			}else{
				$err3 = "<br><br>* From date must be lesser than to date!";
			}
			if($bla == 1 ){
				$err4 = "<br><br>* Empty Result!";
			}else{
				$err4 = "";
			}
		}
	}
?>