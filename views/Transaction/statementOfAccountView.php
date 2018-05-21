<?php
	include('../../controllers/Transaction/statementOfAccountController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Statement of Account</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
</head>
<body>
	<form method="POST">
		<div class="w3-container" style="margin-top: 20px;">
			<div class="w3-cart w3-round-medium" style="margin-left: 200px;width: 1000px">
				<div class="">
					<center>
						<span class="w3-text-blue w3-xlarge">My Statement of Account</span>
						<span class="w3-text-red"><?php if(isset($err)){echo $err;}else if(isset($err2)){echo $err2;}else if(isset($err3)){echo $err3;}else if(isset($err4)){echo $err4;} ?> </span>	
					</center>
					<div style="margin-top: 30px;margin-left: 370px;">
						<table>
							<tr>
								<td><label>From </label></td>
							</tr>
							<tr>
								<td><input type="date" name="from" value=<?php if(isset($formatFrom)){echo date('Y-m-d',strtotime($formatFrom)); } ?> class="w3-round-medium" style="height: 30px;width: 280px;"><br></td>
							</tr>
							<tr>
								<td><label>To</label></td>
							</tr>
							<tr>
								<td><input type="date" name="to" value=<?php if(isset($formatFrom)){echo date('Y-m-d',strtotime($formatTo));}?> class=" w3-round-medium" style="height:30px;width: 280px;"></td>
							</tr>
						</table>
						<br>
						<div>
							&nbsp &nbsp<input type="submit" name="list" value="LIST" style="height: 30px;width: 90px"" class=" w3-green w3-round-medium">
							<a href="../User/homepageView.php" class="w3-text-blue w3-btn w3-round-medium" style="margin-left: 10px;"> VIEW DASHBOARD </a>
						</div>	
					</div><br>
						<table class="w3-table-all w3-bordered" style="height: 20px;">
							<tr class="w3-medium">
								<th>Seq. #</th>
								<th>Type</th>
								<th>Date</th>
								<th>Debit</th>
								<th>Credit</th>
								<th>Balance</th>
								<th>Sent To</th>
								<th>Receive From</th>	
							</tr>
							<?php 
								foreach($displayAccount as $gA){
									$date = $gA['transactDate'];
									$time = $gA['transactTime'];
								 	$amt = $gA['transactAmt'];
								 	$r_no = $gA['recipient_no'];
								 	$balance = $gA['transactBalance'];
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php $type = $gA['transactType'];echo $type; ?></td>
								<td><?php if($type == "S"){echo $date . " " . $time;}else if($type == "W"){echo $date . " " . $time;}elseif($type == "D"){echo $date . " " . $time;} ?></td>
								<td><?php if($type == "W"){echo $amt;}  ?></td>
								<td><?php if($type == "D"){  if($amt == 0){echo "-";}else{echo $amt;}}  ?></td>
								<td><?php echo $balance; ?></td>
								<td><?php if($type =="W") {echo $r_no;}?></td>
								<td><?php if($type == "D"){echo $r_no;}?></td>
							</tr>
							<?php $count += 1; } ?>
 							<?php foreach($transactionFilterRecord as $transact){
								$date = $transact['transactDate'];
								$time = $transact['transactTime'];
							 	$amt = $transact['transactAmt'];
							 	$r_no = $transact['recipient_no'];
							 	$balance = $transact['transactBalance'];
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php $type = $transact['transactType'];echo $type; ?></td>
								<td><?php if($type == "S"){echo $date . " " . $time;}else if($type == "W"){echo $date . " " . $time;}else if($type == "D"){echo $date . " " . $time;} ?></td>
								<td><?php if($type == "W"){echo $amt;}  ?></td>
								<td><?php if($type == "D"){if($amt == 0){echo "-";}else{echo $amt;}}  ?></td>
								<td><?php echo $balance; ?></td>
								<td><?php if($type =="W") {echo $r_no;}?></td>
								<td><?php if($type == "D"){echo $r_no;}?></td>
							</tr>
							<?php $count += 1; } ?>
						</table>
				</div>
			</div>
		</div>	
	</form>
</body>
</html>