<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function walking_registration_function() {

 
    echo '
    <button class="accordion">Walking</button>
    <div class="panel">
      <table>
            <tr>
                <td>
                    Do you have medical conditions or diagnoses that restrict your walking most of the time? Please list all if more than one.
                </td>
                <td>
                    <textarea id="walkingMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="walkingAble" id="walkingUnable" value="unable">
                        <label for="walkingUnable">
                            I am unable to walk
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="walkingAble" id="walkingAble" value="able">
                        <label for="walkingAble">
                            I am able to walk
                        </label>
                    </div>
                    <div id="walkingRestr" hidden>
                        <div>
                            <input type="checkbox" name="walkingRestr" id="walkingRestrSlow" value="slow">
                            <label for="walkingRestrSlow">
                                I walk slowly
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingRestr" id="walkingRestrRest" value="rest">
                            <label for="walkingRestrRest">
                                I need to stop walking and rest frequently
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingRestr" id="walkingRestrStairs" value="stairs">
                            <label for="walkingRestrStairs">
                                I am restricted in walking up/down stairs
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingRestr" id="walkingRestrIncline" value="incline">
                            <label for="walkingRestrIncline">
                                I am restricted in walking up/down an incline
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingRestr" id="walkingRestrOther" value="other">
                            <label for="walkingRestrOther">
                                Other:
                            </label>
                            <input type="text" id="walkingRestrOtherInput"></input>     
                        </div>
                    </div>
                </td>
            </tr>
            <tbody id="walkingAbleDescribe" hidden>
                <tr>
                    <td>
                        What causes you to be restricted?
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCausePain" value="pain">
                            <label for="walkingCausePain">
                                Pain
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseStiffness" value="stiffness">
                            <label for="walkingCauseStiffness">
                                Stiffness
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseNumbness" value="numbness">
                            <label for="walkingCauseNumbness">
                                Numbness
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseFatigue" value="fatigue">
                            <label for="walkingCauseFatigue">
                                Fatigue
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseMotion" value="motion">
                            <label for="walkingCauseMotion">
                                Limited range of motion
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseBalance" value="balance">
                            <label for="walkingCauseBalance">
                                Poor coordination/balance
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseMotor" value="motor">
                            <label for="walkingCauseMotor">
                                Poor motor skills
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingCause" id="walkingCauseOther" value="other">
                            <label for="walkingCauseOther">
                                Other:
                            </label>
                            <input type="text" id="walkingCauseOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        How much longer does it take you to climb a flight of stairs or walk up one block on an incline compared to an average person your age?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="walkingLonger" id="walkingLongerFour" value="four">
                            <label for="walkingLongerFour">
                                I take at least four times as long
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingLonger" id="walkingLongerThree" value="three">
                            <label for="walkingLongerThree">
                                I take at least three times as long
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingLonger" id="walkingLongerTwo" value="two">
                            <label for="walkingLongerTwo">
                                I take at least twice as long
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingLonger" id="walkingLongerLittle" value="little">
                            <label for="walkingLongerLittle">
                                I take slightly longer
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        How frequently do you need to stop and rest while you are walking?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreqSteps" value="steps">
                            <label for="walkingFreqSteps">
                                Every couple steps
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreqHalfBlock" value="balfBlock">
                            <label for="walkingFreqHalfBlock">
                                Every half block
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreqBlock" value="block">
                            <label for="walkingFreqBlock">
                                Every block
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreqTwoBlocks" value="twoBlocks">
                            <label for="walkingFreqTwoBlocks">
                                Every two blocks
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreq10" value="10">
                            <label for="walkingFreq10">
                                Every 10 minutes
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreq20" value="20">
                            <label for="walkingFreq20">
                                Every 20 minutes
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingFreq" id="walkingFreq30" value="30">
                            <label for="walkingFreq30">
                                Every 30 minutes
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        Do you use any appropriate therapy, medication or devices to assist you?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="walkingTherapyYesNo" id="walkingTherapyNo" value="no">
                            <label for="walkingTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingTherapyYesNo" id="walkingTherapyYes" value="yes">
                            <label for="walkingTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="walkingTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="walkingTherapy" id="walkingTherapyDevices" value="devices">
                                <label for="walkingTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="walkingTherapy" id="walkingTherapyTherapy" value="therapy">
                                <label for="walkingTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="walkingTherapy" id="walkingTherapyMedication" value="medication">
                                <label for="walkingTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                        
                    </td>
                </tr>
                <tr id="walkingDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="walkingDevices" id="walkingDevicesCane" value="cane">
                            <label for="walkingDevicesCane">
                                Cane
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingDevices" id="walkingDevicesBrace" value="brace">
                            <label for="walkingDevicesBrace">
                                Brace
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingDevices" id="walkingDevicesWalker" value="walker">
                            <label for="walkingDevicesWalker">
                                Walker
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingDevices" id="walkingDevicesWheelChair" value="wheelChair">
                            <label for="walkingDevicesWheelChair">
                                Wheelchair
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingDevices" id="walkingDevicesOther" value="other">
                            <label for="walkingDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="walkingDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="walkingTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="walkingTherapy" id="walkingTherapyPhysio" value="physio">
                            <label for="walkingTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingTherapy" id="walkingTherapyChiro" value="chiro">
                            <label for="walkingTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingTherapy" id="walkingTherapyMassage" value="massage">
                            <label for="walkingTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingTherapy" id="walkingTherapyOcc" value="occ">
                            <label for="walkingTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="walkingTherapy" id="walkingTherapyOther" value="other">
                            <label for="walkingTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="walkingTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="walkingMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="walkingMedication">
                            <input type="text" id="walkingMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        What year did your restriction begin?
                    </td>
                    <td>
                        <select name="walkingBegin">
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
                            <input type="radio" name="walkingResolve" id="walkingResolveNo" value="no">
                            <label for="walkingResolveNo">
                                No 
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="walkingResolve" id="walkingResolveYes" value="yes">
                            <label for="walkingResolveYes">
                                Yes
                            </label>
                        </div>
                        <div id="walkingResolveYear" hidden>
                            In which year was it resolved?
                        <select name="walkingResolveYear">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    ';
}


// Register a new shortcode: [walking]
add_shortcode( 'walking', 'walking_registration_shortcode' );
 
// The callback function that will replace [book]
function walking_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    walking_registration_function();
    return ob_get_clean();
}


?>