<?= $mobi->components(['navbar', 'titlebar']) ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h2 class="mb-4">Todo List</h2>
            <form id="myForm">
                <div class="mb-3">
                    <label for="title" class="form-label">Título da Tarefa</label>
                    <div class="row">
                        <div class="col-2"><input type="text" class="form-control" id="id" name="id" readonly></div>
                        <div class="col-10"><input type="text" class="form-control col-8" id="title" name="title"
                                placeholder="Digite o título da tarefa" required></div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição da Tarefa</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Digite a descrição da tarefa"></textarea>
                </div>

                <div class="mb-3">
                    <label for="taskFile" class="form-label">Anexar Imagem ou PDF</label>
                    <input type="file" class="form-control" id="taskFile" name="file_path">
                </div>

                <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
            </form>
        </div>
        <div id="list" class="col-6 overflow-auto border rounded p-3">
            <ul class="list-group">

            </ul>
        </div>
    </div>
</div>

<!-- Modal de confirmação -->
<div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="checkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkModalLabel">Tarefa Concluída</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Deseja confirmar a tarefa <span id="lblCheck" class="fw-medium text-primary"></span> como realizada?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"m onclick="checkConfirm()">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de confirmação -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Tarefa Concluída</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Deseja confirmar a exclusão da tarefa <span id="lblDel" class="fw-medium text-danger"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="delConfirm()">Excluir</button>
      </div>
    </div>
  </div>
</div>