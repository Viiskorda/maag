    <div class="container">
        <div class="d-flex pt-4 pb-2">
            <form class="d-flex flex-row col-10 p-0" action="fullcalendar" method="get">
                <div class="form-label-group col-4 p-0">
                    <label for="room">Saal</label>
                    <input id="room" list="saal" class="form-control arrow">
                    <datalist id="saal">
                        <?php foreach ($rooms as $each) {
                            echo '<option data-value="' . $each->id . '">' . $each->name . '</option>';
                        }
                        ?>

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

        <div class="calendar-container">
            <div id='calendar'></div>
        </div>

        </br>

	<!-- Modal -->
	<div class="modal left" id="lefty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Left Sidebar</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					
				</div>

				<div class="modal-body">
					<p id="time"></p>
				</div>

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

var calendar = $('#calendar').fullCalendar({
    editable: false,
    header: {
        left: '',
        center: 'prev, title, next',
        right: ''
    },
    height: 'parent',
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
    slotLabelFormat:'H:mm',
    timeFormat: 'H:mm',
    slotDuration: '00:30:00',
    minTime: '08:00:00',
    maxTime: '22:00:00',
    
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

        // $("#successModal").modal("show");
        // $("#successModal .modal-body p").text(event.title);
        $('#lefty').modal('show');
        $("#lefty .modal-header h4").text(event.title);
        $("#lefty #time").text(event.start);
    }


});
});
</script>