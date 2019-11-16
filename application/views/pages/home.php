<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row no-gutter">

		<div class="d-none d-md-flex col-md-6 col-lg-8 bg-image lookup-lg">
			<!-- Future map -->
		</div>


		<div class="col-md-6 col-lg-4">
			<div class="lookup-lg d-flex align-items-center py-5" id="body">
				<div class="col-8 align-self center mx-auto">

					<form action="fullcalendar" method="get">
						<div class="form-label-group">
							<label for="region">Piirkond</label>
							<input id="region" list="regions" class="form-control">
							<datalist id="regions">
								<?php
								foreach ($regions as $row) {
									echo '<option  data-value="' . $row->id . '" value="' . $row->name . '"></option>';
								}
								?>
							</datalist>
						</div>

						<div class="form-label-group">
							<label for="facility">Asutus</label>
							<input id="facility" list="asutus" name="asutus" class="form-control">
							<datalist id="asutus" name="asutus">

								<?php foreach ($buildings as $each) {
									echo '<option data-value="' . $each->id . '" value="' . $each->name . '"></option>';
								}
								?>


							</datalist>
						</div>

						<div class="form-label-group">
							<label for="room">Saal</label>
							<input id="room" list="saal" name="saal" class="form-control">
							<datalist id="saal" name="saal">
								<?php foreach ($rooms as $each) { ?>
									<option value="<?php echo $each->name; ?>"><?php echo $each->name; ?></option>';
								<?php } ?>

							</datalist>
						</div>

						<div class="form-label-group">
							<label for="kp">Kuupäev</label>
							<input id="kp" class="form-control" name="date" type="text" value="<?php echo (date("d.m.Y")) ?>"> </p>
						</div>

						<input class="btn btn-primary" type="submit" value="OTSI">
					</form>


					<br>

					<div class="form-group">
						<select name="regions1" id="regions1" class="form-control input-lg">
							<option value="">Select Country</option>
							<?php
							foreach ($regions as $row) {
								echo '<option value="' . $row->id . '">' . $row->name . '</option>';
							}
							?>
						</select>
					</div>

					<br />
					<div class="form-group">
						<select name="state" id="state" class="form-control input-lg">
							<option value="">Select State</option>
						</select>
					</div>

					<br />
					<div class="form-group">
						<select name="citys" id="citys" class="form-control input-lg">
							<option value="">Select City</option>
						</select>
					</div>





				</div>
			</div>
<<<<<<< HEAD


=======
>>>>>>> fcb7b9f90bd3d73de533e7d02759ff9ea9b0209f
		</div>

	</div>
</div>

