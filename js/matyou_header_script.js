window.addEventListener("DOMContentLoaded", function () {
  const searchContainers = document.querySelectorAll(".matyou_material_header_search_div");

  searchContainers.forEach((container) => {
    const icon = container.querySelector(".matyou_header_search_icon");
    const field = container.querySelector(".matyou_expandable_search_field");
    const searchFieldInput = field.querySelector(".search-field");
    searchFieldInput.tabIndex = -1;
    let searchOpen = false;

    if (icon && field) {
      icon.addEventListener("click", (event) => toggleSearch(event, field));
      searchFieldInput.addEventListener("blur", () => {
        if (searchOpen) {
          toggleSearch(new Event("blur"), field);
        }
      });
    }

    function toggleSearch(event, field) {
      if (event.target === field || field.contains(event.target)) return;
      searchOpen = !searchOpen;
      field.classList.toggle("matyou_header_search_open", searchOpen);
      searchFieldInput.tabIndex = searchOpen ? 0 : -1;
      if (searchOpen) {
        searchFieldInput.focus();
        event.preventDefault();
      }
    }
  });
});
