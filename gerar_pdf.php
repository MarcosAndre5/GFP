<?php
    require './vendor/autoload.php';
    include 'DB/conexao.php';

    use Dompdf\Options;
    use Dompdf\Dompdf;

    $options = new Options();
    $options->set('chroot', __DIR__);
    $dompdf = new Dompdf($options);
    $consulta = new Consulta();

    $nomeMes = "";
    $mes = $_POST['mes'];
    $arquivo = isset($_POST['arquivo']);
    $primeiroDiaMes = (6 - $_POST['dia']);
    $anoBissexto = isset($_POST['bissexto']);
    $nomes[] = isset($_POST['nome']) ? $_POST['nome'] : "";
    $qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $funcao = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : false;

    if($anoBissexto)
        $qtdDiasMes[2] += 1;

    switch ($mes) {
        case 1: $nomeMes = "Janeiro";
            break;
        case 2: $nomeMes = "Fevereiro";
            break;
        case 3: $nomeMes = "Março";
            break;
        case 4: $nomeMes = "Abril";
            break;
        case 5: $nomeMes = "Maio";
            break;
        case 6: $nomeMes = "Junho";
            break;
        case 7: $nomeMes = "Julho";
            break;
        case 8: $nomeMes = "Agosto";
            break;
        case 9: $nomeMes = "Setembro";
            break;
        case 10: $nomeMes = "Outubro";
            break;
        case 11: $nomeMes = "Novembro";
            break;
        case 12: $nomeMes = "Dezembro";
            break;
    }

    if($funcao == true)
        $nomes = $consulta->listarNomesUsuariosFuncao($funcao);
    else if($arquivo == true) {
        $i = 0;
        $conteudo = fopen('nomes.csv', 'r');
        
        while ($linha = fgetcsv($conteudo, 500)) {
            if($i > 0)
                $nomes[$i-1] = $linha[0];

            $i++;
        }
        fclose($conteudo);
    }

    if(count($nomes) > 0) {    
        ob_start();
    
        foreach ($nomes as $nome) {
            if(is_array($nome))
                $nome = $nome['nome'];

            include 'montar_pdf.php';
        }

    
        $dompdf->loadHtml(ob_get_clean());

        $dompdf->setPaper('A4');

        $dompdf->render();

        $dompdf->stream('Folha_'.$nomeMes.'_'.$funcao.'.pdf', ["Attachment" => false]);
    } else
        echo "<script>
                alert('Nenhum Usuário $funcao Cadastrado até o momento!')
                window.close()
            </script>";
?>
