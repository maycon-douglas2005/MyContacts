const btnLogout = document.getElementById("btnLogout");
btnLogout.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "../../Controllers/AuthController.php?logout=yes");
  xhr.onload = function () {
    location.href = "../auth/login.php";
  };
  xhr.send();
});
