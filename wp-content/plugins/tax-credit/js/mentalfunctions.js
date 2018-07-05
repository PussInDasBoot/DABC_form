import arrayToSentence from 'array-to-sentence';

export function mental() {
    let mentalDiagnosis = ``;
    const mentalDiagnosisEl = document.getElementById("mentalMedicalCondition").value;
    if (mentalDiagnosisEl) {
        mentalDiagnosis = `I am diagnosed with ${mentalDiagnosisEl}`;
    }

    let mentalCare = ``;
    let mentalSelf = ``;
    let mentalSocial = ``;
    let mentalTransactions = ``;
    let mentalMemory = ``;
    let mentalProblem = ``;
    let mentalMedication = ``;

    // Self Care
    const mentalSelfEls = document.querySelectorAll('input[name=mentalSelf]:checked');
    if (mentalSelfEls.length > 0) {
        mentalSelf = `In regards to self care tasks such as getting dressed, brushing teeth, showering, eating and other personal care acts: `;
        let mentalSelves = [];
        for (const wc of mentalSelfEls) {
            if (wc.id=="mentalSelfOther") {
                mentalSelves.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                mentalSelves.push(wc.nextElementSibling.innerText);
            }
        }
        mentalSelf += arrayToSentence(mentalSelves);
    }

    // Social
    const mentalSocialEls = document.querySelectorAll('input[name=mentalSocial]:checked');
    if (mentalSocialEls.length > 0) {
        mentalSocial = `Social interations: `;
        let mentalSocials = [];
        for (const wc of mentalSocialEls) {
            if (wc.id=="mentalSocialOther") {
                mentalSocials.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                mentalSocials.push(wc.nextElementSibling.innerText);
            }
        }
        mentalSocial += arrayToSentence(mentalSocials);
    }

    // Transactions
    const mentalTransactionsEls = document.querySelectorAll('input[name=mentalTransactions]:checked');
    if (mentalTransactionsEls.length > 0) {
        mentalTransactions = `Transactions: `;
        let mentalTransactionsArray = [];
        for (const wc of mentalTransactionsEls) {
            if (wc.id=="mentalTransactionsOther") {
                mentalTransactionsArray.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                mentalTransactionsArray.push(wc.nextElementSibling.innerText);
            }
        }
        mentalTransactions += arrayToSentence(mentalTransactionsArray);
    }

    // Memory
    const mentalMemoryEls = document.querySelectorAll('input[name=mentalMemory]:checked');
    if (mentalMemoryEls.length > 0) {
        mentalMemory = `Memory: `;
        let mentalMemoryArray = [];
        for (const wc of mentalMemoryEls) {
            if (wc.id=="mentalMemoryOther") {
                mentalMemoryArray.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                mentalMemoryArray.push(wc.nextElementSibling.innerText);
            }
        }
        mentalMemory += arrayToSentence(mentalMemoryArray);
    }

    // Problem
    const mentalProblemEls = document.querySelectorAll('input[name=mentalProblem]:checked');
    if (mentalProblemEls.length > 0) {
        mentalProblem = `Problem-solving/goal-setting/judgement: `;
        let mentalProblemArray = [];
        for (const wc of mentalProblemEls) {
            if (wc.id=="mentalProblemOther") {
                mentalProblemArray.push(wc.nextElementSibling.nextElementSibling.value);
            } else {
                mentalProblemArray.push(wc.nextElementSibling.innerText);
            }
        }
        mentalProblem += arrayToSentence(mentalProblemArray);
    }

    // Use of support or medication
    if (document.getElementById("mentalCareNo").checked) {
        mentalCare = `I do not receive any care from a mental health specialist or take any medication to assist me.`;
    } else {
        let mentalSupports = document.querySelectorAll('input[name=mentalSupport]:checked');
        if (mentalSupports[0]) {    
            let mentalSupportsArray = [];
            mentalCare = `I receive support from mental health specialists including a `;
            for (const wd of mentalSupports) {
                if (wd.id == "mentalDevicesOther") {
                    mentalSupportsArray.push(wd.nextElementSibling.nextElementSibling.value);
                } else {
                mentalSupportsArray.push(wd.nextElementSibling.innerText.toLowerCase());
                }
            }
            mentalCare += arrayToSentence(mentalSupportsArray);
        }
        //mentalMedication
        if (document.getElementById('mentalCareMedication').checked) {
            mentalMedication = `I take the following medications: ${document.getElementById("mentalCareExplainInput").value}`;
        }
    }

    const mentalBeginSelect = document.getElementById('mentalBegin');
    let mentalBegin = `My restriction began in ${mentalBeginSelect.options[mentalBeginSelect.selectedIndex].value}`;

    let mentalResolve = ``;
    const mentalResolveSelect = document.getElementById('mentalResolveYearSelect');
    if (document.getElementById("mentalResolveNo").checked) {
        mentalResolve = `My restriction is ongoing`;
    }
    if (document.getElementById("mentalResolveYes").checked) {
        mentalResolve = `My restriction resolved in ${mentalResolveSelect.options[mentalResolveSelect.selectedIndex].value}`;
    }

    // Compile
    if (document.getElementById('mentalYes').checked) {
        const email = document.getElementById("mental");
        email.innerHTML = `Mental Functions:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const mentalArray = [mentalDiagnosis, mentalSelf, mentalSocial, mentalTransactions, mentalMemory, mentalProblem, mentalCare, mentalMedication, mentalBegin, mentalResolve];
        for (const w of mentalArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}