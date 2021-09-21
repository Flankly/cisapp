<?php
session_start();
if(empty($_SESSION['email'] && $_SESSION['password'])) {
    echo "<script language=javascript>alert( 'Não tem parmissão para aceder a esta página...' );</script>";
    echo "<script language=javascript>window.location.replace('../index.html');</script>";
 
}
require('../login/estabilish.php');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CIS - Administração</title>
        <meta name="description" content="Conferencia 2021">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <meta name="theme-color" content="#231840">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="style/js/sweetalert2.all.min.js"></script>
        <link rel="stysheet" href="custom.css">

    </head>
        <!--remove o scroll de baixo-->
        <style type="text/css">
  body {
    overflow-x:hidden;
}
</style>
        <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0BA5DE;" >
            <div class="navbar-brand m-0" href="#" style="color: aliceblue;"></div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarToggler"  >
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0" >
                  <!--  <li class="nav-item ">
                        <a class="nav-link" href="./?page=home" style="color: aliceblue;" >Menu Principal <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=advance_search&amp;action=1" style="color: aliceblue;">Oportunidades</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=resume_attachments" style="color: aliceblue;">Anexos</a>
                    </li>-->
                </ul>
                                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: aliceblue;">
                        <?php echo $_SESSION['email']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../user/index.php">Plataforma</a>
                        <a class="dropdown-item" href="./?page=view_profile">Perfil</a>
                        <a class="dropdown-item" href="./?page=resume_attachments">Histórico</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login/sair.php?e=<?php echo $_SESSION['email']; ?>">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
       

<div class="row" >
    <div class="col-sm-2">

 <!-- Sidebar -->
 <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"></div>
      <div class="list-group list-group-flush">
        <a href="?p=dash" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="?p=admin" class="list-group-item list-group-item-action bg-light">Gestão</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Eventos</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->



        <!--<div class ="sidebar bg-light px-3">
            <ul class ="nav navbar-nav">
            <li class ="nav-item">
                    <a class ="nav-link" href="?p=dash"> Dashboard</a>
                </li>
                <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"> Gestão</a>
                    </li>
                    <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"> </a>
                    </li>
                    <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"></a>
                    </li>
                    <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"></a>
                    </li>
                    <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"> </a>
                    </li>
                    <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"> </a>
                    </li>
                    <li class ="nav-item">
                    <a class ="nav-link" href="?p=admin"> </a>
                    </li>
            </ul>
</div>-->
    </div>
   
    <div class="col-sm-10 ml-auto">
    <div style="padding-top:10px;"></div>
    <!--content-->

   
    <?php     
    try{
        $pagina=@$_GET['p'];
        if($pagina == 'null'){require_once 'dashboard.php';}
        if($pagina == 'dash'){require_once 'dashboard.php';}
        if($pagina == 'admin'){require_once 'gestao.php';}
        if($pagina == 'listarusuario'){require_once 'listarUsuarios.php';}
        if($pagina == 'adicionarusuario'){require_once 'adicionarUsuarios.php';}
        if($pagina == 'editarusuario'){require_once 'editarUsuarios.php';}
        if($pagina == 'informacao'){require_once 'informacaoUsuarios.php';}
        if($pagina == 'pes'){require_once 'pesquisarUsuarios.php';}
        if($pagina == 'listarvds'){require_once 'listarVideos.php';}
        if($pagina == 'adicionarvds'){require_once 'adicionarVideos.php';}
        if($pagina == 'pesvds'){require_once 'pesquisarVideos.php';}
        if($pagina == 'editvideo'){require_once 'editarVideos.php';}
        
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
      ?>
      
      <!--/--->
    </div>

</div>
























<div style="padding-top:10px;"></div>
        </body>
        <footer>
        <div class="text-center p-3" style="background: linear-gradient(#290221, #152850);">
      <a class="text-white" href="https://caixadesabedoria.com/">Caixa de Sabedoria e Intelig&ecirc;ncia</a>
    </div>
    <!-- Copyright -->
  </footer>
</html>
</html>