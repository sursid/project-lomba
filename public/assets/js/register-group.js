document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.join-group-btn').forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-user-id');
            const groupId = this.getAttribute('data-group-id');

            const payload = {
                user_id: userId,
                group_id: groupId
            };

            fetch('/sosmed/group/join', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(payload)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal menghubungi server');
                    }
                    return response.json();
                })
                .then(data => {
                    // Ubah pengecekan pesan untuk mencakup kedua kemungkinan response
                    if (data.message === 'Permintaan bergabung dengan grup telah dikirim.' ||
                        data.message === 'Anda telah bergabung dengan grup.') {

                        // Update tampilan button
                        this.textContent = 'Already Registered';
                        this.style.backgroundColor = '#e0e0e0';
                        this.style.color = '#b0b0b0';
                        this.style.cursor = 'not-allowed';
                        this.style.pointerEvents = 'none';
                        this.disabled = true;
                    }

                    toastr.success(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan, silakan coba lagi.');
                });
        });
    });
});