$(document).ready(function () {
    const themeToggle = document.querySelector('#themeToggle');
    const themeLabel = document.querySelector('#themeLabel');
    
    const body = document.querySelector('body');
    const loginForm = document.querySelector('#loginForm');
    const btnConstrast = document.querySelector('#btnContrast');

    body.classList.toggle('dark-mode');
    loginForm.classList.toggle('dark-mode');
    btnConstrast.classList.toggle('dark-mode');
    

    themeToggle.addEventListener('change', function () {
        if (this.checked) {
            themeLabel.textContent = 'Modo Escuro';
        } else {
            themeLabel.textContent = 'Modo Claro';
        }
        body.classList.toggle('dark-mode');
        loginForm.classList.toggle('dark-mode');
        btnConstrast.classList.toggle('dark-mode');
    });
});
