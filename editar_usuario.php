<?php
    if(isset($_GET["editarUsuario"])){
		$id = $_GET["editarUsuario"];

        try {
            include('conexaoBD.php');
            
            $usuario = $pdo->query("SELECT * FROM usuarios WHERE id = $id");

            if($usuario = $consulta->fetch(PDO::FETCH_ASSOC)){
                $id = $usuario['id'];
                $nome = $usuario['nome'];
                $funcao = $usuario['funcao'];
                $condicao = $usuario['condicao'];
                $email = $usuario['email'];
                $telefone = $usuario['telefone'];
            }
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
?>

<br/>
<form method="POST" action="">
	<label>Nome:</label>
	<input type="text" name="nome" value="<?php echo $nome; ?>" required/>
	<br/><br/>
	<label>Idade:</label>
	<input type="text" name="funcao" value="<?php echo $funcao; ?>" required/>
	<br/><br/>
	<label>Cidade:</label>
	<input type="text" name="condicao" value="<?php echo $condicao; ?>" required/>
	<br/><br/>
	<label>UF:</label>
	<input type="text" name="email" value="<?php echo $email; ?>" required/>
	<br/><br/>
	<label>Email:</label>
	<input type="text" name="telefone" value="<?php echo $telefone; ?>" required/>
	<br/><br/>
	<input type="submit" name="atualizarDados" value="Atualizar Usuário"/>
</form>

<?php
	if(isset($_POST["atualizarDados"])){
		$nome = $_POST["nome"];
		$funcao = $_POST["funcao"];
		$condicao = $_POST["condicao"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];

        try {
            include('conexaoBD.php');
          
            $stmt = $pdo->prepare('UPDATE usuarios 
                SET nome = :nome, funcao = :funcao, condicao = :condicao, email = :email, telefone = :telefone
                WHERE id = :id');

            $stmt->execute(array(
                ':id' => $id,
                ':nome' => $nome,
                ':funcao' => $funcao,
                ':condicao' => $condicao,
                ':email' => $email,
                ':telefone' => $telefone
            ));
          
            if($stmt->rowCount()){
                echo "<script>alert('Dados Atualizados!')</script>";
                echo "<script>window.open('listar_usuarios.php', '_self')</script>";
            }
        } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }
	}
?>