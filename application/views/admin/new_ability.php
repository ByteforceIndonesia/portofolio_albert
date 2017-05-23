<html>
	<body>
		<?php echo form_open_multipart('admin/newinput/ability') ?>
			<div class="form-group">
			    <label for="year">Language:</label>
			    <input type="text" class="form-control" id="language" name="language" required="true">
		    </div>

		    <div class="form-group">
			    <label for="value">Value:</label>
			    <input type="number" class="form-control" id="value" name="value" required="true">
		    </div>

		    <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
	</body>
</html>