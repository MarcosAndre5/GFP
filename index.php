<?php
	session_start();
	ob_start();

	include 'DB/conexao.php';

	if(isset($_POST['entrar'])) {
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$consulta = new Consulta();

		$busca = $consulta->buscarUsuarioLogin($usuario, $senha);

		if($busca == true){
			$_SESSION['nomeUsuario'] = $usuario;
			header('Location: inicio.php');
		} else
			$_SESSION['mensagem'] = "<p class='msgErro'>Username ou Senha Inválida!</p>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>GFP - UERN</title>
        <link rel='stylesheet' type='text/css' href='frontend/estilo.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="http://portal.uern.br/wp-content/uploads/2016/12/favicon-uern.png">
    </head>
    <body class="corpo">
		<h1>Gerador de Folha de Pontos 2.0</h1>

		<?php
			if(isset($_SESSION['mensagem'])) {
				echo $_SESSION['mensagem'];
				unset($_SESSION['mensagem']);
			}
		?>

		<form class='login' method='POST' autocomplete='off'>
	    	<label>Username:</label>
		    <input type="text" name="usuario" placeholder="Digite seu Username..." required>
		    <br><br>
		    <label>Senha:</label>&emsp;&ensp;
		    <input type="password" name="senha" placeholder="Digite sua Senha..." required>
		    <br><br>
		    <input type="submit" name="entrar" value="Entrar no GFP">
		</form>
    </body>
</html>
