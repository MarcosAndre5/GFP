function phoneMask(v) {

    let r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
  
    if (r.length > 11) {
      r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 7) {
      r = r.replace(/^(\d\d)(\d{5})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
      r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else if (v.trim() !== "") {
      r = r.replace(/^(\d*)/, "($1");
    }
    return r;
  }

function importeAquivoCSV(){
    var checkboxArquivo = document.getElementById("arquivo").checked

    if(checkboxArquivo == true){
        document.getElementById("nome").value = ""
        document.getElementById("nome").disabled = true
    }else
        document.getElementById("nome").disabled = false
}

function mostrarCheckboxFeriados(){
    var selectBox = document.getElementById("mes")
    var mes = selectBox.options[selectBox.selectedIndex].value
    var checkboxBissexto = document.getElementById("bissexto").checked
    qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    if(checkboxBissexto == true)
        qtdDiasMes[2] += 1

    if(mes == 2)
        document.getElementById("divbissexto").hidden = false
    else
        document.getElementById("divbissexto").hidden = true

    document.getElementById("escolhaferiados").innerHTML = ""

    for(var i = 1; i <= qtdDiasMes[mes]; i++) {
        if(i < 10)
            document.getElementById('escolhaferiados').innerHTML += "<label>&emsp;"+i+"</label>"+
                "<input type='checkbox' id='feriado' name='feriado"+i+"' value='"+i+"'>"
        else
            document.getElementById('escolhaferiados').innerHTML += "<label>&ensp;"+i+"</label>"+
                "<input type='checkbox' id='feriado' name='feriado"+i+"' value='"+i+"'>"

        if(i % 10 == 0)
            document.getElementById('escolhaferiados').innerHTML += "<br>"
    }
}

function limparCheckboxFeriados(){
    document.getElementById("escolhaferiados").innerHTML = ""

    mostrarCheckboxFeriados()
}