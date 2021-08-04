$("#toggle").click(function() {
    $(this).toggleClass("on");
    $("#menu").slideToggle();
});


$(document).ready(function() {
    $("#btn--gallery").click(function() {
        $(".custom__gallery").append("<div class='col-lg-3 col-md-4 col-sm-6 gallery__box'><div><img src='images/img002.png' class='img-fluid'></div></div><div class='col-lg-3 col-md-4 col-sm-6 gallery__box'><div><img src='images/img008.png' class='img-fluid'></div></div><div class='col-lg-3 col-md-4 col-sm-6 gallery__box'><div><img src='images/img0010.png' class='img-fluid'></div></div><div class='col-lg-3 col-md-4 col-sm-6 gallery__box'><div><img src='images/img008.png' class='img-fluid'></div></div>");
    });
});


var btn = $('#myBtn');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, 'slow');
});



var p = $(".popup__overlay");

$("#popup__toggle").click(function() {
  p.css("display", "block");
});
p.click(function(event) {
  e = event || window.event;
  if (e.target == this) {
    $(p).css("display", "none");
  }
});
$(".popup__close").click(function() {
  p.css("display", "none");
});

//video popup
function toggleVideo(state) {
  // if state == 'hide', hide. Else: show video
  var div = document.getElementById("popupVid");
  var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
  //div.style.display = state == 'hide' ? 'none' : '';
  func = state == "hide" ? "pauseVideo" : "playVideo";
  iframe.postMessage(
    '{"event":"command","func":"' + func + '","args":""}',
    "*"
  );
}

$("#popup__toggle").click(function() {
  p.css("visibility", "visible").css("opacity", "1");
});

p.click(function(event) {
  e = event || window.event;
  if (e.target == this) {
    $(p)
      .css("visibility", "hidden")
      .css("opacity", "0");
    toggleVideo("hide");
  }
});

$(".popup__close").click(function() {
  p.css("visibility", "hidden").css("opacity", "0");
  toggleVideo("hide");
});
