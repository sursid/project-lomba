// Mendapatkan semua elemen dengan class "custom-modal"
const modals = document.getElementsByClassName('custom-modal');

// Mendapatkan semua elemen dengan class "modal-close"
const closeButtons = document.getElementsByClassName('modal-close');

// Menambahkan event listener untuk setiap tombol close
for (let i = 0; i < closeButtons.length; i++) {
  closeButtons[i].addEventListener('click', function() {
    // Menutup modal yang terkait dengan tombol close
    closeModal(this);
  });
}

// Fungsi untuk menutup modal
function closeModal(button) {
  // Mencari parent terdekat dengan class "custom-modal"
  let modal = button.closest('.custom-modal');

  // Memeriksa apakah modal ditemukan
  if (modal) {
    // Menghapus atribut style pada modal
    modal.removeAttribute('style');

    // Mengaktifkan kembali window scroll
    document.body.style.overflow = 'auto';
  }
}