<script>
	$(document).ready(function() {
		$('#regions1').change(function() {
			var country_id = $('#regions1').val();

			if (country_id != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>home/fetch_state",
					method: "POST",
					data: {
						country_id: country_id
					},
					success: function(data) {

						$('#state').html(data);
						$('#citys').html('<option value="">Vali asutus</option>');

					}
				});
			} else {
				$('#state').html('<option value="">Select State</option>');
				$('#citys').html('<option value="">Select rerre</option>');
			}
		});

		$('#state').change(function() {


			var value = $('#state').val();
			var state_id = $('#state [value="' + value + '"]').data('value');
			console.log("stateid is " + state_id);
			if (state_id != '') {
				console.log("data");
				$.ajax({
					url: "<?php echo base_url(); ?>home/fetch_city",
					method: "POST",
					data: {
						state_id: state_id
					},
					success: function(data) {
						console.log("data is " + data);
						$('#citys').html(data);
						$('#saal').html(data).appendTo("#saal");
					},
				});

			} else {

				$('#city').html('<option value="">Select ruums</option>');
			}
		});




		// $("input").on('input', function() {
		// 	var state_id = $('#building').val();
		// 	console.log(state_id);
		// 	if (state_id != '') {
		// 		console.log("data");
		// 		$.ajax({
		// 			url: "<?php echo base_url(); ?>calendar/fetch_city",
		// 			method: "POST",
		// 			data: {
		// 				state_id: state_id
		// 			},
		// 			success: function(data) {
		// 				console.log("data");
		// 				$('#room').html(data);
		// 			},
		// 		});

		// 	} else {

		// 		$('#room').html('<option value="">Select ruums</option>');
		// 	}
		// });





		$("#region").on('input', function(e) {


			var $input = $(this),
				val = $input.val();
			list = $input.attr('list'),
				match = $('#' + list + ' option').filter(function() {
					return ($(this).val() === val);
				});

			if (match.length > 0) {
				console.log("match")


				var value = $('#region').val();
				var country_id = $('#regions [value="' + value + '"]').data('value');


				$.ajax({
					url: "<?php echo base_url(); ?>home/fetch_state",
					method: "POST",
					data: {
						country_id: country_id
					},

					success: function(data) {
						console.log("data on " + data);
						$("#asutus").empty();
						$("#room").empty();
						$('#asutus').html(data).appendTo("#asutus");

					}
				});


			} else {
				console.log("dismatch")
			}
		});


		$("#facility").on('input', function(e) {


			var $input = $(this),
				val = $input.val();
			list = $input.attr('list'),
				match = $('#' + list + ' option').filter(function() {
					return ($(this).val() === val);
				});

			if (match.length > 0) {

				var value = $('#facility').val();
				var state_id = $('#asutus [value="' + value + '"]').data('value');

				console.log(state_id);
				$.ajax({
					url: "<?php echo base_url(); ?>home/fetch_city",
					method: "POST",
					data: {
						state_id: state_id
					},

					success: function(data) {
						console.log("data on " + data);
						$("#saal").empty();
						//	$('#saal').html('<option value="">Vali asutus</option>');
						$('#saal').html(data).appendTo("#saal");

					}
				});


			} else {
				console.log("dismatch");
			}
		});





		// $("#region").change(function() {

		// 	//A solution to check if the value is in the datalist:


		// 	var country_id = this.value;
		// 	console.log("sdfasd " + country_id);

		// 	if ($('#regions').find('option').filter(function() {

		// 			return this.value == country_id;

		// 		}).length) {
		// 		console.log(country_id);

		// 	}



		// 	if (country_id != '') {
		// 		$.ajax({
		// 			url: "<?php echo base_url(); ?>home/fetch_state",
		// 			method: "POST",
		// 			data: {
		// 				country_id: country_id
		// 			},
		// 			success: function(data) {
		// 				$('#state').html(data);
		// 				$('#saal').html(data);
		// 				$('#room').html('<option value="">Vali asutus</option>');

		// 			}
		// 		});
		// 	} else {
		// 		$('#building').html('<option value="">Select State</option>');
		// 		$('#room').html('<option value="">Select rerre</option>');
		// 	}
		// });








		// $("#region").change(function() {
		// 	var country_id = this.value;

		// 	if ($('#regions').find('option').filter(function() {

		// 			return this.value == country_id;

		// 		}).length) {
		// 			console.log(country_id);

		// 	}

		// 	console.log("it works");


		// 	// if (country_id != '') {
		// 	// 	$.ajax({
		// 	// 		url: "<?php echo base_url(); ?>home/fetch_state",
		// 	// 		method: "POST",
		// 	// 		data: {
		// 	// 			country_id: country_id
		// 	// 		},
		// 	// 		success: function(data) {
		// 	// 			console.log(url);
		// 	// 			$('#building').html(data);
		// 	// 			$('#asutus').html(data);
		// 	// 			$('#room').html('<option value="">Vali asutus</option>');

		// 	// 		}
		// 	// 	});
		// 	// } else {
		// 	// 	$('#building').html('<option value="">Select State</option>');
		// 	// 	$('#room').html('<option value="">Select rerre</option>');
		// 	// }

		// });




	});
</script>