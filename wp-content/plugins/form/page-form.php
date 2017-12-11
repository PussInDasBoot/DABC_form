<?php 
/**
* Plugin Name: form */

add_action('init', 'register_my_script');
add_action('wp_footer', 'print_my_script');

function register_my_script() {
    wp_register_script('tax-credit', plugins_url('/js/tax-credit.js', __FILE__ ));
}

function print_my_script() {
    global $add_my_script;

    if ( ! $add_my_script )
        return;

    wp_print_scripts('tax-credit');
}

wp_register_script('tax-credit', plugins_url('/js/tax-credit.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function custom_registration_function() {

 
    echo '
    <p>This tool will create documents that will help you and your health care provider complete the application for the Disability Tax Credit, commonly referred to as the DTC.</p>

    <p>There are a couple different ways you can qualify for the DTC:</p>

    <p>You can qualify for the Disability Tax Credit if you have one severe restriction in the following categories or two or more significant restrictions. Restrictions that occur 90% of the time are most relevent.</p>

    <p>You are restricted in a health area if you are unable to do an activity or if you require longer to do an activity compared to an average person your age, even with appropriate medication, therapy or devices. For example, if you have a severe restriction with your vision which is corrected by wearing glasses, this restriction is not relevent to your Disability Tax Credit Application.</p>

    <p>Do you have any restrictions in the following health areas? Complete all sections that apply:</p>


    <button class="accordion">Section 1</button>
    <div class="panel">
      <p>Lorem ipsum...</p>
    </div>

    <button class="accordion">Section 2</button>
    <div class="panel">
      <p>Lorem ipsum...</p>
    </div>

    <button class="accordion">Section 3</button>
    <div class="panel">
      <p>Lorem ipsum...</p>
    </div>
    ';
}

// function form() {

// }

// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}


?>