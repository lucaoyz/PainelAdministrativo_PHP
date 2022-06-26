
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Cadastro</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Cadastro de Cliente</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Cliente</label>
                                <select class="form-select">
                                    <option value="" disabled selected> Selecione...</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo de Pagamento</label>
                                <select class="form-select">
                                    <option value="" disabled selected> Selecione...</option>
                                    <option value="1">PIX</option>
                                    <option value="2">Cartão de Débito</option>
                                    <option value="3">Cartão de Crédito</option>
                                    <option value="4">Dinheiro</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>
</div>

<!-- <?php while ($dados = mysqli_fetch_array($sql)) { ?>
    <option value="<?php echo $dados['cli_codigo']; ?>"> <?php echo $dados['cli_nome']; ?> </option>
<?php } ?> -->