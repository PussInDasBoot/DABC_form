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
            showElementOnSelection(event.target.name, event.target.id)
        }
    })

    function showElementOnSelection(name, id) {
        switch (name+id) {
            case "speechRestrsevereRestr":
                document.querySelector("#speechSevereRestrictionFreq").removeAttribute("hidden");
                break;
        }
    }
}, false);
