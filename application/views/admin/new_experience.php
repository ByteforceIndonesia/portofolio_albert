<html>
	<body>
		<?php echo form_open_multipart('admin/newinput/experience') ?>
			<div class="form-group">
			    <label for="year">Year:</label>
			    <input type="number" class="form-control" id="year" name="year" required="true">
		    </div>

		    <div class="form-group">
			    <label for="value">Value:</label>
			    <input type="text" class="form-control" id="value" name="value" required="true">
		    </div>

		    <div class="form-group">
			    <label for="inner_value">Inner Value:</label>
			    <input type="text" class="form-control" id="inner_value" name="inner_value" required="true">
		    </div>

		    <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
	</body>
</html>