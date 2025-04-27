window.addEventListener(
  "DOMContentLoaded",
  function () {
    // header mobile submenu toggle
    const header_submenu_toggle = document.querySelectorAll(".matyou_submenu_toggle");

    for (const toggle of header_submenu_toggle) {
      toggle.addEventListener("click", toggleSubMenu);
      toggle.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
          toggleSubMenu(event);
        }
      });
    }

    function toggleSubMenu(event) {
      event.stopPropagation();

      const toggleButton = event.target;
      const listItemContainer = toggleButton.parentElement;
      const listItem = listItemContainer.parentElement;
      const submenu = listItemContainer.parentElement.querySelector(".sub-menu");

      // close all open menus
      const allOpenMenus = document.querySelectorAll(".matyou_submenu_open");
      const parentListItem = listItem.parentElement.parentElement;
      const isInOpenSubmenu = parentListItem.classList.contains("matyou_submenu_open");

      if (!isInOpenSubmenu) {
        for (const menu of allOpenMenus) {
          if (menu === submenu.parentElement) continue;
          menu.classList.remove("matyou_submenu_open");
        }
      }

      listItem.classList.toggle("matyou_submenu_open");
    }

    // Toggle sidemenu
    const sidemenuToggle = this.document.querySelector("#matyou_sidemenu_toggle");
    const body = this.document.querySelector("body");
    sidemenuToggle.addEventListener("click", toogleSidemenu);
    const sidemenu = this.document.querySelector("#matyou_sidemenu");
    const menuLinks = sidemenu.querySelectorAll("a, button, .matyou_submenu_toggle");
    menuLinks.forEach((link) => {
      if (window.innerWidth < 600) link.setAttribute("tabindex", "-1");
    });

    sidemenu.addEventListener("focusout", (event) => {
      if (!sidemenu.contains(event.relatedTarget)) {
        if (body.classList.contains("matyou_sidemenu_open")) toogleSidemenu();
      }
    });

    function toogleSidemenu() {
      body.classList.toggle("matyou_sidemenu_open");

      if (body.classList.contains("matyou_sidemenu_open")) {
        menuLinks.forEach((link) => {
          link.setAttribute("tabindex", "0");
        });
        sidemenu.querySelector("a").focus();
      } else {
        sidemenuToggle.focus();
        menuLinks.forEach((link) => {
          link.setAttribute("tabindex", "-1");
        });
      }
    }

    // Closing div (mobile)
    const closingDiv = this.document.querySelector("#matyou_sidemenu_closing_div");
    closingDiv.addEventListener("click", closeSidemenu);

    function closeSidemenu() {
      body.classList.remove("matyou_sidemenu_open");
    }
  },
  false
);
