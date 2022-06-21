<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_nome   = isset($_REQUEST['txt_cons_nome']) ? $_REQUEST['txt_cons_nome'] : '';
$cons_login  = isset($_REQUEST['txt_cons_login']) ? $_REQUEST['txt_cons_login'] : '';

$sql = "select *, date_format(log_data_cadastro,'%d/%m/%Y') as data 
        from tb_login
        where log_codigo like '%".$cons_codigo."%' AND
              log_nome like '%".$cons_nome."%' AND
              log_login like '%".$cons_login."%'   
       ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta Login </title>
    
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

<form name="frm_consulta" action="consulta_login.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="txt_cons_nome" type="text" placeholder="nome">
    <input name="txt_cons_login" type="text" placeholder="login">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_03"> <strong> Nome </strong></div>
    <div class="coluna_02"> <strong> Login </strong></div>
    <div class="coluna_03"> <strong> Data Cadastro </strong> </div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['log_codigo']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['log_nome']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['log_login']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['data']; ?> </div>

    <div class="coluna_01">
      <a href="delete_login.php?log_codigo=<?php echo $dados['log_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_login.php?log_codigo=<?php echo $dados['log_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

