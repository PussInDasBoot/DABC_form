<?php 
/**
* Plugin Name: form */

// Register bootstrap and jquery
wp_enqueue_script('jquery');
wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
wp_enqueue_script('prefix_bootstrap');
wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
wp_enqueue_style('prefix_bootstrap');

function custom_registration_function() {
    echo '
    <style>
    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
 
    echo '
    <p>This tool will create documents that will help you and your health care provider complete the application for the Disability Tax Credit, commonly referred to as the DTC.</p>

    <p>There are a couple different ways you can qualify for the DTC:</p>

    <p>You can qualify for the Disability Tax Credit if you have one severe restriction in the following categories or two or more significant restrictions. Restrictions that occur 90% of the time are most relevent.</p>

    <p>You are restricted in a health area if you are unable to do an activity or if you require longer to do an activity compared to an average person your age, even with appropriate medication, therapy or devices. For example, if you have a severe restriction with your vision which is corrected by wearing glasses, this restriction is not relevent to your Disability Tax Credit Application.</p>

    <p>Do you have any restrictions in the following health areas? Complete all sections that apply:</p>


    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="Vision">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#vision" aria-expanded="true" aria-controls="vision">
              Vision
            </a>
          </h4>
        </div>
        <div id="vision" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Vision">
          <div class="panel-body">
            <p>
                Do you have medical conditions or diagnoses that restricts your vision? Please list all if more than one.
                <input type="text"></input>
            </p>
            <p>
                Please share what restrictions you experience even with corrective devices, medication or therapy.
                <div class="radio">
                  <label>
                    <input type="radio" name="visionRestrictions" id="legallyBlind" value="legallyBlind">
                    I am legally blind, with a visual acuity of 20/200 or less with the Snellen Chart or field of vision in both eyes is 20 degrees or less.
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="visionRestrictions" id="severeRestrictions" value="severeRestrictions">
                    I am not legally blind. I have less severe restrictions in my vision. 
                    Explain: 
                    <input type="text" id="severeRestrictionsExplain"></input>
                  </label>
                </div>
            </p>
          </div>
        </div>
      </div>
    </div>
    ';
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}
?>