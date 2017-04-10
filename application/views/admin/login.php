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
				<input type="text" name="username" placeholder="Username" id="">
				
				<input type="text" name="password" placeholder="Password" id="">

				<input type="submit" value="Login">

				<div class="error">
					<?php echo $this->session->flashdata('login_error'); ?>
				</div>
				
			<?php echo form_close() ?>
		</div>
	</body>
</html>