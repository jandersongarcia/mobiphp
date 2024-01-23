var todoId = '';

function load() {
    const url = '/ctrl/tasks';
    const form = document.getElementById('myForm');
    const title = document.getElementById('title');
    const scrollingDiv = document.getElementById('list');

    fetch(`${url}?action=loadAll`)
        .then(response => response.json())
        .then(data => data.forEach(task => addTask(task.id, task.title, task.description, task.file_path, task.concluded)))
        .catch(error => console.error('Erro na requisição:', error));

    // Adicionar evento de envio de formulário
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const url = '/ctrl/tasks';

        fetch(url, { method: 'POST', body: formData })
            .then(response => response.json())
            .then(responseObject => {


                let id = document.getElementById('id').value;
                // Certifique-se de que os elementos existem
                const titleElement = document.getElementById('title');
                const descriptionElement = document.getElementById('description');
                const titleIdElement = document.getElementById(`title${id}`);
                const descriptionIdElement = document.getElementById(`description${id}`);

                console.log(responseObject['id']);

                if (!responseObject['id']) {
                    titleIdElement.innerHTML = titleElement.value;
                    descriptionIdElement.innerHTML = descriptionElement.value;
                } else {
                    addTask(responseObject['id'],titleElement.value,descriptionElement.value)
                }

                // Limpar campos do formulário
                document.getElementById('id').value = "";
                document.getElementById('title').value = "";
                document.getElementById('description').value = "";
                document.getElementById('title').focus();

                // Rolagem para o fim da página
                scrollingDiv.scrollTo({
                    top: scrollingDiv.scrollHeight,
                    behavior: 'smooth'
                });
            })
            .catch(error => console.log(error));
    });

    title.addEventListener('blur', () => {
        title.value = title.value.trim();
    })

}

// Função para adicionar tarefa à lista
function addTask(id, title, description, image = '', status = '') {
    const newTaskItem = document.createElement('li');

    let actions = (status == 1) ? 'd-none' : '';
    let texts = (status == 1) ? 'class="text-decoration-line-through text-secondary"' : '';
    let images = (image === null) ? 'd-none' : '';

    newTaskItem.className = 'list-group-item';

    newTaskItem.innerHTML = `
    <div id="task${id}" ${texts}>
        <div>
            <h5 class="mb-1" id="title${id}">${title}</h5>
            <p class="mb-1" id="description${id}">${description}</p>
        </div>
        <div id="act${id}" class="d-flex justify-content-end ${actions}">
        <div class="btn-group justify-content-end" role="group" aria-label="Ações">
            <button type="button" class="btn btn-outline-primary" onclick="edit(${id})">
                <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary ${images}">
                <i class="bi bi-paperclip"></i>
            </button>
            <button type="button" class="btn btn-outline-danger" onclick="del(${id})">
                <i class="bi bi-trash"></i>
            </button>
            <button type="button" class="btn btn-outline-success" onclick="check(${id})">
                <i class="bi bi-check"></i>
            </button>
        </div>
        </div>
    </div>
`;

    document.querySelector('.list-group').appendChild(newTaskItem);

}

function check(value) {
    let title = document.getElementById(`title${value}`)
    document.getElementById('lblCheck').innerHTML = title.innerHTML;
    todoId = value;
    // Abre a modal
    var ckModal = new bootstrap.Modal(document.getElementById('checkModal'));
    ckModal.show();
}

function checkConfirm() {

    const url = '/ctrl/tasks';
    fetch(`${url}?action=check&id=${todoId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById(`act${todoId}`).classList.add('d-none')
            document.getElementById(`task${todoId}`).classList.add('text-decoration-line-through', 'text-secondary')
        })
        .catch(error => console.error('Erro na requisição:', error));

}

function del(value) {
    let title = document.getElementById(`title${value}`)
    document.getElementById('lblDel').innerHTML = title.innerHTML;
    todoId = value;
    // Abre a modal
    var ckModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    ckModal.show();
}

function delConfirm() {

    const url = '/ctrl/tasks';
    fetch(`${url}?action=delete&id=${todoId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById(`task${todoId}`).classList.add('d-none')
        })
        .catch(error => console.error('Erro na requisição:', error));

}

function edit(value) {
    const url = '/ctrl/tasks';
    fetch(`${url}?action=edit&id=${value}`)
        .then(response => response.json())
        .then(data => {
            if (data) {
                document.getElementById('id').value = data.id;
                document.getElementById('title').value = data.title;
                document.getElementById('description').value = data.description;
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

// Carregar tarefas ao carregar a página
load();
