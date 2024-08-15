//assets/js/scripts.js

jQuery(document).ready(function($) {
    var modal = $('#nm-modal');
    var closeBtn = $('.nm-close');

    // Function to get a cookie by name
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
            return match[2];
        }
        return null;
    }

    // Function to set a cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Check if the session cookie exists
    if (!getCookie('nm_modal_shown')) {
        // Show the modal after 2 seconds if the cookie is not set
        setTimeout(function() {
            modal.css('display', 'flex');
        }, 2000);

        // Set the cookie to expire at the end of the session
        setCookie('nm_modal_shown', 'true');
    }

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
                if (response.success) {
                    $('.nm-modal-content').hide();
                    $('#nm-thank-you').show();  // Show thank you message

                    // Check if the data layer exists, if not, create it
                    window.dataLayer = window.dataLayer || [];

                    // Push the generate_lead event to the data layer
                    window.dataLayer.push({
                        event: 'generate_lead',
                        lead_source: 'jerry modal'
                    });

                    console.log('Lead event pushed to the data layer.');
                } else {
                    alert('There was an error: ' + response.data);
                }
            },
            error: function() {
                alert('There was an error. Please try again.');
            }
        });
    });
});
