<?php
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$id = $_REQUEST['log_codigo'];

$sql = "select * from tb_login where log_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário Atualizar </title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">
</head>
<body>
<form name="frm_login" action="atualizar_login.php" method="post">
<div id="principal">
  <h1> Atualizar login </h1>
    <label> Código </label>
    <input name="txt_codigo" type="text" class="input_01" value="<?php echo $dados['log_codigo']; ?>">
    
    <label> Nome </label>
    <input name="txt_nome" type="text" class="input_01" value="<?php echo $dados['log_nome']; ?>">
    
    <label> Login </label>
    <input name="txt_login" type="text" class="input_01" value="<?php echo $dados['log_login']; ?>">
    
    <label> Senha </label>
    <input name="txt_senha" type="password" class="input_01" value="<?php echo $dados['log_senha']; ?>">
    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
