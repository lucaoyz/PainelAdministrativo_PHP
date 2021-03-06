<?php
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$id = $_REQUEST['new_codigo'];

$sql = "select * from tb_news where new_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);



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

    <title>Formulário de News</title>

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
                        <h5 class="mb-0">Atualizar Notícias</h5>
                    </div>
                    <div class="card-body">
                      
                    <form name="frm_news" id="frm_news" action="atualizar_news.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Codigo</label>
                                <input name="txt_codigo" type="text" class="form-control" placeholder="Insira o título..." value="<?php echo $dados['new_codigo']; ?>"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input name="txt_titulo" type="text" class="form-control" placeholder="Insira o título..." value="<?php echo $dados['new_titulo']; ?>"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <input name="txt_descricao" type="text" class="form-control" placeholder="Insira a descrição..." value="<?php echo $dados['new_descricao']; ?>"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <div class="input-group input-group-merge">
                                    <input name="txt_autor" type="text" class="form-control" placeholder="Insira o autor..." value="<?php echo $dados['new_autor']; ?>"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data de Cadastro</label>
                                <div class="input-group input-group-merge">
                                    <input name="data_publicacao" type="date" class="form-control" value="<?php echo $dados['new_data_publicacao']; ?>"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Status </label>
                                <select name="txt_status" name="sexo" class="form-select">
                                  <option value="A" <?php if($dados['new_status'] == "A") { echo "selected";} ?>> Ativo</option>
                                  <option value="I" <?php if($dados['new_status'] == "I") { echo "selected";} ?>> Inativo</option>
                                </select>
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


<form name="frm_news" id="frm_news" action="atualizar_news.php" method="post">
<div id="principal">
  <h1> Atualizar News </h1>
    <label> Código </label>
    <input name="txt_codigo" type="text" class="input_01" value="<?php echo $dados['new_codigo']; ?>">
    
    <label> Título </label>
    <input name="txt_titulo" type="text" class="input_01" value="<?php echo $dados['new_titulo']; ?>">
    
    <label> Descrição </label>
    <input name="txt_descricao" type="text" class="input_01" value="<?php echo $dados['new_descricao']; ?>">
    
    <label> Autor </label>
    <input name="txt_autor" type="text" class="input_01" value="<?php echo $dados['new_autor']; ?>">

    <label> Data de Publicação </label>
    <input name="data_publicacao" type="date" class="input_01" value="<?php echo $dados['new_data_publicacao']; ?>">


    <label> Status </label>
    <select name="txt_status" class="select_01">
    <option value="A" <?php if($dados['new_status'] == "A") { echo "selected";} ?>> Ativo</option>
    <option value="I" <?php if($dados['new_status'] == "I") { echo "selected";} ?>> Inativo</option>
    </select>
    
    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
