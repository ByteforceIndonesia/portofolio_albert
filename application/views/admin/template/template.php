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

	<!-- Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

</head>
<body>
	
<!-- Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100098602-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Modal -->
<div class="modalWrapper" style="width:100%; height:100%; display:flex; justify-content: center; align-items: center;">
	<div class="modal fade" id="newModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">&nbsp</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        &nbsp
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>

	<section id="topheader">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="byteforce-logo">
						<img src="<?php echo base_url() . 'assets/images/byteforce.png'?>" alt="">
						<h3><?php echo $page; ?></h3>
					</div>
					
					<div class="side-bar-toggle-mobile">
						<a href="#" onclick="toggleNav()">
							<img src="<?php echo base_url() ?>assets/images/side-bar-mobile.png" alt="">
						</a>
					</div>
				</div>
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<div class="account-info">
						<div class="accountbox">
							<span>ByteForce Systems</span>
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
						<li><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
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
				$('#body').css('transform', 'translateX(250px)');
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