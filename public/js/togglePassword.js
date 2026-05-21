const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirmPassword");

const togglePassword = document.getElementById("togglePassword");
const toggleConfirmPassword = document.getElementById("togglePasswordConfirm");

const passwordIcon = document.getElementById("passwordIcon");
const confirmPasswordIcon = document.getElementById("confirmPasswordIcon");

togglePassword.addEventListener("click", () => {
  const isPassword = passwordInput.type === "password";

  passwordInput.type = isPassword ? "text" : "password";

  passwordIcon.classList.toggle("bi-eye");
  passwordIcon.classList.toggle("bi-eye-slash");
});

toggleConfirmPassword.addEventListener("click", () => {
  const isConfirmPassword = confirmPasswordInput.type === "password";

  confirmPasswordInput.type = isConfirmPassword ? "text" : "password";

  confirmPasswordIcon.classList.toggle("bi-eye");
  confirmPasswordIcon.classList.toggle("bi-eye-slash");
});
