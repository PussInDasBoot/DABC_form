<?php 
wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function hearing_registration_function() {

 
    echo '
    <button class="accordion">Hearing</button>
    <div class="panel">
        <table>
            <tr>
            <button id="submit">Submit</button>
            </tr>
        </table>
    </div>
    ';
}


// Register a new shortcode: [hearing]
add_shortcode( 'hearing', 'hearing_registration_shortcode' );
 
// The callback function that will replace [book]
function hearing_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    hearing_registration_function();
    return ob_get_clean();
}


?>