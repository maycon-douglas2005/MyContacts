const btnDelete = document.getElementById("deleteContact");
const table = document.getElementById("tableBody");
const rowsTable = table.querySelectorAll("tr");

function showCheckboxes() {
  rowsTable.forEach((item) => {
    const checkbox = document.createElement("input");
    checkbox.setAttribute("type", "checkbox");
    checkbox.setAttribute("name", "contatoSelecionado");
    checkbox.setAttribute("class", "checkbox");
    checkbox.classList.add("form-check-input", "mt-3", "checkbox", "me-5");

    item.append(checkbox);
  });

  // Criando Cabeçalho Check na tabela
  const headCheck = document.createElement("th");
  headCheck.innerText = "Selecionar";
  headCheck.setAttribute("id", "checkDel");

  const headCel = document.getElementById("cabecalhoCelular");
  headCel.after(headCheck);
  headCel.style.marginRight = "0";
  headCel.style.marginLeft = "150px";
}

function create_btns_confirm_and_cancel() {
  const btnsTables = document.getElementById("btnsTable");

  // criando e inserindo btn Confirmar Exclusao
  const btnConfirm = document.createElement("button");
  btnConfirm.innerText = "Excluir";
  btnConfirm.setAttribute("id", "btnConfirmExclusion");
  btnConfirm.classList.add("btn", "btn-danger", "align-self-center", "d-flex");
  btnsTables.append(btnConfirm);

  // criando e inserindo btn Cancelar Exclusão
  const btnCancel = document.createElement("button");
  btnCancel.innerText = "Cancelar";
  btnCancel.classList.add(
    "btn",
    "btn-secondary",
    "ms-2",
    "align-self-center",
    "d-flex",
  );
  btnCancel.setAttribute("id", "btnCancelExclusion");
  btnsTables.append(btnCancel);
}

function hide_btns_add_remove_edit() {
  // escondendo outros botoes
  document.getElementById("addContact").style.display = "none";
  document.getElementById("editContact").style.display = "none";
  document.getElementById("deleteContact").style.display = "none";
}

btnDelete.addEventListener("click", () => {
  showCheckboxes();
  create_btns_confirm_and_cancel();
  hide_btns_add_remove_edit();
});

function CancelExclusion() {
  document.getElementById("btnConfirmExclusion").remove();
  document.getElementById("btnCancelExclusion").remove();

  document.querySelectorAll(".checkbox").forEach((item) => item.remove());

  document.getElementById("addContact").style.display = "flex";
  document.getElementById("editContact").style.display = "flex";
  document.getElementById("deleteContact").style.display = "flex";

  document.getElementById("checkDel").remove();

  document.getElementById("cabecalhoCelular").style.marginRight = "80px";
  document.getElementById("cabecalhoCelular").style.marginLeft = "0px";
}

document.getElementById("btnsTable").addEventListener("click", (btn) => {
  if (btn.target.id === "btnCancelExclusion") {
    CancelExclusion();
  }
});

// LÓGICA PARA EFETUAR A EXCLUSÃO
function deletarContato() {
  let contatosSelecionados = [];
  rowsTable.forEach((linha) => {
    if (linha.querySelector(".checkbox").checked) {
      contatosSelecionados.push(linha.querySelector(".campo_email").value);
    }
  });

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../../Controllers/ContatoController.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      window.location.href =
        "../contacts/listaDeContatos.php?contatosDeletados=true";
    } else {
      window.location.href =
        "../contacts/listaDeContatos.php?contatosNaoDeletados=true";
    }
  };
  xhr.send(
    "contatosSelecionados=" +
      encodeURIComponent(JSON.stringify(contatosSelecionados)),
  );
}

document.getElementById("btnsTable").addEventListener("click", (btn) => {
  if (btn.target.id === "btnConfirmExclusion") {
    deletarContato();
  }
});
