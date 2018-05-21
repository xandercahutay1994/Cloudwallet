<?php
	include('../../controllers/Account/sendMoneyController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>	
		SEND MONEY PAGE
	</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
	<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
</had>
<body>
	<form method="POST">
		<?php include('../../js/sendMoneyJs/sendMoneyViewJs.php'); ?>
		<div class="w3-container" style="margin-top: 60px;">
			<div class="w3-black w3-cart w3-round" style="margin-left: 200px;width: 1000px">
				<span style="margin-left: 20px"><img src="../../img/cloud.jpeg" width="180px" height="80px;" style="margin-top: 5px;" /></span><br>	
				<a href="../../views/User/user_LogOutView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">SIGN-OUT</a>
					<a href="../../views/User/passwordView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">CHANGE PASSWORD</a>
				<div>
					<hr>
					<span style="margin-left:30px"><?php if(isset($fullname)){echo "Welcome " . strtoupper($fullname) . "!";} ?></span>
					<div style="margin-top: 25px;">	
						<center><span>Send CloudMoney</span><br><br>
						<span>Account Details</span></center>
					</div>
					<div style="width: 400px;margin-left: 320px;margin-top: 30px;">
						<center>	
							<table>
								<tr>
									<td>No:
									&nbsp &nbsp &nbsp &nbsp <?php echo $account_no; ?></td>
								</tr>
								<tr>
									<td>Name:
									&nbsp &nbsp<?php echo strtoupper($concat); ?><br><br></td>
								</tr>
								<tr></tr><tr></tr>	
								<tr></tr>
								<tr>
									<td><label>Amount:</label></td>								
								</tr>
								<tr>
									<td><input type="number" step="any" value="<?php if(isset($amount)){echo $amount;} ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Amount..." name="amount" class="w3-input w3-round" style="width: 320px;"></td>
								</tr>
								<tr></tr>
								<tr></tr>
								<tr>
									<td><input type="submit" name="send" class="w3-input w3-round w3-green" value="Send" style="width: 320px;"></td> 
								</tr>
							</table><br>
							<span class="w3-text-yellow"><?php if(isset($msg)){echo $msg;}?></span>
							<span class="w3-text-red"><?php if(isset($err)){echo $err;}if(isset($err2)){echo $err2;}if(isset($err3)){echo $err3;} ?></span>
							<?php include('../../js/sendMoneyJs/sendMoneyJs.php'); ?>
						</center>
						&nbsp <a href="../User/homepageView.php" class="w3-text-blue" style="margin-left: 100px;"> VIEW DASHBOARD </a>
						<br><br>
					</div>
				</div>
			</div>
		</div>	
	</form>
</body>
</html>