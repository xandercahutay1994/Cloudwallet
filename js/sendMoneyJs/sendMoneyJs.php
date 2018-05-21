<?php if(isset($password)){ ?>
	<script type="text/javascript">
		$('#password').show();
	</script>
<?php } ?>
<?php if(isset($send)){ ?>
	<script type="text/javascript">
		$('#okayConfirm').show();
	</script>
<?php }?>
<?php if(isset($noAction)){ ?>
	<script type="text/javascript">
		$('#noAction').show();
	</script>
<?php } ?>
<?php if(isset($restrict)){ ?>
	<script type="text/javascript">
		$('#restrict').show();
		$('#okayConfirm').hide();
	</script>
<?php } ?>
<?php if(isset($trap)){ ?>
	<script type="text/javascript">
		$('#trap').show();
		$('#okayConfirm').hide();
	</script>
<?php } ?>