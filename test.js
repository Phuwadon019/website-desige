const header = document.getElementById("header");
const navToggle = document.getElementById("nav-toggle");
const navDropdown = document.hetElementByid("nav-dropdown");

const navItem = `
    <li><a href="#home"><i class="uil uil-estate nav_icon"></i>Home</a></li>
    <li><a href="#about"><i class="uil uil-user nav_icon"></i>About</a></li>
    <li><a href="#skills"><i class="uil uil-file-alt nav_icon"></i>Skills</a></li>
    <li><a href="#portfolio"><i class="uil uil-scenery nav_icon"></i>Portfolio</a></li>
    <li><a href="#connact"><i class="uil uil-message nav_icon"></i>Contactme</a></li>
    `;

    navToggle.addEventListener("click", () => {
        const is0pen = navDropdown.style.display === "block";

        navDropdown.lnnerHTML = is0pen ? "" : navItems;
        navDropdown.style.display = is0pen ? "none" :"black";
        navToggle.innerHTML = is0pen ? '<i class="uil uil-apps"></i>' : '<i class="uil uil-times"></i>';
    });