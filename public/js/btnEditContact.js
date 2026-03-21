const btnEditContact = document.getElementById("editContact");
const btnDeleteContact = document.getElementById("deleteContact");
const inputs = document.querySelectorAll(".form-control-plaintext");

// construindo botao Salvar Alterações
const btnConcluiEdicao = document.createElement("button");
const contentBtnConclui = document.createTextNode("Salvar Alterações");
btnConcluiEdicao.appendChild(contentBtnConclui);
btnConcluiEdicao.classList.add(
  "btn",
  "btn-success",
  "col-auto",
  "mx-1",
  "align-self-center",
);
btnConcluiEdicao.setAttribute("id", "save");

// construindo botao Cancelar Alterações
const btnCancelarEdicao = document.createElement("button");
const contentBtnCancelarEdicao = document.createTextNode("Cancelar Alterações");
btnCancelarEdicao.appendChild(contentBtnCancelarEdicao);
btnCancelarEdicao.classList.add(
  "btn",
  "btn-danger",
  "col-auto",
  "mx-1",
  "align-self-center",
);
btnCancelarEdicao.setAttribute("id", "btnCancelar");

const divBtnsTable = document.getElementById("btnsTable");

function habilitaCampos() {
  inputs.forEach((item) => {
    item.removeAttribute("readonly");
    if (item.classList.contains("campo_email")) {
      item.setAttribute("data-toggle", "tooltip");
      item.setAttribute("data-placement", "bottom");
      item.setAttribute("title", "Formato Aceito: nome@domínio.com");
    }
    if (item.classList.contains("campo_celular")) {
      item.setAttribute("data-toggle", "tooltip");
      item.setAttribute("data-placement", "bottom");
      item.setAttribute(
        "title",
        "Formatos Aceitos: (11) 91234-5678 ou 11912345678",
      );
    }
  });
}

function addBtnsConcluirEcancelarEdicao() {
  divBtnsTable.append(btnConcluiEdicao, btnCancelarEdicao);
}

function escondeBtnsEditarExcluir() {
  btnEditContact.classList.add("d-none");
  btnDeleteContact.classList.add("d-none");
}

btnEditContact.addEventListener("click", () => {
  habilitaCampos();
  addBtnsConcluirEcancelarEdicao();
  escondeBtnsEditarExcluir();
});

function cancelandoAlteracoes() {
  // desabilitando campos
  inputs.forEach((item) => {
    item.readOnly = true;
    if (item.classList.contains("campo_email")) {
      item.removeAttribute("data-toggle");
      item.removeAttribute("data-placement");
      item.removeAttribute("title");
    }
    if (item.classList.contains("campo_celular")) {
      item.removeAttribute("data-toggle");
      item.removeAttribute("data-placement");
      item.removeAttribute("title");
    }
  });

  // removendo botões de concluir alteração e cancelar alteração
  btnConcluiEdicao.remove();
  btnCancelarEdicao.remove();

  // exibindo botão de editar contato e de excluir contato
  btnEditContact.classList.remove("d-none");
  btnDeleteContact.classList.remove("d-none");
  window.location.href = "listaDeContatos.php";
}

btnCancelarEdicao.addEventListener("click", cancelandoAlteracoes);
