document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const postId = this.getAttribute('data-post-id');
            const content = this.querySelector('input[name="content"]');
            const imageInput = this.querySelector('input[name="image"]');
            const imagePreviewContainer = document.getElementById(`image-preview-modal-${postId}`);
            const modalCommentsArea = document.getElementById(`modal-comments-area-${postId}`);

            // Create FormData
            const formData = new FormData();
            formData.append('post_id', postId);
            formData.append('content', content.value);

            // Add image if exists
            if (imageInput && imageInput.files.length > 0) {
                formData.append('image', imageInput.files[0]);
            }

            try {
                const response = await fetch('/sosmed/comment', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Create comment HTML
                    const commentHtml = createCommentHtml(data.comment);

                    // Prepend to comments area
                    modalCommentsArea.insertAdjacentHTML('afterbegin', commentHtml);

                    // Reset form
                    content.value = '';

                    // Clear image preview if exists
                    if (imagePreviewContainer) {
                        imagePreviewContainer.classList.add('d-none');
                        imageInput.value = '';
                    }
                } else {
                    alert(data.message || 'Failed to post comment');
                }
            } catch (error) {
                console.error('Comment post error:', error);
                alert('An error occurred while posting the comment');
            }
        });
    });

    // Helper function to create comment HTML
    function createCommentHtml(comment) {
        const currentUserId = document.querySelector('meta[name="user-id"]')?.getAttribute('content');
        const userAvatar = comment.user.avatar || '/assets/images/avatar-default.png';

        return `
            <div class="parent-comment d-flex gap-2 gap-sm-4" id="comment-${comment.id}">
                <div class="avatar-item d-center align-items-baseline">
                    <img class="avatar-img max-un" src="${userAvatar}" alt="avatar">
                </div>
                <div class="info-item active">
                    <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                        <div class="title-area">
                            <h6 class="m-0 mb-2">
                                <a href="#">${comment.user.name}</a>
                            </h6>
                            <p class="mdtxt">${comment.content}</p>
                            ${comment.image ? `
                            <div class="comment-image-container mt-2">
                                <img src="${comment.image}" alt="Comment Image" class="comment-image">
                            </div>` : ''}
                        </div>
                        ${currentUserId === comment.user_id ? `
                        <div class="btn-group dropend cus-dropdown">
                            <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                            </button>
                            <ul class="dropdown-menu p-4 pt-2">
                                <li>
                                    <button class="droplist d-flex align-items-center gap-2 delete-comment-btn" data-comment-id="${comment.id}">
                                        <i class="material-symbols-outlined mat-icon">delete</i>
                                        <span>Delete Comment</span>
                                    </button>
                                </li>
                            </ul>
                        </div>` : ''}
                    </div>
                    <ul class="like-share d-flex gap-6 mt-2">
                        <li class="d-center">
                            <button class="mdtxt like-comment-btn" data-comment-id="${comment.id}">
                                Like <span class="likes-count"></span>
                            </button>
                        </li>
                        <li class="d-center">
                            <button class="mdtxt reply-btn" data-comment-id="${comment.id}">
                                Reply
                            </button>
                        </li>
                        <li class="d-center">
                            <span class="mdtxt">just now</span>
                        </li>
                    </ul>
                </div>
            </div><br>`;
    }
});