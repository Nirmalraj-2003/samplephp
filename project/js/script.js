$(document).ready(function() {
    // Open login popup
    $('#login-trigger').on('click', function(e) {
        e.preventDefault();
        $('#login-popup').fadeIn();
    });

    // Close login popup
    $('.close-btn').on('click', function() {
        $('#login-popup').fadeOut();
    });

    // Submit contact form
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        alert('Message submitted successfully!');
        $(this)[0].reset();
    });
});
$(document).ready(function() {
    // Open login popup
    $('#login-trigger').on('click', function(e) {
        e.preventDefault();
        $('#login-popup').fadeIn();
    });

    // Close login popup
    $('.close-btn').on('click', function() {
        $('#login-popup').fadeOut();
    });

    // Register form success simulation
    $('#register-form').on('submit', function(e) {
        alert('Registered successfully! Redirecting to login...');
    });
});
$(document).ready(function () {
    // Show contact form with animation
    $('.contact-form-container').css('opacity', 0).animate({ opacity: 1, top: "0px" }, 1000);

    // Handle form submission
    $('#contact-form').on('submit', function (e) {
        e.preventDefault(); // Prevent actual form submission

        const name = $('#name').val();
        const email = $('#email').val();
        const message = $('#message').val();

        if (name && email && message) {
            // Simulate a successful submission
            $('<p class="success-message">Thank you for contacting us! We will get back to you soon.</p>')
                .hide()
                .appendTo('.contact-form-container')
                .fadeIn();

            // Clear form fields
            $('#contact-form')[0].reset();

            // Remove success message after 3 seconds
            setTimeout(() => {
                $('.success-message').fadeOut(() => $(this).remove());
            }, 3000);
        } else {
            $('<p class="error-message">Please fill out all fields.</p>')
                .hide()
                .appendTo('.contact-form-container')
                .fadeIn();

            // Remove error message after 3 seconds
            setTimeout(() => {
                $('.error-message').fadeOut(() => $(this).remove());
            }, 3000);
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const loginTrigger = document.getElementById('login-trigger');
    const loginPopup = document.getElementById('login-popup');
    const overlay = document.getElementById('popup-overlay');

    // Show login popup
    loginTrigger.addEventListener('click', (e) => {
        e.preventDefault();
        loginPopup.classList.add('active');
        overlay.classList.add('active');
    });

    // Hide login popup when overlay is clicked
    overlay.addEventListener('click', () => {
        loginPopup.classList.remove('active');
        overlay.classList.remove('active');
    });
});

    // Show login popup
    function showLoginPopup() {
        document.getElementById("login-modal").style.display = "block";
    }

    // Close login popup
    function closeLoginPopup() {
        document.getElementById("login-modal").style.display = "none";
    }

    // Close popup if clicked outside of the modal
    window.onclick = function(event) {
        if (event.target == document.getElementById("login-modal")) {
            closeLoginPopup();
        }
    }

  
    // Open and close login popup
    const loginBtn = document.getElementById('login-btn');
    const closePopup = document.getElementById('close-popup');
    const loginPopup = document.getElementById('login-popup');

    loginBtn.addEventListener('click', () => {
        loginPopup.style.display = 'flex';
    });

    closePopup.addEventListener('click', () => {
        loginPopup.style.display = 'none';
    });

    $(document).ready(function () {
        // Show login modal when the login button is clicked
        $("#login-btn").click(function () {
            $("#login-modal").fadeIn();
        });
    
        // Close the modal when the close button is clicked
        $(".close").click(function () {
            $("#login-modal").fadeOut();
        });
    
        // Close the modal if clicked outside the modal content
        $(window).click(function (e) {
            if ($(e.target).is("#login-modal")) {
                $("#login-modal").fadeOut();
            }
        });
    });
    
   
    function showLoginModal() {
        document.getElementById('login-modal').style.display = 'block';
    }

    function closeLoginModal() {
        document.getElementById('login-modal').style.display = 'none';
    }

    function showCreateBlogModal() {
        document.getElementById('create-blog-modal').style.display = 'block';
    }
    function closeCreateBlogModal() {
        document.getElementById('create-blog-modal').style.display = 'none';
    }

    // Modal Functions for Edit Blog
    function editBlog(id, title, content) {
        document.getElementById('edit_blog_id').value = id;
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_content').value = content;
        document.getElementById('edit-blog-modal').style.display = 'block';
    }
    function closeEditBlogModal() {
        document.getElementById('edit-blog-modal').style.display = 'none';
    }