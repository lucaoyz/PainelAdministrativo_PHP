<?PHP
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_nome   = isset($_REQUEST['txt_cons_nome']) ? $_REQUEST['txt_cons_nome'] : '';
$cons_login  = isset($_REQUEST['txt_cons_login']) ? $_REQUEST['txt_cons_login'] : '';

$sql = "select *, date_format(log_data_cadastro,'%d/%m/%Y') as data 
        from tb_login
        where log_codigo like '%".$cons_codigo."%' AND
              log_nome like '%".$cons_nome."%' AND
              log_login like '%".$cons_login."%'   
       ";


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

    <title>Consulta login</title>

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
    
	<script type="text/javascript">
    
        function excluir_registro( ) {
            if( !confirm('Deseja realmente excluir este registro?') 
        ){
            if( window.event)
                window.event.returnValue=false;
            else
                e.preventDefault();
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
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Formularios/Consulta/</span> Login</h4>

          <div class="card">
                <h5 class="card-header">Consulta Login</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                  <form name="frm_consulta" action="consulta_login.php" method="post">
                    <input style="margin-left: 20px;" name="txt_cons_codigo" type="text" placeholder="código">
                    <input style="margin-left: 20px;" name="txt_cons_nome" type="text" placeholder="nome">
                    <input style="margin-left: 20px;" name="txt_cons_login" type="text" placeholder="login">
                    <input style="margin-left: 20px;" class="btn" name="btn_consultar" type="submit" value="Buscar">
                  </form><br>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Data Cadastro</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    <?php while ($dados = mysqli_fetch_array($sql)) { ?>

                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $dados['log_codigo']; ?></strong></td>
                        <td><?php echo $dados['log_nome']; ?></td>
                        <td><?php echo $dados['log_login']; ?></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $dados['data']; ?></span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="form_atualizar_login.php?log_codigo=<?php echo $dados['log_codigo']; ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Editar</a
                              >
                              <a class="dropdown-item" href="delete_login.php?log_codigo=<?php echo $dados['log_codigo']; ?>" onclick="excluir_registro(event)"
                                ><i class="bx bx-trash me-1"></i> Excluir</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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

