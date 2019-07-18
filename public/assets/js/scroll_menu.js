$(window).scroll(function() {
    if ($(this).scrollTop() > 60) {
        $('.navbar').addClass('navbar-fixed-top');
        $(".navbar").css("box-shadow", "0 5px 10px 0px rgba(20, 20, 28, 0.3)");
        //$("#bs-example-navbar-collapse-1").css("background", "rgb(35, 36, 38)");
        $('#toTop').fadeIn();
    }
    if ($(this).scrollTop() < 60) {
        $('.navbar').removeClass('navbar-fixed-top')
        $(".navbar").css("box-shadow", "");

        $('#toTop').fadeOut();
        //alert($(this).scrollTop());
        // создаем эффекты и анимацию
    }
});


$(document).ready(function() {
    $(".navbar-toggle").click(function () {
        if ($("#t-button").hasClass("zmdi-view-toc")) {
            $("#t-button").removeClass("zmdi-view-toc");
            $("#t-button").addClass("zmdi-close-circle-o");
        }
        else {
            $("#t-button").removeClass("zmdi-close-circle-o");
            $("#t-button").addClass("zmdi-view-toc");
        }
    });
});
