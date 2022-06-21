<?php 
  require_once("../seguranca.php");
  require_once('../conexao/banco.php');

$sql = "select * from tb_venda";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$sql2 = "select * from tb_produto";
$sql2 = mysqli_query($con, $sql2) or die ("Erro na sql2") ;

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
 
<form name="frm_item_venda" id="frm_item_venda" action="cadastro_item_venda.php" method="post">
<div id="principal">
  <h1> Cadastro Item de Vendas </h1>
  
  </select>
    <label> Venda </label>

    <select name="txt_venda" class="select_01">
    <?php while ($dados = mysqli_fetch_array($sql)) { ?>

    <option value="<?php echo $dados['ven_codigo']; ?>"><?php echo utf8_encode($dados['ven_codigo']) ; ?> </option>
    <?php } ?>
  </select>

   </select>
    <label> Produto </label>

    <select name="txt_produto" class="select_01">
    <?php while ($dados = mysqli_fetch_array($sql2)) { ?>

    <option value="<?php echo $dados['pro_codigo']; ?>"><?php echo utf8_encode($dados['pro_descricao']) ; ?> </option>
    <?php } ?>
    </select>

    <label> Valor unitário </label>
    <input name="txt_valor_unit" type="text" class="input_01">

    <label> Quantidade </label>
    <input name="txt_qtde" type="text" class="input_01">
    
    <label> Total </label>
    <input name="txt_total" type="text" class="input_01">

    

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
