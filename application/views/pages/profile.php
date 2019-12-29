<?php echo validation_errors(); ?>

<div class="container text-darkblue mb-3">
    <div class="mt-5 container-md">
        <div class="form-bg">
            <div class="mx-auto">
				<div class="d-flex mb-5">
					<ul class="nav nav-tabs nav-justified col-12 bg-grey">
						<li class="nav-item"><a  class="nav-link link txt-lg single-tab active" data-toggle="tab">Profiil</a></li>
						<li class="nav-item"></li><li class="nav-item"></li>
					</ul>
				</div>
				<form id="change" method="post" action="<?php echo base_url(); ?>profile/updateProfile">

					<h4 class="pt-2 txt-xl px-5 mx-5">Konto info</h4>

					<div class="d-flex p-0 mt-4 px-5 mx-5">
						<div class="form-label-group col-6 py-0 pl-0 pr-5">
							<label>E-mail*</label>
							<input type="email" class="form-control" name="email" value="" disabled>
						</div>
						<div class="form-label-group col-6 p-0 pl-5">
							<label>Asutus</label>
							<input type="text" class="form-control" name="buildingID" id="buildingID" value="" disabled>
						</div>
					</div>

					<div class="d-flex p-0 mt-4 px-5 mx-5">
						<div class="form-label-group col-6 py-0 pl-0 pr-5">
							<label>Roll*</label>
							<select id="role" name="role" class="form-control arrow" disabled>
								<option value="1">Admin</option>
								<option value="2" selected>Juht</option>
								<option value="3">Haldur</option>
							</select>
						</div>
						<div class="form-label-group col-6 p-0 pl-5">
							<label>Staatus*</label>
							<select id="status" name="status" class="form-control arrow" disabled>
								<option value="1" selected>Aktiivne</option>
								<option value="0">Mitteaktiivne</option>
							</select>
						</div>
					</div>

					<h4 class="mt-5 txt-xl px-5 mx-5">Kasutaja info</h4>
					<div class="d-flex p-0 mt-4 px-5 mx-5">
						<div class="form-label-group col-6 py-0 pl-0 pr-5">
							<label>Nimi*</label>
							<input type="text" class="form-control" name="name" value="" disabled>
						</div>
						<div class="form-label-group col-6 p-0 pl-5">
							<label>Telefoni number*</label>
							<input type="number" class="form-control" name="phone" value="" disabled>
						</div>
					</div>

					<!-- <h4 class="mt-5 txt-xl px-5 mx-5">Parool</h4>
					<div class="d-flex p-0 mt-4 px-5 mx-5">
						<div class="form-label-group col-6 py-0 pl-0 pr-5">
							<label>Parool*</label>
							<input id="pw" type="password" class="form-control" name="password" placeholder="Salasõna">
						</div>
						<div class="form-label-group col-6 p-0 pl-5">
							<label>Parool uuesti*</label>
							<input type="password" class="form-control" name="password2" placeholder="Korda salasõna">
						</div>
					</div> -->

					<div class="d-flex justify-content-end px-5 mx-5 my-5">
                        <a class="btn btn-custom col-5 text-white txt-xl" href="<?php echo base_url(); ?>profile/edit/">Redigeeri</a>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>