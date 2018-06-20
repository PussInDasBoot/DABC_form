import arrayToSentence from 'array-to-sentence';

export function dressing() {
    let dressingDiagnosis = ``;
    const dressingDiagnosisEl = document.getElementById("dressingMedicalCondition").value; 
    if (dressingDiagnosisEl) {
        dressingDiagnosis = `Diagnosed with ${dressingDiagnosisEl}`;
    }

    let dressingAble = ``;
    if (document.getElementById("dressingRestrUnable").checked) {
        dressingAble = `Is unable to dress without assistance`;
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
        dressingDescribe = `Restricted by `;
        let dressingDescribes = [];
        for (const dd of document.querySelectorAll('input[name=dressingDescribe]:checked')) {
            dressingDescribes.push(dd.nextElementSibling.innerText.toLowerCase());
        }
        dressingDescribe += arrayToSentence(dressingDescribes);
    }

    // What is difficult
    const dressingDifficultEls = document.querySelectorAll('input[name=dressingDifficult]:checked');
    if (dressingDifficultEls.length > 0) {
        dressingDifficult = `Has difficulty putting on the following articles of clothing: `
        let dressingDifficults = [];
        for (const dd of document.querySelectorAll('input[name=dressingDifficult]:checked')) {
            dressingDifficults.push(dd.nextElementSibling.innerText.toLowerCase());
        }
        dressingDifficult += arrayToSentence(dressingDifficults);
    }

    // Use of therapy, medication or devices
    if (document.getElementById("dressingTherapyYes").checked) {
        //dressingDevices
        let dressingDevices = document.querySelectorAll('input[name=dressingDevices]:checked');
        if (dressingDevices[0]) {
            let dressingDevicesArray = [];
            dressingDevice = `Requires use of `;
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
            dressingTherapy = `Requires regular `;
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
            dressingMedication = `Takes ${document.getElementById("dressingMedicationInput").value}`;
        }
    }

    const dressingBeginSelect = document.getElementById('dressingBegin');
    let dressingBegin = `Restriction began in ${dressingBeginSelect.options[dressingBeginSelect.selectedIndex].value}`;

    let dressingResolve = ``;
    const dressingResolveSelect = document.getElementById('dressingResolveYearSelect');
    if (document.getElementById("dressingResolveNo").checked) {
        dressingResolve = `Restriction is ongoing`;
    }
    if (document.getElementById("dressingResolveYes").checked) {
        dressingResolve = `Restriction resolved in ${dressingResolveSelect.options[dressingResolveSelect.selectedIndex].value}`;
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