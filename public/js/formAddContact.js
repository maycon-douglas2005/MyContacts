let btnAddContact = document.getElementById('addContact');

function criarFormAddContato() {

    /* CRIANDO DIVS BASES PARA O SISTEMA MODAL */
    const divModal = document.createElement("div");
    divModal.classList.add("modal", "d-block");
    divModal.setAttribute("tabindex", "1");

    const divModalDialog = document.createElement("div");
    divModalDialog.classList.add("modal-dialog");

    divModal.append(divModalDialog);



    const form = document.createElement("form");
    form.classList.add("d-flex", "col-auto", "modal-content", "flex-column", "align-items-center", "border", "rounded", "border-secondary"); form.setAttribute("action", "../../Controllers/ContatoController.php"); form.setAttribute("method", "post");

    divModalDialog.append(form);


    /* FINALIZANDO CRIAÇÃO DE DIVS MODAIS E INICIANDO CRIAÇÃO DE ELEMENTOS DO MODAL-HEADER */
    const divModalHeader = document.createElement("div");
    divModalHeader.classList.add("modal-header");


    const h3 = document.createElement("h3");
    const conteudoH3 = document.createTextNode("Adicionando Contato");
    h3.appendChild(conteudoH3);


    const p = document.createElement("p");
    const conteudoP = document.createTextNode("Insira os dados do contato que deseja adicionar:");

    p.appendChild(conteudoP);


    const divTituloModal = document.createElement("div");
    divTituloModal.classList.add("d-flex", "flex-column", "modal-title")
    divTituloModal.append(h3, p)


    const btnCloseModal = document.createElement("button"); btnCloseModal.classList.add("btn-close", "ms-5"); btnCloseModal.type = "button"; btnCloseModal.setAttribute("data-bs-dismiss", "modal"); btnCloseModal.addEventListener('click', () => divModal.remove());

    divModalHeader.append(divTituloModal, btnCloseModal);


    /* FINAL DE MODAL-HEADER E INICIO DO MODAL-BODY */
    const divModalBody = document.createElement("div");
    divModalBody.classList.add("modal-body")

    const inputNome = document.createElement("input"); inputNome.classList.add("mb-1", "form-control"); inputNome.placeholder = "Nome";inputNome.type = "name";inputNome.name = "nome";


    const inputEmail = document.createElement("input"); inputEmail.classList.add("mb-1", "form-control"); inputEmail.placeholder = "Email";inputEmail.type = "email";inputEmail.name = "email";


    const inputCelular = document.createElement("input"); inputCelular.classList.add("mb-2", "form-control"); inputCelular.placeholder = "Celular";inputCelular.type = "tel"; inputCelular.name = "celular";



    divModalBody.append(inputNome, inputEmail, inputCelular);


    /* FINAL DE MODAL-BODY E INICIO DO MODAL-FOOTER */
    const divModalFooter = document.createElement("div");
    divModalFooter.classList.add("modal-footer");

    const btnFormAdicionarContato = document.createElement("button");
    btnFormAdicionarContato.classList.add("btn", "btn-success", "mb-2");
    const contentBtnForm = document.createTextNode("Adicionar");
    btnFormAdicionarContato.appendChild(contentBtnForm);
    divModalFooter.append(btnFormAdicionarContato);

    form.append(divModalHeader, divModalBody, divModalFooter);

    const table = document.querySelector("table");
    table.parentNode.insertBefore(divModal, table);

}

btnAddContact.addEventListener('click', () => {
    criarFormAddContato();
})

