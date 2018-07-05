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
                    Do you have a hearing restriction?
                </td>
                <td>
                    <span class="radio">
                        <input type="radio" name="hearingYesNo" id="hearingNo" value="no">
                        <label for="hearingNo">
                            No&emsp;
                        </label>
                    </span>
                    <span class="radio">
                        <input type="radio" name="hearingYesNo" id="hearingYes" value="yes">
                        <label for="hearingYes">
                            Yes
                        </label>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Do you have medical conditions or diagnoses that restrict your hearing most of the time? Please list all if more than one.
                </td>
                <td>
                    <textarea id="hearingMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="hearingRestr" id="hearingRestrUnable" value="unable">
                        <label for="hearingRestrUnable">
                            I am deaf/unable to hear and understand another person.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="hearingRestr" id="hearingRestrSevere" value="severeRestr">
                        <label for="hearingRestrSevere">
                            I take longer to hear and understand another person familiar with the me, in a quiet setting. 
                        </label>
                    </div>
                </td>
            </tr>
            <tbody id="hearingAble" hidden>
                <tr>
                    <td>
                        How much longer do you require to hear and understand?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="hearingLonger" id="hearingLongerThree" value="three">
                            <label for="hearingLongerThree">
                                At least three times as long, compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="hearingLonger" id="hearingLongerTwo" value="two">
                            <label for="hearingLongerTwo">
                                At least two times as long, compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="hearingLonger" id="hearingLongerLittle" value="little">
                            <label for="hearingLongerLittle">
                                A little bit longer, compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="hearingLonger" id="hearingLongerSame" value="same">
                            <label for="hearingLongerSame">
                                The same amount of time, compared to an average person my age without my restrictions
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        Indicate the descriptions that accurately explain your situation.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="hearingDescribe" id="hearingDescribeLip" value="lip">
                            <label for="hearingDescribeLip">
                                I rely on lip reading to understand a spoken conversation
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="hearingDescribe" id="hearingDescribeSign" value="sign">
                            <label for="hearingDescribeSign">
                                I use sign language to communicate
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="hearingDescribe" id="hearingDescribeRaise" value="raise">
                            <label for="hearingDescribeRaise">
                                People usually have to raise their voice to communicate with me
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="hearingDescribe" id="hearingDescribeOther" value="other">
                            <label for="hearingDescribeOther">
                                Other:
                            </label>
                            <input type="text" id="hearingDevicesOtherInput"></input>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Do you use any appropriate therapy, medication or devices to assist you?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="hearingTherapyYesNo" id="hearingTherapyNo" value="no">
                            <label for="hearingTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="hearingTherapyYesNo" id="hearingTherapyYes" value="yes">
                            <label for="hearingTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="hearingTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="hearingTherapyAssist" id="hearingTherapyDevices" value="devices">
                                <label for="hearingTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="hearingTherapyAssist" id="hearingTherapyTherapy" value="therapy">
                                <label for="hearingTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="hearingTherapyAssist" id="hearingTherapyMedication" value="medication">
                                <label for="hearingTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                        
                    </td>
                </tr>
                <tr id="hearingDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="hearingDevices" id="hearingDevicesAdaptive" value="adaptive">
                            <label for="hearingDevicesAdaptive">
                                Adaptive equipment 
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="hearingDevices" id="hearingDevicesOther" value="other">
                            <label for="hearingDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="hearingDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="hearingTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="hearingTherapy" id="hearingTherapyPhysio" value="physio">
                            <label for="hearingTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="hearingTherapy" id="hearingTherapyChiro" value="chiro">
                            <label for="hearingTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="hearingTherapy" id="hearingTherapyMassage" value="massage">
                            <label for="hearingTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="hearingTherapy" id="hearingTherapyOcc" value="occ">
                            <label for="hearingTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="hearingTherapy" id="hearingTherapyOther" value="other">
                            <label for="hearingTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="hearingTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="hearingMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="hearingMedication">
                            <input type="text" id="hearingMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>
                    What year did your restriction begin?
                </td>
                <td>
                    <select id="hearingBegin">
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
                        <input type="radio" name="hearingResolve" id="hearingResolveNo" value="no">
                        <label for="hearingResolveNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="hearingResolve" id="hearingResolveYes" value="yes">
                        <label for="hearingResolveYes">
                            Yes
                        </label>
                    </div>
                    <div id="hearingResolveYear" hidden>
                        In which year was it resolved?
                    <select id="hearingResolveYearSelect">
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