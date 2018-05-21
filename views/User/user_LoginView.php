<?php
	include('../../controllers/User/user_LoginController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		LOG-IN PAGE
	</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
	
</had>
<body>
	<form method="POST">
		<center>
			<div class="w3-container w3-black w3-round-medium" style="margin-top: 80px;width: 500px">
				<h1>USER LOG-IN</h1>
				<?php if(isset($error)){echo $error; }if(isset($error2)){echo $error2; }?>
				<br><br>
				<table>
					<tr>
						<td><label>Username:</label></td>
						<td><input type="text" placeholder="Username..." name="username" class="w3-input w3-round"  style="width: 300px;"></td>
					</tr>
					<tr>
						<td><label>Password:</label></td>
						<td><input type="password" placeholder="Password..." name="password" class="w3-input w3-round"></td>
					</tr>
				</table>		
				<br>
				<div>
					&nbsp &nbsp<input type="submit" value="LOG-IN" name="login" class="w3-btn w3-round w3-green" style="width: 180px"><br><br>	
					<span>Not yet a member?</span><br>
					<a href="registerUserView.php" class="w3-text-yellow"><h5>Join/Register Now</h5></a>
				</div>
				<br>
			</div>
		</center>	
	</form>
</body>
</html>