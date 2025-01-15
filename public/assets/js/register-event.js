document.addEventListener('DOMContentLoaded', function () {
    // Menambahkan event listener untuk setiap tombol "Interested"
    const interestedButtons = document.querySelectorAll('.cmn-btn');

    interestedButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Mengambil data-user-id dan data-event-id dari tombol yang diklik
            const user_id = button.getAttribute('data-user-id');
            const event_id = button.getAttribute('data-event-id');

            // Jika tombol sudah disabled, tidak melakukan apa-apa
            if (button.style.pointerEvents === 'none') {
                return;
            }

            // Data yang akan dikirimkan ke server
            const data = {
                user_id: user_id,
                event_id: event_id,
                status: 'pending'  // Status default, bisa diubah sesuai kebutuhan
            };

            // Mengirim POST request dengan menggunakan fetch
            fetch('/sosmed/event/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    // Menangani response sukses
                    console.log('Success:', data);

                    // Ubah teks tombol menjadi "Already Registered" dan tambahkan gaya disable
                    const buttons = document.querySelectorAll(`#interested-btn-${event_id}`);

                    buttons.forEach(button => {
                        button.textContent = 'Already Registered';
                        button.style.backgroundColor = '#e0e0e0'; // Warna latar belakang yang lebih terang
                        button.style.color = '#b0b0b0'; // Warna teks yang lebih pudar
                        button.style.cursor = 'not-allowed'; // Ganti kursor menjadi tanda larangan
                        button.style.pointerEvents = 'none'; // Menonaktifkan interaksi dengan tombol
                    });

                    // Menampilkan toastr
                    toastr.success('Successfully registered for the event!');
                })
                .catch((error) => {
                    // Menangani error
                    console.error('Error:', error);
                    toastr.error('Something went wrong!');
                });
        });
    });
});
