﻿<?php
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$sql = "select * from tb_fornecedor";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
   document.frm_produto.txt_descricao.focus()
 }
 
  function validar_dados() {
   if(document.frm_produto.txt_descricao.value=="") {
         alert ("Você deve preencher o campo descrição!");
     document.frm_produto.txt_descricao.focus();
 
         return false;
   }
 
   if(document.frm_produto.txt_qtde.value=="") {
         alert ("Você deve preencher o campo quantidade!");
     document.frm_produto.txt_qtde.focus();
 
         return false;
   }
  
  if(document.frm_produto.txt_preco.value=="") {
         alert ("Você deve preencher o campo preço!");
     document.frm_produto.txt_preco.focus();
 
         return false;
   }

  if(document.frm_produto.txt_foto.value=="") {
         alert ("Você deve enviar uma foto no campo foto!");
     document.frm_produto.txt_foto.focus();
 
         return false;
   }
  }

 </script>
 

</head>
<body onload="foco()">

<form name="frm_produto" id="frm_produto" action="cadastro_produto.php" method="post" enctype="multipart/form-data">
<div id="principal">
  <h1> Cadastro Produto </h1>
    <label> Descrição </label>
    <input name="txt_descricao" type="text" class="input_01">
    
    <label> Quantidade </label>
    <input name="txt_qtde" type="text" class="input_01">
    
    <label> Preço </label>
    <input name="txt_preco" type="text" class="input_01">

    <label> Status </label>
    <select name="txt_status" class="select_01">
    <option value="A"> Ativo</option>
    <option value="I"> Inativo</option>
    </select>

    <label> Foto </label>
    <input name="txt_foto" type="file" class="input_01">

    <label> Fornecedor </label>

    <select name="txt_fornecedor" class="select_01">
    <?php while ($dados = mysqli_fetch_array($sql)) { ?>

    <option value="<?php echo $dados['for_codigo']; ?>"><?php echo utf8_encode($dados['for_nome']) ; ?> </option>
    <?php } ?>

    </select>
    
    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>