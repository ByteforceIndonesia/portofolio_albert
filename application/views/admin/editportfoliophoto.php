<html>
	<body>
		<?php echo form_open_multipart('admin/editportfoliophoto') ?>
			<input type="hidden" name="uuid" value="<?php echo $uuid ?>">
			
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<img src="<?php echo base_url() . IMAGES_DIR . 'upload/portfolio/' . $uuid?>" alt="" class="img-card-top" width="100%">
						<div class="card-block">
							<p class="card-text">Old Image</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card">
						<div class="card-block">
							<p class="card-title">New Image</p>
							<div class="form-group">
							    <input type="file" class="form-control" id="link" name="edit_port" required="true">
						    </div>
							<button class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		<?php echo form_close() ?>
	</body>
</html>