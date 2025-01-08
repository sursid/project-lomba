document.addEventListener('DOMContentLoaded', function () {
    // Setting z-index for header, column div, and navbar
    const header = document.querySelector('.header-section.header-menu.animated.fadeInDown.header-fixed');
    const columnDiv = document.querySelector('.col-xxl-3.col-xl-3.col-lg-4.col-6.cus-z2');
    const navbar = document.querySelector('.navbar.w-100.navbar-expand-lg.justify-content-betweenm');

    if (header) header.style.zIndex = '1';
    if (columnDiv) columnDiv.style.zIndex = '1';
    if (navbar) navbar.style.zIndex = '1';

    // Block Modal Functions
    function closeBlockModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = ''; // Restore scrolling

            // Reset input
            const input = modal.querySelector('.block-modal-input');
            if (input) input.value = '';
        }
    }

    // Close modal when clicking close button 
    document.querySelectorAll('.block-modal-close').forEach(button => {
        button.addEventListener('click', function () {
            const modal = this.closest('.block-modal');
            closeBlockModal(modal);
        });
    });

    // Close modal when clicking overlay
    document.querySelectorAll('.block-modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function () {
            const modal = this.closest('.block-modal');
            closeBlockModal(modal);
        });
    });

    // Open block modal
    document.querySelectorAll('.block-user').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const postId = this.getAttribute('data-post-id');
            const modal = document.getElementById(`blockUserModal_${postId}`);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }
        });
    });

    // Handle block submit
    document.querySelectorAll('.block-modal-button').forEach(function (button) {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-user-id');
            const postId = this.getAttribute('data-post-id');
            const modal = this.closest('.block-modal');
            const reasonInput = modal?.querySelector('.block-modal-input');

            if (!reasonInput || !reasonInput.value.trim()) {
                showToast('Please provide a reason for blocking', 'error');
                return;
            }

            fetch(`/sosmed/block-user/${userId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({ reason: reasonInput.value.trim() })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        closeBlockModal(modal);
                        const postBox = document.querySelector(`.post-single-box:has(.block-user[data-post-id="${postId}"])`);
                        if (postBox) postBox.remove();
                        showToast(data.message, 'success');
                    } else {
                        showToast(data.message, 'error');
                    }
                })
                .catch(() => {
                    showToast('An error occurred while blocking the user', 'error');
                });
        });
    });

    // Toast notification function
    function showToast(message, type = 'success') {
        const existingToast = document.querySelector('.toast-notification');
        if (existingToast) {
            existingToast.remove();
        }

        const toast = document.createElement('div');
        toast.className = `toast-notification ${type}`;
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 24px;
            background: ${type === 'success' ? '#4CAF50' : '#f44336'};
            color: white;
            border-radius: 4px;
            z-index: 999999999999999;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            animation: slideIn 0.3s ease-in-out;
        `;

        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease-in-out';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.remove();
                }
            }, 300);
        }, 3000);
    }

    // Close on escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            const visibleModal = document.querySelector('.block-modal[style*="display: block"]');
            if (visibleModal) {
                closeBlockModal(visibleModal);
            }
        }
    });
});