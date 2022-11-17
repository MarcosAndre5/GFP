<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>GFP - UERN-Natal</title>
        <script src="funcoes.js"></script>
        <link rel='stylesheet' type='text/css' href='estilo.css'>
    </head>
    <body>
        <div class="corpo">
            <h1>Gerador de Folha de Pontos</h1>
            <div class="menu">
				<ul>
					<li><a href="index.html">GERAR FOLHA</a></li>
					<li><a href="add_usuario.php">ADICIONAR USUÁRIO</a></li>
					<li><a href="">LISTAR USUÁRIOS</a></li>
				</ul>
			</div>
            <br><br>
            <h2>Listar Usuários</h2>
            <table>
				<tr>
					<td><b>Nome</b></td>
					<td><b>Função</b></td>
					<td><b>Condição</b></td>
					<td><b>Email</td>
                    <td><b>Telefone</td>
					<td><b>Ação</td>
					<td><b>Ação</td>
				</tr>
                <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=GFP', 'root', '');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$consulta = $pdo->query("SELECT * FROM usuarios;");
                    
					$linhas = 0;
					while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
						$id = $fila['id'];
						$nome = $fila['nome'];
						$funcao = $fila['funcao'];
						$condicao = $fila['condicao'];
						$email = $fila['email'];
                        $telefone = $fila['telefone'];
						$linhas++;
						echo "<tr>
							<td>$nome</td>
							<td>$funcao</td>
							<td>$condicao</td>
							<td>$email</td>
							<td>$telefone</td>
							<td><a href='listar.php?editar=$id'>Editar</a></td>
							<td><a href='listar.php?excluir=$id'>Excluir</a></td>
						</tr>";
					}
				?>