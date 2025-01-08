document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.like-reply-btn').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const replyId = this.getAttribute('data-reply-id');
            const likesCountSpan = this.querySelector('.likes-count');
            
            try {
                const response = await fetch(`/sosmed/replies/${replyId}/toggle-reply-like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Toggle liked class
                    this.classList.toggle('liked');
                    
                    // Update likes count
                    if (data.likesCount > 0) {
                        likesCountSpan.textContent = `(${data.likesCount})`;
                        likesCountSpan.style.display = 'inline';
                    } else {
                        likesCountSpan.textContent = '';
                        likesCountSpan.style.display = 'none';
                    }
                }
            } catch (error) {
                console.error('Reply like error:', error);
            }
        });
    });
});