
 <?php if($this->session->userdata('roleID')==='2'||$this->session->userdata('roleID')==='3'):?>
         
         
<form id="change" method="post" action="<?php echo base_url(); ?>building/update">
                    <div id="change"></div>
                    <h5>Asutuse sätted</h5>
                    <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutuse nimi</label>
                                    <div class="col-md-8 ui-front">
                                  

                                      <?php foreach ($editBuildings as $value) {
                                   echo $value['name'];
                                      break;}?>
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                 
                                    <label for="p-in" class="col-md-4 label-heading">E-mail</label>
                                    <div class="col-md-8 ui-front">
                                    <p>  
                                    <?php foreach ($editBuildings as $value) {
                                   echo $value['contact_email'];
                                      break;}?></p>
                                       
                                    </div>
                                </div>
                           

                             
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Teavituste telefon</label>
                                    <div class="col-md-8 ui-front">
                                     
                                        <p>  
                                    <?php foreach ($editBuildings as $value) {
                                   echo $value['notify_email'];
                                      break;}?></p>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">telefon</label>
                                    <div class="col-md-8 ui-front">
                                    
                                       <?php foreach ($editBuildings as $value) {
                                   echo $value['phone'];
                                      break;}?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutuse saalid</label>
                                    <div class="col-md-8 ui-front">
                                    
                                       <?php foreach ($editBuildings as $value) {
                                   echo $value['roomName'].'<br>';
                                     }?></p>
                                    </div>
                                </div>


                                <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>building/edit/<?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>">Muuda</a>
                               
</form>
<?php endif;?>

<?php if($this->session->userdata('roleID')==='1'):?>
          
        

<div class="container">
    <div class="table-container mt-3">
        <div class="mb-2 pb-5">
            <a class="btn btn-custom text-white text-center py-2 px-sm-2 px-lg-5 px-md-4 float-right pluss" onclick="location.href='<?php echo base_url(); ?>createBuilding';">
                <p class="m-0 txt-lg text-center">Lisa uus</p>
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
                <th class="py-2 txt-strong text-darkblue" scope="col">Staatus</th>
                <th class="py-2 txt-strong text-darkblue" scope="col"></th>
            </tr>
            </thead>
            <tbody class="">
            <?php foreach($editAllBuildings as $singleUser) : 
        
             
                ?>
                <tr>
                    <td class="pl-3 p-1 text-darkblue border-bottom-light"><?php echo $singleUser['name']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"><?php echo $singleUser['contact_email']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"><?php echo $singleUser['notify_email']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"><?php echo $singleUser['phone']; ?></td>
                    <td class="p-1 text-darkblue border-bottom-light"> <?php 
                      foreach ($editAllRooms as $value) {
                          if ($value['buildingID']==$singleUser['id']){
                        echo  '<input type="button" class="btn btn-outline-info"   value="'. $value['roomName'].'"  > ';}
                          }
                    
                 //   echo $singleUser['roomName']; ?> &nbsp; &nbsp;</td>
                
                 
                    <td class="d-flex justify-content-end p-1 pr-3">
                        <form class="cat-delete" action="<?php echo base_url(); ?>building/edit/<?php echo $singleUser['id']; ?>" method="POST">
                            <button type="submit" class="btn btn-second btn-width text-white text-center py-1 px-2 txt-strong ">Muuda</button>
                        </form>
                        <form class="cat-delete pl-1" action="<?php echo base_url(); ?>building/delete/<?php echo $singleUser['id']; ?>" method="POST">
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