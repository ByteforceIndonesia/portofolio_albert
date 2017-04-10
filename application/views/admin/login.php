<html>
	<head>
		<title>Admin Login | Albert's Portfolio</title>
		
		<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'style.css'?>">

	</head>
	<body>
		<div id="login">
			<?php echo form_open('login', array('class' => 'login_box')) ?>
				
				<div class="logo_login">
					<img src="<?php echo base_url() . 'assets/images/byteforce.png'?>" alt="">
					<h2>Byteforce Solutions</h2>
				</div>

				<?php if($this->session->flashdata('login_error')): ?>
				
					<div class="error">
						<h2><?php echo $this->session->flashdata('login_error'); ?></h2>
					</div>

				<?php endif; ?>
				

				<input type="text" name="username" placeholder="Username" id="">
				
				<input type="password" name="password" placeholder="Password" id="">

				<input type="submit" value="Login">
			<?php echo form_close() ?>
		</div>
	</body>
</html>