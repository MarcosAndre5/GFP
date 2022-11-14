<?php

require './vendor/autoload.php';

use Dompdf\Options;
use Dompdf\Dompdf;

$options = new Options();
$options->set('chroot', __DIR__);

$dompdf = new Dompdf($options);

$mes = $_POST['mes'];
$primeiroDiaMes = $_POST['dia'];
$nome = mb_strtoupper($_POST['nome']);
$anoBissexto = isset($_POST['bissexto']);

$primeiroDiaMes = (6 - $primeiroDiaMes);

$qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

if($anoBissexto) {
	$qtdDiasMes[2] += 1;
}

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
		$html .= "\n\t\t\t\t<tr class='naoLetivo'>
			\t\t<td class='colunaData'>$data</td>
			\t\t<td class='colunaEntrada'></td>
			\t\t<td class='colunaAssinatura'>SABADO</td>
			\t\t<td class='colunaSaida'></td>";
		$sabado = true;
	} else if($dia % 7 == $primeiroDiaMes + 1 || $sabado == true) {
		$html .= "\n\t\t\t\t<tr class='naoLetivo'>
			\t\t<td class='colunaData'>$data</td>
			\t\t<td class='colunaEntrada'></td>
			\t\t<td class='colunaAssinatura'>DOMINGO</td>
			\t\t<td class='colunaSaida'></td>";
		$sabado = false;
	} else if ($feriado == true) {
		$html .= "\n\t\t\t\t<tr class='naoLetivo'>
			\t\t<td class='colunaData'>$data</td>
			\t\t<td class='colunaEntrada'></td>
			\t\t<td class='colunaAssinatura'>FERIADO</td>
			\t\t<td class='colunaSaida'></td>";
	} else {
		$html .= "\n\t\t\t\t<tr>
			\t\t<td class='colunaData'>$data</td>
			\t\t<td class='colunaEntrada'>:</td>
			\t\t<td class='colunaAssinatura'></td>
			\t\t<td class='colunaSaida'>:</td>";
	}
	$html .= "\n\t\t\t\t</tr>";
}
			
$html .= "\n\t\t\t</tbody>
		</table>
	</body>
</html>";

$dompdf->loadHtml($html);

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->stream("Folha.pdf", ["Attachment" => false]);

?>