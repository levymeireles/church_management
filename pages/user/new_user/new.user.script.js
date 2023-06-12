$(document).ready(function () {
    const themeToggle = document.querySelector('#themeToggle');
    const themeLabel = document.querySelector('#themeLabel');
    
    const body = document.querySelector('body');
    const loginForm = document.querySelector('#loginForm');
    const username = document.querySelector('#input_username');
    const password = document.querySelector('#input_password');
    const name = document.querySelector('#input_name');
    const email = document.querySelector('#input_email');
    const role = document.querySelector('#input_role');
    const image = document.querySelector('#input_image');
    const btnConstrast = document.querySelector('#btnContrast');

    body.classList.toggle('dark-mode');
    loginForm.classList.toggle('dark-mode');
    btnConstrast.classList.toggle('dark-mode');
    username.classList.toggle('dark-mode');
    password.classList.toggle('dark-mode');
    name.classList.toggle('dark-mode');
    email.classList.toggle('dark-mode');
    role.classList.toggle('dark-mode');
    image.classList.toggle('dark-mode');
    

    themeToggle.addEventListener('change', function () {
        if (this.checked) {
            themeLabel.textContent = 'Modo Escuro';
        } else {
            themeLabel.textContent = 'Modo Claro';
        }
        body.classList.toggle('dark-mode');
        loginForm.classList.toggle('dark-mode');
        btnConstrast.classList.toggle('dark-mode');
        username.classList.toggle('dark-mode');
        password.classList.toggle('dark-mode');
        name.classList.toggle('dark-mode');
        email.classList.toggle('dark-mode');
        role.classList.toggle('dark-mode');
        image.classList.toggle('dark-mode');
        
    });
});
