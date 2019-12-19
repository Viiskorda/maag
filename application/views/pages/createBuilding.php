<?php echo validation_errors(); ?>

<div class="container text-darkblue mb-5">
    <div class="mt-5 container-md">
        <div class="form-bg">
            <div class="mx-auto" style="width: 44%;">
				<?php echo form_open('building/register'); ?>

				

					<div class="form-label-group mt-4">
					<h4 class="mt-5 txt-xl">Asutuse lisamine</h4>
						<label for="email">Asutuse nimi</label>
						<input type="text" class="form-control" name="name" placeholder="Nimi">
					</div>
			
					<div class="form-label-group mt-3">
						<label for="status">Asutuse e-mail</label>
						<input type="text" class="form-control" name="email" placeholder="asutus@online.ee">
					</div>

					<div class="form-label-group mt-3">
						<label for="role">Teavituste e-mail</label>
						<input type="text" class="form-control" name="notifyEmail" placeholder="">
					</div>

				
					<div class="form-label-group mt-3">
						<label for="name">Telefon</label>
						<input type="text" class="form-control" name="phone" placeholder="Telefon">
					</div>
					
					<!-- <div class="form-label-group mt-3">
						<label for="phone">Saalid</label>
						<input type="phone" class="form-control" name="rooms" placeholder="Saalid">
					</div> -->

				
					<div class="d-flex justify-content-end mt-3 mb-5">
						<a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="<?php echo base_url(); ?>manageUsers">Katkesta</a>
						<button type="submit" class="btn btn-custom text-white txt-xl">Lisa asutus</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>