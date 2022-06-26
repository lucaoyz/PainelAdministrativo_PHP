
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Consulta</h4>
        <div class="card">
            <h5 class="card-header">Consulta de Produtos</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Qtde</th>
                            <th>Preço</th>
                            <th>Data Cadastro</th>
                            <th>foto</th>
                            <th>Status</th>
                            <th>Fornecedor</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td><strong>Bola de Futebol</strong></td>
                            <td>100</td>
                            <td>119,99</td>
                            <td><span class="badge bg-label-primary me-1">25/10/1995</span></td>
                            <td>link da foto</td>
                            <td>Ativo</td>
                            <td>Mário</td>
                            
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