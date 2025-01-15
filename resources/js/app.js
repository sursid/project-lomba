import Toast from './Components/Toast';
import { toast } from './Components/Toast';

// Pastikan elemen untuk toast ada di dalam root HTML
const toastContainer = document.getElementById('toast-root');
if (toastContainer) {
    const toastElement = document.createElement('div');
    toastContainer.appendChild(toastElement);
    Toast(toastElement);
}

// Expose toast globally
window.toast = {
    success: (message) => toast.success(message),
    error: (message) => toast.error(message),
    info: (message) => toast(message),
    loading: (message) => toast.loading(message),
};