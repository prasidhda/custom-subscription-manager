<?php
/*
 * Backend UI to send the bulk emails
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
include_once CSM_DIR . '/includes/admin/bulk-emails-handler.php';
?>
<style>
    .subscribers-lists input{
        height: 40px;
    }
    .subscribers-lists textarea{
        min-height: 300px;
    }
    .subscribers-lists input,
    .subscribers-lists textarea{
        width: 75%;
    }
    .subscribers-lists input[type="submit"]{
        width: auto; 
    }
</style>
<div class="wrap subscribers-lists" >
    <form action="" method="post">
        <nav class="nav-tab-wrapper">
            <a class="nav-tab" href="<?php echo admin_url('admin.php?page=email-subscribers'); ?>">Subscribers</a>
            <a class="nav-tab nav-tab-active" href="<?php echo admin_url('admin.php?page=send-bulk-emails'); ?>">Send Emails</a>
        </nav>
        <h1>Bulk Emails Area</h1>
        <table class="form-table">
            <tbody>
                <!-- Email Header Area  -->
                <tr>
                    <th>
                        <label for="csm_email_header_from"><?php _e( 'Email Header From:', 'custom-subscriptions-manager' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" name="csm_email_header_from" value="<?php echo get_option('csm_email_header_from'); ?>">
                    </td>
                </tr>
                <!-- Email Subject  -->
                <tr>
                    <th>
                         <label for="csm_email_header_subject"><?php _e('Email Header Subject:' , 'custom-subscriptions-manager' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" name="csm_email_header_subject" value="<?php echo get_option('csm_email_header_subject'); ?>">
                    </td>
                </tr>
                <!-- Email Body Content Field Area -->
                <tr>
                    <th scope="row">
                        <label for="csm_email_content"><?php _e( 'Email Body Content', 'custom-subscriptions-manager' ); ?></label>
                    </th>
                    <td>
                        <textarea class="input-text wide-input" name="csm_email_content" ><?php echo get_option( 'csm_email_content' ); ?></textarea>
                    </td>
                </tr>
                <!-- Submit Area -->
                <tr>
                    <th scope="row"></th>
                    <td>
                        <?php wp_nonce_field( 'send_bulk_emails', 'send_bulk_emails_nonce' ); ?>
                        <input type="submit" value="Send Bulk Emails" name="send_bulk_emails">
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</div>

