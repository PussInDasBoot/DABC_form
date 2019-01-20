import arrayToSentence from 'array-to-sentence';

export function dressing() {
    let dressingDiagnosis = ``;
    const dressingDiagnosisEl = document.getElementById("dressingMedicalCondition").value; 
    if (dressingDiagnosisEl) {
        dressingDiagnosis = `I am diagnosed with ${dressingDiagnosisEl}`;
    }

    let dressingAble = ``;
    if (document.getElementById("dressingRestrUnable").checked) {
        dressingAble = `I am unable to dress without assistance`;
    }
    let dressingRestr = ``;
    let dressingDescribe = ``;
    let dressingDifficult = ``;
    let dressingDevice = ``;
    let dressingTherapy = ``;
    let dressingMedication = ``;
    
    // Dressing restrictions
    const dressingRestrEl = document.querySelector('input[name=dressingRestr]:checked');
    if (dressingRestrEl) {
        dressingRestr = `I require `;
        dressingRestr += `${dressingRestrEl.nextElementSibling.innerText.substring('I take'.length)} to dress`;
    }

    // Cause of restriction
    const dressingRestrEls = document.querySelectorAll('input[name=dressingDescribe]:checked');
    if (dressingRestrEls.length > 0) {
        dressingDescribe = `I am restricted by `;
        let dressingDescribes = [];
        for (const dd of document.querySelectorAll('input[name=dressingDescribe]:checked')) {
            if (dd.id=="dressingDescribeOther") {
                dressingDescribes.push(dd.nextElementSibling.nextElementSibling.value);
            } else {
            dressingDescribes.push(dd.nextElementSibling.innerText.toLowerCase());
            }
        }
        dressingDescribe += arrayToSentence(dressingDescribes);
    }

    // What is difficult
    const dressingDifficultEls = document.querySelectorAll('input[name=dressingDifficult]:checked');
    if (dressingDifficultEls.length > 0) {
        dressingDifficult = `I have difficulty putting on the following articles of clothing: `
        let dressingDifficults = [];
        for (const dd of document.querySelectorAll('input[name=dressingDifficult]:checked')) {
            if (dd.id=="dressingDifficultOther") {
                dressingDifficults.push(dd.nextElementSibling.nextElementSibling.value);
            } else {
            dressingDifficults.push(dd.nextElementSibling.innerText.toLowerCase());
            }
        }
        dressingDifficult += arrayToSentence(dressingDifficults);
    }

    // Use of therapy, medication or devices
    if (document.getElementById("dressingTherapyNo").checked) {
        dressingDevice = `No therapy, medication or devices corrects my restriction.`;
    }

    if (document.getElementById("dressingTherapyYes").checked) {
        //dressingDevices
        let dressingDevices = document.querySelectorAll('input[name=dressingDevices]:checked');
        if (dressingDevices[0]) {
            let dressingDevicesArray = [];
            dressingDevice = `I require the use of `;
            for (const wd of dressingDevices) {
                if (wd.id == "dressingDevicesOther") {
                    dressingDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                dressingDevicesArray.push(wd.nextElementSibling.innerText.toLowerCase());
                }
            }
            dressingDevice += arrayToSentence(dressingDevicesArray);
        }

        //dressingTherapy
        let dressingTherapies = document.querySelectorAll('input[name=dressingTherapy]:checked');
        if (dressingTherapies[0]) {
            let dressingTherapiesArray = [];
            dressingTherapy = `I require regular `;
            for (const wt of dressingTherapies) {
                if (wt.id == "dressingTherapyOther") {
                    dressingTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                } else {
                    dressingTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                }
            }
            dressingTherapy += arrayToSentence(dressingTherapiesArray);
        }

        //dressingMedication
        if (document.getElementById('dressingTherapyMedication').checked) {
            dressingMedication = `I takes ${document.getElementById("dressingMedicationInput").value}`;
        }
    }

    const dressingBeginSelect = document.getElementById('dressingBegin');
    let dressingBegin = `My restriction began in ${dressingBeginSelect.options[dressingBeginSelect.selectedIndex].value}`;

    let dressingResolve = ``;
    const dressingResolveSelect = document.getElementById('dressingResolveYearSelect');
    if (document.getElementById("dressingResolveNo").checked) {
        dressingResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("dressingResolveYes").checked) {
        dressingResolve = `My restriction resolved in ${dressingResolveSelect.options[dressingResolveSelect.selectedIndex].value}`;
    }

    // Compile
    if (document.getElementById('dressingYes').checked) {
        const email = document.getElementById("dressing");
        email.innerHTML = `Dressing:`;
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const dressingArray = [dressingDiagnosis, dressingAble, dressingRestr, dressingDescribe, dressingDifficult, dressingDevice,  dressingTherapy, dressingMedication, dressingBegin, dressingResolve];
        for (const d of dressingArray) {
            if (d) {
                const li = document.createElement("li");
                li.innerHTML = d;
                ul.appendChild(li);
            }
        }
    }
};