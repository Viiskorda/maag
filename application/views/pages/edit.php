<div class="container">
     
            <a class="btn btn-custom col-2 text-white mr-auto p-0 mb-4 text-center align-middle" href="<?php echo base_url(); ?>booking/create">Tee uus broneering</a>

           </br>
                    </div>
                   
                    <div class="modal-body">
                        <!-- <div>
                     <p>   Päring:  <input type="text" class="form-control" name="created_at" id="created_at"> </p> <hr>
                    </div> -->
                      
                     
                    <form id="change" method="post" action="<?php echo base_url(); ?>edit/update">
                    <div id="change"></div>

                                <div class="form-group">
                                    <h5>Kontakt</h5>
                                    <label for="p-in" class="col-md-4 label-heading">Avalik info (kuvatakse kõigile)</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="publicInfo" value="" id="publicInfo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Kontaktisik</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="contactPerson" id="contactPerson">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Korraldaja</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="organizer" id="organizer">
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

                                <!-- <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Asutus</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control"  id="building" disabled>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Saal</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="selectedroom" id="selectedroom" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Treeningu tüüp</label>
                                    <div class="col-md-8 ui-front">
                                        <input type="text" class="form-control" name="workoutType" id="workoutType">
                                    </div>
                                </div>
                                <h5>Kuupäev ja kellaajad</h5>
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Hooaeg alates</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"  id="eventIn" disabled>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="p-in" class="col-md-4 label-heading">Hooaeg kuni</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"  id="eventOut" disabled>
                                    </div>
                                </div>
                    
                                    <hr>
                    <h6>Kõik ajad</6>

               
                 
                    <table id="myTable">
                    <tbody>
                       
                 

                  
                    </tbody>
                    </table>


                        <!-- <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                            <div class="col-md-8">
                                <input type="checkbox" name="delete" value="1">
                            </div>
                        </div>-->

                    
                    </div>


                  
                    <p id="time"></p>

                    <input type="submit" id="changeTimes" class="btn btn-dark" value="Muuda">
    </div>

    </form>

    </body>

  
                        <?php $arr2 = array(); foreach (array_slice($_POST['timesIdArray'], 1) as $key=>$value) {   $arr2[] = $value;}?>;
   

    <script>
      

        $(document).ready(function() {

         //   var eventToModificate = "<?php echo base_url(); ?>edit/load/<?php print_r($_POST['timesIdArray'][0])?>";
            var resConflicts =[];
            var res2Conflicts=[];
            var ConflictID=[];
            var publicInfo=[];
            var counter=0;
           
            // var urltoload =  "<?php echo base_url(); ?>fullcalendar/load/1";
            // console.log(urltoload+" konfliktid");

            $.post("<?php echo base_url(); ?>edit/load/<?php print_r($_POST['timesIdArray'][0])?>",
                function(data)
                {
                    var res =  $.parseJSON(data);
                   
                    var days = ['Pühapäev', 'Esmaspäev', 'Teisipäev', 'Kolmapäev', 'Neljapäev', 'Reede', 'Laupäev'];
                    var conflicts = "";
                  

             
                    function isBetween(checkDateTime, startDateTime, endDateTime) {

                        return (checkDateTime >= startDateTime && checkDateTime <= endDateTime);

                        }

                    function toDate(str){
                               
                                var [ yyyy, MM,dd,  hh, mm ] = str.split(/[- :]/g);
                                return new Date(`${MM}/${dd}/${yyyy} ${hh}:${mm}`);
                                }


                    for (var i = 0, l = res.length; i < l; i++) {
                        var obj = res[i];
                       // console.log(obj);
                        //console.log(obj.start);

                      
                        $('#lefty').modal('show');
                        $("#lefty .modal-header h4").text(obj.title);
                        $("#lefty #time").text(obj.created_at);

                        $('#publicInfo').val(obj.title);
                        $('#contactPerson').val(obj.clubname);
                        $('#organizer').val(obj.organizer);
                        // if ($('#eventIn').is(':empty')){
                        // $('#eventIn').val('Pole hooajaline broneering');}
                        // else{
                        //     $('#eventIn').val(moment(obj.event_in).format('DD/MM/YYYY HH:mm'));
                        // }
                        // if ($('#eventOut').is(':empty')){
                        // $('#eventOut').val('Pole hooajaline broneering');}
                        // else{
                        //     $('#eventOut').val(moment(obj.event_out).format('DD/MM/YYYY HH:mm'));
                        // }
                        $('#phone').val(obj.phone);
                     
                        $('#email').val(obj.email);
                        $('#created_at').val(obj.created_at);
                        $('#workoutType').val(obj.workout);
                    
                        $('#start').val(obj.start);
                     //   $('#building').val(obj.building);

                        //$('#selectedroom').val(obj.roomName);
                      //  $('#selectedroom').val(obj.roomID)
                        document.getElementById("selectedroom").value = obj.roomID;
                        
                        console.log(obj.roomID);
                        var BTimesid=obj.timeID;

                        var start=obj.start;
                        var end=obj.end;
                     //   console.log(start+' '+end);



                        var datafrom = ['<?=implode("', '", $arr2)?>'];
                        var n = datafrom.includes(BTimesid);
                            
                        if(n){
                            console.log(i);
                            $('#myTable > tbody:last-child').append(' <tr id="'+BTimesid+'"> <td>'+days[new Date(start).getDay()]+'&nbsp;&nbsp;</td> <td><input id="'+BTimesid+'" type="datetime-local" name="bookingtimesFrom['+counter+']" value="'+start+'"> </td><td>  - </td>  <td>   <input id="'+BTimesid+'" type="datetime-local" name="bookingtimesTo['+counter+']" value="'+end+'"></td>  </td>   <td>&nbsp;&nbsp;&nbsp; </td>   </tr>');
                        resConflicts.push(start.replace('T',' ').substring(0, 16));
                        res2Conflicts.push(end.replace('T',' ').substring(0, 16));
                        ConflictID.push(obj.timeID);
                        publicInfo.push(obj.title);
                        counter++;
                        }

                       
                          


                    } 
                  
                      
                        
                        
                        
                        

                                          
                     


                        $.ajax({
                        url: "<?php echo base_url(); ?>edit/loadAllRoomBookingTimes/"+res[1].roomID,
                        dataType: 'json',
                        success: function(json) {
                            // Rates are in `json.rates`
                            // Base currency (USD) is `json.base`
                            // UNIX Timestamp when rates were collected is in `json.timestamp`        
                            conflicts=json;
                            for (var i = 0, l = conflicts.length; i < l; i++) {
                                var conflicts2 = conflicts[i];
                               // console.log(conflicts2.start+" - "+conflicts2.end + " "+ i);

                                var startDateTime = toDate(conflicts2.start.substring(0, 16)); //yyyy-mm-dd hh:tt
                                var endDateTime = toDate(conflicts2.end.substring(0, 16));
                                var timeIDofConflict=conflicts2.timeID;
                                var titleIDofConflict=conflicts2.title;


                             //   console.log(timeIDofConflict); 
                                
                                // iga selle aja kohta tuleb kontrollida ajaxi aega"
                                for (var t = 0; t < resConflicts.length; t++) {
                                var checkDateTime = toDate(resConflicts[t]); //magic date
                                var checkDateTime2 = toDate(res2Conflicts[t]); //magic date
                               
                                    if(ConflictID[t]!==timeIDofConflict){
                                        if (isBetween(startDateTime,checkDateTime,checkDateTime2) || isBetween(endDateTime,checkDateTime,checkDateTime2) || isBetween(checkDateTime,startDateTime,endDateTime) || isBetween(checkDateTime2,startDateTime,endDateTime) ){
                                     //   console.log(checkDateTime +" - "+ checkDateTime2 + " nende vastu "+ startDateTime+ " " +endDateTime);// 
                                     //   console.log("tingumus on täidetud " + resConflicts[t] + " või "+res2Conflicts[t]);
                                        $('#myTable #'+ConflictID[t]).append( "Konflikt: "+titleIDofConflict + " ("+conflicts2.start.substring(0, 16) +" - "+ conflicts2.end.substring(0, 16) + "); ");
                                     //   console.log( ConflictID[t] +" ning " +timeIDofConflict);

                                        }}

                                    //Do something
                                };

                              //  console.log(isBetween(checkDateTime,startDateTime,endDateTime) + " esimene kord ");
                               
                             //   $('#myTable #'+timeIDofConflict).append("siin on konflikt");
                            //  console.log(conflicts2.timeID + " id");
                                }


                        },
                         error:function(jqXHR, textStatus, errorThrown) {
                            //Error handling code
                            console.log(errorThrown);
                            alert('Oops there was an error');
                        }
                    });
               



                        //alert(res.values());
                      //  console.log(Object.prototype.toString.call(res));
                });



                $("#changeTimes").on('click',function( event ) {
                           var bookingID = '<?=$_POST['timesIdArray'][0]?>';
                           console.log(bookingID);
                            var datafrom = ['<?=implode("', '", $arr2)?>'];
                            var myForm = document.getElementById('change');

                            datafrom.forEach(function (value) {
                            var hiddenInput = document.createElement('input');

                            hiddenInput.type = 'hidden';
                            hiddenInput.name = 'timesIdArray[]';
                            hiddenInput.value = value;

                            myForm.appendChild(hiddenInput);
                            });

                            var hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = 'BookingID';
                            hiddenInput.value = bookingID;
                            myForm.appendChild(hiddenInput);
                            $("#changeTimes").on('click',function( event ) {
       
                              $('#change').submit();

               
                                });

                  });







        });
    </script>