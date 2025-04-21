"use strict"


/* Sherah Sidebar Menu */
const cs_button = document.querySelectorAll(".sherah__sicon");
const cs_action = document.querySelectorAll(".sherah-smenu, .sherah-header, .sherah-adashboard");

cs_button.forEach(button => {
    button.addEventListener("click", function() {
        cs_action.forEach((el) => {
            el.classList.toggle("sherah-close");
        });
        localStorage.setItem("iscicon", cs_action[0].classList.contains("sherah-close"));
    });
});

if (localStorage.getItem("iscicon") === "true") {
    cs_action.forEach((el) => {
        el.classList.add("sherah-close");
    });
}


