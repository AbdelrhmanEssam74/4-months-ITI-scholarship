let username = document.getElementById("username");
let password = document.getElementById("password");
let rememberMe = document.getElementById("agreeCheckbox");
let loginForm = document.querySelector("form");

function getCookie(name) {
    let cookies = document.cookie.split('; ');
    for (let cookie of cookies) {
        let [key, value] = cookie.split('=');
        if (key === name) {
            return value;
        }
    }
    return "";
}
window.onload = function () {
    if (getCookie("remember") === "true") {
        username.value = getCookie("username") || "";
        password.value = getCookie("password") || "";
        rememberMe.checked = true;
    }
};
loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    if (username.value.trim().length > 0) {
        if (password.value.trim().length > 0) {
            let expires = "expires=Thu, 18 Dec 2025 12:00:00 UTC; path=/";
            let deleteExpires = "expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";

            if (rememberMe.checked) {
                document.cookie = `username=${username.value}; ${expires}`;
                document.cookie = `password=${password.value}; ${expires}`;
                document.cookie = `remember=true; ${expires}`;
            } else {
                document.cookie = `username=; ${deleteExpires}`;
                document.cookie = `password=; ${deleteExpires}`;
                document.cookie = `remember=false; ${deleteExpires}`;
            }
            loginForm.submit();
        } else {
            alert("Password field is required.");
        }
    } else {
        alert("Username field is required.");
    }
});
