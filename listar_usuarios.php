<?php include 'frontend/cabecalho.html'; ?>

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
        try{
            include 'DB/conexao.php';

            $select = $pdo->query("SELECT * FROM usuarios WHERE funcao = 'Servidor'");

            $usuarios = $select->fetchAll(PDO::FETCH_ASSOC);

            if(count($usuarios) > 0) {
                foreach ($usuarios as $usuario) {
                    $id = $usuario['id'];
                    $nome = $usuario['nome'];
                    $funcao = $usuario['funcao'];
                    $condicao = $usuario['condicao'];
                    $email = $usuario['email'];
                    $telefone = $usuario['telefone'];

                    echo "<tr>
                            <td>$nome</td>
                            <td>$funcao</td>
                            <td>$condicao</td>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>
                                <a href='editar_usuario.php?editarUsuario=$id'>
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href='listar_usuarios.php?deletarUsuario=$id'>
                                    Deletar
                                </a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7'>
                            Nenhum Servidor cadastrado.
                        </td>
                    </tr>";
            }
        } catch(PDOException $e) {
            echo 'DB Error: '.$e->getMessage();
        } catch(Exception $e) {
            echo 'Error: '.$e->getMessage();
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
        try {
            include 'DB/conexao.php';

            $select = $pdo->query("SELECT * FROM usuarios WHERE funcao = 'Terceirizado'");

            $usuarios = $select->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($usuarios) > 0) {
                foreach ($usuarios as $usuario) {
                    $id = $usuario['id'];
                    $nome = $usuario['nome'];
                    $funcao = $usuario['funcao'];
                    $condicao = $usuario['condicao'];
                    $email = $usuario['email'];
                    $telefone = $usuario['telefone'];

                    echo "<tr>
                            <td>$nome</td>
                            <td>$funcao</td>
                            <td>$condicao</td>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>
                                <a href='editar_usuario.php?editarUsuario=$id'>
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href='listar_usuarios.php?deletarUsuario=$id'>
                                    Deletar
                                </a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7'>
                            Nenhum Terceirizado cadastrado.
                        </td>
                    </tr>";
            }
        } catch(PDOException $e) {
          echo 'DB Error: '.$e->getMessage();
        } catch(Exception $e) {
          echo 'Error: '.$e->getMessage();
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
        try {
            include 'DB/conexao.php';

            $select = $pdo->query("SELECT * FROM usuarios WHERE funcao = 'Estagiario'");

            $usuarios = $select->fetchAll(PDO::FETCH_ASSOC);

            if(count($usuarios) > 0) {
                foreach ($usuarios as $usuario) {
                    $id = $usuario['id'];
                    $nome = $usuario['nome'];
                    $funcao = $usuario['funcao'];
                    $condicao = $usuario['condicao'];
                    $email = $usuario['email'];
                    $telefone = $usuario['telefone'];

                    echo "<tr>
                            <td>$nome</td>
                            <td>$funcao</td>
                            <td>$condicao</td>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>
                                <a href='editar_usuario.php?editarUsuario=$id'>
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href='listar_usuarios.php?deletarUsuario=$id'>
                                    Deletar
                                </a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7'>
                            Nenhum Terceirizado cadastrado.
                        </td>
                    </tr>";
            }
        } catch(PDOException $e) {
          echo 'DB Error: '.$e->getMessage();
        } catch(Exception $e) {
          echo 'Error: '.$e->getMessage();
        }
    ?>
</table>
<?php
    if(isset($_GET["deletarUsuario"])) {
        $id = $_GET["deletarUsuario"];

        try {
            include 'DB/conexao.php';

            $delete = $pdo->query("DELETE FROM usuarios WHERE id = '$id'");

            if($delete->rowCount()) {
                echo "<script>
                        alert('Usuário removido!')
                        window.open('listar_usuarios.php', '_self')
                    </script>";
            }
        } catch(PDOException $e) {
          echo 'DB Error: '.$e->getMessage();
        } catch(Exception $e) {
          echo 'Error: '.$e->getMessage();
        }
    }

    include 'frontend/rodape.html';
?>
