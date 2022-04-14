<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> .:: Login ::. </title>

<link rel="stylesheet" type="text/css" href="css/formatacao.css">
<style type="text/css">

body {
        background-image: url('img/background.jpg');
        background-attachment: fixed;
        background-size: 100%;
      } 

body .login-senha label{
  font-weight: bold;
  font-size: 24px;
  color: #FF5433;
}

body .btn{
  
  background-color: #FF5433;
  color: #fff;
  font-weight: bold;
}
.cadastro-link a{
      color: #009dff;
      text-decoration: none;

}
.cadastro-link a:visited {
    color: green;

}

</style>

</head>

<body>


<form name="frm_login" action="validacao.php" method="post">
  <div id="principal">
  <div class="login-senha">
  
    <label> Login </label>
    <input name="txt_usuario" type="text" class="input_01">

    <label> Senha </label>
    <input name="txt_senha" type="password" class="input_01">
    </div>
    <input name="btn_enviar" type="submit" value="Logar" class="btn">
      <a href="login/form_login.php" class="cadastro-link">Ainda não é cadastrado? clique aqui para se cadastrar.</a>
  </div>
</form>

</body>
</html>

