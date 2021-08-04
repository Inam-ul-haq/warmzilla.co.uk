// JavaScript Document
// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());
// Place any jQuery/helper plugins in here.
//owl carousels
//partners
$('#partners').owlCarousel({
    loop:true,
    margin:30,
    autoplay:true,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:5
        },
        768:{
            items:5
        },
        992:{
            items:5
        },
        1200:{
            items:5
        }
    }
});
//trustpoilet
$('#trustpoilet').owlCarousel({
    loop:true,
    margin:0,
    autoplay:true,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1,
            stagePadding:40
        },
        540:{
            items:2,
            stagePadding:40
        },
        768:{
            items:1,
            stagePadding:220
        },
        992:{
            items:4
        },
        1200:{
            items:5
        }
    }
});
/* compare boiler menu open and close */
/*$(document).ready(function(){
    $(".comprmenuopen").click(function(e){
        e.preventDefault();
        $(".comp-bmenu").fadeToggle();
    });
});*/
/* read more / read less for desktop */
/* read more / read less for desktop */
if ($(window).width() > 1199) {
$('#article').readmore({
speed: 270,
collapsedHeight: 280,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-ilcity').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-viewbrand').readmore({
speed: 270,
collapsedHeight: 210,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerfinance').readmore({
speed: 270,
collapsedHeight: 280,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boiler').readmore({
speed: 270,
collapsedHeight: 245,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerinstall').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
};
/* read more / read less for medium desktop */
if ($(window).width() > 991 && $(window).width() < 1200) {
$('#article-boilerinstall').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});    
$('#article').readmore({
speed: 270,
collapsedHeight: 315,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boiler').readmore({
speed: 270,
collapsedHeight: 255,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerfinance').readmore({
speed: 270,
collapsedHeight: 235,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-ilcity').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-viewbrand').readmore({
speed: 270,
collapsedHeight: 210,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
};
/* read more / read less for tablet */
if ($(window).width() > 767 && $(window).width() < 992) {
$('#article').readmore({
speed: 270,
collapsedHeight: 266,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerfinance').readmore({
speed: 270,
collapsedHeight: 265,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerinstall').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-ilcity').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boiler').readmore({
speed: 270,
collapsedHeight: 235,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-viewbrand').readmore({
speed: 270,
collapsedHeight: 210,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
};
/* read more / read less for small  */
if ($(window).width() > 539 && $(window).width() < 768) {
$('#article').readmore({
speed: 270,
collapsedHeight: 450,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
};
/* read more / read less for xtra small  */
if ($(window).width() > 320 && $(window).width() < 768) {
$('#article-ilcity').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});    
$('#article-boiler').readmore({
speed: 270,
collapsedHeight: 235,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article').readmore({
speed: 270,
collapsedHeight: 580,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerfinance').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-boilerinstall').readmore({
speed: 270,
collapsedHeight: 290,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
$('#article-viewbrand').readmore({
speed: 270,
collapsedHeight: 210,
heightMargin: 16,
moreLink: '<a class="rm" href="#">Read More</a>',
lessLink: '<a class="rm" href="#">Read Less</a>',
embedCSS: true,
blockCSS: 'display: block; width: 100%;',
startOpen: false,
// callbacks
blockProcessed: function() {},
beforeToggle: function(){},
afterToggle: function(){}
});
};


$(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        var links = this.el.find('.article-title');
        links.on('click', {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.accordion-content').not($next).slideUp().parent().removeClass('open');
        };
    }
    var accordion = new Accordion($('.accordion-container'), false);
});

$(document).on('click', function (event) {
  if (!$(event.target).closest('#accordion').length) {
    $(this).parent().toggleClass('open');
  }
});

//Mobile Menu
/*$("#respMenu").aceResponsiveMenu({
  // Set the same in Media query  
  resizeWidth: '991',      
  // slow, medium, fast
  animationSpeed: 'fast', 
  // Expands all the accordion menu on click
  accoridonExpAll: false 
});*/
//Mobile Menu Overlay
$(".menu-toggle").click(function(){
    $("#respMenu").fadeToggle("fast");
    $(".mobilemenu-overlay").fadeToggle("fast");
});
$(".mobilecloseico").click(function(){
    $(".mobilemenu-overlay").fadeOut("fast");
    $("#respMenu").fadeOut("fast");
});
$(".level1click").click(function(){
    $(".level1").slideToggle();
});
$(".level2click").click(function(){
    $(".level2").slideToggle();
});
$(".level3click").click(function(){
    $(".level3").slideToggle();
});
$(".level4click").click(function(){
    $(".level4").slideToggle();
});
//Filter for mobile and tablet
$(".showfiltr").click(function(){
    $(".systmboilers .filters-wrap").fadeIn("fast");
});
$(".close-ico-filtr img").click(function(){
    $(".systmboilers .filters-wrap").fadeOut("fast");
});

function comparepopup(cats, count){
 var cats = "kwoutputdata_"+cats;
    var val = $("#"+cats).val();
    
    var val2 = $("#"+cats+'_2').val();
    
    var data= JSON.parse(val);
    
    var data2= JSON.parse(val2);
    
    // console.log(data2);
    // alert(data2);

    var html = '';
    var i;
    for (i = 0; i < count; i++) {
      html += '<input class="styled-checkbox" id="kwpop-cbox'+data[i]+'" name = "kwoutput" type="radio" value="'+data2[i]+'"><label for="kwpop-cbox'+data[i]+'">'+data[i]+'KW</label>';
    }    

    // var htmlbtn = '<button class="btnform" id = "kwpop-button" type="button" name="button" onclick = "compare(this)">Apply</button>';
    

    $('#kwoutput').empty();
    $('#kwoutput').html(html);
    
    // $('.kwpop-botm').empty();
    // $('.kwpop-botm').html(htmlbtn);
    
    
    $(".kwpop").fadeToggle();
    $(".kwoverlay").fadeToggle();
    
}

function comparepopupsingle(cats, count){

    var val = $("#"+cats).val();
    
    var val2 = $("#"+cats+'_2').val();
    
    var data= JSON.parse(val);
    
    var data2= JSON.parse(val2);
    
    // console.log(data2);
    // alert(data2);

    var html = '';
    var i;
    for (i = 0; i < count; i++) {
      html += '<input class="styled-checkbox" id="kwpop-cbox'+data[i]+'" name = "kwoutput" type="radio" value="'+data2[i]+'"><label for="kwpop-cbox'+data[i]+'">'+data[i]+'KW</label>';
    }    

    $('#kwoutput').empty();
    $('#kwoutput').html(html);
    
    
    $(".kwpop").fadeToggle();
    $(".kwoverlay").fadeToggle();
    
}


function comparepopupboil(boils , cats, count){
   var boils = "kwoutputboil_"+boils;
    var val = $("#"+boils).val();
    var data= JSON.parse(val);
    
    var val3 = $("#"+boils+'_2').val();
    var data3= JSON.parse(val3);    
   var cats = "kwoutputdata_"+cats; 
    var val2 = $("#"+cats).val();
    var data2= JSON.parse(val2);
    
    var html = '';
    var i;
    for (i = 0; i < count; i++) {
    //   html += '<input class="styled-checkbox" id="kwpop-cbox'+data[i]+'" type="radio" value="'+data[i]+'"><label for="kwpop-cbox'+data[i]+'">'+data2[i]+'KW</label>';
      html += '<input class="styled-checkbox" id="kwpop-cbox'+data[i]+'" name = "kwoutput" type="radio" value="'+data3[i]+'/on/'+data[i]+'"><label for="kwpop-cbox'+data[i]+'">'+data2[i]+'KW</label>';
    }    

    html2 = '<button class="btnform" id = "kwpop-button" type="button" name="button" onclick = "goToBoilerr(this)">Apply</button>';

    $('#kwoutput').empty();
    $('#kwoutput').html(html);
    
    $('.kwpop-botm').empty();
    $('.kwpop-botm').html(html2);
    
    
    $(".kwpop").fadeToggle();
    $(".kwoverlay").fadeToggle();
    
}

function comparepopupshow(boils,cats,value,count){
    
    var boils  = "kwoutputboil_"+boils;
    var cats   = "kwoutputdata_"+cats;

    var val = $("#"+boils).val();
    var data= JSON.parse(val);
    
    var val3 = $("#"+boils+'_2').val();
    var data3= JSON.parse(val3);    
    
    var val2 = $("#"+cats).val();
    var data2= JSON.parse(val2);
   
    var url = $("#url").val();
    for (i = 0; i < count; i++) {
         if(data2[i] == value ){
         val = data3[i]+'/on/'+data[i];
    }
   }

     window.location.href = url +'/boiler/boiler-brands/'+val;

}

function comparepopupboilsingle(boils , cats, count){

    var val = $("#"+boils).val();
    var data= JSON.parse(val);
    
    var val3 = $("#"+boils+'_2').val();
    var data3= JSON.parse(val3);    
    
    var val2 = $("#"+cats).val();
    var data2= JSON.parse(val2);
    
    var html = '';
    var i;
    for (i = 0; i < count; i++) {
    //   html += '<input class="styled-checkbox" id="kwpop-cbox'+data[i]+'" type="radio" value="'+data[i]+'"><label for="kwpop-cbox'+data[i]+'">'+data2[i]+'KW</label>';
      html += '<input class="styled-checkbox" id="kwpop-cbox'+data[i]+'" name = "kwoutput" type="radio" value="'+data3[i]+'/on/'+data[i]+'"><label for="kwpop-cbox'+data[i]+'">'+data2[i]+'KW</label>';
    }    

    var html2 = '<button class="btnform" id = "kwpop-button" type="button" name="button" onclick = "goToBoilersingle(this)">Apply</button>';

    $('#kwoutput').empty();
    $('#kwoutput').html(html);
 
    $('.kwpop-botm').empty();
    $('.kwpop-botm').html(html2);   
    
    
    $(".kwpop").fadeToggle();
    $(".kwoverlay").fadeToggle();
    
}


function goToBoilersingle(e){
    var url = $("#url").val();

    var val = $("input[name='kwoutput']:checked").val();

    if (val == undefined)
     {
        alert("Please select any option.");
      window.location.href = url;  
     }else{
    window.location.href = val;
}}


function goToBoilerr(e){
    var url = $("#url").val();
    var val = $("input[name='kwoutput']:checked").val();

    if (val == undefined )
     {
        alert("Please select any option.");
	window.location.href = url +'/boiler/boiler-brands';  
     }else{
    window.location.href = url +'/boiler/boiler-brands/'+val;
}
}

//kwpopup custom

//kwpopup custom
// $("#kwpopup").click(function(){
//     $(".kwpopp").fadeToggle();
//     $(".kwoverlay").fadeToggle();
// });
$(".closebox").click(function(){
    $(".kwpop").hide();
    $(".kwoverlay").hide();
});
//kwpopup custom
//custom tabs
$('.cbtbox-cntnt ul li.tablinks').click(function(){
    var tab_id= $(this).attr('data-tab');
    $('.cbtbox-cntnt ul li').removeClass('active');
    $('.cbtbc-dtails').removeClass('current');
    $(this).addClass('active');
    $("#"+tab_id).addClass('current');
});
//Hide and show filter for desktop
if ($(window).width() > 1199 && $(window).width() < 1780) {
$(".hidefiltr").click(function(){
    $(".systmboilers .filters-wrap").fadeOut("fast");
    $(".sbthumbs-wrap").css("width" , "100%");
    $(".hidefiltr").fadeOut("fast");
    $(".showfiltr").fadeIn("fast");
});
$(".showfiltr").click(function(){
    $(".systmboilers .filters-wrap").fadeIn("fast");
    $(".sbthumbs-wrap").css("width" , "80%");
    $(".showfiltr").fadeOut("fast");
    $(".hidefiltr").fadeIn("fast");
});
}
if ($(window).width() > 1779) {
$(".hidefiltr").click(function(){
    $(".systmboilers .filters-wrap").fadeOut("fast");
    $(".sbthumbs-wrap").css("width" , "100%");
    $(".hidefiltr").fadeOut("fast");
    $(".showfiltr").fadeIn("fast");
});
$(".showfiltr").click(function(){
    $(".systmboilers .filters-wrap").fadeIn("fast");
    $(".sbthumbs-wrap").css("width" , "76%");
    $(".showfiltr").fadeOut("fast");
    $(".hidefiltr").fadeIn("fast");
});
}
$(".filters-wrap .filtrbox .fbox-title").click(function() {
    $(this).siblings().slideToggle();
    $(this).toggleClass("hide");
    $(this).toggleClass("angledown");
});
if ($(window).width() < 992) {
$(".boilrcompars .bccntnt-wrap .bccw-inr .bccwi-box .bccwi-blft").click(function(){
    $(this).siblings().slideToggle();
    if($(this).find("i").hasClass("fa-angle-down")){
        $(this).find("i").removeClass("fa-angle-down");
        $(this).find("i").addClass("fa-angle-up");
    }else {
        $(this).find("i").removeClass("fa-angle-up");
        $(this).find("i").addClass("fa-angle-down");
    }
});
$(".boilrcompars .features-wrap .fw-iner .fwhead").click(function(){
    $(this).siblings().slideToggle();
    if($(this).find("i").hasClass("fa-angle-down")){
        $(this).find("i").removeClass("fa-angle-down");
        $(this).find("i").addClass("fa-angle-up");
    }else {
        $(this).find("i").removeClass("fa-angle-up");
        $(this).find("i").addClass("fa-angle-down");
    }
});
}
