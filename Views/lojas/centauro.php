<?php

session_start();

require '../../Connection/database.php';

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
        <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/simple-line-icons.css" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/animate.min.css" />
        <link href="../../assets/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../assets/img/logomi.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>



     <!-- Start CSS minifier -->
     <style>
     body{background-color:#131417 !important}select{width:0px !important;height:0px !important;background-color:transparent !important;color:transparent !important;border-bottom-color:transparent !important;border:transparent !important}.btn-outline.btn-success:hover{border-color:#27C24C !important;color:#27C24C !important}.btn-outline.btn-danger{border-color:#E74C3C !important;color:#E74C3C !important}.btn-outline.btn-danger:hover{border-color:#E74C3C !important;color:#E74C3C !important}.btn-outline.btn-primary:hover{border-color:#3498DB !important;color:#3498DB !important}.btn-outline.btn-warning{border-color:#F0AD4E !important;color:#fff !important}.btn-outline.btn-warning:hover{border-color:#F0AD4E !important;color:#fff !important}.avatar{height:40px;width:40px;border:4px solid #B22222 !important;margin-top:5px}.input-group-addon,.user-photo,.btn,.cover-v1,.nav-tabs.nav-tabs-v2,.tabs-area,.mail-wrapper,.mail-reply,.panel,.thumbnail,.navbar{-webkit-box-shadow:0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);-moz-box-shadow:0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);-ms-box-shadow:0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);-o-box-shadow:0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);box-shadow:0 1px 0px rgba(0, 0, 0, 0.12), 0 1px 1px rgba(0, 0, 0, 0.24);background-color:#131417 !important}#left-menu .sub-left-menu .tree li{padding:0px;padding-left:10%;background-color:#131417 !important}#left-menu .sub-left-menu .tree li{padding:0px;padding-left:10%;background-color:#131417 !important}#left-menu .sub-left-menu a{color:#fff !important;font-size:16px;font-weight:400;line-height:42px;background-color:#131417 !important}.opener-left-menu{float:left;padding:20px;padding-top:35px;background-color:#131417 !important;padding-bottom:11px;color:#fff !important;cursor:pointer;-webkit-box-shadow:0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);-moz-box-shadow:0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);-ms-box-shadow:0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);-o-box-shadow:0px 9px 0px 0px #2196F3, 0 -9px 0px 0px #2196F3, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0, 0, 0, 0.12);box-shadow:0px 9px 0px 0px #131417, 0 -9px 0px 0px #131417, 4px 0 15px -4px rgba(0, 0, 0, 0.16), -4px 0 15px -4px rgba(0,0,0,0.12)}.opener-left-menu.is-open{padding-top:29px;padding-bottom:17px;background-color:#131417 !important}#left-menu .sub-left-menu{background-color:#131417 !important;left:0;padding-top:50px;z-index:222;width:230px;height:100%;position:fixed;overflow-y:hidden;-webkit-box-shadow:0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);-moz-box-shadow:0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);-ms-box-shadow:0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);-o-box-shadow:0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);box-shadow:0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12)}#left-menu .sub-left-menu .time h1{font-weight:500;font-family:"open sans","Helvetica Neue",Helvetica,Arial,sans-serif;font-size:70px;text-align:center;color:#fff !important}#left-menu .sub-left-menu .time p{margin-top:-20px;text-align:center;font-size:12px;color:#fff !important}#responsive{margin:70px 0 0 0 !important}
    </style>
    <!-- End CSS minifier -->



    <!-- Start PHP verify -->
    <?php if (!empty($user)): ?>
        <body id="mimin" class="dashboard">

            <!-- Start: Header -->
            <nav class="navbar navbar-default header navbar-fixed-top">
                <div class="col-md-12 nav-wrapper">
                    <div class="navbar-header" style="width:100%;">
                        <div class="opener-left-menu is-open">
                            <span class="top"></span>
                            <span class="middle"></span>
                            <span class="bottom"></span>
                        </div>

                        <ul class="nav navbar-nav navbar-right user-nav">
                            <li class="user-name"><span> <?=$user['email'];?> </span></li>
                            <li class="dropdown avatar-dropdown">
                                <img src="../../assets/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                                <ul class="dropdown-menu user-dropdown">
                                    <li><a href="../../logout.php"><span class="fa fa-power-off"></span> Sair</a></li>
                            </li>
                            </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End: Header -->

            <!-- Start:Left Menu -->
            <div class="container-fluid mimin-wrapper">
                <div id="left-menu">
                    <div class="sub-left-menu scroll">
                        <ul class="nav nav-list">

                            <li class="time">
                                <h1 class="animated fadeInLeft">21:00</h1>
                                <p class="animated fadeInRight">Sat,October 1st 2029</p>
                            </li>

                            <li class="ripple">
                                <a class="tree-toggle nav-header">
                                    <span class="fa fa-envelope-o"></span> E-mails
                                    <span class="fa-angle-right fa right-arrow text-right"></span>
                                </a>
                                <ul class="nav nav-list tree">
                                    <li><a href="../emails/bol.php">BOL</a></li>

                                </ul>
                            </li>
                            <li class="ripple">
                                <a class="tree-toggle nav-header">
                                    <span class="fa fa-shopping-cart"></span> Lojas
                                    <span class="fa-angle-right fa right-arrow text-right"></span>
                                </a>
                                <ul class="nav nav-list tree">
                                    <li><a href="#">CENTAURO</a></li>

                                </ul>
                            </li>

                            <li class="ripple">
                                <a class="tree-toggle nav-header">
                                    <span class="fa fa-rocket"></span>Serviços
                                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                                <ul class="nav nav-list tree">
                                    <li><a href="../servicos/descomplica.php">DESCOMPLICA</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- End: Left Menu -->

                <!-- StartProgrming Checker -->
                <div id="responsive">
                    <center>

                        <h1 style="margin: 15px; font-weight: 500; font-family: 'open sans', 'Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'; font-size: 40px; color: #DADEE0;">CHECKER - CENTAURO
				   </h1>

                        <textarea id="lista" name="lista" rows="12" required="" class="fcbtn btn btn-warning btn-outline btn-1e btn-squared" style="cursor: auto; overflow:auto; width:40%; height:40%; text-align: center; border-radius: 50px;" cols="1" placeholder="E-MAIL|PASS"></textarea>
                        <textarea name="socks" id="socks" rows="10" class="form-control" style="width:1%;text-align:left;resize:none;margin-left:-10140px;margin-top:-193px;"></textarea>

                        <span style="outline: none; overflow:auto; color: #FFF; resize:none;  color: #F39C12; text-align: center;">Carregadas: </span> <span class="badge badge-secondary" id="linhas">0</span>
                        <span style="outline: none; overflow:auto; color: #FFF; resize:none;  color: #2ECC71; text-align: center;">Aprovados: </span><span class="badge badge-success" id="ap">0</span>
                        <span style="outline: none; overflow:auto; color: #FFF; resize:none;  color: #E74C3C; text-align: center;">Reprovadas: </span> <span class="badge badge-danger" id="rp">0</span>
                        <span style="outline: none; overflow:auto; color: #FFF; resize:none;  color: #F39C12; text-align: center;">Testadas: </span> <span class="badge badge-warning" id="total">0</span><br><br>
                        <input id="botao" type="button" style=" width:20%; height:20%; color: #3498DB;" class="fcbtn btn btn-primary btn-outline btn-1e btn-squared" onclick="enviar();" value="START" />

                        <br><select id="CHECKER" name="CHECKER">
                            <option name="checker" value="api.php" style="text-align: center;">checker</option>
                        </select>

                        <!-- Start Ajax -->

                        <script title="ajax do checker">
                            var audioLive = new Audio('blop.mp3');

                            function contar1() {
                                $(document).ready(function() {
                                    var count = parseInt($('#ap').html());
                                    count++;
                                    $('#ap').html(count + "");
                                });
                            }

                            function contar2() {
                                $(document).ready(function() {
                                    var count = parseInt($('#rp').html());
                                    count++;
                                    $('#rp').html(count + "");
                                });
                            }

                            function contar2b() {
                                $(document).ready(function() {
                                    var count = parseInt($('#rpb').html());
                                    count++;
                                    $('#rpb').html(count + "");
                                });
                            }

                            function contar3() {
                                $(document).ready(function() {
                                    var count = parseInt($('#total').html());
                                    count++;
                                    $('#total').html(count + "");
                                });
                            }

                            function contar4() {
                                $(document).ready(function() {
                                    var count = parseInt($('#linhas').html());
                                    count++;
                                    $('#linhas').html(count + "");
                                });
                            }

                            function randomFrom(array) {
                                return array[Math.floor(Math.random() * array.length)];
                            }

                            function enviar() {
                                if ($('#lista').val().trim() == '') {
                                    return false;
                                }
                                var linha = $("#lista").val();
                                var gate = document.getElementById("CHECKER").value;
                                var linhaenviar = linha.split("\n");
                                linhaenviar.forEach(function(value, index) {
                                    contar4();
                                    var proxies = $('#socks').val().replace(',', '').split('\n');
                                    var proxy = proxies[Math.floor(Math.random() * proxies.length)];
                                    setTimeout(
                                        function() {
                                            $.ajax({
                                                url: gate + '?lista=' + value + '&proxy=' + proxy,
                                                type: 'GET',
                                                async: true,
                                                success: function(resultado) {
                                                    contar3();
                                                    if (resultado.match("#Aprovada")) {
                                                        removelinha();
                                                        aprovados(resultado + "");
                                                        contar1();
                                                        audioLive.play();
                                                    }
                                                    if (resultado.match("#Socks Die")) {
                                                        removelinha();
                                                        semvale(resultado + "");
                                                        contar1();
                                                    }
                                                    if (resultado.match("#Reprovada")) {
                                                        removelinha();
                                                        reprovadas(resultado + "\n");
                                                        contar2();
                                                    }

                                                    if (resultado.match("#Captcha")) {
                                                        removelinha();
                                                        bugs(resultado + "");
                                                        contar2b();
                                                    }
                                                }
                                            });

                                        }, 400 * index);

                                });
                            }

                            function aprovados(str) {
                                $(".aprovados").append(str + "<br>");
                            }

                            function proxydie(str) {
                                $(".reprovadas").append(str + "<br>");
                            }

                            function reprovadas(str) {
                                $(".reprovadas").append(str + "<br>");
                            }

                            function bugs(str) {
                                $(".bugs").append(str + "<br>");
                            }

                            function removelinha() {
                                var lines = $("#lista").val().split('\n');
                                lines.splice(0, 1);
                                $("#lista").val(lines.join("\n"));
                            }
                        </script>

                        <!-- End Ajax -->

                        <div class="container">

                            <center>
                                <input type="button" style="margin: 10px; cursor: text; width:50%; height:15%; color: #3498DB;" class="fcbtn btn btn-success btn-outline btn-1e btn-squared" value="APROVADAS" />
                                <div style="margin: 20px; font-size: 15px;" class="aprovados"> </div>

                                <input type="button" style="margin: 10px; cursor: text; width:50%; height:15%; color: #3498DB;" class="fcbtn btn btn-danger btn-outline btn-1e btn-squared" value="REPROVADAS" />
                                <div style=" margin: 20px; font-size: 15px;" class="reprovadas"> </div>
                            </center>

                        </div>

                        <!-- End Programing Checker -->

                        <!-- Start: Mobile -->
                    </center>
                    <div id="mimin-mobile" class="reverse">
                        <div class="mimin-mobile-menu-list">
                            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                                <ul class="nav nav-list">
                                    <li class="ripple">
                                        <a class="tree-toggle nav-header">
                                            <span class="fa-diamond fa"></span>E-mails
                                            <span class="fa-angle-right fa right-arrow text-right"></span>
                                        </a>
                                        <ul class="nav nav-list tree">
                                            <li><a href="../emails/bol.php">BOL</a></li>
                                        </ul>
                                    </li>
                                    <li class="ripple">
                                        <a class="tree-toggle nav-header">
                                            <span class="fa-area-chart fa"></span>Lojas
                                            <span class="fa-angle-right fa right-arrow text-right"></span>
                                        </a>
                                        <ul class="nav nav-list tree">
                                            <li><a href="#">CENTAURO</a></li>

                                        </ul>
                                    </li>
                                    <li class="ripple">
                                        <a class="tree-toggle nav-header">
                                            <span class="fa fa-pencil-square"></span>Serviços
                                            <span class="fa-angle-right fa right-arrow text-right"></span>
                                        </a>
                                        <ul class="nav nav-list tree">
                                            <li><a href="../servicos/descomplica.php">DESCOMPLICA</a></li>

                                        </ul>
                                    </li>

                                    <ul class="nav nav-list tree">

                                    </ul>
                            </div>
                        </div>
                    </div>
                    <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
                        <span class="fa fa-bars"></span>
                    </button>
                    <!-- End: Mobile -->

                    <!-- Start: Javascript -->
                    <script src="../../assets/js/jquery.min.js"></script>
                    <script src="../../assets/js/jquery.ui.min.js"></script>
                    <script src="../../assets/js/bootstrap.min.js"></script>

                    <!-- plugins -->
                    <script src="../../assets/js/plugins/moment.min.js"></script>
                    <script src="../../assets/js/plugins/fullcalendar.min.js"></script>
                    <script src="../../assets/js/plugins/jquery.nicescroll.js"></script>

                    <!-- custom -->
                    <script src="../../assets/js/main.js"></script>

                    <!-- End: Javascript -->

                    <?php else: ?>

                        <script>
                            window.location.href = "../../Models/login.php";
                        </script>

                        <?php endif;?>

        </body>

    </html>