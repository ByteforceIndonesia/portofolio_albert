<html>
	<body>
		<?php echo form_open_multipart('admin/editportfoliophoto') ?>
			<input type="hidden" name="uuid" value="">
			
			<div class="row">
				<div class="col-lg-6">
					<img src="<?php echo base_url() . " alt="">
				</div>	
			</div>

		    <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
	</body>
</html>