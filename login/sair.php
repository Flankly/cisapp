<?php
require('estabilish.php');
session_start();
session_unset();
session_destroy();
//inserção de dados de terminio de sessão
$email = $_GET['e'];
$sql = "update tb_acesso set ac_exit = current_timestamp() where ac_nome like $email order by ac_id desc limit 1";
$stmt = $db->prepare($sql);
$stmt->execute();
//levando ao index
header("location:../index.html");
