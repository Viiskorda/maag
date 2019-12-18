  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
    Modal Login Form</a>
</div>


<form id="change" method="post" action="<?php echo base_url(); ?>building/update">
                    <div id="change"></div>  <input type="hidden" name="id" value="<?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>">


                  
                    <h5>Asutuse sätted</h5>
                    <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutuse nimi</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="building" id="organizer"   value="<?php foreach ($editBuildings as $value) {echo $value['name'];break;}?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                 
                                    <label for="p-in" class="col-md-4 label-heading">E-mail</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="email" id="publicInfo" value="<?php foreach ($editBuildings as $value) {echo $value['contact_email'];break;}?>">
                                       
                                    </div>
                                </div>
                           

                             
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">teavituste e-mail</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="notifyEmail" id="email"  value="<?php foreach ($editBuildings as $value) {echo $value['notify_email'];break;}?>">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">telefon</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="phone" id="phone"  value="<?php foreach ($editBuildings as $value) {echo $value['phone'];break;}?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                  
                                  <div class="col-md-12 ui-front"  id="wrapper">

                                <?php foreach ($editBuildings as $value) {
                                  echo  '<input type="button" class="btn btn-outline-secondary"   value="'. $value['roomName'].'"> ';}?>

                                   <input type="text" class="btn btn-outline-secondary" name="addRoomForm" id="addRoomForm" value=""/>
                                   <input type="button" class="btn btn-success" name="openModal" id="openModal"  value="+ Lisa saal">
                                </div>    </div>
                              


                                <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>building/view/<?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>">Katkesta</a>
                                <button type="submit" class="btn btn-primary">Muuda</button>


</form>



<script>

$( "#openModal" ).click(function(e) {
  e.preventDefault();
  // $(this).data('clicked', true);
  // $( this ).fadeOut( 100 );
  // $( this ).fadeIn( 500 );
  console.log( 'tere <?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>  '+$("#addRoomForm").val() );
  if($("#addRoomForm").val() ){

  $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>building/createRoom",
        data: { 
            id: '<?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>',
            roomName: $("#addRoomForm").val() 
        },
        success: function(result) {
          $("#addRoomForm").before('<input type="button" class="btn btn-outline-secondary" value="'+ $("#addRoomForm").val() +'" /> ');
          $('#addRoomForm').val('');
           // alert('ok');
         
        },
        error: function(result) {
            alert('error');
        }
    });
  }else{
    $('#addRoomForm').focus();

  }
   // $( this ).parent().append('<input type="text" class="btn btn-outline-secondary" name="addRoomForm" id="addRoomForm" value="" /> ');

});

$("#insertNewRoom").click(function(e) {
    e.preventDefault();
    $(this).data('clicked', true);
    console.log( 'tere <?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>');
    $.ajax({
        type: "POST",
        url: "/pages/test/",
        data: { 
            id: '<?php foreach ($editBuildings as $value) {echo $value['buildingID'];break;}?>',
            roomName: $("#addRoomForm").val() 
        },
        success: function(result) {
          console.log("veel");
       
          $( this ).remove();
        },
        error: function(result) {
            alert('error');
        }
    });
});


</script>