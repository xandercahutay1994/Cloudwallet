<?php
	include('../../controllers/User/user_LogOutController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
</head>
<body>
	<div class="w3-container" style="margin-top: 60px;">
		<div class="w3-black w3-cart  w3-round-medium" style="margin-left: 200px;width: 1000px">
			<div class="">
				<hr>
				<div style="width: 400px;margin-left: 300px">
					<center>
						THANK YOU FOR VISITING OUR SITE 
						<span style="margin-left: 30px"><?php if(isset($fullname)){echo "Welcome " . strtoupper($fullname) . "!";} ?></span>
					</center><br>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>