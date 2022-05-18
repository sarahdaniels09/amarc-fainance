<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en" @if(session()->get('rtl') == 1) dir="rtl" @endif >
<head>
    
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
    <meta name="viewport"/>

    @include('partials.seo')

    <!-- Fav Icon -->
<link rel="icon" href="{{asset($themeTrue.'frontend/assets/images/favicon.ico')}}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset($themeTrue.'frontend/assets/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/owl.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/color.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/rtl.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset($themeTrue.'frontend/assets/css/responsive.css')}}" rel="stylesheet">

    @stack('css-lib')

</head>


<!-- page wrapper -->
<body class="boxed_wrapper ltr">
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>



    <!-- search-popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search"><span>Close</span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="http://azim.commonsupport.com/Fionca/#">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                            <input type="submit" value="Search Now!" class="theme-btn style-four">
                        </fieldset>
                    </div>
                </form>
                <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Idea</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Growth</a></li>
                    <li><a href="#">Plan</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- search-popup end -->


    <!-- main header -->
    <header class="main-header style-one">
        <div class="header-top">
            <div class="auto-container">
                <div class="top-inner clearfix">
                    <ul class="info top-left pull-left">
                        <li><i class="fas fa-map-marker-alt"></i>838 Andy Street, Madison, NJ 08003</li>
                        <li><i class="fas fa-headphones"></i>Support <a href="tel:01005200369">0100 5200 369</a></li>
                    </ul>
                    <div class="top-right pull-right">
                        <ul class="social-links clearfix">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    
                    <div class="menu-area pull-right">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="#">Home</a>
                                       
                                    </li> 
                                    <li class="dropdown"><a href="#">Our Company</a>
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Our Team</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#">Market</a>
                                       
                                    </li>
                                    <li><a href="#">Getting Started</a>
                                       
                                    </li>
                                    <li><a href="#">Investment Plan</a>
                                        
                                    </li>                              
                                    <li><a href="contact.html">Support</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="menu-right-content clearfix">
                            <div class="search-btn">
                                <button type="button" class="search-toggler"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="nav-btn nav-toggler navSidebar-button clearfix">
                                <i class="fas fa-align-right"></i>
                            </div>
                            <div class="btn-box">
                                <a href="#" class="theme-btn style-one">Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <!-- <div class="logo-box pull-left">
                        <figure class="logo"><a href="#"><img src="{{asset($themeTrue.'frontend/assets/images/small-logo.png')}}" alt=""></a></figure>
                    </div> -->
                    <div class="menu-area pull-right">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><a href="#"><img src="{{asset($themeTrue.'frontend/assets/images/mobile-logo.png')}}" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->


@include($theme.'partials.banner')

@yield('content')


@include($theme.'partials.footer')



@stack('extra-content')


<!-- jequery plugins -->
<script src="{{asset($themeTrue.'frontend/assets/js/jquery.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/owl.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/wow.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/validation.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/appear.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/scrollbar.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/nav-tool.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/circle-progress.js')}}"></script>
<script src="{{asset($themeTrue.'frontend/assets/js/jquery.nice-select.min.js')}}"></script>

<!-- main-js -->
<script src="{{asset($themeTrue.'frontend/assets/js/script.js')}}"></script>

<script src="{{asset($themeTrue.'js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/global/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/global/js/popper.min.js')}}"></script>
<script src="{{asset('assets/global/js/bootstrap.min.js')}}"></script>
@stack('extra-js')

<script src="{{asset('assets/global/js/notiflix-aio-2.7.0.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/fontawesome.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/wow.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/jquery.flagstrap.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/slick.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/owl.carousel.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/multi-animated-counter.js')}}"></script>
<script src="{{asset($themeTrue.'js/radialprogress.js')}}"></script>


<script src="{{asset('assets/global/js/pusher.min.js')}}"></script>
<script src="{{asset('assets/global/js/vue.min.js')}}"></script>
<script src="{{asset('assets/global/js/axios.min.js')}}"></script>

<script src="{{asset($themeTrue.'js/script.js')}}"></script>


@auth
<script>
    'use strict';
    let pushNotificationArea = new Vue({
        el: "#pushNotificationArea",
        data: {
            items: [],
        },
        beforeMount() {
            this.getNotifications();
            this.pushNewItem();
        },
        methods: {
            getNotifications() {
                let app = this;
                axios.get("{{ route('user.push.notification.show') }}")
                    .then(function (res) {
                        app.items = res.data;
                    })
            },
            readAt(id, link) {
                let app = this;
                let url = "{{ route('user.push.notification.readAt', 0) }}";
                url = url.replace(/.$/, id);
                axios.get(url)
                    .then(function (res) {
                        if (res.status) {
                            app.getNotifications();
                            if (link != '#') {
                                window.location.href = link
                            }
                        }
                    })
            },
            readAll() {
                let app = this;
                let url = "{{ route('user.push.notification.readAll') }}";
                axios.get(url)
                    .then(function (res) {
                        if (res.status) {
                            app.items = [];
                        }
                    })
            },
            pushNewItem() {
                let app = this;
                // Pusher.logToConsole = true;
                let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                    encrypted: true,
                    cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                });
                let channel = pusher.subscribe('user-notification.' + "{{ Auth::id() }}");
                channel.bind('App\\Events\\UserNotification', function (data) {
                    app.items.unshift(data.message);
                });
                channel.bind('App\\Events\\UpdateUserNotification', function (data) {
                    app.getNotifications();
                });
            }
        }
    });
</script>

@endauth
@stack('script')
@if (session()->has('success'))
    <script>
        Notiflix.Notify.Success("@lang(session('success'))");
    </script>
@endif

@if (session()->has('error'))
    <script>
        Notiflix.Notify.Failure("@lang(session('error'))");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        Notiflix.Notify.Warning("@lang(session('warning'))");
    </script>
@endif


<script>
    $(document).ready(function () {
        $(".language").find("select").change(function () {
            window.location.href = "{{route('language')}}/" + $(this).val()
        })
    })

</script>

</body>
</html>
