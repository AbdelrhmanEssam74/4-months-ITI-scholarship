//? Task1
$(".container1  div").each(function () {
    let className = $(this).attr("class");
    $(this).css("background-color", className);
    let pClassName = $(this).find("p").attr("class");
    $(this).find("p").css("color", pClassName);
});

///////////////////////////////////////////////////

//? Task2
$(".container2 a").each(function () {
    let href = $(this).attr("href");
    if (href.includes("google")) {
        $(this).text("Google");
    } else if (href.endsWith("org")) {
        $(this).text("IEEE");
    } else if (href.startsWith("https")) {
        $(this).text("Facebook");
    } else if (href.startsWith("http")) {
        $(this).append("Official Website");
    }
})

///////////////////////////////////////////////////

//? Task3
$(".container3 figure img:eq(2)").attr("src", "img/orange.png")
$(".container3 figure:eq(2) figcaption").text("fig.3 - Orange Juice");
//? Bonus
$(".container3 figure:eq(2)").find("img").attr("src", "img/orange.png");
$(".container3 figure:eq(2)").find("figcaption").text("fig.3 - Orange Juice");

///////////////////////////////////////////////////

//? Task4
$(".container4 td[class='my-name']").css("color", "blue");
$(".container4 td:odd").css("background-color", "pink");
$(".container4 table:first tr:last td:eq(1)").css("font-weight", "bold");

///////////////////////////////////////////////////

//? Task5
$(".container5 ul li:eq(1)").css("font-style", "italic");
$(".container5 ol li:eq(2)").css("color", "red");
