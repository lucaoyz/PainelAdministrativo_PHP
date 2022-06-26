
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Consulta</h4>
        <div class="card">
            <h5 class="card-header">Consulta de Clientes</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data Nascimento</th>
                            <th>Email</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td><strong>João Carlos</strong></td>
                            <td><span class="badge bg-label-primary me-1">25/10/1995</span></td>
                            <td>joaocarlos@gmail.com</td>
                            <td>Masculino</td>
                            <td>
                                <?php include('../components/delete_edit.php') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>