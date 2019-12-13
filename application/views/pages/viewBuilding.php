<form id="change" method="post" action="<?php echo base_url(); ?>building/update">
                    <div id="change"></div>
                    <h5>Asutuse sätted</h5>
                    <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutuse nimi</label>
                                    <div class="col-md-8 ui-front">
                                      <p>  <?php echo $editBuildings['name']; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                 
                                    <label for="p-in" class="col-md-4 label-heading">E-mail</label>
                                    <div class="col-md-8 ui-front">
                                    <p>   <?php echo $editBuildings['contact_email']; ?></p>
                                       
                                    </div>
                                </div>
                           

                             
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">teavituste telefon</label>
                                    <div class="col-md-8 ui-front">
                                        <?php echo $editBuildings['notify_email']; ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">telefon</label>
                                    <div class="col-md-8 ui-front">
                                       <?php echo $editBuildings['phone']; ?>
                                    </div>
                                </div>
                                <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>building/edit/<?php echo $editBuildings['id']; ?>">Muuda</a>
                          


</form>