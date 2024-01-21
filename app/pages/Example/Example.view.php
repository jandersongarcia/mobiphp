<?= $mobi->components(['navbar', 'titlebar']) ?>

<div class="container mt-5">
    <h2 class="mb-4">Todo List</h2>
    <div class="row">
        <div class="col-6">
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
                    <label for="taskDescription" class="form-label">Descrição da Tarefa</label>
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
        <div class="col-6">
            <ul class="list-group">
                
            </ul>
        </div>
    </div>
</div>
<script>alert('ok');</script>