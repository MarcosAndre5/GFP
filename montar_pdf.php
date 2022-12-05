<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Folha de <?= $nomeMes[$mes] ?> Gerada</title>
        <link rel='stylesheet' type='text/css' href='frontend/estilo.css'>
    </head>
    <body>
        <h3>FOLHA DE PONTO DE <?= strtoupper($nomeMes[$mes]) ?></h3>
        <table>
            <thead>
                <tr>
                    <th colspan='4'><?= mb_strtoupper($nome) ?></th>
                </tr>
            </thead>
            <tbody>
                <tr class='legenda'>
                    <th class='colunaData'>DATA</th>
                    <th class='colunaEntrada'>ENTRADA</th>
                    <th class='colunaAssinatura'>ASSINATURA</th>
                    <th class='colunaSaida'>SAÍDA</th>
                </tr>
                <?php
                    $sabado = false;

                    for($dia = 1; $dia <= $qtdDiasMes; $dia++) {
                        $data = sprintf("%02d/%02d", $dia, $mes);
                        $feriado = isset($_POST[$dia]);

                        if($dia % 7 == $primeiroDiaMes) {
                            echo "<tr class='naoLetivo'>
                                <td class='colunaData'>$data</td>
                                <td class='colunaEntrada'></td>
                                <td class='colunaAssinatura'>SÁBADO</td>
                                <td class='colunaSaida'></td>";
                            $sabado = true;
                        } else if($dia % 7 == $primeiroDiaMes + 1 || $sabado == true) {
                            echo "<tr class='naoLetivo'>
                                <td class='colunaData'>$data</td>
                                <td class='colunaEntrada'></td>
                                <td class='colunaAssinatura'>DOMINGO</td>
                                <td class='colunaSaida'></td>";
                            $sabado = false;
                        } else if($feriado == true && $mes < 12)
                            echo "<tr class='naoLetivo'>
                                <td class='colunaData'>$data</td>
                                <td class='colunaEntrada'></td>
                                <td class='colunaAssinatura'>FERIADO</td>
                                <td class='colunaSaida'></td>";
                        else if($feriado == true && $mes == 12)
                            echo "<tr class='naoLetivo'>
                                <td class='colunaData'>$data</td>
                                <td class='colunaEntrada'></td>
                                <td class='colunaAssinatura'>RECESSO NATALINO</td>
                                <td class='colunaSaida'></td>";
                        else
                            echo "<tr>
                                <td class='colunaData'>$data</td>
                                <td class='colunaEntrada'>:</td>
                                <td class='colunaAssinatura'></td>
                                <td class='colunaSaida'>:</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
