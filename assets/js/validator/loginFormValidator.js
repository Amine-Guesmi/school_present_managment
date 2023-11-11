$(document).ready(function() {
    $('#email, #password').on('input', function() {
        validateForm();
    });

    function validateForm() {
        var email = $('#email').val();
        var password = $('#password').val();

        // Email validation
        var emailIsValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        if (emailIsValid) {
            $('#email').removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#email').removeClass('is-valid').addClass('is-invalid');
        }

        // Password validation
        var passwordIsValid = password.length >= 8;
        if (passwordIsValid) {
            $('#password').removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#password').removeClass('is-valid').addClass('is-invalid');
        }

        // Enable or disable the submit button
        var isFormValid = emailIsValid && passwordIsValid;
        $('button[type="submit"]').prop('disabled', !isFormValid);
    }
});