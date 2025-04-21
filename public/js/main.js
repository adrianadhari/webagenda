// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

document.addEventListener("DOMContentLoaded", function () {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll(".navigation ul li a");

    navLinks.forEach((link) => {
        if (link.getAttribute("href") === currentPath) {
            link.classList.add("active");
        }
    });
});

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
let logoutButton = document.querySelector(".logout-button");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
    logoutButton.classList.toggle("active");
};

document.getElementById("dropdown-icon").addEventListener("click", function () {
    var dropdownContent = document.getElementById("dropdown-content");
    if (dropdownContent.style.display === "flex") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "flex";
    }
});

// Menutup dropdown saat mengklik di luar
window.addEventListener("click", function (event) {
    if (
        !event.target.matches("#dropdown-icon") &&
        !event.target.matches(".administrator-text")
    ) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "flex") {
                openDropdown.style.display = "none";
            }
        }
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const dropdownIcon = document.getElementById('dropdown-icon');
    const dropdownContent = document.getElementById('dropdown-content');

    dropdownIcon.addEventListener('click', function () {
        const isVisible = dropdownContent.style.display === 'block';
        dropdownContent.style.display = isVisible ? 'none' : 'block';
    });

    // Optional: Klik di luar dropdown akan menutupnya
    window.addEventListener('click', function (e) {
        if (!dropdownIcon.contains(e.target) && !dropdownContent.contains(e.target)) {
            dropdownContent.style.display = 'none';
        }
    });
});