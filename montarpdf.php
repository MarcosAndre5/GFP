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
    <html>
        <head>
            <title>Folha Gerada</title>
        </head>
        <body>
        <table style='border-collapse: collapse; width: 100%;' border='1'>
            <thead>
                <th style='width: 100%; text-align: center;' colspan='4'>$nome</th>
            </thead>
            <tbody>
                <tr>
                    <td style='width: 10%; text-align: center;'><b>DATA</b></td>
                    <td style='width: 13%; text-align: center;'><b>ENTRADA</b></td>
                    <td style='width: 64%; text-align: center;'><b>ASSINATURA</b></td>
                    <td style='width: 13%; text-align: center;'><b>SAIDA</b></td>
                </tr>";

$sabado = false;

for($i = 1; $i <= $qtdDiasMes[$mes]; $i++){
    $feriado = isset($_POST['feriado'.$i]);

    if($i % 7 == $primeiroDiaMes) {
        $html .= "<tr bgcolor='GRAY'>
            <td style='width: 10%; text-align: center;'>".str_pad($i,2,"0",STR_PAD_LEFT)."/".str_pad($mes,2,"0",STR_PAD_LEFT)."</td>
            <td style='width: 13%; text-align: center;'></td>
            <td style='width: 64%; text-align: center;'>SABADO</td>
            <td style='width: 13%; text-align: center;'></td>
        </tr>";
        $sabado = true;
    } else if($i % 7 == $primeiroDiaMes + 1 || $sabado == true) {
        $html .= "<tr bgcolor='GRAY'>
            <td style='width: 10%; text-align: center;'>".str_pad($i,2,"0",STR_PAD_LEFT)."/".str_pad($mes,2,"0",STR_PAD_LEFT)."</td>
            <td style='width: 13%; text-align: center;'></td>
            <td style='width: 64%; text-align: center;'>DOMINGO</td>
            <td style='width: 13%; text-align: center;'></td>
        </tr>";
        $sabado = false;
    } else if ($feriado == true){
        $html .= "<tr bgcolor='GRAY'>
            <td style='width: 10%; text-align: center;'>".str_pad($i,2,"0",STR_PAD_LEFT)."/".str_pad($mes,2,"0",STR_PAD_LEFT)."</td>
            <td style='width: 13%; text-align: center;'></td>
            <td style='width: 64%; text-align: center;'>FERIADO</td>
            <td style='width: 13%; text-align: center;'></td>
        </tr>";
    } else {
        $html .= "<tr>
            <td style='width: 10%; text-align: center;'>".str_pad($i,2,"0",STR_PAD_LEFT)."/".str_pad($mes,2,"0",STR_PAD_LEFT)."</td>
            <td style='width: 13%; text-align: center;'>:</td>
            <td style='width: 64%; text-align: center;'></td>
            <td style='width: 13%; text-align: center;'>:</td>
        </tr>";
    }
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