document.addEventListener("DOMContentLoaded", function () {
  const themeToggle = document.getElementById("themeToggle");
  const htmlElement = document.documentElement;
  let isDarkMode = localStorage.getItem("darkMode") === "true";

  htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");
  updateIcon();

  themeToggle.addEventListener("click", function () {
    isDarkMode = !isDarkMode;
    // console.log("clicked");

    htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");

    localStorage.setItem("darkMode", isDarkMode.toString());

    updateIcon();
  });

  function updateIcon() {
    themeToggle.classList.remove("bi-brightness-high", "bi-moon-stars");
    themeToggle.classList.add(isDarkMode ? "bi-moon-stars" : "bi-brightness-high");
  }
});
