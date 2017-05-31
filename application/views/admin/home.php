<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . "dashboard.css" ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<div class="container-fluid">

	<div class="row" id="pagedet">
		<h1><?php echo $page ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-xl-6 col-md-6">
					<div class="card">
						<div class="card-header">
							Visitors Right Now
						</div>
						<div class="card-block">
							<h1 id="realtimevisit"><?php echo $analytics_realtime ?></h1>
							<p>Hits</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-md-6">
					<div class="card">
						<div class="card-header">
							Total Visit Last 7 Days
						</div>
						<div class="card-block">
							<h1><?php echo $analytics ?></h1>
							<p>Sessions</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-md-6">
					<div class="card">
						<div class="card-header">
							Total Unique Visits
						</div>
						<div class="card-block">
							<h1><?php echo $analytics ?></h1>
							<p>Sessions</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-md-6">
					<div class="card">
						<div class="card-header">
							Total Visits
						</div>
						<div class="card-block">
							<h1><?php echo $analytics ?></h1>
							<p>Sessions</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Visitor's Countries
				</div>
				<div class="card-block">
					<canvas id="countries" width="100" height="50"></canvas>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Visit Chart This 30 Days
				</div>
				<div class="card-block">
					<canvas id="analytics_chart" width="100" height="50"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function()
	{
		//Ajax for realtime visitor, refresh every 5 seconds
		setInterval(function()
		{	
			$.ajax({
				url: "<?php echo base_url('admin/getrealtimevisitor'); ?>",
				context:document.body
			}).done(function(success)
			{
				$('#realtimevisit').html(success);
			});
		}, 5000);

		// Visit last month
		var ctx = $('#analytics_chart');
		var data = {
			labels: ["This Week", "Last Week", "2 Weeks Ago", "3 Weeks Ago", "4 Weeks Ago"],
	        datasets: [{
	            label: 'Sessions',
	            data: [<?php echo $analytics_chart ?>],
	            backgroundColor: 'rgba(255, 99, 132, 0.2)',
	            borderColor: 'rgba(255,99,132,1)',
	            borderWidth: 1
	        	}]
			};
		var options = {responsive: true};

        var myBarChart = new Chart(ctx, {
		    type: 'bar',
		    data: data,
		    options: options
		});

        // Countries
		var countries = $('#countries');
		var countriesData = {
			labels: [<?php echo implode(',', $countries[0]) ?>],
	        datasets: [{
	            label: 'Sessions',
	            data: [<?php echo implode(',', $countries[1]) ?>],
	            backgroundColor: 'rgba(255, 99, 132, 0.2)',
	            borderColor: 'rgba(255,99,132,1)',
	            borderWidth: 1
	        	}]
		};

		var countriesChart = new Chart(countries, {
			type: 'bar',
			data: countriesData,
			options:options
		});
	});
</script>