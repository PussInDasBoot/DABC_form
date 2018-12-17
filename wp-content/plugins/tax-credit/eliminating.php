<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function eliminating_registration_function() {

 
    echo '
    <button id="eliminating_button" class="accordion">Eliminating</button>
    <div id="eliminating_section" class="panel">
      <table>
            <tr>
                <td>
                    Do you have a restriction regarding elimination?
                </td>
                <td>
                    <span class="radio">
                        <input type="radio" name="elimYesNo" id="eliminatingNo" value="no">
                        <label for="eliminatingNo">
                            No&emsp;
                        </label>
                    </span>
                    <span class="radio">
                        <input type="radio" name="elimYesNo" id="elimYes" value="yes">
                        <label for="elimYes">
                            Yes
                        </label>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Do you have medical conditions or diagnoses that restrict your ability to manage your elimination most of the time? Please list all if more than one.
                </td>
                <td>
                    <textarea id="elimMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="elimRestr" id="elimRestrUnable" value="unable">
                        <label for="elimRestrUnable">
                            I am incontinent and unable to manage my elimination.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="elimRestr" id="elimRestrSevere" value="severeRestr">
                        <label for="elimRestrSevere">
                            I take longer to manage my elimination compared to an average person my age without my restrictions. 
                        </label>
                    </div>
                </td>
            </tr>
            <tbody id="elimAble" hidden>
                <tr>
                    <td>
                        How often does this happen?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="elimRestrFreq" id="elimRestrFreqRarely" value="rarely">
                            <label for="elimRestrFreqRarely">
                                Rarely
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="elimRestrFreq" id="elimRestrFreqSome" value="some">
                            <label for="elimRestrFreqSome">
                                Some of the time 
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="elimRestrFreq" id="elimRestrFreqVery" value="very">
                            <label for="elimRestrFreqVery">
                                At least 90% of the time
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        How much longer do you require to manage your elimination?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="elimLonger" id="elimLongerThree" value="three">
                            <label for="elimLongerThree">
                                At least three times as long, compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="elimLonger" id="elimLongerTwo" value="two">
                            <label for="elimLongerTwo">
                                At least two times as long, compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="elimLonger" id="elimLongerLittle" value="little">
                            <label for="elimLongerLittle">
                                A little bit longer, compared to an average person my age without my restrictions
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        What causes you to be restricted? Select all that apply:
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeDiarrhea" value="diarrhea">
                            <label for="elimDescribeDiarrhea">
                                Diarrhea
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeConstipation" value="Constipation">
                            <label for="elimDescribeonstipation">
                                Constipation
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeUrine" value="urine">
                            <label for="elimDescribeUrine">
                                Frequent Urination
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeBleeding" value="bleeding">
                            <label for="elimDescribeBleeding">
                                Bleeding
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeOstomy" value="ostomy">
                            <label for="elimDescribeOstomy">
                                Ostomy
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeBowel" value="bowel">
                            <label for="elimDescribeBowel">
                                Incontinence (bowel)
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeBladder" value="bladder">
                            <label for="elimDescribeBladder">
                                Incontinence (bladder)
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="elimDescribe" id="elimDescribeOther" value="other">
                            <label for="elimDescribeOther">
                                Other:
                            </label>
                            <input type="text" id="elimDescribeOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Do you use any appropriate therapy, medication or devices to assist you?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="elimTherapyYesNo" id="elimTherapyNo" value="no">
                            <label for="elimTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="elimTherapyYesNo" id="elimTherapyYes" value="yes">
                            <label for="elimTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="elimTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="elimTherapyAssist" id="elimTherapyDevices" value="devices">
                                <label for="elimTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="elimTherapyAssist" id="elimTherapyTherapy" value="therapy">
                                <label for="elimTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="elimTherapyAssist" id="elimTherapyMedication" value="medication">
                                <label for="elimTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                        
                    </td>
                </tr>
                <tr id="elimDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="elimDevices" id="elimDevicesAdaptive" value="adaptive">
                            <label for="elimDevicesAdaptive">
                                Adaptive equipment 
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="elimDevices" id="elimDevicesOther" value="other">
                            <label for="elimDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="elimDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="elimTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="elimTherapy" id="elimTherapyPhysio" value="physio">
                            <label for="elimTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="elimTherapy" id="elimTherapyChiro" value="chiro">
                            <label for="elimTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="elimTherapy" id="elimTherapyMassage" value="massage">
                            <label for="elimTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="elimTherapy" id="elimTherapyOcc" value="occ">
                            <label for="elimTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="elimTherapy" id="elimTherapyOther" value="other">
                            <label for="elimTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="elimTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="elimMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="elimMedication">
                            <input type="text" id="elimMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>
                    What year did your restriction begin?
                </td>
                <td>
                    <select id="elimBegin">
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
                        <input type="radio" name="elimResolve" id="elimResolveNo" value="no" checked>
                        <label for="elimResolveNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="elimResolve" id="elimResolveYes" value="yes">
                        <label for="elimResolveYes">
                            Yes
                        </label>
                    </div>
                    <div id="elimResolveYear" hidden>
                        In which year was it resolved?
                    <select id="elimResolveYearSelect">
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


// Register a new shortcode: [eliminating]
add_shortcode( 'eliminating', 'eliminating_registration_shortcode' );
 
// The callback function that will replace [book]
function eliminating_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    eliminating_registration_function();
    return ob_get_clean();
}


?>