// Mendapatkan semua elemen dengan ID yang dimulai dengan "hide-post-"
const hidePostLinks = document.querySelectorAll('[id^="hide-post-"]');

// Iterasi melalui setiap elemen "Hide Post"
hidePostLinks.forEach(function (hidePostLink) {
    // Menambahkan event listener untuk tautan "Hide Post"
    hidePostLink.addEventListener('click', function (event) {
        event.preventDefault(); // Mencegah perilaku default tautan

        // Mendapatkan post-single-box yang terkait dengan tautan "Hide Post"
        const postSingleBox = hidePostLink.closest('.post-single-box');

        // Menyembunyikan post-single-box
        if (postSingleBox) {
            postSingleBox.style.display = 'none';
        }
    });
});