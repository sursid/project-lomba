document.addEventListener('DOMContentLoaded', function () {
    // Menangkap semua tombol "Interested"
    const interestedButtons = document.querySelectorAll('.cmn-btn');

    interestedButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah tindakan default link

            // Mengambil data dari atribut tombol
            const userId = button.getAttribute('data-user-id');
            const eventId = button.getAttribute('data-event-id');

            // Jika tombol sudah disabled, tidak melakukan apa-apa
            if (button.style.pointerEvents === 'none') {
                return;
            }

            // Data yang akan dikirim ke server
            const requestData = {
                user_id: userId,
                event_id: eventId,
                status: 'pending'
            };

            // Mengirimkan POST request menggunakan fetch API
            fetch('/sosmed/event/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Jika menggunakan CSRF
                },
                body: JSON.stringify(requestData)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Mengecek apakah message ada dan sesuai dengan keberhasilan pendaftaran
                    if (data.message === 'Event registration successfully created.') {
                        // Menangani response sukses
                        console.log('Success:', data);

                        // Memperbarui gaya tombol
                        button.textContent = 'Already Registered';
                        button.style.backgroundColor = '#e0e0e0';
                        button.style.color = '#b0b0b0';
                        button.style.cursor = 'not-allowed';
                        button.style.pointerEvents = 'none';

                        // Ubah warna ikon menjadi hijau
                        const icon = button.querySelector('i');
                        if (icon) {
                            icon.style.color = 'green';
                        }

                        // Menampilkan pesan toastr
                        toastr.success(data.message);
                    } else {
                        // Jika ada pesan lain atau registrasi gagal
                        toastr.error(data.message || 'Registration failed!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Something went wrong!');
                });
        });
    });
});
