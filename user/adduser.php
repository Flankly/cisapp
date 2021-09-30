<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>Registe-se</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="custom.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //web font -->
</head>
<style>
	.error {
		color: #FF0000;
	}
</style>

<body>

	<!--//scrip em javascript-->

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Registe-se </h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<?php
				if ($erro = @$_GET['e']) {
					if ($erro == 'existente') {
						echo "<div class='error' role='alert'>Este usuario já se encontra cadastrado</div>";
					}
					if ($erro == 'ncadastrado') {
						echo "<div class='error' role='alert'>Algo deu errado, não cadastrado!</div>";
					}
					if ($erro == 'senha') {
						echo "<div class='error' role='alert'>Ops, as senhas diferem, tente novamente!</div>";
					}
				}
				?>
				<br>
				<form action="#" method="post">
					<input class="text" type="text" name="nome" placeholder="Seu nome" required="">
					<input class="text email" type="email" name="email" placeholder="Seu email" required="">
					<input class="text email" type="number" name="numero" placeholder="Seu Contacto" required="">
					<input class="text" type="password" name="password" placeholder="Senha" required="">
					<input class="text w3lpass" type="password" name="repassword" placeholder="Confirme a senha" required="">
					<input type="hidden" name="tipo" value="Normal">
					<!--<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>-->
					<input type="submit" value="Registrar" name="submit">
				</form>
				<!--<p>Don't have an Account? <a href="#"> Login Now!</a></p>-->
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p><a href="https://caixadesabedoria.com/" target="_blank">Caixa de Inteligência e Sabedoria</a> © 2021 </p>
		</div>

		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
	<br>
	<br>

</body>

</html>


<!--scrip em script de validação-->
<?php
require('../login/estabilish.php');


extract($_POST);
if (isset($submit)) {


	if ($_POST['password'] != $_POST['repassword']) {
		$epassword = "Ops, as senhas diferem, tente novamente";
		echo "<script language=javascript>window.location.replace('adduser.php?&e=senha');</script>";
	} else {

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$numero = $_POST['numero'];
		$password = $_POST['password'];
		$tipo = $_POST['tipo'];

		//verificação da existencia na base de dados
		$sql = "select * from tb_usuario where us_email like ?";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(1, $email);
		$stmt->execute();
		$verificacao = $stmt->rowCount();

		//acção após a verificação de dados existentes
		if ($verificacao == 0) {
			$sql = "INSERT INTO tb_usuario (us_nome, us_email, us_contact1, us_tipo, us_created) 
				VALUES (?, ?,?, ?, current_timestamp())";

			$stmt = $db->prepare($sql);
			$stmt->bindParam(1, $nome);
			$stmt->bindParam(2, $email);
			$stmt->bindParam(3, $numero);
			$stmt->bindParam(4, $tipo);

			if ($stmt->execute()) {
				$sql = "select us_id from tb_usuario where us_nome like ? and us_email like ?";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(1, $nome);
				$stmt->bindParam(2, $email);
				$stmt->execute();
				$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($dados as $d) {
					$guarda_id = $d['us_id'];
				}
				#gerador de codigo de validação
				function generateRandomString($length = 24)
				{
					return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
				}

				$codValidacao =  generateRandomString();  // OR: generateRandomString(24)
				$milliseconds = round(microtime(true) * 1000); // gera milesegundos
				$codigo = $codValidacao . $milliseconds;
				//inserir credenciais
				$sql = "INSERT INTO `tb_login` (`lo_id`, `id_us`, `email_us`, `lo_senha`, `lo_estado`,`lo_codValida`, `lo_created`)VALUES 
				(null, '$guarda_id', ?, ?, 'Espera',?, current_timestamp())";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(1, $email);
				$stmt->bindParam(2, $password);
				$stmt->bindParam(3, $codigo);
				//repost de erros de ultima acção
				if ($stmt->execute()) {

					//envio de email dos dados
				
					$assunto = "Validação do E-mail";
					$link = "https://live.caixadesabedoria.com/user/confirm.php?validation=" . $codigo;
					$mensagem = "Olá ".$nome.", este e-mail é de validação do seu cadastro na nossa plataforma. Porfavor,
					 click no link para validar o seu email e activar a sua conta! ".$link;
					$header = "From: conferencia2021@caixadesabedoria.com";
					//email para o dono do cadastro
					mail($email, $assunto, $mensagem, $header);
					
					$assunto2 = "Validação de E-mail de mais um cadastrado";
					$mensagem2 = "Este e-mail é de validação de ".$nome." com email ".$email." e o link ".$link;
					$secMail = "conferencia2021@caixadesabedoria.com";
					//email para o administrador do sistema
					mail($secMail, $assunto2, $mensagem2, $header);

					//area de sucesso apos a validação
					echo "<script language=javascript>window.location.replace('successadd.php?n=$nome&e=$email');</script>";
				} else {
					echo "<script language=javascript>window.location.replace('adduser.php?e=ncadastrado');</script>";
				}
			} else {
				echo "<script language=javascript>window.location.replace('adduser.php?e=ncadastrado');</script>";
			}
		} else {
			echo "<script language=javascript>window.location.replace('adduser.php?e=existente');</script>";
		}
	}
}


?>