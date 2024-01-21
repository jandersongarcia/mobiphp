// Função para carregar tarefas ao carregar a página
function load() {
    const url = '/ctrl/tasks';
    fetch(`${url}?action=loadAll`)
        .then(response => response.json())
        .then(data => data.forEach(task => addTask(task.id, task.title, task.description)))
        .catch(error => console.error('Erro na requisição:', error));

    // Adicionar evento de envio de formulário
    const form = document.getElementById('myForm');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const url = '/ctrl/tasks';

        fetch(url, { method: 'POST', body: formData })
            .then(response => response.json())
            .then(responseObject => {
                let { id } = responseObject;
                let title = formData.get('title');
                let description = formData.get('description');
                addTask(id, title, description);

                // Limpar campos do formulário
                document.getElementById('title').value = "";
                document.getElementById('description').value = "";
                document.getElementById('title').focus();
            })
            .catch(error => console.log(error));
    });
}

// Função para adicionar tarefa à lista
function addTask(id, title, description) {
    const newTaskItem = document.createElement('li');
    newTaskItem.className = 'list-group-item';

    newTaskItem.innerHTML = `
    <div>
        <div>
            <h5 class="mb-1">${title}</h5>
            <p class="mb-1">${description}</p>
        </div>
        <div class="d-flex justify-content-end">
        <div class="btn-group justify-content-end" role="group" aria-label="Ações">
            <button type="button" class="btn btn-outline-primary" data-id="${id}">
                <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
                <i class="bi bi-paperclip"></i>
            </button>
            <button type="button" class="btn btn-outline-danger" data-id="${id}">
                <i class="bi bi-trash"></i>
            </button>
            <button type="button" class="btn btn-outline-success" data-id="${id}">
                <i class="bi bi-check"></i>
            </button>
        </div>
        </div>
    </div>
`;

    document.querySelector('.list-group').appendChild(newTaskItem);
}

// Carregar tarefas ao carregar a página
load();
