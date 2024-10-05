// Dropdown toggle logic
const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');
const mobileMenu = document.getElementById('mobile-menu');
const hamburgerIcon = document.getElementById('hamburgerIcon');
const closeIcon = document.getElementById('closeIcon');
const menuToggleButton = document.getElementById('menuToggleButton');

dropdownButton.addEventListener('click', function () {
  dropdownMenu.classList.toggle('hidden');
});

// Optional: close the dropdown when clicking outside
window.addEventListener('click', function (e) {
  if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
    dropdownMenu.classList.add('hidden');
  }
});

$(document).ready(function(){
    menuToggleButton.addEventListener('click', function () {
        // Alternar a visibilidade do menu
        mobileMenu.classList.toggle('hidden');

        // Alternar os ícones entre hamburguer e X
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
});
