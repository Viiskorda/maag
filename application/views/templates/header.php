<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <title>Pärnu Spordikeskuste Andmebaas</title>

    <!-- Styles -->
    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-clockpicker.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">  
    <link href="<?php echo base_url(); ?>assets/css/calendar.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/7867c1b872.js" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/js/vue.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vue-router.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-clock-timepicker.min.js"></script>
    
</head>

<body>

<!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-md p-0 nav-bg">
            <div class="container p-0">
      
                <div class="navbar-header pr-lg-5 pr-md-3 pr-sm-1 pl-0">
                <a class="navbar-brand mr-1 py-1" href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>assets/img/plv_vapp_blue.svg" alt="logo" class="logo"></a>
                    <a class="navbar-brand align-middle p-0 text-white" href="<?php echo base_url(); ?>">Pärnu Linnavalitsus</a>
                </div>
                <!-- <button >"Logi sisse"</button> -->

                <?php if($this->session->userdata('session_id')) : ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mt-lg-0 pl-lg-5 pl-md-3 pl-sm-1">
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0 pr-lg-5 pr-md-3 pr-sm-1 mr-lg-5 mr-md-3 mr-sm-0" href="#"><strong>Broneeringud</strong> <span class="badge badge-danger">5</span></a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0 pr-lg-5 pr-md-3 pr-sm-1 mr-lg-5 mr-md-3 mr-sm-0" href="<?php echo base_url(); ?>manageUsers">Kasutajad</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0 pr-lg-5 pr-md-3 pr-sm-1 mr-lg-5 mr-md-3 mr-sm-0" href="<?php echo base_url(); ?>building/view/1">Asutuse sätted</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0" href="#">Profiil</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right p-0">
                        <li class="nav-item"><a class="nav-link font-weight-light text-white p-0" href="<?php echo base_url(); ?>users/logout" ><u>Logi välja</u></a></li>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(!$this->session->userdata('session_id')) : ?>
                <a class="nav-link font-weight-light text-white p-0" href="<?php echo base_url(); ?>login"><u>Logi sisse</u></a>
                <?php endif; ?>

            </div>
        </nav>
    </header>
<!-- Navigation -->
<script>
 $(document).ready(function() {

                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 4000);});
 </script>


    <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>



      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>