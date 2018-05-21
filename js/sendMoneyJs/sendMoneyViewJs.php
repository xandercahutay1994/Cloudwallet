<div id="password" class="w3-modal" >
    <div class="w3-modal-content w3-card-4 w3-round-medium" style="width: 400px;height: 200px">
        <header class="w3-container w3-blue"> 
            <span onclick="document.getElementById('password').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <center><h5>Password Confirmation</h5></center>
        </header>
        <div class="w3-container w3-center">
            <br>
        	<table>
           		<tr>
           			<td>Type password for security purposes:</td>
           		</tr>
           		<tr>
           			<td><input type="password" name="password" class="w3-input w3-hover-pale-yellow" style="width: 300px;margin-left: 20px"></td>
           		</tr>
           		<tr>
           			<td><br><input type="submit" name="confirm" class="w3-button w3-green w3-round-medium" value="Confirm & Send"> <span class="w3-text-yellow"></td>
           		</tr>
            </table>
            <span><?php if(isset($err4)){echo $err4;}?></span>
        </div>
    </div>
</div>  
<div id="okayConfirm" class="w3-modal">
    <div class="w3-modal-content w3-yellow w3-card-4 w3-round-medium" style="width: 330px;height: 100px">
    	<span onclick="document.getElementById('okayConfirm').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-red">Amount was succesfully sent and credited to <?php echo $fullname; ?></span></center>	
    	</div>
    </div>
</div>  
<div id="noAction" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 330px;height: 100px">
    	<span onclick="document.getElementById('noAction').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-yellow">Can't send money because you have insufficient fund.</span></center>	
    	</div>
    </div>
</div>  
<div id="restrict" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 350px;height: 100px">
    	<span onclick="document.getElementById('restrict').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-yellow">The amount you want to send must be lesser or equal to your current total balance.</span></center>	
    	</div>
    </div>
</div>  
<div id="trap" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 350px;height: 100px">
      <span onclick="document.getElementById('trap').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
      <div style="width: 300px">
        <center><span class="w3-text-yellow">The recipient must not have a total current balance above 10,000!</span></center> 
      </div>
    </div>
</div>  