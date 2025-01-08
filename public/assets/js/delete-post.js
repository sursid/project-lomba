document.addEventListener('DOMContentLoaded', function() {
    // Delete Post Functionality
    document.querySelectorAll('.delete-post').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const postId = this.getAttribute('data-post-id');
            
            // Confirmation dialog
            const confirmDelete = confirm('Are you sure you want to delete this post?');
            
            if (confirmDelete) {
                try {
                    const response = await fetch(`/sosmed/posts/${postId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        }
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        // Remove entire post-single-box with matching data-post-id
                        const postBoxes = document.querySelectorAll('.post-single-box');
                        postBoxes.forEach(box => {
                            const boxPostId = box.querySelector('.delete-post')?.getAttribute('data-post-id');
                            if (boxPostId === postId) {
                                box.remove();
                            }
                        });
                        
                        // Optional: Show success toast/notification
                        alert('Post deleted successfully');
                    } else {
                        // Show error message
                        alert(data.message || 'Failed to delete post');
                    }
                } catch (error) {
                    console.error('Delete post error:', error);
                    alert('An error occurred while deleting the post');
                }
            }
        });
    });
});