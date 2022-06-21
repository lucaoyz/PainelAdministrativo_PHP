<?PHP

require_once('../conexao/banco.php');

$cliente 	= $_REQUEST['txt_cliente'];
$pagamento 	= $_REQUEST['txt_tipo_pagamento'];

$sql = "insert into tb_venda (cli_codigo, ven_tipo_pagamento) 
								values ('$cliente', '$pagamento') ";																

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_venda.php");

?>


