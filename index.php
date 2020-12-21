<?php

session_start();

require 'Connection/database.php';

if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CHECKERS</title>


    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/simple-line-icons.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/fullcalendar.min.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/logomi.png">
</head>



     <!-- Start CSS minifier -->
<style>
body {background-color: #131417 !important }.avatar {height: 40px;width: 40px;border: 4px solid #B22222 !important;margin-top: 5px;}.input-group-addon, .user-photo, .btn, .cover-v1, .nav-tabs.nav-tabs-v2, .tabs-area, .mail-wrapper, .mail-reply, .panel, .thumbnail, .navbar {-webkit-box-shadow: 0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);-moz-box-shadow: 0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);-ms-box-shadow: 0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);-o-box-shadow: 0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);box-shadow: 0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);background-color: #131417 !important;}#left-menu .sub-left-menu .tree li {padding: 0px;padding-left: 10%;background-color: #131417 !important;}#left-menu .sub-left-menu .tree li {padding: 0px;padding-left: 10%;background-color: #131417 !important;}#left-menu .sub-left-menu a {color: #fff !important;font-size: 16px;font-weight: 400;line-height: 42px;background-color: #131417 !important;}.opener-left-menu {float: left;padding: 20px;padding-top: 35px;background-color: #131417 !important;padding-bottom: 11px;color: #fff !important;cursor: pointer;-webkit-box-shadow: 0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);-moz-box-shadow: 0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);-ms-box-shadow: 0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);-o-box-shadow: 0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);box-shadow: 0px 9px 0px 0px #131417, 0 -9px 0px 0px #131417, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);}.opener-left-menu.is-open {padding-top: 29px;padding-bottom: 17px;background-color: #131417 !important;}#left-menu .sub-left-menu {background-color: #131417 !important;left: 0;padding-top: 50px;z-index: 222;width: 230px;height: 100%;position: fixed;overflow-y: hidden;-webkit-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);-moz-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);-ms-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);-o-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);}#left-menu .sub-left-menu .time h1 {font-weight: 500;font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;font-size: 70px;text-align: center;color: #fff !important;}#left-menu .sub-left-menu .time p {margin-top: -20px;text-align: center;font-size: 12px;color: #fff !important;}
</style>
    <!-- End CSS minifier -->



<?php if (!empty($user)): ?>


<body id="mimin" class="dashboard">
    <!-- start: Header -->
    <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open"> <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="user-name"><span> <?=$user['email'];?> </span>
                    </li>
                    <li class="dropdown avatar-dropdown">
                        <img src="assets/img/avatar.jpg" class="img-circle avatar" alt="user name"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                        <ul class="dropdown-menu user-dropdown">
                            <li><a href="logout.php"><span class="fa fa-power-off"></span> Sair</a>
                            </li>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end: Header -->
    <div class="container-fluid mimin-wrapper">
        <!-- start:Left Menu -->
        <div id="left-menu">
            <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li class="time">
                        <h1 class="animated fadeInLeft">21:00</h1>
                        <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="ripple">
                        <a class="tree-toggle nav-header"> <span class="fa fa-envelope-o"></span> E-mails <span
                                class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul class="nav nav-list tree">
                            <li><a href="Views/emails/bol.php">BOL</a>
                            </li>
                        </ul>
                    </li>
                    <li class="ripple">
                        <a class="tree-toggle nav-header"> <span class="fa fa-shopping-cart"></span> Lojas <span
                                class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul class="nav nav-list tree">
                            <li><a href="Views/lojas/centauro.php">CENTAURO</a>
                            </li>
                        </ul>
                    </li>
                    <li class="ripple">
                        <a class="tree-toggle nav-header"> <span class="fa fa-rocket"></span>Serviços <span
                                class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul class="nav nav-list tree">
                            <li><a href="Views/servicos/descomplica.php">DESCOMPLICA</a>
                            </li>
                        </ul>
                    </li>
            </div>
        </div>
        <!-- end: Left Menu -->
        <!-- start: Mobile -->
        <div id="mimin-mobile" class="reverse">
            <div class="mimin-mobile-menu-list">
                <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                    <ul class="nav nav-list">
                        <li class="ripple">
                            <a class="tree-toggle nav-header"> <span class="fa-diamond fa"></span>E-mails <span
                                    class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="Views/emails/bol.php">BOL</a>
                                </li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header"> <span class="fa-area-chart fa"></span>Lojas <span
                                    class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="Views/lojas/centauro.php">CENTAURO</a>
                                </li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header"> <span class="fa fa-pencil-square"></span>Serviços <span
                                    class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="Views/servicos/descomplica.php">DESCOMPLICA</a>
                                </li>
                            </ul>
                        </li>
                </div>
            </div>
        </div>
        <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger"> <span
                class="fa fa-bars"></span>
        </button>
        <!-- end: Mobile -->
        <!-- start: Content -->
        <div id="content">
            <div class="panel box-shadow-none content-header"></div>
            <div class="col-md-12">
                <div class="col-md-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Recado do Admin</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 horas atrás
                                            via FTP</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Atenção,o mal uso desse programa não é de minha responsabilidade, o objetivo é
                                        apenas educacional, não sou responsável pelo seus atos.</p>
                                    <br>
                                    <font color="#B22222">Copia oque eu faço, mais não faz oque eu faço. 😎 </font>
                                </div>
                            </div>
                        </li>
                        <!-- end: Content -->
                        <!-- start: Javascript -->
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/js/jquery.ui.min.js"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        <!-- plugins -->
                        <script src="assets/js/plugins/moment.min.js"></script>
                        <script src="assets/js/plugins/fullcalendar.min.js"></script>
                        <script src="assets/js/plugins/jquery.nicescroll.js"></script>
                        <script src="assets/js/plugins/jquery.vmap.min.js"></script>
                        <script src="assets/js/plugins/maps/jquery.vmap.world.js"></script>
                        <script src="assets/js/plugins/jquery.vmap.sampledata.js"></script>
                        <script src="assets/js/plugins/chart.min.js"></script>
                        <!-- custom -->
                        <script src="assets/js/main.js"></script>
                        <script type="text/javascript">
                        (function(jQuery) {


                            // start: Maps============

                            jQuery('.maps').vectorMap({
                                map: 'world_en',
                                backgroundColor: null,
                                color: '#fff',
                                hoverOpacity: 0.7,
                                selectedColor: '#666666',
                                enableZoom: true,
                                showTooltip: true,
                                values: sample_data,
                                scaleColors: ['#C8EEFF', '#006491'],
                                normalizeFunction: 'polynomial'
                            });

                            // end: Maps==============

                        })(jQuery);
                        </script>
                        <!-- end: Javascript -->
                        <?php else: ?>
                        <script>
                        window.location.href = "Models/login.php";
                        </script>
                        <?php endif;?>
</body>

</html>