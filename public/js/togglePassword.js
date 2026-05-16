const passwordInput = document.getElementById("password");

const togglePassword = document.getElementById("togglePassword");

const passwordIcon = document.getElementById("passwordIcon");

togglePassword.addEventListener("click", () => {
  const isPassword = passwordInput.type === "password";

  passwordInput.type = isPassword ? "text" : "password";

  passwordIcon.classList.toggle("bi-eye");
  passwordIcon.classList.toggle("bi-eye-slash");
});
