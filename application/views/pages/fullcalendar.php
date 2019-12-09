    <div class="container" id="logged">
        <div class="d-flex pt-4 pb-2">
            <form class="d-flex flex-row vol-md-11 col-lg-10 p-0" action="fullcalendar" method="get">
                <div class="form-label-group col-md-3 col-lg-2 p-0 mr-2" v-if="loggedIn">
                
                    <label for="region">Piirkond</label>
                    <input id="region" list="regions" class="form-control arrow" type="text">
                    <datalist id="regions">
                        <?php
                        foreach ($regions as $row) {
                            echo '<option  data-value="' . $row->id . '" value="' . $row->name . '"></option>';
                        }
                        ?>
                    </datalist>
                    <input type="hidden" id="roomId" name="roomId" value="roomId" />
                </div>

                <div class="form-label-group col-md-3 col-lg-2 p-0 mr-2">
                    <label for="sport_facility">Asutus</label>
                    <input id="sport_facility" list="asutus" class="form-control arrow">
                    <datalist id="asutus">
                        <?php foreach ($buildings as $each) {
                            echo '<option data-value="' . $each->id . '" value="' . $each->name . '"></option>';
                        }
                        ?>
                    </datalist>
                    <input type="hidden" id="roomId" name="roomId" value="roomId" />
                </div>

                <div class="form-label-group col-md-3 col-lg-2 p-0 mr-2">
                    <label for="room">Saal</label>
                    <input id="room" list="saal" class="form-control arrow">
                    <datalist id="saal">
                        <?php foreach ($rooms as $each) {
                            echo '<option data-value="' . $each->id . '">' . $each->roomName . '</option>';
                        }
                        ?>
                    </datalist>
                    <input type="hidden" id="roomId" name="roomId" value="roomId" />
                </div>

                <div class="form-label-group col-2 p-0">
                    <label for="app">Kuupäev</label>
                    <div id='app'>
                        <v-date-picker mode="single" v-model="date" :popover="{ visibility: 'click' }">
                            <input id="date" slot-scope="{ inputProps, inputEvents}" :class="[`form-control`]" v-bind="inputProps" v-on="inputEvents" name="date" value="date">
                        </v-date-picker>
                    </div>
                </div>
            </form>
            <div class="col-2 mr-auto p-0">
                <a class="btn btn-custom text-white text-center py-2 px-sm-2 px-lg-5 px-md-4 float-right pluss" href="<?php echo base_url(); ?>booking/create"><p class="m-0 txt-lg text-center">Lisa uus</p></a>
            </div>
        </div>

        <!-- ekfjwkejfkwejÄ -->

        <div id="calendar-container">
            <div id='calendar'></div>
        </div>

        </br>

        <!-- Modal -->
        <div class="modal left" id="lefty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
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
<h6>Kõik ajad</h6>

