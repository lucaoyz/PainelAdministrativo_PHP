<?PHP
require_once('../conexao/banco.php');

$id 	= $_REQUEST['for_codigo'];

$sql = "delete from tb_fornecedor where for_codigo = '$id'";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_fornecedor.php");

?>


