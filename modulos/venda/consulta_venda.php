<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';

$sql = "select v.ven_codigo, c.cli_nome, v.ven_tipo_pagamento, date_format(v.ven_data,'%d/%m/%Y') as data 
        from tb_venda v
        inner join TB_cliente c on (v.cli_codigo = c.cli_codigo)
        where v.ven_codigo like '%".$cons_codigo."%'
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

<form name="frm_consulta" action="consulta_venda.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_02"> <strong> Cliente </strong></div>
    <div class="coluna_03"> <strong> Tipo de pagamento </strong></div>
    <div class="coluna_01"> <strong> Data </strong></div>

  </div>
      
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['ven_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['cli_nome']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['ven_tipo_pagamento']; ?> </div>
    <div class="coluna_01"> <?php echo $dados['data']; ?> </div>
    

    <div class="coluna_01">
      <a href="delete_venda.php?ven_codigo=<?php echo $dados['ven_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_venda.php?ven_codigo=<?php echo $dados['ven_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>
</div>
</body>
</html>

