<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CIS - Caixa de Sabedoria e Inteligência</title>
        <meta name="description" content="Conferencia 2021">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
        <meta name="theme-color" content="#231840">
        <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="../style/js/sweetalert2.all.min.js"></script>

    </head>
    <body>
    	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #0390c6;">
            <div class="navbar-brand m-0" href="#"></div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarToggler" style="">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=home">Menu Principal <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=advance_search&amp;action=1">Oportunidades</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=view_profile">Currículo</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=my_events">Meus Eventos</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=applicant_history">Histórico de Candidaturas</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./?page=resume_attachments">Anexos</a>
                    </li>
                </ul>
                                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Alirio Micaela
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./?page=view_profile">Ver Currículo</a>
                        <a class="dropdown-item" href="./?page=create_profile">Editar Currículo</a>
                        <a class="dropdown-item" href="./?page=resume_attachments">Meus Anexos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./?page=home&amp;action=logout">Sair</a>
                    </div>
                </div>
            </div>
        </nav>

<!-- sessão de video-->

<!--

Uses the latest versions of video.js and videojs-http-streaming.

To use specific versions, please change the URLs to the form:

<link href="https://unpkg.com/video.js@6.7.1/dist/video-js.css" rel="stylesheet">
<script src="https://unpkg.com/video.js@6.7.1/dist/video.js"></script>
<script src="https://unpkg.com/@videojs/http-streaming@0.9.0/dist/videojs-http-streaming.js"></script>

-->
<video-js id="my_video_1" class="vjs-default-skin vjs-16-9" controls preload="auto" width="100%" height="350">
  <source src="https://d2zihajmogu5jn.cloudfront.net/advanced-fmp4/master.m3u8" type="application/x-mpegURL">
</video-js>
  
<script>
  var player = videojs('my_video_1', {
    html5: {
      hls: {
        overrideNative: true
      }
    }
  });
</script>



<!--./sessão de video-->

    </body>
</html>