const password = document.getElementById("password");

const confirmPassword = document.getElementById("confirmPassword");

const passwordError = document.getElementById("passwordError");

function validatePasswords() {
  const passwordsAreDifferent = password.value !== confirmPassword.value;

  const confirmFieldIsNotEmpty = confirmPassword.value !== "";

  if (passwordsAreDifferent && confirmFieldIsNotEmpty) {
    passwordError.classList.remove("d-none");

    confirmPassword.classList.add("is-invalid");
    confirmPassword.style.backgroundImage = "none";
  } else {
    passwordError.classList.add("d-none");

    confirmPassword.classList.remove("is-invalid");
  }
}

password.addEventListener("input", validatePasswords);

confirmPassword.addEventListener("input", validatePasswords);
