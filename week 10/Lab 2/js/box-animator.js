$(document).ready(function () {
    $(".box").animate({
        left: "300px", 'background-color': "blue", height: '+=70px', width: '+=70px'
    }, 2000, function () {
        $(this).animate({
            bottom: "200px", 'background-color': "yellow", height: '-=70px', width: '-=70px'
        }, 2000, function () {
            $(this).animate({
                left: 0, 'background-color': "green", height: "+=70px", width: "+=70px"
            }, 2000, function () {
                $(this).animate({
                    top: 0, 'background-color': "red", height: "-=70px", width: "-=70px"
                }, 2000)
            })
        });
    })
});
