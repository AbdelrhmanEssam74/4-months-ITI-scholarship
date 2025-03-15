let username = document.getElementById("username");
let password = document.getElementById("password");
let rememberMe = document.getElementById("agreeCheckbox");
let loginForm = document.querySelector("form");

window.onload = function () {
    if (localStorage.getItem("remember") === "true") {
        username.value = localStorage.getItem("username") || "";
        password.value = localStorage.getItem("password") || "";
        rememberMe.checked = true;
    }
};

loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    if (username.value.trim().length > 0) {
        if (password.value.trim().length > 0) {
            if (rememberMe.checked) {
                localStorage.setItem("username", username.value);
                localStorage.setItem("password", password.value);
                localStorage.setItem("remember", "true");
            } else {
                localStorage.removeItem("username");
                localStorage.removeItem("password");
                localStorage.removeItem("remember");
            }
            loginForm.submit();
        } else {
            alert("Password field is required.");
        }
    } else {
        alert("Username field is required.");
    }
});
if (window.localStorage.length > 0){
    if (localStorage.getItem("username"))
    alert("Username: " + localStorage.getItem("username"));
}
