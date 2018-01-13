document.addEventListener("DOMContentLoaded", function(e) {
    const accordions = document.getElementsByClassName("accordion");

    for (const acc of accordions) {
        acc.onclick = function(){
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            const panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }

    document.addEventListener('change', function(event) {
        if (event.target.type == "radio") {
            showAndHideTargets()
        }
    })

    function showAndHideTargets() {
        for (const [target, trigger] of Object.entries(triggerList)) {
            const targetEl = document.querySelector(`#${target}`);
            const triggerEl = document.querySelector(`input[name=${trigger[0]}]:checked`);
            if (triggerEl && triggerEl.value==`${trigger[1]}`) {
                targetEl.removeAttribute("hidden");
            } else { 
                targetEl.setAttribute("hidden", true);
                for (const s of targetEl.querySelectorAll('input')) {
                    // clear target selection when trigger not selected
                    s.checked = false;
                }
            }
        }
    }
}, false);

// key is id of target element, value is array of trigger elements [name, value]
const triggerList = {
    speechSevereRestrFreq: ["speechRestr", "severeRestr"],
    visionRestrExplain: ["visionRestr", "severeRestr"],
    visionSevereRestrictionFreq: ["visionRestr", "severeRestr"],
    visionTherapyExplain: ["visionTherapy", "yes"],
    visionResolveYear: ["visionResolve", "yes"]
}
