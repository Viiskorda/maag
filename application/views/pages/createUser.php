<?php echo validation_errors(); ?>

<?php echo form_open('users/registerByAdmin'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <label>Staatus</label>
            <select name=status>
  <option value="1">Aktiivne</option>
  <option value="2">Mitteaktiivne</option>

</select>

<label>Roll</label>
            <select name=role >
  <option value="1">Admin</option>
  <option value="2" selected>Juht</option>
  <option value="3">Haldur</option>

</select>
			<div class="form-group">
				<label>Ees- ja perenimi</label>
				<input type="text" class="form-control" name="name" placeholder="Name">
			</div>
		
            <div class="form-group">
				<label>Phone</label>
				<input type="phone" class="form-control" name="phone" placeholder="Telefon">
            </div>

		
			<div class="form-group">
				<label>Parool</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Parool uuesti</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>
            <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>manageUsers">Katsesta</a>	<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>