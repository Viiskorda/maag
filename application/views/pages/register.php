<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Ees- ja perenimi</label>
				<input type="text" class="form-control" name="name" placeholder="Name">
			</div>
		
			<div class="form-group">
				<label>E-mail</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
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
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>