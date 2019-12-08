<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- <h2><?= $title; ?></h2> -->


<?php echo validation_errors(); ?>
<div class="container">
    <div id="proov" class="container-md">
        <div id="nav-tabs" class="mt-5 pb-5 form-bg">
            <div class="d-flex mb-5">
                <ul class="bg-grey nav nav-tabs nav-justified col-12">
                    <li class="nav-item"><a class="nav-link link txt-lg" v-bind:class="{ active: isActiveE }" href="#" @click="tabSwitchT">Ühekordne borneering</a></li>
                    <li class="nav-item"><a class="nav-link link txt-lg" v-bind:class="{ active: isActiveH }" href="#" @click="tabSwitchH">Hooajaline borneering</a></li>
                    <li class="nav-item"><a class="nav-link link txt-lg" v-bind:class="{ active: isActiveC }" href="#" @click="tabSwitchS">Suletud borneering</a></li>
                </ul>
            </div>
            <!-- <div class="lookup-lg d-flex align-items-center py-5" id="body"> -->

                <!-- <div class="col-9 align-self center mx-auto"> -->

                <div id="mitmekordne" class="center px-5 mx-5" v-if="trenn">
                    <?php echo form_open('booking/create'); ?>

                        <h4 class="pt-2 txt-xl">Kontakt</h4>
                        <div class="d-flex p-0 mt-4">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="contact">Klubi nimi</label>
                                <input class="form-control" id="clubname" type="text" name="clubname">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Kontaktisik</label>
                                <input class="form-control" id="contact" name="contactPerson">
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label>Telefoni number</label>
                                <input class="form-control" id="phone" name="phone">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email">
                            </div>
                        </div>

                        <h4 class="mt-5 txt-xl">Asukoht ja treeningu tüüp</h4>
                        <div class="d-flex mt-4">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="sport_facility">Asutus</label>
                                <input id="sport_facility" class="form-control" list="asutus" id="building">
                                <datalist id="asutus">
                                <?php foreach ($buildings as $each) {
                                    echo '<option data-value="' . $each->id . '" value="' . $each->name . '"></option>';
                                }
                                ?>
                                </datalist>
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label for="room">Saal</label>
                                <select id="room" list="saal" name="sportrooms" class="form-control">
                                <!-- <option value=0>Select option</option>' -->
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->roomName . '</option>';
                                            } ?>
                                </select>


                            </div>
                        </div>
                        <div>
                            <div class="form-label-group col-6 py-0 pl-0 pr-5 mt-2">
                                <label>Treeningu tüüp</label>
                                <input class="form-control" id="type" name="workoutType">
                            </div>
                        </div>

                        <h4 class="mt-5 txt-xl">Kuupäev ja kellaaeg</h4>
                        <div class="d-flex mt-4">
                            <div class="form-label-group col-12 p-0" id="timestamp">
                                <label for="InputsWrapper">Kuupäev</label>
                                <div class="p-0" id="InputsWrapper">
                                    <div class="d-flex align-items-center mb-3">
                                        <input class="form-control col-5.5 p-0" type="datetime-local" name="mytext[1]" id="field_1" value="<?php echo date('Y-m-d\TH:i'); ?>">
                                        <p class="align-middle m-0 p-0" style="height: 20px;">–</p> 
                                        <input class="form-control col-5.5 p-0" type="datetime-local" name="begin[1]" step="900" min="08:00" max="22:00" id="timestartfield_1" value="">
                                        <!-- <input type="time" name="end[1]" step="900" min="08:00" max="22:00" id="timeendfield_1" value=""> -->
                                        <a href="#" class="removeclass"></a>
                                    </div>
                                    <div id="AddMoreFileId" class="flex"><a href="#" id="AddMoreFileBox" class="btn btn-custom text-white text-center py-2 px-5 pluss"><p class="m-0 txt-lg text-center align-items-center">Lisa veel üks kuupäev</p></a></div>
                                </div>
                            </div>
                            <!-- <div class="bg-grey"></div> -->
                        </div>


                        <h4 class="mt-5 txt-xl">Lisainfo (valikuline) </h4>
                        <div class="d-flex mt-4">
                            <div class="form-label-group col-6  py-0 pl-0 pr-5">
                                <label>Lisainfo</label>
                                <input class="form-control" id="additional" name="additionalComment">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5" v-if="loggedin">
                                <label>Asutusesisene kommentaar</label>
                                <input class="form-control" id="comment2" name="comment2">
                            </div>
                        </div>


                        <div class="d-flex justify-content-end mt-5">
                            <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="#">Katkesta</a>
                            <input class="btn btn-custom col-3 text-white txt-xl" type="submit" value="Broneeri">
                        </div>
                    </form>
                </div>

                <div id="hooajaline" class="center px-5 mx-5" v-if="hooajaline">
                    <?php echo form_open('booking/create'); ?>

                        <h4 class="pt-2 txt-xl">Kontakt</h4>
                        <div class="d-flex p-0 mt-4">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="contact">Klubi nimi</label>
                                <input class="form-control" id="clubname" type="text" name="clubname">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Kontaktisik</label>
                                <input class="form-control" id="contact" name="contactPerson">
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label>Telefoni number</label>
                                <input class="form-control" id="phone" name="phone">
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email">
                            </div>
                        </div>

                        <h4 class="mt-5 txt-xl">Asukoht ja treeningu tüüp</h4>
                        <div class="d-flex mt-4">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="sport_facility">Asutus</label>
                                <input id="sport_facility" class="form-control" list="asutus" id="building">
                                <datalist id="asutus">
                                <?php foreach ($buildings as $each) {
                                    echo '<option data-value="' . $each->id . '" value="' . $each->name . '"></option>';
                                }
                                ?>
                                </datalist>
                            </div>

                            <div class="form-label-group col-6 p-0 pl-5">
                                <label for="room">Saal</label>
                                <select id="room" list="saal" name="sportrooms" class="form-control">
                                <!-- <option value=0>Select option</option>' -->
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->roomName . '</option>';
                                            } ?>
                                </select>


                            </div>
                        </div>
                        <div>
                            <div class="form-label-group col-6 py-0 pl-0 pr-5 mt-2">
                                <label>Treeningu tüüp</label>
                                <input class="form-control" id="type" name="workoutType">
                            </div>
                        </div>

                        <h4 class="mt-5 txt-xl">Kuupäev ja kellaaeg</h4>
                        <div class="d-flex mb-2 mt-4">
                            <div class="form-label-group col-6 py-0 pl-0 pr-5">
                                <label for="sport_facility2">Nädalapäev</label>
                                <input class="form-control" id="sport_facility2" list="weekdays" name="weekday">
                             
                                <datalist id="weekdays">
                                <option data-value="1" value="Esmaspäev"></option>
                                <option data-value="2" value="Teisipäev"></option>
                                <option data-value="3" value="Kolmapäev"></option>
                                <option data-value="4" value="Neljapäev"></option>
                                <option data-value="5" value="Reede"></option>
                                <option data-value="6" value="Laupäev"></option>
                                <option data-value="7" value="Pühapäev"></option>
                     
                                </datalist>


                              
                            </div>

                            <div class="form-label-group col-3 p-0 pl-5">
                                <label>Alates</label>
                                <!-- <input class="form-control p-0" id="from2"> -->
                                <input class="form-control" type="time"  min="08:00" max="22:00" step="900"  name="timesStart" id="from' + FieldCount + '" value=""/>
                            </div>

                            <div class="form-label-group col-3 p-0 pl-5">
                                <label>Kuni</label>
                                <!-- <input class="form-control p-0" id="until2"> -->
                                <input class="form-control" type="time" min="08:00" max="22:00" step="900"  name="timeTo" id="until' + FieldCount + '" value=""/>
                            </div>
                        </div>
                        <div id="AddMoreFileId" class="flex"><a href="#" id="AddMoreFileBox" class="btn btn-custom text-white text-center py-2 mb-4 px-5 pluss"><p class="m-0 txt-lg text-center align-items-center">Lisa veel üks päev</p></a></div>

                        <div class="d-flex">
                        
                            <div class="form-label-group pr-3">
                                <label>Periood</label>                               
                                <input class="form-control" id="periodStart" type="date" name="startingFrom" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-label-group">  
                                <label class="invisible">Periood</label>                              
                                <input class="form-control" id="periodEnd" type="date" name="Ending" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>


                        <h4 class="mt-5 txt-xl">Lisainfo (asutusesisene)</h4>
                        <div class="form-label-group mb-2 mt-4">
                            <label>Kommentaar</label>
                            <textarea class="form-control" id="comment2" name="comment2" form=""></textarea> <!-- formi alla panna formi name -->
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="#">Katkesta</a>
                            <input class="btn btn-custom col-3 text-white txt-xl" type="submit" value="Broneeri">
                        </div>
                    </form>
                </div>

                <div id="suletud" class="center px-5 mx-5" v-if="suletud">
                <?php echo form_open('booking/createClosed'); ?>
                    <!-- <form class="pt-3" action="booking" method="get"> -->

                        <div class="d-flex m-0 p-0">
                            <div class="form-label-group col-6 pl-0">
                                <label for="contact">Saal</label>

                                <!-- <input class="form-control p-0" id="room2" type="text"> -->
                                <select name="sportrooms2"  class="form-control p-0" id="room2">
                                <!-- <option value=0>Select option</option>' -->
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->roomName . '</option>';
                                            } ?>
                                </select>
                                <!-- <button>Lisa veel üks saal </button> -->
                                
                            </div>
                            <!-- <input class="btn btn-custom col-4 text-white" type="submit" value="Sisesta"> -->
                            <input class="d-none" type="checkbox" name="closed" value="4" checked> <!-- Suletud (See tuleb ära peita ehk panna hidden)<br> -->
                            <input class="d-none" type="checkbox" name="closedTitle" value="Suletud" checked> <!-- Suletud Title (See tuleb ära peita ehk panna hidden)<br> -->
                        </div>

                        <div class="d-flex m-0 p-0">
                            <div class="form-label-group col-6 pl-0">
                                <label for="sport_facility2">Nädalapäev</label>
                                <input class="form-control p-0" id="sport_facility2" list="weekdays" name="weekday">
                             
                                <datalist id="weekdays">
                                <option data-value="1" value="Esmaspäev"></option>
                                <option data-value="2" value="Teisipäev"></option>
                                <option data-value="3" value="Kolmapäev"></option>
                                <option data-value="4" value="Neljapäev"></option>
                                <option data-value="5" value="Reede"></option>
                                <option data-value="6" value="Laupäev"></option>
                                <option data-value="7" value="Pühapäev"></option>
                     
                                </datalist>


                              
                            </div>

                            <div class="form-label-group col-3 pl-0">
                                <label>Alates</label>
                                <!-- <input class="form-control p-0" id="from2"> -->
                                <input class="form-control p-0" type="time"  min="08:00" max="22:00" step="900"  name="timesStart" id="from' + FieldCount + '" value=""/>
                            </div>

                            <div class="form-label-group col-3 p-0">
                                <label>Kuni</label>
                                <!-- <input class="form-control p-0" id="until2"> -->
                                <input class="form-control p-0" type="time" min="08:00" max="22:00" step="900"  name="timeTo" id="until' + FieldCount + '" value=""/>
                            </div>
                        </div>

                        <div class="d-flex m-0 p-0">
                        
                            <div class="form-label-group pr-3">
                            <label>Periood</label>                               
                                <!-- <input class="form-control pl-0" id="period"> -->
                                <input class="form-control pl-0" id="periodStart" type="date" name="startingFrom" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-label-group pl-0"> 
                            <label>Periood</label>                               
                                <!-- <input class="form-control pl-0" id=""> -->
                                <input class="form-control pl-0" id="periodEnd" type="date" name="Ending" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>

                        <h4 class="txt-xl">Kommentaar (asutusesisene)</h4>

                        <div class="form-label-group pl-0">
                            <label>Kommentaar</label>
                            <input class="form-control p-0" id="comment2" name="comment2">
                        </div>


                        <div class="d-flex justify-content-end mt-5">
                            <a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="#">Katkesta</a>
                            <input class="btn btn-custom col-3 text-white txt-xl" type="submit" value="Sisesta">
                        </div>
                    </form>
                </div>

        </div>
    </div>
