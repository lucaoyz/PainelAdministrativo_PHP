<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_nome   = isset($_REQUEST['txt_cons_nome']) ? $_REQUEST['txt_cons_nome'] : '';

$sql = "select *, date_format(cli_data_nascimento,'%d/%m/%Y') as data 
        from tb_cliente
        where cli_codigo like '%".$cons_codigo."%' AND
              cli_nome like '%".$cons_nome."%'
       ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta Cliente </title>
    
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

<form name="frm_consulta" action="consulta_cliente.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="txt_cons_nome" type="text" placeholder="nome">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_02"> <strong> Nome </strong></div>
    <div class="coluna_03"> <strong> Data de Nascimento </strong></div>
    <div class="coluna_03"> <strong> Email </strong></div>
    <div class="coluna_01"> <strong> Sexo </strong></div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['cli_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['cli_nome']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['data']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['cli_email']; ?> </div>
    <div class="coluna_01"> <?php echo $dados['cli_sexo']; ?> </div>

    <div class="coluna_01">
      <a href="delete_cliente.php?cli_codigo=<?php echo $dados['cli_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_cliente.php?cli_codigo=<?php echo $dados['cli_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

