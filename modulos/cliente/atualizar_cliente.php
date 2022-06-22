<?PHP
require_once("../../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$nome 	= $_REQUEST['txt_nome'];
$data_nascimento 	= $_REQUEST['data_nascimento'];
$email 	= $_REQUEST['txt_email'];
$sexo 	= $_REQUEST['txt_sexo'];

$sql = "update tb_cliente set 
					cli_nome = '$nome', 
					cli_data_nascimento = '$data_nascimento', 
					cli_email = '$email',
					cli_sexo = '$sexo'
				where 
					cli_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_cliente.php");
?>


