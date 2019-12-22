<div class="container">
    <div id="forms" class="container-md pb-5">
        <div id="nav-tabs" class="mt-5 pb-5 form-bg">
            <div class="d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey">
                    <li class="nav-item"><a  class="nav-link link single-tab active" href="#" data-toggle="tab">Ühekordne borneering</a></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
            <form id="change" method="post" action="<?php echo base_url();?>edit/update">

                <h4 class="pt-2 txt-xl px-5 mx-5">Kontakt</h4>
                <div class="d-flex p-0 mt-4 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label for="contact">Klubi nimi*</label>
                        <input type="text" class="form-control" name="publicInfo" value="" id="publicInfo" required>
                    </div>
                    <input class="d-none" type="checkbox" id="type" name="type" value="1" checked>
                    <div class="form-label-group col-6 p-0 pl-5">
                        <label>Kontaktisik</label>
                        <input type="text" class="form-control" name="contactPerson" id="contactPerson">
                    </div>
                </div>
                <div class="d-flex mt-2 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label>Telefoni number</label>
                        <input type="number" class="form-control" name="phone" id="phone">
                    </div>

                    <div class="form-label-group col-6 p-0 pl-5">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>

                <h4 class="mt-5 txt-xl px-5 mx-5">Asukoht ja treeningu tüüp</h4>
                <div class="d-flex mt-4 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label for="sport_facility">Asutus</label>
                        <input id="sport_facility" class="form-control" list="asutus" id="building" disabled>
                            <datalist id="asutus">
                            <?php foreach ($buildings as $each) {
                                echo '<option data-value="' . $each->id . '" value="' . $each->name . '"></option>';
                            }
                            ?>
                            </datalist>
                    </div>

                    <div class="form-label-group col-6 p-0 pl-5">
                        <label for="room">Saal</label>
                        <input type="text" class="form-control" name="selectedroom" id="selectedroom" value="">
                    </div>
                </div>

                <div class="d-flex mt-2 px-5 mx-5">
                    <div class="form-label-group col-6 py-0 pl-0 pr-5">
                        <label>Treeningu tüüp</label>
                        <input type="text" class="form-control" name="workoutType" id="workoutType">
                    </div>
                    <div class="form-label-group col-6 p-0 pl-5"></div>
                </div>

                <h4 class="mt-5 txt-xl px-5 mx-5">Kuupäev ja kellaaeg</h4>
                <div class="mt-4 px-5 mx-5">
                    <div class="form-label-group pb-2 px-0">
                        <table id="myTable" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="txt-regular txt-lg">Broneeritud aeg</th>
                                    <th></th>
                                    <th class="txt-regular txt-lg">Uus aeg</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-blue" style="vertical-align: middle">
                                    <th id="month" class="text-white txt-regular td-width-l">Siia kuu nimetus</th>
                                    <th id="blank" class="text-white txt-regular td-width-m"></th>
                                    <th id="kp" class="text-white txt-regular td-width-s">Kuupäev</th>
                                    <th id="alates" class="text-white txt-regular td-width-s">Alates</th>
                                    <th id="kuni" class="text-white txt-regular td-width-s">Kuni</th>
                                </tr>
                                <!-- Genereerib automaatselt -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <h4 class="mt-5 txt-xl px-5 mx-5">Lisainfo (valikuline) </h4>
                <div class="mt-4 px-5 mx-5">
                    <div class="form-label-group pb-2 px-0">
                        <label>Lisainfo</label>
                        <textarea class="form-control" id="additional" name="additionalComment" rows="3"></textarea>
                    </div>
                </div>

                <input class="d-none" type="hidden" name="id" id="bookid" value="<?php print_r($_POST['timesIdArray'][0])?>">
                <input class="d-none" type="hidden" name="roomID" id="roomID" value="">

                <div class="d-flex justify-content-end mt-5 px-5 mx-5">
                    <!-- <input type="button" id="addTimes" class="btn btn-green" value="Lisa aeg"> -->
                    <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="#">Katkesta</a>
                    <input type="submit" id="changeTimes" class="btn btn-custom col-3 text-white txt-xl" value="Salvesta muudatused">
                </div>

            </form>
        </div>
    </div>
