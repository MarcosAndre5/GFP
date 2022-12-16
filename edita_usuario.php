<?php
    session_start();
    ob_start();

    if(isset($_SESSION['nomeUsuario']) == false) {
        $_SESSION['mensagem'] = "<p class='msgErro'>Necessário fazer o login!</p>";
        header('Location: index.php');
    }

    include 'frontend/cabecalho.html';
    include 'DB/conexao.php';

    $consulta = new Consulta();

    if(isset($_GET["editar"])) {
        $id = $_GET["editar"];

        $usuario = $consulta->buscarUsuario($id);

        if($usuario) {
            $id = $usuario['id'];
            $nome = $usuario['nome'];
            $funcao = $usuario['funcao'];
            $condicao = $usuario['condicao'];
            $email = $usuario['email'];
            $telefone = $usuario['telefone'];
        } else
            die("<p class='msgErro'>Usuário não encontrado!</p>");

        echo "<h2>Editar de Usuários $nome</h2><hr>";
    }

    if(isset($_POST["atualizar"])) {
        $nome = $_POST["nome"];
        $funcao = $_POST["funcao"];
        $condicao = $_POST["condicao"];
        $email = $_POST['email'];
        $telefone = $_POST["telefone"];

        $atualiza = $consulta->atualizarUsuario($id, $nome, $funcao, $condicao, $email, $telefone);

        if($atualiza->rowCount() > 0)
            $_SESSION['mensagem'] = "<p class='msgSucesso'>Usuário cadastrado com sucesso!</p>";
        else
            $_SESSION['mensagem'] = "<p class='msgSucesso'>Dados de usuário iguais aos já cadastrados!</p>";

    } else if(isset($_POST['cancelar']))
        header('Location: lista_usuario.php');

    if(isset($_SESSION['mensagem'])) {
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    }
?>

<form method="POST" autocomplete="off">
    <label>Nome:</label>
    <input class="nomeEmail" type="text" name="nome" value="<?= $nome ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
    <br><br>
    <label>Função:</label>
    <select name="funcao">
        <option value="<?= $funcao ?>" selected><?= $funcao ?></option>
        <option value="Servidor">Servidor</option>
        <option value="Terceirizado">Terceirizado</option>
        <option value="Estagiario">Estagiario</option>
    </select>
    <br><br>
    <label>Condição Atual:</label>
    <select name="condicao">
        <option value="<?= $condicao ?>" selected><?= $condicao ?></option>
        <option value="Trabalhando">Trabalhando</option>
        <option value="Ferias">Férias</option>
        <option value="Afastado">Afastado</option>
    </select>
    <br><br>
    <label>Email:</label>
    <input class="nomeEmail" type="text" name="email" value="<?= $email ?>">
    <br><br>
    <label>Telefone:</label>
    <input type="tel" name="telefone" id="telefone" maxlength="15" value="<?= $telefone ?>">
    <br><br>
    <input type="submit" name="atualizar" value="Atualizar Usuário">
    <input type='submit' name='cancelar' value='Retornar para Lista de Usuários'>
</form>
<script>$("#telefone").mask("(99) 99999-9999");</script>

<?php include 'frontend/rodape.html'; ?>
