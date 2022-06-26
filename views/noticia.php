
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Cadastro</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Cadastro de Notícias</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" class="form-control" placeholder="Insira o título..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <input type="text" class="form-control" placeholder="Insira a descrição..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" placeholder="Insira o autor..." />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data de Cadastro</label>
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Status </label>
                                <select name="sexo" class="form-select">
                                    <option value="" disabled selected> Selecione...</option>
                                    <option value="A">Ativo</option>
                                    <option value="I">Inativo</option>
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