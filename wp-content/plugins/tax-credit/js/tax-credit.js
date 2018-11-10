import { vision } from './vision.js';
import { speech } from './speaking.js';
import { hearing } from './hearing.js';
import { eliminating } from './eliminating.js';
import { walking } from './walking.js';
import { feeding } from './feeding.js';
import { dressing } from './dressing.js';
import { mental } from './mentalfunctions.js';
import { life } from './life.js'

document.addEventListener("DOMContentLoaded", function(e) {
    const submitButton = document.querySelector("#submit");
    submitButton.onclick = function() {
        const elements = ["vision", "speech", "hearing", "eliminating", "walking", "feeding", "dressing", "mental", "life"];
        for (const el of elements) {
            document.getElementById(el).innerHTML = ``;
        }
        vision();
        speech();
        hearing();
        eliminating();
        walking();
        feeding();
        dressing();
        mental();
        life();

        const emailData = document.querySelector("#email").innerHTML;

        const monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];

        const d = new Date();

        let sections = [];
        
        for (const el of elements) {
            if (document.getElementById(el).innerHTML != "") {
                switch(el) {
                    case "mental":
                        sections.push("Mental functions necessary for everyday life")
                        break;
                    case "life":
                        sections.push("Life-sustaining therapy")
                        break;
                    default:
                        sections.push(el.charAt(0).toUpperCase() + el.slice(1));
                }
            }
        }

        let cumulativeEffect = "";
        if (sections.length > 1) {
            sections.push("Cumulative effect of significant restrictions")
            cumulativeEffect = `
            <b>Cumulative effect of significant restrictions</b>
            <p>
                This category may apply for patients who experience multiple significant restrictions in basic daily living activities to qualify. According to the CRA guidelines, cumulative effect of significant restrictions means:
                <ul>
                    <li>
                        a person is significantly restricted in two or more basic activities of daily living, even with appropriate therapy, medication, and devices;
                    </li>
                    <li>
                        these significant restrictions exist together all or substantially all the time (at least 90% of the time) and,
                    </li>
                    <li>
                        the cumulative effect of these significant restrictions is equivalent to being markedly restricted in a single basic activity of daily living.
                    </li>
                </ul>
            </p>
            `
        }
        
        let eligibilityCriteria = "";
        for (const section of sections) {
            eligibilityCriteria += `<li>${section}</li>`;
        }

        const emailGeneric = `
            <h2>Next Steps for Disability Tax Credit (DTC) Application</h2>
     
            <p>
                You are receiving this email because you used Access RDSP’s Disability Tax Credit Web Tool. Attached in this email is a letter to your health care provider and a summary of your restrictions that are relevant to the Disability Tax Credit Application.
            </p>

            <p>
                To complete preparing for discussing the Disability Tax Credit with your healthcare provider please:
            </p>
            <ul>
                <li>
                    Print out the Disability Tax Credit Application T2001 located online here: https://www.canada.ca/en/revenue-agency/services/forms-publications/forms/t2201.html
                </li>
                <li>
                    Complete page 1 of the document by filling in your information.
                </li>
                <li>
                    If you have a family member who lives with you or who regularly helps you with housing, food or clothing, they can claim the Disability Amount by filling out Section 2
                </li>
            </ul>
             
            <b>Instructions</b>
            <ol>
                <li>
                    Make an appointment to see your doctor or other qualified medical professional to fill out the rest of the Disability Tax Credit Certificate. You may want to ask if there is a fee to complete the form.
                </li>
                <li>
                    Take the DTC application and the attached supporting documents to your appointment. Take time to discuss how your disability impacts you and why you are applying for the DTC.
                </li>
                <li>
                    Once your medical professional fills out the DTC Certificate, check to make sure each applicable section was completed, especially pages 5 and 6.
                </li>
                <li>
                    Make a copy of your DTC application and supporting documents for your records and note the date you mailed it. Consider taking a picture of the completed document and emailing it to yourself if you do not have access to a photocopier.
                </li>
                <li>
                    Mail your completed DTC application and any other supporting documentation to the CRA. DO NOT include the letter addressed to your health care provider, unless they have signed the “Effects of Impairment” page. If they choose to sign this page, please mail only this page along with the form.
            
                    <p>
                        For Residents of BC, mail the completed application to:
                            <p style="margin-left: 40px">
                                Disability Tax Credit Unit<br>
                                Winnipeg Tax Centre<br>
                                66 Stapon Rd.<br>
                                Winnipeg MB, R3C 3M2<br>
                            </p>
                    </p>
                </li>
                <li>
                    If you are approved consider opening a Registered Disability Savings Plan. To learn if you are eligible, or to receive additional free assistance, call Access RDSP: 1-844-311-7526.
                </li>
            </ol>
            <hr>
            <p>${monthNames[d.getMonth()]} ${d.getDate()} ${d.getFullYear()}</p>
             
            <p>Dear Dr. _________,/Dear NP/Dear OT/ETC</p>
             
            <p>
                <b>
                    Re:     (Client Name), DOB: (DD/MMM/YYYY)<br>
                    Disability Tax Credit Application
                </b>
            </p>
             
            <p>
                Your patient has completed an online tool designed to assist them in applying for the Disability Tax Credit (DTC). This tool was created by Access RDSP, a non-profit partnership that supports individuals to apply for the Disability Tax Credit in order to open a Registered Disability Savings Plan (RDSP). The RDSP is a financial empowerment tool for people with disabilities. Low income individuals may qualify for up to $1,000 annually from the federal government by opening a plan. No personal contributions are required.
            </p>

            <p>
                Your patient would like to request your help with completing the forms required for the application. To assist your consultation, the tool has prompted your patient to detail their restrictions that are most relevant to the DTC Certificate form. <b>The draft summary of effects prepared is <u>not</u> intended to replace your medical opinion.</b>
            </p>
             
            <p>
                <b>Eligibility Criteria</b>
                <p>
                    Based on our conversation with your patient, we believe they may qualify under the following categories:
                    <ul>
                        ${eligibilityCriteria}
                    </ul>
                    <b>(Note that they only need to qualify under one category)</b>
                </p>
            </p>
            
            <p> 
                <b>Effects of Impairment</b>
                <p>
                    Enclosed is a summary of your patient’s description of the daily effects of their impairment, as they relate to the DTC criteria. <b>These examples are to assist you in completing the “Effects of Impairment” section on page 5. However, should you find the summary a reasonable representation of the effects of your patient’s impairment, please:</b>
                    <ul>
                        <li>Indicate “See attached” under Effects of Impairment on page 5</li>
                        <li>Sign at the bottom of each page to be attached</li>
                        <li>Staple the additional pages to the DTC application</li>
                    </ul>
                </p>
             
            <p>
                <b>Notes about Eligibility Criteria</b>
                <p>
                    <ul>
                        <li>Individuals only need to qualify under ONE category</li>
                        <li>Diagnosis/medical condition alone is insufficient for determining eligibility</li>
                        <li>Detailed daily effects of impairment are the key to determining eligibility</li>
                        <li>Ability to work or drive is unrelated to an individual’s eligibility for the DTC</li>
                    </ul>
                </p>
            </p>

            <p>
            ${cumulativeEffect}
            </p>

            <p>
                <b>Follow Up Questionnaire from CRA</b>
                <p>
                    The CRA frequently requests additional information regarding the applicant in a follow-up questionnaire specific to each patient. In this questionnaire the CRA may request that you share examples from your patient’s life explaining how they require additional time or are unable to complete certain activities. The CRA may ask you to verify that your patient experiences their restriction(s) at least 90% of the time and that the restrictions are severe. You may need to repeat previously submitted information. Please refer back to the sample description of effects to assist you in completing the questionnaire.
                </p>
            </p>
                 
            <p>
                <b>Fees</b>
                <p>
                    Thank you kindly for taking the time to assist your patient with the DTC application. We note that your patient may be limited in their ability to pay out-of-pocket costs. We ask that you please consider this when determining your fee for having the application completed.
                </p>
            </p>

            <p>
                <b>Disability Tax Credit Support</b>
                <p>
                    We provide free supports and services for physicians, nurse practitioners, occupational therapists and other qualified health professionals to complete the DTC.
                </p>
                <p>
                    Call toll-free: 1-800-663-1278 or email: rdsp@disabilityalliancebc.org
                </p>
            </p>
             
            <p>
                <b>RDSP Support</b>
                <p>
                    <ul>
                        <li>For assistance in opening an RDSP</li>
                        <li>Specialized support and navigation for Indigenous peoples</li>
                        <li>RDSP & Disability Planning Helpline</li>
                        <li>RDSP & DTC Info sessions for individuals, organizations and professionals</li>
                        <li>$150 grant for children, youth and low-income adults residents</li>
                    </ul>
                </p>
            </p>
            
            <p>
                For more information on these services:<br>
                Call: 1-844-311-7526<br>
                Email: info@rdsp.com<br>
                Visit: www.rdsp.com<br>
            </p>
            <hr>
            <h2>Disability Tax Credit Application Supplement: Effects of Impairment</h2>

             
            <b>
                Re:     (Client Name), DOB: (DD/MMM/YYYY)<br>
                Disability Tax Credit Application<br>
            </b>

            <p>
                ${emailData}
            </p>

            Name of Medical Practitioner: _____________________________________________<br>

 
            Medical Practitioner’s Signature: ___________________   Date: ________________

            `

        console.log(emailGeneric);
        const email = document.getElementById("email");
        email.innerHTML = emailGeneric;
        email.style.display = "block";

        const ajaxurl = './tax-credit.php',
        data =  {'email': emailGeneric};
        jQuery.post(ajaxurl, data, function (response) { 

        });
    }

    const accordions = document.getElementsByClassName("accordion");

    for (const acc of accordions) {
        acc.onclick = function(){
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            const panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }

    document.addEventListener('change', function(event) {
        if (event.target.type == "radio") {
            showAndHideRadioTargets();
        }
        if (event.target.type == "checkbox" && checkboxTriggers[event.target.id]) {
            // on de-select of check box, can hide
            const id = event.target.id;
            if (event.target.checked) {
                document.querySelector(`#${checkboxTriggers[id]}`).removeAttribute("hidden");
                const value = [`${event.target.name}`, `${event.target.value}`];
            } else {
                document.querySelector(`#${checkboxTriggers[id]}`).setAttribute("hidden", true);
            }
        }
    })
    

    /*
    radio triggers need to check each radio in the group to hide pop ups when the trigger is no longer selected as there is no non-select event for radio buttons to listen for (the event is instead another radio in group being selected rather than the trigger being de-selected)
    */
    function showAndHideRadioTargets() {
        for (const [target, trigger] of Object.entries(radioTriggers)) {
            const targetEl = document.querySelector(`#${target}`);
            const triggerEl = document.querySelector(`input[name=${trigger[0]}]:checked`);
            if (triggerEl && triggerEl.value==`${trigger[1]}`) {
                targetEl.removeAttribute("hidden");
            } else {
                targetEl.setAttribute("hidden", true);
                for (const s of targetEl.querySelectorAll('input')) {
                    // clear target selection when trigger not selected
                    s.checked = false;
                }
            }
        }
    }
}, false);


