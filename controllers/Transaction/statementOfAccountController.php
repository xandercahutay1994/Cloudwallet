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
	$transactionFilterRecord = 	$transaction -> getTransactionFilterRecord("account_id",$session_accountID,"transactDate","","");
	
	if(!isset($_POST['list'])){
		$displayAccount = $transaction -> displayAccount("account_id",$session_accountID); 
	}else 
	if(isset($_POST['list'])){	
		$displayAccount = $transaction -> displayAccount("account_id",""); 
		$temp = 0;$tmp = 0;
		$current_date = date('m/d/Y');
		$from = strtotime($_POST['from']);
		$formatFrom = date("m/d/Y",$from);
	    $to = strtotime($_POST['to']);
	    $formatTo = date("m/d/Y",$to);
	    if(!empty($from) && !empty($to)){
	    	if($from < $to){
    			if ($current_date < $formatFrom || $current_date < $formatTo)
		 		{
		 			$err2 = "<br><br>* The Date must not be exceed to current date!";
		 		}else{
		 			$transactionFilterRecord = 	$transaction -> getTransactionFilterRecord("account_id",$session_accountID,"transactDate",$formatFrom,$formatTo);
		 			$tmp = 1;
		 			if($transactionFilterRecord == false){
						$err4 = "<br><br>* Empty Result!";
					}
		 		}	
	    	}else{
	    		$err3 = "<br><br>* From date must be lesser than to date!";
	    	}
	 		$temp = 1;
	    }
	    if($temp == 0){
			 $err = "<br><br>* Select from and to dates please!";
		}
	}
?>