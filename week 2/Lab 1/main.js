// Task 1
// alert("Welcome to my website!");
// var name = prompt("What is your name?");
// document.write(`<h2>Welcome ${name} to my website</h2>`);

// Task 2
// function sum(num1, num2) {
//     return num1 + num2;
// }
// var sum_btn = document.getElementById("sum-btn");
// console.log(sum_btn);
// sum_btn.addEventListener("click", function () {
//     var num1 = parseInt(prompt("Enter first number"))
//     var num2 = parseInt(prompt("Enter second number"))
//     document.getElementById("result").innerHTML = num1 + " + " + num2 + " = " + sum(num1, num2);
// });

// Task 3
// function temperature(value) {
//     return   (value >= 30) ? "<p>The Weather is HOT</p>" : "<p>The Weather is COLD</p>";
// }
// document.write(temperature(10))

// Task 4
// function temperature(value, actualFeel) {
//     if (value >= 25 && value <= 30 && actualFeel >= 25 && actualFeel <= 30) {
//         return "Normal";
//     } else if (value < 25 && actualFeel < 25) {
//         return "Cold";
//     } else if (value > 30 && actualFeel > 30) {
//         return "Hot";
//     } else {
//         return "Ambiguous, can’t detect";
//     }
// }

// function temperature(value, actualFeel) {
//     return (value >= 25 && value <= 30 && actualFeel >= 25 && actualFeel <= 30) ? "Normal" :
//         (value < 25 && actualFeel < 25) ? "Cold" :
//             (value > 30 && actualFeel > 30) ? "Hot" :
//                 "Ambiguous, can’t detect";
// }

// document.write(temperature(60, 27))

// Task 5
// function checkFaculty(value){
//     switch (value.toUpperCase()) {
//         case "FCI":
//             return "You’re eligible to Programing tracks";
//         case "Engineering":
//             return "You’re eligible to Network and Embedded tracks";
//         case "Commerce":
//             return "You’re eligible to ERP and Social media tracks";
//         default:
//             return "You’re eligible to SW fundamentals track";
//     }
// }
// document.write(checkFaculty("fic"))


// Task 6
// function oddNumbers(start , end) {
//     for (let i = start; i <= end; i++) {
//         if (i % 2 !== 0) {
//             document.write(i + "  ")
//         }
//     }
// }
// oddNumbers(1, 15)

// Task 7
// function expression() {
//     let input = prompt("Enter the expression");
//     document.write(input + " = " +eval(input))
// }

// Task 8
// let username = "";
// while (true) {
//     username = prompt("Enter Your Name");
//     if (isNaN(username) && username) {
//         break;
//     } else {
//         alert("Please Enter a valid name");
//     }
// }
// let birthYear = 0;
// while (true) {
//     birthYear = parseInt(prompt("Enter Your Birth Year"));
//     if (!isNaN(birthYear) && birthYear < 2010) {
//         break
//     } else {
//         alert("Please Enter a valid Birth Year");
//     }
// }
// let currentYear = new Date().getFullYear();
// let age = currentYear - birthYear;
// document.write("<p>Name: " + username + "<br/>Birth Year: " + birthYear + "<br/>Age: " + age + "</p>")

// Task 9
//
// console.log("line one")
// debugger
// console.log("line two")
// console.log("line three")
// console.log("line four")
// console.log("line five")

// Task 10
// Hosting => Hoisting is JavaScript's default behavior of moving all declarations to the top of the current scope
// x = 5
// console.log(x)
// var y
// alert(y)
// y = 10;
// let x =>  The block of code is aware of the variable, but it cannot be used until it has been declared.
// const x =>  The block of code is aware of the variable, but it cannot be used until it has been declared.

// Task 11
// in non-strict mode, javascript tries to automatically declare a global variable if it is not declared
// in strict mode, javascript throws an error if a variable is not declared
// point 1
// function foo() {
//     "use strict";
//     var x;
//     x = 5;
//     y = 6; // Uncaught ReferenceError: y is not defined
//     return x + y;
// }
// console.log(foo());
// function foo2() {
//     var x;
//     x = 5;
//     y = 6;
//     return x + y;
// }
// console.log(foo2());

// point 2
// this code will run with strict mode but why
// "use strict";
// var y;
// y = 10;
// x = 5;
// console.log(x);
// console.log(y);
// // var x;

// point 3
// What’s the value of y variable in the following code? And why?
// value of y = undefined , because y variable is initialized after the console.log statement
// Declarations are hoisted, but assignments remain in place.
// assignment y = 7 happens after console.log(y)
// var x = 5;
// console.log(x);
// console.log(y);
// var y = 7;

// point 4
// function test() {
//     for (let i = 0; i < 10; i++) {
//         alert(i);
//         alert(x); // Error1 =>try to access  x before initialized
//         let x = 10;
//
//     }
//     console.log(i); // Error2 => I is out of scope or not defined
// }
//
// test();
// var can be declared and accessed globally or locally, but let can only be declared locally and  access is limited to the block in which it is declared.

// *Bonus Assignments
// ?Point 1
function welcome(){
    for (let i = 1; i <= 6; i++) {
        document.write(`<h${i}> Heading${i}</h>`);
    }
}
welcome();
