var scrollt=0;
$( window).scroll(function() {
  scrollt=$(window).scrollTop();
  if(scrollt < $("#slideQuotes1").offset().top-100){
    $("#navbarWrapper").removeClass("allWhite");

  }else if(scrollt > $("#slideQuotes1").offset().top-100 && scrollt < $("#slideCareer").offset().top-100){
    $("#navbarWrapper").addClass("allWhite");

  } else if(scrollt > $("#slideCareer").offset().top-100 && scrollt < $("#slideQuotes2").offset().top-100){
    $("#navbarWrapper").removeClass("allWhite");

  } else if(scrollt > $("#slideQuotes2").offset().top-100 && scrollt < $("#slidePortfo").offset().top-100){
    $("#navbarWrapper").addClass("allWhite");

  } else if(scrollt > $("#slidePortfo").offset().top-100){
    $("#navbarWrapper").removeClass("allWhite");

  }

});
var speas = {
width: "linear",
height: "easeOutBounce"
};

$("#linkHome").click(function() {
    $('html, body').animate({
        scrollTop: 0,
        specialEasing:speas
    }, 800);
    return false;
});
$("#linkCareer").click(function() {
    $('html, body').animate({
        scrollTop: $("#slideCareer").offset().top,
        specialEasing:speas
  }, 800);
    return false;
});
$("#linkAbility").click(function() {
    $('html, body').animate({
        scrollTop: $("#slideAbility").offset().top,
        specialEasing:speas
  }, 800);
    return false;
});
$("#linkPort").click(function() {
    $('html, body').animate({
        scrollTop: $("#slidePortfo").offset().top,
        specialEasing:speas
  }, 800);
    return false;
});

$("#linkArticle").click(function() {
    $('html, body').animate({
        scrollTop: $("#slideArtikel").offset().top,
        specialEasing:speas
    }, 800);
    return false;
});
