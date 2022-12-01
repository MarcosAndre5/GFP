function abrirListaUsuarios() {
    window.open('lista_usuario.php', '_self')
}

function usuarioCadastrado() {
    alert('Usuário Cadastrado!')
    window.open('cadastra_usuario.php', '_self')
}

function usuarioDeletado() {
    alert('Usuário Deletado!')
    abrirListaUsuarios()
}

function usuarioNaoEncontrado() {
    alert('Usuário não encontrado!')
    abrirListaUsuarios()
}

function usuarioAtualizado() {
    alert('Dados do Usuário Atualizados!')
    abrirListaUsuarios()
}

function usuarioDadosIguais() {
    alert('Dados iguais aos já cadastrados!')
    abrirListaUsuarios()
}

function mostrarCheckboxFeriados() {
    var date = new Date();
    var selectBox = document.getElementById("mes")
    var mes = selectBox.options[selectBox.selectedIndex].value
    var qtdDiasMes = new Date(date.getFullYear(), mes, 0).getDate()

    document.getElementById('escolhaferiados').innerHTML = ""
    
    for(var i = 1; i <= qtdDiasMes; i++) {
        var espaco = (i < 10) ? "&emsp;" : "&ensp;"
        var quebraLinha = (i % 10 == 0) ? "<br>" : ""
        
        document.getElementById('escolhaferiados').innerHTML += "<label>" + espaco + i +
            "</label><input type='checkbox' name=" + i + " value='1'>" + quebraLinha
    }
}

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
