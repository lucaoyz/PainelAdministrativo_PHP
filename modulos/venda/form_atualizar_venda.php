<?php
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$id = $_REQUEST['ven_codigo'];

$sql = "select * from tb_venda where ven_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);

$sql2 = "select * from tb_cliente";
$sql2 = mysqli_query($con, $sql2) or die ("Erro na sql2!") ;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário Atualizar </title>
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
   document.frm_vendas.txt_cliente.focus()
 }
 
  function validar_dados() {
   if(document.frm_vendas.txt_cliente.value=="") {
         alert ("Você deve preencher o campo Cliente!");
     document.frm_vendas.txt_cliente.focus();
 
         return false;
   }
 
   if(document.frm_vendas.txt_tipo_pagamento.value=="") {
         alert ("Você deve preencher o campo tipo de pagamento!");
     document.frm_vendas.txt_tipo_pagamento.focus();
 
         return false;
   }
  }
   
 </script>

</head>
<body onload="foco()">
<form name="frm_vendas" id="frm_vendas" action="atualizar_venda.php" method="post">
<div id="principal">
  <h1> Atualizar Venda </h1>
    <label> Código </label>
    <input name="txt_codigo" type="text" class="input_01" value="<?php echo $dados['ven_codigo']; ?>">
    
    <label> Cliente </label>
    <select name="txt_cliente" class="input_01">

    <?php while ($dados2 = mysqli_fetch_array($sql2)) { ?>
    
    <option value="<?php echo $dados2['cli_codigo']; ?>" <?php  if($dados['cli_codigo'] == $dados2['cli_codigo']) { echo "selected" ; } ?>>
    <?php echo utf8_encode($dados2['cli_nome']); ?>
    </option>
    <?php } ?>

    </select>
        
    <label> Tipo de Pagamento </label>
    <select name="txt_tipo_pagamento" class="select_01">
    <option value="1" <?php if($dados['ven_tipo_pagamento'] == "1") { echo "selected";} ?>> Dinheiro</option>
    <option value="2" <?php if($dados['ven_tipo_pagamento'] == "2") { echo "selected";} ?>> Cartão</option>
    <option value="3" <?php if($dados['ven_tipo_pagamento'] == "3") { echo "selected";} ?>> Pix</option>
    </select>

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
