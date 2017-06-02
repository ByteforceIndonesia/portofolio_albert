/*---------------------------------
-------- Psalms 91 ----------------
-------- Trust in God -------------
-------- ByteForce ----------------
---------------------------------*/


  var controller = new ScrollMagic.Controller();
    // load dari awal, sampe akhir.

  var images = document.images;
  var totalLoading = 0;
  var loaded = 0;
  var totalImg = images.length;


  var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;


    $(".lineList").velocity({scaleY : ["0"] },{duration: 0});
    $("#title1Career").velocity({scaleX : ["0"], scaleX : ["0"] },{duration: 0});
    $("#diamond1Career").velocity({scaleX : ["0"], scaleY :["0"] },{duration: 0});
    $("#diamond1Career").velocity({scaleX : ["0"], scaleY :["0"] },{duration: 0});

    $("#title2Ability").velocity({scaleX : ["0"], scaleY :["0"] },{duration: 0});

    $("#diamond2").velocity({scaleX : ["0"], scaleY :["0"] },{duration: 0});
    $("#title3").velocity({scaleX : ["0"], scaleY :["0"] },{duration: 0});
    $("#diamond3").velocity({scaleX : ["0"], scaleY :["0"] },{duration: 0});
    $("#slide1People").velocity({translatey : ["0%"], opacity : ["0"]},{duration: 0});
    $("#navbarWrapper").velocity({translateY : "200%"},{duration: 0});

    $(".portfolioItem").velocity({opacity : "0" },{duration: 0});

    $(".abBar").velocity({opacity : "0" },{duration: 0});
    $(".abilityDiamondIcon").velocity({opacity : "0" },{duration: 0});
    $(".abText").velocity({opacity : "0" },{duration: 0});
    $(".abBarInside").velocity({scaleX : "0" },{duration: 0});
    $("#wrapperContent").css("overflow", "hidden");
    $("body").css("overflow", "hidden");



    for(var z = 0; z < images.length; z++)
    {
        var img = new Image ();
        img.onload = imgLoaded();
        img.onerror = imgLoaded();
        img.src = images[z].src;
    }

    function imgLoaded ()
    {
        loaded += 1;
        totalLoading = loaded / totalImg * 6;
    }

    // loading bar and preload
    $("#phTitle").velocity({translateY : ["400px",[.73,0,.39,.99]], fontSize:"78px",  opacity :["1",[.73,0,.39,.99]] },{duration: 800, easing: [0,.38,.48,1]});
    $("#phPreloader").velocity({ scaleX: [totalLoading,[.73,0,.39,.99]], opacity :["1",[.73,0,.39,.99]] },{duration: 2000, delay : 400});
    
    $("#preloadContent").velocity({scaleX:[1,0] },{duration: 2400, delay : 800, easing : [.73,0,.39,.99]});


  //$("#phTitle").velocity({translateZ : ["-500px",[.73,0,.39,.99]],translateX : ["500px",[.73,0,.39,.99]], scale:"0.3" , rotateY:"0.3" },{duration: 800, easing: [0,.38,.48,1]});


    window.onload = function()
    {
       // // After finished loading
      $("#phTitle").velocity({translateY : ["-400px",[.73,0,.39,.99]]},{duration: 600, delay : 0, easing : [.73,0,.39,.99]});

      $("#slide1Logo").velocity({translateX : [["-200%", "0%"],[.73,0,.39,.99]],translateZ: [["-200px"],[.73,0,.39,.99]], rotateY:["-35deg", "-120deg"]},{duration: 800, delay : 600, easing : [.73,0,.39,.99]});
      $("#slide1People").velocity({translatey : [["100%", "0%"],[.73,0,.39,.99]], opacity : ["1","0"]},{duration: 200, delay : 600, easing : [.73,0,.39,.99]});

      // Ganti preload bg color
      $("#slidePreload").velocity({backgroundColorAlpha : ["0",[.04,.39,.41,.97]]},{duration: 600, delay : 400, easing : [.73,0,.39,.99]});

      $("#navbarWrapper").velocity({translateY : [["0%", "-100%"],[.73,0,.39,.99]]},{duration: 600, delay : 400, easing : [.73,0,.39,.99]});
      $("#wrapperContent").css("overflow-y", "scroll");
      $("body").css("overflow-y", "scroll");
      // KENTANG AYEN WKWK
      $("#navbarWrapper").css("z-index", "100");
    }

    $(document).ready(function(){

        var scene = new ScrollMagic.Scene({triggerElement: "#slideCareer"});
        scene.setVelocity("#diamond1Career",
            {scaleX: ["1","0"],scaleY: ["1", "0"]},
            {duration: 400, easing:[.73,0,.39,.99]}


            )
        .addTo(controller);

        if(iOS)
        {
          $(".multiple-mobile").css("background-attachment", "scroll !important");
        }

        var scene2 = new ScrollMagic.Scene({triggerElement: "#slideCareer"})
            scene2.setVelocity("#title1Career",
            {scaleX: ["1","0"],scaleY: ["1", "0"]},
            {duration: 400, easing:[.73,0,.39,.99]})
        .addTo(controller);


    //     var scene3 = new ScrollMagic.Scene({triggerElement: "#slideQuotes1"});
    //     scene3.setClassToggle("#navbarWrapper", "stickNav")
				// .addTo(controller);

        var sceneLine = new ScrollMagic.Scene({triggerElement: "#slideCareer"})
            sceneLine.setVelocity(".lineList",
            {scaleY: ["1", "0"]},
            {duration: 400, delay : 400, easing:[.73,0,.39,.99]})
        .addTo(controller);


        // scene kedua
        var sceneb = new ScrollMagic.Scene({triggerElement: "#slideAbility"})
        sceneb.setVelocity("#diamond2",
            {scaleX: ["1","0"],scaleY: ["1", "0"]},
            {duration: 400, easing:[.73,0,.39,.99]}


            )
        .addTo(controller);

        var sceneb2 = new ScrollMagic.Scene({triggerElement: "#slideAbility"})
            sceneb2.setVelocity("#title2Ability",
            {scaleX: ["1","0"],scaleY: ["1", "0"]},
            {duration: 400, easing:[.73,0,.39,.99]})
        .addTo(controller);



        var tralalalalala = [];
        indexX = 1;
        $(".abilityBar").each(function(){


            var sceneLineb = new ScrollMagic.Scene({triggerElement: "#slideAbility"})
            sceneLineb.setVelocity(".abilityBar:nth-child("+indexX+") .abilityDiamondIcon",
            {opacity: ["1", "0"]},
            {duration: 600, delay : 0+indexX*50, easing:"easeIn"}).addTo(controller);


            var sceneLinebBar = new ScrollMagic.Scene({triggerElement: "#slideAbility"})
            sceneLinebBar.setVelocity(".abilityBar:nth-child("+indexX+") .abBar",
            {opacity: ["1", "0"]},
            {duration: 600, delay : 50+indexX*50, easing:"easeIn"}).addTo(controller);

            var sceneText = new ScrollMagic.Scene({triggerElement: "#slideAbility"})
            sceneText.setVelocity(".abilityBar:nth-child("+indexX+") .abText",
            {opacity: ["1", "0"]},
            {duration: 600, delay : 50+indexX*50, easing:"easeIn"}).addTo(controller);

            var sceneAbBar = new ScrollMagic.Scene({triggerElement: "#slideAbility"})
            sceneAbBar.setVelocity(".abilityBar:nth-child("+indexX+") .abBarInside",
            {scaleX: ["1", "0"]},
            {duration: 600, delay : 50+indexX*50+indexX*50, easing:"easeInOut"}).addTo(controller);


            indexX++;
        });
        indexX= 1;




        // scene ketiga
        var scenec = new ScrollMagic.Scene({triggerElement: "#slidePortfo"})
        scenec.setVelocity("#diamond3",
            {scaleX: ["1","0"],scaleY: ["1", "0"]},
            {duration: 400, easing:[.73,0,.39,.99]}


            )
        .addTo(controller);

        var scenec2 = new ScrollMagic.Scene({triggerElement: "#slidePortfo"})
            scenec2.setVelocity("#title3",
            {scaleX: ["1","0"],scaleY: ["1", "0"]},
            {duration: 400, easing:[.73,0,.39,.99]})
        .addTo(controller);



        $(".portfolioItem").each(function(){


            var scenePort = new ScrollMagic.Scene({triggerElement: "#slidePortfo"})
            scenePort.setVelocity(".portfolioItem:nth-child("+indexX+") ",
            {opacity: ["1", "0"]},
            {duration: 600, delay : 0+indexX*50, easing:"easeIn"}).addTo(controller);



            indexX++;
        });
        indexX= 1;

    });


// buat list item

function isElementInViewport(el) {
  var rect = el.getBoundingClientRect();
  var mq = window.matchMedia( "(max-width: 700px)" );
  if (mq.matches) {
    return (rect.top >= 0 &&
    rect.bottom <= window.innerHeight );

  } else {
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)

    );
  }

}

var mq = window.matchMedia( "(max-width: 700px)" );
if (mq.matches) {
  $(".desktopNav").css("display","none");

} else {
  $(".mobileNav").css("display","none");
}

var items = document.querySelectorAll(".lineList li div");
function callbackFunc() {
  for (var i = 0; i < items.length; i++) {
    if (isElementInViewport(items[i])) {
      items[i].classList.add("in-view");
    } else{

      items[i].classList.remove("in-view");
    }

  }
}

window.addEventListener("load", callbackFunc);
window.addEventListener("scroll", callbackFunc);

var bg = $(".mobileNav");

function resizeBackground() {
    bg.height($(window).height());
}

$(window).resize(resizeBackground);
resizeBackground();

// multiple js
var multiple = new Multiple({
  selector: '.quotesStrip',
  background: 'linear-gradient(top,#273463, #8B4256)',
  opacity : 0.8
});
