import arrayToSentence from 'array-to-sentence';

export function vision() {
    let visionDiagnosis = ``;
    const visionDiagnosisEl = document.getElementById("visionMedicalCondition").value;
    if (visionDiagnosisEl) {
        visionDiagnosis = `I am diagnosed with ${visionDiagnosisEl}`;
    }

    let visionAble = '';
    if (document.getElementById("visionRestrUnable").checked) {
        visionAble = `I am legally blind, with a visual acuity of 20/200 or less with the Snellen Chart or field of vision in both eyes is 20 degrees or less.`;
    }
    let visionEffect = ``;
    let visionLonger = ``;
    let visionDevice = ``;
    let visionExplain = ``;

    // Explanation of vision restriction
    const visionExplainEl = document.getElementById('visionRestrExplainInput');
    if (visionExplainEl.value) {
        visionExplain = visionExplainEl.value;
    }


    // Frequency of vision restrictions
    const visionLongerEl = document.querySelector('input[name=visionRestrFreq]:checked');
    if (visionLongerEl) {
        visionLonger = `I have significant restrictions in my vision `;
        visionLonger += `${visionLongerEl.nextElementSibling.innerText.toLowerCase()}`;
    }

    // Description of effects
    const visionEffectEls = document.querySelectorAll('input[name=visionEffects]:checked');
    if (visionEffectEls.length > 0) {
        visionEffect = `I experience `;
        let visionEffects = [];
        for (const wc of visionEffectEls) {
            if (wc.id=="visionEffectsOther") {
                visionEffects.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                visionEffects.push(wc.nextElementSibling.innerText.toLowerCase());
            }
        }
        visionEffect += arrayToSentence(visionEffects);
    }


    // Use of therapy, medication or devices
    if (document.getElementById("visionTherapyNo").checked) {
        visionDevice = `No therapy, medication or devices corrects my restriction.`;
    }
    if (document.getElementById("visionTherapyYes").checked) {
        //visionDevices
        visionDevice = document.getElementById('visionTherapyExplainInput').value;
    }
        
    const visionBeginSelect = document.getElementById('visionBegin');
    let visionBegin = `My restriction began in ${visionBeginSelect.options[visionBeginSelect.selectedIndex].value}`;

    let visionResolve = ``;
    const visionResolveSelect = document.getElementById('visionResolveYearSelect');
    if (document.getElementById("visionResolveNo").checked) {
        visionResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("visionResolveYes").checked) {
        visionResolve = `My restriction resolved in ${visionResolveSelect.options[visionResolveSelect.selectedIndex].value}`;
    }

    // Compile
    let visionSection = false;

    if (document.getElementById('visionYes').checked) {
        visionSection = true;
        const email = document.getElementById("vision");
        email.innerHTML = `Vision:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const visionArray = [visionDiagnosis, visionAble, visionLonger, visionExplain, visionEffect, visionDevice, visionBegin, visionResolve];
        for (const w of visionArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
    return visionSection;
}