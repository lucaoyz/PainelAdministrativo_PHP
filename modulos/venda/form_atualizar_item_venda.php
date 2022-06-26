<?php
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$id = $_REQUEST['ite_codigo'];

$sql = "select * from tb_itens_venda where ite_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);

$sql2 = "select * from tb_venda";
$sql2 = mysqli_query($con, $sql2) or die ("Erro na sql2!") ;

$sql3 = "select * from tb_produto";
$sql3 = mysqli_query($con, $sql3) or die ("Erro na sql3!") ;

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

    <title>Formulário de Venda</title>

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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Atualizar</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Atualizar Itens de Venda</h5>
                </div>
                <div class="card-body">
                <form name="frm_item_vendas" id="frm_item_vendas" action="atualizar_item_venda.php" method="post">
                <div class="mb-3">
                            <label class="form-label">Codigo</label>
                            <input name="txt_codigo" type="text" class="form-control" value="<?php echo $dados['ite_codigo']; ?>">
                        </div>          
                        <div class="mb-3">
                            <label class="form-label">Venda</label>
                            <select name="txt_venda" class="form-select">
                            <?php while ($dados2 = mysqli_fetch_array($sql2)) { ?>
    
                            <option value="<?php echo $dados2['ven_codigo']; ?>" <?php  if($dados['ven_codigo'] == $dados2['ven_codigo']) { echo "selected" ; } ?>>
                            <?php echo utf8_encode($dados2['ven_codigo']); ?>
                            </option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Produto</label>
                            <select name="txt_produto" class="form-select">
                            <?php while ($dados3 = mysqli_fetch_array($sql3)) { ?>
    
                            <option value="<?php echo $dados3['pro_codigo']; ?>" <?php  if($dados['pro_codigo'] == $dados3['pro_codigo']) { echo "selected" ; } ?>>
                            <?php echo utf8_encode($dados3['pro_descricao']); ?>
                            </option>
                            <?php } ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Valor</label>
                            <input name="txt_valor_unit" type="text" class="form-control" placeholder="Insira o valor..." value="<?php echo $dados['ite_codigo']; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantidade</label>
                            <input name="txt_qtde" type="text" class="form-control" placeholder="Insira a quantidade..." value="<?php echo $dados['ite_qtde']; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total</label>
                            <input name="txt_total" type="text" class="form-control" placeholder="Insira o total..." value="<?php echo $dados['ite_total']; ?>"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
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