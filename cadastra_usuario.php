<?php 
    include 'frontend/cabecalho.html';
    include 'DB/conexao.php';

    $consulta = new Consulta();
?>

<h2>Adicionar Usuário</h2>
<hr>
<form action="cadastra_usuario.php" method="POST" autocomplete="off">
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="Digite o Nome do Usuário..." pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
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
    <select name="condicao">
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
    <input type="submit" name="cadastrar" value="Cadastrar Usuário">
</form>
<script>$("#telefone").mask("(99) 99999-9999");</script>

<?php
    if(isset($_POST["cadastrar"])){
        $nome = $_POST["nome"];
        $funcao = $_POST["funcao"];
        $condicao = $_POST["condicao"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $cadastro = $consulta->cadastrarUsuario($nome, $funcao, $condicao, $email, $telefone); 

        if($cadastro->rowCount())
            echo "<script>usuarioCadastrado()</script>";
    }

    include 'frontend/rodape.html';
?>