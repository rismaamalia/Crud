<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png')}}" type="image/png">
    <title>Eden Megazine</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/frontend/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/frontend/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/frontend/vendors/popup/magnific-popup.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset ('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/frontend/css/responsive.css')}}">
</head>
<body>

    <!--================ Start header Top Area =================-->
    <section class="header-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-6 col-lg-4">
                    <div class="float-left">
                        <ul class="header_social">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-skype"></i></a></li>
                            <li><a href="#"><i class="ti-vimeo"></i></a></li>
                        </ul>   
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6 col-sm-6 logo-wrapper">
                    <a href="index.html" class="logo">
                        <img src="{{ asset ('assets/frontend/img/logo.png')}}" alt="')}}">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 search-trigger">
                    <div class="right-button">
                        <ul>
                            <li><a id="search" href="javascript:void(0)"><i class="fas fa-search"></i></a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Subscribe</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </section>
    <!--================ End header top Area =================-->

    <!-- Start header Menu Area -->
    <header id="header" class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="/">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/category">Categories</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/archive">Archive</a></li>    
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/blog.">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/single-blog">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/blog">Latest news</a></li>
                            <li class="nav-item"><a class="nav-link" href="/contact">Contact us</a></li>         
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End header MEnu Area -->

@yield("content")

    <!-- ================ start footer Area ================= -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>About Us</h4>
                    <p>Heaven fruitful doesn't over lesser days appear creeping seasons so behold bearing days open</p>
                    <div class="footer-logo">
                        <img src="{{ asset ('assets/frontend/img/logo.png')}}" alt="')}}">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Contact Info</h4>
                    <div class="footer-address">
                        <p>Address :Your address goes
                        here, your demo address.</p>
                        <span>Phone : +8880 44338899</span>
                        <span>Email : info@colorlib.com</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Important Link</h4>
                    <ul>
                        <li><a href="#">WHMCS-bridge</a></li>
                        <li><a href="#">Search Domain</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Our Shop</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping seasons deve behold bearing days open</p>

                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                        method="get">
                        <div class="input-group">
                            <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                            <div class="input-group-append">
                                <button class="btn click-btn" type="submit">
                                    <i class="fab fa-telegram-plane"></i>
                                </button>
                            </div>
                        </div>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                        <div class="info"></div>
                    </form>
                </div>

            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
            <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter-alt"></i></a>
                <a href="#"><i class="ti-dribbble"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- ================ End footer Area ================= -->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset ('assets/frontend/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/popper.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/stellar.js')}}"></script>
<script src="{{ asset ('assets/frontend/vendors/popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/waypoints.min.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/mail-script.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/contact.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/jquery.form.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/jquery.validate.min.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/mail-script.js')}}"></script>
<script src="{{ asset ('assets/frontend/js/theme.js')}}"></script>
</body>
</html>