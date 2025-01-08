document.addEventListener('DOMContentLoaded', function () {
    function setupLikeButton(button) {
        const postId = button.getAttribute('data-post-id');
        const likeIcon = button.querySelector('.like-icon');
        const totalReactShare = button.closest('.post-single-box')?.querySelector('.total-react-share');
        const likedUsersList = totalReactShare?.querySelector('.friends-list ul');

        // Initial state
        const initialLikedState = button.classList.contains('liked');

        // Click event handler
        button.addEventListener('click', async function (e) {
            e.preventDefault();
            e.stopPropagation();

            const currentLikedState = this.classList.contains('liked');

            try {
                const response = await fetch('/sosmed/posts/toggle-like', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({ post_id: postId })
                });

                const data = await response.json();

                if (data.success) {
                    // Update UI based on server response
                    updateLikeUI(
                        this,
                        likeIcon,
                        data.liked,
                        data.likes_count || 0,
                        data.liked_users || [],
                        likedUsersList
                    );
                } else {
                    // Revert to original state if server operation fails
                    updateLikeUI(
                        this,
                        likeIcon,
                        currentLikedState,
                        initialLikedState ? 1 : 0,
                        [],
                        likedUsersList
                    );
                }
            } catch (error) {
                console.error('Like toggle error:', error);
                // Revert to original state on network error
                updateLikeUI(
                    this,
                    likeIcon,
                    currentLikedState,
                    initialLikedState ? 1 : 0,
                    [],
                    likedUsersList
                );
            }
        });
    }

    // Helper function to update like UI
    function updateLikeUI(button, likeIcon, isLiked, likesCount, likedUsers, likedUsersList) {
        // Toggle liked class
        if (isLiked) {
            button.classList.add('liked');
            likeIcon.setAttribute('fill', 'red');
            likeIcon.setAttribute('stroke', 'red');
        } else {
            button.classList.remove('liked');
            likeIcon.setAttribute('fill', 'none');
            likeIcon.setAttribute('stroke', 'currentColor');
        }

        // Update liked users avatars
        if (likedUsersList) {
            // Clear existing list
            likedUsersList.innerHTML = '';

            // Add up to 3 user avatars
            const displayUsers = likedUsers.slice(0, 3);
            displayUsers.forEach(user => {
                const li = document.createElement('li');
                const img = document.createElement('img');
                img.src = user.avatar;
                img.alt = `${user.name}'s avatar`;
                img.classList.add('user-avatar');
                li.appendChild(img);
                likedUsersList.appendChild(li);
            });

            // Add count if likes exceed displayed avatars
            if (likesCount > likedUsers.length) {
                const li = document.createElement('li');
                const span = document.createElement('span');
                span.classList.add('mdtxt', 'd-center');
                span.textContent = `${likesCount - likedUsers.length}+`;
                li.appendChild(span);
                likedUsersList.appendChild(li);
            }
        }
    }

    // Setup all like buttons
    document.querySelectorAll('.like-btn').forEach(setupLikeButton);
});