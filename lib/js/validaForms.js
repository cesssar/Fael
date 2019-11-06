function Trim(strTexto)
{
  return strTexto.replace(/^s+|s+$/g, '');
}

function validar(frm) {
    var formulario = frm;
    var usuario = formulario.usuario;
    var senha = formulario.senha;
    if(validaCampo(usuario,"Verifique o campo usuário.",5)==false){ return false; }
    else if(validaCampo(senha, "Verifique o campo senha.",5)==false){ return false; }
  }

  function validaPolo(frm){
    var formulario = frm;
    var nome = frm.nome;
    var email = frm.email;
    var cidade = frm.cidade;
    var estado = frm.estado;
    var cep = frm.cep;

    if(validaCampo(nome,"Verifique o nome do polo digitado.",5)==false){ return false; }
    else if(validaCampo(email,"Verifique o e-mail digitado.", 10)==false){ return false; }
    else if(validaCampo(cidade,"Verifique a cidade digitada.",5)==false){ return false; }
    else if(validaCampo(estado,"Verifique o estado digitado.",2)==false){ return false; }
    else if(validaCampo(cep,"Verifique o CEP digitado.", 7)==false){ return false; }

  }

  function validaAluno(frm){
    var formulario = frm;
    var cpf = frm.cpf;
    var nome = frm.nome;
    var sobrenome = frm.sobrenome;
    var nascimento = frm.nascimento;
    var cidade = frm.cidade;
    var estado = frm.estado;

    if(validaCampo(cpf, "Verifique o CPF digitado.",11)==false){ return false; }
    else if(validaCampo(nome, "Verifique o campo nome digitado.",4)==false){ return false; }
    else if(validaCampo(sobrenome,"Verifique o campo sobrenome.",5)==false){ return false; }
    else if(validaCampo(nascimento,"Verifique o campo nascimento.",10)==false){ return false; }
    else if(validaCampo(cidade, "Verifique o campo cidade.",5)==false){ return false; }
    else if(validaCampo(estado, "Verifique o campo estado.",2)==false){ return false; }
  }

  function validaDisciplina(frm){
    var formulario = frm;
    var disciplina = frm.disciplina;
    var professor = frm.professor;
    var polo = frm.polo;

    if(validaCampo(disciplina,"Verifique o campo disciplina.",5)==false){ return false; }
    else if(validaCampo(professor,"Verifique o campo professor.", 5)==false){ return false; }
    else if(validaCampo(polo, "Selecione um polo.",1)==false){ return false; }
  }

  function validaCampo(campo, msg, tam){
    if(Trim(campo.value) == "" || campo.value.length < tam){
      alert(msg);
      campo.focus();
      return false;
    }
  }

function maiuscula(z){
  v = z.value.toUpperCase();
  z.value = v;
}

function mascaraData(val) {
  var pass = val.value;
  var expr = /[0123456789]/;

  for (i = 0; i < pass.length; i++) {
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}
 
function somenteNumeros(e) {
  var charCode = e.charCode ? e.charCode : e.keyCode;
  if (charCode != 8 && charCode != 9) {
      if (charCode < 48 || charCode > 57) {
          return false;
      }
  }
}