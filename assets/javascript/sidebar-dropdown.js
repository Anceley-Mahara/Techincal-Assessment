const categoriesDropdown = document.getElementById("categories-dropdown");
const categoriesSubmenu = categoriesDropdown.querySelector(".submenu");

categoriesDropdown.addEventListener("click", () => {
  categoriesSubmenu.classList.toggle("open");
});