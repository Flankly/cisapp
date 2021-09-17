<?php
require('../login/estabilish.php');
//extração dos dados vindos do formulario de cadastro de usuarios
if (extract($_POST)) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $profissao = $_POST['profissao'];
    $morada = $_POST['morada'];
    $contacto1 = $_POST['contacto1'];
    $contacto2 = $_POST['contacto2'];
    $estado = $_POST['estado'];
    $tipo = $_POST['tipo'];
    //verificação de dados existentes ou não
    $sql = "select * from tb_usuario where us_email like '$email' and us_nome like '$nome'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $verificacao = $stmt->rowCount();

    //acção após a verificação de dados existentes
    if ($verificacao == 0) {

        //inserção de dados
        $sql = "INSERT INTO `tb_usuario` (`us_id`, `us_nome`, `us_email`, `us_morada`, `us_profissao`,
        `us_contact1`, `us_contact2`, `us_tipo`, `us_created`, `us_updated`) VALUES
        (NULL, ?, ?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $morada);
        $stmt->bindParam(4, $profissao);
        $stmt->bindParam(5, $contacto1);
        $stmt->bindParam(6, $contacto2);
        $stmt->bindParam(7, $tipo);
        $stmt->execute();
        //leva o id
        $sql = "select us_id from tb_usuario where us_nome like '$nome' and us_email like '$email'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $d) {
            $guarda_id = $d['us_id'];
        }
        //inserir credenciais
        $sql = "INSERT INTO `tb_login` (`lo_id`, `id_us`, `email_us`, `lo_senha`, `lo_estado`, `lo_created`, `lo_updated`)
VALUES (null, '$guarda_id', '$email', '1234', '$estado', current_timestamp(), current_timestamp());";
        $stmt = $db->prepare($sql);
        //repost de erros de ultima acção
        if ($stmt->execute()) {
            echo "<script language=javascript>window.location.replace('index.php?p=adicionarusuario&e=cadastrado');</script>";
        } else {
            echo "<script language=javascript>window.location.replace('index.php?p=adicionarusuario&e=ncadastrado');</script>";
        }
    } else {
        //report do erro achado durante a inserção
        echo "<script language=javascript>window.location.replace('index.php?p=adicionarusuario&e=existente');</script>";
    }
}
