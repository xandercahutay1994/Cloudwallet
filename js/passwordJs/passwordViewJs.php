<div id="password" class="w3-modal" >
    <div class="w3-modal-content w3-card-4 w3-round-medium" style="width: 400px;">
        <header class="w3-container w3-blue"> 
            <span onclick="document.getElementById('password').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <center><h5>New Password</h5></center>
            <?php if(isset($err)){echo $err; } ?>
        </header>
        <div style="margin-left: 30px">
            <br>
        	<table>
				</tr>
					<td><label>New Password</label></td>								
				</tr>
				<tr>
					<td><input type="password" step="any" placeholder="New Password..." name="password_one" class="w3-input w3-round" style="width: 320px;"><br></td>
				</tr>
				<tr>
					<td><label>Re-type Password</label></td>								
				</tr>
				<tr>
					<td><input type="password" step="any" placeholder="Re-type..." name="password_two" class="w3-input w3-round" style="width: 320px;"><br></td>
				</tr>
            </table>
            <input type="submit" name="save" style="width: 200px;margin-left: 60px;" class="w3-button w3-green w3-round-medium" value="Save"><br><br>
        </div>
    </div>
</div>  
<div id="error" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 350px;height: 100px">
    	<span onclick="document.getElementById('error').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-yellow">* You can't re-used your current password as your new password!Please input other password you like...</span></center>	
    	</div>
    </div>
</div>  
<div id="notMatch" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 350px;height: 100px">
    	<span onclick="document.getElementById('notMatch').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-yellow">* New and Re-type password didn't match!</span></center>	
    	</div>
    </div>
</div>  
<div id="match" class="w3-modal">
    <div class="w3-modal-content w3-yellow w3-card-4 w3-round-medium" style="width: 350px;height: 70px">
    	<span onclick="document.getElementById('match').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-red">New password successfully saved!</span></center>	
    	</div>
    </div>
</div>  
<div id="notValid" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 350px;height: 100px">
    	<span onclick="document.getElementById('notValid').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-yellow">* Password must be 8 in length,at least 1 numeric and 1 alphabetic & special character!</span></center>	
    	</div>
    </div>
</div>  
<div id="empty" class="w3-modal">
    <div class="w3-modal-content w3-red w3-card-4 w3-round-medium" style="width: 350px;height: 70px">
    	<span onclick="document.getElementById('empty').style.display='none'" class="w3-button w3-round w3-display-topright">&times;</span><br>
    	<div style="width: 300px">
    		<center><span class="w3-text-yellow">* Fill out all fields please....</span></center>	
    	</div>
    </div>
</div>  