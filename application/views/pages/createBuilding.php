<?php echo validation_errors(); ?>

<div class="container">
	<div class="container-md mx-auto mt-5">
		<div class="form-bg">

            <div class="d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey p-0">
                    <li class="nav-item p-0"><a class="nav-link link txt-lg single-tab active pl-5" data-toggle="tab">Asutuse lisamine</a></li>
                    <li class="nav-item p-0"></li><li class="nav-item p-0"></li>
                </ul>
            </div>

            <?php echo form_open('building/register'); ?>

                <h4 class="pt-2 txt-xl px-5 mx-5">Asutuse info</h4>
                <div class="d-flex p-0 mt-4 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
						<label>Asutuse nimi*</label>
						<input class="form-control"  type="text" name="name" required>
                    </div>
                    <div class="form-label-group col-6 p-0 pl-5">
                        <label>Kontakt email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="d-flex p-0 mt-4 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label>Telefoni number</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                    <div class="form-label-group col-6 p-0 pl-5">
                        <label>Päringute email</label>
                        <input type="email" class="form-control" name="notifyEmail">
                    </div>
                </div>

				<div class="d-flex justify-content-end mt-5 mb-5 mx-5 pr-5">
						<a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="<?php echo base_url(); ?>building/view/<?php  print_r($this->session->userdata['building']);  ?>">Katkesta</a>
						<button type="submit" class="btn btn-custom col-3 text-white txt-xl">Lisa asutus</button>
					</div>
            </form>

        </div>
    </div>
</div>

<!-- <div class="container text-darkblue mb-5">
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
					
					<div class="form-label-group mt-3">
						<label for="phone">Saalid</label>
						<input type="phone" class="form-control" name="rooms" placeholder="Saalid">
					</div>

				
					<div class="d-flex justify-content-end mt-3 mb-5">
						<a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="<?php echo base_url(); ?>building/view/<?php  print_r($this->session->userdata['building']);  ?>">Katkesta</a>
						<button type="submit" class="btn btn-custom text-white txt-xl">Lisa asutus</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div> -->