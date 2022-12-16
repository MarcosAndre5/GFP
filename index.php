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
			$_SESSION['mensagem'] = "<p class='msgErro'>Usuário ou Senha Inválida!</p>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>GFP - UERN-Natal</title>
        <link rel='stylesheet' type='text/css' href='frontend/estilo.css'>
        <link rel="icon" type="image/png" href="http://portal.uern.br/wp-content/uploads/2016/12/favicon-uern.png">
    </head>
    <body class="corpo">
		<h1>Login - GFP</h1>

		<?php
			if(isset($_SESSION['mensagem'])) {
				echo $_SESSION['mensagem'];
				unset($_SESSION['mensagem']);
			}
		?>

		<form class='login' method='POST' autocomplete='off'>
	    	<label>Username: </label>
		    <input type="text" name="usuario" placeholder="Digite o E-mail do Usuário..." required>
		    <br><br>
		    <label>Senha:</label>&emsp;&ensp;
		    <input type="password" name="senha" placeholder="Digite a Senha do Usuário..." required>
		    <br><br>
		    <input type="submit" name="entrar" value="Entrar">
		</form>
    </body>
</html>