// key is id of target element, value is array of trigger elements [name, value]
const radioTriggers = {
    visionRestrExplain: ["visionRestr", "severeRestr"],
    visionAble: ["visionRestr", "severeRestr"],
    visionTherapyExplain: ["visionTherapy", "yes"],
    visionResolveYear: ["visionResolve", "yes"],
    speechAble: ["speechRestr", "severeRestr"],
    speechTherapyAssist: ["speechTherapyYesNo", "yes"],
    speechResolveYear: ["speechResolve", "yes"],
    hearingAble: ["hearingRestr", "severeRestr"],
    hearingTherapyAssist: ["hearingTherapyYesNo", "yes"],
    hearingResolveYear: ["hearingResolve", "yes"],
    elimAble: ["elimRestr", "severeRestr"],
    elimTherapyAssist: ["elimTherapyYesNo", "yes"],
    elimResolveYear: ["elimResolve", "yes"],
    walkingRestr: ["walkingRestrAble", "able"],
    walkingAbleDescribe: ["walkingRestrAble", "able"],
    walkingTherapyAssist: ["walkingTherapyYesNo", "yes"],
    walkingResolveYear: ["walkingResolve", "yes"],
    eating: ["feedingRestr", "severeRestrEat"],
    eatingUnable: ["feedingRestr", "unableEat"],
    eatingTherapyAssist: ["eatingTherapyYesNo", "yes"],
    eatingResolveYear: ["eatingResolve", "yes"],
    eatingResolveYearUnable: ["eatingResolveUnable", "yes"],
    preparing: ["feedingRestr", "severeRestrPrepare"],
    preparingUnable: ["feedingRestr", "unablePrepare"],
    preparingTherapyAssist: ["preparingTherapyYesNo", "yes"],
    preparingResolveYear: ["preparingResolve", "yes"],
    preparingResolveYearUnable: ["preparingResolveUnable", "yes"],
    dressingRestr: ["dressingRestrAble", "able"],
    dressingAble: ["dressingRestrAble", "able"],
    dressingTherapyAssist: ["dressingTherapyYesNo", "yes"],
    dressingResolveYear: ["dressingResolve", "yes"],
    mentalCareYesExplain: ["mentalCareYesNo", "yes"],
    mentalResolveYear: ["mentalResolve", "yes"],
    lifeTherapyFreq: ["lifeTherapy14", "yes"]
}


