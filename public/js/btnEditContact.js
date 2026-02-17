const btnEditContact = document.getElementById("editContact");

const inputs = document.querySelectorAll(".form-control-plaintext");

btnEditContact.addEventListener("click", () => {
  inputs.forEach((item) => {
    item.removeAttribute("readonly");
  });
});
