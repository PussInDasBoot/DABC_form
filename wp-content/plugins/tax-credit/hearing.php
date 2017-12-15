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
                <td>
                    Do you have medical conditions or diagnoses that restricts your vision? Please list all if more than one.
                </td>
                <td>
                    <textarea id="visionMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                      <label>
                        <input type="radio" name="visionRestr" id="legallyBlind" value="legallyBlind">
                        I am legally blind, with a visual acuity of 20/200 or less with the Snellen Chart or field of vision in both eyes is 20 degrees or less.
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="visionRestr" id="severeRestr" value="severeRestr">
                        I am not legally blind. I have less severe restrictions in my vision. 
                        Explain: 
                        <input type="text" id="visionSevereRestrExplain"></input>
                      </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    What year did your restriction with vision begin?
                </td>
                <td>
                    <select name="visionBegin">
                    '; 
                    
                        for ($i = date('Y') ; $i > 1950; $i--) {
                            echo "<option>$i</option>";
                        };
                    
                    echo '</select>
                </td>
            </tr>
            <tr>
                <td>
                    Was your vision restriction resolved? If yes please indicate what year.
                </td>
                <td>
                    <select name="visionResolve">
                    '; 
                    
                        for ($i = date('Y') ; $i > 1950; $i--) {
                            echo "<option>$i</option>";
                        };
                    
                    echo '</select>
                </td>
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