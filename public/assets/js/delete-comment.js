document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-comment-btn').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const commentId = this.getAttribute('data-comment-id');
            const commentContainer = document.getElementById(`comment-${commentId}`);
            
            // Confirmation dialog
            const confirmDelete = confirm('Are you sure you want to delete this comment?');
            
            if (confirmDelete) {
                try {
                    const response = await fetch(`/sosmed/comments/${commentId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        }
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        // Remove the entire comment container by its ID
                        if (commentContainer) {
                            commentContainer.remove();
                        }
                        
                        // Optional: Remove associated replies
                        const repliesContainer = document.querySelector(`.replies-container[data-comment-id="${commentId}"]`);
                        if (repliesContainer) {
                            repliesContainer.remove();
                        }
                        
                        alert('Comment deleted successfully');
                    } else {
                        alert(data.message || 'Failed to delete comment');
                    }
                } catch (error) {
                    console.error('Delete comment error:', error);
                    alert('An error occurred while deleting the comment');
                }
            }
        });
    });
});