// script.js
jQuery(document).ready(function($) {
    var modal = $('#nm-modal');
    var closeBtn = $('.nm-close');

    // Show the modal after 2 seconds
    setTimeout(function() {
        modal.css('display', 'flex');
    }, 2000);

    // Close the modal when the user clicks the 'x' button
    closeBtn.on('click', function() {
        modal.css('display', 'none');
    });

    // Close the modal when the user clicks anywhere outside of the modal
    $(window).on('click', function(event) {
        if ($(event.target).is(modal)) {
            modal.css('display', 'none');
        }
    });

    // Handle form submission via AJAX
    $('form.nm-modal-body').on('submit', function(event) {
        event.preventDefault();
        var email = $(this).find('input[type="email"]').val();

        $.ajax({
            url: nm_ajax_obj.ajax_url,  // Use the localized ajax_url
            type: 'POST',
            data: {
                action: 'nm_subscribe',
                nm_email: email
            },
            success: function(response) {
                alert('Thank you for subscribing!');
                modal.css('display', 'none');
            },
            error: function() {
                alert('There was an error. Please try again.');
            }
        });
    });
});
