<?php
require('estabilish.php');


if (extract($_POST)){
	$email = $_POST['email'];
	$password = $_POST['password'];
	//verificação dos dados de acesso
	$sql = "select id_us, lo_estado from tb_login where email_us like ? and lo_senha like ?";
	$stmt = $db -> prepare($sql);
	$stmt->bindParam(1, $email);
    $stmt->bindParam(2, $password);
	$stmt -> execute();
	//quantas linhas foram retornadas
	$verificacao = $stmt -> rowCount();
	$dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	//verificação se é igual a uma 
	if ($verificacao == 1){

		//guardar id do usuario
		foreach($dados as $d){
			$guarda_id = $d['id_us'];
			$guarda_estado = $d['lo_estado'];
		}
		//se a conta estiver desactivada
		if($guarda_estado != 'Activa'){
			//mandar ele para a area de suspensos
			header("Location: ../user/suspenso.html");
		}else{
			//conta activa
		//buscando todos dados do usuario
		$sql = "select * from tb_usuario where us_id = '$guarda_id'";
		$stmt = $db -> prepare($sql);
		$stmt -> execute();
		$acesso = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		

		//determinando tipo de usuario!
		foreach($acesso as $d){
		

			if($d['us_tipo'] ==  'Administrator'){
				//se for administrador
				//iniciar a sessão
				session_start();
				$_SESSION['nome'] = $d['us_nome'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['email'] = $_POST['email'];

				//pagina do administrador
				header("Location:../admin/");
			}else{
				//se for um usuario comum
				session_start();
				$_SESSION['email'] = $_POST['email'];
				header("Location:../user/");
			}
		}
	}

	}else{
		//credenciais erradas
		echo '<script>';
		echo 'alert("Credenciais inválidas");';
		echo 'location.href="../"';
		echo '</script>';
	}
}else{
	//sem nenhum valor no post
	header("Location:../");
}


	
	
