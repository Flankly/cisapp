<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html style="font-size: 13px;font-family: Roboto, Arial, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reconvery Acount</title>
    <meta name="description" content="Conferencia 2021">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="theme-color" content="black">
    <link rel="stylesheet" href="../style/css/custom.css" />
    <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="../style/js/sweetalert2.all.min.js"></script>
</head>

<body style="background: url('../img/bg-img.png') no-repeat center center fixed; -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-center">
        <?php
        if ($erro = @$_GET['er']) {
            if ($erro == 'rencovery') {
                echo "
    <div class='alert alert-success' role='alert'>
<h2 class='alert-heading text-center'><svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
<path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
</svg></h2>
<hr>

<p class='text-center'>
Senha redefinida com exito...
<br>
<br>
<button type='button' class='btn btn-success btn-lg btn-block' onclick='login();'>Faça Login</button>
</h1>
</p>
<
</div>";
                exit;
            }
        }
        ?>
    </div>

        <?php
        if ($vd = @$_GET['validation'] && $em = @$_GET['e'] && $id = @$_GET['id']) { ?>


            <div class="d-flex justify-content-center">
                <div class="login-box">
                    <div class="login-logo">
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

                            <form method="post">
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Change password">
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <p class="mt-3 mb-1">
                                <a href="../">Login</a>
                            </p>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
            </div>
            <script>
                function login() {
                    window.location.replace('../');
                }
            </script>
        <?php
            //toquen de acesso
          

            require('../login/estabilish.php');
            extract($_POST);
            if (isset($submit)) {
                $codValidacao =  generateRandomString();  // OR: generateRandomString(24)
                $milliseconds = round(microtime(true) * 1000); // gera milesegundos
                $codigo = $codValidacao . $milliseconds;

                $password = $_POST['password'];

                $sql = "UPDATE `tb_login` SET `lo_senha` = ?, `lo_codValida` = ? WHERE `lo_id` = ?";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(1, $password);
                $stmt->bindParam(2, $codigo);
                $stmt->bindParam(3, $id);

                if ($stmt->exeute()) {
                    echo "<script language=javascript>window.location.replace('setrecovery.php?er=rencovery');</script>";
                }else{
                    echo "<script language=javascript>window.alert('ERROR');</script>";
                }
            }else{
                echo "<script language=javascript>window.alert('ERROR');</script>";
            }
        } ?>