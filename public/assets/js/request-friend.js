document.addEventListener('DOMContentLoaded', function() {
    const friendRequestButtons = document.querySelectorAll('.confirm-friend-request, .delete-friend-request');
    
    friendRequestButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const friendshipId = this.getAttribute('data-friendship-id');
            const action = this.classList.contains('confirm-friend-request') ? 'accept' : 'reject';
            
            // Disable button during processing
            this.disabled = true;
            const originalText = this.textContent;
            this.textContent = 'Processing...';

            // Create FormData
            const formData = new FormData();
            formData.append('action', action);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            // Make the request
            fetch(`/sosmed/friend-request/${friendshipId}/respond`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Show success toast
                    toastr.success(data.message);
                    
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
                    toastr.error('Unexpected response');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('An error occurred');
            })
            .finally(() => {
                // Re-enable button
                this.disabled = false;
                this.textContent = originalText;
            });
        });
    });
});