function check(e){

  var botao = document.getElementById('btn-submit')

  if(e.value == 'Sim'){
    botao.innerHTML = 'Salvar como rascunho';
    botao.setAttribute('class', 'btn btn-primary');
  } else {
    botao.innerHTML = 'Enviar e-mail';
    botao.setAttribute('class', 'btn btn-success');
  }
}


function reverse(e){

  var botao = document.getElementById('btn-submit')

  if(e.value == 'Não'){
    botao.innerHTML = 'Salvar como rascunho';
    botao.setAttribute('class', 'btn btn-primary');
    botao.disabled = false;
  } else {
    botao.innerHTML = 'Enviar e-mail';
    botao.setAttribute('class', 'btn btn-success');
    botao.disabled = false;
  }
}




var idContador = 1;

function adicionar() {

  idContador++;

	var idForm = idContador;

	var html = "";

    html += "<div class='form-group row' id='"+idForm+"'>";
    html +=   "<label for='titulo' class='col-md-2 col-form-label text-md-center'>"+idForm+"º Destino:</label>";
    html +=   "<div class='col-md-4'>";
    html +=     "<input id='nome' type='text' class='form-control' name='name[]' placeholder='Nome'>";
    html +=   "</div>";

    html +=   "<div class='col-md-5'>";
    html +=     "<input id='email' type='email' class='form-control' name='email[]' placeholder='Email'>";
    html +=   "</div>";
    html +=   "<div class='col-md-1 col-form-label text-md-center'>";
    html +=     "<button type='button' onClick=exclui('"+idForm+"') value='-' class='excluir btn btn-danger btn-sm'>";
    html +=       "-";
    html +=     "</button>";
    html +=   "</div>";
    html += "</div>";

    $("#destinoHTML").append(html);
}

function exclui(id){
  var campo = document.getElementById(id);
  campo.remove(200);
}
