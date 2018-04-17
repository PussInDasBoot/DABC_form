import arrayToSentence from 'array-to-sentence';

document.addEventListener("DOMContentLoaded", function(e) {
    const submitButton = document.querySelector("#submit");
    submitButton.onclick = function() {
        let walkingAble = '';
        if (document.getElementById("walkingRestrUnable").checked) {
            walkingAble = `Is unable to walk`;
        }
        let walkingDescribe = ``;
        let walkingLonger = ``;
        let walkingFreq = ``;
        let walkingDevice = ``;
        let walkingTherapy = ``;
        let walkingMedication = ``;
        if (document.getElementById("walkingRestrAble").checked) {
            walkingDescribe = `Restricted by `;
            walkingLonger = `Requires`;
            walkingFreq = `Needs to stop and rest`;
            walkingAble = `Restricted in `;
            let walkingRestrictions = [];
            for (const wr of document.querySelectorAll('input[name=walkingRestr]:checked')) {
                if (wr.id=="walkingRestrOther") {
                    walkingRestrictions.push(wr.nextElementSibling.nextElementSibling.value)
                } else {
                    walkingRestrictions.push(letterText[wr.id]);
                }
            }
            walkingAble += arrayToSentence(walkingRestrictions)

            let walkingDescribes = [];
            for (const wc of document.querySelectorAll('input[name=walkingDescribe]:checked')) {
                if (wc.id=="walkingDescribeOther") {
                    walkingDescribes.push(wc.nextElementSibling.nextElementSibling.value);
                } else {
                    walkingDescribes.push(wc.nextElementSibling.innerText.toLowerCase());
                }
            }
            walkingDescribe += arrayToSentence(walkingDescribes);

            walkingLonger += `${document.querySelector('input[name=walkingLonger]:checked').nextElementSibling.innerText.substring('I take'.length)} to walk a flight of stairs or one block compared to an average person their age without their condition`;

            walkingFreq += ` ${document.querySelector('input[name=walkingFreq]:checked').nextElementSibling.innerText.toLowerCase()} while walking`;

            if (document.getElementById("walkingTherapyYes").checked) {
                //walkingDevices
                let walkingDevices = document.querySelectorAll('input[name=walkingDevices]:checked');
                if (walkingDevices[0]) {
                    let walkingDevicesArray = [];
                    walkingDevice = `Requires use of `;
                    for (const wd of walkingDevices) {
                        if (wd.id == "walkingDevicesOther") {
                            walkingDevicesArray.push(wd.nextElementSibling.nextElementSibling.value);
                        } else {
                        walkingDevicesArray.push(wd.nextElementSibling.innerText.toLowerCase());
                        }
                    }
                    walkingDevice += arrayToSentence(walkingDevicesArray);
                }

                //walkingTherapy
                let walkingTherapies = document.querySelectorAll('input[name=walkingTherapy]:checked');
                if (walkingTherapies[0]) {
                    let walkingTherapiesArray = [];
                    walkingTherapy = `Requires regular `;
                    for (const wt of walkingTherapies) {
                        if (wt.id == "walkingTherapyOther") {
                            walkingTherapiesArray.push(wt.nextElementSibling.nextElementSibling.value);
                        } else {
                            walkingTherapiesArray.push(wt.nextElementSibling.innerText.toLowerCase());
                        }
                    }
                    walkingTherapy += arrayToSentence(walkingTherapiesArray);
                }

                //walkingMedication
                if (document.getElementById('walkingTherapyMedication').checked) {
                    walkingMedication = `Takes ${document.getElementById("walkingMedicationInput").value}`;
                }
            }
        }
        const walkingBeginSelect = document.getElementById('walkingBegin');
        let walkingBegin = `Restriction began in ${walkingBeginSelect.options[walkingBeginSelect.selectedIndex].value}`;

        let walkingResolve = ``;
        const walkingResolveSelect = document.getElementById('walkingResolveYearSelect');
        if (document.getElementById("walkingResolveNo").checked) {
            walkingResolve = `Restriction is ongoing`;
        }
        if (document.getElementById("walkingResolveYes").checked) {
            walkingResolve = `Restriction resolved in ${walkingResolveSelect.options[walkingResolveSelect.selectedIndex].value}`;
        }

        // Compile
        const walkingDiagnosis = document.getElementById("walkingMedicalCondition").value; 
        if (walkingDiagnosis) {
            const email = document.getElementById("walking");
            email.innerHTML = `Walking:`
            const ul = document.createElement('ul');
            email.appendChild(ul);
            const walkingArray = [`Diagnosed with ${walkingDiagnosis}`, walkingAble, walkingDescribe, walkingLonger, walkingFreq, walkingDevice,  walkingTherapy, walkingMedication, walkingBegin, walkingResolve];
            for (const w of walkingArray) {
                if (w) {
                    const li = document.createElement("li");
                    li.innerHTML = w;
                    ul.appendChild(li);
                }
            }
        }
    }
}, false);

//key is id of selected option, value is text to display
const letterText = {
        walkingRestrSlow: "walking slowly",
        walkingRestrRest: "needing to stop and rest frequently",
        walkingRestrStairs: "walking up/down stairs",
        walkingRestrIncline: "walking up/down inclines",
    }