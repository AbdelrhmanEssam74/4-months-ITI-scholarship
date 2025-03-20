//? Task1

// alert((function (a, b) {
//     return a + b;
// })(10, 20))

//? Task2
// let numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
//* point1
// const numbers1 = numbers.filter(n => n % 2);
// console.log(numbers1)

//* point2
// numbers.forEach((num) => {
//     if (num % 2 === 0) console.log(num);
// });

//* point3
// const numbers2 = numbers.map(n=> n*n);
// console.log(numbers2)

//* point4
// const obj = {
//     name: "ahmed",
//     age :20,
//     hello: function () {
//         console.log("hello", this.name);
//     },
//     printAge: () => {
//         console.log("age", this.name);
//     }
// };
// obj.hello();
// obj.printAge();

//?Task 3
// const student = {
//     name: "Ahmed",
//     university: "BNS",
//     faculty: "Science",
//     grade: 20
// }
// console.log(`${student.name} is a student in faculty of ${student.faculty} in university ${student.university} and his final grade is ${student.grade}`)

//? Task 4
// const student_names = new Set();
// student_names.add("ahmed");
// student_names.add("mohamed");
// student_names.add("omar");
// student_names.add("mohamed") // => set not accept duplicate values;

//* spread operator
// console.log([...student_names]);

//* for of
// for (const name of student_names) {
//     console.log(name);
// }

//? Task 5
//* define a private field
// class Person {
//     #name; -> private property
//     constructor(value) {
//         this.#name = value;
//     }
//     get name() {
//         return this.#name
//     }
// }
// const person = new Person("ahmed");

//*array at() method
// const scores = [5, 6, 7];
// console.log(scores.at(0))
// console.log(scores.at(-1))

//*string replaceAll() method
// let str = 'JS';
// let newStr = str.replaceAll('JS', 'JavaScript');
// console.log({ newStr });

// Task   6

//? Task 7
// function guessingGame() {
//     const answer  = Math.floor(Math.random() * 11);
//     return function guess(num) {
//         if (num === answer ) {
//             return `You got it`;
//         } else if (num < answer ) {
//             return "Your guess is too high";
//         } else {
//             return "Your guess is too low";
//         }
//     }
// }
// let game = guessingGame();
// let input = parseInt(prompt("Enter a number between 0 and 10"));
// console.log(game(input));