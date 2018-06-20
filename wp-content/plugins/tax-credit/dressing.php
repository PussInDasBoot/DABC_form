<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function dressing_registration_function() {

 
    echo '
    <button class="accordion">Dressing</button>
    <div class="panel">
      <table>
            <tr>
                <td>
                    Do you have a medical condition or diagnosis which restrict your ability to dress and undress yourself most of the time?
                </td>
                <td>
                    <textarea id="dressingMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="dressingRestrAble" id="dressingRestrUnable" value="unable">
                        <label for="dressingRestrUnable">
                            I am unable to dress myself without assistance.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="dressingRestrAble" id="dressingRestrAble" value="able">
                        <label for="dressingRestrAble">
                            I am able to dress myself without assistance.
                        </label>
                    </div>
                    <div id="dressingRestr" hidden>
                        <div class="radio">
                            <input type="radio" name="dressingRestr" id="dressingRestrThree" value="three">
                            <label for="dressingRestrThree">
                                I take three times as long compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="dressingRestr" id="dressingRestrTwo" value="two">
                            <label for="dressingRestrTwo">
                                I take twice as long compared to an average person my age without my restrictions
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="dressingRestr" id="dressingRestrLittle" value="little">
                            <label for="dressingRestrLittle">
                                I take a little bit longer, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                    </div>
                </td>
            <tr>
            <tbody id="dressingAble" hidden>
                <tr>
                    <td>
                        What effects do you experience while dressing/undressing?
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="dressingDescribe" id="dressingDescribePain" value="pain">
                            <label for="dressingDescribePain">
                                Pain
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDescribe" id="dressingDescribeStiffness" value="stiffness">
                            <label for="dressingDescribeStiffness">
                                Stiffness
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDescribe" id="dressingDescribeNumbness" value="numbness">
                            <label for="dressingDescribeNumbness">
                                Numbness
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDescribe" id="dressingDescribeFatigue" value="fatigue">
                            <label for="dressingDescribeFatigue">
                                Fatigue
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDescribe" id="dressingDescribeNausea" value="nausea">
                            <label for="dressingDescribeNausea">
                                Nausea
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDescribe" id="dressingDescribeLimited" value="limited">
                            <label for="dressingDescribeLimited">
                                Limited range of motion
                            </label>
                        </div>
                    </td>
                    </tr>
                    <td>
                        What is difficult?
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultSocks" value="socks">
                            <label for="dressingDifficultSocks">
                                Socks
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultPants" value="pants">
                            <label for="dressingDifficultPants">
                                Pants
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultShirts" value="shirts">
                            <label for="dressingDescribeShirts">
                                Shirts
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultShoes" value="shoes">
                            <label for="dressingDescribeShoes">
                                Shoes
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultCoats" value="coats">
                            <label for="dressingDescribeCoats">
                                Coats
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultZippers" value="zippers">
                            <label for="dressingDescribeZippers">
                                Zippers
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDifficult" id="dressingDifficultButtons" value="buttons">
                            <label for="dressingDescribeButtons">
                                Buttons
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
                            <input type="radio" name="dressingTherapyYesNo" id="dressingTherapyNo" value="no">
                            <label for="dressingTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="dressingTherapyYesNo" id="dressingTherapyYes" value="yes">
                            <label for="dressingTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="dressingTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="dressingTherapyAssist" id="dressingTherapyDevices" value="devices">
                                <label for="dressingTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="dressingTherapyAssist" id="dressingTherapyTherapy" value="therapy">
                                <label for="dressingTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="dressingTherapyAssist" id="dressingTherapyMedication" value="medication">
                                <label for="dressingTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                    </td>
                </tr>
                <tr id="dressingDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="dressingDevices" id="dressingDevicesAdaptive" value="adaptive">
                            <label for="dressingDevicesAdaptive">
                                Adaptive equipment 
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="dressingDevices" id="dressingDevicesOther" value="other">
                            <label for="dressingDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="dressingDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="dressingTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="dressingTherapy" id="dressingTherapyPhysio" value="physio">
                            <label for="dressingTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="dressingTherapy" id="dressingTherapyChiro" value="chiro">
                            <label for="dressingTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="dressingTherapy" id="dressingTherapyMassage" value="massage">
                            <label for="dressingTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="dressingTherapy" id="dressingTherapyOcc" value="occ">
                            <label for="dressingTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="dressingTherapy" id="dressingTherapyOther" value="other">
                            <label for="dressingTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="dressingTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="dressingMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="dressingMedication">
                            <input type="text" id="dressingMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>
                    What year did your restriction begin?
                </td>
                <td>
                    <select id="dressingBegin">
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
                        <input type="radio" name="dressingResolve" id="dressingResolveNo" value="no">
                        <label for="dressingResolveNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="dressingResolve" id="dressingResolveYes" value="yes">
                        <label for="dressingResolveYes">
                            Yes
                        </label>
                    </div>
                    <div id="dressingResolveYear" hidden>
                        In which year was it resolved?
                    <select id="dressingResolveYearSelect">
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


// Register a new shortcode: [dressing]
add_shortcode( 'dressing', 'dressing_registration_shortcode' );
 
// The callback function that will replace [book]
function dressing_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    dressing_registration_function();
    return ob_get_clean();
}


?>