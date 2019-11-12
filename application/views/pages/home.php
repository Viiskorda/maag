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
								<label for="linn">Piirkond</label>
								<input id="linn" list="city" name="city"  class="form-control">
									<datalist id="city" name="city">
										<option value="">Select State</option>

										<?php foreach ($regions as $each) { ?>
											<option value="<?php echo $each->name; ?>"><?php echo $each->name; ?></option>
										<?php } ?>

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
		$('#regions').change(function() {
			var country_id  = $('#regions').val();
			
			if (country_id  != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>calendar/fetch_state",
					method: "POST",
					data: {
						country_id : country_id 
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

	});
</script>