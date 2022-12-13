const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

window.addEventListener('DOMContentLoaded', () => {
    spinnerWrapperEl.style.opacity = '0';

    const loader = window.performance.now();

    setTimeout(() => {
        spinnerWrapperEl.style.display = 'none';
    }, loader);
});
