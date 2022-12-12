<?php
	session_start();
	ob_start();
	include 'DB/conexao.php';

	if(isset($_POST['entrar'])) {
		$consulta = new Consulta();
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];

		$busca = $consulta->buscarUsuarioLogin($usuario, $senha);

		if($busca == true)
			header('Location: index.php');
		else
			$_SESSION['mensagemErro'] = "<label class='msgErro'>Usuário ou Senha Inválida!</label>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>GFP - UERN-Natal</title>
        <script src='frontend/funcoes.js'></script>
        <link rel='stylesheet' type='text/css' href='frontend/estilo.css'>
        <link rel="icon" type="image/png" href="http://portal.uern.br/wp-content/uploads/2016/12/favicon-uern.png">
    </head>
    <body>
		<h1>Login - GFP</h1>

		<?php
			if(isset($_SESSION['mensagemErro'])) {
				echo $_SESSION['mensagemErro'];
				unset($_SESSION['mensagemErro']);
			}
		?>

		<form method="POST" autocomplete="off">
    	<label>E-mail:</label>
	    <input type="text" name="usuario" placeholder="Digite o E-mail do Usuário..." required>
	    <br><br>
	    <label>Senha:</label>
	    <input type="password" name="senha" placeholder="Digite a Senha do Usuário..." required>
	    <br><br>
	    <input type="submit" name="entrar" value="Entrar">
	</form>
    </body>
</html>