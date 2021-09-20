<?php
require('../login/estabilish.php');
session_start();
if (empty($_SESSION['email'])) {
  echo "<script language=javascript>alert( 'Não tem parmissão para aceder a esta página...' );</script>";
  echo "<script language=javascript>window.location.replace('../index.html');</script>";
  //buscando o usuario logado

}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html style="font-size: 13px;font-family: Roboto, Arial, sans-serif;">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CIS - Caixa de Sabedoria e Inteligência</title>
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
<!--remove o scroll de baixo-->
<style type="text/css">
  html,
  body {
    overflow-x: hidden;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>

<body style="background-color:black;">

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: transparent;">
    <div class="navbar-brand m-0" href="#" style="color:white;"></div>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-info"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarToggler">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
          <?php echo $_SESSION['email']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="./?page=view_profile">Perfil</a>-->
          <a class="dropdown-item" href="./?page=resume_attachments">Histórico</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../login/sair.php?e=<?php echo $_SESSION['email']; ?>">Sair</a>
        </div>
      </div>
    </div>
  </nav>
  <!--video de welcome-->
  <div class="card" style="background-color:black;">
    <!-- The video -->
    <video autoplay muted loop id="myVideo" height="25%" width="100%">
      <source src="../img/2020edit.mp4" type="video/mp4">
    </video>
  </div>

  <div style="padding-top:15px;"></div>
  <!-- sessão de video-->
  <div class="row" style="margin-top: 1px; margin-left: 0.1em; margin-right: 1px;">
    <div class="col-md-8">
      <div class="embed-responsive embed-responsive-16by9">
      <iframe width="853" height="480" src="https://www.youtube.com/embed/qgbDIXhjRTk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      </div>

      <!--  <video id="my-player" class="video-js vjs-big-play-centered vjs-fluid" data-setup="{}" autoplay  controls poster="../img/nostream.png">
            
                    </video>-->
      <!-- <video
                    id="vid1"
    class="video-js vjs-default-skin"
    controls
    width="560" height="315"
    data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=iRusbYIyRNI"}] }'
  >
                    </video>-->
      <!-- <p style="color: aliceblue;font-size: 20px;padding-top: 3px;font-weight: bold;">
                    Pastor António Jorge - Os pecados de Sanssão
                </p>-->
      <br>
      <font color="white">
        <h3>Pré Conferência 2021</h3>
      </font>
    </div>
    <div style="padding-top: 2px;"></div>
    <div class="col-md-4">
      <div class="text-center" style="color: aliceblue;">
        <h2 class="display-4">Brevemente</h2>
        <br>
        <h1 class="display-5">O evento mais esperado do ano</h1>

      </div>
      <br>
      <!--slide-->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/conf21.jpg" class="img-fluid d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="../img/img.jpg" class="img-fluid d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="../img/img.jpg" class="img-fluid d-block w-100" alt="">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--/slide-->
    </div>
  </div>
  <div style="padding-top: 30px;padding-bottom: 30px;"></div>
  <div class="row">
    <div class="col-sm-12">
      <div class="text-center" style="color: aliceblue;">
        <h1 class="display-4">Assista as Conferências Anteriores</h1>

      </div>
    </div>
  </div>

  <!--parte dos outros videos-->
  <div class="row" style="margin-top: 20px; margin-left: 0.1em; margin-right: 1px;">
    <div class="col-sm-4">
      &nbsp;
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="853" height="480" src="https://www.youtube.com/embed/8SR568dHs10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <div class="col-sm-4">
      &nbsp;
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="853" height="480" src="https://www.youtube.com/embed/Q-UM16HJLuE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      &nbsp;
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="853" height="480" src="https://www.youtube.com/embed/kJGcq0wjTP0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  </div>

  <!--depoimentos-->
  <div style="padding-bottom:60px;"></div>
  <div class="mb-1 bg-info  marketing" style="padding-top: 30px;padding-bottom: 30px;color: aliceblue;background: linear-gradient(#290221, #152850);">
    <div class="text-center">

      <h2>Os</h2>
      <h1>Oradores</h1>
      <div style="padding-top: 30px;padding-bottom: 30px;"></div>
    </div>

    <div class="row text-center">
      <div class="col-md-1">
      </div><!-- /.col-lg-4 -->
      <div class="col-md-2">
        <img class="rounded-circle" src="../img/1.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Alfa Thulana</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-md-2">
        <img class="rounded-circle" src="../img/2.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Gerson Banze</h2>

      </div><!-- /.col-lg-4 -->
      <div class="col-md-2">
        <img class="rounded-circle" src="../img/3.jpg" alt="Generic placeholder image" width="150" height="150">
        <h2>Gilden Zitha</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-md-2">
        <img class="rounded-circle" src="../img/4.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Arafat Cossa</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-md-2">
        <img class="rounded-circle" src="../img/5.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Gerson Nhantumbo</h2>
      </div><!-- /.col-lg-4 -->
    </div>
  </div>


  </div>
  <!--/depoimentos-->
</body>
<script type="javascript" src="../style/js/custom.js"></script>
<script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
<script>
  $('.carousel').carousel({
    interval: 2000
  })
</script>

<br>
<br>
<!--footer-->
<footer class="text-center text-white">
  <!--<p class=" text-center text-white">Siga-nos nas redes sociais.</p>-->
  <!-- Grid container -->
  <div class="container p-2 pb-0">
    <!-- Section: Social media -->
    <section class="mb-1">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://facebook.com/cismz/" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Youtube -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/channel/UC2voqXb1KrtbWfX6smBx2CA" role="button"><i class="fab fa-youtube"></i></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/cis_mz/" role="button"><i class="fab fa-instagram"></i></a>

    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background: linear-gradient(#290221, #152850);">
    <a class="text-white" href="https://caixadesabedoria.com/">Caixa de Sabedoria e Intelig&ecirc;ncia</a>
    © 2021
  </div>
  <!-- Copyright -->
</footer>

</html>