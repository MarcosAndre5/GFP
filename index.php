<?php include 'frontend/cabecalho.html'; ?>

<h2>Gerar Folha</h2>
<hr>
<form action="gerar_pdf.php" method="POST" target="_blank">
    <label>Gerar Folha de: </label>&emsp;
    <label>Servidores</label>
    <input name="arquivo" id="1" type="checkbox" value="1">&emsp;
    <label>Terceirizados</label>
    <input name="arquivo" id="2" type="checkbox" value="1">&emsp;
    <label>Estagiarios</label>
    <input name="arquivo" id="3" type="checkbox" value="1">
    <br><br>
    <label>Importar nomes de arquivo <b>nomes.csv:</b></label>
    <input name="arquivo" id="arquivo" type="checkbox" value="1" onchange="importeAquivoCSV()">
    <br><br>
    <label>Nome do Servidor:</label>
    <input name="nome" id="nome" maxlength="40" type="text" placeholder="Digite o Nome do Servidor..." autocomplete="off" required>
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
        <option value="0">Segunda-feira</option>
        <option value="1">Terça-feira</option>
        <option value="2">Quarta-feira</option>
        <option value="3">Quinta-feira</option>
        <option value="4">Sexta-feira</option>
        <option value="5">Sábado</option>
        <option value="6">Domingo</option>
    </select>
    <br><br>
    <label>Marque os feriados do mês:</label>
    <div id="escolhaferiados"></div>
    <br>
    <div id="divbissexto" hidden>
        <label>O ano é bissexto?</label>
        <input name="bissexto" id="bissexto" type="checkbox" value="1" onchange="limparCheckboxFeriados()">
    </div>
    <br>
    <input type="submit" value="Gerar Folha de Pontos">
</form>

<?php include 'frontend/rodape.html'; ?>
