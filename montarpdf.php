<?php

require './vendor/autoload.php';

use Dompdf\Options;
use Dompdf\Dompdf;

$options = new Options();
$options->set('chroot', __DIR__);

$dompdf = new Dompdf($options);

$mes = $_POST['mes'];
$primeiroDiaMes = $_POST['dia'];
$nome =  mb_strtoupper($_POST['nome']);

$primeiroDiaMes = (6 - $primeiroDiaMes);

$qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

$html = "";

$html .= "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <title>Folha Gerada</title>
            <link rel='stylesheet' type='text/css' href='estilo.css'>
        </head>
        <body>
        <table>
            <thead>
                <tr>
                    <th colspan='4'>$nome</th>
                </tr>
            </thead>
            <tbody>
                <tr class='legenda'>
                    <td class='colunaData'>DATA</td>
                    <td class='colunaEntrada'>ENTRADA</td>
                    <td class='colunaAssinatura'>ASSINATURA</td>
                    <td class='colunaSaida'>SAIDA</td>
                </tr>";

$sabado = false;

for($dia = 1; $dia <= $qtdDiasMes[$mes]; $dia++){
    $data = sprintf("%02d/%02d", $dia, $mes);
    $feriado = isset($_POST['feriado'.$dia]);

    if($dia % 7 == $primeiroDiaMes) {
        $html .= "<tr class='naoLetivo'>
            <td class='colunaData'>$data</td>
            <td class='colunaEntrada'></td>
            <td class='colunaAssinatura'>SABADO</td>
            <td class='colunaSaida'></td>";
        $sabado = true;
    } else if($dia % 7 == $primeiroDiaMes + 1 || $sabado == true) {
        $html .= "<tr class='naoLetivo'>
            <td class='colunaData'>$data</td>
            <td class='colunaEntrada'></td>
            <td class='colunaAssinatura'>DOMINGO</td>
            <td class='colunaSaida'></td>";
        $sabado = false;
    } else if ($feriado == true) {
        $html .= "<tr class='naoLetivo'>
            <td class='colunaData'>$data</td>
            <td class='colunaEntrada'></td>
            <td class='colunaAssinatura'>FERIADO</td>
            <td class='colunaSaida'></td>";
    } else {
        $html .= "<tr>
            <td class='colunaData'>$data</td>
            <td class='colunaEntrada'>:</td>
            <td class='colunaAssinatura'></td>
            <td class='colunaSaida'>:</td>";
            
    }
    $html .= "</tr>";
}
            
$html .= "  </tbody>
        </table>
    </body>
</html>";

$dompdf->loadHtml($html);

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->stream("Folha.pdf", ["Attachment" => false]);

?>