document.addEventListener("DOMContentLoaded", function(e) {
    const accordions = document.getElementsByClassName("accordion");
    console.log(document.querySelectorAll("#very"));

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
        // Show speechSevereRestrFreq tr only when there is a severe restriction
        const speechSevereRestFreq = document.querySelector("#speechSevereRestrFreq");
        const speechSevereRest = document.querySelector("input[name=speechRestr]:checked");
        if (speechSevereRest && speechSevereRest.value=="severeRestr") {
            speechSevereRestrFreq.removeAttribute("hidden");
        } else { 
            speechSevereRestrFreq.setAttribute("hidden", true);
            for (const s of document.getElementsByName("speechRestrFreq")) {
                // clear speechSevereRestrFreq selection when there is not a severe restriction
                s.checked = false;
            }

        }
        // switch (name+id) {
        //     case "speechRestrsevereRestr":
        //         document.querySelector("#speechSevereRestrFreq").removeAttribute("hidden");
        //         break;
        // }
    }
}, false);
