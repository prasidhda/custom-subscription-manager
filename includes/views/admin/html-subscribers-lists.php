<?php
/*
 * HTML to render the lists of subscribers
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once CSM_DIR . '/includes/admin/update-subscription-lists.php';
?>

<div class="wrap subscribers-lists">
    <form action="" method="post">
        <nav class="nav-tab-wrapper">
            <a class="nav-tab nav-tab-active" href="<?php echo admin_url('admin.php?page=email-subscribers'); ?>">Subscribers</a>
            <a class="nav-tab" href="<?php echo admin_url('admin.php?page=send-bulk-emails'); ?>">Send Emails</a>
        </nav>
        <h1>Email Subscribers</h1>
        <p>Use the shortcode [subscription-form] to show the form in the frontend.</p>
        <table class="form-table">
            <tbody>
            <td>
                <textarea class="input-text wide-input" name="csm_email_subscribers" style="width: 75%; height: 300px;" cols="50"><?php echo get_option( 'csm_email_subscribers' ); ?></textarea>
            </td>
            </tr>
            <tr valign="top">
                <td>
					<?php wp_nonce_field( 'update_subscription_lists', 'update_subscription_lists_nonce' ); ?>
                    <input type="submit" value="Update Lists" name="update_subscription_lists">
                </td>
            </tr>

            </tbody>
        </table>
    </form>
</div>

