<?php
    include 'includes/cabecalho.html';

    if(isset($_GET["editarUsuario"])) {
        $id = $_GET["editarUsuario"];

        try {
            include 'DB/conexao.php';
            
            $consulta = $pdo->query("SELECT * FROM usuarios WHERE id = $id");

            if($usuario = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $id = $usuario['id'];
                $nome = $usuario['nome'];
                $funcao = $usuario['funcao'];
                $condicao = $usuario['condicao'];
                $email = $usuario['email'];
                $telefone = $usuario['telefone'];
            }

            echo "<h2>Editar de Usuários $nome</h2>";
        } catch(PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
?>

<form method="POST" autocomplete="off">
    <hr>
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required>
    <br><br>
    <label>Função:</label>
    <select name="funcao" required>
        <option value="<?php echo $funcao; ?>" selected><?php echo $funcao; ?></option>
        <option value="Servidor">Servidor</option>
        <option value="Terceirizado">Terceirizado</option>
        <option value="Estagiario">Estagiario</option>
    </select>
    <br><br>
    <label>Condição:</label>
    <select name="condicao" required>
        <option value="<?php echo $condicao; ?>" selected><?php echo $condicao; ?></option>
        <option value="Trabalhando">Trabalhando</option>
        <option value="Ferias">Férias</option>
        <option value="Afastado">Afastado</option>
    </select>
    <br><br>
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <br><br>
    <label>Telefone:</label>
    <input type="tel" name="telefone" id="telefone" maxlength="15" value="<?php echo $telefone; ?>">
    <br><br>
    <input type="submit" name="atualizarDados" value="Atualizar Usuário">
    <a href="listar_usuarios.php">
        <input type="button" value="Cancelar">
    </a>
</form>

<?php
    if(isset($_POST["atualizarDados"])) {
        $nome = $_POST["nome"];
        $funcao = $_POST["funcao"];
        $condicao = $_POST["condicao"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        try {
            include 'DB/conexao.php';
          
            $stmt = $pdo->prepare('UPDATE usuarios SET 
                nome = :nome, funcao = :funcao, condicao = :condicao, email = :email, telefone = :telefone
                WHERE id = :id');

            $stmt->execute(array(
                ':id' => $id,
                ':nome' => $nome,
                ':funcao' => $funcao,
                ':condicao' => $condicao,
                ':email' => $email,
                ':telefone' => $telefone
            ));
          
            if($stmt->rowCount()) {
                echo "<script>alert('Dados Atualizados!')</script>";
                echo "<script>window.open('listar_usuarios.php', '_self')</script>";
            }
        } catch(PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
    include 'includes/rodape.html';
?>
