document.addEventListener("DOMContentLoaded", function (event) {
  const showNavbar = (toggleId, logoId, sidebarId, sidebar1Id, dashboardId, dropId, transactionsId, productsId, usersId, sidebar2Id, logoutId) => {
    const toggle = document.getElementById(toggleId),
      logo = document.getElementById(logoId),
      sidebar = document.getElementById(sidebarId),
      sidebar1 = document.getElementById(sidebar1Id),
      dashboard = document.getElementById(dashboardId),
      dropend = document.getElementById(dropId),
      transactions = document.getElementById(transactionsId),
      products = document.getElementById(productsId),
      users = document.getElementById(usersId),
      sidebar2 = document.getElementById(sidebar2Id),
      logout = document.getElementById(logoutId);

    if (toggle && logo && sidebar && sidebar1 && dashboard && transactions && products && users && sidebar2 && logout) {
      toggle.addEventListener("click", () => {
        toggle.classList.toggle("bi-x");
        logo.classList.toggle("d-none");
        sidebar.classList.toggle("d-none");
        sidebar1.classList.toggle("align-items-sm-stretch");
        dashboard.classList.toggle("d-none");
        dropend.classList.toggle("dropend");
        transactions.classList.toggle("d-none");
        products.classList.toggle("d-none");
        users.classList.toggle("d-none");
        sidebar2.classList.toggle("align-items-sm-stretch");
        logout.classList.toggle("d-none");
      });
    }
  };

  showNavbar("icon-toggle", "logo", "sidebar", "sidebar1", "dashboard", "dropend", "transactions", "products", "users", "sidebar2", "logout");
});
const pageActive = document.querySelectorAll(".nav-link");

function activePage() {
  if (pageActive) {
    pageActive.forEach((l) => l.classList.remove("active"));
    this.classList.add("active");
  }
}
pageActive.forEach((l) => l.addEventListener("click", activePage));

document.addEventListener("DOMContentLoaded", function () {
  const themeToggle = document.getElementById("themeToggle");
  const htmlElement = document.documentElement;
  let isDarkMode = localStorage.getItem("darkMode") === "true";

  htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");
  updateIcon();

  themeToggle.addEventListener("click", function () {
    isDarkMode = !isDarkMode;

    htmlElement.setAttribute("data-bs-theme", isDarkMode ? "dark" : "light");

    localStorage.setItem("darkMode", isDarkMode.toString());

    updateIcon();
  });

  function updateIcon() {
    themeToggle.classList.remove("bi-brightness-high", "bi-moon-stars");
    themeToggle.classList.add(isDarkMode ? "bi-moon-stars" : "bi-brightness-high");
  }
});

var myLink = document.querySelectorAll('a[href="#"]');
myLink.forEach(function (link) {
  link.addEventListener("click", function (e) {
    e.preventDefault();
  });
});
