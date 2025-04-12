//? point 1

let c1 = document.getElementById("c1");
c1.addEventListener("mouseover", function() {
    c1.style.fill = "red";
    c1.style.stroke = "yellow";
    c1.style.strokeWidth = "4px";
});
c1.addEventListener("mousedown", function() {
    c1.style.fill = "orange";
    c1.style.stroke = "red";
    c1.style.strokeWidth = "1px";
});
c1.addEventListener("mouseup", function() {
    alert("Mouse Up");
});

//? point 2
let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");

// let img1 = new Image()
// let img2 = new Image()
// img1.src = "sad.png";
// img2.src = "smiley.png";
// img1.onload = function () {
//     ctx.clearRect(0, 0, 500, 400);
//     ctx.drawImage(img1, 0, 0, 200, 200);
// };
//
// canvas.addEventListener("mousedown", ()=>{
//     ctx.clearRect(0, 0, 500, 400);
//     ctx.scale(1.5, 1.5);
//     ctx.drawImage(img2, 0, 0, 200, 200);
// })
// canvas.addEventListener("mouseup", ()=>{
//     ctx.clearRect(0, 0, 500, 400);
//     ctx.scale(1, 1);
//     ctx.drawImage(img1, 0, 0, 200, 200);
// })


//? point 3
// ctx.beginPath();
// ctx.arc(200, 200, 100, 0, 2 * Math.PI)
// ctx.fillStyle = "rgba(0, 100, 255, 0.4)";
// ctx.fill()
//
// let gradient = ctx.createLinearGradient(100, 200, 300, 200);
// gradient.addColorStop(0, "red");
// gradient.addColorStop(0.5, "blue");
// gradient.addColorStop(1, "green");
//
// ctx.font="bold 30px Arial";
// ctx.fillStyle = gradient
// ctx.textAlign = "center";
// ctx.fillText("Abdelrhman", 200, 200);

//When left click and drag, make the mouse draw on the canvas, and erase when right click and drag

// let isDrawing = false;
// let isErasing = false;
// let lastX = 0;
// let lastY = 0;
// canvas.addEventListener("mousedown", (e) => {
//     if (e.button === 0) {
//         isDrawing = true;
//         lastX = e.offsetX;
//         lastY = e.offsetY;
//     } else if (e.button === 2) {
//         isErasing = true;
//         lastX = e.offsetX;
//         lastY = e.offsetY;
//     }
// });
// canvas.addEventListener("mousemove", (e) => {
//     if (isDrawing) {
//         ctx.beginPath();
//         ctx.arc(lastX , lastY , 10 , 0,2 * Math.PI);
//         ctx.fillStyle = "red";
//         ctx.fill();
//     } else if (isErasing) {
//         ctx.clearRect(e.offsetX, e.offsetY, 15, 15);
//     }
// });
// canvas.addEventListener("mouseup", (e) => {
//     if (e.button === 0) {
//         isDrawing = false;
//     } else if (e.button === 2) {
//         isErasing = false;
//     }
// });

//? point 4
let draggedElem;

function dragStart(draggable) {
    draggedElem = draggable;
}

function drop(droppableItem) {

    droppableItem.appendChild(draggedElem);
}

//? point 5
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(map, error);
    } else {
        alert("geolocation is not supported");
    }
}

function map(position) {
    let latitude = position.coords.latitude;
    let longitude = position.coords.longitude;
    let url = "https://www.google.com/maps?q=" + latitude + "," + longitude;
    window.open(url, "_blank");
}

function error(error) {
    console.log(error.message);
}