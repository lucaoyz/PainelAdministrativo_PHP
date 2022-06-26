<?PHP
require_once("../../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$venda 	= $_REQUEST['txt_venda'];
$produto 	= $_REQUEST['txt_produto'];
$valorunit 	= $_REQUEST['txt_valor_unit'];
$qtde 	= $_REQUEST['txt_qtde'];
$total 	= $_REQUEST['txt_total'];

$sql = "update tb_itens_venda set 
					ven_codigo = '$venda', 
					pro_codigo = '$produto',
					ite_valor_unit = '$valorunit',
					ite_qtde = '$qtde',
					ite_total = '$total'
				where 
					ite_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_item_venda.php");
?>


