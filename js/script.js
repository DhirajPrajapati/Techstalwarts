$(document).ready(function () {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        console.log("scrolled");
        if (scroll > 50) {
          $("nav").css("background", "white");
          $("nav").css("box-shadow", "0 -2px 7px #ccc");
        } else {
          $("nav").css("background", "transparent");
          $("nav").css("box-shadow", "");
        }
      });
});