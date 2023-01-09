function mostrarCheckboxFeriados() {
    date = new Date();
    selectBox = document.getElementById('mes')
    mes = selectBox.options[selectBox.selectedIndex].value
    qtdDiasMes = (mes != '') ? new Date(date.getFullYear(), mes, 0).getDate() : 0

    document.getElementById('escolhaferiados').innerHTML = ''
    
    for(dia = 1; dia <= qtdDiasMes; dia++) {
        espaco = (dia < 10) ? '&emsp;' : '&ensp;'
        quebraLinha = (dia % 10 == 0) ? '<br>' : ''
        
        document.getElementById('escolhaferiados').innerHTML += '<label>' + espaco + dia +
            "</label><input type='checkbox' name=" + dia + " value='1'>" + quebraLinha
    }
}

function ativaDesativaBotao() {
    arquivo = document.getElementById("arquivo").files[0]
    servidor = document.getElementById("servidor").checked
    estagiario = document.getElementById("estagiario").checked
    terceirizado = document.getElementById("terceirizado").checked

    if(servidor == true) {
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
        document.getElementById("arquivo").disabled = true
        document.getElementById("estagiario").disabled = true
        document.getElementById("terceirizado").disabled = true
    } else if(terceirizado == true) {
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
        document.getElementById("arquivo").disabled = true
        document.getElementById("servidor").disabled = true
        document.getElementById("estagiario").disabled = true
    } else if(estagiario == true) {
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
        document.getElementById("arquivo").disabled = true
        document.getElementById("servidor").disabled = true
        document.getElementById("terceirizado").disabled = true
    } else if(arquivo) {
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
        document.getElementById("servidor").disabled = true
        document.getElementById("estagiario").disabled = true
        document.getElementById("terceirizado").disabled = true
    } else {
        document.getElementById("nome").disabled = false
        document.getElementById("arquivo").disabled = false
        document.getElementById("servidor").disabled = false
        document.getElementById("estagiario").disabled = false
        document.getElementById("terceirizado").disabled = false
    }
}
