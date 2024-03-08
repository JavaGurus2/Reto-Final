import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min";
document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("dark-mode-toggle");
    const sidebarElement = document.querySelector(
        ".col-auto.d-flex.flex-column.min-vh-100"
    );

    // Establece el modo según la cookie al cargar la página
    const darkModeCookie = getCookie("darkMode");
    if (darkModeCookie === "enabled") {
        document.body.classList.add("dark-mode");
        sidebarElement.classList.add("dark-bg");
        darkModeToggle.checked = true;
    }

    if (darkModeToggle && sidebarElement) {
        darkModeToggle.addEventListener("click", function () {
            document.body.classList.toggle("dark-mode");
            sidebarElement.classList.toggle(
                "light-bg",
                !document.body.classList.contains("dark-mode")
            );
            sidebarElement.classList.toggle(
                "dark-bg",
                document.body.classList.contains("dark-mode")
            );

            // Guarda la preferencia en una cookie
            if (document.body.classList.contains("dark-mode")) {
                setCookie("darkMode", "enabled", 30); // Guarda la cookie por 30 días
            } else {
                setCookie("darkMode", "disabled", 30); // Guarda la cookie por 30 días
            }
        });
    }

});

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + "=; Max-Age=-99999999;";
}
