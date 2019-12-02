<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <title>Pärnu Spordikeskuste Andmebaas</title>

    <!-- Styles -->
    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/7867c1b872.js" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/js/vue.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vue-router.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">  
    <link href="<?php echo base_url(); ?>assets/css/calendar.css" rel="stylesheet">
    
</head>

<body>

<!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-md p-0 nav-bg">
            <div class="container p-0">
                <div class="navbar-header pr-5 pl-0">
                <a class="navbar-brand mr-1 py-1" href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>assets/img/plv_vapp_blue.svg" alt="logo" class="logo"></a>
                    <a class="navbar-brand align-middle p-0 text-white" href="<?php echo base_url(); ?>">Pärnu Linnavalitsus</a>
                </div>

    <?php if (true) { ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mt-lg-0">
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0 pr-5" href="#"><strong>Kinnitamata ajad</strong> <span class="badge badge-danger">5</span></a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0 pr-5" href="#">Kasutajad</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0 pr-5" href="#">Asutuse sätted</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white py-0" href="#">Profiil</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right p-0">
                        <li class="nav-item"><a class="nav-link font-weight-light text-white p-0" href="#"><u>Logi välja</u></a></li>
                    </ul>
                </div>
    <?php } ?>
            </div>
        </nav>
    </header>
<!-- Navigation -->

<!-- Page starts -->

