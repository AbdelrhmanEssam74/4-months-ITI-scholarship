//?Task 1
// const tips = [
//     "Use 'let' and 'const' instead of 'var' for better scoping.",
//     "Always use strict equality (===) to avoid type coercion issues.",
//     "Use arrow functions for cleaner syntax and to maintain 'this' context.",
//     "Take advantage of template literals for easier string interpolation.",
//     "Use the spread operator (...) to easily copy or merge arrays and objects.",
//     "Utilize async/await for cleaner asynchronous code.",
//     "Keep your functions small and focused on a single task.",
//     "Use console.log() for debugging, but remember to remove it in production.",
//     "Learn about closures to better understand scope and variable access.",
//     "Familiarize yourself with the Document Object Model (DOM) for manipulating HTML."
// ];
//
// function Random() {
//     let index = Math.floor(Math.random() * tips.length)
//     document.write(`<h2>Today Tip</h2>`)
//     document.write(`<p> ${tips[index]} </p>`)
// }
// Random();

//?Task 2

let currentDate = new Date()
let formatedDate = currentDate.toLocaleString()
function makeDate(){
    document.getElementById('date').innerHTML = formatedDate
}

//?Task 3

// function checkEmail() {
//     let email = prompt("Please enter your email")
//     let index = email.indexOf("@");
//     if (index !== -1) {
//         let lastIndex = email.lastIndexOf("@");
//         if (index!== 0 && lastIndex!== email.length - 1) {
//             alert("Valid Email");
//         } else {
//             alert("Invalid Email: Email should not start or end with @");
//         }
//     }
//     else {
//         alert("Invalid Email: Email should contain @");
//     }
// }
// checkEmail();

//?Task 4

// let nameRegex = /^([a-zA-Z]{3,}( [a-zA-Z]{3,})*)$/
// let emailRegex = /^[a-zA-Z]{1,63}@[a-zA-Z]+\.(com|net|edu|org).eg$/
// while (true) {
//     let username = prompt("Enter Your Name");
//     if (nameRegex.test(username)) {
//         let email = prompt("Enter your email address");
//         if (emailRegex.test(email)) {
//             alert("Thank you for providing valid information");
//             break;
//         } else {
//             alert("Please Enter a valid email address");
//         }
//     } else {
//         alert("Please Enter a valid name");
//     }
// }

//?Task 6

// let studentsGrades = [60, 100, 10, 15, 85];
//*Point 1
// studentsGrades.sort(function (a, b) {
//     return b - a
// })
// console.log(studentsGrades)

//*Point 2
// let degree  = studentsGrades.find(
//     function (v){
//         return v <= 100
//     }
// )
// console.log(degree)

//* Point 3
// studentsGrades.filter(
//     function (v){
//         return v < 60
//     }
// )
// console.log(studentsGrades)

//?Task 7

// let students = [
//     {username: "ahmed", degree: 30},
//     {username: "mohamed", degree: 15},
//     {username: "omar", degree: 35},
//     {username: "ali", degree: 80},
//     {username: "mahmood", degree: 60},
//     {username: "nour", degree: 90},
//     {username: "hatem", degree: 40},
//     {username: "saad", degree: 95},
//     {username: "mohammad", degree: 91},
//     {username: "amar", degree: 100}
// ]

//* Point 1
// console.log(
//     students.find(v =>
//         v.degree > 90 && v.degree < 100
//     )?.username
// )

//* Point 2
// console.log(
//     students.filter(v =>
//         v.degree > 60
//     ).map(v => v.username)
// )

//* Point 3
// students.push({
//     username: "user", degree: 50
// })
// for (let index in students) {
//     console.log(students[index])
// }

//* Point 4
// students.sort(
//     (a, b) => {
//         if (a.username < b.username)
//             return -1;
//         if (a.username > b.username)
//             return 1;
//         return 0;
//     }
// )
// console.log(students)

//?Task 8

// function getUserDate() {
//     let userInput = prompt("Enter your birth date (DD-MM-YYYY):");
//
//     if (!userInput) {
//         alert("No input provided.");
//         return;
//     }
//
//     if (validateDateFormat(userInput)) {
//         let day = parseInt(userInput.substring(0, 2), 10);
//         let month = parseInt(userInput.substring(3, 5), 10) - 1;
//         let year = parseInt(userInput.substring(6, 10), 10);
//
//         let birthDate = new Date(year, month, day);
//
//         alert("Your date is: " + birthDate.toDateString());
//     } else {
//         alert("Wrong Date Format");
//     }
// }
//
// function validateDateFormat(dateString) {
//     if (dateString.length !== 10) return false;
//     if (dateString.charAt(2) !== '-' || dateString.charAt(5) !== '-') return false;
//
//     let day = dateString.substring(0, 2);
//     let month = dateString.substring(3, 5);
//     let year = dateString.substring(6, 10);
//
//     return !(isNaN(day) || isNaN(month) || isNaN(year));
//
//
// }

//? Task 9

//* Syntax Error
// try {
//     eval("console.log('Hello'");
// } catch (error) {
//     console.error("Syntax Error:", error.message);
// }

//* Reference Error
// try {
//     console.log(myVariable);
// } catch (error) {
//     console.error("Reference Error:", error.message);
// }

//* Type Error
// try {
//     let num = 10;
//     num();
// } catch (error) {
//     console.error("Type Error:", error.message);
// }

//* Range Error
// try {
//     let arr = new Array(-1);
// } catch (error) {
//     console.error("Range Error:", error.message);
// }
