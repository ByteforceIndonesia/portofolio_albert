<html>
	<body>
		<?php echo form_open_multipart('admin/newinput/portfolio') ?>
			<div class="form-group">
			    <label for="name">Name:</label>
			    <input type="text" class="form-control" id="name" name="name" required="true">
		    </div>

		    <div class="form-group">
			    <label for="link">Link:</label>
			    <input type="link" class="form-control" id="link" name="link" required="true">
		    </div>

		    <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
	</body>
</html>