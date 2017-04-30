<html>
	<head>
		<title>Admin Sign Up | Albert's Portfolio</title>
		
		<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'adminstyle.css'?>">

	</head>
	<body>
		<div id="login">
			<?php echo form_open('login/new_user', array('class' => 'login_box')) ?>

				<div class="logo_login">
					<img src="<?php echo base_url() . 'assets/images/byteforce.png'?>" alt="">
					<h2>New User</h2>
				</div>

				<input type="text" name="username" placeholder="Username" id="">
				
				<input type="text" name="password" placeholder="Password" id="">

				<input type="submit" value="Sign Up">

			<?php echo form_close() ?>
		</div>
	</body>
</html>