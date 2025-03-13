//? Task 1
// let textInput = document.querySelector("#textInput")
// textInput.addEventListener("keydown", (e) => {
//     alert(e.code)
// });
// textInput.addEventListener("mousedown", (e) => {
//     if (e.button === 0) button = "Left Click";
//     else if (e.button === 1) button = "Middle Click";
//     else if (e.button === 2) button = "Right Click";
//     alert("Mouse Button: " + button);
// })

//? Task 2
// let clock_btn = document.querySelector("#clock_btn")
// let clock = document.querySelector("#clock")
// clock_btn.onclick = () =>
// {
//     clockInterval = setInterval(() => {
//         clock.textContent = new Date().toLocaleTimeString();
//     }, 1000)
// }
// document.addEventListener("keydown" , (e)=>{
//     if(e.altKey && e.key === "w")
//     {
//         clearInterval(clockInterval)
//         alert("Clock Stoped")
//     }
//
// })

//?Task 3
// let images = document.querySelectorAll('img')
// let counter = 0;
// let increaseCounter = ()=>{
//     counter++;
//     alert(`counter = ${counter}`);
// }
// images.forEach(image => {
//     image.addEventListener('click', increaseCounter)
// })
// setTimeout(()=>{
//     images.forEach(image => {
//         image.removeEventListener('click', increaseCounter)
//         image.addEventListener("click" , ()=>{
//             alert("Game Over")
//         })
//
//     })
// } , 3000)

//? Task 5
// let openAdWindow = () => {
//     adWindow = window.open("", "AdWindow", "width=600 , height=400")
//     setTimeout(() => {
//         if (adWindow) {
//             adWindow.document.write(`
//             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
//             `)
//         }
//     }, 3000)
// }
// let closeCurrentPage = () => {
//     window.close();
// }

//? Task 7
// document.getElementById("firstName").addEventListener("keydown", function(event) {
//     let key = event.key;
//
//     if (!/^[a-zA-Z\s]$/.test(key) && key !== "Backspace") {
//         event.preventDefault();
//     }
// });
