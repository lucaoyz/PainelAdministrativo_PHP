<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_titulo   = isset($_REQUEST['txt_cons_titulo']) ? $_REQUEST['txt_cons_titulo'] : '';
$cons_descricao  = isset($_REQUEST['txt_cons_descricao']) ? $_REQUEST['txt_cons_descricao'] : '';
$cons_autor  = isset($_REQUEST['txt_cons_autor']) ? $_REQUEST['txt_cons_autor'] : '';

$sql = "select *, date_format(new_data_publicacao,'%d/%m/%Y') as data 
        from tb_news
        where new_codigo like '%".$cons_codigo."%' AND
              new_titulo like '%".$cons_titulo."%' AND
              new_descricao like '%".$cons_descricao."%' AND
              new_autor like '%".$cons_autor."%' 
       ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta News </title>
    
    <link rel="stylesheet" type="text/css" href="../css/consulta.css">
    
	<script type="text/javascript">
    
        function excluir_registro( ) {
            if( !confirm('Deseja realmente excluir este registro?') 
        ){
            if( window.event)
                window.event.returnValue=false;
            else
                e.preventDefault();
         }
        }
    
    </script>

  </head>
<body>
<div id="principal">

<form name="frm_consulta" action="consulta_news.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="txt_cons_titulo" type="text" placeholder="titulo">
    <input name="txt_cons_descricao" type="text" placeholder="descricao">
    <input name="txt_cons_autor" type="text" placeholder="autor">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_03"> <strong> Titulo </strong></div>
    <div class="coluna_03"> <strong> Descrição </strong></div>
    <div class="coluna_02"> <strong> Autor </strong></div>
    <div class="coluna_01"> <strong> Status </strong></div>
    <div class="coluna_03"> <strong> Data Publicação </strong> </div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['new_codigo']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['new_titulo']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['new_descricao']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['new_autor']; ?> </div>
    <div class="coluna_01"> <?php echo $dados['new_status']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['data']; ?> </div>

    <div class="coluna_01">
      <a href="delete_news.php?new_codigo=<?php echo $dados['new_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_news.php?new_codigo=<?php echo $dados['new_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

