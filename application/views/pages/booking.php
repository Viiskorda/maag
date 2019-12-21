<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- <h2><?= $title; ?></h2> -->


<?php echo validation_errors(); ?>
<div class="container">
    <div id="forms" class="container-md">
        <div id="nav-tabs" class="mt-5 pb-5 form-bg">
            <div class="d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey">
                    <li class="nav-item"><a  class="nav-link link txt-lg  active" href="#mitmekordne" data-toggle="tab">Ühekordne borneering</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg" href="#hooajaline" data-toggle="tab">Hooajaline borneering</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg" href="#suletud" data-toggle="tab">Suletud borneering</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="mitmekordne" class="tab-pane center active">
                    <?php echo form_open('booking/createOnce'); ?>

                        <h4 class="pt-2 txt-xl px-5 mx-5">Kontakt</h4>
                        <div class="d-flex p-0 mt-4 px-5 mx-5">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="contact">Klubi nimi</label>
                                <input class="form-control" id="clubname" type="text" name="clubname">
                            </div>
                            <input class="d-none" type="checkbox" id="type" name="type" value="1" checked>
                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Kontaktisik</label>
                                <input class="form-control" id="contact" name="contactPerson">
                            </div>
                        </div>
                        <div class="d-flex mt-2 px-5 mx-5">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label>Telefoni number</label>
                                <input class="form-control" id="phone" name="phone">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email">
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
                                <select id="room" list="saal" name="sportrooms" class="form-control arrow">
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->roomName . '</option>';
                                            } ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mt-2 px-5 mx-5">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label>Treeningu tüüp</label>
                                <input class="form-control" id="type" name="workoutType">
                            </div>
                            <div class="form-label-group col-6 p-0 pl-5"></div>
                        </div>

                        <h4 class="mt-5 txt-xl px-5 mx-5">Kuupäev ja kellaaeg</h4>
                        <div class="mt-4 bg-grey py-2">
                            <div class="form-label-group px-5 mx-5" id="timestamp">
                                <label for="InputsWrapper">Kuupäev</label>
                                <div id="InputsWrapper" class="mb-3 p-0">
                                    <div class="d-flex align-items-center mb-3 justify-content-between">
                                        <input class="datePicker col-5 form-control" id="datefield_1" data-toggle="datepicker" name="workoutDate[]">

                                        <a href="#" class="removeclass col-1 pl-1 pr-5"><span class="icon-cancel"></span></a>

                                        <div class="col-2 p-0 ml-5">
                                            <input type="text" class="clock form-control" name="begin[]" id="timestartfield_1" value="<?php echo date('H:i'); ?>">
                                        </div>

                                        <div class="col-2 p-0">
                                            <input type="text" class="clock form-control" name="end[]" min="08:00" max="22:00" id="timeendfield_1" value="<?php echo date("H:i", strtotime('+90 minutes')); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div id="AddMoreFileId" class="d-flex col-5 p-0">
                                    <a href="#" id="AddMoreFileBox" class="btn btn-custom text-white text-center py-2 px-4 pluss"><p class="m-0 px-0 txt-lg text-center align-items-center">Lisa veel üks kuupäev</p></a>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-5 txt-xl px-5 mx-5">Lisainfo (valikuline) </h4>
                        <div class="mt-4 px-5 mx-5">
                            <div class="form-label-group pb-2 px-0">
                                <label>Lisainfo</label>
                                <textarea class="form-control" id="additional" name="additionalComment" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-5 px-5 mx-5">
                            <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="#">Katkesta</a>
                            <input class="btn btn-custom col-3 text-white txt-xl" type="submit" value="Broneeri">
                        </div>
                    </form>
                </div>

                <div id="hooajaline" class="tab-pane center">
                    <?php echo form_open('booking/createClosed'); ?>

                        <h4 class="pt-2 txt-xl px-5 mx-5">Kontakt</h4>
                        <div class="d-flex px-5 mx-5 mt-4">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="contact">Klubi nimi</label>
                                <input class="form-control" id="clubname" type="text" name="clubname">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Kontaktisik</label>
                                <input class="form-control" id="contact" name="contactPerson">
                            </div>
                        </div>
                        <div class="d-flex mt-2 px-5 mx-5">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label>Telefoni number</label>
                                <input class="form-control" id="phone" name="phone">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email">
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
                                <select id="room" list="saal" name="sportrooms" class="form-control arrow">
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->roomName . '</option>';
                                            } ?>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex mt-2 px-5 mx-5">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label>Treeningu tüüp</label>
                                <input class="form-control" id="type" name="workoutType">
                            </div>
                            <div class="form-label-group col-6 p-0 pl-5">
                                <input class="d-none" type="checkbox" name="type" value="2" checked>
                            </div>
                        </div>                        
                           
                        <h4 class="mt-5 txt-xl px-5 mx-5">Kuupäev ja kellaaeg</h4>
                        <div class="mt-4 bg-grey py-2">
                            <div class="form-label-group px-5 mx-5"  id="InputsWrapper1">
                                <div class="d-flex justify-content-between m-0 px-0 pt-0 pb-1">
                                    <label class="col-5 m-0 p-0" for="sport_facility2">Nädalapäev</label>
                                    <label class="d-hidden col-1 mr-1 p-0"></label>
                                    <label class="col-2 m-0 pl-3" for="from1">Alates</label>
                                    <label class="col-2 m-0 p-0" for="until1">Kuni</label>
                                </div>
                                <div id="dateContainer">
                                    <div class="d-flex align-items-center mb-3 justify-content-between">
                                        <input class="form-control col-5 arrow" id="sport_facility2" list="weekdays" name="weekday[]">

                                            <datalist id="weekdays">
                                                <option data-value="1" value="Esmaspäev"></option>
                                                <option data-value="2" value="Teisipäev"></option>
                                                <option data-value="3" value="Kolmapäev"></option>
                                                <option data-value="4" value="Neljapäev"></option>
                                                <option data-value="5" value="Reede"></option>
                                                <option data-value="6" value="Laupäev"></option>
                                                <option data-value="7" value="Pühapäev"></option>       
                                            </datalist>

                                        <a href="#" class="removeclass1 col-1 pl-1 pr-5"><span class="icon-cancel"></span></a>

                                        <div class="col-2 p-0 ml-5">
                                            <input type="text" class="clock form-control" name="timesStart[]" id="from1" value="<?php echo date('H:i'); ?>">
                                        </div>

                                        <div class="col-2 p-0">
                                            <input type="text" class="clock form-control" name="timeTo[]" id="until1" value="<?php echo date("H:i", strtotime('+90 minutes')); ?>">
                                        </div>                                    
                                    </div>
                                </div>

                                <div id="AddMoreFileId1" class="flex col-5 p-0">
                                    <a href="" id="AddMoreFileBoxPeriod" class="btn btn-custom text-white text-center py-2 px-4 pluss"><p class="m-0 px-0 txt-lg text-center align-items-center">Lisa veel üks päev</p></a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex px-5 mx-5 mt-4">                        
                            <div class="form-label-group m-0 pl-0 pr-3 col-3">
                                <label>Periood</label>
                                <input class="datePicker form-control" id="periodStart" data-toggle="datepicker" name="startingFrom">
                            </div>
                            <div class="form-label-group m-0 pl-0 col-3">  
                                <label class="invisible">Periood</label> 
                                <input class="datepickerUntil form-control" id="periodEnd" data-toggle="datepickerUntil" name="Ending">
                            </div>
                        </div>

                        <h4 class="mt-5 txt-xl px-5 mx-5">Lisainfo (valikuline) </h4>
                        <div class="mt-4 px-5 mx-5">
                            <div class="form-label-group pb-2 px-0">
                                <label>Lisainfo</label>
                                <textarea class="form-control" id="comment2" name="comment2" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-5 px-5 mx-5">
                            <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="">Katkesta</a>
                            <input class="btn btn-custom col-3 text-white txt-xl" type="submit" value="Broneeri">
                        </div>
                    </form>
                </div>

                <div id="suletud" class="tab-pane center">
                <?php echo form_open('booking/createClosed'); ?>

                        <h4 class="mt-5 txt-xl px-5 mx-5">Saal ja aeg</h4>
                        <div class="d-flex px-5 mx-5">
                            <div class="form-label-group col-6 pl-0">
                                <label for="contact">Saal</label>
                                <select name="sportrooms"  class="form-control arrow" id="room2">
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->roomName . '</option>';
                                            } ?>
                                </select>                                
                            </div>

                            <div class="d-flex mt-2 px-5 mx-5">
                                <input class="d-none" type="checkbox" name="type" value="4" checked> <!-- Suletud (See tuleb ära peita ehk panna hidden)<br> -->
                                <input class="d-none" type="checkbox" name="clubname" value="Suletud" checked> <!-- Suletud Title (See tuleb ära peita ehk panna hidden)<br> -->
                            </div>
                        </div>

                        <div class="mt-4 bg-grey py-2">
                            <div class="form-label-group px-5 mx-5"  id="InputsWrapper2">
                                <div class="d-flex justify-content-between m-0 px-0 pt-0 pb-1">
                            <!-- <div class="form-label-group col-6 pl-0"  id="InputsWrapper2"> -->
                                    <label class="col-5 m-0 p-0" for="sport_facility2">Nädalapäev</label>
                                    <label class="d-hidden col-1 mr-1 p-0"></label>
                                    <label class="col-2 m-0 pl-3" for="from1">Alates</label>
                                    <label class="col-2 m-0 p-0" for="until1">Kuni</label>
                                </div>
                                <div id="closeContainer">
                                    <div class="d-flex align-items-center mb-3 justify-content-between">
                                        <input class="form-control col-5 arrow" id="sport_facility2" list="weekdays" name="weekday[]">

                                            <datalist id="weekdays">
                                                <option data-value="1" value="Esmaspäev"></option>
                                                <option data-value="2" value="Teisipäev"></option>
                                                <option data-value="3" value="Kolmapäev"></option>
                                                <option data-value="4" value="Neljapäev"></option>
                                                <option data-value="5" value="Reede"></option>
                                                <option data-value="6" value="Laupäev"></option>
                                                <option data-value="7" value="Pühapäev"></option>
                                            </datalist>

                                        <a href="#" class="removeclass2 col-1 pl-1 pr-5"><span class="icon-cancel"></span></a>

                                        <div class="col-2 p-0 ml-5">
                                            <input type="text" class="clock form-control" name="timesStart[]" id="from1" value="<?php echo date('H:i'); ?>">
                                        </div>

                                        <div class="col-2 p-0">
                                            <input type="text" class="clock form-control" name="timeTo[]" id="until1" value="<?php echo date("H:i", strtotime('+90 minutes')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div id="AddMoreFileId2" class="flex">
                                    <input type="button" id="AddMoreFileBoxClosed" value=" + Lisa nädalapäev" class="btn btn-custom text-white text-center py-2 px-5 pluss">
                                </div>
                            </div>
                        </div>


                        <div class="d-flex px-5 mx-5 mt-4">                        
                            <div class="form-label-group m-0 pl-0 pr-3 col-3">
                                <label>Periood</label>
                                <input class="datePicker form-control" id="periodStart" data-toggle="datepicker" name="startingFrom">
                            </div>
                            <div class="form-label-group m-0 pl-0 col-3">  
                                <label class="invisible">Periood</label> 
                                <input class="datePicker form-control" id="periodEnd" data-toggle="datePicker" name="Ending">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-5 px-5 mx-5">
                            <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="">Katkesta</a>
                            <input class="btn btn-custom col-3 text-white txt-xl" type="submit" value="Broneeri">
                        </div>
                    </form>
                </div>
                                        </div>

        </div>
    </div>
