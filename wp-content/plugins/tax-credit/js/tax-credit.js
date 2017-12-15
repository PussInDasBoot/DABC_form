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
            showElementOnChange(event.target.name, event.target.id)
        }
    })

    function showElementOnChange(name, id) {
        const speechSevereRestrictionFreq = document.querySelector("#speechSevereRestrictionFreq");
        // Show speechSevereRestrictionFreq div only when there is a severe restriction
        if (document.querySelector("input[name=speechRestr]:checked") && document.querySelector("input[name=speechRestr]:checked").value=="severeRestr") {
            speechSevereRestrictionFreq.removeAttribute("hidden");
        } else { 
            speechSevereRestrictionFreq.setAttribute("hidden", true);
            for (const s of document.getElementsByName("speechRestrFreq")) {
                // clear speechSevereRestrictionFreq selection when there is not a severe restriction
                s.checked = false;
            }

        }
        // switch (name+id) {
        //     case "speechRestrsevereRestr":
        //         document.querySelector("#speechSevereRestrictionFreq").removeAttribute("hidden");
        //         break;
        // }
    }
}, false);
