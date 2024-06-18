document.addEventListener("DOMContentLoaded", (event) => {
    const menuIcon = document.querySelector(".menu-icon");
    const navbarMenu = document.querySelector(".navbar-menu");

    menuIcon.addEventListener("click", () => {
        navbarMenu.classList.toggle("active");
    });
});
