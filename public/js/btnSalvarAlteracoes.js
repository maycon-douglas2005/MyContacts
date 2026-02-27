const divPaiBtns = document.getElementById("btnsTable");

const registrosAlterados = [];

const linhas = document.querySelectorAll("tbody  tr");

function salvandoAlteracoes() {
  registrosAlterados.length = 0;
  linhas.forEach((linha) => {
    const nome = linha.querySelector(".campo_nome");
    const email = linha.querySelector(".campo_email");
    const celular = linha.querySelector(".campo_celular");

    const alteracoes = {
      id: nome.dataset.id,
    };

    let houveAlteracao = false;
    if (nome.dataset.original != nome.value) {
      alteracoes.nome = nome.value;
      houveAlteracao = true;
    }
    if (email.dataset.original != email.value) {
      alteracoes.email = email.value;
      houveAlteracao = true;
    }

    if (celular.dataset.original != celular.value) {
      alteracoes.celular = celular.value;
      houveAlteracao = true;
    }

    if (houveAlteracao) {
      registrosAlterados.push(alteracoes);
    }
  });

  fetch("../../Controllers/ContatoController.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      action: "update",
      registros: registrosAlterados,
    }),
  })
    .then((response) => response.text())
    .then((data) => {
      window.location.href = "listaDeContatos.php?alteracaoContato=true";
    })
    .catch((error) => {
      console.error("Erro:", error);
    });
}

divPaiBtns.addEventListener("click", function (e) {
  if (e.target.id === "save") {
    salvandoAlteracoes();
  }
});
