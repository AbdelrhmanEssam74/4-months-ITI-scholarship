//? Task 1
// let arr1 = [1, 2, 3, 4, 5];
// let arr2 = [6, 7, 8, 9, 10];
// let newArr = [...arr1, ...arr2]

//? Task 2
//* point 1
// const tips = [
//     "tip1"
//     , "tip2"
//     , "tip3"
//     , "tip4"
//     , "tip5"
//     , "tip6"
//     , "tip7"
//     , "tip8"
//     , "tip9"
//     , "tip10"
// ];
// function Generator() {
//     let index = 0;
//     return function nextTip() {
//         const tip = tips[index];
//         index++
//         return tip;
//     };
// }
// const generator = Generator();

//* point 2
// const showAll = () => {
//     for (let tip of tips) {
//         console.log(generator());
//     }
// }

//* point 3
// const showTip = () => {
//     setInterval(() => {
//         console.log(generator());
//     }, 3000);
// }

//? Task 3
// class Queue {
//     constructor(maxSize) {
//         let top = 0;
//         let queue = [];
//         this.maxSize = maxSize;
//         const getQueueElements = () => {
//             console.log(queue);
//             return queue.length;
//         };
//         this.getCurrentSize = function () {
//             return queue.length;
//         };
//         this.viewQueue = function () {
//             return getQueueElements();
//         };
//
//         this.inQueue = function (item) {
//             if (queue.length < this.maxSize) {
//                 queue[top] = item;
//                 top++;
//             } else {
//                 console.log("Queue is full! Cannot add more items.");
//             }
//         };
//         this.deQueue = function () {
//             if (queue.length > 0) {
//                 const removedItem = queue.shift();
//                 top--;
//                 return removedItem;
//             } else {
//                 console.log("Queue is empty! Nothing to remove.");
//                 return null;
//             }
//         };
//     }
// }
//
// const q = new Queue(3);
//
// q.inQueue("item1");
// q.inQueue("item2");
// q.inQueue("item3");
// q.deQueue()
// console.log("Queue Size:", q.viewQueue());