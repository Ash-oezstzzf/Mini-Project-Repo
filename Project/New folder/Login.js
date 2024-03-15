document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const message = document.getElementById('message');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Replace these hardcoded credentials with your actual authentication logic
        const validUsername = 'user';
        const validPassword = 'password';

        if (username === validUsername && password === validPassword) {
            message.textContent = 'Login successful';
            // Redirect the user to the desired page or perform other actions here
        } else {
            message.textContent = 'Login failed. Please check your credentials.';
        }
    });
});