</div>
</br>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>
<script>


    $(document).ready(function() {

        var today=new Date();
        var endOfPeriond=new Date('05/31/'+ new Date().getFullYear()); 
       
        var dateToShow='';
        if (today<endOfPeriond){
            dateToShow=endOfPeriond;

        }else{
            dateToShow=new Date(endOfPeriond.setFullYear(endOfPeriond.getFullYear() + 1));  ;
        };
       

        $(".datepickerUntil").datepicker({
            language: "et-EE",
            autoHide: true,
            date: dateToShow,
            autoPick: true,
        });

        $(".datePicker").datepicker({
            language: "et-EE",
            autoHide: true,
            date: new Date(),
            autoPick: true,
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

        var MaxInputs = 10; //maximum extra input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileBox"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = 1; //to keep track of text box added

        //on add input button click
        $(AddButton).click(function(e) {
            //max input box allowed
            if (x <= MaxInputs) {
                FieldCount++; //text box added ncrement
                //add input box
                $('#InputsWrapper').append('<div class="d-flex align-items-center mb-3 justify-content-between"><input class="datePicker col-5 form-control" id="datefield_' + FieldCount + '" data-toggle="datepicker" name="workoutDate[]"><a href="#" class="removeclass col-1 pl-1 pr-5"><span class="icon-cancel"></span></a><div class="col-2 p-0 ml-5"><input type="text" class="clock form-control" name="begin[]" id="timestartfield_' + FieldCount + '" value="<?php echo date('H:i'); ?>"></div><div class="col-2 p-0"><input type="text" class="clock form-control" name="end[]" min="08:00" max="22:00" id="timeendfield_' + FieldCount + '" value=""></div></div>');

                $(".datePicker").datepicker({
                    language: "et-EE", 
                    autoHide: true, 
                    date: new Date(), 
                    autoPick: true
                });

                $(".datepickerUntil").datepicker({
                    language: "et-EE",
                    autoHide: true,
                    date: dateToShow,
                    autoPick: true,
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

                x++; //text box increment

                $("#AddMoreFileId").show();
                // $('AddMoreFileBox').html("Add field");

                // Delete the "add"-link if there is 3 fields.
                if (x == MaxInputs) {
                    $("#AddMoreFileId").hide();
                    $("#lineBreak").html("<br>");
                }
            }
            return false;
        });

        $("#timestamp").on("click", ".removeclass", function(e) { //user click on remove text
            if (x > 1) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox
                $("#AddMoreFileId").show();
                console.log(x);
                return x;
            }
            return false;
        });
        
        var maxPeriod = 8;
        var InputsWrapper1 = $("#InputsWrapper1"); //Input boxes wrapper ID
        var AddButton1 = $("#AddMoreFileBoxPeriod"); //Add button ID

        var y = InputsWrapper1.length; //initlal text box count
        
        $("#AddMoreFileBoxPeriod").click(function(e) {
            //max input box allowed

            if (y <= maxPeriod) {
                FieldCount++; //text box added ncrement
                //add input box
                $('#dateContainer').append('<div class="d-flex align-items-center mb-3 justify-content-between"><input class="form-control col-5 arrow" id="sport_facility2" list="weekdays" name="weekday[]"><datalist id="weekdays"><option data-value="1" value="Esmaspäev"></option><option data-value="2" value="Teisipäev"></option><option data-value="3" value="Kolmapäev"></option><option data-value="4" value="Neljapäev"></option><option data-value="5" value="Reede"></option><option data-value="6" value="Laupäev"></option><option data-value="7" value="Pühapäev"></option></datalist><a href="#" class="removeclass1 col-1 pl-1 pr-5"><span class="icon-cancel"></span></a><div class="col-2 p-0 ml-5"><input type="text" class="clock form-control" name="timesStart[]" id="from' + FieldCount + '" value="<?php echo date('H:i'); ?>"></div><div class="col-2 p-0"><input type="text" class="clock form-control" name="timeTo[]" id="until' + FieldCount + '" value=""></div></div>');

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

                y++; //text box increment

                $("#AddMoreFileId1").show();

                // $('AddMoreFileBox').html("Add field");

                // Delete the "add"-link if there is 3 fields.
                if (y == maxPeriod) {
                    $("#AddMoreFileId1").hide();
                    $("#lineBreak").html("<br>");
                }
            }
            return false;
        });

        $("#dateContainer").on("click", ".removeclass1", function(e) { //user click on remove text
            if (y > 1) {
                $(this).parent('div').remove(); //remove text box
                y--; 
                $("#AddMoreFileId1").show();

               }
            return false;
        });


        var maxClosed = 8;
        var InputsWrapper2 = $("#InputsWrapper2"); //Input boxes wrapper ID
        var AddButton2 = $("#AddMoreFileBoxClosed"); //Add button ID

        var z = InputsWrapper2.length; //initlal text box count


        $("#AddMoreFileBoxClosed").click(function(e) {
            //max input box allowed

            if (z <= maxClosed) {
                FieldCount++; //text box added ncrement
                //add input box
                $('#closeContainer').append('<div class="d-flex align-items-center mb-3 justify-content-between"><input class="form-control col-5 arrow" id="sport_facility2" list="weekdays" name="weekday[]"><datalist id="weekdays"><option data-value="1" value="Esmaspäev"></option><option data-value="2" value="Teisipäev"></option><option data-value="3" value="Kolmapäev"></option><option data-value="4" value="Neljapäev"></option><option data-value="5" value="Reede"></option><option data-value="6" value="Laupäev"></option><option data-value="7" value="Pühapäev"></option></datalist><a href="#" class="removeclass2 col-1 pl-1 pr-5"><span class="icon-cancel"></span></a><div class="col-2 p-0 ml-5"><input type="text" class="clock form-control" name="timesStart[]" id="from' + FieldCount + '" value="<?php echo date('H:i'); ?>"></div><div class="col-2 p-0"><input type="text" class="clock form-control" name="timeTo[]" id="until' + FieldCount + '" value=""></div></div>');

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

                z++; //text box increment

                $("#AddMoreFileId1").show();

                // $('AddMoreFileBox').html("Add field");

                // Delete the "add"-link if there is 3 fields.
                if (z == maxClosed) {
                    $("#AddMoreFileId2").hide();
                    $("#lineBreak").html("<br>");
                }
            }
            return false;
        });

        $('#closeContainer').on('click', '.removeclass2', function(e) { //user click on remove text
            if (z > 1) {
                $(this).parent('div').remove(); //remove text box
                z--; 
                $("#AddMoreFileId2").show();

               }
            return false;
        });



    });

    $(".nav a").on("click", function() { // TAB'i active klassi toggle
        $(".nav a").removeClass("active");
        $(this).addClass("active");
    });

    
    
</script>