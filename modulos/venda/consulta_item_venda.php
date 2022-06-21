<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';

$sql = "select i.ite_codigo, i.ven_codigo, p.pro_descricao, i.ite_valor_unit, i.ite_qtde, i.ite_total 
        from tb_itens_venda i
        inner join TB_produto p on (p.pro_codigo = i.pro_codigo)
        where i.ite_codigo like '%".$cons_codigo."%'
       ";
       
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;


?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta Venda </title>
    
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

<form name="frm_consulta" action="consulta_item_venda.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_02"> <strong> ID Venda </strong></div>
    <div class="coluna_03"> <strong> Produto Descrição </strong></div>
    <div class="coluna_02"> <strong> Valor unitario </strong></div>
    <div class="coluna_02"> <strong> Quantidade </strong></div>
    <div class="coluna_02"> <strong> Total </strong></div>



  </div>
      
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['ite_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['ven_codigo']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['pro_descricao']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['ite_valor_unit']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['ite_qtde']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['ite_total']; ?> </div>
    

    <div class="coluna_01">
      <a href="delete_item_venda.php?ite_codigo=<?php echo $dados['ite_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_item_venda.php?ite_codigo=<?php echo $dados['ite_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>
</div>
</body>
</html>

