<div class="row">
	<div class="timer">
		<div class="title"></div>
		<div class="image"></div>
		<div class="countdown"></div>
	</div>
	<script>
	$(document).ready(function(){
		$('.timer').itimer({
			title: '<?php echo $timer->Text; ?>',
			<?php if($timer->Background !== null){ ?>
			background: '<?php echo BASE_URL; ?>uploads/<?php echo $timer->Background; ?>',
			<?php } ?>
			until: <?php echo $timer->EndDate; ?>
		});
	});
	</script>
</div>
