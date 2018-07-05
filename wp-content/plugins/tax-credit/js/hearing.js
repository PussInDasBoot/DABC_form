import arrayToSentence from 'array-to-sentence';

export function hearing() {
    let hearingDiagnosis = ``;
    const hearingDiagnosisEl = document.getElementById("hearingMedicalCondition").value;
    if (hearingDiagnosisEl) {
        hearingDiagnosis = `I am diagnosed with ${hearingDiagnosisEl}`;
    }

    let hearingAble = '';
    if (document.getElementById("hearingRestrUnable").checked) {
        hearingAble = `I am deaf/unable to hear and understand another person.`;
    }
    let hearingDescribe = ``;
    let hearingLonger = ``;
    let hearingDevice = ``;
    let hearingTherapy = ``;
    let hearingMedication = ``;

    // How much longer it takes them to speak
    const hearingLongerEl = document.querySelector('input[name=hearingLonger]:checked');
    if (hearingLongerEl) {
        hearingLonger = `I take `;
        hearingLonger += `${hearingLongerEl.nextElementSibling.innerText.toLowerCase()}, to hear and understand another person familiar with me, in a quiet setting.`;
    }


    // Description of restriction
    const hearingDescribeEls = document.querySelectorAll('input[name=hearingDescribe]:checked');
    if (hearingDescribeEls.length > 0) {
        let hearingDescribes = [];
        for (const wc of hearingDescribeEls) {
            if (wc.id=="hearingDescribeOther") {
                hearingDescribes.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                hearingDescribes.push(wc.nextElementSibling.innerText.toLowerCase().replace(/i\s/g, "I "));
            }
        }
        hearingDescribe = arrayToSentence(hearingDescribes);
    }


    // Use of therapy, medication or devices
    if (document.getElementById("hearingTherapyNo").checked) {
        hearingDevice = `No therapy, medication or devices corrects my restriction.`;
    }

    if (document.getElementById("hearingTherapyYes").checked) {
        //hearingDevices
        let hearingDevices = document.querySelectorAll('input[name=hearingDevices]:checked');
        if (hearingDevices[0]) {
            let hearingDevicesArray = [];
            hearingDevice = `I require the use of `;
            for (const wd of hearingDevices) {
                if (wd.id == "hearingDevicesOther") {
                    hearingDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                hearingDevicesArray.push(wd.nextElementSibling.innerText.toLowerCase());
                }
            }
            hearingDevice += arrayToSentence(hearingDevicesArray);
        }

        //hearingTherapy
        let hearingTherapies = document.querySelectorAll('input[name=hearingTherapy]:checked');
        if (hearingTherapies[0]) {
            let hearingTherapiesArray = [];
            hearingTherapy = `I require regular `;
            for (const wt of hearingTherapies) {
                if (wt.id == "hearingTherapyOther") {
                    hearingTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                } else {
                    hearingTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                }
            }
            hearingTherapy += arrayToSentence(hearingTherapiesArray);
        }

        //hearingMedication
        if (document.getElementById('hearingTherapyMedication').checked) {
            hearingMedication = `I take ${document.getElementById("hearingMedicationInput").value}`;
        }
    }
        
    const hearingBeginSelect = document.getElementById('hearingBegin');
    let hearingBegin = `My restriction began in ${hearingBeginSelect.options[hearingBeginSelect.selectedIndex].value}`;

    let hearingResolve = ``;
    const hearingResolveSelect = document.getElementById('hearingResolveYearSelect');
    if (document.getElementById("hearingResolveNo").checked) {
        hearingResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("hearingResolveYes").checked) {
        hearingResolve = `My restriction resolved in ${hearingResolveSelect.options[hearingResolveSelect.selectedIndex].value}`;
    }

    // Compile
    if (document.getElementById('hearingYes').checked) {
        const email = document.getElementById("hearing");
        email.innerHTML = `Hearing:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const hearingArray = [hearingDiagnosis, hearingAble, hearingLonger, hearingDescribe, hearingDevice,  hearingTherapy, hearingMedication, hearingBegin, hearingResolve];
        for (const w of hearingArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}