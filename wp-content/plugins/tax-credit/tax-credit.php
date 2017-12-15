<?php 
/**
* Plugin Name: tax-credit */

require_once dirname( __FILE__ ) .'/hearing.php';
require_once dirname( __FILE__ ) .'/speaking.php';

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function vision_registration_function() {

 
    echo '
    <p>This tool will create documents that will help you and your health care provider complete the application for the Disability Tax Credit, commonly referred to as the DTC.</p>

    <p>There are a couple different ways you can qualify for the DTC:</p>

    <p>You can qualify for the Disability Tax Credit if you have one severe restriction in the following categories or two or more significant restrictions. Restrictions that occur 90% of the time are most relevent.</p>

    <p>You are restricted in a health area if you are unable to do an activity or if you require longer to do an activity compared to an average person your age, even with appropriate medication, therapy or devices. For example, if you have a severe restriction with your vision which is corrected by wearing glasses, this restriction is not relevent to your Disability Tax Credit Application.</p>

    <p>Do you have any restrictions in the following health areas? Complete all sections that apply:</p>


    <button class="accordion">Vision</button>
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
                        <input type="radio" name="visionRestr" id="visionRestrBlind" value="legallyBlind">
                        <label for="visionRestrBlind">
                            I am legally blind, with a visual acuity of 20/200 or less with the Snellen Chart or field of vision in both eyes is 20 degrees or less.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="visionRestr" id="visionRestrSevere" value="severeRestr">
                        <label for="visionRestrSevere">
                            I am not legally blind. I have less severe restrictions in my vision. 
                            Explain: 
                            <input type="text" id="visionSevereRestrExplain"></input>
                        </label>
                    </div>
                </td>
            </tr>
            <tr id="visionSevereRestrictionFreq">
                <td>
                    How often does this happen?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="visionRestrFreq" id="visionRestrFreqRarely" value="rarely">
                        <label for="visionRestrFreqRarely">
                            Rarely
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="visionRestrFreq" id="visionRestrFreqSome" value="some">
                        <label for="visionRestrFreqSome">
                            Some of the time 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="visionRestrFreq" id="visionRestrFreqVery" value="very">
                        <label for="visionRestrFreqVery">
                            At least 90% of the time
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Do you use any appropriate therapy, medication or devices? If yes, please describe.
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="visionTherapy" id="visionTherapyNo" value="no">
                        <label for="visionTherapyNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="visionTherapy" id="visionTherapyYes" value="yes">
                        <label for="visionTherapyYes">
                            Yes
                        </label>
                      Explain: 
                        <input type="text" id="visionTherapyExplain"></input>
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

// Register a new shortcode: [vision]
add_shortcode( 'vision', 'vision_registration_shortcode' );
 
// The callback function that will replace [book]
function vision_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    vision_registration_function();
    return ob_get_clean();
}


?>