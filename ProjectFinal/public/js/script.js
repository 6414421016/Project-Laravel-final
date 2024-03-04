document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll('.menu-item1 a, .menu-item2 a, .menu-item3 a, .menu-item4 a, .menu-item5 a');

    menuItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();

            menuItems.forEach(function(item) {
                item.parentElement.classList.remove('active');
            });

            this.parentElement.classList.add('active');

            window.location.href = this.getAttribute('href');
        });
    });
});