<?php if(isset($password)){ ?>
	<script type="text/javascript">
		$('#password').show();
	</script>
<?php } ?>
<?php if(isset($error)){ ?>
<script type="text/javascript">
	$('#error').show();
	$('#password').show();
</script>
<?php } ?>
<?php if(isset($notMatch)){ ?>
<script type="text/javascript">
	$('#notMatch').show();
	$('#password').show();
</script>
<?php } ?>
<?php if(isset($match)){ ?>
<script type="text/javascript">
	$('#match').show();
</script>
<?php } ?>
<?php if(isset($notValid)){ ?>
<script type="text/javascript">
	$('#notValid').show();
	$('#password').show();
</script>
<?php } ?>
<?php if(isset($empty)){ ?>
<script type="text/javascript">
	$('#empty').show();
	$('#password').show();
</script>
<?php } ?>