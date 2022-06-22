<?php
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$id = $_REQUEST['cli_codigo'];

$sql = "select * from tb_cliente where cli_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);


?>

<?php 
  require_once("../../seguranca.php");
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
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Formularios/Atualizar/</span>Cliente</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Atualizar cliente</h5>
                      <small class="text-muted float-end">Formulário de cliente</small>
                    </div>
                    <div class="card-body">
                      <form name="frm_cliente" id="frm_cliente" action="cadastro_cliente.php" method="post">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Nome completo</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            name="txt_nome"
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              placeholder="Nome completo"
                              aria-label="Nome completo"
                              aria-describedby="basic-icon-default-fullname2"
                              value="<?php echo $dados['cli_codigo']; ?>"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Data de nascimento</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-calendar"></i
                            ></span>
                            <input
                            name="data_nascimento"
                              type="date"
                              id="basic-icon-default-company"
                              class="form-control"
                              aria-describedby="basic-icon-default-company2"
                              value="<?php echo $dados['cli_nome']; ?>"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Email</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-mail-send"></i>
                            </span>
                            <input
                            name="txt_email"
                              type="email"
                              id="basic-icon-default-company"
                              class="form-control"
                              placeholder="Email"
                              aria-label="Email"
                              aria-describedby="basic-icon-default-company2"
                              value="<?php echo $dados['cli_data_nascimento']; ?>"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Sexo</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-female"></i>
                            </span>
                          <select name="txt_sexo" id="" class="form-select">
                          <option value="M" <?php if($dados['cli_sexo'] == "M") { echo "selected";} ?>> Masculino</option>
                          <option value="F" <?php if($dados['cli_sexo'] == "F") { echo "selected";} ?>> Feminino</option>                          </select>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="txt_enviar">Enviar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , feito com ❤️ por
                  <a href="https://instagram.com/lucaoxz" target="_blank" class="footer-link fw-bolder">Lucao</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
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

<body onload="foco()">
<form name="frm_cliente" id="frm_cliente" action="atualizar_cliente.php" method="post">
<div id="principal">
  <h1> Atualizar login </h1>
    <label> Código </label>
    <input name="txt_codigo" type="text" class="input_01" value="<?php echo $dados['cli_codigo']; ?>">
    
    <label> Nome </label>
    <input name="txt_nome" type="text" class="input_01" value="<?php echo $dados['cli_nome']; ?>">
    
    <label> Data de Nascimento </label>
    <input name="data_nascimento" type="date" class="input_01" value="<?php echo $dados['cli_data_nascimento']; ?>">
    
    <label> Email </label>
    <input name="txt_email" type="email" class="input_01" value="<?php echo $dados['cli_email']; ?>">
    
    <label> Sexo </label>
    <select name="txt_sexo" class="select_01">
    <option value="M" <?php if($dados['cli_sexo'] == "M") { echo "selected";} ?>> Masculino</option>
    <option value="F" <?php if($dados['cli_sexo'] == "F") { echo "selected";} ?>> Feminino</option>
    </select>

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>
