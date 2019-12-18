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