</div>


  
<?php $arr2 = array(); foreach (array_slice($_POST['timesIdArray'], 1) as $key=>$value) {   $arr2[] = $value; }?>
   

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>
    <script>
      

        $(document).ready(function() {

            var FieldCount = $('#myTable tbody tr').length;
            FieldCount++;
            console.log(FieldCount);
            $('#addTimes').click(function(e) {
            //max input box allowed
                FieldCount++;
                //add input box
                $('#myTable > tbody').append('<tr> <td class="pr-3"></td><td></td><td><input class="datePicker form-control" id="date_' + FieldCount + '" data-toggle="datepicker" name="bookingtimesFrom[' + FieldCount + ']"  value=""></td><td><input type="text" class="clock form-control" name="timeStart[' + FieldCount + ']" id="timestartfield_' + FieldCount + '" value="Siia aeg"></td>  <td><input type="text" class="clock form-control" name="timeEnd[' + FieldCount + ']" id="timeendfield_' + FieldCount + '" value="siia aeg"></td></tr>');

                $(".datePicker").datepicker({
                    language: "et-EE", 
                    autoHide: true, 
                    date: new Date(), 
                    autoPick: true
                });
          
          
            });

            $("#timestamp").on("click", ".removeclass", function(e) { //user click on remove text
           
                $(this).parent('div').remove(); //remove text box
               
        });



            var today=new Date();
        var endOfPeriond=new Date('05/31/'+ new Date().getFullYear()); 
       
        var dateToShow='';
        if (today<endOfPeriond){
            dateToShow=endOfPeriond;

        }else{
            dateToShow=new Date(endOfPeriond.setFullYear(endOfPeriond.getFullYear() + 1));  ;
        };
       

        // $(".datepickerUntil").datepicker({
        //     language: "et-EE",
        //     autoHide: true,
        //     date: dateToShow,
        //     autoPick: true,
        // });

        // $(".datePicker").datepicker({
        //     language: "et-EE",
        //     autoHide: true,
        //     date: new Date(),
        //     autoPick: true,
        // });

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
                   
                    var days = ['P', 'E', 'T', 'K', 'N', 'R', 'L'];
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

                      
                      //  $('#lefty').modal('show');
                      //  $("#lefty .modal-header h4").text(obj.title);
                      //  $("#lefty #time").text(obj.created_at);

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
                        document.getElementById("selectedroom").value = obj.roomID;
                        document.getElementById("roomID").value = obj.roomID;
                        // $('#start').val(obj.start);
                        // $('#timestartfield').val(obj.start);
                     //   $('#building').val(obj.building);

                        //$('#selectedroom').val(obj.roomName);
                      //  $('#selectedroom').val(obj.roomID)
                     
                        var BTimesid=obj.timeID;

                        var start=obj.start;
                        var end=obj.end;
                     //   console.log(start+' '+end);



                        var datafrom = ['<?=implode("', '", $arr2)?>'];
                        var n = datafrom.includes(BTimesid);
                            console.log(n);
                        if(n){
                            console.log(i);
                            $('#myTable > tbody').append(' <tr id="'+BTimesid+'"> <td class="td-width-l">'+days[new Date(start).getDay()]+', '+moment(start).format("DD.MM.YYYY")+'</td><td class="td-width-m">'+moment(start).format("HH.mm")+'–'+moment(end).format("HH.mm")+'</td><td class="td-width-s pl-3"><input class="datePicker form-control p" id="time_'+BTimesid+'" data-toggle="datepicker" name="bookingtimesFrom['+counter+']"  value="'+moment(start).format("DD.MM.YYYY")+'"></td><td class="td-width-s pl-3"><input type="text" class="clock form-control" name="timeStart[]" id="timestartfield" value="'+moment(start).format("HH.mm")+'"></td>  <td class="td-width-s pl-3"><input type="text" class="clock form-control" name="timeEnd[]" id="timeendfield_1" value="'+moment(end).format("HH.mm")+'"></td></tr>');
                            resConflicts.push(start.replace('T',' ').substring(0, 16));
                            res2Conflicts.push(end.replace('T',' ').substring(0, 16));
                            ConflictID.push(obj.timeID);
                            publicInfo.push(obj.title);
                            counter++;
                            $(".datePicker").datepicker({
                                language: "et-EE", 
                                autoHide: true, 
                                date: new Date(), 
                                autoPick: false
                            });
                            $('.clock').clockTimePicker({
                                duration: true,
                                durationNegative: true,
                                precision: 15,
                                i18n: {
                                    cancelButton: 'Abbrechen'
                                },
                                onAdjust: function(newVal, oldVal) {
                                    //...
                                }
                            });
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
                                        $('#myTable #'+ConflictID[t]).after( "<tr class='m-0 p-0'><td colspan='5' class='conflict txt-regular'>Kattuvad ajad: "+moment(conflicts2.start).format('DD.MM.YYYY')+" "+moment(conflicts2.start).format('HH:mm')/*conflicts2.start.substring(0, 16) */+"–"+ moment(conflicts2.end).format('HH:mm')+" "/*conflicts2.end.substring(0, 16)*/ +titleIDofConflict + "</td></tr>");
                                     //   console.log( ConflictID[t] +" ning " +timeIDofConflict);
                                     $('#myTable #'+ConflictID[t]).find('.clock.form-control, .datePicker.form-control').css('border', '2px solid #9E3253')

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