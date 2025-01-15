document.addEventListener('DOMContentLoaded', function() {
    // Ensure the function is globally available
    window.sendFriendRequest = function(button) {
        // Disable the button to prevent multiple clicks
        button.disabled = true;
        
        // Get the user ID from the data attribute
        const userId = button.getAttribute('data-user-id');
        
        // Create form data
        const formData = new FormData();
        formData.append('suggested_user_id', userId);
        
        // Get CSRF token from the meta tag or hidden input
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                          document.querySelector('input[name="_token"]')?.value;
        
        // Prepare fetch options
        const fetchOptions = {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        };
        
        // Send friend request
        fetch('/sosmed/send-friend-request', fetchOptions)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Remove the suggestion card's parent column
                    const suggestionColumn = button.closest('.col-xl-4');
                    if (suggestionColumn) {
                        suggestionColumn.remove();
                    }
                    
                    // Show success notification using Toastr
                    toastr.success(data.message);
                } else {
                    // Show error notification using Toastr
                    toastr.error(data.message);
                    
                    // Re-enable the button
                    button.disabled = false;
                }
            })
            .catch(error => {
                console.error('Friend Request Error:', error);
                toastr.error('An error occurred while sending the friend request.');
                
                // Re-enable the button
                button.disabled = false;
            });
    };
});