<?php
require('../login/estabilish.php');
//extração dos dados vindos do formulario de cadastro de videos
if (extract($_POST)) {
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];
    $tipovd = $_POST['tipovd'];
    //verificação de dados existentes ou não
    $sql = "select * from tb_video where vd_titulo like '$titulo' and vd_link like '$link'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $verificacao = $stmt->rowCount();

    //acção após a verificação de dados existentes
    if ($verificacao == 0) {
        $sql = "INSERT INTO `tb_video` (`vd_id`, `vd_titulo`, `vd_link`, `vd_vistas`, `vd_created`, `vd_update`)
        VALUES (NULL, ?, ?, ?, current_timestamp(), current_timestamp())";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $link);
        $stmt->bindParam(3, $tipovd);
        if ($stmt->execute()) {
            echo "<script language=javascript>window.location.replace('index.php?p=adicionarvds&e=cadastrado');</script>";
        } else {
            echo "<script language=javascript>window.location.replace('index.php?p=adicionarvds&e=ncadastrado');</script>";
        }
    }else{
        echo "<script language=javascript>window.location.replace('index.php?p=adicionarvds&e=existente');</script>";
    }
}
