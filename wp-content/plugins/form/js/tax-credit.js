document.addEventListener("DOMContentLoaded", function(e) {
    var accordions = document.getElementsByClassName("accordion");

    for (var i = 0; i < accordions.length; i++) {
        accordions[i].onclick = function(){
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
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
        // TODO refactor with ES6 and destructuring
        var speechSevereRestrictionFreq = document.querySelector("#speechSevereRestrictionFreq");
        // Show speechSevereRestrictionFreq div only when there is a severe restriction
        if (document.querySelector("input[name=speechRestr]:checked") && document.querySelector("input[name=speechRestr]:checked").value=="severeRestr") {
            speechSevereRestrictionFreq.removeAttribute("hidden");
        } else { 
            speechSevereRestrictionFreq.setAttribute("hidden", true);
            for (var s of document.getElementsByName("speechRestrFreq")) {
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
