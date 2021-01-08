$(function () {
    var wind = $(window),
        header = $(".Title"),
        headerOffsetTop = header.offset().top;

    wind.scroll(function () {
        if ($(this).scrollTop() >= headerOffsetTop) {
            header.addClass("sticky");
        } else {
            header.removeClass("sticky");
        }
    });
});