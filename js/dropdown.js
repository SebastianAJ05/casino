const toggle = document.getElementById("userToggle");
const menu = document.getElementById("userMenu");

toggle.addEventListener("click", function (e) {
  e.stopPropagation();
  menu.classList.toggle("active");
});

document.addEventListener("click", function (e) {
  if (!menu.contains(e.target) && !toggle.contains(e.target)) {
    menu.classList.remove("active");
  }
});
