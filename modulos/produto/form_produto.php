<?php
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$sql = "select * from tb_fornecedor";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Formulário de login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>

    <script language="JavaScript">
	
 function mascara(t, mask){

 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 
  if (texto.substring(0,1) != saida){
      t.value += texto.substring(0,1);
  }

 }

 function foco() {
	document.frm_cliente.txt_nome.focus()
}

 function validar_dados() {
	if(document.frm_cliente.txt_nome.value=="") {
        alert ("Você deve preencher o campo Nome!");
		document.frm_cliente.txt_nome.focus();

        return false;
  }

	if(document.frm_cliente.txt_email.value=="") {
        alert ("Você deve preencher o campo email!");
		document.frm_cliente.txt_email.focus();

        return false;
  }
 }
  
</script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

  <!-- Menu -->

        <?php 
          include('../../navbar.php');
        ?>

    <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Cadastro</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Cadastro de Produto</h5>
                    </div>
                    <div class="card-body">
                        <form name="frm_produto" id="frm_produto" action="cadastro_produto.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <input type="text" name="txt_descricao" class="form-control" placeholder="Insira a descrição..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantidade</label>
                                <input type="text" name="txt_qtde" class="form-control" placeholder="Insira a quantidade..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Preço</label>
                                <input type="text" name="txt_preco" class="form-control" placeholder="Insira o preço..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Status </label>
                                <select name="txt_status" class="form-select">
                                    <option value="" disabled selected> Selecione...</option>
                                    <option value="A">Ativo</option>
                                    <option value="I">Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <label class="form-label"> Foto </label>
                            <input class="form-control" name="txt_foto" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fornecedor</label>
                                <select name="fornecedor" class="form-select">
                                <option value="" disabled selected> Selecione...</option>
                                <?php while ($dados = mysqli_fetch_array($sql)) { ?>

                                <option value="<?php echo $dados['for_codigo']; ?>"><?php echo utf8_encode($dados['for_nome']) ; ?> </option>

                                <?php } ?>
                                </select>
                            </div>
                            <button name="btn_enviar" type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>
</div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
