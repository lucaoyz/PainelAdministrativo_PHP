<?php
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$id = $_REQUEST['ite_codigo'];

$sql = "select * from tb_itens_venda where ite_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);

$sql2 = "select * from tb_venda";
$sql2 = mysqli_query($con, $sql2) or die ("Erro na sql2!") ;

$sql3 = "select * from tb_produto";
$sql3 = mysqli_query($con, $sql3) or die ("Erro na sql3!") ;

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
<form name="frm_item_vendas" id="frm_item_vendas" action="atualizar_item_venda.php" method="post">
<div id="principal">
  <h1> Atualizar Venda </h1>
    <label> Código </label>
    <input name="txt_codigo" type="text" class="input_01" value="<?php echo $dados['ite_codigo']; ?>">
    
    <label>  ID Venda </label>
    <select name="txt_venda" class="input_01">

    <?php while ($dados2 = mysqli_fetch_array($sql2)) { ?>
    
    <option value="<?php echo $dados2['ven_codigo']; ?>" <?php  if($dados['ven_codigo'] == $dados2['ven_codigo']) { echo "selected" ; } ?>>
    <?php echo utf8_encode($dados2['ven_codigo']); ?>
    </option>
    <?php } ?>

    </select>
        
    <label>  Produto </label>
    <select name="txt_produto" class="input_01">

    <?php while ($dados3 = mysqli_fetch_array($sql3)) { ?>
    
    <option value="<?php echo $dados3['pro_codigo']; ?>" <?php  if($dados['pro_codigo'] == $dados3['pro_codigo']) { echo "selected" ; } ?>>
    <?php echo utf8_encode($dados3['pro_descricao']); ?>
    </option>
    <?php } ?>

    </select>

    <label> Valor Unitario </label>
    <input name="txt_valor_unit" type="text" class="input_01" value="<?php echo $dados['ite_valor_unit']; ?>">

    <label> Quantidade </label>
    <input name="txt_qtde" type="text" class="input_01" value="<?php echo $dados['ite_qtde']; ?>">

    <label> Total </label>
    <input name="txt_total" type="text" class="input_01" value="<?php echo $dados['ite_total']; ?>">

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
