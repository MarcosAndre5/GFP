function mostrarCheckboxFeriados(){
	var selectBox = document.getElementById("mes");
	var mes = selectBox.options[selectBox.selectedIndex].value;
	var checkboxBissexto = document.getElementById("bissexto").checked;

	qtdDiasMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

	if(mes == 2)
		document.getElementById("divbissexto").hidden = false;
	else
		document.getElementById("divbissexto").hidden = true;

	if(checkboxBissexto == true)
		qtdDiasMes[2] += 1

	document.getElementById("escolhaferiados").innerHTML = "";

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
	var checkboxBissexto = document.getElementById("bissexto").checked;
	document.getElementById("escolhaferiados").innerHTML = "";

	mostrarCheckboxFeriados()
}