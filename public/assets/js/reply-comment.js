// reply-comment.js

document.addEventListener('DOMContentLoaded', function () {
    // Listen for reply button clicks
    document.querySelectorAll('.comment-form button[type="button"]').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            const parentCommentId = form.dataset.parentCommentId;

            const formData = new FormData(form);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            submitReply(parentCommentId, form, formData);
        });
    });

    // Function to handle reply submission
    async function submitReply(parentCommentId, form, formData) {
        try {
            const response = await fetch(`/sosmed/comments/${parentCommentId}/reply`, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                // Create reply HTML and append to replies container
                const replyHtml = createReplyHtml(data.reply);
                const repliesContainer = form.closest('.info-item').querySelector('.replies-container');
                if (repliesContainer) {
                    repliesContainer.insertAdjacentHTML('beforeend', replyHtml);
                } else {
                    form.insertAdjacentHTML('beforebegin', `<div class="replies-container ml-4 mt-3">${replyHtml}</div>`);
                }

                form.reset(); // Clear form
            } else {
                console.error('Error submitting reply:', data.message);
            }
        } catch (error) {
            console.error('Error submitting reply:', error);
        }
    }

    // Helper to create reply HTML
    function createReplyHtml(reply) {
        return `
        <div class="reply-comment d-flex gap-2 gap-sm-4 mt-3">
            <div class="avatar-item d-center align-items-baseline">
                <img class="avatar-img max-un" src="${reply.user.avatar}" alt="avatar">
            </div>
            <div class="info-item">
                <div class="top-area px-4 py-3">
                <h6 class="m-0 mb-2"><a href="#">${reply.user.name}</a></h6>
                <p class="mdtxt">${reply.content}</p>
                </div>
                <ul class="like-share d-flex gap-6 mt-2">
                <li class="d-center">
                    <button class="mdtxt like-reply-btn" data-reply-id="${reply.id}">
                    Like <span class="likes-count">(0)</span>
                    </button>
                </li>
                <li class="d-center"><span class="mdtxt">${reply.created_at}</span></li>
                ${reply.user_id === getCurrentUserId() ? `
                    <li class="d-center">
                    <button class="mdtxt delete-reply-btn" data-reply-id="${reply.id}">Delete</button>
                    </li>
                ` : ''}
                </ul><br>
            </div>
            </div>
        `;
    }

    // Get current user ID from a data attribute or meta tag
    function getCurrentUserId() {
        const userIdElement = document.querySelector('[data-user-id]');
        return userIdElement ? userIdElement.dataset.userId : null;
    }
});
