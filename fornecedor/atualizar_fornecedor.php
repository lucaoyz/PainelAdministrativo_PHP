<?PHP
require_once("../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$nome 	= $_REQUEST['txt_nome'];
$fone 	= $_REQUEST['txt_fone'];
$cel 	= $_REQUEST['txt_cel'];
$email 	= $_REQUEST['txt_email'];

$sql = "update tb_fornecedor set 
					for_nome = '$nome', 
					for_fone = '$fone', 
					for_cel = '$cel',
					for_email = '$email'
				where 
					for_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_fornecedor.php");
?>


