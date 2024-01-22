let todoId = '';

function load() {
    const url = '/ctrl/tasks';
    const form = document.getElementById('myForm');
    const title = document.getElementById('title');
    const scrollingDiv = document.getElementById('list');

    fetch(`${url}?action=loadAll`)
        .then(response => response.json())
        .then(data => data.forEach(task => addTask(task.id, task.title, task.description, task.file_path, task.check)))
        .catch(error => console.error('Erro na requisição:', error));

    // Adicionar evento de envio de formulário
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

                // Rolagem para o fim da página
                scrollingDiv.scrollTo({
                    top: scrollingDiv.scrollHeight,
                    behavior: 'smooth'
                });
            })
            .catch(error => console.log(error));
    });

    title.addEventListener('blur',()=>{
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
            <p class="mb-1">${description}</p>
        </div>
        <div id="act${id}" class="d-flex justify-content-end ${actions}">
        <div class="btn-group justify-content-end" role="group" aria-label="Ações">
            <button type="button" class="btn btn-outline-primary" data-edit-id="${id}">
                <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary ${images}">
                <i class="bi bi-paperclip"></i>
            </button>
            <button type="button" class="btn btn-outline-danger" data-trash-id="${id}">
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

function check(value){
    let title = document.getElementById(`title${value}`)
    document.getElementById('lblCheck').innerHTML = title.innerHTML;
    todoId = value;
    // Abre a modal
    var ckModal = new bootstrap.Modal(document.getElementById('checkModal'));
    ckModal.show();
}

function checkConfirm(){
    document.getElementById(`act${todoId}`).classList.add('d-none')
    document.getElementById(`task${todoId}`).classList.add('text-decoration-line-through','text-secondary')
    var ckModal = new bootstrap.Modal(document.getElementById('checkModal'));
    ckModal.hide();
}

// Carregar tarefas ao carregar a página
load();
