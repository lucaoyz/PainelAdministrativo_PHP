<?PHP
require_once("../../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$cliente 	= $_REQUEST['txt_cliente'];
$pagamento 	= $_REQUEST['txt_tipo_pagamento'];

$sql = "update tb_venda set 
					cli_codigo = '$cliente', 
					ven_tipo_pagamento = '$pagamento' 
				where 
					ven_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_venda.php");
?>


