let colors = ['red', 'blue', 'orange', 'green'];

$("body").on("mouseenter mouseleave", "div", function () {
    let currentClass = colors.find(c => $(this).hasClass(c));
    if (!currentClass) return;
    let index = colors.indexOf(currentClass);
    let nextIndex = (index + 1) % colors.length;
    let nextClass = colors[nextIndex];
    $(this).toggleClass(nextClass);
    console.log("Hovered:", $(this).attr("class"));
    console.log("Matched color:", currentClass);

});

$("body").on("click", "div", function () {
    let currentClass = colors.find(c => $(this).hasClass(c));
    if (!currentClass) return;
    let index = colors.indexOf(currentClass);
    let nextIndex = (index + 1) % colors.length;
    let nextClass = colors[nextIndex];
    $(this).after(`<div class='${nextClass}'></div>`);
});
