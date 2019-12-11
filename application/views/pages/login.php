
<div class="container">

       <?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
      <h1 class="text-center"><?php echo $title; ?></h1>
     <p> admin@admin.ee</p>  <p>juht@juht.ee </p>  <p>haldur@haldur.ee</p> <p> Parool kõigil sama: admin</p> 
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="e-post" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="parool" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div></div>
<?php echo form_close(); ?>