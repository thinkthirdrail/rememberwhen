$(".home-services button").hover(function() {
$(this).siblings(".service-image").toggleClass("raise");
});

// $('.easyzoom--overlay.is-ready').easyZoom();

$(document).scroll(function() {
    var oop = $(".home-services").offset().top;
    if ($(window).scrollTop() >= oop) {
    $(".gallery-wrapper").css("opacity" , "1");
} else {
    $(".gallery-wrapper").css("opacity" , "0");
}

});

$("button").click(function() {
   $(".logo").toggleClass("move");
});

$(window).scroll(function(){
      $(".banner-content").css("opacity", 2.5 - $(window).scrollTop() / $('.banner-content').height());
});

$(".item").hover(function(){
    $(".item").not(this).css("opacity" , "0.5");
    }, function(){
    $(".item").not(this).css("opacity" , "1");
});

// $(document).ready(function() {



// });
