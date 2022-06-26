<?PHP
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';

$sql = "select v.ven_codigo, c.cli_nome, v.ven_tipo_pagamento, date_format(v.ven_data,'%d/%m/%Y') as data 
        from tb_venda v
        inner join TB_cliente c on (v.cli_codigo = c.cli_codigo)
        where v.ven_codigo like '%".$cons_codigo."%'
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

    <title>Consulta Fornecedor</title>

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
                <h5 class="card-header">Consulta de Fornecedor</h5>
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
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Autor</th>
                            <th>Data Cadastro</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php while ($dados = mysqli_fetch_array($sql)) { ?>    
                        <tr>
                            <td><?php echo $dados['new_codigo']; ?></td>
                            <td><strong><?php echo $dados['new_titulo']; ?></strong></td>
                            <td><?php echo $dados['new_descricao']; ?></td>
                            <td><?php echo $dados['new_autor']; ?></td>
                            <td><span class="badge bg-label-primary me-1"><?php echo $dados['data']; ?></span></td>
                            <td><?php echo $dados['new_status']; ?></td>
                                <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="form_atualizar_news.php?new_codigo=<?php echo $dados['new_codigo']; ?>"
                                      ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                    >
                                    <a class="dropdown-item" href="delete_news.php?new_codigo=<?php echo $dados['new_codigo']; ?>" onclick="excluir_registro(event)"
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

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_02"> <strong> Cliente </strong></div>
    <div class="coluna_03"> <strong> Tipo de pagamento </strong></div>
    <div class="coluna_01"> <strong> Data </strong></div>

  </div>
      
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['ven_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['cli_nome']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['ven_tipo_pagamento']; ?> </div>
    <div class="coluna_01"> <?php echo $dados['data']; ?> </div>
    

    <div class="coluna_01">
      <a href="delete_venda.php?ven_codigo=<?php echo $dados['ven_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_venda.php?ven_codigo=<?php echo $dados['ven_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>
</div>
</body>
</html>

