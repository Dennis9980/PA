const togglePassword = document.querySelector('#togglePassword');
const passwordInput = document.querySelector('#password');
const eyeIcon = document.querySelector('#eye');
const slashIcon = document.querySelector('#slash');

if(togglePassword){
    togglePassword.addEventListener('click', function(e) {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    
        eyeIcon.classList.toggle('hidden');
        slashIcon.classList.toggle('hidden');
    });
}