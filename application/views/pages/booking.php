<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- <h2><?= $title; ?></h2> -->

<?php echo validation_errors(); ?>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6 col-lg-4">
            <div class="lookup-lg d-flex align-items-center py-5" id="body">

                <div class="col-9 align-self center mx-auto">


                    <?php echo form_open('booking/create'); ?>

                    <h3>Kontakt</h3>

                    <div class="form-label-group">
                        <label for="contact">Klubi nimi</label>

                        <input id="clubname" type="text" name="clubname">

                    </div>

                    <div class="form-label-group">
                        <label>Kontaktisik</label>
                        <input id="contact" name="contactPerson">
                    </div>

                    <div class="form-label-group">
                        <label>Telefoni number</label>
                        <input id="phone" name="phone">
                    </div>


                    <div class="form-label-group">
                        <label>Email</label>
                        <input id="email" name="email">
                    </div>

                    <h3>Asukoht ja treeningu tüüp</h3>
                    <div class="form-label-group">
                        <label>Asutus</label>
                        <input id="builging">
                    </div>


                    <div class="form-label-group">
                        <label>Saal</label>
                        <select name="citys" id="citys" class="form-control input-lg">
                        <option data-value=>Select option</option>'
                        <?php foreach ($rooms as $each) {
                                    echo '<option data-value="' . $each->id . '">' . $each->name . '</option>';
                                }
                                ?>
                        </select>

                    </div>

                    <div class="form-label-group">
                        <label>Treeningu tüüp</label>
                        <input id="type" name="workoutType">
                    </div>

                    <h3>Kuupäev ja kellaaeg</h3>
                    <div class="form-label-group" id="timestamp">
                        <label for="app">Kuupäev</label>
                        <div id="InputsWrapper">
                            <div>
                                <input type="date" name="mytext[1]" id="field_1" value="">
                                <input type="time" name="begin[1]" step="900" min="08:00" max="22:00" id="timestartfield_1" value="">
                                <input type="time" name="end[1]" step="900" min="08:00" max="22:00" id="timeendfield_1" value="">
                                <a href="#" class="removeclass"></a></div>
                        </div>
                        <div id="AddMoreFileId">
                            <a href="#" id="AddMoreFileBox" class="btn btn-info">Add field</a><br><br>
                        </div>
                        <div id="lineBreak"></div>
                        <input type="submit" id="submit" name="send" value="Send">
                    </div>

                    <button> + Lisa veel üks kuupäev </button>








                    <h3>Lisainfo (valikuline) </h3>

                    <div class="form-label-group">
                        <label>Lisainfo</label>
                        <input id="additional" name="additionalComment">
                    </div>


                    <div class="form-label-group">
                        <label>Asutussisene kommentaar</label>
                        <input id="comment2" name="comment2">
                    </div>


                    <input class="btn btn-custom col-12 text-white" type="submit" value="Sisesta">
                    </form>







                    <hr>




                    <form action="booking" method="get">

                        <h3>Suletud</h3>

                        <div class="form-label-group">
                            <label for="contact">Saal</label>

                            <input id="room2" type="text">
                            <button>Lisa veel üks saal </button>

                        </div>

                        <div class="form-label-group">
                            <label for="sport_facility2">Nädalapäev</label>
                            <input id="sport_facility2">
                        </div>

                        <div class="form-label-group">
                            <label>Alates</label>
                            <input id="from2">
                        </div>


                        <div class="form-label-group">
                            <label>Kuni</label>
                            <input id="until2">
                        </div>

                        <div class="form-label-group">
                            <label>Periood</label>
                            <input id="period"> <input id="">
                        </div>

                        <h3>Kommentaar (asutussisene)</h3>

                        <div class="form-label-group">
                            <label>Kommentaar</label>
                            <input id="comment2" name="comment2">
                        </div>


                        <input class="btn btn-custom col-12 text-white" type="submit" value="OTSI">
                    </form>






                </div>
            </div>
        </div>

    </div>
</div>


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
                $(InputsWrapper).append('<div><input type="date" name="mytext[' + FieldCount + ']" id="field_' + FieldCount + '"/> <input type="time"  step="900"  min="08:00" max="22:00" name="begin[' + FieldCount + ']" id="timestartfield_' + FieldCount + '"/>  <input type="time"  step="900"  min="08:00" max="22:00" name="end[' + FieldCount + ']" id="timeendfield_' + FieldCount + '"/> <a href="#" class="removeclass">Remove</a></div>');
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

                $("#AddMoreFileId").show();

                $("#lineBreak").html("");

                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
            }
            return false;
        });
    });
</script>