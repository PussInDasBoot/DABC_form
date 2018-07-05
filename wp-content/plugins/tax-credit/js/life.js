import arrayToSentence from 'array-to-sentence';

export function life() {
    let lifeDiagnosis = ``;
    let lifeTherapy = ``;
    let lifeAverage = ``;
    let lifeFreq = ``;
    let lifeLength = ``;
    let lifeBegin = ``;
    let lifeFreqVal = ``;
    let lifeLengthVal = ``;

    const lifeDiagnosisEl = document.getElementById("lifeMedicalCondition").value;
    if (lifeDiagnosisEl) {
        lifeDiagnosis = `I am diagnosed with ${lifeDiagnosisEl}`;
    }

    const lifeTherapyEl = document.getElementById("lifeTherapy").value;
    if (lifeTherapyEl) {
        lifeTherapy = `I require ${lifeTherapyEl}`;

        const lifeFreqEls = document.querySelectorAll('input[name=lifeFreq]:checked');
        if (lifeFreqEls.length > 0) {
            lifeFreqVal = lifeFreqEls[0].nextElementSibling.innerText.toLowerCase();
            lifeFreq = `I receive ${lifeTherapyEl} ${lifeFreqVal}.`
        }

        const lifeLengthEls = document.querySelectorAll('input[name=lifeLength]:checked');
        if (lifeLengthEls.length > 0) {
            lifeLengthVal = lifeLengthEls[0].nextElementSibling.innerText.toLowerCase();
            lifeLength = `On an average day when I am scheduled to receive therapy it takes me ${lifeLengthVal} to manage.`
        }

        if (lifeFreqEls[0] && lifeLengthEls[0]) {
            const lifeBeginSelect = document.getElementById('lifeBegin');
            lifeBegin = `I began requiring this therapy ${lifeFreqVal.substring('At least'.length)} for ${lifeLengthVal} a day in ${lifeBeginSelect.options[lifeBeginSelect.selectedIndex].value}`;
        }

    }

    if (document.getElementById("lifeTherapy14No").checked) {
        lifeAverage = `I require less than 14 hours of therapy every week on average.`
    }
    if (document.getElementById("lifeTherapy14Yes").checked) {
        lifeAverage = `I require at least 14 hours of therapy every week.`
    }

    // Compile
    if (document.getElementById('lifeYes').checked) {
        const email = document.getElementById("life");
        email.innerHTML = `Life Sustaining Therapy:`
        const ul = document.createElement('ul');
        email.appendChild(ul);
        const lifeArray = [lifeDiagnosis, lifeTherapy, lifeAverage, lifeFreq, lifeLength, lifeBegin];
        for (const w of lifeArray) {
            if (w) {
                const li = document.createElement("li");
                li.innerHTML = w;
                ul.appendChild(li);
            }
        }
    }
}