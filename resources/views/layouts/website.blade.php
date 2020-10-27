<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Eiser Ecommerce')</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('contents/website') }}/css/bootstrap.css" />
  <link href="{{ asset('contents/admin') }}/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/linericon/style.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/css/themify-icons.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/css/flaticon.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('contents/website') }}/css/style.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/css/responsive.css" />
  <link rel="stylesheet" href="{{ asset('contents/website') }}/vendors/better-rating/better-rating.css" />
</head>

<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: 012345678</p>
              <p>email: info@eiser.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.html">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.html">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.html">
            <img src="{{ asset('contents/website') }}/img/logo.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                  </li>
                  @foreach($categories as $category)
                  <li class="nav-item submenu dropdown">
                    <a href="{{ url('products/category/'.$category->slug) }}" class="nav-link dropdown-toggle">{{ $category->name }}</a>
                    <ul class="dropdown-menu">
                      @foreach($category->subcategories as $subcategory)
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('products/subcategory/'.$subcategory->slug) }}">{{ $subcategory->name }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  @endforeach
                  <li class="nav-item submenu dropdown @if(request()->is('blog')) active @endif">
                    <a href="{{ url('/blog') }}" class="nav-link">Blog</a>
                  </li>
                  <li class="nav-item @if(request()->is('contact')) active @endif">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ url('cart') }}" class="icons" id="cartItems">
                      <i class="ti-shopping-cart @if(Cart::count()) text-danger @endif"></i><span class="badge badge-info">{{ Cart::count() }}</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-user" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  @yield('content')

  <!--================ start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('contents/website') }}/js/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('contents/admin') }}/plugins/sweet-alert2/sweetalert2.min.js"></script>
  @if(Session::has('success'))
      <script>     
              swal({
                  title: 'Successful',
                  text: "{{ session('success') }}",
                  type: 'success',
                  timer: 3000
              })        
      </script>
  @endif
  <script src="{{ asset('contents/website') }}/js/popper.js"></script>
  <script src="{{ asset('contents/website') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('contents/website') }}/js/stellar.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/isotope/isotope-min.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('contents/website') }}/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="{{ asset('contents/website') }}/vendors/counter-up/jquery.counterup.js"></script>
  <script src="{{ asset('contents/website') }}/js/mail-script.js"></script>
  <script src="{{ asset('contents/website') }}/js/theme.js"></script>
  <script src="{{ asset('contents/website') }}/js/ajax.js"></script>
  <script src="stylesheet" href="{{ asset('contents/website') }}/vendors/better-rating/better-rating.js"></script>

  @stack('js')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  <script>
    $(function(){

  $('#better-rating-form').betterRating();

});
  </script>

</body>

</html>