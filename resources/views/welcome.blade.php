@extends('layouts.welcome')
@section('content')   
    <div id="home">
    <!-- header -->
    <header class="header-style fixed-top">
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center">
                <!-- logo -->
                <h1 class="logo text-center">
                    <a href="/">SAS<i class="fa fa-pagelines" aria-hidden="true"></i>
                    </a>
                </h1>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls">
                    <nav >
                        <label for="drop" class="toggle toogle-2">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu" >
                            <li class="active ml-0"><a href="/">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#team">Our Team</a></li>
                            <li>
                                <!-- First Tier Drop Down -->
                                <label for="drop-2" class="toggle toggle-drop">Agri Info <span class="fa fa-angle-down" aria-hidden="true"></span>
                                </label>
                                <a href="#">Agri Info<span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul class="list-unstyled">
                                    <li><a href="#why" class="drop-text">Why Choose Us</a></li>
                                    <li class="my-2"><a href="#partners" class="drop-text">Our Partners</a></li>
                                    <li><a href="#testi" class="drop-text">Testimonials</a></li>
                                </ul>
                            </li>
                            <li><a href="#blog">Organization</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li class="mr-0"><a href="#contact">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>
    <!-- //header -->

    <!-- banner -->
    <div class="banner_w3lspvt">
        <div class="csslider infinity" id="slider1">
            <input type="radio" name="slides" checked="checked" id="slides_1" />
            <input type="radio" name="slides" id="slides_2" />
            <input type="radio" name="slides" id="slides_3" />
            <input type="radio" name="slides" id="slides_4" />
            <ul>
                <li>
                    <div class="banner-top">
                        <div class="container">
                            
                            <div class="w3layouts-banner-info text-center">
                                <h3 class="text-wh">Welcome to SAS</h3>
                                <p class="text-li mx-auto mt-2">We are providing the latest information about the cultivation method and guidelines to increase the  production by using the latest technology</p>
                                <!-- <a href="#about" class="button-style scroll mt-sm-5 mt-4">Read More</a> -->
                                @guest
                                    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner-top1">
                        <div class="container">
                            <div class="w3layouts-banner-info text-center">
                                <h3 class="text-wh">Crops For Healthy</h3>
                                <p class="text-li mx-auto mt-2">We are providing the crops production methods to control diseases</p>
                                <a href="#about" class="button-style scroll mt-sm-5 mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner-top2">
                        <div class="container">
                            <div class="w3layouts-banner-info text-center">
                                <h3 class="text-wh">Welcome to SAS</h3>
                                <p class="text-li mx-auto mt-2">we are providing the latest information about the cultivation method and guidelines to increase the  production by using the latest technology</p>
                                <a href="#about" class="button-style scroll mt-sm-5 mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner-top3">
                        <div class="container">
                            <div class="w3layouts-banner-info text-center">
                                <h3 class="text-wh">crops For Healthy</h3>
                                <p class="text-li mx-auto mt-2">We are providing the crops production methods to control diseases</p>
                                <a href="#about" class="button-style scroll mt-sm-5 mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="arrows">
                <label for="slides_1"></label>
                <label for="slides_2"></label>
                <label for="slides_3"></label>
                <label for="slides_4"></label>
            </div>
        </div>
        <div class="icon-w3">
            <a href="#about" class="scroll">
                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- //banner -->
</div>
<!-- //main -->

<!-- about -->
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 about-left-w3pvt offset-lg-1">
                <div class="main-img">
                    <img src="static/images/ab.jpg" alt="" class="img-fluid pos-aboimg">
                    <img src="static/images/ab2.jpg" alt="" class="img-fluid pos-aboimg2">
                </div>
            </div>
            <div class="col-lg-6 about-right offset-lg-1">
                <h4 class="sub-tittle-w3layouts let">About Us</h4>
                <h3 class="tittle-w3layouts text-uppercase pr-lg-5 mt-2">SAS is the Samrt agrculture System </h3>
                <p class="mt-4 mb-5">we are provide information about crops</p>
                <ul class="author list-unstyled d-flex">
                    <li><img class="img-fluid rounded-circle" src="static/images/sherjeel.jpg" alt=""></li>
                    <li class="ml-4 mt-4"><span>Syed Sherjeel gilani </span>SAS</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- //about -->