</div>
</br>

<script src="<?php echo base_url(); ?>assets/js/cus_vue.js"></script>
<script>
    $(document).ready(function() {

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
                $(InputsWrapper).append('<div class="d-flex align-items-center mb-3"><input class="form-control col-5.5 p-0"  type="datetime-local" name="mytext[' + FieldCount + ']" id="field_' + FieldCount + '" value="<?php echo date('Y-m-d\TH:i');?>"/> <p class="align-middle m-0 p-0" style="height: 20px;">–</p> <input class="form-control col-5.5 p-0"  type="datetime-local"  name="begin[' + FieldCount + ']" id="timestartfield_' + FieldCount + '"/>   <a href="#" class="removeclass">Remove</a></div>');
                x++; //text box increment

                $("#AddMoreFileId").show();

                $('AddMoreFileBox').html("Add field");

                // Delete the "add"-link if there is 3 fields.
                if (x == MaxInputs) {
                    $("#AddMoreFileId").hide();
                    $("#lineBreak").html("<br>");
                }
            }
            return false;
        });

        $("body").on("click", ".removeclass", function(e) { //user click on remove text
            if (x > 1) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox
               // FieldCount--;
                $("#AddMoreFileId").show();

                $("#lineBreak").html("");

                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
            }
            return false;
        });

    });
</script>