<?PHP
require_once('../conexao/banco.php');

$id 	= $_REQUEST['new_codigo'];

$sql = "delete from tb_news where new_codigo = '$id'";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_news.php");

?>



