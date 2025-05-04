//? task 1
let div = $("<div></div>").addClass("black")
let div2 = $("<div></div>").addClass("white")
let p = $("<p></p>").addClass("yellow").text("yellow")
$(".container1").append(div)
$(".container1").prepend(div2)
p.insertBefore(".pink")

//////////////////////////////////////////////////////////////////////////

//? task 2
$(".container2 p").each(function () {
    let text = $(this).text();
    $(this).replaceWith(`<a href="http://${$(this).text()}">${text}</a>`)
});

//////////////////////////////////////////////////////////////////////////

//? task 3
$("img").wrap("<figure></figure>")
let caption = $("<figcaption></figcaption>").text("Coffee");
caption.insertAfter("img")

//////////////////////////////////////////////////////////////////////////

//? task 4
$(".container4 td.col-age").empty();
$(".container4 td:contains('mohsen')").addClass("man");
$(".container4 td.your-email").removeClass("your-email");
$(".container4 td:not(.your-email)").addClass("your-email");

//////////////////////////////////////////////////////////////////////////

//? task 5
let list = $(".container5 ul li").filter(function (index) {
    return index % 3 === 0;
});
console.log(list)
list.each(function () {
    $(this).css("color", "red");
});

//////////////////////////////////////////////////////////////////////////

//? task 6
$("input[name='username']").val("Abdelrhman");
$("#my-form input[type='checkbox']").prop("checked", true);