//key is id of trigger element, value is id of target element
const checkboxTriggers = {
    speechTherapyDevices: "speechDevices",
    speechTherapyTherapy: "speechTherapy",
    speechTherapyMedication: "speechMedication",
    hearingTherapyDevices: "hearingDevices",
    hearingTherapyTherapy: "hearingTherapy",
    hearingTherapyMedication: "hearingMedication",
    elimTherapyDevices: "elimDevices",
    elimTherapyTherapy: "elimTherapy",
    elimTherapyMedication: "elimMedication",
    walkingTherapyDevices: "walkingDevices",
    walkingTherapyTherapy: "walkingTherapy",
    walkingTherapyMedication: "walkingMedication",
    eatingTherapyDevices: "eatingDevices",
    eatingTherapyTherapy: "eatingTherapy",
    eatingTherapyMedication: "eatingMedication",
    preparingTherapyDevices: "preparingDevices",
    preparingTherapyTherapy: "preparingTherapy",
    preparingTherapyMedication: "preparingMedication",
    dressingTherapyDevices: "dressingDevices",
    dressingTherapyTherapy: "dressingTherapy",
    dressingTherapyMedication: "dressingMedication",
    mentalRestrSelf: "mentalSelf",
    mentalRestrSocial: "mentalSocial",
    mentalRestrTransactions: "mentalTransactions",
    mentalRestrMemory: "mentalMemory",
    mentalRestrProblem: "mentalProblem",
    mentalProblemSuicide: "mentalCrisisLine",
    mentalCareMedication: "mentalCareExplain",
    mentalCareSupport: "mentalSupport"
}
