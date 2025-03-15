let image = document.createElement('img')
image.setAttribute('src','../images/image1.jpeg')

let parent = document.getElementById('parent')
// parent.appendChild(image) // insert the image into the div
document.body.insertBefore(image , parent)