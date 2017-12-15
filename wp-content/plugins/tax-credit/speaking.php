<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function speaking_registration_function() {

 
    echo '
    <button class="accordion">Speaking</button>
    <div class="panel">
      <table>
            <tr>
                <td>
                    Do you have medical conditions or diagnoses that restricts your ability to speak? Please list all if more than one.
                </td>
                <td>
                    <textarea id="speechMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                      <label>
                        <input type="radio" name="speechRestr" id="unable" value="unable">
                        I am unable to speak and rely on other means of communication, such as sign language or a symbol board, at least 90% of the time.
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="speechRestr" id="severeRestr" value="severeRestr">
                        I take longer to speak so as to be understood by another person familiar with me, in a quiet setting. 
                      </label>
                    </div>
                </td>
            </tr>
            <tr id="speechSevereRestrictionFreq" hidden>
                <td>
                    How often does this happen?
                </td>
                <td>
                    <div class="radio">
                      <label>
                        <input type="radio" name="speechRestrFreq" id="rarely" value="rarely">
                        Rarely
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="speechRestrFreq" id="some" value="some">
                        Some of the time 
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="speechRestrFreq" id="very" value="very">
                        At least 90% of the time
                      </label>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    ';
}


// Register a new shortcode: [speaking]
add_shortcode( 'speaking', 'speaking_registration_shortcode' );
 
// The callback function that will replace [book]
function speaking_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    speaking_registration_function();
    return ob_get_clean();
}


?>