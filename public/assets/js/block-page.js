document.addEventListener('DOMContentLoaded', function() {
    // Unblock User Function
    window.unblockUser = function(button) {
        const userId = button.getAttribute('data-user-id');
        
        fetch(`/sosmed/block/${userId}/unblock`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                document.querySelector('input[name="_token"]')?.value,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Remove the row
                const row = button.closest('tr');
                row.remove();
                
                // Show success toast
                toastr.success(data.message);
            } else {
                // Show error toast
                toastr.error(data.message);
            }
        })
        .catch(error => {
            console.error('Unblock Error:', error);
            toastr.error('An error occurred while unblocking the user');
        });
    };

    // Remove Blocked User Function
    window.removeBlockedUser = function(button) {
        const userId = button.getAttribute('data-user-id');
        
        fetch(`/sosmed/block/${userId}/remove`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                document.querySelector('input[name="_token"]')?.value,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Remove the row
                const row = button.closest('tr');
                row.remove();
                
                // Show success toast
                toastr.success(data.message);
            } else {
                // Show error toast
                toastr.error(data.message);
            }
        })
        .catch(error => {
            console.error('Remove Blocked User Error:', error);
            toastr.error('An error occurred while removing the blocked user');
        });
    };
});