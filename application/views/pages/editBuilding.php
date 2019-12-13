<form id="change" method="post" action="<?php echo base_url(); ?>building/update">
                    <div id="change"></div>  <input type="hidden" name="id" value="<?php echo $editBuildings['id']; ?>">
                    <h5>Asutuse sätted</h5>
                    <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutuse nimi</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="building" id="organizer"   value=" <?php echo $editBuildings['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                 
                                    <label for="p-in" class="col-md-4 label-heading">E-mail</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="email" id="publicInfo" value=" <?php echo $editBuildings['contact_email']; ?>">
                                       
                                    </div>
                                </div>
                           

                             
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">teavituste e-mail</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="notifyEmail" id="email"  value=" <?php echo $editBuildings['notify_email']; ?>">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">telefon</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="phone" id="phone"  value=" <?php echo $editBuildings['phone']; ?>">
                                    </div>
                                </div>
                                <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>building/view/<?php echo $editBuildings['id']; ?>">Katkesta</a>
                                <button type="submit" class="btn btn-primary">Muuda</button>


</form>