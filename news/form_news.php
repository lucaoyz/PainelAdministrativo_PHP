
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário de Cadastro </title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">
</head>
<body>

<form name="frm_news" action="cadastro_news.php" method="post">
<div id="principal">
  <h1> Cadastro news </h1>
    <label> Titulo </label>
    <input name="txt_titulo" type="text" class="input_01">
    
    <label> Descrição </label>
    <input name="txt_descricao" type="text" class="input_01">
    
    <label> Autor </label>
    <input name="txt_autor" type="text" class="input_01">

    <label> Data de Publicação </label>
    <input name="data_publicacao" type="date" class="input_01">

    <label> Status </label>
    <select name="txt_status" class="select_01">
    <option value="A"> Ativo </option>
    <option value="I"> Inativo </option>
    </select>
    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
