require('./bootstrap');

// ============================== ALERT ==============================

let alert = document.querySelector('.alert');

if (alert) {
    alert.addEventListener('click', () => {
        alert.style.display = "none";
    });
}

// ============================== NAV ==============================

const btnOpenNav = document.querySelector('.bx-menu');
const btnOpenLink = document.querySelector('.link-profil');
let navlist = document.querySelector('.nav-list');
let linkProfil = document.querySelector('.nav-profil-list');
let iconRotate = document.querySelector('.bx-chevron-down');

if (btnOpenNav){
    btnOpenNav.addEventListener('click', () => {
        navlist.classList.toggle('active');
    });
}

if (btnOpenLink){
    btnOpenLink.addEventListener('click', () => {
        linkProfil.classList.toggle('active');
        iconRotate.classList.toggle('rotate');
    });
}