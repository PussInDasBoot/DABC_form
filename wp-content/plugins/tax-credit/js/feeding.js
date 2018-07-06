import arrayToSentence from 'array-to-sentence';

export function feeding() {
    let feedingDiagnosis = ``;
    const feedingDiagnosisEl = document.getElementById("feedingMedicalCondition").value;
    if (feedingDiagnosisEl) {
        feedingDiagnosis = `I am diagnosed with ${feedingDiagnosisEl}`;
    }

    let feedingAble = '';
    if (document.getElementById("eatingRestrUnable").checked) {
        feedingAble = `I am unable to eat regular meals.`;
    }
    if (document.getElementById("prepareRestrUnable").checked) {
        feedingAble = `I am unable to prepare a meal.`;
    }

    // Eating
    let eatingDescribe = ``;
    let eatingLonger = ``;
    let eatingDevice = ``;
    let eatingTherapy = ``;
    let eatingMedication = ``;
    let eatingBegin = ``;
    let eatingUnableBegin = ``;

    // How much longer it takes
    const eatingLongerEl = document.querySelector('input[name=eatingLonger]:checked');
    if (eatingLongerEl) {
        if (document.getElementById('eatingLongerUnable').checked) {
            eatingLonger = `I am unable to eat without assistance.`
        } else {
            eatingLonger = `I take `;
            eatingLonger += `${eatingLongerEl.nextElementSibling.innerText.toLowerCase()} to eat.`;
        }
    }


    // Description of restriction
    const eatingDescribeEls = document.querySelectorAll('input[name=eatingDescribe]:checked');
    if (eatingDescribeEls.length > 0) {
        eatingDescribe = `I experience the following effects while eating: `;
        let eatingDescribes = [];
        for (const wc of eatingDescribeEls) {
            if (wc.id=="eatingDescribeOther") {
                eatingDescribes.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                eatingDescribes.push(wc.nextElementSibling.innerText.toLowerCase());
            }
        }
        eatingDescribe += arrayToSentence(eatingDescribes);
    }


    // Use of therapy, medication or devices
    if (document.getElementById("eatingTherapyNo").checked) {
        eatingDevice = `No therapy, medication or devices corrects my restriction.`;
    }

    if (document.getElementById("eatingTherapyYes").checked) {
        //eatingDevices
        let eatingDevices = document.querySelectorAll('input[name=eatingDevices]:checked');
        if (eatingDevices[0]) {
            let eatingDevicesArray = [];
            for (const wd of eatingDevices) {
                if (wd.id == "eatingDevicesOther") {
                    eatingDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                eatingDevicesArray.push(wd.nextElementSibling.innerText);
                }
            }
            eatingDevice = arrayToSentence(eatingDevicesArray);
        }

        //eatingTherapy
        let eatingTherapies = document.querySelectorAll('input[name=eatingTherapy]:checked');
        if (eatingTherapies[0]) {
            let eatingTherapiesArray = [];
            eatingTherapy = `I require regular `;
            for (const wt of eatingTherapies) {
                if (wt.id == "eatingTherapyOther") {
                    eatingTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                } else {
                    eatingTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                }
            }
            eatingTherapy += arrayToSentence(eatingTherapiesArray);
        }

        //eatingMedication
        if (document.getElementById('eatingTherapyMedication').checked) {
            eatingMedication = `I take ${document.getElementById("eatingMedicationInput").value}`;
        }
    }

    // eating restriction began   
    if (document.getElementById('eatingRestrSevere').checked) {
        const eatingBeginSelect = document.getElementById('eatingBegin');
        eatingBegin = `My restriction began in ${eatingBeginSelect.options[eatingBeginSelect.selectedIndex].value}`;
    }

    if (document.getElementById("eatingRestrUnable").checked) {
        const eatingBeginUnableSelect = document.getElementById('eatingUnableBegin');
        eatingUnableBegin = `My restriction began in ${eatingBeginUnableSelect.options[eatingBeginUnableSelect.selectedIndex].value}`;
    }

    // eating restriction resolved
    let eatingResolve = ``;
    const eatingResolveSelect = document.getElementById('eatingResolveYearSelect');
    if (document.getElementById("eatingResolveNo").checked) {
        eatingResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("eatingResolveYes").checked) {
        eatingResolve = `My restriction resolved in ${eatingResolveSelect.options[eatingResolveSelect.selectedIndex].value}`;
    }

    let eatingUnableResolve = ``;
    const eatingResolveUnableSelect = document.getElementById('eatingResolveYearUnableSelect');
    if (document.getElementById("eatingResolveUnableNo").checked) {
        eatingUnableResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("eatingResolveUnableYes").checked) {
        eatingUnableResolve = `My restriction resolved in ${eatingResolveUnableSelect.options[eatingResolveUnableSelect.selectedIndex].value}`;
    }

    // Preparing
    let preparingDescribe = ``;
    let preparingLonger = ``;
    let preparingDevice = ``;
    let preparingTherapy = ``;
    let preparingMedication = ``;
    let preparingBegin = ``;
    let preparingUnableBegin = ``;
    let preparingDifficulties = ``;

    // How much longer it takes
    const preparingLongerEl = document.querySelector('input[name=preparingLonger]:checked');
    if (preparingLongerEl) {
        if (document.getElementById('preparingLongerUnable').checked) {
            preparingLonger = `I am unable to prepare food without assistance.`
        } else {
            preparingLonger = `I take `;
            preparingLonger += `${preparingLongerEl.nextElementSibling.innerText.toLowerCase()} to prepare food.`;
        }
    }


    // Difficulties/Effects
    const preparingDifficultiesEls = document.querySelectorAll('input[name=preparingEffects]:checked');
    if (preparingDifficultiesEls.length > 0) {
        preparingDifficulties = `I find the following activities difficult: `;
        let preparingDifficultiess = [];
        for (const wc of preparingDifficultiesEls) {
            preparingDifficultiess.push(wc.nextElementSibling.innerText.toLowerCase());
        }
        preparingDifficulties += arrayToSentence(preparingDifficultiess);
    }

    // Description of restriction
    const preparingDescribeEls = document.querySelectorAll('input[name=preparingDescribe]:checked');
    if (preparingDescribeEls.length > 0) {
        preparingDescribe = `I experience the following effects while preparing food: `;
        let preparingDescribes = [];
        for (const wc of preparingDescribeEls) {
            if (wc.id=="preparingDescribeOther") {
                preparingDescribes.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                preparingDescribes.push(wc.nextElementSibling.innerText.toLowerCase());
            }
        }
        preparingDescribe += arrayToSentence(preparingDescribes);
    }


    // Use of therapy, medication or devices
    if (document.getElementById("preparingTherapyNo").checked) {
        preparingDevice = `No therapy, medication or devices corrects my restriction.`;
    }

    if (document.getElementById("preparingTherapyYes").checked) {
        // PreparingDevices
        let preparingDevices = document.querySelectorAll('input[name=preparingDevices]:checked');
        if (preparingDevices[0]) {
            let preparingDevicesArray = [];
            preparingDevice = `I require the use of `;
            for (const wd of preparingDevices) {
                if (wd.id == "preparingDevicesOther") {
                    preparingDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                preparingDevicesArray.push(wd.nextElementSibling.innerText.toLowerCase());
                }
            }
            preparingDevice += arrayToSentence(preparingDevicesArray);
        }

        // PreparingTherapy
        let preparingTherapies = document.querySelectorAll('input[name=preparingTherapy]:checked');
        if (preparingTherapies[0]) {
            let preparingTherapiesArray = [];
            preparingTherapy = `I require regular `;
            for (const wt of preparingTherapies) {
                if (wt.id == "preparingTherapyOther") {
                    preparingTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                } else {
                    preparingTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                }
            }
            preparingTherapy += arrayToSentence(preparingTherapiesArray);
        }

        // PreparingMedication
        if (document.getElementById('preparingTherapyMedication').checked) {
            preparingMedication = `I take ${document.getElementById("preparingMedicationInput").value}`;
        }
    }
     
    // Preparing restriction began   
    if (document.getElementById('prepareRestrSevere').checked) {
        const preparingBeginSelect = document.getElementById('preparingBegin');
        preparingBegin = `My restriction began in ${preparingBeginSelect.options[preparingBeginSelect.selectedIndex].value}`;
    }

    if (document.getElementById("prepareRestrUnable").checked) {
        const preparingBeginUnableSelect = document.getElementById('preparingUnableBegin');
        preparingUnableBegin = `My restriction began in ${preparingBeginUnableSelect.options[preparingBeginUnableSelect.selectedIndex].value}`;
    }

    // Preparing restriction resolved
    let preparingResolve = ``;
    const preparingResolveSelect = document.getElementById('preparingResolveYearSelect');
    if (document.getElementById("preparingResolveNo").checked) {
        preparingResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("preparingResolveYes").checked) {
        preparingResolve = `My restriction resolved in ${preparingResolveSelect.options[preparingResolveSelect.selectedIndex].value}`;
    }

    let preparingUnableResolve = ``;
    const preparingResolveUnableSelect = document.getElementById('preparingResolveYearUnableSelect');
    if (document.getElementById("preparingResolveUnableNo").checked) {
        preparingUnableResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("preparingResolveUnableYes").checked) {
        preparingUnableResolve = `My restriction resolved in ${preparingResolveUnableSelect.options[preparingResolveUnableSelect.selectedIndex].value}`;
    }

    // Compile
    if (document.getElementById('feedingYes').checked) {
        const email = document.getElementById("feeding");
        email.innerHTML = `Feeding:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const feedingArray = [feedingDiagnosis, feedingAble, eatingLonger, eatingDescribe, eatingDevice,  eatingTherapy, eatingMedication, eatingBegin, eatingResolve, eatingUnableBegin, eatingUnableResolve, preparingLonger, preparingDescribe, preparingDevice, preparingDifficulties, preparingTherapy, preparingMedication, preparingBegin, preparingUnableBegin, preparingResolve, preparingUnableResolve];
        for (const w of feedingArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}