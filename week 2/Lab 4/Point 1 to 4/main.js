//?Task 1
// let fullNameInput = document.querySelector("#fullName")
// let fullNameRegex = /^[A-Za-z\s]{3,}$/;

// function createErrorBox(message, input, remove = false) {
//     let inputContainer = input.parentElement;
//     let errorBoxExist = inputContainer.querySelector(".error")
//     if (remove) {
//         if (errorBoxExist) {
//             errorBoxExist.remove();
//             input.style.backgroundColor = "white "
//             input.style.color = "black"
//         }
//     } else {
//         if (!errorBoxExist) {
//             let errorBox = document.createElement("p")
//             errorBox.classList.add("error")
//             errorBox.textContent = message;
//             inputContainer.appendChild(errorBox)
//             input.style.backgroundColor = "gray"
//             input.style.color = "white"
//         }
//     }
// }
//
// fullNameInput.addEventListener("focus", (e) => {
//     e.target.style.border = "1px solid blue";
// });
// fullNameInput.addEventListener("input", (e) => {
//     let isValid = fullNameRegex.test(e.target.value);
//     if (!isValid) {
//         e.target.style.border = "1px solid red";
//         createErrorBox("Invalid Name", fullNameInput);
//     } else {
//         e.target.style.border = "1px solid green";
//         createErrorBox("", fullNameInput, true);
//     }
// });
// fullNameInput.addEventListener("blur", (e) => {
//     let isValid = fullNameRegex.test(e.target.value);
//     if (!isValid) {
//         e.target.select()
//         e.target.style.border = "1px solid red"
//     } else {
//         e.target.style.border = "1px solid green"
//
//     }
// })
// // password validation
// let passwordInput = document.querySelector("#password");
// let repeatPasswordInput = document.querySelector("#repeatPassword")
//
// repeatPasswordInput.addEventListener("input", (e) => {
//     if (passwordInput.value !== "") {
//         if (passwordInput.value !== e.target.value) {
//             e.target.style.border = "1px solid red";
//             createErrorBox("Passwords do not match", repeatPasswordInput);
//         } else {
//             e.target.style.border = "1px solid green";
//             createErrorBox("", repeatPasswordInput, true);
//
//         }
//     }
// })

//?Task 2
// let RegFrom = document.querySelector("form")
// let fullNameInput = document.querySelector("#fullName")
// let emailInput = document.querySelector("#email")
// let passwordInput = document.querySelector("#password")
// let repeatPasswordInput = document.querySelector("#repeatPassword")
// let city = document.querySelector("#city")
// let acceptTerms = document.querySelector("#terms")
// RegFrom.addEventListener("submit", (e) => {
//     e.preventDefault();
//     if (IsValidate()) {
//         RegFrom.submit();
//     }
// });
//
// function IsValidate() {
//     let isValid = true;
//
//     isValid &= checkFullName();
//     isValid &= checkEmail();
//     isValid &= checkSelectCity();
//     isValid &= checkPassword();
//     isValid &= validatePasswordMatch();
//     isValid &= checkAcceptTerms();
//
//     return isValid;
// }
//
// function checkAcceptTerms() {
//     if (!acceptTerms.checked) {
//         createErrorBox("Please accept the terms", acceptTerms);
//         return false;
//     } else {
//         createErrorBox("", acceptTerms, true);
//     }
//     return true;
// }
//
// function checkInputValue(input, regex = null) {
//     const value = input.value.trim();
//     return regex ? regex.test(value) : value !== "";
// }
//
// function validateField(input, regex, errorMessage) {
//     if (!checkInputValue(input, regex)) {
//         input.style.border = "1px solid red";
//         createErrorBox(errorMessage, input);
//         return false;
//     } else {
//         input.style.border = "2px solid green";
//         createErrorBox("", input, true);
//         return true;
//     }
// }
//
// function checkFullName() {
//     return validateField(fullNameInput, /^[A-Za-z\s]{3,}$/, "Invalid Name");
// }
//
// function checkEmail() {
//     return validateField(emailInput, /^[^\s@]+@[^\s@]+\.[^\s@]+$/, "Invalid Email");
// }
//
// function checkSelectCity() {
//     return validateField(city, /.+/, "Select City");
// }
//
// function checkPassword() {
//     return validateField(passwordInput, /.+/, "Password is required");
// }
//
// function validatePasswordMatch() {
//     if (passwordInput.value.trim() !== repeatPasswordInput.value.trim()) {
//         repeatPasswordInput.style.border = "1px solid red";
//         createErrorBox("Passwords do not match", repeatPasswordInput);
//         return false;
//     } else {
//         repeatPasswordInput.style.border = "2px solid green";
//         createErrorBox("", repeatPasswordInput, true);
//         return true;
//     }
// }
//
// function createErrorBox(message, input, remove = false) {
//     let errorBox = input.parentElement.querySelector(".error");
//
//     if (remove) {
//         if (errorBox) errorBox.remove();
//         input.style.backgroundColor = "white";
//         input.style.color = "black";
//     } else {
//         if (!errorBox) {
//             errorBox = document.createElement("p");
//             errorBox.classList.add("error");
//             input.parentElement.appendChild(errorBox);
//         }
//         errorBox.textContent = message;
//     }
// }
