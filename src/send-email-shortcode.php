<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register our [podio_send_admin_email_form_fill] shortcode.
 */
add_shortcode( 'podio_send_admin_email_form_fill', 'send_admin_email_form_fill' );

function send_admin_email_form_fill(){
    ob_start();
    ?>
    <form id="frontend_form_finish" method="post" action="">
        <label for="subject">Comments</label>
        <textarea id="comments" name="msg" placeholder="Let us know if you have any comments, directions or feedback regarding this form." style="height:100px"></textarea>
        <input type="submit" value="Let's Go Live !">
        <input type="hidden" name="action" value="frontend_form_filled_submission">
    </form>
	<div id="frontend_form_filled_feedback" style="margin-top:30px;padding:5px;background-color:#333;color:white;display:none;"></div>
    <?php
    return ob_get_clean();
}
