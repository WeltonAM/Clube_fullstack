const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

window.addEventListener('DOMContentLoaded', () => {
    spinnerWrapperEl.style.opacity = '0';
    
    setTimeout(() => {
        spinnerWrapperEl.style.display = 'none';
    }, 600);
});
