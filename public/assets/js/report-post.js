document.addEventListener('DOMContentLoaded', function () {
    // Report Post Functionality
    const reportLinks = document.querySelectorAll('.report-post');

    // Open Report Modal
    reportLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const postId = this.getAttribute('data-post-id');
            const modal = document.getElementById(`reportPostModal_${postId}`);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }
        });
    });

    // Handle Radio Button Changes for Additional Input
    document.querySelectorAll('[id^="reportPostModal_"]').forEach(modal => {
        const radioInputs = modal.querySelectorAll('input[type="radio"]');
        const additionalInput = modal.querySelector('.report-block-additional');

        radioInputs.forEach(radio => {
            radio.addEventListener('change', function () {
                if (additionalInput) {
                    additionalInput.style.display = this.value === 'other' ? 'block' : 'none';

                    // Clear input when hiding
                    if (this.value !== 'other') {
                        const input = additionalInput.querySelector('input');
                        if (input) input.value = '';
                    }
                }
            });
        });
    });

    // Close Modal Function
    function closeReportModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = ''; // Restore scrolling

            // Reset form
            const radioInputs = modal.querySelectorAll('input[type="radio"]');
            radioInputs.forEach(radio => radio.checked = false);

            // Hide and clear additional input
            const additionalInput = modal.querySelector('.report-block-additional');
            if (additionalInput) {
                additionalInput.style.display = 'none';
                const input = additionalInput.querySelector('input');
                if (input) input.value = '';
            }
        }
    }

    // Close Modal Click Handlers
    document.querySelectorAll('.report-block-close, .report-block-cancel').forEach(button => {
        button.addEventListener('click', function () {
            const modal = this.closest('.report-block-modal');
            closeReportModal(modal);
        });
    });

    // Close on overlay click
    document.querySelectorAll('.report-block-overlay').forEach(overlay => {
        overlay.addEventListener('click', function () {
            const modal = this.closest('.report-block-modal');
            closeReportModal(modal);
        });
    });

    // Submit Report
    document.querySelectorAll('.report-block-submit').forEach(button => {
        button.addEventListener('click', function () {
            const modal = this.closest('.report-block-modal');
            const postId = this.getAttribute('data-post-id');
            const selectedReason = modal.querySelector('input[type="radio"]:checked');

            if (!selectedReason) {
                showToast('Please select a reason for reporting', 'error');
                return;
            }

            const reason = selectedReason.value;
            let additionalInfo = '';

            if (reason === 'other') {
                const input = modal.querySelector('.report-block-additional input');
                if (input && !input.value.trim()) {
                    showToast('Please provide additional details', 'error');
                    return;
                }
                additionalInfo = input ? input.value.trim() : '';
            }

            // Send report to server
            fetch(`/sosmed/posts/${postId}/report`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    reason: reason,
                    additional_info: additionalInfo
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        showToast(data.message, 'success');
                        closeReportModal(modal);
                    } else {
                        showToast(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while submitting the report', 'error');
                });
        });
    });

    // Toast Notification Function
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

    // Keyboard Event for Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            const visibleModal = document.querySelector('.report-block-modal[style*="display: block"]');
            if (visibleModal) {
                closeReportModal(visibleModal);
            }
        }
    });
});