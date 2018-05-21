<?php
	include('../../controllers/User/homepageController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cloud Wallet Homepage</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
	<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<form method="POST">
		<?php include('../../js/homepageJs/homepageViewJs.php'); ?>	
		<div class="w3-container" style="margin-top: 20px;">
			<div class="w3-black w3-cart w3-round-medium" style="margin-left: 225px;width: 1000px">
				<span style="margin-left: 20px"><img src="../../img/cloud.jpeg" width="180px" height="80px;" style="margin-top: 5px;" /></span><br>	
				<a href="user_LogOutView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">SIGN-OUT</a>
				<a href="passwordView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">CHANGE PASSWORD</a>
				<span class="w3-right w3-small" style="margin-top:-21px;margin-right:40px;">NOTIFICATION</span><input type="submit" class="w3-badge w3-blue w3-right" style="margin-top:-26px;" name="notify" value="<?php echo count($receiveNotification); ?>"/>
				<div>
					<hr>
					<span style="margin-left: 30px"><?php if(isset($fullname)){echo "Welcome " . strtoupper($fullname) . "!";$_SESSION['username']=$fullname;} ?></span>
					<center  style="margin-top: 40px">
						<span>My Dashboard</span>				
					</center>
					<div style="margin-top: 30px;margin-left: 220px;">
						<table>
							<tr>
								<td><label>Account No:</label></td>
								<td><label class="" style="margin-top: 30px;margin-left: 50px;"><?php if(isset($account_no)){ echo 
									$account_no;}?></label></td>
							</tr>
							<tr>
								<td><label>Name:</label></td>
								<td><label style="margin-top: 30px;margin-left: 50px;"><?php if(isset($fullname)){echo strtoupper($fullname);} ?></label></td>
							</tr>
							<tr>
								<td><label>Date Registered:</label></td>
								<td><label style="margin-top: 30px;margin-left: 50px;"><?php if(isset($date_registered)){echo strtoupper(htmlentities($date_registered)); }?></label></td>
							</tr>
							<tr></tr>
							<tr></tr><tr></tr><tr></tr>
							<tr>
								<td><label>Total Current Balance:</label></td>
								<td><label style="margin-top: 30px;margin-left: 50px;"><?php if(isset($current_bal)){echo number_format($current_bal,2);}?></label></td>
							</tr>
							<tr>
								<td><label>Total Sent Amount: </label></td>
								<td><label  style="margin-top: 30px;margin-left: 50px;"><?php if(isset($current_bal)){echo number_format($total_sent,2); }?></label></td>	
							</tr>
						</table>	
					</div>
					<div style="margin-top: 30px;margin-left: 330px;">
						<span>Maximum amount is 10,000 per depositor.</span>
					</div>
					<hr>
					<div style="margin-top: 30px;margin-left: 150px;">
						<input class="w3-button w3-green w3-round" style="width: 220px;" type="submit" name="deposit" value="DEPOSIT">&nbsp &nbsp
						<input class="w3-button w3-yellow w3-round" style="width: 220px;" type="submit" name="withdraw" value="WITHDRAW">&nbsp &nbsp
						<input class="w3-button w3-blue w3-round" style="width: 220px;" type="submit" name="send" value="SEND">
					</div>
						<div style="margin-top: 30px;margin-left: 150px;" class="w3-footer">
						<a href="../Transaction/statementOfAccountView.php" class="w3-button w3-grey w3-round" style="width: 700px;"> View Statement of Account </a><br><br>
						<a href="../Transaction/depositsOrWithdrawalView.php" class="w3-button w3-grey w3-round" style="width: 700px;"> View Deposit and Withdrawal Transactions </a><br><br>
						<a href="../Transaction/sentOrReceiveView.php" class="w3-button w3-grey w3-round" style="width: 700px;"> View Sent and Received Transactions </a>
					</div><br>
					<?php include('../../js/homepageJs/homepageJs.php'); ?>
				</div>
			</div>
		</div>	
	</form>
</body>
</html>