import arrayToSentence from 'array-to-sentence';

export function eliminating() {
    let elimDiagnosis = ``;
    const elimDiagnosisEl = document.getElementById("elimMedicalCondition").value;
    if (elimDiagnosisEl) {
        elimDiagnosis = `I am diagnosed with ${elimDiagnosisEl}`;
    }

    let elimAble = '';
    if (document.getElementById("elimRestrUnable").checked) {
        elimAble = `I am incontinent and unable to manage my elimination.`;
    }
    let elimDescribe = ``;
    let elimLonger = ``;
    let elimFreq = ``;
    let elimDevice = ``;
    let elimTherapy = ``;
    let elimMedication = ``;

    // How much longer it takes them to speak
    const elimLongerEl = document.querySelector('input[name=elimLonger]:checked');
    if (elimLongerEl) {
        elimLonger = `I take `;
        elimLonger += `${elimLongerEl.nextElementSibling.innerText.toLowerCase()}, to manage my elimination.`;
    }

    // Frequency of restrictions
    const elimFreqEl = document.querySelector('input[name=elimRestrFreq]:checked');
    if (elimFreqEl) {
        elimFreq = `This happens `;
        elimFreq += `${elimFreqEl.nextElementSibling.innerText.toLowerCase()}`;
    }


    // Description of restriction
    const elimDescribeEls = document.querySelectorAll('input[name=elimDescribe]:checked');
    if (elimDescribeEls.length > 0) {
        elimDescribe = `I have the following: `;
        let elimDescribes = [];
        for (const wc of elimDescribeEls) {
            if (wc.id=="elimDescribeOther") {
                elimDescribes.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                elimDescribes.push(wc.nextElementSibling.innerText.toLowerCase());
            }
        }
        elimDescribe += arrayToSentence(elimDescribes);
    }


    // Use of therapy, medication or devices
    if (document.getElementById("elimTherapyNo").checked) {
        elimDevice = `No therapy, medication or devices corrects my restriction.`;
    }

    if (document.getElementById("elimTherapyYes").checked) {
        //elimDevices
        let elimDevices = document.querySelectorAll('input[name=elimDevices]:checked');
        if (elimDevices[0]) {
            let elimDevicesArray = [];
            elimDevice = `I require the use of `;
            for (const wd of elimDevices) {
                if (wd.id == "elimDevicesOther") {
                    elimDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                elimDevicesArray.push(wd.nextElementSibling.innerText.toLowerCase());
                }
            }
            elimDevice += arrayToSentence(elimDevicesArray);
        }

        //elimTherapy
        let elimTherapies = document.querySelectorAll('input[name=elimTherapy]:checked');
        if (elimTherapies[0]) {
            let elimTherapiesArray = [];
            elimTherapy = `I require regular `;
            for (const wt of elimTherapies) {
                if (wt.id == "elimTherapyOther") {
                    elimTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                } else {
                    elimTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                }
            }
            elimTherapy += arrayToSentence(elimTherapiesArray);
        }

        //elimMedication
        if (document.getElementById('elimTherapyMedication').checked) {
            elimMedication = `I take ${document.getElementById("elimMedicationInput").value}`;
        }
    }
        
    const elimBeginSelect = document.getElementById('elimBegin');
    let elimBegin = `My restriction began in ${elimBeginSelect.options[elimBeginSelect.selectedIndex].value}`;

    let elimResolve = ``;
    const elimResolveSelect = document.getElementById('elimResolveYearSelect');
    if (document.getElementById("elimResolveNo").checked) {
        elimResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("elimResolveYes").checked) {
        elimResolve = `My restriction resolved in ${elimResolveSelect.options[elimResolveSelect.selectedIndex].value}`;
    }

    // Compile
    if (document.getElementById('elimYes').checked) {
        const email = document.getElementById("eliminating");
        email.innerHTML = `Eliminating:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const elimArray = [elimDiagnosis, elimAble, elimLonger, elimFreq, elimDescribe, elimDevice,  elimTherapy, elimMedication, elimBegin, elimResolve];
        for (const w of elimArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}