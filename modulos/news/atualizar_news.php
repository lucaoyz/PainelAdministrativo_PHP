<?PHP
require_once("../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$titulo 	= $_REQUEST['txt_titulo'];
$descricao 	= $_REQUEST['txt_descricao'];
$autor 	= $_REQUEST['txt_autor'];
$data_publicacao 	= $_REQUEST['data_publicacao'];
$status 	= $_REQUEST['txt_status'];


$sql = "update tb_news set 
					new_titulo = '$titulo', 
					new_descricao = '$descricao', 
					new_autor = '$autor',
					new_data_publicacao = '$data_publicacao',
					new_status = '$status'
				where 
					new_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_news.php");
?>