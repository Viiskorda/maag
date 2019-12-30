
 <?php if($this->session->userdata('roleID')==='2'||$this->session->userdata('roleID')==='3'):?>
         
 <div class="container">
	<div class="container-md mx-auto mt-5">
		<div class="form-bg">

            <div class="d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey p-0">
                    <li class="nav-item p-0"><a class="nav-link link txt-lg single-tab active pl-5" data-toggle="tab">Asutuse sätted</a></li>
                    <li class="nav-item p-0"></li><li class="nav-item p-0"></li>
                </ul>
            </div>

            <form id="change" method="post" action="<?php echo base_url(); ?>building/update">

                <h4 class="pt-2 txt-xl px-5 mx-5">Asutuse info</h4>
                <div class="d-flex p-0 mt-4 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label>Kontakt email*</label>
                        <input class="form-control" id="contact_email" type="email" name="contact_email" value="<?php foreach ($editBuildings as $value) {echo $value['contact_email'];break;}?>" disabled>
                    </div>
                    <div class="form-label-group col-6 p-0 pl-5">
                        <label>Päringute email*</label>
                        <input class="form-control" id="notify_email" type="email" name="notify_email" value="<?php foreach ($editBuildings as $value) {echo $value['notify_email'];break;}?>" disabled>
                    </div>
                </div>

                <div class="d-flex p-0 mt-4 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label>Telefoni number*</label>
                        <input class="form-control" id="phone" type="number" name="phone" value="<?php foreach ($editBuildings as $value) {echo $value['phone'];break;}?>" disabled>
                    </div>
                    <div class="form-label-group col-6 p-0 pl-5">
                        <label>Hinnakirja link (url)</label>
                        <input class="form-control" id="price_url" type="text" name="price_url" value="<?php foreach ($editBuildings as $value) {echo $value['price_url'];break;}?>" disabled>
                    </div>
                </div>

                <h4 class="mt-5 txt-xl px-5 mx-5 pb-3">Saalid</h4>
                <div class="form-label-group col-5 py-0 pl-0 pl-5 ml-5">
                    <label class="txt-regular txt-lg">Aktiivsed saalid</label>
                    <?php foreach ($editBuildings as $value) { if ($value['roomActive'] == 1) { echo('<input class="form-control mb-3" id="phone" type="text" name="phone" value="' . $value['roomName'] .'" disabled>'); }}; ?>
                </div>
                <div class="form-label-group col-5 py-0 pl-0 pl-5 ml-5">
                    <label class="txt-regular txt-lg">Mitteaktiivsed saalid</label>
                    <?php foreach ($editBuildings as $key => &$value) { if ($value['roomActive'] == 0) { echo('<input class="form-control mb-3" id="phone" type="text" name="phone" value="' . $value['roomName'] .'" disabled>'); }}; ?>
                </div>

                <div class="d-flex justify-content-end my-4 px-5 mx-5">
                    <a class="btn btn-custom col-5 text-white txt-xl" href="<?php echo base_url(); ?>building/edit/<?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>">Redigeeri</a>
                </div>
            </form>

        </div>
    </div>
</div>
<?php endif;?>


<?php if($this->session->userdata('roleID')==='1'):?>

<div class="container">
    <div class="table-container mt-3">
        <div class="mb-2 pb-5">
            <a class="btn btn-custom text-white text-center py-2 px-sm-2 px-lg-5 px-md-4 float-right pluss cursor-pointer" onclick="location.href='<?php echo base_url(); ?>createBuilding';">
                <p class="m-0 txt-lg txt-strong text-center cursor-pointer">Lisa uus</p>
            </a>
        </div>

        <table class="table-borderless table-users mt-3">
            <thead class="bg-grey border-bottom ">
            <tr>
                <th class="pl-3 py-2 txt-strong text-darkblue" scope="col">Asutuse nimi</th>
                <th class="py-2 txt-strong text-darkblue" scope="col">Email</th>
                <th class="py-2 txt-strong text-darkblue" scope="col">Teavituste e-mail</th>
                <th class="py-2 txt-strong text-darkblue" scope="col">Telefon</th>
                <th class="py-2 txt-strong text-darkblue" scope="col">Saalid</th>
                <th class="py-2 txt-strong text-darkblue" scope="col"></th>
            </tr>
            </thead>
            <tbody class="">
            <?php foreach($editAllBuildings as $singleBuilding) : 
        
             
                ?>
                <tr>
                    <td class="pl-3 p-1 text-darkblue border-bottom-light"><?php echo $singleBuilding['name']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"><?php echo $singleBuilding['contact_email']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"><?php echo $singleBuilding['notify_email']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"><?php echo $singleBuilding['phone']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"> <?php 
                      foreach ($editAllRooms as $value) {
                          if ($value['buildingID']==$singleBuilding['id']){
                        echo  '<p class="rooms">'. $value['roomName'].'</p> ';}
                          }
                    
                 //   echo $singleBuilding['roomName']; ?> &nbsp; &nbsp;</td>
                
                 
                    <td class="d-flex justify-content-end p-1 pr-3">
                        <form class="cat-delete" action="<?php echo base_url(); ?>building/edit/<?php echo $singleBuilding['id']; ?>" method="POST">
                            <button type="submit" class="btn btn-second btn-width text-white text-center py-1 px-2 txt-strong ">Muuda</button>
                        </form>
                        <form class="cat-delete pl-1" action="<?php echo base_url(); ?>building/delete/<?php echo $singleBuilding['id']; ?>" method="POST">
                            <!-- <input type="submit" class="" value="Kustuta"> -->
                            <button type="submit" class="btn btn-delete btn-width text-white text-center py-1 px-2 txt-strong ">Kustuta</button>
                        </form>
                    </td>
                </tr>                
            <?php endforeach; ?>
</tbody>
        </table>
    </div>
</div>
<?php endif;?>