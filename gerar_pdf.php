<?php
    require './vendor/autoload.php';

    use Dompdf\Options;
    use Dompdf\Dompdf;

    $nomeMes = "";
    $caminho = __DIR__;
    $mes = $_POST['mes'];
    $primeiroDiaMes = $_POST['dia'];
    $nome = mb_strtoupper($_POST['nome']);
    $primeiroDiaMes = (6 - $primeiroDiaMes);
    $anoBissexto = isset($_POST['bissexto']);
    $qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    $options = new Options();
    $options->set('chroot', $caminho);
    $dompdf = new Dompdf($options);

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

    ob_start();

    require $caminho.'/montar_pdf.php';
    
    $dompdf->loadHtml(ob_get_clean());

    $dompdf->setPaper('A4');

    $dompdf->render();

    $dompdf->stream("FolhaDe$nomeMes.pdf", ["Attachment" => false]);
?>