<!-- services -->
<div class="serives-agile py-5" id="services">
    <div class="container py-xl-5 py-lg-3">
        <div class="row support-bottom text-center">
            <div class="col-md-4 services-w3ls-grid">
                <i class="fa fa-leaf" aria-hidden="true"></i>
                <h4 class="text-wh text-uppercase mt-md-5 mt-4 mb-3">PlatForm</h4>
                <p>We are providing a unique platform for the Government and Private organizations to advertise their goods to the farmers without any hesitation. Farmers will review their goods and rate their products</p>
            </div>
            <div class="col-md-4 services-w3ls-grid my-md-0 my-4">
                <i class="fa fa-tree" aria-hidden="true"></i>
                <h4 class="text-wh text-uppercase mt-md-5 mt-4 mb-3">Iot based irrigation</h4>
                <p>We are providing a land irrigation monitoring system by using the sensors. It will help the farmers to control and check their activities to get maximum profit with minimum resources.</p>
            </div>
            <div class="col-md-4 services-w3ls-grid">
                <i class="fa fa-pagelines" aria-hidden="true"></i>
                <h4 class="text-wh text-uppercase mt-md-5 mt-4 mb-3">Diseases Detection</h4>
                <p>We facilitate the farmer by providing the disease detection module. In which he can able to detect the diseases of the crops by simply clicking the image of the crop by using its smartphone.</p>
            </div>
        </div>
    </div>
</div>
<!-- //services -->

<!-- organization -->
<section class="w3ls-bnrbtm py-5" id="blog">
    <div class="py-xl-5 py-lg-3">
        <div class="row no-gutters">
            <div class="col-xl-5 who-left-w3pvt offset-xl-1 pt-xl-3 pr-xl-0 pr-3">
                <h3 class="w3ls-title text-da text-center font-weight-bold mb-5 pb-lg4">Organization <span class="font-weight-light"></span></h3>
                <ul class="timeline">
                    <li>
                            <div class="containerorg">
                            <img src="static/images/angro.jpg" alt="Avatar" style="width:90px">
                            
                            <p>
Fatima Fertilizer Company Limited produces Sarsabz Calcium Ammonium Nitrate (CAN), Sarsabz Nitro Phosphate (NP), NPK and Sarsabz Urea.
.</p>
                                </div>

        </li>
                    <li>
                                    <div class="containerorg">
                                    <img src="static/images/punjab.png" alt="Avatar" style="width:90px">
                                    <p><span ></span> Agriculture Department Punjab</p>
                                        <p>Oilseed Crops Promotion · Crops Productivity Enhancement ·</p>
                                        </div> 
        
                    </li>
                    <li>
                        <div class="containerorg">
                                <img src="static/images/sirsabz.jpg" alt="Avatar" style="width:90px">
                                
                                <p>Engro Corporation, previously known as Esso Fertilizers, is a Pakistani multinational conglomerate company with subsidiaries involved in production of fertilizers</p>
                            </div> 
        
                    </li>
                </ul>
            </div>
            <div class="col-xl-6 mt-xl-0 mt-md-5 mt-4 text-center" >
                
                                <video  controls autoplay muted="vidio">
                                
                                <source src="static/vidio/agri.mp4" type="video/mp4">
                            
                            </video>

        
            </div>
        </div>
    </div>
</section>
<!-- //organization -->

<!-- why -->
<section class="blog_w3ls pb-5" id="why">
    <div class="container pb-xl-5 pb-lg-3">
        <h3 class="w3ls-title text-da text-center font-weight-bold mb-5 pb-lg-4">Why <span class="font-weight-light">Choose
                Us</span></h3>
        <div class="row">
            <!-- blog grid -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 med-blog">
                    <div class="card-header p-0">
                        <a href="single.html">
                            <img class="card-img-bottom" src="static/images/wh1.jpg" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body border border-top-0">
                        <div class="mb-3">
                            <h5 class="blog-title card-title m-0">Quality Products
                            </h5>
                            <div class="blog_w3icon">
                                <span>
                                    Magna Kictum - loremipsum</span>
                            </div>
                        </div>
                        <p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>
                    </div>
                </div>
            </div>
            <!-- //blog grid -->
            <!-- blog grid -->
            <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                <div class="card border-0 med-blog">
                    <div class="card-header p-0">
                        <a href="single.html">
                            <img class="card-img-bottom" src="static/images/wh2.jpg" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body border border-top-0">
                        <div class="mb-3">
                            <h5 class="blog-title card-title m-0">Work Smart
                            </h5>
                            <div class="blog_w3icon">
                                <span>
                                    Magna Kictum - loremipsum</span>
                            </div>
                        </div>
                        <p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>
                    </div>
                </div>
            </div>
            <!-- //blog grid -->
            <!-- blog grid -->
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                <div class="card border-0 med-blog">
                    <div class="card-header p-0">
                        <a href="single.html">
                            <img class="card-img-bottom" src="static/images/wh3.jpg" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body border border-top-0">
                        <div class="mb-3">
                            <h5 class="blog-title card-title m-0">Excellent Services
                            </h5>
                            <div class="blog_w3icon">
                                <span>
                                    Magna Kictum - loremipsum</span>
                            </div>
                        </div>
                        <p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>
                    </div>
                </div>
            </div>
            <!-- //blog grid -->
        </div>
    </div>
