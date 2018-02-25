<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="form-wrap">
    <form action="" method="POST" class="form email-subscription-form">
        <div class="element-wrap">
            <label for="subscription-email"></label>
            <input type="email" name="subscription-email">
        </div>
        <div class="element-wrap">
            <label for="subscription-email"></label>
            <?php wp_nonce_field( 'email_subscription', 'email_subscription_nonce' ); ?>
            <input type="submit" name="subscribe" value="Subscribe">
        </div>
    </form>
</div>
