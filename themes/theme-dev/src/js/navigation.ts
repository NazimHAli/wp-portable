/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(() => {
  let idx1: number;
  let len: number;

  const container = document.getElementById("site-navigation");
  if (!container) {
    return;
  }

  const button = container.getElementsByTagName("button")[0];
  if (typeof button === "undefined") {
    return;
  }

  const menu = container.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if (typeof menu === "undefined") {
    button.style.display = "none";
    return;
  }

  menu.setAttribute("aria-expanded", "false");
  if (!menu.className.includes("nav-menu")) {
    menu.className += " nav-menu";
  }

  button.onclick = () => {
    if (container.className.includes("toggled")) {
      container.className = container.className.replace(" toggled", "");
      button.setAttribute("aria-expanded", "false");
      menu.setAttribute("aria-expanded", "false");
    } else {
      container.className += " toggled";
      button.setAttribute("aria-expanded", "true");
      menu.setAttribute("aria-expanded", "true");
    }
  };

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName("a");

  // Each time a menu link is focused or blurred, toggle focus.
  for (idx1 = 0, len = links.length; idx1 < len; idx1++) {
    links[idx1].addEventListener("focus", toggleFocus, true);
    links[idx1].addEventListener("blur", toggleFocus, true);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    let self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while (!self.className.includes("nav-menu")) {
      // On li elements toggle the class .focus.
      if (self.tagName.toLowerCase() === "li") {
        if (self.className.includes("focus")) {
          self.className = self.className.replace(" focus", "");
        } else {
          self.className += " focus";
        }
      }

      self = self.parentElement;
    }
  }

  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */
  (() => {
    let touchStartFn: EventListenerOrEventListenerObject;
    let idx2: number;
    const parentLinkSelector =
      ".menu-item-has-children > a, .page_item_has_children > a";
    const parentLink = container.querySelectorAll(parentLinkSelector);

    if ("ontouchstart" in window) {
      touchStartFn = function(e) {
        const menuItem = this.parentNode;

        if (!menuItem.classList.contains("focus")) {
          e.preventDefault();
          for (idx2 = 0; idx2 < menuItem.parentNode.children.length; ++idx2) {
            if (menuItem === menuItem.parentNode.children[idx2]) {
              continue;
            }
            menuItem.parentNode.children[idx2].classList.remove("focus");
          }
          menuItem.classList.add("focus");
        } else {
          menuItem.classList.remove("focus");
        }
      };

      for (idx2 = 0; idx2 < parentLink.length; ++idx2) {
        parentLink[idx2].addEventListener("touchstart", touchStartFn, false);
      }
    }
  })();
})();
