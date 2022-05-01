<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> Formulário de Cadastro </title>

<link rel="stylesheet" type="text/css" href="../css/formatacao.css">

<script language="JavaScript">
	
 function mascara(t, mask){

 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 
  if (texto.substring(0,1) != saida){
      t.value += texto.substring(0,1);
  }

 }

 function foco() {
	document.frm_modelo.txt_nome.focus()
}

 function validar_dados() {
	if(document.frm_modelo.txt_nome.value=="") {
        alert ("Você deve preencher o campo RG!");
		document.frm_modelo.txt_nome.focus();

        return false;
  }

	if(document.frm_modelo.txt_nascimento.value=="") {
        alert ("Você deve preencher o campo Nome!");
		document.frm_modelo.txt_nascimento.focus();

        return false;
  }
 }
  
</script>

</head>
<body onload="foco()">
<form name="frm_modelo" id="frm_modelo" action="" method="post">
    <div id="principal">
        <label> Nome </label>
        <input name="txt_nome" type="text" class="input_01">
        
        <label> Data Nascimento </label>
        <input name="txt_nascimento" type="date" class="input_01">
        
        <label> Email </label>
        <input name="txt_email" type="text" class="input_01">
        
        <label> CEP </label>
 		<input type="text" name="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" class="input_01">

 		<label> Telefone </label>
		<input type="text" name="telefone" onkeypress="mascara(this, '## ####-####')" maxlength="12" class="input_01">

 		<label> Celular </label>
 		<input type="text" name="celular" onkeypress="mascara(this, '## #####-####')" maxlength="13" class="input_01">
 
  		<label> RG </label>
 		<input type="text" name="rg" onkeypress="mascara(this, '##.###.###.#')" maxlength="12" class="input_01">
 
  		<label> CPF </label>
 		<input type="text" name="cpf" onkeypress="mascara(this, '###.###.###.##')" maxlength="14" class="input_01">
 
        <label> Sexo </label>
        <select name="sel_sexo" class="select_01">
          <option value="M"> Masculino </option>
          <option value="F"> Feminino </option>
        </select>
                
        <input name="btn_enviar" type="submit" value="Enviar" class="btn" onclick="return validar_dados()">
    </div>
</form>
</body>
</html>


