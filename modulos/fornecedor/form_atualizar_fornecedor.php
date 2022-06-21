<?php
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$id = $_REQUEST['for_codigo'];

$sql = "select * from tb_fornecedor where for_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);


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
   document.frm_fornecedor.txt_nome.focus()
 }
 
  function validar_dados() {
   if(document.frm_fornecedor.txt_nome.value=="") {
         alert ("Você deve preencher o campo Nome!");
     document.frm_fornecedor.txt_nome.focus();
 
         return false;
   }
   
   if(document.frm_fornecedor.txt_fone.value=="") {
         alert ("Você deve preencher o campo telefone!");
     document.frm_fornecedor.txt_fone.focus();
 
         return false;
   }

   if(document.frm_fornecedor.txt_cel.value=="") {
         alert ("Você deve preencher o campo celular!");
     document.frm_fornecedor.txt_cel.focus();
 
         return false;
   }

   if(document.frm_fornecedor.txt_email.value=="") {
         alert ("Você deve preencher o campo email!");
     document.frm_fornecedor.txt_email.focus();
 
         return false;
   }
   
  }
   
 </script>

</head>
<body onload="foco()">
<form name="frm_fornecedor" id="frm_fornecedor" action="atualizar_fornecedor.php" method="post">
<div id="principal">
  <h1> Atualizar Fornecedor </h1>
    <label> Código </label>
    <input name="txt_codigo" type="text" class="input_01" value="<?php echo $dados['for_codigo']; ?>">
    
    <label> Nome </label>
    <input name="txt_nome" type="text" class="input_01" value="<?php echo $dados['for_nome']; ?>">
    
    <label> Telefone </label>
    <input name="txt_fone" type="text" onkeypress="mascara(this, '## ####-####')" maxlength="12" class="input_01" value="<?php echo $dados['for_fone']; ?>">
    
    <label> Celular </label>
    <input name="txt_cel" type="text"  onkeypress="mascara(this, '## #####-####')" maxlength="13" class="input_01" value="<?php echo $dados['for_cel']; ?>">

    <label> Email </label>
    <input name="txt_email" type="email" class="input_01" value="<?php echo $dados['for_email']; ?>">
    

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
