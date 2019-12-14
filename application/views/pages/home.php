<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- <a href="<?php echo site_url('login/logout');?>">Sign Out</a> -->

<div class="container-fluid">
    <div class="d-flex">

        <div class="d-none d-md-flex col-md-6 col-lg-8 p-0 img-container">
            <div class="content">
                <div class="blur"></div>                
            </div>
            <div class="text">
                <h1>Kõigi Pärnu spordikeskuste vabad ajad ühes kohas!</h1>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="d-flex align-items-center">
                <div class="col-7"  id="form-container">
                    <form action="fullcalendar" method="get">

                        <div class="form-label-group">
                            <label for="region">Piirkond</label>
                            <input id="region" list="regions" class="form-control arrow" type="text">
                            <datalist id="regions">
                                <?php foreach ($regions as $row) {
                                    echo '<option  data-value="' . $row->id . '" value="' . $row->name . '"></option>';
                                }
                                ?>
                            </datalist>
                        </div>

                        <div class="form-label-group">
                            <label for="sport_facility">Asutus</label>
                            <input id="sport_facility" list="asutus" class="form-control arrow">
                            <datalist id="asutus">
                                <?php foreach ($buildings as $each) {
                                    echo '<option data-value="' . $each->id . '" value="' . $each->name . '"></option>';
                                }
                                ?>
                            </datalist>
                        </div>

                        <div class="form-label-group">
                            <label for="room">Saal</label>
                            <input id="room" list="saal" class="form-control arrow" required> 
                            <datalist id="saal">
                                <?php foreach ($rooms as $each) {
                                    echo '<option data-value="' . $each->id . '">' . $each->roomName . '</option>';
                                }
                                ?>
                            </datalist>
                            <input type="hidden" id="roomId" name="roomId" value="roomId" />
                        </div>

                        <div class="form-label-group">
                            <label for="app">Kuupäev</label>
                            <div id='app'> <!-- SEE SIIN ASENDADA JQUERY DATEPICKERIGA!!!! -->
                                <v-date-picker mode="single" v-model="date" :popover="{ visibility: 'click' }"><!-- SEE SIIN ASENDADA JQUERY DATEPICKERIGA!!!! -->
                                    <input id="date" slot-scope="{ inputProps, inputEvents}" :class="[`form-control`]" v-bind="inputProps" v-on="inputEvents" name="date" value="date">
                                </v-date-picker><!-- SEE SIIN ASENDADA JQUERY DATEPICKERIGA!!!! -->
                            </div><!-- SEE SIIN ASENDADA JQUERY DATEPICKERIGA!!!! -->
                        </div>

                        <input class="btn btn-custom col-12 text-white mt-3" type="submit" value="Kuva kalender">

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script src='https://unpkg.com/v-calendar@next'></script>


<script>
    // Datepicker app - DO NOT TOUCH xD -------------->
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
    })
    // <------------ Datepicker app - DO NOT TOUCH xD
    $(document).ready(function() {

        $('#regions1').change(function() {
            var country_id = $('#regions1').val();
            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/fetch_city",
                    method: "POST",
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $('#state').html(data);
                        $('#citys').html('<option value="">Vali asutus</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select State</option>');
                $('#citys').html('<option value="">Select rerre</option>');
            }
        });

        $('#state').change(function() {
            var value = $('#state').val();
            var state_id = $('#state [value="' + value + '"]').data('value');
            console.log("stateid is " + state_id);
            if (state_id != '') {
                console.log("data");
                $.ajax({
                    url: "<?php echo base_url(); ?>home/fetch_building",
                    method: "POST",
                    data: {
                        state_id: state_id
                    },
                    success: function(data) {
                        console.log("data is " + data);
                        $('#citys').html(data);
                        $('#saal').html(data).appendTo("#saal");
                    },
                });
            } else {
                $('#city').html('<option value="">Select ruums</option>');
            }
        });

        $('#room[list]').on('input', function(e) {
            var $input = $(e.target),
                $options = $('#' + $input.attr('list') + ' option'),
                label = $input.val();

            for (var i = 0; i < $options.length; i++) {
                var $option = $options.eq(i);
                if ($option.text() === label) {
                    $("#roomId").val($option.attr('data-value'));
                    break;
                }
            }
        });

        $('input[id=region]').focusin(function() {
            $('input[id=region]').val('');           
        });

        $('input[id=sport_facility]').focusin(function() {
            $('input[id=sport_facility]').val('');
        });

        $('input[id=room]').focusin(function() {
            $('input[id=room]').val('');
        });

        $("#region").on('change keydown input paste', function(e) {
            var $input = $(this),
                val = $input.val();
            list = $input.attr('list'),
                match = $('#' + list + ' option').filter(function() {
                    return ($(this).val() === val);
                });
            if (match.length > 0) {
                console.log("match");
                var value = $('#region').val();
                var country_id = $('#regions [value="' + value + '"]').data('value');
                $.ajax({
                    url: "<?php echo base_url(); ?>home/fetch_city",
                    method: "POST",
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        console.log("data on " + data);
                        $("#asutus").empty();
                        $("#room").empty();
                        $('#asutus').html(data).appendTo("#asutus");
                    }
                });
            } else {
                console.log("dismatch");
                $('#room').val('');
                $('#sport_facility').val('');

            }
        });

        $("#sport_facility").on('change keydown input paste', function(e) {
            var $input = $(this),
                val = $input.val();
            list = $input.attr('list'),
                match = $('#' + list + ' option').filter(function() {
                    return ($(this).val() === val);
                });
            if (match.length > 0) {
                console.log("match");
                var value = $('#sport_facility').val();
                var state_id = $('#asutus [value="' + value + '"]').data('value');
                console.log(state_id);
                $.ajax({
                    url: "<?php echo base_url(); ?>home/fetch_building",
                    method: "POST",
                    data: {
                        state_id: state_id
                    },
                    success: function(data) {
                        console.log("data on " + data);
                        $('#room').val('');
                        $("#saal").empty();
                        $('#saal').html(data).appendTo("#saal");
                    }
                });
            } else {
                console.log("dismatch");
                $('#room').val('');
            }
        });
    });
</script>