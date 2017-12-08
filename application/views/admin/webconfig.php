<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<!-- <script>tinymce.init({ selector:'textarea' });</script> -->

<!-- data tables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url() . JS_DIR . 'bootstrap-slider.min.js' ?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">

<style>
	#ex1Slider .slider-selection {
		background: #BABABA;
	}
</style>


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

<div class="row" id="pagedet">
	<h1><?php echo $page ?></h1>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				Quotes
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="form-group" style="width:100%">
						<label for="quote_one">First Quote</label>
						<textarea name="quote[]" id="quote_one" class="form-control"><?php echo $quotes[0]->value ?></textarea>
					</div>
				</li>
				<li class="list-group-item">
					<div class="form-group" style="width:100%">
						<label for="quote_two">Second Quote</label>
						<textarea name="quote[]" id="quote_one" class="form-control"><?php echo $quotes[1]->value ?></textarea>
					</div>
				</li>
				<li class="list-group-item">
					<div class="form-group" style="width:100%">
						<label for="quote_two">Third Quote</label>
						<textarea name="quote[]" id="quote_one" class="form-control"><?php echo $quotes[2]->value ?></textarea>
					</div>
				</li>
			</ul>
			<div class="card-block">
				<button class="btn btn-primary float-lg-right" type="button" id="saveQuotes">Save</button>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				Footer
			</div>
			<div class="card-block">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="form-control" value="<?php echo $config[0]->value_1 ?>">
				</div>
				<div class="form-group">
					<label for="phone"></label>
					<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $config[1]->value_1 ?>">
				</div>
				<div class="form-group">
					<label for="ig">Instagram</label>
					<input type="text" name="ig" id="ig" class="form-control" value="<?php echo $config[2]->value_1 ?>">
				</div>
				<div class="form-group">
					<label for="linkedin">Linked In</label>
					<input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo $config[3]->value_1 ?>">
				</div>

				<button class="btn btn-primary float-lg-right" type="button" id="saveQuotes">Save</button>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
		<?php echo form_open_multipart('admin/imageupload/quotes'); ?>
			<div class="card-header">
				Quotes Background
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="form-group">
						<label for="quote_one">First Quote</label>
						<input type="file" name="quote_one" id="" class="form-control-file">
					</div>
				</li>
				<li class="list-group-item">
					<div class="form-group">
						<label for="quote_two">Second Quote</label>
						<input type="file" name="quote_two" id="" class="form-control-file">
					</div>
				</li>
				<li class="list-group-item">
					<div class="form-group">
						<label for="quote_three">Third Quote</label>
    					<input type="file" name="quote_three" id="" class="form-control-file">
					</div>
				</li>
			</ul>
			<div class="card-block" style="height:75px;">
				<button class="btn btn-primary float-lg-right">Save</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="row header">
    <div class="col-lg-3">
        <h1>Experiences</h1>
    </div>
    <div class="col-lg-9">
    	<button class="btn btn-primary" id="new_experience" data-toggle="modal" data-target="#newModal">Create New</button>
    </div>
</div>
<?php echo form_open() ?>
<div class="row quotes_field">
	<div class="col-lg-12 table-mobile">
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
	<div class="col-lg-12 table-mobile">
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
						<td class="value_ability">
							<input id="abilityValue" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value="<?php echo $ability->value ?>" class="abilityVal" data-ability-value="<?php echo $ability->id ?>">
						</td>
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
	<div class="col-lg-12 table-mobile">
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
						<td><button class="btn btn-danger delete_portfolio" value="<?php echo $portfolio->id ?>">Delete</button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo form_close() ?>

<div class="row header">
    <div class="col-lg-2">
        <h1>Article</h1>
    </div>
    <div class="col-lg-10">
        <button class="btn btn-primary" id="new_article" data-toggle="modal" data-target="#newModal">Create New</button>
    </div>
</div>
<?php echo form_open() ?>
<div class="row quotes_field">
    <div class="col-lg-12 table-mobile">
        <table class="table" id="portfolio_table">
            <thead>
            <tr>
                <td>No</td>
                <td>Title</td>
                <td>Content</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($articles as $count => $article):?>
                <tr>
                    <td><?php echo $count+1 ?></td>
                    <td  data-id="<?php echo $article->id ?>" class="name"><?php echo $article->title ?></td>
                    <td class="link">
                        <?php
                        if(strlen($article->content) > 50)
                            $content = substr($article->content, 0 , 50);
                        else
                            $content = $article->content;

                        echo $article->content ?>
                    </td>
                    <td>
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#newModal" onclick="editArticle(this)" data-id="<?php echo $article->id ?>" style="cursor: pointer; color: #fff;">Edit</button>
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#newModal" onclick="deleteArticle(this)" data-id="<?php echo $article->id ?>" style="cursor: pointer; color: #fff;">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo form_close() ?>

<!-- AJAX -->
<script>
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

    $(function()
	{
		$("#experience_table").DataTable();
		$("#ability_table").DataTable();
		$("#portfolio_table").DataTable();

		$('.abilityVal').slider().on('slideStop', function(e)
		{
			var value = $(this).data('slider').getValue();
			var id = $(this).attr('data-ability-value');

			$.ajax({
				type:'post',
				url: "<?php echo base_url('admin/edit/ability/value'); ?>",
				data: {id:id, value: value},
				success: function (res)
				{
					toggleSuccess();
				},
				error: function()
				{
					toggleError();
				}
			});
		});

		$("#new_experience").click(function()
		{
		    $(".modal-body").empty();
			$(".modal-title").html("New Experience");
			$.post("<?php echo base_url('admin/newexperience') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

		$("#new_portfolio").click(function()
		{
            $(".modal-body").empty();
			$(".modal-title").html("New Portfolio");
			$.get("<?php echo base_url('admin/newportfolio') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

        $("#new_article").click(function()
        {
            $(".modal-body").empty();
            $(".modal-title").html("New Article");
            $.get("<?php echo base_url('admin/newarticle') ?>", function(data){
                $(".modal-body").html(data).fadeIn();
            });
        });

		$("#new_ability").click(function()
		{
            $(".modal-body").empty();
			$(".modal-title").html("New Ability");
			$.post("<?php echo base_url('admin/newability') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
		});

		$('.portfolio_image').click(function()
		{
			var uuid = $(this).attr('id');

			$(".modal-title").html("Edit Portfolio Photo");
			$.post("<?php echo base_url('admin/editportfoliophoto/') ?>" + uuid, function(data){
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

    function editArticle(e){
        var id = $(e).data('id');

        $(".modal-body").empty();
        $(".modal-title").html("Edit Article");
        $.get("<?php echo base_url('admin/editarticle') ?>?id=" + id, function(data){
            $(".modal-body").html(data).fadeIn();
        });
    }

    function deleteArticle(e) {
        var id = $(e).data('id');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>admin/delete/articles",
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
    }
</script>