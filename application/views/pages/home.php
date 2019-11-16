<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

	<div class="container-fluid">
		<div class="row no-gutter">

			<div class="d-none d-md-flex col-md-6 col-lg-7 lookup-lg p-0">
				<!-- Future map -->
				<iframe width="100%" height="100%" src="https://parnu-lv.maps.arcgis.com/apps/MapJournal/index.html?appid=137da5635d134d4e9c4812331590738b" frameborder="0" scrolling="no"></iframe>
			</div>

			<div class="col-md-6 col-lg-5">
				<div class="lookup-lg d-flex align-items-center py-5" id="body">
					<div class="col-6 align-self center mx-auto">

						<form action="fullcalendar" method="get">
							<div class="form-label-group">
								<label for="region">Piirkond</label>
								<input id="region" list="regions"  class="form-control">
									<datalist id="regions">
										<?php
											foreach ($regions as $row) {
												echo '<option data-value="' . $row->id . '">' . $row->name . '</option>';
											}
										?>
									</datalist>
							</div>

							<div class="form-label-group">
								<label for="facility">Asutus</label>
								<input id="facility" list="asutus" name="asutus" class="form-control">
									<datalist id="asutus" name="asutus">

										<?php foreach ($buildings as $each) { ?>
											<option value="<?php echo $each->name; ?>"><?php echo $each->name; ?></option>';
										<?php } ?>

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
					</div>
				</div>
			</div>


		</div>
	</div>

<script>

	$(document).ready(function() {
		$('#regions1').change(function() {
			var country_id = $('#regions1').val();

			if (country_id != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>calendar/fetch_state",
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
			var state_id = $('#state').val();
			console.log(state_id);
			if (state_id != '') {
				console.log("data");
				$.ajax({
					url: "<?php echo base_url(); ?>calendar/fetch_city",
					method: "POST",
					data: {
						state_id: state_id
					},
					success: function(data) {
						console.log("data");
						$('#citys').html(data);
					},
				});

			} else {

				$('#city').html('<option value="">Select ruums</option>');
			}
		});


		$("region").on('input', function() {
			var country_id = $('#regions').val();
			console.log("it works!");
			if (country_id != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>calendar/fetch_state",
					method: "POST",
					data: {
						country_id: country_id
					},
					success: function(data) {

						$('#building').html(data);
						$('#room').html('<option value="">Vali asutus</option>');

					}
				});
			} else {
				$('#building').html('<option value="">Select State</option>');
				$('#room').html('<option value="">Select rerre</option>');
			}
		});

		$("input").on('input', function() {
			var state_id = $('#building').val();
			console.log(state_id);
			if (state_id != '') {
				console.log("data");
				$.ajax({
					url: "<?php echo base_url(); ?>calendar/fetch_city",
					method: "POST",
					data: {
						state_id: state_id
					},
					success: function(data) {
						console.log("data");
						$('#room').html(data);
					},
				});

			} else {

				$('#room').html('<option value="">Select ruums</option>');
			}
		});
		$("#region").on('input', function() {
			var country_id = this.value;

			// if ($('#regions').find('option').filter(function() {
			// 		console.log(inputValue);
			// 		return this.value == inputValue;

			// 	}).length) {
			// 	//your code as per need

			// 	alert(inputValue);

			// }
				console.log("it works");
			if (country_id != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>calendar/fetch_state",
					method: "POST",
					data: {
						country_id: country_id
					},
					success: function(data) {
						console.log(data);
						$('#building').html(data);
						$('#room').html('<option value="">Vali asutus</option>');

					}
				});
			} else {
				$('#building').html('<option value="">Select State</option>');
				$('#room').html('<option value="">Select rerre</option>');
			}

		});


	});
</script>