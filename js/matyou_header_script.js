window.addEventListener("DOMContentLoaded", function () {

    const headerSearchIcon = document.querySelector('#matyou_header_search_icon');

    const expandableSeachfield = this.document.querySelector('#matyou_expandable_search_field')
    if (headerSearchIcon && expandableSeachfield) {
        headerSearchIcon.addEventListener('click', toggleSearch);
        window.addEventListener('click', closeSearchWhenOpen);
    }

    let searchOpen = false;

    function toggleSearch(event) {
        if(event.target === expandableSeachfield || expandableSeachfield.contains(event.target)) return;
        expandableSeachfield.classList.toggle('matyou_header_search_open');
        searchOpen = !searchOpen;
        if (searchOpen) {
            const searchfield = expandableSeachfield.querySelector('.search-field');
            searchfield.focus();
            event.preventDefault();
        }
    }

    function closeSearchWhenOpen(event) {
        if (searchOpen) {
            const isInSearch = headerSearchIcon.parentElement.contains(event.target);
            if (!isInSearch && headerSearchIcon && searchOpen) {
                toggleSearch(event);
            }
        }
    }

    const material3Header = document.querySelector('.matyou_material3_header');
    const fixedHeader = this.document.querySelector('.matyou_fixed_header');
    if(material3Header && fixedHeader) {
        window.onscroll = function () {
          if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            material3Header.style.backgroundColor = "var(--matyou_body_background_color)"; // Hintergrundfarbe ändern
        } else {
            material3Header.style.backgroundColor = "transparent"; // Zurück zur Originalfarbe
          }
        };
    }

}, false);