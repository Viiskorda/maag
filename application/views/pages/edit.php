<?php print_r($_POST['timesIdArray'][0])?>

<?php foreach ($_POST['timesIdArray'] as $each) {
                            echo ( $each );
                        }
                        ?>
<?php echo base_url(); ?>fullcalendar/load/<?php echo ($this->input->get('roomId')); ?>

<div class="container">
        <div class="d-flex pt-4 pb-2">
            <form class="d-flex flex-row col-10 p-0" action="fullcalendar" method="get">
                <div class="form-label-group col-4 p-0">
                    <label for="room">Saal</label>
                    <input id="room" list="saal" class="form-control arrow">
                    <datalist id="saal">
                    

                    </datalist>
                    <input type="hidden" id="roomId" name="roomId" value="roomId" />
                </div>

                <div class="form-label-group col-2">
                    <label for="app">Kuupäev</label>
                    <div id='app'>
                        <v-date-picker mode="single" v-model="date" :popover="{ visibility: 'click' }">
                            <input id="date" slot-scope="{ inputProps, inputEvents}" :class="[`form-control`]" v-bind="inputProps" v-on="inputEvents" name="date" value="date">
                        </v-date-picker>
                    </div>
                </div>
            </form>
            <a class="btn btn-custom col-2 text-white mr-auto p-0 mb-4 text-center align-middle" href="<?php echo base_url(); ?>booking/create">Broneerima</a>
        </div>

        <!-- ekfjwkejfkwejÄ -->

     

        </br>

     
                        <h4 class="modal-title" id="myModalLabel">Siia tuleb avalik info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       
                    </div>
                   
                    <div class="modal-body">
                        <div>
                     <p>   Päring:  <input type="text" class="form-control" name="created_at" id="created_at"> </p> <hr></div>
                        <h6>Broneeringu info</h6>
                        <hr>
                        <?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>

                                <div class="form-group">
                                    <h5>Kontakt</h5>
                                    <label for="p-in" class="col-md-4 label-heading">Kontaktisik</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="c_name" value="" id="c_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Klubi nimi</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="clubname" id="clubname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Telefoni number</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Email</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <h5>Asukoht ja treeningu tüüp</h5>

                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutus</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="building" id="building">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Saal</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="selectedroom" id="selectedroom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Treeningu tüüp</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="workout" id="workout">
                                    </div>
                                </div>
                                <h5>Kuupäev ja kellaajad</h5>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Hooaeg alates</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="event_in" id="event_in">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Hooaeg kuni</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="event_out" id="event_out">
                                    </div>
                                </div>
                        Lisainfo

                                    <hr>
                    <h6>Kõik ajad</6>

                    <hr>
                    <input type="checkbox" name="delete" value="1"> VALI KÕIK<hr>
                    <table id="myTable">
                    <tbody>
                        <tr></tr>
                    
                    </tbody>
                    </table>


                        <!-- <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                            <div class="col-md-8">
                                <input type="checkbox" name="delete" value="1">
                            </div>
                        </div>-->

                        <?php echo form_close() ?>
                        <input type="hidden" name="eventid" id="event_id" value="0" /> 
                    </div>


                    <div class="modal-footer">
                    <form id="approveCheck">
                        <input type="submit" class="btn btn-primary" value="Kinnita">
                        </form >
                        <form id="change">
                        <input type="submit" class="btn btn-dark" value="Muuda">
                        </form >  
                        <form id="delete">
                        <input type="submit" class="btn btn-danger" value="Kustuta" id="deleteChecked" name="deleteChecked">
                    </form >
                    <form id="takesPlaceCheck">
                        <input type="submit"  class="btn btn-secondary" value="Ei toimu">
                        </form >
                       
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       
                    </div>
                    <p id="time"></p>


             
    </div>
    </body>




    <script>
      

        $(document).ready(function() {

            var eventToModificate = "<?php echo base_url(); ?>edit/load/<?php print_r($_POST['timesIdArray'][0])?>";
            console.log(eventToModificate);

            $.post("<?php echo base_url(); ?>edit/load/<?php print_r($_POST['timesIdArray'][0])?>",
                function(data)
                {
                    var res =  $.parseJSON(data);
                
                    for (var i = 0, l = res.length; i < l; i++) {
                        var obj = res[i];
                        console.log(obj);
                        console.log(obj.start);
                        $('#myTable tr').remove();
                    $('#lefty').modal('show');
                    $("#lefty .modal-header h4").text(obj.title);
                    $("#lefty #time").text(obj.created_at);

                    $('#c_name').val(obj.title);
                    $('#clubname').val(obj.clubname);
                  
                    if ($('#event_in').is(':empty')){
                    $('#event_in').val('Pole hooajaline broneering');}
                    else{
                        $('#event_in').val(moment(obj.event_in).format('DD/MM/YYYY HH:mm'));
                    }
                    if ($('#event_out').is(':empty')){
                    $('#event_out').val('Pole hooajaline broneering');}
                    else{
                        $('#event_out').val(moment(obj.event_out).format('DD/MM/YYYY HH:mm'));
                    }
                    $('#phone').val(obj.phone);
                    $('#selectedroom').val(obj.selectedroom);
                    $('#email').val(obj.email);
                    $('#created_at').val(obj.created_at);
                    $('#workout').val(obj.workout);
                  
                    $('#start').val(obj.start);
                   $('#building').val(obj.building);
                    $('#selectedroom').val(obj.roomName);

                    }
                    alert(res.values());
                    console.log(Object.prototype.toString.call(res));
                });
            $("#approveCheck").submit(function( event ) {
                     if ($('.abc:checked').length <= $('.abc').length && $('.abc:checked').length>0) 
                        {
                            if (confirm("Kinnatan valitud?")) {
                             event.preventDefault();    };
                            
                            $("input:checkbox").each(function(){
                            var $this = $(this);

                            if($this.is(":checked")){
                                var id = $this.attr("id");
                                console.log("going to kinnitama " +id);// $this.attr("id");
                                
                                $.ajax({
                                    url: "<?php echo base_url(); ?>edit/<?php print_r($_POST['timesIdArray'][0])?>",
                                    type: "POST",
                                    data: {
                                        timeID: id, 
                                        approved: 1

                                    },
                                    success: function() {
                                        calendar.fullCalendar('refetchEvents');
                                        //siia tule teha panna kinnitatud olekuks modalis  
                                        //jQuery('input:checkbox:checked').parents("tr").remove();
                                        alert('Kinnitatud');
                                    }, 
                                    error: function(returnval) {
                                        $(".message").text(returnval + " failure");
                                        $(".message").fadeIn("slow");
                                        $(".message").delay(2000).fadeOut(1000);
                                    },
                                    })
                                }
                            });
                        }
                else{
                    alert("Sa ei valinud midagi mida kinnitada");
                    event.preventDefault(); 
                };


               
            });
        });
    </script>