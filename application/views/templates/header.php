<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <title>Pärnu Linnavalitsuse spordibaasid</title>

    <!-- Styles -->
    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">    
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">    
    
    <script src="https://kit.fontawesome.com/7867c1b872.js" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/js/vue.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vue-router.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    
</head>

<body>

<!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-md p-0 bg">
            <div class="container-fluid p-0">
                <div class="navbar-header pr-5 pl-2">
                    <img class="logo navbar-brand mr-1 py-0" src="<?php echo base_url(); ?>assets/img/plv_vapp.svg" alt="logo" class="logo">
                    <a class="navbar-brand align-middle p-0 text-white" href="<?php echo base_url(); ?>">Pärnu Linnavalitsus</a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mt-lg-0">
                        <li class="nav-item"><a class="nav-link font-weight-light text-white" href="#">Kinnitamata ajad <span class="badge badge-light">5</span></a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white" href="#">Kasutajad</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white" href="#">Asutuse sätted</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-light text-white" href="#">Profiil</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a class="nav-link font-weight-light text-white" href="#">Logi välja</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<!-- Navigation -->

<!-- Page starts -->

