<?php
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
        } else {
            echo "<script>
                    alert('Usuário não encontrado!')
                    window.open('listar_usuarios.php', '_self')
                </script>";
        }

        echo "<h2>Editar de Usuários $nome</h2>";
    }
?>

<form method="POST" autocomplete="off">
    <hr>
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $nome ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
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
    <input type="text" name="email" value="<?= $email ?>">
    <br><br>
    <label>Telefone:</label>
    <input type="tel" name="telefone" id="telefone" maxlength="15" value="<?= $telefone ?>">
    <br><br>
    <input type="submit" name="atualizar" value="Atualizar Usuário">
    <input type='submit' name='cancelar' value='Cancelar'>
</form>
<script>
    $("#telefone").mask("(99) 99999-9999");
</script>

<?php
    if(isset($_POST["atualizar"])) {
        $nome = $_POST["nome"];
        $funcao = $_POST["funcao"];
        $condicao = $_POST["condicao"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $atualiza = $consulta->atualizarUsuario($id, $nome, $funcao, $condicao, $email, $telefone);

        if($atualiza->rowCount()) {
            echo "<script>
                    alert('Dados do Usuário Atualizados!')
                    window.open('listar_usuarios.php', '_self')
                </script>";
        } else {
            echo "<script>
                    alert('Dados iguais aos já cadastrados!')
                    window.open('listar_usuarios.php', '_self')
                </script>";
        }
    } else if(isset($_POST['cancelar'])) {
        echo "<script>
                window.open('listar_usuarios.php', '_self')
            </script>";
    }

    include 'frontend/rodape.html';
?>
