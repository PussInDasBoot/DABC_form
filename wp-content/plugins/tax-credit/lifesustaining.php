<?php

wp_register_script('tax-credit', plugins_url('/js/tax-credit.min.js', __FILE__ ));
wp_enqueue_script('tax-credit');

wp_register_style('tax-credit', plugins_url('/css/tax-credit.css', __FILE__), array(), '1', 'all');
wp_enqueue_style( 'tax-credit' );

function life_registration_function() {

 
    echo '
    <button class="accordion">Life-Sustaining Therapy</button>
    <div class="panel">
        <p>
            Life sustaining therapy is required to support a vital function. To qualify in this category you are required to receive at least 14 hours of therapy each week. Examples of life sustaining therapy include: kidney dialysis, insulin injections, chest physiotherapy. 
        </p>
        <p>
            You may only include the time you require for therapy that you need to take away from you normal, everyday activities. Do not include the time spent on activities related to dietary restriction, exercising, travel time to receive therapy, medical appointments (unless you are receiving therapy), shopping for medication or recuperation after therapy.
        </p>
        <p>
            If you are diagnosed with diabetes the following activities may be counted towards 14 hours of life sustaining therapy: monitoring blood sugar, preparing and administering insulin, calibrating/preparing necessary equipment, including changing infusion sites for the insulin pump, maintaining a logbook of blood sugar levels.
        </p>
        <table>
            <tr>
                <td>
                    Please share your medical condition or diagnosis which requires life sustaining therapy
                </td>
                <td>
                    <textarea id="lifeMedicalCondition"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Please share the type of life sustaining therapy/therapies you receive
                </td>
                <td>
                    <textarea id="lifeTherapy"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Does this therapy take an average of at least 14 hours per week?
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="lifeTherapy14" id="lifeTherapy14No" value="no">
                        <label for="lifeTherapy14No">
                            No
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="lifeTherapy14" id="lifeTherapy14Yes" value="yes">
                        <label for="lifeTherapy14Yes">
                            Yes
                        </label>
                    </div>
                </td>
            </tr>
            <tbody id="lifeTherapyFreq" hidden>
                <tr>
                    <td>
                        Please indicate how frequently you receive therapy.
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="lifeFreq" id="lifeFreqThree" value="three">
                            <label for="lifeFreqThree">
                                At least 3 times a week
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeFreq" id="lifeFreqFour" value="four">
                            <label for="lifeFreqFour">
                                At least 4 times a week
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeFreq" id="lifeFreqFive" value="five">
                            <label for="lifeFreqFive">
                                At least 5 times a week
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeFreq" id="lifeFreqSix" value="six">
                            <label for="lifeFreqSix">
                                At least 6 times a week
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeFreq" id="lifeFreqSeven" value="seven">
                            <label for="lifeFreqSeven">
                                At least 7 times a week
                            </label>
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        Please indicate how long you require to receive therapy, on an average day when you are scheduled to receive therapy.
                    </td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="lifeLength" id="lifeLengthTwo" value="two">
                            <label for="lifeLengthTwo">
                                At least 2 hours
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeLength" id="lifeLengthThree" value="three">
                            <label for="lifeLengthThree">
                                At least 3 hours
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeLength" id="lifeLengthFour" value="four">
                            <label for="lifeLengthFour">
                                At least 4 hours
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="lifeLength" id="lifeLengthFive" value="five">
                            <label for="lifeLengthFive">
                                At least 5 hours
                            </label>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>
                    When did you begin receiving this life sustaining therapy three times a week for a minimum of 14 hours?
                </td>
                <td>
                    <select name="lifeBegin">
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


// Register a new shortcode: [life]
add_shortcode( 'life', 'life_registration_shortcode' );
 
// The callback function that will replace [book]
function life_registration_shortcode() {
    global $add_my_script;

    $add_my_script = true;
    ob_start();
    life_registration_function();
    return ob_get_clean();
}


?>