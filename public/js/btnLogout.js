const btnLogout = document.getElementById("btnLogout");
btnLogout.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "/app/Controllers/AuthController.php?logout=yes");
  xhr.onload = function () {
    location.href = "/public/index.php";
  };
  xhr.send();
});
