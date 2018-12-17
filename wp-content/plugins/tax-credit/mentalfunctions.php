<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function mental_registration_function() {

 
    echo '
    <button id="mental_button" class="accordion">Mental Functions</button>
    <div id="mental_section" class="panel">
      <table>
            <tr>
                <td>
                    Do you have a restriction in mental functioning?
                </td>
                <td>
                    <span class="radio">
                        <input type="radio" name="mentalYesNo" id="mentalNo" value="no">
                        <label for="mentalNo">
                            No&emsp;
                        </label>
                    </span>
                    <span class="radio">
                        <input type="radio" name="mentalYesNo" id="mentalYes" value="yes">
                        <label for="mentalYes">
                            Yes
                        </label>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Do you have a medical condition or diagnosis which restricts your day to day mental functioning?  Please list all if more than one.
                </td>
                <td>
                    <textarea id="mentalMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please indicate what restrictions you experience even with corrective devices, medication or therapy.
                    I require longer or am unable to complete the following activities without assistance, due to my mental health condition(s):
                </td>
                <td>
                    <div id="mentalRestrAssist">
                        <div>
                            <input type="checkbox" name="mentalRestr" id="mentalRestrSelf" value="self">
                            <label for="mentalRestrSelf">
                                Self care activities including getting dressed, brushing my teeth, showering, eating and other personal care acts.
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="mentalRestr" id="mentalRestrSocial" value="social">
                            <label for="mentalSocialSocial">
                                Initiate and respond to social interactions.
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="mentalRestr" id="mentalRestrTransactions" value="transactions">
                            <label for="mentalRestrTransactions">
                                Make simple transactions such as purchasing groceries or clothing for myself.
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="mentalRestr" id="mentalRestrMemory" value="memory">
                            <label for="mentalRestrMemory">
                                Recall and process information (memory restriction).
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="mentalRestr" id="mentalRestrProblem" value="problem">
                            <label for="mentalRestrProblem">
                                Set and achieve day to day goals for myself or problem solve day to day challenges that arise or make healthy and safe choices for myself
                            </label>    
                        </div>
                    </div>
                </td>
            </tr>
            <tr id="mentalSelf" hidden>
                <td>
                    How are you restricted in self-care. Self care includes getting dressed, brushing teeth, showering, eating and other personal care acts.
                </td>
                <td>
                    <div>
                        <input type="checkbox" name="mentalSelf" id="mentalSelfTasks" value="tasks">
                        <label for="mentalSelfTasks">
                            I am unable to complete some of the tasks without assistance
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSelf" id="mentalSelfLonger" value="longer">
                        <label for="mentalSelfLonger">
                            I require longer to complete these activities compared to an average person my age
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSelf" id="mentalSelfReminders" value="reminders">
                        <label for="mentalSelfReminders">
                            I require reminders to complete these tasks
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSelf" id="mentalSelfMotivation" value=motivation">
                        <label for="mentalSelfMotivation">
                            I have feelings of low motivation and hopelessness which results in me avoiding these activities
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSelf" id="mentalSelfCompulsion" value="compulsion">
                        <label for="mentalSelfCompulsion">
                            I have compulsions to complete these tasks repeatedly which results in me requiring longer to complete these tasks
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSelf" id="mentalSelfOther" value="other">
                        <label for="mentalSelfOther">
                            Other:
                        </label>
                        <input type="text" id="mentalSelfOtherInput"></input>     
                    </div>
                </td>
            </tr>
            <tr id="mentalSocial" hidden>
                <td>
                    How are you restricted in initiating and responding to social interactions? Select all that apply:
                </td>
                <td>
                    <div>
                        <input type="checkbox" name="mentalSocial" id="mentalSocialDecisions" value="decisions">
                        <label for="mentalSocialDecisions">
                            I am unable to make decisions for myself without assistance
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSocial" id="mentalSocialInitiate" value="initiate">
                        <label for="mentalSocialInitiate">
                            I require longer to initiate and respond to social interactions compared to an average person my age
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSocial" id="mentalSocialIsolate" value="isolate">
                        <label for="mentalSocialIsolate">
                            I generally isolate and avoid interacting with people
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSocial" id="mentalSocialAnswering" value="answering">
                        <label for="mentalSocialAnswering">
                            I have difficulty answering appropriately when I am asked a question
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSocial" id="mentalSocialFocusing" value="focusing">
                        <label for="mentalSocialFocusing">
                            I have difficulty focusing on any topic for more than one or two minutes
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSocial" id="mentalSocialOther" value="other">
                        <label for="mentalSocialOther">
                            Other:
                        </label>
                        <input type="text" id="mentalSocialOtherInput"></input>     
                    </div>
                </td>
            </tr>
            <tr id="mentalTransactions" hidden>
                <td>
                    How are you restricted in making simple transactions such as purchasing groceries or clothing for yourself.
                </td>
                <td>
                    <div>
                        <input type="checkbox" name="mentalTransactions" id="mentalTransactionsUnable" value="unable">
                        <label for="mentalTransactionsUnable">
                            I am unable to make purchases for myself without assistance
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalTransactions" id="mentalTransactionsLonger" value="longer">
                        <label for="mentalTransactionsLonger">
                            I require longer to make simple purchases compared to an average person my age
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalTransactions" id="mentalTransactionsOther" value="other">
                        <label for="mentalTransactionsOther">
                            Other:
                        </label>
                        <input type="text" id="mentalTransactionsOtherInput"></input>     
                    </div>
                </td>
            </tr>
            <tr id="mentalMemory" hidden>
                <td>
                    How are you restricted in recalling information?
                </td>
                <td>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryInstructions" value="instructions">
                        <label for="mentalMemoryInstructions">
                            I require longer or am unable to remember simple instructions, or require frequent reminders and support with staying on task
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryPersonal" value="personal">
                        <label for="mentalMemoryPersonal">
                            I have difficulty remembering basic personal information including my phone number and address
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryRepeat" value="repeat">
                        <label for="mentalMemoryRepeat">
                            I have difficulty remembering material of importance and interest and need to read or hear the same information several times
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryAppointments" value="appointments">
                        <label for="mentalMemoryAppointments">
                            I need reminders to remember to attend appointments, including medical appointments
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryImportant" value="important">
                        <label for="mentalMemoryImportant">
                            Most of the time I require help (written or verbal reminders) with remembering important information
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryConcentration" value="concentration">
                        <label for="mentalMemoryConcentration">
                            I have difficulty concentrating on any topic for longer than one or two minutes
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalMemory" id="mentalMemoryOther" value="other">
                        <label for="mentalMemoryOther">
                            Other:
                        </label>
                        <input type="text" id="mentalMemoryOtherInput"></input>     
                    </div>
                </td>
            </tr>
            <tr id="mentalProblem" hidden>
                <td>
                   How are you restricted in problem-solving, goal-setting and judgement? Select all that apply:
                </td>
                <td>
                    <div>
                        <input type="checkbox" name="mentalProblem" id="mentalProblemResolve" value="resolve">
                        <label for="mentalProblemResolve">
                            I require longer or am unable to resolve a problem without assistance. This is in regards to problems which arise frequently in day to day life
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalProblem" id="mentalProblemGoals" value="goals">
                        <label for="mentalProblemGoals">
                            I require longer or am unable to set AND keep goals. This is in regards to goals I set for myself relating to day to day life, such as eating healthy or walking more
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalProblem" id="mentalProblemDecisions" value="decisions">
                        <label for="mentalProblemDecisions">
                            I require longer or am unable to make appropriate decisions and judgements. This is in regards to decisions that arise during the day to day basic activities of life, such as what should I make for dinner this evening
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalProblem" id="mentalProblemImpulsive" value="impulsive">
                        <label for="mentalProblemImpulsive">
                            I am often impulsive and make decisions that are high risk with little to no planning
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalProblem" id="mentalProblemSuicide" value="suicide">
                        <label for="mentalProblemSuicide">
                            I have, now or in the past, had frequent thoughts of hurting myself or ending my life
                        </label>    
                    </div>
                    <div id="mentalCrisisLine" hidden>
                        <p>
                            If you are thinking about suicide, you don’t have to face it alone. Reach out today. </p>
                        <p>
                            Crisis Text Line: Text HOME to 686868 from anywhere in Canada</p>
                        <ul>
                            <li>
                                Coastal Region
                                <ul>
                                    <li>
                                        <a href="https://crisiscentre.bc.ca/">Vancouver Crisis Centre</a>
                                        
                                    </li>
                                    <li>
                                        <a href="https://crisiscentrechat.ca/">Crisis Chat</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Northern BC
                                <ul>
                                    <li>
                                        <a href="http://www.northernbccrisissuicide.ca/">Prince George Crisis Line</a>
                                        
                                    </li>
                                    <li>
                                        Youth Support: (250) 564-8336
                                    </li>
                                    <li>
                                        <a href="http://www.northernyouthonline.ca/">Crisis Chat</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Vancouver Island
                                <ul>
                                    <li>
                                        <a href="https://www.vicrisis.ca/">Vancouver Island Crisis Line &amp; Chat</a>
                                        
                                    </li>
                                    <li>
                                        Crisis Text: (250) 800-3806
                                    </li>
                                    <li>
                                        <a href="https://www.vicrisis.ca/">Crisis Chat</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <input type="checkbox" name="mentalProblem" id="mentalProblemOther" value="other">
                        <label for="mentalProblemOther">
                            Other:
                        </label>
                        <input type="text" id="mentalProblemOtherInput"></input>     
                    </div>
                </td>
            </tr>
            <tr id="mentalCare">
                <td>
                    Do you receive any care from a mental health specialist or take any medication to assist you?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="mentalCareYesNo" id="mentalCareNo" value="no">
                        <label for="mentalCareNo">
                            No
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="mentalCareYesNo" id="mentalCareYes" value="yes">
                        <label for="mentalCareYes">
                            Yes
                        </label>
                    </div>
                    <div id="mentalCareYesExplain" hidden>
                        <div>
                            <input type="checkbox" name="mentalCareYesExplain" id="mentalCareSupport" value="support">
                            <label for="mentalCareSupport">
                                I receive support from mental health specialists
                            </label>    
                        </div>
                        <div>
                            <input type="checkbox" name="mentalCareYesExplain" id="mentalCareMedication" value="medication">
                            <label for="mentalCareMedication">
                                I take medication
                            </label>    
                        </div>
                        <div id="mentalCareExplain" hidden>
                            Please indicate what medication you take to address your restriction:
                            <input type="text" id="mentalCareExplainInput"></input>
                        </div>
                    </div>
                </td>
            </tr>
            <tr id="mentalSupport" hidden>
                <td>
                    Please indicate the mental health specialists you receive support from.
                </td>
                <td>
                    <div>
                        <input type="checkbox" name="mentalSupport" id="mentalSupportGP" value="GP">
                        <label for="mentalSupportGP">
                            General Practitioner
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSupport" id="mentalSupportPsychiatrist" value="psychiatrist">
                        <label for="mentalSupportPsychiatrist">
                            Psychiatrist
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSupport" id="mentalSupportCounsellor" value="counsellor">
                        <label for="mentalSupportCounsellor">
                            Counsellor
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSupport" id="mentalSupportPsychologist" value="psychologist">
                        <label for="mentalSupportPsychologist">
                            Psychologist
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSupport" id="mentalSupportSocial" value="social">
                        <label for="mentalSupportSocial">
                            Social worker
                        </label>    
                    </div>
                    <div>
                        <input type="checkbox" name="mentalSupport" id="mentalSupportOther" value="other">
                        <label for="mentalSupportOther">
                            Other:
                        </label>
                        <input type="text" id="mentalSupportOtherInput"></input>     
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    What year did your restriction begin?
                </td>
                <td>
                    <select id="mentalBegin">
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
                        <input type="radio" name="mentalResolve" id="mentalResolveNo" value="no" checked>
                        <label for="mentalResolveNo">
                            No 
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="mentalResolve" id="mentalResolveYes" value="yes">
                        <label for="mentalResolveYes">
                            Yes
                        </label>
                    </div>
                    <div id="mentalResolveYear" hidden>
                        In which year was it resolved?
                    <select id="mentalResolveYearSelect">
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


// Register a new shortcode: [mental]
add_shortcode( 'mental', 'mental_registration_shortcode' );
 
// The callback function that will replace [book]
function mental_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    mental_registration_function();
    return ob_get_clean();
}


?>