<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html style="font-size: 13px;font-family: Roboto, Arial, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Conta Inválida</title>
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
<style>
	.error {
		color: #FF0000;
	}
</style>

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
        <div class="card">

        <?php
if($erro=@$_GET['e']){
  if($erro == 'rencovery'){echo "
    <div class='alert alert-success' role='alert'>
<h2 class='alert-heading text-center'><svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
<path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
</svg></h2>
<hr>
<h1>
<p class='text-center'>
Enviamos um link de redifinição de senha da sua conta, acesse o seu email.
</h1>
</p>
</div>"; exit;}
if($erro == 'nrencovery'){echo "
    <div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
    <svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' fill='currentColor' class='bi bi-exclamation-triangle-fill' viewBox='0 0 16 16'>
        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
      </svg></h4>
    <hr>
    <h1>
    <p class='text-center'>
        <h3>Não encontramos nenhuma conta associada</h3>
    Por favor verifique o e-mail introduzido...
    <br>
    <br>
    
    </h1>
    </p>
  </div>
    ";}

}
?>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Se esqueçeu da sua senha? Insira o seu email...</p>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Solicitar Nova Senha!</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>

</html>

<?php
require('../login/estabilish.php');
extract($_POST);
if (isset($submit)) {
    $email = $_POST['email'];
    $sql = "select * from tb_login where email_us like ?";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $verificacao = $stmt->rowCount();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //acção após a verificação de dados existentes
    if ($verificacao == 1) {
        foreach ($dados as $d) {
            $guarda_id = $d['id_us'];
            $guarda_estado = $d['lo_estado'];
            $guarda_validador = $d['lo_codValida'];
        }
        //envio de email dos dados
        $assunto = "Recuperação de Senha...";
        $link = "https://live.caixadesabedoria.com/user/setrecovery.php?validation=$guarda_validador&e=$email&id=$guarda_id";
        $mensagem = "Solicitou uma redifinição da senha. Porfavor,click no link para redifinir a sua senha. "
         . $link;
        $header = "From: conferencia2021@caixadesabedoria.com";

        mail($email, $assunto, $mensagem, $header);
        echo "<script language=javascript>window.location.replace('recovery.php?&e=rencovery');</script>";

    }else{
        echo "<script language=javascript>window.location.replace('recovery.php?&e=nrencovery');</script>";
    }
}
?>