<?php
/*
Plugin Name: ER block spam emails for cf7 forms
Description: block specific spam emails for cf7 by emails spam list
Author: Eyal Ron Web Development
Developer: Eyal Ron
version: 1.0
@create date 2021-01-25 12:43:07
@modify date 2021-01-25 12:43:07
*/
//// Validate if Email field is in spam list
add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
function custom_email_confirmation_validation_filter( $result, $tag ) {
    $email_field = 'your-email';//the id of the email field
    $spamemails = array(//array of emails to block - add as many as necessary
        "ericjonesonline@outlook.com",
        "eric@talkwithwebvisitor.com"
    );
    if ( $email_field == $tag->name ) {
        $your_email = isset( $_POST[$email_field] ) ? trim( $_POST[$email_field] ) : '';
        if (in_array( $your_email , $spamemails)) {
            $result->invalidate( $tag, "Are you sure this is the correct address?" );
        }
    }
    return $result;
}
