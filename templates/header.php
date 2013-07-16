<!doctype html>
<html>
<head>

	<?php if(MODE === 'Development') { ?>
	<link rel="stylesheet/less" type="text/css" href="<?php echo BASE_URL; ?>less/screen.less" />
	<script type="text/javascript">less = { env: 'development' };</script>
	<script src="<?php echo BASE_URL; ?>js/vendor/less.js/dist/less-1.3.3.js"></script>

	<script src="<?php echo BASE_URL; ?>js/vendor/jquery/jquery.js"></script>
	<script src="<?php echo BASE_URL; ?>js/vendor/bootstrap/docs/assets/js/bootstrap.js"></script>
	<script src="<?php echo BASE_URL; ?>js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>js/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>js/vendor/jquery-countdown/jquery.countdown.js"></script>
	<script src="<?php echo BASE_URL; ?>js/vendor/jquery-itimer/jquery.itimer.js"></script>

	<?php } else { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/screen.min.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/dist/itimer.min.js"></script>
	<?php } ?>

	<script>
	$(document).ready(function(){
		$('.datepicker').datepicker();
		$('.timepicker').timepicker();
	});
	</script>
</head>
<body>

<div id="wrapper">

	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo BASE_URL; ?>">iTimer</a>
				<div class="nav">
				<ul class="nav">
					<li><a href="<?php echo BASE_URL; ?>timers">Timers</a></li>
				</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

	<?php if($flash['success']){ ?>
	<div class="notification row">
		<div class="alert alert-success"><?php echo $flash['success']; ?></div>
	</div>
	<?php } ?>

	<div id="body">
