<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h2><?= $title; ?></h2>

<?php echo validation_errors();?>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6 col-lg-4">
            <div class="lookup-lg d-flex align-items-center py-5" id="body">

                <div class="col-7 align-self center mx-auto">


                  <?php echo form_open('booking/create');?>

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
                            <input id="email"  name="email">
                        </div>

                        <h3>Asukoht ja treeningu tüüp</h3>
                        <div class="form-label-group">
                            <label>Asutus</label>
                            <input id="builging">
                        </div>


                        <div class="form-label-group">
                            <label>Saal</label>
                            <input id="room">
                        </div>

                        <div class="form-label-group">
                            <label>Treeningu tüüp</label>
                            <input id="type"  name="workoutType">
                        </div>

                        <h3>Kuupäev ja kellaaeg</h3>
                        <div class="form-label-group">
                            <label for="app">Kuupäev</label>
                            <div id='app'>
                                <v-date-picker mode="single" v-model="date" :popover="{ visibility: 'click' }">
                                    <input id="date" slot-scope="{ inputProps, inputEvents}" :class="[`form-control`]" v-bind="inputProps" v-on="inputEvents" name="date" value="date">
                                </v-date-picker>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <label>Alates</label>
                            <input id="from"  name="begin">
                        </div>

                        <div class="form-label-group">
                            <label>Kuni</label>
                            <input id="until"  name="endTime">
                        </div>

                        <button>Lisa veel üks kuupäev </button>

                        <h3>Lisainfo (valikuline) </h3>

                        <div class="form-label-group">
                            <label>Lisainfo</label>
                            <input id="additional" name="additionalComment">
                        </div>
         <input class="btn btn-custom col-12 text-white" type="submit" value="OTSI">
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