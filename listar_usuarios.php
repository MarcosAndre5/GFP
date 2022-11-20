<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>GFP - UERN-Natal</title>
        <script src='funcoes.js'></script>
        <link rel='stylesheet' type='text/css' href='estilo.css'>
    </head>
    <body>
        <div class="corpo">
            <h1>Gerador de Folha de Pontos</h1>
            <div class="menu">
                <ul>
                    <li><a href="index.html">GERAR FOLHA</a></li>
                    <li><a href="add_usuario.php">ADICIONAR USUÁRIO</a></li>
                    <li><a href="listar_usuarios.php">LISTA DE USUÁRIOS</a></li>
                </ul>
            </div>
            <br>
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
                    include("conexaoBD.php");

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
                                    <a href='listar_usuarios.php?editarUsuario=$id'>Editar</a>
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
                    include("conexaoBD.php");

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
                                    <a href='listar_usuarios.php?editarUsuario=$id'>Editar</a>
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
                    include("conexaoBD.php");

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
                                    <a href='listar_usuarios.php?editarUsuario=$id'>Editar</a>
                                </td>
                                <td>
                                    <a href='listar_usuarios.php?deletarUsuario=$id'>Deletar</a>
                                </td>
                            </tr>";
                    }
                ?>
            </table>
            <?php
                if(isset($_GET["editarUsuario"]))
                    include("editar_usuario.php");

                if(isset($_GET["deletarUsuario"])) {
                    $id = $_GET["deletarUsuario"];

                    try {
                        include('conexaoBD.php');

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
        </div>
    </body>
</html>
