<?PHP
require_once('../../conexao/banco.php');

$id 	= $_REQUEST['ite_codigo'];

$sql = "delete from tb_itens_venda where ite_codigo = '$id'";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_item_venda.php");

?>


