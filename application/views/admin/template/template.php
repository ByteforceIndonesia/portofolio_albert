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

	<!-- JS -->
	<script src="<?php echo base_url() . JS_DIR . 'jquery-3.2.1.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'tether.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>

</head>
<body>
	<section id="topheader">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="byteforce-logo">
						<img src="<?php echo base_url() . 'assets/images/byteforce.png'?>" alt="">
						<h3>Byteforce Solutions</h3>
					</div>
				</div>
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<div class="account-info">
						<div class="accountbox">
							<span>Jonathan Hosea</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="bigwrapper">
		<section id="header">
			<div class="side-bar-toggle">
				<a href="#" onclick="toggleNav()">
					<img src="<?php echo base_url() ?>assets/images/side-bar.png" alt="">
				</a>
			</div>
			<div class="side-bar collapsed">
				<nav>
					

					<ul>
						<li><a href="#">Dashboard</a></li>
						<li><a href="<?php echo base_url('admin/webconfig') ?>">Website Configuration</a></li>
						<li><a href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section>

		<section id="body">
			<?php echo $body ?>
		</section>
	</div>

	<script>
		function toggleNav()
		{
			if($('.side-bar').hasClass('collapsed'))
			{
				$('.side-bar').removeClass('collapsed');
				$('.side-bar-toggle').addClass('expanded');
				$('#body').addClass('blacked');
				$('#body').css('transform', 'translateX(270px)');
			}else
			{
				$('.side-bar').addClass('collapsed');
				$('.side-bar-toggle').removeClass('expanded');
				$('#body').removeClass('blacked');
				$('#body').css('transform', 'translateX(0px)');
			}
		}
	</script>
</body>
</html>