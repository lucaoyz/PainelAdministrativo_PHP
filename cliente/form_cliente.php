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

<form name="frm_cliente" action="cadastro_cliente.php" method="post">
<div id="principal">
  <h1> Cadastro Cliente </h1>
    <label> Nome </label>
    <input name="txt_nome" type="text" class="input_01">
    
    <label> Data de Nascimento </label>
    <input name="data_nascimento" type="date" class="input_01">
    
    <label> Email </label>
    <input name="txt_email" type="email" class="input_01">

    <label> Sexo </label>
    <select name="txt_sexo" class="select_01">
    <option value="M"> Masculino</option>
    <option value="F"> Feminino</option>
    </select>

    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