</section>
<!-- //why -->

<!-- stats-->
<div class="stats-info py-5">
    <div class="container py-xl-5 py-lg-3">
        <h4 class="stat-text-wthree text-wh mx-auto text-center font-italic mb-sm-5 mb-4">We give you latest crops culitivation method  and Ideas on
            what style suits your Agriculture </h4>
        <div class="row py-5">
            <div class="col-lg-3 col-sm-6 stats-grid-w3-agile">
                <div class="row">
                    <div class="col-4 icon-right-w3ls text-sm-left text-center">
                        <span class="fa fa-smile-o" data-blast="bgColor"></span>
                    </div>
                    <div class="col-8">
                        <p class="counter font-weight-bold text-wh">10</p>
                        <p class="text-li mt-2" data-blast="color">Goverment vendors</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 stats-grid-w3-agile mt-sm-0 mt-4">
                <div class="row">
                    <div class="col-4 icon-right-w3ls text-sm-left text-center">
                        <span class="fa fa-shield" data-blast="bgColor"></span>
                    </div>
                    <div class="col-8">
                        <p class="counter font-weight-bold text-wh">100</p>
                        <p class="text-li mt-2" data-blast="color">private vendor</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 stats-grid-w3-agile mt-lg-0 mt-4">
                <div class="row">
                    <div class="col-4 icon-right-w3ls text-sm-left text-center">
                        <span class="fa fa-leaf" data-blast="bgColor"></span>
                    </div>
                    <div class="col-8">
                        <p class="counter font-weight-bold text-wh">12</p>
                        <p class="text-li mt-2" data-blast="color">latest seed </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 stats-grid-w3-agile mt-lg-0 mt-4">
                <div class="row">
                    <div class="col-4 icon-right-w3ls text-sm-left text-center">
                        <span class="fa fa-thumbs-o-up" data-blast="bgColor"></span>
                    </div>
                    <div class="col-8">
                        <p class="counter font-weight-bold text-wh">30</p>
                        <p class="text-li mt-2" data-blast="color">Latest product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //stats -->

<!-- team -->
<div class="team py-5" id="team">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="w3ls-title text-da text-center font-weight-bold mb-5 pb-xl-4">Our <span class="font-weight-light">Team</span></h3>
        <div class="row team-bottom pt-4 text-center">
            <div class="col-lg-3 col-sm-6 team-grid">
                <img src="static/images/admin.jpg" class="img-fluid" alt="">
                <div class="caption">
                    <div class="team-text">
                        <h4>Mujahid malik</h4>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook f1" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter f2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-google-plus f3" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 team-grid mt-sm-0 mt-5">
                <img src="static/images/asif.jpg" class="img-fluid" alt="">
                <div class="caption">
                    <div class="team-text">
                        <h4>Asif Hussain</h4>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook f1" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter f2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-google-plus f3" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 team-grid mt-lg-0 mt-5">
                <img src="static/images/hassan.jpeg" class="img-fluid" alt="">
                <div class="caption">
                    <div class="team-text">
                        <h4>Hassan shazad</h4>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook f1" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter f2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-google-plus f3" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 team-grid  mt-lg-0 mt-5">
                <img src="static/images/hamid.jpg" class="img-fluid" alt="">
                <div class="caption">
                    <div class="team-text">
                        <h4>Hamid Zaib</h4>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook f1" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter f2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-google-plus f3" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //team -->

<!-- testimonials -->
<section class="clients py-5" id="testi">
    <div class="container py-xl-5 py-lg-3">
        <div class="row py-sm-5">
            <div class="col-lg-6 col-sm-8 col-10">
                <div class="feedback-top">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit amet consectetur adipisicing
                        elit
                        sedc dnmo eiusmod. sed do eiusmod tempor
                        incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                    <h4 class="mt-4 text-da font-weight-bold mb-4">Mary Jane</h4>
                </div>
            </div>
            <div class="col-lg-6 col-sm-4 col-2"></div>
        </div>
    </div>
</section>
<!-- //testimonials -->

