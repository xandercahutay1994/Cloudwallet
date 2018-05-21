<?php
	include('../../controllers/User/registerUserController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		REGISTRATION PAGE
	</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/toastr.js"></script>
            
</had>
<body>
	<center>
		<div class="w3-container w3-black w3-round-medium" style="margin-top: 20px;width: 500px">
			<h1>Registration</h1>
			<span class="w3-text-red"><?php if(isset($error)){echo $error;}if(isset($error2)){echo $error2;}if(isset($error3)){echo $error3;}if(isset($error4)){echo $error4;}if(isset($error5)){echo $error5;}if(isset($error6)){echo $error6;}?></span>
			<span style="margin-right: 200px"><?php if(isset($msg)){echo $msg;}else{echo $msg="";} ?></span>
			<br>
			<form method="POST">
				<table>
					<tr>
						<td><label>Lastname</label></td>
					</tr>
					<tr>	
						<td><input type="text" name="lastname" value="<?php if(isset($lastname)){echo $lastname;}?>" placeholder="Lastname..." class="w3-input w3-round"  style="width: 300px;"></td>
					</tr>
					<tr>
						<td><label>Firstname:</label></td>
					</tr>
					<tr>
						<td><input type="text" value="<?php if(isset($firstname)){echo $firstname;}?>" name="firstname" placeholder="Firstname..." class="w3-input w3-round"></td>
					</tr>
					<tr>
						<td><label>Username:</label></td>
					</tr>
					<tr>
						<td><input type="text" name="username" value="<?php if(isset($username)){echo $username;}?>" placeholder="Username..." class="w3-input w3-round"></td>
					</tr>
					<tr>
						<td><label>Password:</label></td>
					</tr>
					<tr>
						<td><input type="password" name="password" value="<?php if(isset($password)){echo $password;}?>" placeholder="Password..." class="w3-input w3-round"></td>
					</tr>
					<tr>
						<td><label>Re-type Password:</label></td>
					</tr>
					<tr>
						<td><input type="password" name="password2" value="<?php if(isset($password2)){echo $password2;}?>" placeholder="Re-type Password..." class="w3-input w3-round"></td>
					</tr>
				</table>
				<br>
				<div>
					<span>Your account will receive an amount of 2,000.00 as initial balance upon registration.</span><br><br>
					&nbsp &nbsp<input type="submit" value="REGISTER" name="register" class="w3-btn w3-round w3-green" style="width: 180px"><br>	
					<a href="user_LoginView.php" class="w3-text-blue"><h5>Log-In Now</h5></a>
				</div>
			</form>		
			<br>
		</div>
	</center>
</body>
</html>