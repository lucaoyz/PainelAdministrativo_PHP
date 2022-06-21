<?PHP
require_once("../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$nome 	= $_REQUEST['txt_nome'];
$login 	= $_REQUEST['txt_login'];
$senha 	= $_REQUEST['txt_senha'];

$sql = "update tb_login set 
					log_nome = '$nome', 
					log_login = '$login', 
					log_senha = '$senha'
				where 
					log_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_login.php");
?>
