<?php include 'frontend/cabecalho.html'; ?>

<h2>Gerar Folha</h2>
<hr>
<form action="gerar_pdf.php" method="POST" target="_blank">
    <label>Gerar folha para: </label>
    <br>&emsp;
    <input type="checkbox" id="servidor" name="tipo_usuario" value="Servidor" onchange="ativaDesativaBotao()">
    <label>Servidores</label>
    <br>&emsp;
    <input type="checkbox" id="terceirizado" name="tipo_usuario" value="Terceirizado" onchange="ativaDesativaBotao()">
    <label>Terceirizados</label>
    <br>&emsp;
    <input type="checkbox" id="estagiario" name="tipo_usuario" value="Estagiario" onchange="ativaDesativaBotao()">
    <label>Estagiarios</label>
    <br><br>
    <label>Importar nomes de arquivo <b>nomes.csv:</b></label>
    <input name="arquivo" id="arquivo" type="checkbox" value="1" onchange="ativaDesativaBotao()">
    <br><br>
    <label>Gerar folha única para:</label>
    <input name="nome" id="nome" maxlength="40" type="text" placeholder="Digite o Nome do Servidor..." autocomplete="off" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required onchange="ativaDesativaBotao()">
    <br><br>
    <label>Mês da Folha:</label> 
    <select name="mes" id="mes" onchange="mostrarCheckboxFeriados()" required>
        <option value="" selected>Selecione...</option>
        <option value="1">Janeiro</option>
        <option value="2">Fevereiro</option>
        <option value="3">Março</option>
        <option value="4">Abril</option>
        <option value="5">Maio</option>
        <option value="6">Junho</option>
        <option value="7">Julho</option>
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
    </select>
    <br><br>
    <label>Primeiro dia do mês será num(a):</label>
    <select name="dia" required>
        <option value="" selected>Selecionar...</option>
        <option value="0">Domingo</option>
        <option value="1">Sábado</option>
        <option value="2">Sexta-feira</option>
        <option value="3">Quinta-feira</option>
        <option value="4">Quarta-feira</option>
        <option value="5">Terça-feira</option>
        <option value="6">Segunda-feira</option>
    </select>
    <br><br>
    <label>Marque os feriados do mês:</label>
    <div id="escolhaferiados"></div>
    <br>
    <input type="submit" value="Gerar Folha de Pontos">
</form>

<?php include 'frontend/rodape.html'; ?>
