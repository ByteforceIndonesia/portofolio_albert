<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<!-- <script>tinymce.init({ selector:'textarea' });</script> -->

<!-- data tables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>

<!-- Modal -->
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

<div class="success hidden">
	<div class="alert alert-success">
		<span>Success edit field!</span>
	</div>
</div>

<div class="error hidden">
	<div class="alert alert-danger">
		<span>Error edit field!</span>
	</div>
</div>

<?php if($message): ?>
	<div class="success">
		<div class="alert alert-warning">
			<span><?php echo $message ?></span>
		</div>
	</div>
<?php endif; ?>

<div class="row header">
    <div class="col-lg-6">
        <h1>Footer</h1>
    </div>
    <div class="col-lg-6">
        <h1>Quotes</h1>
    </div>
</div>
<div class="quotes_field row form-group">
    <div class="col-lg-2">
    	<label for="quote_one">Email</label>
    </div>
    <div class="col-lg-3">
    	<input type="text" name="email" id="email" class="form-control" value="<?php echo $config[0]->value_1 ?>">
    </div>

	<div class="col-lg-1"></div>

    <div class="col-lg-2">
    	<label for="quote_one">Quote 1</label>
    </div>
    <div class="col-lg-4">
    	<textarea name="quote[]" id="quote_one" class="form-control"></textarea>
    </div>
</div>


<div class="quotes_field row form-group">
    <div class="col-lg-2">
    	<label for="quote_one">Phone</label>
    </div>
    <div class="col-lg-3">
    	<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $config[1]->value_1 ?>">
    </div>

	<div class="col-lg-1"></div>

    <div class="col-lg-2">
    	<label for="quote_one">Quote 1</label>
    </div>
    <div class="col-lg-4">
    	<textarea name="quote[]" id="quote_one" class="form-control"></textarea>
    </div>
</div>

<div class="quotes_field row form-group">
    <div class="col-lg-2">
    	<label for="quote_one">Instagram</label>
    </div>
    <div class="col-lg-3">
    	<input type="text" name="ig" id="ig" class="form-control" value="<?php echo $config[2]->value_1 ?>">
    </div>

	<div class="col-lg-1"></div>

	<div class="col-lg-2">
    	<label for="quote_three">Quote 3</label>
    </div>
    <div class="col-lg-4">
    	<textarea name="quote[]" id="quote_three" class="form-control"></textarea>
    </div>
</div>

<div class="quotes_field row form-group">
    <div class="col-lg-2">
    	<label for="quote_one">Linked In</label>
    </div>
    <div class="col-lg-3">
    	<input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo $config[3]->value_1 ?>">
    </div>
</div>

<div class="col-lg-1"></div>

<div class="quotes_field row">
	<div class="col-lg-6">
		<button class="btn btn-primary" id="footerSave">Save</button>
	</div>

	<div class="col-lg-6">
		<button class="btn btn-primary" type="button" id="saveQuotes">Save</button>
	</div>
</div>

<div class="row header">
    <div class="col-lg-12">
        <h1>Quotes Background</h1>
    </div>
</div>
<?php echo form_open_multipart('admin/imageupload/quotes'); ?>
<div class="quotes_field row">
    <div class="col-lg-4">
    	<label for="quote_one">Quote 1</label>
    </div>
    <div class="col-lg-8">
    	<input type="file" name="quote_one" id="" class="form-control-file">
    </div>
</div>

<div class="quotes_field row">
    <div class="col-lg-4">
    	<label for="quote_two">Quote 2</label>
    </div>
    <div class="col-lg-8">
    	<input type="file" name="quote_two" id="" class="form-control-file">
    </div>
</div>


<div class="quotes_field row">
    <div class="col-lg-4">
    	<label for="quote_three">Quote 3</label>
    </div>
    <div class="col-lg-8">
    	<input type="file" name="quote_three" id="" class="form-control-file">
    </div>
</div>

<div class="quotes_field row">
	<div class="col-lg-12">
		<button class="btn btn-primary">Save</button>
	</div>
