<?php 
/**
* Plugin Name: tax-credit */

require_once dirname( __FILE__ ) .'/hearing.php';
require_once dirname( __FILE__ ) .'/speaking.php';
require_once dirname( __FILE__ ) .'/eliminating.php';
require_once dirname( __FILE__ ) .'/walking.php';
require_once dirname( __FILE__ ) .'/feeding.php';
require_once dirname( __FILE__ ) .'/dressing.php';
require_once dirname( __FILE__ ) .'/mentalfunctions.php';
require_once dirname( __FILE__ ) .'/lifesustaining.php';


wp_enqueue_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__), array('jquery'));

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function vision_registration_function() {

 
    echo '
    <p>This tool will create and email documents to you that will help you and your health care provider complete the application for the Disability Tax Credit, commonly referred to as the DTC.</p>

    <p>There are a couple different ways you can qualify for the DTC:</p>

    <ol>
        <li>If you have <b>one severe restriction*</b> in the categories below
        </li>
        <li>If you have <b>two or more significant restrictions*</b> in the categories below<br><em>Restrictions that occur 90% of the time are most relevant.</em>
        </li>
    </ol>

    <p>*You are restricted in a health area if you are unable to do an activity or if you require longer to do an activity compared to an average person your age, even with appropriate medication, therapy or devices. For example, if you have a severevisual impairment that is corrected by wearing glasses, this restriction is not relevant to your Disability Tax Credit Application.</p>

    <p>Do you have any restrictions in the following health areas? Please complete all sections that apply and then enter your email address to receive your documents and further instructions on how to apply for the DTC.</p>


    <button id="vision_button" class="accordion">Vision</button>
    <div id="vision_section" class="panel">
        <table>
            <tr>
                <td>
                    Do you have a vision restriction?
                </td>
                <td>
                    <span class="radio">
                        <input type="radio" name="visionYesNo" id="visionNo" value="no">
                        <label for="visionNo">
                            No&emsp;
                        </label>
                    </span>
                    <span class="radio">
                        <input type="radio" name="visionYesNo" id="visionYes" value="yes">
                        <label for="visionYes">
                            Yes
                        </label>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Do you have medical conditions or diagnoses that restrict your vision most of the time? Please list all if more than one.
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
                        <input type="radio" name="visionRestr" id="visionRestrUnable" value="unable">
                        <label for="visionRestrUnable">
                            I am legally blind, with a visual acuity of 20/200 or less with the Snellen Chart or field of vision in both eyes is 20 degrees or less.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="visionRestr" id="visionRestrSevere" value="severeRestr">
                        <label for="visionRestrSevere">
                            I am not legally blind. I have less severe restrictions in my vision. 
                        </label>
                    </div>
                    <div id="visionRestrExplain" hidden>
                        Explain:
                        <input type="text" id="visionRestrExplainInput"></input>
                    </div>
                </td>
            </tr>
            <tbody id="visionAble" hidden>
                <tr>
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
                        Describe your effects:
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsBlurred" value="blurred">
                            <label for="visionEffectsBlurred">
                                Blurred vision
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsSensitivity" value="sensitivity">
                            <label for="visionEffectsSensitivity">
                                Sensitivity to light
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsDouble" value="double">
                            <label for="visionEffectsDouble">
                                Double vision
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsTraffic" value="traffic">
                            <label for="visionEffectsTraffic">
                                Difficulty reading traffic signs
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsText" value="text">
                            <label for="visionEffectsText">
                                Difficulty reading text or books
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsBlindSpots" value="blindSpots">
                            <label for="visionEffectsBlindSpots">
                                Blind spots
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsReduced" value="reduced">
                            <label for="visionEffectsReduced">
                                Reduced field of vision
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsFlashing" value="flashing">
                            <label for="visionEffectsFlashing">
                                Flashing lights/wavy lines in vision
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="visionEffects" id="visionEffectsOther" value="other">
                            <label for="visionEffectsOther">
                                Other:
                            </label>
                            <input type="text" id="visionEffectsOtherInput"></input>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Do you use any appropriate therapy, medication or devices?
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
                        </div>
                        <div id="visionTherapyExplain" hidden>
                            Explain:
                            <input type="text" id="visionTherapyExplainInput"></input>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>
                    What year did your restriction begin?
                </td>
                <td>
                    <select id="visionBegin">
                    '; 
                    
                        for ($i = date('Y') ; $i > 1950; $i--) {
                            echo "<option>$i</option>";
                        };
                    
                    echo '</select>
                </td>
            </tr>
            <tr>
                <td>
                    Has your restriction resolved?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="visionResolve" id="visionResolveNo" value="no" checked>
                        <label for="visionResolveNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="visionResolve" id="visionResolveYes" value="yes">
                        <label for="visionResolveYes">
                            Yes
                        </label>
                    </div>
                    <div id="visionResolveYear" hidden>
                        In which year was it resolved?
                        <select id="visionResolveYearSelect">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    <div>
                </td>
            </tr>
        </table>
    </div>
    ';
}

// Send email
if (isset($_POST['email'])) {
    email();
}

function email() {
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($_POST['emailAddress'],"Next Steps for Disability Tax Credit (DTC) Application",$_POST['email'], $headers);
    error_log("Email", 0);
    exit;
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