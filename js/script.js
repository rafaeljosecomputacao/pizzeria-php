// Navbar toggle menu
function NavbarToggle() {
    let navbarItems = document.querySelector('.navigation-bar-items');
    
    if (navbarItems.classList.contains('open')) {
        navbarItems.classList.remove('open');
        document.querySelector('.navigation-bar-icon').innerHTML = `<i class="bi bi-three-dots-vertical"></i>`;
    } else {
        navbarItems.classList.add('open');
        document.querySelector('.navigation-bar-icon').innerHTML = `<i class="bi bi-x-lg"></i>`;
    }
}

// Alert auto close
setTimeout(function() {
    bootstrap.Alert.getOrCreateInstance(document.querySelector('.alert')).close();
}, 5000);

// Current year for footer
var year = new Date();
document.getElementById('year').innerHTML = year.getFullYear();