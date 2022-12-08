<?php
	session_start();
	include 'DB/conexao.php';
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
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			
			$usuario = isset($dados['usuario']) ? $dados['usuario'] : 0;
			$senha = isset($dados['senha']) ? $dados['senha'] : 0;
			$btEntrar = isset($dados['entrar']);

			if($btEntrar) {
				$consulta = new Consulta();
				$busca = $consulta->buscarUsuarioLogin($usuario, $senha);

				if($busca) {
					echo "<label>Logado</label>";
				} else {
					$_SESSION['mensagemErro'] = "<p>Usuário ou Senha Inválida!</p>";
				}
			}

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