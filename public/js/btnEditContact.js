const btnEditContact = document.getElementById("editContact");
const btnDeleteContact = document.getElementById("deleteContact");
const inputs = document.querySelectorAll(".form-control-plaintext");

// construindo botao Salvar Alterações
const btnConcluiEdicao = document.createElement("button");
const contentBtnConclui = document.createTextNode("Salvar Alterações");
btnConcluiEdicao.appendChild(contentBtnConclui);
btnConcluiEdicao.classList.add("btn", "btn-success", "col-auto", "mx-1");

// construindo botao Cancelar Alterações
const btnCancelarEdicao = document.createElement("button");
const contentBtnCancelarEdicao = document.createTextNode("Cancelar Alterações");
btnCancelarEdicao.appendChild(contentBtnCancelarEdicao);
btnCancelarEdicao.classList.add("btn", "btn-danger", "col-auto", "mx-1");
btnCancelarEdicao.setAttribute("id", "btnCancelar")

const divBtnsTable = document.getElementById("btnsTable");




function habilitaCampos() {
  inputs.forEach((item) => {
    item.removeAttribute("readonly");
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
  });

  // removendo botões de concluir alteração e cancelar alteração 
  btnConcluiEdicao.remove();
  btnCancelarEdicao.remove();

  // exibindo botão de editar contato e de excluir contato 
  btnEditContact.classList.remove("d-none");
  btnDeleteContact.classList.remove("d-none");
}

btnCancelarEdicao.addEventListener('click', cancelandoAlteracoes);