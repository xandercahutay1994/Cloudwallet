<?php
	include('../../controllers/User/passwordController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>	
		CHANGE PASSWORD PAGE
	</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
	<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
</had>
<body>
	<form method="POST">
		<?php include('../../js/passwordJs/passwordViewJs.php'); ?>
		<div class="w3-container" style="margin-top: 60px;">
			<div class="w3-black w3-cart w3-round" style="margin-left: 200px;width: 1000px">
				<span style="margin-left: 20px"><img src="../../img/cloud.jpeg" width="180px" height="80px;" style="margin-top: 5px;" /></span><br>
				<a href="../../views/User/user_LogOutView.php" class="w3-right w3-btn w3-small"  style="margin-top: -30px;">SIGN OUT</a>	
				<div>
					<hr>
					<span style="margin-left: 30px"><?php if(isset($fullname)){echo "Welcome " . strtoupper($fullname) . "!";} ?></span>
					<div style="margin-top: 25px;">	
						<center><span>Change Password</span><br><br>
						<span class="w3-text-red w3-center"><?php if(isset($err)){echo $err;}if(isset($err2)){echo $err2;}if(isset($err3)){echo $err3;} ?></span>
						</center>
					</div>
					<div style="width: 400px;margin-left: 320px;margin-top: -20px;">
							<br>
							<table>
								<tr>
									<td><label>Type Current Password</label></td>								
								</tr>
								<tr>
									<td><input type="password" step="any" placeholder="Current Password..." name="curr_pass" class="w3-input w3-round" style="width: 320px;"></td>
								<tr>
									<td><input type="submit" name="confirm" class="w3-input w3-round w3-green" value="Confirm" style="width: 320px;"></td>
								</tr>
								<tr>
								<tr>
								</tr>
								<tr></tr>
							</table><br>
							<a href="homepageView.php" class="w3-text-blue" style="margin-left: 100px;"> VIEW DASHBOARD </a>
						</center>
						<?php include('../../js/passwordJs/passwordJs.php'); ?>
						<br><br>
					</div>
				</div>
			</div>
		</div>	
	</form>
</body>
</html>