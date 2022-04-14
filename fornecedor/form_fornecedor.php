<?php 
  require_once("../seguranca.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário de Cadastro </title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">
</head>
<body>

<form name="frm_fornecedor" action="cadastro_fornecedor.php" method="post">
<div id="principal">
  <h1> Cadastro Fornecedor </h1>
    <label> Nome </label>
    <input name="txt_nome" type="text" class="input_01">
    
    <label> Telefone </label>
    <input name="txt_fone" type="text" class="input_01">
    
    <label> Celular </label>
    <input name="txt_cel" type="text" class="input_01">

    <label> Email </label>
    <input name="txt_email" type="email" class="input_01">

    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
