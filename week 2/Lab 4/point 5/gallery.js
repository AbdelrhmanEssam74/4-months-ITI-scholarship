let images = document.querySelectorAll('.gallery img')  // Select images in gallery
let play = document.querySelector('#play') 
let stop = document.querySelector('#stop') 
let prev = document.querySelector('#prev') 
let next = document.querySelector('#next') 
let gallery = document.querySelector('.gallery')  // Select the gallery div
let x = 0 
let stopGallery 
function showImage(i) {
    images.forEach(e => e.style.display = "none") 
    images[i].style.display = "block" 
}
showImage(x)
play.onclick = () => {
    stopGallery = setInterval(() => {
        x = (x + 1) % images.length
        showImage(x)
    }, 500)
} 

gallery.addEventListener("mouseenter", () => {
    stopSlideshow() 
    stopGallery = setInterval(() => {
        x = (x + 1) % images.length 
        showImage(x) 
    }, 500) 
}) 
gallery.addEventListener("mouseleave", () => {
    stopSlideshow() 
}) 
stop.onclick = () => {
    stopSlideshow() 
} 
function stopSlideshow() {
    clearInterval(stopGallery) 
}
next.onclick = () => {
    x = (x + 1) % images.length 
    showImage(x) 
} 
prev.onclick = () => {
    x = (x - 1 + images.length) % images.length 
    showImage(x) 
} 
