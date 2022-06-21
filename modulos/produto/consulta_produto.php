<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_desc   = isset($_REQUEST['txt_cons_desc']) ? $_REQUEST['txt_cons_desc'] : '';

$sql = "select *, date_format(pro_data_cadastro,'%d/%m/%Y') as data 
        from tb_produto
        where pro_codigo like '%".$cons_codigo."%' AND
              pro_descricao like '%".$cons_desc."%'
       ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta produto </title>
    
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

<form name="frm_consulta" action="consulta_produto.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="txt_cons_desc" type="text" placeholder="descrição">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_02"> <strong> Descrição </strong></div>
    <div class="coluna_02"> <strong> Quantidade </strong></div>
    <div class="coluna_02"> <strong> Preço </strong></div>
    <div class="coluna_02"> <strong> Status </strong></div>
    <div class="coluna_03"> <strong> Foto </strong></div>
    <div class="coluna_02"> <strong> Fornecedor </strong></div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['pro_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['pro_descricao']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['pro_qtde']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['pro_preco']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['pro_status']; ?> </div>
    <div class="coluna_03"> <a href="<?php echo $dados['pro_foto']; ?>" target="_blank"> <?php echo $dados['pro_foto']; ?> </a> </div>
    <div class="coluna_02"> <?php echo $dados['for_codigo']; ?> </div>

    <div class="coluna_01">
      <a href="delete_produto.php?pro_codigo=<?php echo $dados['pro_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_produto.php?pro_codigo=<?php echo $dados['pro_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

