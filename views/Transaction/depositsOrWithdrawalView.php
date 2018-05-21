<?php
	include('../../controllers/Transaction/depositsOrWithdrawalController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Deposits or Withdrawals</title>
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
</head>
<body>
	<form method="POST">
		<div class="w3-container" style="margin-top: 20px;">
			<div class="w3-cart w3-round-medium" style="margin-left: 200px;width: 1000px">
				<div class="">
					<center style="margin-top: 30px">
						<span class="w3-text-blue w3-xlarge">My Deposits or Withdrawals</span>
						<span class="w3-text-red"><?php if(isset($err)){echo $err;}else if(isset($err2)){echo $err2;}else if(isset($err3)){echo $err3;}else if(isset($err4)){echo $err4;}else if(isset($err5)){echo $err5;}?> </span>	
					</center>
					<div style="margin-top: 30px;margin-left: 370px;">
						<table>
							<tr>
								<td><label>From </label></td>
							</tr>
							<tr>
								<td><input type="date" name="from" value=<?php if(isset($formatFrom)){echo date('Y-m-d',strtotime($formatFrom)); } ?> class="w3-date w3-round-medium" style="height: 30px;width: 280px;"><br></td>
							</tr>
							<tr>
								<td><label>To</label></td>
							</tr>
							<tr>
								<td><input type="date" name="to" value=<?php if(isset($formatFrom)){echo date('Y-m-d',strtotime($formatTo));}?> class="w3-date w3-round-medium" style="height: 30px;width: 280px;"></td>
							</tr>
							<tr>
								<td><label>Type</label></td>
							</tr>
							<tr>
								<td>
									<select class="w3-round-medium w3-dropdown" name="select" style="height: 30px;width: 280px;">
										<option value='DW' <?php if(isset($type) && $type == 'DW'){echo 'selected="selected"';}?>>ALL</option>
										<option value="W" <?php if(isset($type) && $type == 'W'){echo 'selected="selected"';}?>>WITHDRAW</option>
										<option value="D"<?php if(isset($type) && $type == 'D'){echo 'selected="selected"';}?>> DEPOSIT</option>
									</select>
								</td>
							</tr>
						</table>
						<br>
						<div>
							&nbsp &nbsp<input type="submit" name="list" value="LIST" style="height: 30px;width: 90px"" class=" w3-green w3-round-medium">
							<a href="../User/homepageView.php" class="w3-text-blue w3-btn w3-round-medium" style="margin-left: 10px;"> VIEW DASHBOARD </a>
						</div>	
					</div><br>
						<table class="w3-table-all w3-bordered">
							<tr>
								<th>Seq. #</th>
								<th>Type</th>
								<th>Date</th>
								<th>Amount</th>
							</tr>
							<?php 
								foreach($displayAccount as $gA){
									$date3 = $gA['transactDate'];
									$time3 = $gA['transactTime'];
							 		$amt3 = $gA['transactAmt'];
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php $type = $gA['transactType'];echo $type; ?></td>
								<td><?php echo $date3 . " " . $time3;?></td>
								<td><?php if($amt3 == 0){echo "-";}else{echo number_format(floatval($amt3),2);} ?></td>
							</tr>
							<?php $count += 1; } ?>
							<?php foreach($transactionFilterRecordType as $transact){
								$date = $transact['transactDate'];
								$time = $transact['transactTime'];
							 	$amt = $transact['transactAmt'];
								
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php $type = $transact['transactType'];echo $type; ?></td>
								<td><?php echo $date . " " . $time;?></td>
								<td><?php if($amt == 0){echo "-";}else{echo number_format(floatval($amt),2);} ?></td>
							</tr>
							<?php $count += 1; } ?>
							<?PHP foreach($getFilterAllRecordType as $all){
									$date2 = $all['transactDate'];
									$time2 = $all['transactTime'];
								 	$amt2 = $all['transactAmt'];
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php $type = $all['transactType'];echo $type; ?></td>
								<td><?php echo $date2 . " " . $time2;?></td>
								<td><?php if($amt2 == 0){echo "-";}else{echo number_format(floatval($amt2),2);} ?></td>
							</tr>
							<?php $count += 1; } ?>
						</table>
				</div>
			</div>
		</div>	
	</form>
</body>
</html>