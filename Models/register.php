<?php
error_reporting(0);
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /");
}

require '../Connection/database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])):
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Enter the new user in the database
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

    if ($password != $confirm_password):
        $message = '<br>SENHAS NÃO CORRESPONDEM !';

    elseif ($stmt->execute()):
        $message = '<br>NOVO USUÁRIO CRIADO COM SUCESSO !';
    else:
        $message = '<br>E-MAIL JÁ EXISTE !';

    endif;

endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CHECKERS</title>

    <!--CDNS-->
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/theme_dark.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="shortcut icon" href="../asset/img/logomi.png">

<body>

  <!-- Start CSS minifier -->
    <style>
   input[type="email"], input[type="password"] {margin: 10px 0px;width: 83%;padding: 10px 0px 10px 39px;}input[type="email"] {background: url("https://user-images.githubusercontent.com/47280551/67255247-71cb6d00-f457-11e9-89af-9671a1df0a21.png") no-repeat 9px 8px;background-size: 22px;}input[type="password"] {background: url("https://user-images.githubusercontent.com/47280551/67255248-72640380-f457-11e9-916c-5db4eccfe058.png") no-repeat 6px 6px;background-size: 26px;}body {text-align: center;}a:hover {color: #fff !important;} input[type="email"], input[type="password"] {margin: 10px 0px;width: 83%;padding: 10px 0px 10px 39px;}input[type="email"] {background: url("https://user-images.githubusercontent.com/47280551/67255247-71cb6d00-f457-11e9-89af-9671a1df0a21.png") no-repeat 9px 8px;background-size: 22px;}input[type="password"] {background: url("https://user-images.githubusercontent.com/47280551/67255248-72640380-f457-11e9-916c-5db4eccfe058.png") no-repeat 6px 6px;background-size: 26px;}body {text-align: center;}a:hover {color: #fff !important;}
    </style>
          <!-- End CSS minifier -->


    <?php if (!empty($message)): ?>
    <p><?=$message?></p>
    <?php endif;?>


    <center><br>
        <header class="site-header">
            <div class="container">
                <div class="site-header-header">
                    <div class="site-header-brand">

                        </a>
                    </div>

                </div>
                <div class="site-header-main">
                    <nav class="primary-nav">
                        <div class="primary-menu-container">

                            <a href="login.php" data-hover="ENTRAR"><span>ENTRAR</span></a>

                        </div>
                    </nav>
                </div>
            </div>
        </header>



        <div class="main-w3l">
            <div class="w3layouts-main">

                <img src="https://user-images.githubusercontent.com/47280551/67255246-71cb6d00-f457-11e9-8217-ee31bf0a9917.png"
                    class="avatar" />

                <form action="register.php" method="POST">

                    <input value="E-mail" type="email" name="email" required="" onfocus="this.value = '';"onblur="if (this.value == '') {this.value = 'E-Mail';}" />
                    <input value="Senha" name="password" type="password" required="" onfocus="this.value = '';"onblur="if (this.value == '') {this.value = 'password';}" />
                    <input placeholder="Confirmar Senha" name="confirm_password" type="password" required=""onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" />
                    <input type="submit" value="REGISTRAR" name="login">

                </form>


                <!--Footer-->

                <div class="footer-copyright text-center py-3">© 2019 Copyright:

                    <a href="https://www.linkedin.com/in/erlan-lucio-760745183/" Target="_blank"
                        rel="noopener noreferrer"> Erlan Lucio</a>

                </div>

                <!--//Footer-->
    </center>

</body>

</html>