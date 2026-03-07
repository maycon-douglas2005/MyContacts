const btnDelete = document.getElementById("deleteContact");
const table = document.getElementById("tableBody");
const rowsTable = table.querySelectorAll("tr");

function showCheckboxes() {
  rowsTable.forEach((item) => {
    const checkbox = document.createElement("input");
    checkbox.setAttribute("type", "checkbox");
    checkbox.classList.add("form-check-input", "mt-3", "checkbox");
    item.append(checkbox);
  });
}

function create_btns_confirm_and_cancel() {
  const btnsTables = document.getElementById("btnsTable");

  // criando e inserindo btn Confirmar Exclusao
  const btnConfirm = document.createElement("button");
  btnConfirm.innerText = "Confirmar Exclusão";
  btnConfirm.setAttribute("id", "btnConfirmExclusion");
  btnConfirm.classList.add("btn", "btn-danger", "align-self-center", "d-flex");
  btnsTables.append(btnConfirm);

  // criando e inserindo btn Cancelar Exclusão
  const btnCancel = document.createElement("button");
  btnCancel.innerText = "Cancelar Exclusão";
  btnCancel.classList.add(
    "btn",
    "btn-success",
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
}

document.getElementById("btnsTable").addEventListener("click", (btn) => {
  if (btn.target.id === "btnCancelExclusion") {
    CancelExclusion();
  }
});
