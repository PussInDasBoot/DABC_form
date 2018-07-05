import arrayToSentence from 'array-to-sentence';

export function speech() {
    let speechDiagnosis = ``;
    const speechDiagnosisEl = document.getElementById("speechMedicalCondition").value;
    if (speechDiagnosisEl) {
        speechDiagnosis = `I am diagnosed with ${speechDiagnosisEl}`;
    }

    let speechAble = '';
    if (document.getElementById("speechRestrUnable").checked) {
        speechAble = `I am unable to speak and rely on other means of communication, such as sign language or a symbol board, at least 90% of the time.`;
    }
    if (document.getElementById("speechRestrSevere").checked) {
        speechAble = `I take longer to speak so as to be understood by another person familiar with me, in a quiet setting.`;
    }
    let speechDescribe = ``;
    let speechFreq = ``;
    let speechLonger = ``;
    let speechDevice = ``;
    let speechTherapy = ``;
    let speechMedication = ``;

    // Frequency of speech restrictions
    const speechFreqEl = document.querySelector('input[name=speechRestrFreq]:checked');
    if (speechFreqEl) {
        speechFreq = `This happens `;
        speechFreq += `${speechFreqEl.nextElementSibling.innerText.toLowerCase()}`;
    }

    // How much longer it takes them to speak
    const speechLongerEl = document.querySelector('input[name=speechLonger]:checked');
    if (speechLongerEl) {
        speechLonger = `When I speak with my doctor, my doctor must ask me to repeat words and sentences. It takes `;
        speechLonger += `${speechLongerEl.nextElementSibling.innerText.toLowerCase()} to communicate my needs.`;
    }


    // Description of restriction
    const speechDescribeEls = document.querySelectorAll('input[name=speechDescribe]:checked');
    if (speechDescribeEls.length > 0) {
        speechDescribe = `When I speak I suffer from `;
        let speechDescribes = [];
        for (const wc of speechDescribeEls) {
            if (wc.id=="speechDescribeOther") {
                speechDescribes.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                speechDescribes.push(wc.nextElementSibling.innerText.toLowerCase());
            }
        }
        speechDescribe += arrayToSentence(speechDescribes);
    }


    // Use of therapy, medication or devices
    if (document.getElementById("speechTherapyNo").checked) {
        speechDevice = `No therapy, medication or devices corrects my restriction.`;
    }

    if (document.getElementById("speechTherapyYes").checked) {
        //speechDevices
        let speechDevices = document.querySelectorAll('input[name=speechDevices]:checked');
        if (speechDevices[0]) {
            let speechDevicesArray = [];
            speechDevice = `I require the use of `;
            for (const wd of speechDevices) {
                if (wd.id == "speechDevicesOther") {
                    speechDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                speechDevicesArray.push(wd.nextElementSibling.innerText.toLowerCase());
                }
            }
            speechDevice += arrayToSentence(speechDevicesArray);
        }

        //speechTherapy
        let speechTherapies = document.querySelectorAll('input[name=speechTherapy]:checked');
        if (speechTherapies[0]) {
            let speechTherapiesArray = [];
            speechTherapy = `I require regular `;
            for (const wt of speechTherapies) {
                if (wt.id == "speechTherapyOther") {
                    speechTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                } else {
                    speechTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                }
            }
            speechTherapy += arrayToSentence(speechTherapiesArray);
        }

        //speechMedication
        if (document.getElementById('speechTherapyMedication').checked) {
            speechMedication = `I take ${document.getElementById("speechMedicationInput").value}`;
        }
    }
        
    const speechBeginSelect = document.getElementById('speechBegin');
    let speechBegin = `My restriction began in ${speechBeginSelect.options[speechBeginSelect.selectedIndex].value}`;

    let speechResolve = ``;
    const speechResolveSelect = document.getElementById('speechResolveYearSelect');
    if (document.getElementById("speechResolveNo").checked) {
        speechResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("speechResolveYes").checked) {
        speechResolve = `My restriction resolved in ${speechResolveSelect.options[speechResolveSelect.selectedIndex].value}`;
    }

    // Compile
    if (document.getElementById('speechYes').checked) {
        const email = document.getElementById("speech");
        email.innerHTML = `Speech:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const speechArray = [speechDiagnosis, speechAble, speechFreq, speechLonger, speechDescribe, speechDevice,  speechTherapy, speechMedication, speechBegin, speechResolve];
        for (const w of speechArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}

//key is id of selected option, value is text to display
const letterText = {
        speechRestrSlow: "speech slowly",
        speechRestrRest: "needing to stop and rest frequently",
        speechRestrStairs: "speech up/down stairs",
        speechRestrIncline: "speech up/down inclines",
    }