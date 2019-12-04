<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- <h2><?= $title; ?></h2> -->


<?php echo validation_errors(); ?>
<div class="container">
    <div id="proov" class="container-md">
        <div class="mt-5 px-1 form-bg">
            <div class="d-flex">
                <ul class="nav nav-tabs nav-justified col-12">
                    <li class="nav-item"><a class="nav-link" v-bind:class="{ active: isActiveE }" href="#" @click="exer">Ühekordne borneering</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Hooajaline broneering</a></li> -->
                    <li class="nav-item"><a class="nav-link" v-bind:class="{ active: isActiveC }" href="#" @click="closed">Suletud</a></li>
                </ul>
            </div>
            <!-- <div class="lookup-lg d-flex align-items-center py-5" id="body"> -->

                <!-- <div class="col-9 align-self center mx-auto"> -->

                <div id="mitmekordne" class="center" v-if="trenn">
                    <?php echo form_open('booking/create'); ?>

                        <h4 class="pt-2">Kontakt</h4>
                        <div class="d-flex">
                            <div class="form-label-group col-6">
                                <label for="contact">Klubi nimi</label>
                                <input class="form-control" id="clubname" type="text" name="clubname">
                            </div>

                            <div class="form-label-group col-6">
                                <label>Kontaktisik</label>
                                <input class="form-control" id="contact" name="contactPerson">
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-label-group col-6">
                                <label>Telefoni number</label>
                                <input class="form-control" id="phone" name="phone">
                            </div>

                            <div class="form-label-group col-6">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email">
                            </div>
                        </div>

                        <h4>Asukoht ja treeningu tüüp</h4>
                        <div class="d-flex">
                            <div class="form-label-group col-6">
                                <label>Asutus</label>
                                <input class="form-control" id="building">
                            </div>

                            <div class="form-label-group col-6">
                                <label>Saal</label>
                                <select name="sportrooms"  class="form-control input-lg">
                                <!-- <option value=0>Select option</option>' -->
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->buildingName . '</option>';
                                            } ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="form-label-group col-6">
                                <label>Treeningu tüüp</label>
                                <input class="form-control" id="type" name="workoutType">
                            </div>
                        </div>

                        <h4>Kuupäev ja kellaaeg</h4>
                        <div class="d-flex">
                            <div class="form-label-group col-12" id="timestamp">
                                <label for="app">Kuupäev</label>
                                <div id="InputsWrapper">
                                    <div>
                                        <input class="form-control" type="datetime-local" name="mytext[1]" id="field_1" value="<?php echo date("Y-m-d"); ?>"> - 
                                        <input class="form-control" type="datetime-local" name="begin[1]" step="900" min="08:00" max="22:00" id="timestartfield_1" value="">
                                        <!-- <input type="time" name="end[1]" step="900" min="08:00" max="22:00" id="timeendfield_1" value=""> -->
                                        <a href="#" class="removeclass"></a>
                                    </div>
                                    <div id="AddMoreFileId"><a href="#" id="AddMoreFileBox" class="btn btn-info">Add field</a><br></div>
                                </div>
                            </div>
                        </div>


                        <h4>Lisainfo (valikuline) </h4>
                        <div class="d-flex">
                            <div class="form-label-group col-6">
                                <label>Lisainfo</label>
                                <input class="form-control" id="additional" name="additionalComment">
                            </div>

                            <div class="form-label-group col-6" v-if="loggedin">
                                <label>Asutussisene kommentaar</label>
                                <input class="form-control" id="comment2" name="comment2">
                            </div>
                        </div>


                        <input class="btn btn-custom col-4 text-white" type="submit" value="BRONEERI">
                    </form>
                </div>

                <div id="suletud" class="center col-12" v-if="suletud">
                    <form class="pt-3" action="booking" method="get">

                        <div class="d-flex m-0 p-0">
                            <div class="form-label-group col-6 pl-0">
                                <label for="contact">Saal</label>

                                <!-- <input class="form-control p-0" id="room2" type="text"> -->
                                <select name="sportrooms"  class="form-control p-0" id="room2">
                                <!-- <option value=0>Select option</option>' -->
                                    <?php foreach ($rooms as $each) {
                                                echo '<option value="' . $each->id . '">' . $each->buildingName . '</option>';
                                            } ?>
                                </select>
                                <!-- <button>Lisa veel üks saal </button> -->
                                
                            </div>
                            <input class="btn btn-custom col-4 text-white" type="submit" value="Sisesta">
                        </div>

                        <div class="d-flex m-0 p-0">
                            <div class="form-label-group col-6 pl-0">
                                <label for="sport_facility2">Nädalapäev</label>
                                <input class="form-control p-0" id="sport_facility2">
                            </div>

                            <div class="form-label-group col-3 pl-0">
                                <label>Alates</label>
                                <input class="form-control p-0" id="from2">
                            </div>

                            <div class="form-label-group col-3 p-0">
                                <label>Kuni</label>
                                <input class="form-control p-0" id="until2">
                            </div>
                        </div>

                        <div class="d-flex m-0 p-0">
                        
                            <div class="form-label-group pr-3">
                            <label>Periood</label>                               
                                <input class="form-control pl-0" id="period">
                            </div>
                            <div class="form-label-group pl-0"> 
                            <label>Periood</label>                               
                                <input class="form-control pl-0" id="">
                            </div>
                        </div>

                        <h4>Kommentaar (asutussisene)</h4>

                        <div class="form-label-group pl-0">
                            <label>Kommentaar</label>
                            <input class="form-control p-0" id="comment2" name="comment2">
                        </div>


                        <input class="btn btn-custom col-2 text-white" type="submit" value="SISESTA">
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
                $(InputsWrapper).append('<div><input type="datetime-local" name="mytext[' + FieldCount + ']" id="field_' + FieldCount + '" value="<?php echo date("Y-m-d");?>"/>  -  <input type="datetime-local"  name="begin[' + FieldCount + ']" id="timestartfield_' + FieldCount + '"/>   <a href="#" class="removeclass">Remove</a></div>');
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
                FieldCount--;
                $("#AddMoreFileId").show();

                $("#lineBreak").html("");

                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
            }
            return false;
        });
    });
</script>