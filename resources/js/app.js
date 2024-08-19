import './bootstrap';

import 'flowbite';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})

document.addEventListener('DOMContentLoaded', function () {
    const openPopupButtons = document.querySelectorAll('.popup-open');
    const closePopupButtons = document.querySelectorAll('.popup-close');
    const overlay = document.querySelector('.popup-overlay');

    openPopupButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            overlay.style.display = 'flex';
        });
    });

    closePopupButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            overlay.style.display = 'none';
        });
    });
});

// Fungsi untuk menyembunyikan pop-up
function hideSuccessPopup() {
    document.getElementById('successPopup').classList.add('hidden');
}

// Mendaftarkan event listener untuk tombol Close
document.getElementById('closePopup').addEventListener('click', function() {
    hideSuccessPopup();
});

// Fungsi untuk menyembunyikan pop-up setelah beberapa detik
setTimeout(function() {
    hideSuccessPopup();
}, 5000);


