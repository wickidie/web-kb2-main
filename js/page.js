// document.addEventListener("DOMContentLoaded", function (event) {
//   const showNavbar = (toggleId) => {
//     const toggle = document.getElementById(toggleId);

//     if (toggle) {
//       toggle.addEventListener("click", () => {
//         toggle.classList.toggle("bi-x");
//       });
//     }
//   };

//   showNavbar("icon-toggle", "logo");
// });
const pageActive = document.querySelectorAll(".nav-link");

function activePage() {
  if (pageActive) {
    pageActive.forEach((l) => l.classList.remove("active"));
    this.classList.add("active");
  }
}
pageActive.forEach((l) => l.addEventListener("click", activePage));

var myLink = document.querySelectorAll('a[href="#"]');
myLink.forEach(function (link) {
  link.addEventListener("click", function (e) {
    e.preventDefault();
  });
});
