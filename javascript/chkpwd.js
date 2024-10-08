function checkpwd() {
    let pwd = document.getElementById("password");
    let password_content = pwd.value;
    let pwdlen = password_content.length;
    let output = document.getElementById("output");

    if (pwdlen < 6) {
        output.innerHTML = "Minimum password length: 6";
        return false;
    } else {
        output.innerHTML = "";
        return true;
    }
}

document.getElementById("form1").addEventListener("submit", function(event) {
    if (!checkpwd()) { // Call checkpwd() and prevent submission if validation fails
        event.preventDefault();
    }
});