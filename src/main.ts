document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.sk-navbar-burger'), 0);

  // Add a click event on each of them
  navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const targetElement = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('sk-is-active');
      if (targetElement !== null) {
        targetElement.classList.toggle('sk-is-active');
      }

    });
  });

});