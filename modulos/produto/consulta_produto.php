<?PHP
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_desc   = isset($_REQUEST['txt_cons_desc']) ? $_REQUEST['txt_cons_desc'] : '';

$sql = "select *, date_format(pro_data_cadastro,'%d/%m/%Y') as data 
        from tb_produto
        where pro_codigo like '%".$cons_codigo."%' AND
              pro_descricao like '%".$cons_desc."%'
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

    <title>Consulta Produto</title>

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
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Consulta</h4>
            <div class="card">
                <h5 class="card-header">Consulta de Produtos</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <form name="frm_consulta" action="consulta_cliente.php" method="post">
                      <input style="margin-left: 20px;" name="txt_cons_codigo" type="text" placeholder="código">
                      <input style="margin-left: 20px;" name="txt_cons_nome" type="text" placeholder="nome">
                      <input style="margin-left: 20px;" class="btn" name="btn_consultar" type="submit" value="Buscar">
                    </form><br>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Qtde</th>
                            <th>Preço</th>
                            <th>foto</th>
                            <th>Status</th>
                            <th>Fornecedor</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php while ($dados = mysqli_fetch_array($sql)) { ?>    
                          <tr>
                            <td><?php echo $dados['pro_codigo']; ?></td>
                            <td><strong><?php echo $dados['pro_descricao']; ?></strong></td>
                            <td><?php echo $dados['pro_qtde']; ?></td>
                            <td><?php echo $dados['pro_preco']; ?></td>
                            <td><a href="<?php echo $dados['pro_foto']; ?>" target="_blank"> <?php echo $dados['pro_foto']; ?></td>
                            <td><span class="badge bg-label-primary me-1"><?php echo $dados['pro_status']; ?></span></td>
                            <td><?php echo $dados['for_codigo']; ?></td>
                            
                            <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="form_atualizar_produto.php?pro_codigo=<?php echo $dados['pro_codigo']; ?>"
                                      ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                    >
                                    <a class="dropdown-item" href="delete_produto.php?pro_codigo=<?php echo $dados['pro_codigo']; ?>" onclick="excluir_registro(event)"
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
            <div class="content-backdrop fade"></div>
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

    
  

