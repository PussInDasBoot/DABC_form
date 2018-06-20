<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function feeding_registration_function() {

 
    echo '
    <button class="accordion">Eating and Preparing Food</button>
    <div class="panel">
      <table>
            <tr>
                <td>
                    Do you have a medical condition or diagnosis which restrict eating or using your hands, wrists or arms to prepare meals AND that occurs most of the time?
                </td>
                <td>
                    <textarea id="feedingMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share what restrictions you experience even with corrective devices, medication or therapy.
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="feedingRestr" id="eatingRestrUnable" value="unableEat">
                        <label for="eatingRestrUnable">
                            I am unable to eat regular meals.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="feedingRestr" id="prepareRestrUnable" value="unablePrepare">
                        <label for="prepareRestrUnable">
                            I am unable to prepare a meal.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="feedingRestr" id="eatingRestrSevere" value="severeRestrEat">
                        <label for="eatingRestrSevere">
                            I take longer to eat compared to an average person my age without my restrictions.
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="feedingRestr" id="prepareRestrSevere" value="severeRestrPrepare">
                        <label for="prepareRestrSevere">
                            I take longer to prepare a meal compared to an average person my age without my restrictions.
                        </label>
                    </div>
                </td>
            </tr>
            <tbody id="eating" hidden>
                <th>Eating</th>
                <tr>
                    <td>
                        How are you restricted in  eating, with the use of any appropriate therapy, medication or devices?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="eatingLonger" id="eatingLongerUnable" value="unable">
                            <label for="eatingLongerUnable">
                                I am unable to eat without assistance.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="eatingLonger" id="eatingLongerThree" value="three">
                            <label for="eatingLongerThree">
                                At least three times as long, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="eatingLonger" id="eatingLongerTwo" value="two">
                            <label for="eatingLongerTwo">
                                At least two times as long, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="eatingLonger" id="eatingLongerLittle" value="little">
                            <label for="eatingLongerLittle">
                                A little bit longer, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        What effects do you experience while eating?
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribePain" value="pain">
                            <label for="eatingDescribePain">
                                Pain
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeStiffness" value="stiffness">
                            <label for="eatingDescribeStiffness">
                                Stiffness
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeNumbness" value="numbness">
                            <label for="eatingDescribeNumbness">
                                Numbness
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeFatigue" value="fatigue">
                            <label for="eatingDescribeFatigue">
                                Fatigue
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeNausea" value="nausea">
                            <label for="eatingDescribeNausea">
                                Nausea
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeSwallowing" value="swallowing">
                            <label for="eatingDescribeSwallowing">
                                Difficulty swallowing
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeCoordination" value="coordination">
                            <label for="eatingDescribeCoordination">
                                Poor coordination
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDescribe" id="eatingDescribeOther" value="other">
                            <label for="eatingDescribeOther">
                                Other:
                            </label>
                            <input type="text" id="eatingDescribeOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Do you use any appropriate therapy, medication or devices to assist you?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="eatingTherapyYesNo" id="eatingTherapyNo" value="no">
                            <label for="eatingTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="eatingTherapyYesNo" id="eatingTherapyYes" value="yes">
                            <label for="eatingTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="eatingTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="eatingTherapyAssist" id="eatingTherapyDevices" value="devices">
                                <label for="eatingTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="eatingTherapyAssist" id="eatingTherapyTherapy" value="therapy">
                                <label for="eatingTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="eatingTherapyAssist" id="eatingTherapyMedication" value="medication">
                                <label for="eatingTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                    </td>
                </tr>
                <tr id="eatingDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="eatingDevices" id="eatingDevicesTubes" value="tubes">
                            <label for="eatingDevicesTubes">
                                I need tube eatings. 
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="eatingDevices" id="eatingDevicesOther" value="other">
                            <label for="eatingDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="eatingDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="eatingTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="eatingTherapy" id="eatingTherapyPhysio" value="physio">
                            <label for="eatingTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="eatingTherapy" id="eatingTherapyChiro" value="chiro">
                            <label for="eatingTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="eatingTherapy" id="eatingTherapyMassage" value="massage">
                            <label for="eatingTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="eatingTherapy" id="eatingTherapyOcc" value="occ">
                            <label for="eatingTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="eatingTherapy" id="eatingTherapyOther" value="other">
                            <label for="eatingTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="eatingTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="eatingMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="eatingMedication">
                            <input type="text" id="eatingMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        What year did your restriction begin?
                    </td>
                    <td>
                        <select name="eatingBegin">
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
                            <input type="radio" name="eatingResolve" id="eatingResolveNo" value="no">
                            <label for="eatingResolveNo">
                                No 
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="eatingResolve" id="eatingResolveYes" value="yes">
                            <label for="eatingResolveYes">
                                Yes
                            </label>
                        </div>
                        <div id="eatingResolveYear" hidden>
                            In which year was it resolved?
                        <select id="eatingResolveYear">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    </td>
                </tr>
            </tbody>
            <tbody id="eatingUnable" hidden>
                <tr>
                    <td>
                        What year did your restriction with eating begin?
                    </td>
                    <td>
                        <select name="eatingBegin">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Has your restriction with eating resolved?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="eatingResolve" id="eatingResolveNo" value="no">
                            <label for="eatingResolveNo">
                                No 
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="eatingResolve" id="eatingResolveYes" value="yes">
                            <label for="eatingResolveYes">
                                Yes
                            </label>
                        </div>
                        <div id="eatingResolveYear" hidden>
                            In which year was it resolved?
                        <select id="eatingResolveYear">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    </td>
                </tr>
            </tbody>
            <tbody id="preparing" hidden>
                <th>Preparing Food</th>
                <tr>
                    <td>
                        How are you restricted in preparing food, with the use of any appropriate therapy, medication or devices?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="preparingLonger" id="preparingLongerUnable" value="unable">
                            <label for="preparingLongerUnable">
                                I am unable to prepare food without assistance.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="preparingLonger" id="preparingLongerThree" value="three">
                            <label for="preparingLongerThree">
                                At least three times as long, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="preparingLonger" id="preparingLongerTwo" value="two">
                            <label for="preparingLongerTwo">
                                At least two times as long, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="preparingLonger" id="preparingLongerLittle" value="little">
                            <label for="preparingLongerLittle">
                                A little bit longer, compared to an average person my age without my restrictions.
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        What effects do you experience while preparing?
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribePain" value="pain">
                            <label for="preparingDescribePain">
                                Pain
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribeStiffness" value="stiffness">
                            <label for="preparingDescribeStiffness">
                                Stiffness
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribeNumbness" value="numbness">
                            <label for="preparingDescribeNumbness">
                                Numbness
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribeFatigue" value="fatigue">
                            <label for="preparingDescribeFatigue">
                                Fatigue
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribeNausea" value="nausea">
                            <label for="preparingDescribeNausea">
                                Nausea
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribeRest" value="rest">
                            <label for="preparingDescribeRest">
                                I require frequent rests
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDescribe" id="preparingDescribeOther" value="other">
                            <label for="preparingDescribeOther">
                                Other:
                            </label>
                            <input type="text" id="preparingDescribeOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        What is difficult?
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="preparingEffects" id="preparingEffectsChopping" value="chopping">
                            <label for="preparingEffectsChopping">
                                Chopping
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingEffects" id="preparingEffectsLifting" value="lifting">
                            <label for="preparingEffectsLifting">
                                Lifting pots
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingEffects" id="preparingEffectsTwisting" value="twisting">
                            <label for="preparingEffectsTwisting">
                                Twisting lids
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingEffects" id="preparingEffectsStanding" value="standing">
                            <label for="preparingEffectsStanding">
                                Standing
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="preparingEffects" id="preparingEffectsBending" value="bending">
                            <label for="preparingDescribeBending">
                                Bending to reach
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
                            <input type="radio" name="preparingTherapyYesNo" id="preparingTherapyNo" value="no">
                            <label for="preparingTherapyNo">
                                No 
                            </label>    
                        </div>
                        <div class="radio">
                            <input type="radio" name="preparingTherapyYesNo" id="preparingTherapyYes" value="yes">
                            <label for="preparingTherapyYes">
                                Yes 
                            </label>    
                        </div>
                        <div id="preparingTherapyAssist" hidden>
                            <div>
                                <input type="checkbox" name="preparingTherapyAssist" id="preparingTherapyDevices" value="devices">
                                <label for="preparingTherapyDevices">
                                    I use devices
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="preparingTherapyAssist" id="preparingTherapyTherapy" value="therapy">
                                <label for="preparingTherapyTherapy">
                                    I receive therapy (physio, etc)
                                </label>    
                            </div>
                            <div>
                                <input type="checkbox" name="preparingTherapyAssist" id="preparingTherapyMedication" value="medication">
                                <label for="preparingTherapyMedication">
                                    I take medication
                                </label>    
                            </div>
                        </div>
                    </td>
                </tr>
                <tr id="preparingDevices" hidden>
                    <td>
                        Please indicate the devices you use.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="preparingDevices" id="preparingDevicesAdaptive" value="Adaptive">
                            <label for="preparingDevicesAdaptive">
                                Adaptive kitchen equipment 
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="preparingDevices" id="preparingDevicesOther" value="other">
                            <label for="preparingDevicesOther">
                                Other:
                            </label>
                            <input type="text" id="preparingDevicesOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="preparingTherapy" hidden>
                    <td>
                        Please indicate the therapy you receive.
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" name="preparingTherapy" id="preparingTherapyPhysio" value="physio">
                            <label for="preparingTherapyPhysio">
                                Physiotherapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="preparingTherapy" id="preparingTherapyChiro" value="chiro">
                            <label for="preparingTherapyChiro">
                                Chiropractic
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="preparingTherapy" id="preparingTherapyMassage" value="massage">
                            <label for="preparingTherapyMassage">
                                Massage
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="preparingTherapy" id="preparingTherapyOcc" value="occ">
                            <label for="preparingTherapyOcc">
                                Occupational Therapy
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="preparingTherapy" id="preparingTherapyOther" value="other">
                            <label for="preparingTherapyOther">
                                Other:
                            </label>
                            <input type="text" id="preparingTherapyOtherInput"></input>     
                        </div>
                    </td>
                </tr>
                <tr id="preparingMedication" hidden>
                    <td>
                        Please indicate what medication you take to address your restriction.
                    </td>
                    <td>
                        <div id="preparingMedication">
                            <input type="text" id="preparingMedicationInput"></input>  
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        What year did your restriction begin?
                    </td>
                    <td>
                        <select id="preparingBegin">
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
                            <input type="radio" name="preparingResolve" id="preparingResolveNo" value="no">
                            <label for="preparingResolveNo">
                                No 
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="preparingResolve" id="preparingResolveYes" value="yes">
                            <label for="preparingResolveYes">
                                Yes
                            </label>
                        </div>
                        <div id="preparingResolveYear" hidden>
                            In which year was it resolved?
                        <select id="preparingResolveYearSelect">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    </td>
                </tr>
            </tbody>
            <tbody id="preparingUnable" hidden>
                <tr>
                    <td>
                        What year did your restriction with preparing food begin?
                    </td>
                    <td>
                        <select id="preparingBegin">
                        '; 
                        
                            for ($i = date('Y') ; $i > 1950; $i--) {
                                echo "<option>$i</option>";
                            };
                        
                        echo '</select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Has your restriction with preparing food resolved?
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="preparingResolve" id="preparingResolveNo" value="no">
                            <label for="preparingResolveNo">
                                No 
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="preparingResolve" id="preparingResolveYes" value="yes">
                            <label for="preparingResolveYes">
                                Yes
                            </label>
                        </div>
                        <div id="preparingResolveYear" hidden>
                            In which year was it resolved?
                        <select id="preparingResolveYearSelect">
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


// Register a new shortcode: [feeding]
add_shortcode( 'feeding', 'feeding_registration_shortcode' );
 
// The callback function that will replace [book]
function feeding_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    feeding_registration_function();
    return ob_get_clean();
}


?>