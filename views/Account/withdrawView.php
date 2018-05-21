<?php
	include('../../controllers/Account/withdrawController.php');
    // echo $totalbalance;
?>
<!DOCTYPE html>
<html>
<head>
	<title>	
		DEPOSIT PAGE
	</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
	
</had>
<body>
	<form method="POST">
		<div class="w3-container" style="margin-top: 60px;">
			<div class="w3-black w3-cart w3-round" style="margin-left: 200px;width: 1000px">
				<span style="margin-left: 20px"><img src="../../img/cloud.jpeg" width="180px" height="80px;" style="margin-top: 5px;" /></span><br>		
				<a href="../../views/User/user_LogOutView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">SIGN OUT</a>
				<a href="../../views/User/passwordView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">CHANGE PASSWORD</a>
				<div>
					<hr>
					<span style="margin-left: 30px"><?php if(isset($fullname)){echo "Welcome " . strtoupper($fullname) . "!";} ?></span>
					<div style="margin-top: 25px;">	
						<center><span>Withdraw</span></center><br>
					</div>
					<div style="width: 400px;margin-left: 300px">
						<center><span>TOTAL CURRENT BALANCE</span><br><br>
							<span><?php echo number_format($totalbalance,2); ?></span>	
							<br><br>
							<table>
								<tr>
									<td><label>Enter Amount:</label></td>								
								</tr>
								<tr>
									<td><input type="number" step="any" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Withdraw Amount..." name="amount" class="w3-input w3-round" style="width: 320px;"></td>
								</tr>
								<tr></tr>
								<tr></tr>
								<tr>
									<td><input type="submit" name="add_amount" class="w3-input w3-round w3-blue" value="Process Withdrawal" style="width: 320px;"></td>
								</tr>
							</table><br>
							<span class="w3-text-yellow"><?php if(isset($msg)){echo $msg;}if(isset($err)){echo $err;}if(isset($err2)){echo $err2;}if(isset($err3)){echo $err3;} ?></span>
							<br>
							<a href="../User/homepageView.php" class="w3-text-blue"> VIEW DASHBOARD </a>
						</center><br>
					</div>
				</div>
			</div>
		</div>	
	</form>
</body>
</html>