function ativaDesativaBotao() {
    var servidor = document.getElementById("servidor").checked
    var terceirizado = document.getElementById("terceirizado").checked
    var estagiario = document.getElementById("estagiario").checked
    var arquivo = document.getElementById("arquivo").checked

    if(servidor == true) {
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
        document.getElementById("arquivo").disabled = true
        document.getElementById("terceirizado").disabled = true
        document.getElementById("estagiario").disabled = true
    } else if(terceirizado == true){
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
    } else if(arquivo == true) {
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
        document.getElementById("servidor").disabled = true
        document.getElementById("terceirizado").disabled = true
        document.getElementById("estagiario").disabled = true
    } else {
        document.getElementById("nome").disabled = false
        document.getElementById("arquivo").disabled = false
        document.getElementById("servidor").disabled = false
        document.getElementById("terceirizado").disabled = false
        document.getElementById("estagiario").disabled = false
    }
}

function mostrarCheckboxFeriados() {
    var selectBox = document.getElementById("mes")
    var mes = selectBox.options[selectBox.selectedIndex].value
    var checkboxBissexto = document.getElementById("bissexto").checked
    qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    if(checkboxBissexto == true) {
        qtdDiasMes[2] += 1
    }

    if(mes == 2) {
        document.getElementById("divbissexto").hidden = false
    } else {
        document.getElementById("divbissexto").hidden = true
    }

    document.getElementById("escolhaferiados").innerHTML = ""

    for(var i = 1; i <= qtdDiasMes[mes]; i++) {
        if(i < 10) {
            document.getElementById('escolhaferiados').innerHTML += "<label>&emsp;"+i+"</label>"+
                "<input type='checkbox' id='feriado' name='feriado"+i+"' value='"+i+"'>"
        } else {
            document.getElementById('escolhaferiados').innerHTML += "<label>&ensp;"+i+"</label>"+
                "<input type='checkbox' id='feriado' name='feriado"+i+"' value='"+i+"'>"
        }

        if(i % 10 == 0) {
            document.getElementById('escolhaferiados').innerHTML += "<br>"
        }
    }
}

function limparCheckboxFeriados() {
    document.getElementById("escolhaferiados").innerHTML = ""

    mostrarCheckboxFeriados()
}

// Máscaras de telefone ER
function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function id(el){
    return document.getElementById(el);
}

window.onload = function(){
    id('telefone').onkeyup = function(){
        mascara(this, mtel);
    }
}
