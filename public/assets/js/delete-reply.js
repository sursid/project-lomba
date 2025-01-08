document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-reply-btn').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const replyId = this.getAttribute('data-reply-id');
            const replyContainer = this.closest('.reply-comment');
            
            // Confirmation dialog
            const confirmDelete = confirm('Are you sure you want to delete this reply?');
            
            if (confirmDelete) {
                try {
                    const response = await fetch(`/sosmed/replies/${replyId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        }
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        // Remove the entire reply container
                        if (replyContainer) {
                            replyContainer.remove();
                        }
                        
                        // Optional: Check if there are any replies left in the replies container
                        const repliesContainer = document.querySelector('.replies-container');
                        if (repliesContainer) {
                            const remainingReplies = repliesContainer.querySelectorAll('.reply-comment').length;
                            if (remainingReplies === 0) {
                                repliesContainer.style.display = 'none';
                            }
                        }
                        
                        alert('Reply deleted successfully');
                    } else {
                        alert(data.message || 'Failed to delete reply');
                    }
                } catch (error) {
                    console.error('Delete reply error:', error);
                    alert('An error occurred while deleting the reply');
                }
            }
        });
    });
});