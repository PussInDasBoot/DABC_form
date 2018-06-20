import arrayToSentence from 'array-to-sentence';

export function vision() {
    let visionDiagnosis = ``;
    const visionDiagnosisEl = document.getElementById("visionMedicalCondition").value;
    if (visionDiagnosisEl) {
        visionDiagnosis = `I am diagnosed with ${visionDiagnosisEl}`;
    }

    let visionAble = '';
    if (document.getElementById("visionRestrBlind").checked) {
        visionAble = `I am legally blind, with a visual acuity of 20/200 or less with the Snellen Chart or field of vision in both eyes is 20 degrees or less.`;
    }
    let visionDescribe = ``;
    let visionLonger = ``;
    let visionFreq = ``;
    let visionDevice = ``;
    let visionTherapy = ``;
    let visionMedication = ``;

    // Frequency of vision restrictions
    const visionLongerEl = document.querySelector('input[name=visionRestrFreq]:checked');
    if (visionLongerEl) {
        visionLonger = `I have significant restrictions in my vision `;
        visionLonger += `${visionLongerEl.nextElementSibling.innerText.toLowerCase()}`;
    }

    // Description of effects
    const visionDescribeEls = document.querySelectorAll('input[name=visionEffects]:checked');
    if (visionDescribeEls.length > 0) {
        visionDescribe = `I experience `;
        let visionDescribes = [];
        for (const wc of visionDescribeEls) {
            visionDescribes.push(wc.nextElementSibling.innerText.toLowerCase());
        }
        visionDescribe += arrayToSentence(visionDescribes);
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
    if (document.getElementById('visionYes').checked) {
        const email = document.getElementById("vision");
        email.innerHTML = `Vision:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const visionArray = [visionDiagnosis, visionAble, visionLonger, visionDescribe, visionDevice, visionBegin, visionResolve];
        for (const w of visionArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}