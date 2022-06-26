<?PHP

require_once('../../conexao/banco.php');

$nome 	= $_REQUEST['txt_nome'];
$fone 	= $_REQUEST['txt_fone'];
$cel 	= $_REQUEST['txt_cel'];
$email 	= $_REQUEST['txt_email'];

$sql = "insert into tb_fornecedor (for_nome, for_fone, for_cel, for_email) 
								values ('$nome', '$fone', '$cel', '$email')";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_fornecedor.php");

?>