</div>
<?php echo form_close() ?>

<div class="row header">
    <div class="col-lg-2">
        <h1>Experiences</h1>
    </div>
    <div class="col-lg-10">
    	<button class="btn btn-primary" id="new_experience" data-toggle="modal" data-target="#newModal">Create New</button>
    </div>
</div>
<?php echo form_open() ?>
<div class="row quotes_field">
	<div class="col-lg-12">
		<table class="table" id="experience_table">
			<thead>
				<tr>
					<td>No</td>
					<td>Year</td>
					<td>Value</td>
					<td>Inside Value</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($experiences as $experience):?>
					<tr>
						<td><?php echo $experience->id ?></td>
						<td contenteditable id="<?php echo $experience->id ?>" class="year editable"><?php echo $experience->year; ?></td>
						<td contenteditable id="<?php echo $experience->id ?>" class="value editable"><?php echo $experience->value; ?></td>
						<td contenteditable id="<?php echo $experience->id ?>" class="nested_value editable"><?php echo $experience->nested_value; ?></td>
						<td><button class="btn btn-danger delete_experience" value="<?php echo $experience->id ?>">Delete</button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo form_close() ?>

<div class="row header">
    <div class="col-lg-2">
        <h1>Ability</h1>
    </div>
    <div class="col-lg-10">
    	<button class="btn btn-primary" id="new_ability" data-toggle="modal" data-target="#newModal">Create New</button>
    </div>
</div>
<?php echo form_open() ?>
<div class="row quotes_field">
	<div class="col-lg-12">
		<table class="table" id="ability_table">
			<thead>
				<tr>
					<td>No</td>
					<td>Language</td>
					<td>Value</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($abilities as $ability):?>
					<tr>
						<td><?php echo $ability->id ?></td>
						<td contenteditable id="<?php echo $ability->id ?>" class="language editable"><?php echo $ability->language ?></td>
						<td contenteditable id="<?php echo $ability->id ?>" class="value_ability editable"><?php echo $ability->value ?></td>
						<td><button class="btn btn-danger delete_ability" value="<?php echo $ability->id ?>">Delete</button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo form_close() ?>

<div class="row header">
    <div class="col-lg-2">
        <h1>Portfolio</h1>
    </div>
    <div class="col-lg-10">
    	<button class="btn btn-primary" id="new_portfolio" data-toggle="modal" data-target="#newModal">Create New</button>
    </div>
</div>
<?php echo form_open() ?>
<div class="row quotes_field">
	<div class="col-lg-12">
		<table class="table" id="portfolio_table">
			<thead>
				<tr>
					<td>No</td>
					<td>Name</td>
					<td>Link</td>
					<!-- <td>Photo</td> -->
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($portfolios as $portfolio):?>
					<tr>
						<td><?php echo $portfolio->id ?></td>
						<td contenteditable id="<?php echo $portfolio->id ?>" class="name editable"><?php echo $portfolio->name ?></td>
						<td class="link editable">
						<img src="<?php echo base_url() . IMAGES_DIR . 'upload/portfolio/' . $portfolio->link ?>" style="width:200px" class="portfolio_image" id="<?php echo $portfolio->link ?>"  data-toggle="modal" data-target="#newModal"></td>
						<!-- <td id="<?php echo $portfolio->id ?>" class="photo"><?php echo $portfolio->uuid ?></td> -->
						<td><button class="btn btn-danger delete_portfolio" value="<?php echo $portfolio->id ?>">Delete</button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo form_close() ?>

