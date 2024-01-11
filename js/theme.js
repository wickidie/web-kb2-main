// document.addEventListener("DOMContentLoaded", function () {
//   const themeToggle = document.getElementById("themeToggle");
//   const htmlElement = document.documentElement;
//   let isDarkMode = localStorage.getItem("darkMode") === "true";

//   htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");
//   // updateIcon();

//   themeToggle.addEventListener("click", function () {
//     isDarkMode = !isDarkMode;
//     console.log("clicked");

//     htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");
//     document.getElementById("themeToggle").checked ? true : false;
//     localStorage.setItem("darkMode", isDarkMode.toString());
//     localStorage.setItem("themeToggle", checked.true);
//     // updateIcon();
//   });

//   // function updateIcon() {
//   //   themeToggle.classList.remove("bi-brightness-high", "bi-moon-stars");
//   //   themeToggle.classList.add(isDarkMode ? "bi-moon-stars" : "bi-brightness-high");
//   //   themeToggle.
//   // }
// });
document.addEventListener("DOMContentLoaded", function () {
  const themeToggle = document.getElementById("themeToggle");
  const htmlElement = document.documentElement;
  let isDarkMode = localStorage.getItem("darkMode") === "true";
  let isThemeToggleChecked = htmlElement.getAttribute("data-bs-theme") === "light";

  // Inisialisasi status tema dan checkbox
  htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");
  themeToggle.checked = isThemeToggleChecked;

  themeToggle.addEventListener("click", function () {
    isDarkMode = !isDarkMode;
    isThemeToggleChecked = themeToggle.checked;

    htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");
    localStorage.setItem("darkMode", isDarkMode.toString());
    localStorage.setItem("themeToggle", isThemeToggleChecked.toString());
  });

  // Cek apakah tema saat ini adalah "light" dan atur properti checked
  if (htmlElement.getAttribute("data-bs-theme") === "light") {
    themeToggle.checked = true;
  }
});
