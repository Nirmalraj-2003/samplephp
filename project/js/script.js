$(document).ready(function() {

    $('#login-trigger').on('click', function(e) {
        e.preventDefault();
        $('#login-popup').fadeIn();
    });

  
    $('.close-btn').on('click', function() {
        $('#login-popup').fadeOut();
    });

   
    $('#register-form').on('submit', function(e) {
        alert('Registered successfully! Redirecting to login...');
    });
});

$('#contact-form').on('submit', function (e) {
    e.preventDefault();

   
    $('#loading-spinner').fadeIn();

    setTimeout(() => {
        $('#loading-spinner').fadeOut();

        const name = $('#name').val();
        const email = $('#email').val();
        const message = $('#message').val();

        if (name && email && message) {
            $('<p class="success-message">Thank you for contacting us! We will get back to you soon.</p>')
                .hide()
                .appendTo('.contact-form-container')
                .fadeIn();

            $('#contact-form')[0].reset();

            setTimeout(() => {
                $('.success-message').fadeOut(() => $(this).remove());
            }, 2000);
        } else {
            $('<p class="error-message">Please fill out all fields.</p>')
                .hide()
                .appendTo('.contact-form-container')
                .fadeIn();

            setTimeout(() => {
                $('.error-message').fadeOut(() => $(this).remove());
            }, 2000);
        }
    }, 2000); 
});
