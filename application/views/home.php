<head>
	<title><?php echo $page_title ?></title>
	<meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS_DIR ?>style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS_DIR ?>styleMobile.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS_DIR ?>font-awesome.min.css" />
  <link href="<?php echo base_url() . CSS_DIR ?>multiple.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap.min.css' ?>">

  <!-- JS -->
  <script src="<?php echo base_url() . JS_DIR . 'jquery-3.2.1.min.js' ?>"></script>
  <script src="<?php echo base_url() . JS_DIR . 'tether.min.js' ?>"></script>
  <script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>

  <script src="<?php echo base_url() . JS_DIR ?>velocity.min.js"></script>
  <script src="<?php echo base_url() . JS_DIR ?>ScrollMagic.min.js"></script>
  <script src="<?php echo base_url() . JS_DIR ?>animation.Velocity.js"></script>
  <script src="<?php echo base_url() . JS_DIR ?>debug.addIndicators.min.js"></script>


</head>

<body>
<div id="wrapperGedeParah" style="overflow-x: hidden;">
  <nav id = "navbarWrapper" class="desktopNav" style="z-index:-1">
    <ul class="navbarSlide1" id="navbarSlide">
      <li><a href="#" id ="linkHome">Home</a></li>
      <li><a href="#" id = "linkCareer">Career</a></li>
      <li><a href="#" id = "linkAbility">Ability</a></li>
      <li><a href="#" id = "linkPort">Portfolio</a></li>
    </ul>
  </nav>

  <!--Mobile ga ada nav-->
    <!--<nav id = "navbarWrapper" class="mobileNav" style="z-index:-1">

      <ul class="navbarSlide1" id="navbarSlide">
        <li><a href="#" id ="linkBurger"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
          <li><a href="#" id ="linkHome">Home</a></li>
        <li><a href="#" id = "linkCareer">Career</a></li>
        <li><a href="#" id = "linkAbility">Ability</a></li>
        <li><a href="#" id = "linkPort">Portfolio</a></li>

      </ul>
    </nav>-->

  <!-- Modal -->
  <div class="modal fade" id="newModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">&nbsp</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          &nbsp
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="cobabgall" id="diparticleIn">
  </div>
  <header class="pagePreloadHeader" id="slidePreload">

    <div class="wrapper960">
      <div class="pageHeader-title" id="phTitle">
        <embed src="<?php echo base_url() . IMAGES_DIR ?>logoW.svg" class="phLogo">

        <center>
          <div class="pageHeader-preloader" id="phPreloader">
            <div id="preloadContent"></div>
          </div>
        </center>

      </div>
        <div class="imageBlock1" id="slide1People" >
          <img src="<?php echo base_url() . IMAGES_DIR ?>appbesar2.png" width ="100%">
        </div>
        <div class="imageBlock2" id="slide1Logo"><embed src="<?php echo base_url() . IMAGES_DIR ?>logo.svg" class="phLogo"></div>

    </div>

  </header>

  <div id="wrapperContent">
    <section class="alteringPage pageSlide" id ="slideQuotes1">

      <div class="quotesStrip"><div class="quote" id ="quotes1">
      <p>
        <?php echo $quotes[0]->value; ?>
      </p></div></div>
    </section>
    <section class="pageSlide1 pageSlide" id = "slideCareer">
      <div class="pageWrapper">
        <div class="pwTitle">
          <div class="abIcon"  id="diamond1Career">
            <object type="image/svg+xml" data="<?php echo base_url() . IMAGES_DIR ?>diamond.svg" class="diamondGrey">
            </object>
          </div>
          <span class="sectionTitle"id="title1Career">Career</span>
        </div>
          <div class="timelineBox">
            <ul class="lineList">

            <?php $timeFrame = null;
            foreach($experience as $exp): ?>

              <?php if(!$exp->nested_value): ?>
                <li class="singleList">
                  <div><?php echo $exp->value ?></div>
                </li>
              <?php else: ?>
                <li class="singleList">
                <div class="nestedList">&#9670; <span class="careerTitle"><?php echo $exp->value ?></span>
                  <ul>
                    <li class="descList">
                      <div>
                        <?php echo $exp->nested_value ?>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
            <?php endif; ?>

            <?php if($timeFrame != $exp->year): ?>
              <li class="lineStamp">
                <div><?php echo $exp->year; ?></div>
              </li>
            <?php $timeFrame = $exp->year;
            endif; ?>  
      
            <?php endforeach; ?>

            </ul>
          </div>
      </div>
    </section>


      <section class="alteringPage2 pageSlide"  id ="slideQuotes2">

        <div class="quotesStrip"><div class="quote" id ="quotes2"><p>
          <?php echo $quotes[1]->value; ?>
        </p></div></div>
      </section>
    <section class="pageSlide2 pageSlide" id ="slideAbility">
      <div class="pageWrapper">
        <div class="pwTitle">
          <div class="abIcon"id= "diamond2">
            <object type="image/svg+xml" data="<?php echo base_url() . IMAGES_DIR ?>diamondW.svg" class="diamondGrey">
            </object>
          </div>
          <span class="sectionTitle" id= "title2Ability">Ability</span>
        </div>

        <div class="abilityBox">
        <?php foreach($abilities as $ability): ?>
          <div class="abilityBar">
            <div class="abText"><?php echo $ability->language ?></div>
            <div class="abilityDiamondIcon">
              <object type="image/svg+xml" data="<?php echo base_url() . IMAGES_DIR ?>diamondW.svg" class="abIconSmall"></object>
            </div>
            <div class="abBar">
              <div class="abBarInside" style="width:<?php echo ($ability->value / 100) * 314 ?>px">
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </section>


          <section class="alteringPage3 pageSlide"  id ="slideQuotes1">

            <div class="quotesStrip"><div class="quote" id ="quotes2"><p>
              <?php echo $quotes[2]->value; ?>
            </p></div></div>
          </section>

    <section class="pageSlide3 pageSlide" id = "slidePortfo">
      <div class="pageWrapper">
        <div class="pwTitle">
          <div class="abIcon" id ="diamond3">
            <object type="image/svg+xml" data="<?php echo base_url() . IMAGES_DIR ?>diamond.svg" class="diamondGrey">
            </object>
          </div>
          <span class="sectionTitle" id = "title3">Portfolio</span>
        </div>

        <div class="portfolioWrapper">
          <center>
          
          <?php foreach($portfolio as $folio): ?>
              <button class="portfolioItem" style="background:url(<?php echo base_url() . IMAGES_DIR . "upload/portfolio/" . $folio->uuid . ".png"?>);" data-target="#newModal" data-toggle="modal" id="<?php echo base_url() . IMAGES_DIR . 'upload/portfolio/' . $folio->link; ?>">
                <h5><?php echo $folio->name ?></h5>
              </button>
          <?php endforeach; ?>
          </center>
        </div>
      </div>
    </section>


    <section class="pageSlideFooter ">
      <div class="pageWrapper">
        <div class="img">
          <object type="image/svg+xml" data="<?php echo base_url() . IMAGES_DIR ?>diamondW.svg" class="abIconBig"></object>
        </div>
        <div class="listContact">
          <h2>Contact Me</h2>
          <ul>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>
albertputrapurnama@gmail.com</li>
            <li><i class="fa fa-mobile" aria-hidden="true"></i>
 +1 925 238 6500
            <li><i class="fa fa-instagram" aria-hidden="true"></i>
 albertputrapurnama</li>
            <li><i class="fa fa-linkedin" aria-hidden="true"></i>
 <a href="http://Linkedin.com/in/albertputrapurnama">albertputrapurnama</a></li>
          </ul>
        </div>
      </div>
    </section>

  </div>
  </div>
  <script>
    $(".portfolioItem").click(function()
    {
      var link = $(this).attr("id");
      $(".modal-body").html('<img src="' + link + '" width="100%">').fadeIn();
    });
  </script>
  <script src="<?php echo base_url() . JS_DIR ?>multiple.js"></script>
  <script src="<?php echo base_url() . JS_DIR ?>tilt.jquery.js"></script>
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->

  <script src="<?php echo base_url() . JS_DIR ?>particle.js"></script>
  <script src="<?php echo base_url() . JS_DIR ?>general.js"></script>
  <script src="<?php echo base_url() . JS_DIR ?>general2.js"></script>
</body>