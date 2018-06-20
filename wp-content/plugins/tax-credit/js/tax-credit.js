import { vision } from './vision.js';
import { speaking } from './speaking.js';
import { hearing } from './hearing.js';
import { eliminating } from './eliminating.js';
import { walking } from './walking.js';
import { feeding } from './feeding.js';
import { dressing } from './dressing.js';
import { mentalfunctions } from './mentalfunctions.js';

document.addEventListener("DOMContentLoaded", function(e) {
    const submitButton = document.querySelector("#submit");
    submitButton.onclick = function() {
        dressing();
        walking();

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
    visionNotBlind: ["visionRestr", "severeRestr"],
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
    preparing: ["feedingRestr", "severeRestrPrepare"],
    preparingUnable: ["feedingRestr", "unablePrepare"],
    preparingTherapyAssist: ["preparingTherapyYesNo", "yes"],
    preparingResolveYear: ["preparingResolve", "yes"],
    dressingRestr: ["dressingRestrAble", "able"],
    dressingAble: ["dressingRestrAble", "able"],
    dressingTherapyAssist: ["dressingTherapyYesNo", "yes"],
    dressingResolveYear: ["dressingResolve", "yes"],
    mentalCareExplain: ["mentalCare", "medication"],
    mentalResolveYear: ["mentalResolve", "yes"],
    lifeTherapyFreq: ["lifeTherapy14", "no"]
}


//key is id of target element, value is id of trigger element
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
}
