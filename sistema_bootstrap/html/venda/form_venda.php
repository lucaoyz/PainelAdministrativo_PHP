<?php 
  require_once("../seguranca.php");
  require_once('../conexao/banco.php');

$sql = "select * from tb_cliente";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário de Vendas </title>
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
	document.frm_venda.txt_cliente.focus()
}

 function validar_dados() {
	if(document.frm_venda.txt_cliente.value=="") {
        alert ("Você deve preencher o campo Cliente!");
		document.frm_venda.txt_cliente.focus();

        return false;
  }
  if(document.frm_venda.txt_tipo_pagamento.value=="") {
        alert ("Você deve preencher o campo Pagamento!");
		document.frm_venda.txt_pagamento.focus();

        return false;
  }

 }
</script>

</head>
<body onload="foco()">
 
<form name="frm_venda" id="frm_venda" action="cadastro_venda.php" method="post">
<div id="principal">
  <h1> Vendas </h1>
  
    <label> Cliente </label>
    <select name="txt_cliente" class="select_01">
      <?php while ($dados = mysqli_fetch_array($sql)) { ?>

      <option value="<?php echo $dados['cli_codigo']; ?>"><?php echo utf8_encode($dados['cli_nome']) ; ?> </option>
      <?php } ?>

    </select>
    
    <label> Tipo de pagamento </label>
    <select name="txt_tipo_pagamento" class="select_01">
      <option value="1"> Dinheiro </option>
      <option value="2"> Cartão </option>
      <option value="3"> Pix </option>
    </select>

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
