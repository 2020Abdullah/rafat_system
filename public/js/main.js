function rtl() {
  var body = document.body;
  body.classList.toggle("rtl");
}

function dark() {
  var body = document.body;
  body.classList.toggle("dark");
}

$(document).ready(function () {
  $("ul.a-collapse").click(function () {
    // console.log($(this).hasClass("short"));
    if ($(this).hasClass("short")) {
      $(".a-collapse").addClass("short");
      $(this).toggleClass("short");
      $(".side-item-container").addClass("hide animated");
      $("div.side-item-container", this).toggleClass("hide animated");
    } else {
      $(this).toggleClass("short");
      $("div.side-item-container", this).toggleClass("hide animated");
    }
  });

$('.navbar-toggler').on('click', function(){
  $('.bmd-layout-container').toggleClass('bmd-drawer-in')
  $('.bmd-layout-drawer').toggleClass('show')
})

if($(window).width() < 992){
  $('.bmd-layout-container').removeClass('bmd-drawer-in')
}
else {
  $('.bmd-layout-container').addClass('bmd-drawer-in')
}

});




