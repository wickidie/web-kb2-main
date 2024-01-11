document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".needs-validation");
  const userIdInput = document.getElementById("user_input");
  const passwordInput = document.getElementById("password_input");
  const confirmPasswordInput = document.getElementById("confirm_password");

  function checkUserId() {
    const userId = userIdInput.value;

    if (!userId || userId.trim() === "") {
      userIdInput.setCustomValidity("Please enter a valid User ID.");
    } else {
      userIdInput.setCustomValidity("");
    }

    form.classList.add("was-validated");
  }

  function checkPassword() {
    const password = passwordInput.value;

    if (password.length < 5) {
      passwordInput.setCustomValidity("Password must be at least 5 characters.");
    } else {
      passwordInput.setCustomValidity("");
    }

    form.classList.add("was-validated");
  }

  function checkPasswordMatch() {
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    if (password != confirmPassword) {
      confirmPasswordInput.setCustomValidity("Passwords do not match.");
    } else {
      confirmPasswordInput.setCustomValidity("");
    }

    form.classList.add("was-validated");
  }

  // Add event listeners for input event on password fields
  userIdInput.addEventListener("input", checkUserId);
  passwordInput.addEventListener("input", checkPassword);
  passwordInput.addEventListener("input", checkPasswordMatch);
  confirmPasswordInput.addEventListener("input", checkPasswordMatch);

  form.addEventListener("submit", function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    checkUserId();
    checkPassword(); // Check password before form submission
    checkPasswordMatch(); // Check password match before form submission
  });
});

// document.addEventListener("DOMContentLoaded", function () {
//   const form = document.querySelector(".needs-validation");
//   const userIdInput = document.getElementById("user_input");
//   const passwordInput = document.getElementById("password_input");

//   function checkUserId() {
//     const userId = userIdInput.value;

//     if (!userId || userId.trim() === "") {
//       userIdInput.setCustomValidity("Please enter a valid User ID.");
//     } else {
//       userIdInput.setCustomValidity("");
//     }

//     form.classList.add("was-validated");
//   }

//   function checkPassword() {
//     const password = passwordInput.value;

//     if (password.length < 5) {
//       passwordInput.setCustomValidity("Password must be at least 5 characters.");
//     } else {
//       passwordInput.setCustomValidity("");
//     }

//     form.classList.add("was-validated");
//   }

//   // Add event listeners for input event on user ID and password fields
//   userIdInput.addEventListener("input", checkUserId);
//   passwordInput.addEventListener("input", checkPassword);

//   form.addEventListener("submit", function (event) {
//     if (!form.checkValidity()) {
//       event.preventDefault();
//       event.stopPropagation();
//     }

//     checkUserId(); // Check User ID before form submission
//     checkPassword(); // Check password before form submission
//   });
// });
