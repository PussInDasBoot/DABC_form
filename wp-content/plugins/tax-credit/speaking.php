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
                        <input type="radio" name="speechRestr" id="speechRestrUnable" value="unable">
                        <label for="speechRestrUnable">
                            I am unable to speak and rely on other means of communication, such as sign language or a symbol board, at least 90% of the time.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechRestr" id="speechRestrSevere" value="severeRestr">
                        <label for="speechRestrSevere">
                            I take longer to speak so as to be understood by another person familiar with me, in a quiet setting. 
                        </label>
                    </div>
                </td>
            </tr>
            <tr id="speechSevereRestrFreq" hidden>
                <td>
                    How often does this happen?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="speechRestrFreq" id="speechRestrFreqRarely" value="rarely">
                        <label for="speechRestrFreqRarely">
                            Rarely
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechRestrFreq" id="speechRestrFreqSome" value="some">
                        <label for="speechRestrFreqSome">
                            Some of the time 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechRestrFreq" id="speechRestrFreqVery" value="very">
                        <label for="speechRestrFreqVery">
                            At least 90% of the time
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    When you speak with your doctor, your doctor must ask you to repeat words and sentences. How long does it take to communicate your needs?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="speechDrComm" id="speechDrCommThree" value="three">
                        <label for="speechDrCommThree">
                            At least three times as long, compared to an average person my age without my restrictions.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechDrComm" id="speechDrCommTwo" value="two">
                        <label for="speechDrCommTwo">
                            At least two times as long, compared to an average person my age without my restrictions.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechDrComm" id="speechDrCommLittle" value="little">
                        <label for="speechDrCommLittle">
                            A little bit longer, compared to an average person my age without my restrictions.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechDrComm" id="speechDrCommSame" value="same">
                        <label for="speechDrCommSame">
                            The same amount of time, compared to an average person my age without my restrictions.
                        </label>
                    </div>
                <td>
            </tr>
            <tr>
                <td>
                    What happens when you speak?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="speechWhatHappens" id="speechWhatHappensVol" value="vol">
                        <label for="speechWhatHappensVol">
                            Low-volume
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechWhatHappens" id="speechWhatHappensSlur" value="slur">
                        <label for="speechWhatHappensSlur">
                            Slurring
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechWhatHappens" id="speechWhatHappensStut" value="stut">
                        <label for="speechWhatHappensStut">
                            Stuttering
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
                        <input type="radio" name="speechTherapy" id="speechTherapyNo" value="no">
                        <label for="speechTherapyNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechTherapy" id="speechTherapyYes" value="yes">
                        <label for="speechTherapyYes">
                            Yes
                        </label>
                      Explain: 
                        <input type="text" id="speechTherapyExplain"></input>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    What year did your restriction with speech begin?
                </td>
                <td>
                    <select name="speechBegin">
                    '; 
                    
                        for ($i = date('Y') ; $i > 1950; $i--) {
                            echo "<option>$i</option>";
                        };
                    
                    echo '</select>
                </td>
            </tr>
            <tr>
                <td>
                    Was your speech restriction resolved? If yes please indicate what year.
                </td>
                <td>
                    <select name="speechResolve">
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