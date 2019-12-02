
<head>
    <title>Jquery FullCalendar Integration with Codeigniter using Ajax</title>

    <script>
        $(document).ready(function() {

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                firstDay: 1,
                dayNames: ['Pühapäev', 'Esmaspäev', 'Teisipäev', 'Kolmapäev',
                    'Neljapäev', 'Reede', 'Laupäev'
                ],
                dayNamesShort: ['P', 'E', 'T', 'K', 'N', 'R', 'L'],
                views: {
                    week: { // name of view
                        columnFormat: " ddd D.M"
                        // other view-specific options here
                    }
                },

                defaultView: 'agendaWeek',
                weekNumbers: 'true',
                slotLabelFormat: 'H:mm',
                slotDuration: '00:15:00',
                minTime: '08:00:00',
                maxTime: '24:00:00',
                //contentHeight:"auto",
                events: "<?php echo base_url(); ?>fullcalendar/load/<?php echo ($this->input->get('roomId')); ?>",
                selectable: true,
                selectHelper: true,
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

                    $("#successModal").modal("show");
                    $("#successModal .modal-body p").text(event.title);

                }


            });
        });
    </script>
</head>

<body>

    <p align="right"><a href="https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/booking/create">Broneerima</a></p>

    <!-- <div class="container"> -->
    <div id='calendar'></div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p></p>
                </div>
            </div>
        </div>
    </div>



    
    <!-- </div> -->
</body>

</html>