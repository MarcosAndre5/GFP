<?php 
    include 'frontend/cabecalho.html';
    include 'DB/conexao.php';

    $consulta = new Consulta();
?>

<h2>Lista de Usuários</h2>
<hr>
<h3>Servidores</h3>
<table>
    <tr class='legenda'>
        <th>Nome</th>
        <th>Função</th>
        <th>Condição</th>
        <th>Email</th>
        <th>Telefone</th>
        <th colspan='2'>Ação</th>
    </tr>
    <?php
        $usuarios = $consulta->listarUsuariosFuncao('Servidor');

        if(count($usuarios) > 0)
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
                            <a href='edita_usuario.php?editar=$id'>
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href='lista_usuario.php?deletar=$id' onclick=\"return confirm('Deseja deletar o Servidor?')\">
                                Deletar
                            </a>
                        </td>
                    </tr>";
            }
        else
            echo "<tr>
                    <td colspan='7'>
                        Nenhum Servidor cadastrado.
                    </td>
                </tr>";
    ?>
</table>
<h3>Terceirizados</h3>
<table>
    <tr class='legenda'>
        <th>Nome</th>
        <th>Função</th>
        <th>Condição</th>
        <th>Email</th>
        <th>Telefone</th>
        <th colspan='2'>Ação</th>
    </tr>
    <?php
        $usuarios = $consulta->listarUsuariosFuncao('Terceirizado');
        
        if(count($usuarios) > 0)
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
                            <a href='edita_usuario.php?editar=$id'>
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href='lista_usuario.php?deletar=$id' onclick=\"return confirm('Deseja deletar o Terceirizado?')\">
                                Deletar
                            </a>
                        </td>
                    </tr>";
            }
        else
            echo "<tr>
                    <td colspan='7'>
                        Nenhum Terceirizado cadastrado.
                    </td>
                </tr>";
    ?>
</table>
<h3>Estagiarios</h3>
<table>
    <tr class='legenda'>
        <th>Nome</th>
        <th>Função</th>
        <th>Condição</th>
        <th>Email</th>
        <th>Telefone</th>
        <th colspan='2'>Ação</th>
    </tr>
    <?php
        $usuarios = $consulta->listarUsuariosFuncao('Estagiario');

        if(count($usuarios) > 0)
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
                            <a href='edita_usuario.php?editar=$id'>
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href='lista_usuario.php?deletar=$id' onclick=\"return confirm('Deseja deletar o Estagiário?')\">
                                Deletar
                            </a>
                        </td>
                    </tr>";
            }
        else
            echo "<tr>
                    <td colspan='7'>
                        Nenhum Terceirizado cadastrado.
                    </td>
                </tr>";
    ?>
</table>

<?php
    if(isset($_GET["deletar"])) {
        $id = $_GET["deletar"];

        $delete = $consulta->deletarUsuario($id);

        if($delete->rowCount())
            echo "<script>usuarioDeletado()</script>";
    }

    include 'frontend/rodape.html';
?>
