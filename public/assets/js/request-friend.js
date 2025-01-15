document.addEventListener('DOMContentLoaded', function () {
    const friendRequestButtons = document.querySelectorAll('.confirm-friend-request, .delete-friend-request');

    friendRequestButtons.forEach(button => {
        button.addEventListener('click', async function (e) {
            const friendshipId = this.getAttribute('data-friendship-id');
            const action = this.classList.contains('confirm-friend-request') ? 'accept' : 'reject';

            // Disable button during processing
            this.disabled = true;
            const originalText = this.textContent;
            this.textContent = 'Processing...';

            try {
                const response = await fetch(`/sosmed/friend-request/${friendshipId}/respond`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ action })
                });

                if (!response.ok) {
                    throw new Error('Server responded with an error');
                }

                const data = await response.json();

                if (data.status === 'success') {
                    toastr.success(data.message || 'Request processed successfully');

                    // Remove the friend request card
                    const requestCard = this.closest('.single-box').parentElement;
                    requestCard.remove();

                    // Check if no more friend requests
                    const remainingRequests = document.querySelectorAll('.friend-request .single-box');
                    if (remainingRequests.length === 0) {
                        document.querySelector('.friend-request').innerHTML =
                            '<div class="col-12 text-center py-4"><p>No pending friend requests</p></div>';
                    }
                } else {
                    toastr.error(data.message || 'Unexpected response');
                }
            } catch (error) {
                console.error('Request Error:', error);
                toastr.error('An error occurred while processing your request');
            } finally {
                // Re-enable button
                this.disabled = false;
                this.textContent = originalText;
            }
        });
    });
});