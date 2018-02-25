jQuery(function ($) {
    var subscriptionForm = $('form.email-subscription-form')
    subscriptionForm.submit(function (event) {
        console.log($(this).find('input[type=email]').val());
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'email_subscription',
                email_subscription_nonce: $(this).find('input[name="email_subscription_nonce"]').val(),
                email_id: $(this).find('input[type=email]').val(),
            },
            success: function (response) {
                alert(response.message);
                console.log(response);
            },
            error: function (response) {

            }
        });
        return false;
    });
});