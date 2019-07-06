<!DOCTYPE html>
<!-- Marko Jovanovic 0635/2015 -->
<html lang="en">


<!-- Mirrored from static.crazycafe.net/crazycafe/ekudmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 May 2018 11:12:37 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICON -->
    <link rel="icon" href="assets/img/favicon.png">
    <!--   Title Page -->
    <title>Registracija</title>
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
        <div class="homepage-sec1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2></h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
					@guest
                        <div class="card">
							<div class="card-header">{{ __('Registracija') }}</div>

							<div class="card-body">
								<form method="POST" action="{{ route('register') }}">
									@csrf

									<div class="form-group row">
										<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail adresa') }}</label>

										<div class="col-md-6">
											<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

											@if ($errors->has('email'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group row">
										<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

										<div class="col-md-6">
											<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

											@if ($errors->has('password'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group row">
										<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potvdrite lozinku') }}</label>

										<div class="col-md-6">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
										</div>
									</div>
									
									 <div class="form-group row">
										<label for="ime" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

										<div class="col-md-6">
											<input id="ime" type="text" class="form-control{{ $errors->has('ime') ? ' is-invalid' : '' }}" name="ime" value="{{ old('ime') }}" required>

											@if ($errors->has('ime'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('ime') }}</strong>
												</span>
											@endif
										</div>
									</div>
									
									 <div class="form-group row">
										<label for="prezime" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>

										<div class="col-md-6">
											<input id="prezime" type="text" class="form-control{{ $errors->has('prezime') ? ' is-invalid' : '' }}" name="prezime" value="{{ old('prezime') }}" required>

											@if ($errors->has('prezime'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('prezime') }}</strong>
												</span>
											@endif
										</div>
									</div>
									
									 <div class="form-group row">
										<label for="pol" class="col-md-4 col-form-label text-md-right">{{ __('Pol') }}</label>

										<div class="col-md-6">
											<select id="pol" type="pol" class="form-control{{ $errors->has('pol') ? ' is-invalid' : '' }}" name="pol" value="{{ old('pol') }}" required>
												<option value="M">Musko</option>
												<option value="Z">Zensko</option>
											</select>

											@if ($errors->has('pol'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('pol') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group row">
										<label for="datum" class="col-md-4 col-form-label text-md-right">{{ __('Datum rodjenja') }}</label>

										<div class="col-md-6">
											<input id="datum" type="date" class="form-control{{ $errors->has('datum') ? ' is-invalid' : '' }}" name="datum" value="{{ old('datum') }}" required>

											@if ($errors->has('datum'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('datum') }}</strong>
												</span>
											@endif
										</div>
									</div>
									
									<div class="form-group row">
										<label for="prebivaliste" class="col-md-4 col-form-label text-md-right">{{ __('Mesto prebivalista') }}</label>

										<div class="col-md-6">
											<input id="prebivaliste" type="text" class="form-control{{ $errors->has('prebivaliste') ? ' is-invalid' : '' }}" name="prebivaliste" value="{{ old('prebivaliste') }}" required>

											@if ($errors->has('prebivaliste'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('prebivaliste') }}</strong>
												</span>
											@endif
										</div>
									</div>
                                    
                                    <div class="form-group row">
                                        <label for="zanimanje" class="col-md-4 col-form-label text-md-right">{{ __('Zanimanje') }}</label>

                                        <div class="col-md-6">
                                            <input id="zanimanje" type="text" class="form-control{{ $errors->has('zanimanje') ? ' is-invalid' : '' }}" name="zanimanje" value="{{ old('zanimanje') }}" required>

                                            @if ($errors->has('zanimanje'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('zanimanje') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
									
									<div class="form-group row mb-0">
										<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Registruj se') }}
											</button>
										</div>
									</div>
                                    <input id="pravaPristupa" type="hidden" name="pravaPristupa" value="V">
                                    @php
                                        $datumPristupa = date("Y-m-d");
                                    @endphp
                                    <input id="datumPristupa" type="hidden" name="datumPristupa" value= "{{ $datumPristupa }}">
								</form>
							</div>
						</div>
                    @else
					@endguest
					</div>
                </div>
            </div>
        </div>
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
</body>

<!-- Mirrored from static.crazycafe.net/crazycafe/ekudmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 May 2018 11:13:16 GMT -->
</html>