<!-- AJAX -->
<script>
	$(function()
	{
		$("#experience_table").DataTable();
		$("#ability_table").DataTable();
		$("#portfolio_table").DataTable();

		function toggleError ()
		{
			$(".error").toggleClass("hidden");
			$(".error").toggleClass("movein");

			setTimeout(function()
			{
				$(".error").toggleClass("hidden");
				$(".error").toggleClass("movein");
			},2000);
		}

		function toggleSuccess()
		{
			$(".success").toggleClass("hidden");
			$(".success").toggleClass("movein");

			setTimeout(function()
			{
				$(".success").toggleClass("hidden");
				$(".success").toggleClass("movein");
			},2000);
		}

		$("#new_experience").click(function()
		{
			$(".modal-title").html("New Experience");
			$.post("<?php echo base_url('admin/newexperience') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

		$("#new_portfolio").click(function()
		{
			$(".modal-title").html("New Portfolio");
			$.get("<?php echo base_url('admin/newportfolio') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

		$("#new_ability").click(function()
		{
			$(".modal-title").html("New Ability");
			$.post("<?php echo base_url('admin/newability') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

		$('.portfolio_image').click(function()
		{
			var uuid = $(this).attr('id');

			$(".modal-title").html("Edit Portfolio Photo");
			$.post("<?php echo base_url('admin/editportfoliophoto/1') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

		$("#footerSave").click(function(e)
		{	
			e.preventDefault();

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>admin/changefooter",
				data: {
					email: $("#email").val(),
					phone: $("#phone").val(),
					ig: $("#ig").val(),
					linkedin: $("#linkedin").val()
				},
				success: function(res)
				{
					toggleSuccess();
				},
				error: function()
				{
					toggleError();
				}
			});
		});

		$(".delete_experience").click(function(e){
			e.preventDefault();

			var id = $(this).val();

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>admin/delete/experience",
				data: {id: id},
				success: function(res)
				{
					toggleSuccess();
					location.reload();
				},
				error: function()
				{
					toggleError();
				}
			});

		});

		$(".delete_ability").click(function(e){
			e.preventDefault();

			var id = $(this).val();

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>admin/delete/ability",
				data: {id: id},
				success: function(res)
				{
					toggleSuccess();
					location.reload();
				},
				error: function()
				{
					toggleError();
				}
			});
		});

		$(".delete_portfolio").click(function(e){
			e.preventDefault();

			var id = $(this).val();

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>admin/delete/portfolio",
				data: {id: id},
				success: function(res)
				{
					toggleSuccess();
					location.reload();
				},
				error: function()
				{
					toggleError();
				}
			});
		});

		$('#saveQuotes').click(function(event)
		{
			event.preventDefault();

			var quote1 = $("#quote_one").val();
			var quote2 = $("#quote_two").val();
			var quote3 = $("#quote_three").val();
			
			$.ajax(
			{
				type: "post",
				url: "<?php echo base_url(); ?>admin/quotes",
				data: {quote_one: quote1, quote_two: quote2, quote_three: quote3},
				success: function(res) {
					toggleSuccess();
					location.reload();
				},
				error: function()
				{
					toggleError();		
				}
			});
		});

		$('.editable').blur(function(e)
		{
			e.preventDefault;

			var value = $(this).text();
			var id = $(this).attr('id');
			var field = $(this).attr('class').split(" ");
			field = field[0];

			if(field == "language" || field == "value_ability")
			{
				if(field == "value_ability")
					field = "value";

				$.ajax({
					type:'post',
					url: "<?php echo base_url(); ?>admin/edit/ability",
					data: {id: id, value: value, field: field},
					success: function (res)
					{
						toggleSuccess();
					},
					error: function()
					{
						toggleError();
					}
				})
			}else if(field == 'name' || name == 'link')
			{
				$.ajax({
					type:'post',
					url: "<?php echo base_url(); ?>admin/edit/portfolio",
					data: {id: id, value: value, field: field},
					success: function (res)
					{
						toggleSuccess();
					},
					error: function()
					{
						toggleError();
					}

				});
			}else
			{
				$.ajax({
					type:'post',
					url: "<?php echo base_url(); ?>admin/edit/experience",
					data: {id: id, value: value, field: field},
					success: function (res)
					{
						toggleSuccess();
					},
					error: function()
					{
						toggleError();
					}

				});
			}
		});
	});
</script>