<hr>
<input type="checkbox" name="selectAll" value="1"> VALI KÕIK<hr>
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
                        <form id="change" method="post" action="<?php echo base_url(); ?>fullcalendar/edit">

                        <input type="submit" id="changeTimes" class="btn btn-dark" value="Muuda">
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

            </div>
        </div>



    </div><!-- container -->



    </div>
    </body>

    <script src='https://unpkg.com/v-calendar@next'></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                // Data used by the date picker
                mode: 'single',
                selectedDate: null,
                firstDayOfWeek: 2,

                attrs: [{
                    key: 'today',
                    highlight: true,
                    dates: new Date(),
                }, ],
                date: new Date(),
            }
        });

        $(document).ready(function() {

            $(':checkbox[name=selectAll]').click (function () {
                $(':checkbox[name=choices]').prop('checked', this.checked);
            });

            var calendar = $('#calendar').fullCalendar({
                editable: false,
                header: {
                    left: '',
                    center: 'prev, title, next',
                    right: ''
                },
                height: 'parent',
                // contentHeight: 600,
                // aspectRatio: 2.2,
                allDaySlot: false,
                firstDay: 1,

                dayNames: ['Pühapäev', 'Esmaspäev', 'Teisipäev', 'Kolmapäev', 'Neljapäev', 'Reede', 'Laupäev'],
                dayNamesShort: ['P', 'E', 'T', 'K', 'N', 'R', 'L'],
                monthNames: ['jaanuar', 'veebruar', 'märts', 'aprill', 'mai', 'juuni', 'juuli', 'august', 'september', 'oktoober', 'november', 'detsember'],
                monthNamesShort: ['jaan', 'veebr', 'märts', 'apr', 'mai', 'juuni', 'juuli', 'aug', 'sept', 'okt', 'nov', 'dets'],
                views: {
                    week: { // name of view
                        titleFormat: 'D. MMMM YYYY',
                        columnFormat: "dddd, D. MMM"
                        // other view-specific options here
                    },
                },

                defaultView: 'agendaWeek',
                weekNumbers: true,
                slotLabelFormat: 'H:mm',
                timeFormat: 'H:mm',
                slotDuration: '00:30:00',
                minTime: '08:00:00',
                maxTime: '22:00:00',

                //contentHeight:"auto",
                events: "<?php echo base_url(); ?>fullcalendar/load/<?php echo ($this->input->get('roomId')); ?>",
                selectable: true,
                selectHelper: true,
                eventRender: function (event, element) {
                element.find('.fc-title').before("<span>Päring: "+moment(event.created_at).format("DD.MM.YYYY HH:mm")+"</span>")},
                select: function(start, end, allDay) {
                    var public_info = prompt("Enter Event Title");
                    var roomID = <?php echo ($this->input->get('roomId')); ?>;
                    if (public_info) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "<?php echo base_url(); ?>fullcalendar/createfromcalendar",
                            type: "POST",
                            data: {
                                roomID: roomID,
                                public_info: public_info,
                                start: start,
                                end: end
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Added Successfully");
                            }
                        })
                    }
                },
                editable: true,
                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                    var title = event.title;

                    var id = event.id;
                   

                    $.ajax({
                        url: "<?php echo base_url(); ?>fullcalendar/update",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Update");
                        }
                    })
                },
                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    //alert(start);
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    //alert(end);
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "<?php echo base_url(); ?>fullcalendar/update",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    })
                },
                // eventClick: function(event) {
                //     if (confirm("Are you sure you want to remove it?")) {
                //         var id = event.id;
                //         $.ajax({
                //             url: "<?php echo base_url(); ?>fullcalendar/delete",
                //             type: "POST",
                //             data: {
                //                 id: id
                //             },
                //             success: function() {
                //                 calendar.fullCalendar('refetchEvents');
                //                 alert('Event Removed');
                //             }
                //         })
                //     }
                // }

                eventClick: function(event) {
                    $(':checkbox[name=selectAll]').prop('checked', false);
                 
                    // $("#successModal").modal("show");
                    // $("#successModal .modal-body p").text(event.title);
                    $('#myTable tr').remove();
                    $('#lefty').modal('show');
                    $("#lefty .modal-header h4").text(event.title);
                    $("#lefty #time").text(event.created_at);

                    $('#c_name').val(event.title);
                    $('#clubname').val(event.clubname);
                    if ($('#event_in').is(':empty')){
                    $('#event_in').val('Pole hooajaline broneering');}
                    else{
                        $('#event_in').val(moment(event.event_in).format('DD/MM/YYYY HH:mm'));
                    }
                    if ($('#event_out').is(':empty')){
                    $('#event_out').val('Pole hooajaline broneering');}
                    else{
                        $('#event_out').val(moment(event.event_out).format('DD/MM/YYYY HH:mm'));
                    }
                 // console.log($('#calendar').fullCalendar('clientEvents'));
                    var id = event.id;
                  //  console.log(id +" " +  event.timeID);
                    var events = $('#calendar').fullCalendar('clientEvents');
                    $('tbody').attr('id',id );


                    var startDateTime=[];
                    var endDateTime=[];
                    var arrayOfIDs=[];

                    for(var i = 0; i < events.length; i++){
                        var Bid=events[i].bookingID;
                        var BTimesid=events[i].timeID;
                       
                       
                     var roomID = <?php echo ($this->input->get('roomId')); ?>;
                    // console.log("event.id="+event.id+" Bookingtimes="+BTimesid+" Bid="+Bid+" "+roomID+ " "+events[i].roomID);
                      
                         
                        if(events[i].start != null && events[i].end != null ){
                            startDateTime.push(events[i].start._i.substring(0, 16));
                            arrayOfIDs.push(events[i].timeID);
                            endDateTime.push(events[i].end._i.substring(0, 16));
                       //  console.log((events[i].start._i.substring(0, 16))+" "+ events[i].end._i.substring(0, 16));
                        }
                       

                       
                  
                    };
                   
                    // console.log(startDateTime);
                    // console.log(endDateTime);
                    function isBetween(checkDateTime, startDateTime, endDateTime) {

                    return (checkDateTime >= startDateTime && checkDateTime <= endDateTime);

                    }

                    function toDate(str){
                        
                            var [ yyyy, MM,dd,  hh, mm ] = str.split(/[- :]/g);
                            return new Date(`${MM}/${dd}/${yyyy} ${hh}:${mm}`);
                    }


                  
                      

                    for (var i = 0; i < events.length; i++) {
                        var Bid=events[i].bookingID;
                        var BTimesid=events[i].timeID;
                       
                       
                  //   console.log("event.id="+event.id+" Bookingtimes="+BTimesid+" Bid="+Bid);
                        if (event.id==Bid) {
                        var approved = events[i].approved;
                        if(approved==1){
                            approved="Kinnitatud";
                        }
                       else if(approved==0){
                            approved="Kinnitamata";
                        };

                        var takesPlace = events[i].takesPlace;
                        if(takesPlace==1){
                            takesPlace="";
                        }
                        else if(takesPlace==0){
                            takesPlace="Ei toimu";
                        };
                        var start_date = new Date(events[i].start._d);
                        var end_date = '';
                        if (events[i].end != null) {
                            end_date = new Date(events[i].end._d);
                        }
                        var title = events[i].title;
                        
                        var st_day = start_date.getUTCDate();
                        
                        if(st_day<10){
                            st_day='0'+st_day;
                            }

                        var st_monthIndex = start_date.getUTCMonth() + 1;
                        if(st_monthIndex<10){
                            st_monthIndex='0'+st_monthIndex;
                            };
                        var st_year = start_date.getUTCFullYear();
                        var st_hours = start_date.getUTCHours();
                        if(st_hours==0){
                            st_hours='00';
                            }else if(st_hours<10){
                                st_hours='0'+st_hours;
                            }

                        var st_minutes = start_date.getUTCMinutes();
                        if(st_minutes==0){
                            st_minutes='00';
                            }
                        

                        var en_day ='';
                        var en_monthIndex = '';
                        var en_year = '';
                        if (end_date != '') {
                            en_day = end_date.getUTCDate();
                            if(en_day<10){
                                en_day='0'+en_day;
                            }

                            en_monthIndex = end_date.getUTCMonth()+1;
                            if(en_monthIndex<10){
                                en_monthIndex='0'+en_monthIndex;
                            };
                            en_year = end_date.getUTCFullYear();
                            var en_hours = end_date.getUTCHours();
                             if(en_hours<10){
                                en_hours='0'+en_hours;
                            }
                            var en_minutes = end_date.getUTCMinutes();
                            if(en_minutes==0){
                                en_minutes='00';
                            }
                        
                        }
                        var checkDateTime = st_year+'-'+st_monthIndex+'-'+st_day+" "+st_hours+':'+st_minutes;
                        var checkDateTime2 = en_year+'-'+en_monthIndex+'-'+en_day+" "+en_hours+':'+en_minutes;
                        $('#myTable > tbody:last-child').append(' <tr class="red'+i+'"><td><input type="checkbox" class="abc" name="choices" id="'+BTimesid+'"> ' + st_day + '-' + st_monthIndex + '-' + st_year + ' <br></td>   <td>&nbsp;&nbsp;&nbsp; ' +st_hours +':' +st_minutes+'-'+ en_hours+':'+en_minutes+'</td>   <td>&nbsp;&nbsp;&nbsp;'+approved+' </td></td>   <td>&nbsp;&nbsp;&nbsp;'+takesPlace+' </td>   </tr>');
                       if(event.timeID==BTimesid){  
                           console.log("klikk");
                           $("#"+BTimesid).prop('checked', true);}
                      
                        for(var t = 0; t < startDateTime.length; t++){
                            if(arrayOfIDs[t] != BTimesid){
                           
                               
                            if (isBetween(startDateTime[t],checkDateTime, checkDateTime2 ) || isBetween(endDateTime[t],checkDateTime, checkDateTime2) ){
                            //     console.log(isBetween(startDateTime[t],checkDateTime, checkDateTime2 ) || isBetween(endDateTime[t],checkDateTime, checkDateTime2));
                            //   console.log("konflikt:"+ startDateTime[t] +": "+endDateTime[t]);
                              $(".red"+i).css("color", "red");
                          
                            }
                        }
                        };
                      //  console.log(startDateTime);
                    //console.log(endDateTime);
                         //  console.log('Title-'+title+', start Date-' + st_year + '-' + st_monthIndex + '-' + st_day + ' , End Date-' + en_year + '-' + en_monthIndex + '-' + en_day + ' '+Bid + ' time ' +st_hours +':' +st_minutes+'-'+ en_hours+':'+en_minutes);
                  
                  

                      };
                         }


                    $('#phone').val(event.phone);
                    $('#selectedroom').val(event.selectedroom);
                    $('#email').val(event.email);
                    $('#created_at').val(event.created_at);
                    $('#workout').val(event.workout);
                  
                    $('#start').val(event.start);
                   $('#building').val(event.building);
                    $('#selectedroom').val(event.roomName);
                    $('#editModal').modal();
                },
               
                                


            });

            $("#delete").submit(function( event ) {
                   if ($('.abc:checked').length == $('.abc').length) 
                        {
                            if (confirm("Are you sure you want to remove it?")) {
                    event.preventDefault();    };
                           var id=  $('input:checkbox:checked').parents("tbody").attr('id');
                          console.log("kõik on ckeckitud, tuleb ka bookings ab-st ära kustutada "+id);
                        $.ajax({
                            url: "<?php echo base_url(); ?>fullcalendar/deleteAllConnectedBookings",
                            type: "POST",
                            data: {
                                bookingID: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                              
                                jQuery('input:checkbox:checked').parents("tr").remove();
                                $("#lefty").modal("hide");
                                alert('Event Removed');
                            }, 
                            error: function(returnval) {
                                $(".message").text(returnval + " failure");
                                $(".message").fadeIn("slow");
                                $(".message").delay(2000).fadeOut(1000);
                            },
                        })



                        }
                       else if ($('.abc:checked').length <$('.abc').length && $('.abc:checked').length>0) 
                        {
                            if (confirm("Are you sure you want to remove it?")) {
                             event.preventDefault();    };
                            
                            $("input:checkbox").each(function(){
                            var $this = $(this);

                            if($this.is(":checked")){
                                var id = $this.attr("id");
                                console.log("going to delete " +id);// $this.attr("id");

                                
                                $.ajax({
                                    url: "<?php echo base_url(); ?>fullcalendar/delete",
                                    type: "POST",
                                    data: {
                                        timeID: id
                                    },
                                    success: function() {
                                        calendar.fullCalendar('refetchEvents');
                                        
                                        jQuery('input:checkbox:checked').parents("tr").remove();
                                        alert('Event Removed');
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
                    alert("Sa ei valinud midagi mida kustutada");
                    event.preventDefault(); 
                };


               
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
                                    url: "<?php echo base_url(); ?>fullcalendar/approveEvents",
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

            $("#takesPlaceCheck").submit(function( event ) {
              if ($('.abc:checked').length <= $('.abc').length && $('.abc:checked').length>0) 
                        {
                            if (confirm("Valitud trennid ei toimu?")) {
                             event.preventDefault();    };
                            
                            $("input:checkbox").each(function(){
                            var $this = $(this);

                            if($this.is(":checked")){
                                var id = $this.attr("id");
                                $.ajax({
                                    url: "<?php echo base_url(); ?>fullcalendar/takesPlace",
                                    type: "POST",
                                    data: {
                                        timeID: id, 
                                        takesPlace: 0

                                    },
                                    success: function() {
                                        calendar.fullCalendar('refetchEvents');
                                        //siia tule teha panna kinnitatud olekuks modalis  
                                       // jQuery('input:checkbox:checked').parents("tr");
                                    //    ​$('input:checkbox:checked').parents("tr").text(function () {
                                    //         return $(this).text().replace("Ei toimu", ""); 
                                    //     });​​​​​
                                    $('input:checkbox:checked').parents("tr").children("td:contains('Ei toimu')").html("New");
                                        alert('Ei toimu');
                                    }, 
                                    error: function(returnval) {
                                        alert('Midagi läks valesti');
                                        $(".message").text(returnval + " failure");
                                        $(".message").fadeIn("slow");
                                        $(".message").delay(2000).fadeOut(1000);
                                    },
                                    })
                                }
                            });
                        }
                else{
                    alert("Sa ei märgistanud ühtegi ruutu");
                    event.preventDefault(); 
                };


               
            });

            


            $("#changeTimes").on('click',function( event ) {
              if ($('.abc:checked').length <= $('.abc').length && $('.abc:checked').length>0) 
                        {   var timesIdArray = [];
                            var id= '';
                            if (confirm("Muudan valitud aegasid?")) {
                             event.preventDefault();    };
                            
                            $("input:checkbox").each(function(){
                            var $this = $(this);

                            if($this.is(":checked")){
                                id=  $('input:checkbox:checked').parents("tbody").attr('id');
                                var timesId = $this.attr("id");
                                timesIdArray.push(timesId);

                                $("#change").children().not(':first').remove();

                                //$.post("<?php //echo base_url(); ?>/edit", { bookingID: id });


                              




                                // $.ajax({
                                //     url: "<?php //echo base_url(); ?>fullcalendar/takesPlace",
                                //     type: "POST",
                                //     data: {
                                //         timeID: id, 
                                //         takesPlace: 0

                                //     },
                                //     success: function() {
                                //         calendar.fullCalendar('refetchEvents');
                                //         //siia tule teha panna kinnitatud olekuks modalis  
                                //        // jQuery('input:checkbox:checked').parents("tr");
                                //     //    ​$('input:checkbox:checked').parents("tr").text(function () {
                                //     //         return $(this).text().replace("Ei toimu", ""); 
                                //     //     });​​​​​
                                //     $('input:checkbox:checked').parents("tr").children("td:contains('Ei toimu')").html("New");
                                //         alert('Ei toimu');
                                //     }, 
                                //     error: function(returnval) {
                                //         alert('Midagi läks valesti');
                                //         $(".message").text(returnval + " failure");
                                //         $(".message").fadeIn("slow");
                                //         $(".message").delay(2000).fadeOut(1000);
                                //     },
                                //     })
                                }

                              
                            });
                            console.log("kõik on ckeckitud, tuleb ka bookings ab-st ära kustutada "+id + ' ' +timesIdArray);
                            timesIdArray.unshift(id);
                                    var myForm = document.getElementById('change');

                                    timesIdArray.forEach(function (value) {
                                    var hiddenInput = document.createElement('input');

                                    hiddenInput.type = 'hidden';
                                    hiddenInput.name = 'timesIdArray[]';
                                    hiddenInput.value = value;

                                    myForm.appendChild(hiddenInput);
                                    });

                                  $('#change').submit();
                                
                        }
                else{
                    alert("Sa ei märgistanud ühtegi ruutu");
                    event.preventDefault(); 
                };


               
            });

            var calHeight = $( ".fc-body" ).height();
            var calRows = $( ".fc-slats tr" ).length;
            var rowHeightRaw = calHeight / calRows;
            var rowHeight = rowHeightRaw.toString().match(/^-?\d+(?:\.\d{0,1})?/)[0];
            $('.fc-slats tr').css('height', rowHeight+'px');
            $(window).trigger('resize');
            
            console.log(calHeight);
            console.log(calRows);
            console.log(rowHeightRaw);
            console.log(rowHeight);
            



        });
    </script>