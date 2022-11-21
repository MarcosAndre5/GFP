<?php include 'includes/cabecalho.html'; ?>

<h2>Adicionar Usuário</h2>
<hr>
<form action="add_usuario.php" method="POST" autocomplete="off">
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="Digite o Nome do Usuário..." required>
    <br><br>
    <label>Função:</label>
    <select name="funcao" required>
        <option value="" selected>Selecionar...</option>
        <option value="Servidor">Servidor</option>
        <option value="Terceirizado">Terceirizado</option>
        <option value="Estagiario">Estagiario</option>
    </select>
    <br><br>
    <label>Condição Atual:</label>
    <select name="condicao" required>
        <option value="" selected>Selecionar...</option>
        <option value="Trabalhando">Trabalhando</option>
        <option value="Ferias">Férias</option>
        <option value="Afastado">Afastado</option>
    </select>
    <br><br>
    <label>Email:</label>
    <input type="text" name="email" placeholder="Digite o Email do Usuário...">
    <br><br>
    <label>Telefone:</label>
    <input type="tel" name="telefone" id="telefone" maxlength="15" placeholder="Digite o Telefone do Usuário...">
    <br><br>
    <input type="submit" name="enviarDados" value="Cadastrar Usuário">
</form>
<?php
    if(isset($_POST["enviarDados"])){
        $nome = $_POST["nome"];
        $funcao = $_POST["funcao"];
        $condicao = $_POST["condicao"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        try {
            include 'DB/conexao.php';
          
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
            echo 'DB Erro: '.$e->getMessage();
        }
    }
?>

<?php include 'includes/rodape.html'; ?>
