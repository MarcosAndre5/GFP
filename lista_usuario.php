<?php 
    session_start();
    ob_start();

    if(isset($_SESSION['nomeUsuario']) == false) {
        $_SESSION['mensagem'] = "<p class='msgErro'>Necessário fazer o login!</p>";
        header('Location: index.php');
    }

    include 'frontend/cabecalho.html';
    include 'DB/conexao.php';

    function montarlistar($funcao) {
        $consulta = new Consulta();

        $plural = ($funcao == 'Servidor') ? 'es' : 's';

        echo "<h3>$funcao$plural</h3>
            <table>
                <tr class='legenda'>
                    <td>Nome</td>
                    <td>Condição</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td colspan='2'>Ação</td>
                </tr>";
        
        $usuarios = $consulta->listarUsuariosFuncao($funcao);

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
                        <td>$condicao</td>
                        <td>$email</td>
                        <td>$telefone</td>
                        <td>
                            <a href='edita_usuario.php?editar=$id'>
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href='lista_usuario.php?deletar=$id' onclick=\"return confirm('Deseja deletar o $funcao?')\">
                                Deletar
                            </a>
                        </td>
                    </tr>";
            }
        else
            echo "<tr>
                    <td colspan='6'>
                        Nenhum $funcao cadastrado.
                    </td>
                </tr>";
        echo "</table>";
    }

    if(isset($_GET["deletar"])) {
        $consulta = new Consulta();

        $id = $_GET["deletar"];
        $delete = $consulta->deletarUsuario($id);

        if($delete->rowCount())
            $_SESSION['mensagem'] = "<p class='msgSucesso'>Usuário deletado com sucesso!</p>";
    }
?>

<h2>Lista de Usuários</h2>
<hr>

<?php
if(isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

montarlistar('Servidor');

montarlistar('Terceirizado');

montarlistar('Estagiario');

include 'frontend/rodape.html';
