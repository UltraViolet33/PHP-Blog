const togglePasswordInput = document.querySelector("#toggle-password");

togglePasswordInput.addEventListener("click", function () {
  toggleViewPassword();
});

function toggleViewPassword() {
  const inputPassword = document.querySelector("#password");
  if (inputPassword.type === "password") {
    inputPassword.type = "text";
  } else {
    inputPassword.type = "password";
  }
}
