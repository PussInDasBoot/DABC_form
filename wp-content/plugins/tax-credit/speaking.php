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
                    Do you have medical conditions or diagnoses that restrict your ability to speak most of the time? Please list all if more than one.
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
            <tbody id="speechUnable" hidden>
                <tr>
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
                            <input type="radio" name="speechLonger" id="speechLongerThree" value="three">
                            <label for="speechLongerThree">
                                At least three times as long, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="speechLonger" id="speechLongerTwo" value="two">
                            <label for="speechLongerTwo">
                                At least two times as long, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="speechLonger" id="speechLongerLittle" value="little">
                            <label for="speechLongerLittle">
                                A little bit longer, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="speechLonger" id="speechLongerSame" value="same">
                            <label for="speechLongerSame">
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
                        <div>
                            <input type="checkbox" name="speechDescribe" id="speechDescribeVol" value="vol">
                            <label for="speechDescribeVol">
                                Low-volume
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="speechDescribe" id="speechDescribeSlur" value="slur">
                            <label for="speechDescribeSlur">
                                Slurring
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="speechDescribe" id="speechDescribeStut" value="stut">
                            <label for="speechDescribeStut">
                                Stuttering
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="speechDescribe" id="speechDescribeEnun" value="enun">
                            <label for="speechDescribeEnun">
                                Poor enunciation
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Do you use any appropriate therapy, medication or devices to assist you?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="speechTherapyYesNo" id="speechTherapyNo" value="no">
                            <label for="speechTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="speechTherapyYesNo" id="speechTherapyYes" value="yes">
                            <label for="speechTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="speechTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="speechTherapyAssist" id="speechTherapyDevices" value="devices">
                                <label for="speechTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="speechTherapyAssist" id="speechTherapyTherapy" value="therapy">
                                <label for="speechTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="speechTherapyAssist" id="speechTherapyMedication" value="medication">
                                <label for="speechTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                    </td>
                </tr>
                <tr id="speechDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="speechDevices" id="speechDevicesAdaptive" value="adaptive">
                            <label for="speechDevicesAdaptive">
                                Adaptive equipment 
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="speechDevices" id="speechDevicesOther" value="other">
                            <label for="speechDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="speechDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="speechTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="speechTherapy" id="speechTherapyPhysio" value="physio">
                            <label for="speechTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="speechTherapy" id="speechTherapyChiro" value="chiro">
                            <label for="speechTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="speechTherapy" id="speechTherapyMassage" value="massage">
                            <label for="speechTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="speechTherapy" id="speechTherapyOcc" value="occ">
                            <label for="speechTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="speechTherapy" id="speechTherapyOther" value="other">
                            <label for="speechTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="speechTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="speechMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="speechMedication">
                            <input type="text" id="speechMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>
                    What year did your restriction begin?
                </td>
                <td>
                    <select id="speechBegin">
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
                        <input type="radio" name="speechResolve" id="speechResolveNo" value="no">
                        <label for="speechResolveNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="speechResolve" id="speechResolveYes" value="yes">
                        <label for="speechResolveYes">
                            Yes
                        </label>
                    </div>
                    <div id="speechResolveYear" hidden>
                        In which year was it resolved?
                    <select id="speechResolveYearSelect">
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