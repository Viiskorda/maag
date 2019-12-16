<?php echo validation_errors(); ?>

<div class="container text-darkblue mb-5">
    <div class="mt-5 container-md">
        <div class="form-bg">
            <div class="mx-auto" style="width: 44%;">
				<?php echo form_open('users/registerByAdmin'); ?>

					<p class="mt-3 mb-5">Kasutaja lisamine</p>

					<h4 class="mt-5 txt-xl">Konto info</h4>
					<div class="form-label-group mt-4">
						<label for="email">E-mail*</label>
						<input type="email" class="form-control" name="email" placeholder="Email">
					</div>
			
					<div class="form-label-group mt-3">
						<label for="status">Staatus</label>
						<select id="status" name="status" class="form-control arrow">
							<option value="1">Aktiivne</option>
							<option value="0">Mitteaktiivne</option>
						</select>
					</div>

					<div class="form-label-group mt-3">
						<label for="role">Roll</label>
						<select id="role" name="role" class="form-control arrow">
							<option value="1">Admin</option>
							<option value="2" selected>Juht</option>
							<option value="3">Haldur</option>
						</select>
					</div>

					<h4 class="mt-5 txt-xl">Kasutaja info</h4>
					<div class="form-label-group mt-3">
						<label for="name">Nimi*</label>
						<input type="text" class="form-control" name="name" placeholder="Nimi">
					</div>
					
					<div class="form-label-group mt-3">
						<label for="phone">Telefon*</label>
						<input type="phone" class="form-control" name="phone" placeholder="Telefon">
					</div>

					<h4 class="mt-5 txt-xl">Parool</h4>
					<div class="form-label-group mt-3">
						<label for="pw">Parool*</label>
						<input id="pw" type="password" class="form-control" name="password" placeholder="Salasõna">
					</div>

					<div class="form-label-group mt-3">
						<label for="pww">Parool uuesti*</label>
						<input type="password" class="form-control" name="password2" placeholder="Korda salasõna">
					</div>

					<div class="d-flex justify-content-end mt-3 mb-5">
						<a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="<?php echo base_url(); ?>manageUsers">Katkesta</a>
						<button type="submit" class="btn btn-custom text-white txt-xl">Lisa kasutaja</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>