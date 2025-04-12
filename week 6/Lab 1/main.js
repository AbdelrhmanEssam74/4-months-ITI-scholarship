
const star = document.querySelector('.star');

star.addEventListener('mouseover', function () {
    if (star.getAttribute('data-clicked') === "false") {
        star.classList.add('filled');
    }
});


star.addEventListener('mouseout', function () {
    if (star.getAttribute('data-clicked') === "false") {
        star.classList.remove('filled');
    }
});
star.addEventListener('click', function () {
    if (star.getAttribute('data-clicked') === "false") {
        star.setAttribute('data-clicked', 'true');
        star.classList.add('filled');
    } else {
        star.setAttribute('data-clicked', 'false');
        star.classList.remove('filled');
    }
});