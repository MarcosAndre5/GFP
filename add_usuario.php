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
					<li><a href="">ADICIONAR USUÁRIO</a></li>
					<li><a href="listar_usuarios.php">LISTAR USUÁRIOS</a></li>
				</ul>
			</div>
            <br><br>
            <h2>Adicionar Usuário</h2>
			<form method="POST" action="add_usuario.php">
				<label>Nome:</label>
				<input type="text" name="nome" placeholder="Digite o Nome do Usuário..." required/>
				<br/><br/>
				<label>Função:</label>
				<select name="funcao" required>
                    <option value="" selected="selected">Selecionar...</option>
                    <option value="Servidor">Servidor</option>
                    <option value="Terceirizado">Terceirizado</option>
                    <option value="Estagiario">Estagiario</option>
                </select>
				<br/><br/>
				<label>Condição Atual:</label>
				<select name="condicao" required>
                    <option value="" selected="selected">Selecionar...</option>
                    <option value="Trabalhando">Trabalhando</option>
                    <option value="Ferias">Férias</option>
                    <option value="Afastado">Afastado</option>
                </select>
				<br/><br/>
				<label>Email:</label>
				<input type="text" name="email" placeholder="Digite o Email do Usuário..." required/>
				<br/><br/>
				<label>Telefone:</label>
				<input type="text" name="telefone" placeholder="Digite seu o Telefone do Usuário..." required/>
				<br/><br/>
				<input type="submit" name="enviarDados" value="Cadastrar Usuário"/>
			</form>
			<?php
				//include("conexao.php");

				// CREATE
				if(isset($_POST["enviarDados"])){
					$nome = $_POST["nome"];
					$funcao = $_POST["funcao"];
					$condicao = $_POST["condicao"];
					$email = $_POST["email"];
                    $telefone = $_POST["telefone"];

                    try {
                        $pdo = new PDO('mysql:host=localhost;dbname=GFP', 'root', '');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      
                        $stmt = $pdo->prepare('INSERT INTO usuarios(nome, funcao, condicao, email, telefone) 
                            VALUES(:nome, :funcao, :condicao, :email, :telefone)');
                        
                        $stmt->execute(array(
                          ':nome' => $nome,
                          ':funcao' => $funcao,
                          ':condicao' => $condicao,
                          ':email' => $email,
                          ':telefone' => $telefone
                        ));
                        
                        if($stmt->rowCount()){
                            echo "<script>alert('Usuário Cadastrado!')</script>";
                            echo "<script>window.open('add_usuario.php', '_self')</script>";
                        }
                    } catch(PDOException $e) {
                        echo 'Error: '.$e->getMessage();
                    }
				}

                
			?>
		</div>
	</body>
</html>