<!-- gallery -->
<section class="portfolio py-5" id="gallery">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="w3ls-title text-center font-weight-bold mb-5">Our <span class="font-weight-light">Crops</span></h3>
        <div class="row pt-4">
            <div class="col-md-3 gal-grid-wthree">
                <div class="gallery-demo">
                    <a href="#gal1">
                        <img src="static/images/Chili crops.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            <div class="col-md-3 gal-grid-wthree my-md-0 my-4">
                <div class="gallery-demo">
                    <a href="#gal2">
                        <img src="static/images/chili.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            <div class="col-md-3 gal-grid-wthree my-md-0 my-4">
                <div class="gallery-demo">
                    <a href="#gal2">
                        <img src="static/images/wheat.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            
            
            <div class="col-md-3 gal-grid-wthree mt-md-0 mt-4">
                <div class="gallery-demo">
                    <a href="#gal4">
                        <img src="static/images/Rice.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 gal-grid-wthree">
                <div class="gallery-demo">
                    <a href="#gal5">
                        <img src="static/images/Crops.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            <div class="col-md-3 gal-grid-wthree my-md-0 my-4">
                <div class="gallery-demo">
                    <a href="#gal6">
                        <img src="static/images/flower.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            <div class="col-md-3 gal-grid-wthree">
                <div class="gallery-demo">
                    <a href="#gal7">
                        <img src="static/images/Tomato.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            
            <div class="col-md-3 gal-grid-wthree">
                <div class="gallery-demo">
                    <a href="#gal7">
                        <img src="static/images/Corn.jpg" alt=" " class="img-fluid" />
                    </a>
                </div>
            </div>
            

            
        </div>
    </div>
</section>
<!-- gallery model-->



<!-- contact -->
<section class="contact py-5" id="contact">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="w3ls-title text-wh text-center font-weight-bold mb-5">Contact <span class="font-weight-light">Us</span></h3>
        <div class="row contact-form">
            <div class="offset-lg-2"></div>
            <div class="col-lg-8 wthree-form-left">
                <!-- contact form grid -->
                <fieldset class="contact-top1" data-blast="borderColor">
                    <legend class="text-wh let text-capitalize">send us a note</legend>
                    <form action="{{ action('ContactController@store') }}" method="post" class="forms-sample">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  
                            <div class="form-group">
                            <label for="contactusername">Name</label>
                            <input type="text" class="form-control" name="name" id="contactusername" required placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="contactemail">Email</label>
                            <input type="email" class="form-control" name="email" id="contactemail" required placeholder="Enter your Email">
                        </div>
                        <div class="form-group">
                            <label for="contactcomment">Your Message</label>
                            <textarea class="form-control" rows="5" name="message" id="contactcomment" required placeholder="your message"></textarea>
                        </div>

                            <button type="submit" class="btn btn-block" data-blast="bgColor">Send</button>
                            
                        </form>
                   
                </fieldset>
                <!--  //contact form grid ends here -->
            </div>
            <div class="offset-lg-2"></div>
        </div>
        <!-- contact address -->
        <div class="row address bg-li">
            <div class="col-lg-4 address-grid">
                <div class="row address-info">
                    <div class="col-md-3 col-4 address-left text-lg-center text-sm-right text-center">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="col-md-9 col-8 address-right">
                        <p>
                            <a href="mailto:example@email.com"> mail 1@example.com</a>
                        </p>
                        <p>
                            <a href="mailto:example@email.com"> mail 2@example.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 address-grid my-lg-0 my-4">
                <div class="row address-info">
                    <div class="col-md-3 col-4 address-left text-lg-center text-sm-right text-center">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="col-md-9 col-8 address-right">
                        <p>+1 234 567 8901</p>
                        <p>+1 567 567 9876</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 address-grid">
                <div class="row address-info">
                    <div class="col-md-3 col-4 address-left text-lg-center text-sm-right text-center">
                        <i class="fa fa-map"></i>
                    </div>
                    <div class="col-md-9 col-8 address-right">
                        <p> riphah university, hollies</p>
                        <p> i 14, islamabad</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- //contact address -->
    </div>
</section>
<!-- //contact -->

