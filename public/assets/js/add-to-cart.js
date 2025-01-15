window.onload = function() {
    // Menangani klik tombol Add to Cart
    const addToCartButtons = document.querySelectorAll('.cmn-btn[data-product-id]');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            addToCart(this);
        });
    });

    function addToCart(button) {
        // Ambil ID produk dari atribut data-product-id
        const productId = button.getAttribute('data-product-id');
        
        // Cari elemen input quantity (.qtyValue) yang relevan
        const cartContent = button.closest('.cart-content'); // Pastikan tombol ada dalam elemen ini
        if (!cartContent) {
            toastr.error('Cart Content tidak ditemukan', 'Error');
            return;
        }

        const qtyInput = cartContent.querySelector('.qtyValue'); // Ambil elemen input quantity
        if (!qtyInput) {
            toastr.error('Field quantity tidak ditemukan', 'Error');
            return;
        }

        const quantity = parseInt(qtyInput.value);

        // Validasi jumlah produk
        if (isNaN(quantity) || quantity <= 0) {
            toastr.error('Jumlah produk tidak valid', 'Error');
            return;
        }

        // Kirim request AJAX untuk menambahkan ke keranjang
        fetch('/sosmed/add-to-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            // Menampilkan pesan sukses menggunakan Toastr
            if (data.message) {
                toastr.success(data.message, 'Sukses');
            }
        })
        .catch(error => {
            // Menampilkan pesan error menggunakan Toastr
            toastr.error('Terjadi kesalahan. Gagal menambahkan produk ke keranjang.', 'Error');
            console.error('Error:', error);
        });
    }
};
