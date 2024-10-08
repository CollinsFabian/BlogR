function swap() {
    let body = document.getElementById("body");
    let darkModeCheckbox = document.getElementById("darkModeCheckbox");
    let nav = document.getElementById("navContent")

    if (darkModeCheckbox.checked) {
        body.style.backgroundColor = "#002422";
        body.style.color = "#ffffff";
        nav.style.color = "#000";
        localStorage.setItem("backgroundColor", "#002422");
        localStorage.setItem("textColor", "#ffffff");
        console.log("Background Changed to teal green dark");
    } else {
        body.style.backgroundColor = "#eaeaea";
        body.style.color = "#333";
        nav.style.color = "#333";
        localStorage.setItem("backgroundColor", "#eaeaea");
        localStorage.setItem("textColor", "#333");
        console.log("Background Changed to normal");
    }
}

// Check if there's a stored background color and text color
document.addEventListener("DOMContentLoaded", function() {
    let storedBackgroundColor = localStorage.getItem("backgroundColor");
    let storedTextColor = localStorage.getItem("textColor");

    if (storedBackgroundColor) {
        let body = document.getElementById("body"); // Change "toggle" to "body"
        body.style.backgroundColor = storedBackgroundColor;
        body.style.color = storedTextColor;
    }
});