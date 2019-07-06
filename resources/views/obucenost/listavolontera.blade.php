<!DOCTYPE html>
<!-- Milos Cubrilo 428/15 
-->
<html lang="en">


<!-- Mirrored from static.crazycafe.net/crazycafe/ekudmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 May 2018 11:12:37 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICON -->
    <link rel="icon" href="assets/img/favicon.png">
    <!--   Title Page -->
    <title>Obucenost</title>
    <!-- bootstrap.min.css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <!-- material fonts.css -->
    <link href="{{ asset('assets/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <!-- style.css -->
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <!-- responsive.css -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <!-- theme-color.css -->
    <link href="{{ asset('assets/css/theme-color.css') }}" rel="stylesheet">
	<!-- fontawesome-icons.css -->
    <link href="{{ asset('assets/css/fontawesome-all.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--  page loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!--  page loader end -->
    <!--  custom theme area start -->
    <div class="custom-theme">
        <h4 class="title-theme">Configuration</h4>
        <div class="theme-switch">
            <span class="title_meta">Background Image</span>
            <label class="switch">
              <input type="checkbox" checked>
              <span class="slider"></span>
            </label>
        </div>
        <div class="filter-color">
            <span class="filter-title">Filters</span>
            <span class="color_green"></span>
            <span class="color_blue"></span>
            <span class="color_black"></span>
        </div>
        <div class="theme-image">
            <h4>Sidebar image & Background</h4>
            <span class="theme_img1"><img src="assets/img/theme-img1.jpg" alt=""></span>
            <span class="theme_img2"><img src="assets/img/theme-img2.jpg" alt=""></span>
            <span class="theme_img3"><img src="assets/img/theme-img3.jpg" alt=""></span>
        </div>
        <div class="theme-social-link">
            <h4>Thank you for sharing!</h4>
            <a href="#"><i class="zmdi zmdi-facebook"></i> Facebook</a>
            <a href="#"><i class="zmdi zmdi-twitter"></i> Twitter</a>
            <a href="#"><i class="zmdi zmdi-google-plus"></i> Google-plus</a>
        </div>
    </div>
    <!--  custom theme area end -->
    <!--  Header area start -->
    @include("inc/header")
    <!--  Header area end -->
    <!--  Nav menu area start -->
    @include("inc/navbar") 
    <!-- /.dash-navbar-left -->
    <!--  Homepage sec 1 start -->
    <div class="main-wraper-bg mar_lft_282">
        @if((auth()->user()->pravaPristupa!='V'))
        <div class="homepage-sec1">
            <div class="container-fluid">
                @include('inc.message')
                <div class="row">
                    <div class="col-md-12">
                        <h2>Lista volontera</h2>
                    </div>
                </div>
                @guest
                @else
                <div class="row">
					<!--sadrzaj-->
                <div class="panel panel-default">
                        <div class="panel-heading">Pretraga volontera</div>
                            <div class="panel-body">
                                <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Pretraga volontera" />
                                </div>
                                <div class="table-responsive">
                                    <h3 align="center">Volonteri : <span id="total_records"></span></h3>
                                        <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>id</th>
                                            <th>Ime</th>
                                            <th>Prezime</th>
                                            <th>Email</th>
                                            <th>Pol</th>
                                            <th>Prebivaliste</th>
                                            <th>Zanimanje</th>
                                            <th>Datum rodjenja</th>
                                            <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        </table>
                                </div>
                            </div>   
				        </div>
                </div>
                @endguest
        </div>
        </div>
        @endif
        <!--  Homepage sec 1 end -->
        <!--  Homepage sec 2 start -->
    </div>
    <!--  Homepage sec 2 end -->
    <!-- footer area start -->
    @include("inc/footer")
    <!-- footer area end -->
    <!-- jquery.js -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- jquery.popper.min.js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstrap.min.js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- inview.min.js -->
    <script src="{{ asset('assets/js/inview.js') }}"></script>
    <!-- counter.min.js -->
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('assets/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!--  dashboard js active -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!--  dashboard-map js active -->
    <script src="{{ asset('assets/js/dashboard-map.js') }}"></script>
    <!--  touchswip js  -->
    <script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>
    <!-- chart.min.js -->
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <!-- main.js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- custom-theme.js -->
    <script src="{{ asset('assets/js/custom-theme.js') }}"></script>
    <!-- za ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('live.obucenost') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }
        
         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
        </script>
</body>

<!-- Mirrored from static.crazycafe.net/crazycafe/ekudmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 May 2018 11:13:16 GMT -->
</html>