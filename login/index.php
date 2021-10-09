<?php
require('estabilish.php');
//função para pegar o ip do visitante em php
function getRealIpAddr()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		// Check IP from internet.
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		// Check IP is passed from proxy.
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		// Get IP address from remote address.
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
$ip = getRealIpAddr();

if (extract($_POST)) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	//verificação dos dados de acesso
	$sql = "select id_us, lo_estado from tb_login where email_us like ? and lo_senha like ?";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(1, $email);
	$stmt->bindParam(2, $password);
	$stmt->execute();
	//quantas linhas foram retornadas
	$verificacao = $stmt->rowCount();
	$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//verificação se é igual a uma 
	if ($verificacao == 1) {

		//guardar id do usuario
		foreach ($dados as $d) {
			$guarda_id = $d['id_us'];
			$guarda_estado = $d['lo_estado'];
		}
		//se a conta estiver desactivada
		if ($guarda_estado != 'Activa') {

			//conta não activa
			if ($guarda_estado == 'Espera') {
				header("Location: ../user/unvalidate.html");
			} else {

				header("Location: ../user/suspended.html");
			}
		} else {
			//conta activa
			//buscando todos dados do usuario
			$sql = "select * from tb_usuario where us_id = '$guarda_id'";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$acesso = $stmt->fetchAll(PDO::FETCH_ASSOC);


			//determinando tipo de usuario!
			foreach ($acesso as $d) {


				if ($d['us_tipo'] ==  'Administrator') {
					
					//se for administrador
					//iniciar a sessão
					session_start();
					$_SESSION['password'] = $_POST['password'];
					$_SESSION['email'] = $_POST['email'];

					//inserir dados de acesso 
					$sql = "INSERT INTO `tb_acesso` (`ac_id`, `ac_nome`, `ac_ip`, `ac_created`, `ac_exit`) 
					VALUES (NULL, '$email', '', current_timestamp(), current_timestamp())";
					$stmt = $db->prepare($sql);
					$stmt->execute();
					//pagina do administrador
					header("Location:../admin/");
				} else {
					//se for um usuario comum
					//iniciar a sessão
					session_start();
					$_SESSION['email'] = $_POST['email'];
					//inserir dados de acesso 
					$sql = "INSERT INTO `tb_acesso` (`ac_id`, `ac_nome`, `ac_ip`, `ac_created`, `ac_exit`) 
					VALUES (NULL, '$email', '', current_timestamp(), current_timestamp())";
					$stmt = $db->prepare($sql);
					$stmt->execute();
					header("Location:../user/");
				}
			}
		}
	} else {
		//credenciais erradas
		echo '<script>';
		echo 'alert("Credenciais inválidas");';
		echo 'location.href="../"';
		echo '</script>';
	}
} else {
	//sem nenhum valor no post
	header("Location:../");
}
