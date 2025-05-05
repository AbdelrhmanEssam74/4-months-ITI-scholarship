let increateBtn = $("#increase");
let decreaseBtn = $("#decrease");
let content = $(".content");
let error = $(".error");

let fontSize = 16;
let maxFontSize = 34;
let minFontSize = 10;
increateBtn.on("click", increase);
decreaseBtn.on("click", decrease);

function increase() {
    decreaseBtn.attr("disabled", false);
    error.text("");
    fontSize += 2;
    if (fontSize >= maxFontSize) {
        error.text("you reached the maximum font size");
        increateBtn.attr("disabled", true);
        return 0;
    }
    content.css("font-size", fontSize + "px");
}

function decrease() {
    increateBtn.attr("disabled", false);
    error.text("");
    fontSize -= 2;
    if (fontSize <= minFontSize) {
        error.text("you reached the minimum font size");
        decreaseBtn.attr("disabled", true);
        return 0;
    }
    content.css("font-size", fontSize + "px");
}