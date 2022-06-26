
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
                            <th>Item</th>
                            <th>Valor Unitário</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td><strong>Bola de Futebol</strong></td>
                            <td>119,99</td>
                            
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


    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Venda</th>
                            <th>Produto Descrição</th>
                            <th>Valor Unitário</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php while ($dados = mysqli_fetch_array($sql)) { ?>
                        <tr>
                            <td><?php echo $dados['ite_codigo']; ?>  </td>
                            <td><?php echo $dados['ven_codigo']; ?>  </td>
                            <td> <?php echo $dados['pro_descricao']; ?> </td>
                            <td> <?php echo $dados['ite_valor_unit']; ?> </td>
                            <td> <?php echo $dados['ite_qtde']; ?> </td>
                            <td> <?php echo $dados['ite_total']; ?> </td>
                            <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="form_atualizar_item_venda.php?ite_codigo=<?php echo $dados['ite_codigo']; ?>"
                                      ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                    >
                                    <a class="dropdown-item" href="delete_item_venda.php?ite_codigo=<?php echo $dados['ite_codigo']; ?>" onclick="excluir_registro(event)"
                                      ><i class="bx bx-trash me-1"></i> Excluir</a
                                    >
                                  </div>
                                </div>
                              </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>