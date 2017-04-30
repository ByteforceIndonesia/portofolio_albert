<!DOCTYPE html>
<html>
<head>

	<!-- Title -->
	<title>
		<?php echo 'Admin | ' . $page_title ?>	
	</title>
	
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'adminstyle.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap-theme.min.css' ?>">

	<!-- JS -->
	<script src="<?php echo base_url() . JS_DIR . 'jquery-3.2.1.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>

</head>
<body>
	<section id="header">
		<div class="side-bar-toggle">
			<a href="#" onclick="toggleNav()">
				<img src="<?php echo base_url() ?>assets/images/side-bar.png" alt="">
			</a>
		</div>
		<div class="side-bar collapsed">
			<nav>
				<div class="byteforce-logo">
					<img src="<?php echo base_url() . 'assets/images/byteforce.png'?>" alt="">
					<h3>Byteforce Solutions</h3>
				</div>

				<ul>
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Website Configuration</a></li>
					<li><a href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
				</ul>
			</nav>
		</div>
	</section>

	<section id="body">
		<?php echo $body ?>
	</section>

	<script>
		function toggleNav()
		{
			if($('.side-bar').hasClass('collapsed'))
			{
				$('.side-bar').removeClass('collapsed');
				$('.side-bar-toggle').addClass('expanded');
				$('#body').addClass('blacked');
			}else
			{
				$('.side-bar').addClass('collapsed');
				$('.side-bar-toggle').removeClass('expanded');
				$('#body').removeClass('blacked');
			}
		}
	</script>
</body>
</html>