<!-- partners -->
<section class="partners py-5" id="partners">
    <div class="container py-xl-5 py-4">
        <h3 class="w3ls-title text-da text-center font-weight-bold mb-5">Our <span class="font-weight-light">Partners</span></h3>
        <div class="row grid-part text-center pt-4">
            <div class="col-md-2 col-4">
                <div class="parts-w3pvt bg-wh">
                    <a href="#"><i class="fa fa-angellist"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-4">
                <div class="parts-w3pvt bg-wh">
                    <a href="#"><i class="fa fa-opencart"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-4">
                <div class="parts-w3pvt bg-wh">
                    <a href="#"><i class="fa fa-lastfm"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-4 mt-md-0 mt-3">
                <div class="parts-w3pvt bg-wh">
                    <a href="#"><i class="fa fa-openid"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-4 mt-md-0 mt-3">
                <div class="parts-w3pvt bg-wh">
                    <a href="#"><i class="fa fa-skyatlas"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-4 mt-md-0 mt-3">
                <div class="parts-w3pvt bg-wh">
                    <a href="#"><i class="fa fa-ravelry"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //partners -->

<!-- footer -->
<footer class="text-center py-4">
    <div class="container py-xl-5 py-4">
        <h3 class="text-da let mb-3">We Provide Best Services</h3>
        <p class="footer-para mx-auto">Natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
            doloremque laudantium, totam rem aperiam</p>
        <!-- logo -->
        <h2 class="logo2 text-center mt-3">
            <a href="/">
                SAS<i class="fa fa-pagelines" aria-hidden="true"></i>
            </a>
        </h2>
        <!-- //logo -->
        <!-- address -->
        <div class="contact-left-footer mt-4">
            <h6 class="text-da let mb-3">Sed do eiusmod tempor incididunt ut labore et dolore</h6>
            <ul>
                <li>
                    <p>
                        <i class="fa fa-map-marker mr-2"></i>345 Setwant natrer, USA
                    </p>
                </li>
                <li class="mx-4">
                    <p>
                        <i class="fa fa-phone mr-2"></i>+1(401) 1234 567.
                    </p>
                </li>
                <li>
                    <p class="text-wh">
                        <i class="fa fa-envelope-open mr-2"></i>
                        <a href="mailto:info@example.com">Mujahidmalikarain@gmail.com</a>
                    </p>
                </li>
            </ul>
        </div>
        <!-- //address -->
        <!-- social icons -->
        <div class="footercopy-social mt-4">
            <ul>
                <li>
                    <a href="#">
                        <span class="fa fa-facebook-f"></span>
                    </a>
                </li>
                <li class="mx-2">
                    <a href="#">
                        <span class="fa fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="fa fa-rss"></span>
                    </a>
                </li>
                <li class="ml-2">
                    <a href="#">
                        <span class="fa fa-vk"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- //social icons -->
        <!-- copyright -->
        <div class="w3l-copy text-center mt-5">
            <p class="text-da">© 2019 SAS. All rights reserved | Design by
                SAS TEAM
                
            </p>
        </div>
        <!-- //copyright -->
    </div>
</footer>
<!-- //footer -->

<!--//pop up form -->


        <div class="modal fade login" id="loginModal">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login with</h4>
                </div>
                <div class="modal-body">
                    <div class="box">
                            <div class="content">
                            <div class="social">
                                <a class="circle github" href="#">
                                    <i class="fa fa-github fa-fw"></i>
                                </a>
                                <a id="google_login" class="circle google" href="#">
                                    <i class="fa fa-google-plus fa-fw"></i>
                                </a>
                                <a id="facebook_login" class="circle facebook" href="#">
                                    <i class="fa fa-facebook fa-fw"></i>
                                </a>
                            </div>
                            <div class="division">
                                <div class="line l"></div>
                                    <span>or</span>
                                <div class="line r"></div>
                            </div>
                            <div class="error"></div>
                            <div class="form loginBox">
                                <form method="" action="" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="signin" type="button" value="Login" onclick="loginAjax()">
                                </form>
                            </div>
                            </div>
                    </div>
                    <div class="box">
                        <div class="content registerBox" style="display:none;">
                            <div class="form">
                            <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                            <input type="text" name="company" id="name" class="form-control" placeholder="Company Name" name="name" onblur="companyname()">	
                            <input id="email" type="email"  class="form-control"  placeholder="Email" name="email" onblur="checkUserEmail()">
                            
                            <input id="password" type="password" class="form-control" placeholder="Password" onblur="checkUserPassword()">
                            <input id="phone" type="phone"  class="form-control" placeholder="Password" onblur="checkUserPhone()">
                            <select id="organization" name="">
<option value="volvo">Goverment</option>

<option value="audi">Private</option>
</select>
            
                            <input id="signup" type="button" value="create account" name="commit" onclick="signUp()">
                        </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Looking to
                                <a href="javascript: showRegisterForm();">create an account</a>
                        ?</span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                            <span>Already have an account?</span>
                            <a href="javascript: showLoginForm();">Login</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
@endsection