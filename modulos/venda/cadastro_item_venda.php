<?PHP

require_once('../../conexao/banco.php');

$venda 	= $_REQUEST['txt_venda'];
$produto 	= $_REQUEST['txt_produto'];
$valorunit 	= $_REQUEST['txt_valor_unit'];
$qtde 	= $_REQUEST['txt_qtde'];
$total 	= $_REQUEST['txt_total'];

$sql = "insert into tb_itens_venda (ven_codigo, pro_codigo, ite_valor_unit, ite_qtde, ite_total) 
								values ('$venda', '$produto', '$valorunit', '$qtde', '$total') ";																

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_item_venda.php");

?>


