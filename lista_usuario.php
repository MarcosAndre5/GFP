<?php 
    include 'frontend/cabecalho.html';
    include 'DB/conexao.php';

    function montarlistar($funcao) {
        $consulta = new Consulta();

        $plural = ($funcao == 'Servidor') ? 'es' : 's';

        echo "<h3>$funcao$plural</h3>
            <table>
                <tr class='legenda'>
                    <td>Nome</td>
                    <td>Função</td>
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
                            <a href='lista_usuario.php?deletar=$id' onclick=\"return confirm('Deseja deletar o $funcao?')\">
                                Deletar
                            </a>
                        </td>
                    </tr>";
            }
        else
            echo "<tr>
                    <td colspan='7'>
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
            echo "<script>usuarioDeletado()</script>";
    }
?>

<h2>Lista de Usuários</h2>
<hr>

<?php
    montarlistar('Servidor');

    montarlistar('Terceirizado');

    montarlistar('Estagiario');

    include 'frontend/rodape.html';
?>
