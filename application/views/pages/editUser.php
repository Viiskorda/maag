<form id="change" method="post" action="<?php echo base_url(); ?>users/update">
                    <div id="change"></div>
                    <input type="hidden" name="id" value="<?php echo $post['userID']; ?>">
                                <div class="form-group">
                                    <h5>Konto info</h5>
                                    <label for="p-in" class="col-md-4 label-heading">E-mail</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="email" id="publicInfo" value=" <?php echo $post['email']; ?>">
                                       
                                    </div>
                                </div>
                                <label>Staatus</label>
                                <select name=status>
                                
         
                                <option value="1" <?php if ($post['status']==1) echo ' selected'?>>Aktiivne</option>
                                <option value="0" <?php if ($post['status']==0) echo ' selected'?>>Mitteaktiivne</option>

                                </select>

                                                           <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutus</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="building" id="organizer" disabled  value=" <?php echo $post['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Roll</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="role" id="phone" disabled  value=" <?php echo $post['role']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Nimi</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="userName" id="email"  value=" <?php echo $post['userName']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Telefon</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="phone" id="phone"  value=" <?php echo $post['userPhone']; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>


</form>