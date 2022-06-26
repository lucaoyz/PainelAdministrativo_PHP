<?PHP

require_once('../../conexao/banco.php');

$titulo 	= $_REQUEST['txt_titulo'];
$descricao 	= $_REQUEST['txt_descricao'];
$autor 		= $_REQUEST['txt_autor'];
$data_publicacao 	= $_REQUEST['data_publicacao'];
$status 	= $_REQUEST['txt_status'];

$sql = "insert into tb_news (new_titulo, new_descricao, new_autor, new_data_publicacao, new_status) 
								values ('$titulo', '$descricao', '$autor', '$data_publicacao', '$status')";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_news.php");

?>


