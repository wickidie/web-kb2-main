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

var flake =
  '<svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake"><path fill="#00FFFF" d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"/></svg>';

$(window).on("load", function () {
  interval = setInterval(function () {
    create_snow_lake();
    remove_snow_lake();
  }, 200);
});
function create_snow_lake() {
  var falling_time = Math.floor(Math.random() * 10) + 5;
  var flake_pos = Math.floor(Math.random() * 90) + 4;
  var flake_size = (Math.floor(Math.random() * 100) + 1) / 100;
  var snow_flake = "<div class='flake-wrapper' style='width:40px; left:" + flake_pos + "%;height:40px;transform:scale(" + flake_size + ");animation:falling " + falling_time + "s linear infinite'>" + flake + "</div>";
  $(snow_flake).appendTo(".background");
}

function remove_snow_lake() {
  $(".flake-wrapper").each(function () {
    var flake_pos = $(this).offset().top;
    var body_height = $(document).height() - 100;
    if (flake_pos > body_height) {
      $(this).remove();
    }
  });
}
