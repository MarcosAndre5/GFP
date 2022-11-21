<?php include 'includes/cabecalho.html'; ?>

<h2>Lista de Usuários</h2>
<hr>
<h3>Servidores</h3>
<table>
    <tr class='legenda'>
        <td>Nome</td>
        <td>Função</td>
        <td>Condição</td>
        <td>Email</td>
        <td>Telefone</td>
        <td colspan='2'>Ação</td>
    </tr>
    <?php
        include 'DB/conexao.php';

        $consulta = $pdo->query("SELECT * FROM usuarios WHERE funcao='Servidor'");

        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $id = $fila['id'];
            $nome = $fila['nome'];
            $funcao = $fila['funcao'];
            $condicao = $fila['condicao'];
            $email = $fila['email'];
            $telefone = $fila['telefone'];

            echo "<tr>
                    <td>$nome</td>
                    <td>$funcao</td>
                    <td>$condicao</td>
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>
                        <a href='editar_usuario.php?editarUsuario=$id'>Editar</a>
                    </td>
                    <td>
                        <a href='listar_usuarios.php?deletarUsuario=$id'>Deletar</a>
                    </td>
                </tr>";
        }
    ?>
</table>
<h3>Terceirizados</h3>
<table>
    <tr class='legenda'>
        <td>Nome</td>
        <td>Função</td>
        <td>Condição</td>
        <td>Email</td>
        <td>Telefone</td>
        <td colspan='2'>Ação</td>
    </tr>
    <?php
        include 'DB/conexao.php';

        $consulta = $pdo->query("SELECT * FROM usuarios WHERE funcao = 'Terceirizado'");

        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $id = $fila['id'];
            $nome = $fila['nome'];
            $funcao = $fila['funcao'];
            $condicao = $fila['condicao'];
            $email = $fila['email'];
            $telefone = $fila['telefone'];

            echo "<tr>
                    <td>$nome</td>
                    <td>$funcao</td>
                    <td>$condicao</td>
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>
                        <a href='editar_usuario.php?editarUsuario=$id'>Editar</a>
                    </td>
                    <td>
                        <a href='listar_usuarios.php?deletarUsuario=$id'>Deletar</a>
                    </td>
                </tr>";
        }
    ?>
</table>
<h3>Estagiarios</h3>
<table>
    <tr class='legenda'>
        <td>Nome</td>
        <td>Função</td>
        <td>Condição</td>
        <td>Email</td>
        <td>Telefone</td>
        <td colspan='2'>Ação</td>
    </tr>
    <?php
        include 'DB/conexao.php';

        $consulta = $pdo->query("SELECT * FROM usuarios WHERE funcao = 'Estagiario'");

        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $id = $fila['id'];
            $nome = $fila['nome'];
            $funcao = $fila['funcao'];
            $condicao = $fila['condicao'];
            $email = $fila['email'];
            $telefone = $fila['telefone'];

            echo "<tr>
                    <td>$nome</td>
                    <td>$funcao</td>
                    <td>$condicao</td>
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>
                        <a href='editar_usuario.php?editarUsuario=$id'>Editar</a>
                    </td>
                    <td>
                        <a href='listar_usuarios.php?deletarUsuario=$id'>Deletar</a>
                    </td>
                </tr>";
        }
    ?>
</table>
<?php
    if(isset($_GET["deletarUsuario"])) {
        $id = $_GET["deletarUsuario"];

        try {
            include 'DB/conexao.php';

            $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if($stmt->rowCount()){
                echo "<script>alert('O usuário foi removido!')</script>";
                echo "<script>window.open('listar_usuarios.php', '_self')</script>";
            }
        } catch(PDOException $e) {
          echo 'Error: '.$e->getMessage();
        }
    }
?>

<?php include 'includes/rodape.html'; ?>
