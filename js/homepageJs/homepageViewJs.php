<div id="notify" class="w3-modal w3-round-medium ">
    <div class="w3-modal-content w3-card-2 w3-round-medium" style="width: 400px;">
    	<header class="w3-container"> 
          <!--  <span onclick="document.getElementById('notify').style.display='none'" class="w3-button w3-round-medium w3-display-topright">&times;</span> -->
          <span><input type="submit" name="zero" value="&times;" class="w3-button w3-round-medium w3-display-topright"/></span>
           <center><h3>Your Notifications</h3></center>
        </header>
        <hr>
    	<div class="w3-center w3-sand">
    		<?php  if(count($receiveNotification) == 0){?>
				&nbsp&nbsp&nbsp&nbsp<span class="w3-center w3-xlarge w3-text-red">You have 0 notification...</span>
    		<?php }?>
    		<?php
    			$getAccountId = $user -> getAccountId();
			
    			foreach($receiveNotification as $notification){
    				$sender = $notification['sender_no'];
    				$date = $notification['sendDate'];
    				$time = $notification['sendTime'];
    				$amt = $notification['sendAmount'];

					foreach($getAccountId as $gA){
						$getIdAccount = $gA['account_no'];
						
	    				if($getIdAccount == $sender){
							$myIdAccount = $getIdAccount;
							$getUserId = $gA['user_id'];
						}
					}
					$getUserInfo = $user -> getUserNotifyInfo("user_id",$getUserId);
					foreach($getUserInfo as $userInfo){
						$fname = $userInfo['user_firstname'];
						$lname = $userInfo['user_lastname'];
						$concatName = $fname . " " . $lname;
					}
    		?>
	    		<table class="w3-table">
	    			<tr>
	    				<td>
	    					<label>Sender -> </label>
	    				</td>
	    				<td>
	    					<span class="w3-text-pink"><?php echo $concatName;?></span>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>
	    					<label>Date Received -></label>
	    				</td>
	    				<td>
	    					<span class="w3-text-pink"><?php echo $date;?></span>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>
	    					<label>Time -></label>
	    				</td>
	    				<td>
	    					<span class="w3-text-pink"><?php echo $time;?></span>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>
	    					<label>Amount Received -></label>
	    				</td>
	    				<td>
	    					<span class="w3-text-pink"><?php echo $amt;?></span>
	    				</td>
	    			</tr>
	    		</table>
	    		<span class="w3-round w3-text-red">===============================</span>	
	    	<?php }?>
    	</div>
    </div>
</div>  
