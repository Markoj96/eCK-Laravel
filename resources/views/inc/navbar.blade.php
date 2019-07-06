<!-- Marko Jovanovic 0635/2015 -->
<div class="navbar_dash_area">
	<div class="responsive-bars">
		<button class="dnl-btn-toggle">
			<span class="nav-bars"><i class="zmdi zmdi-menu"></i></span>
		</button>
	</div>
	<!-- Dashboard Navbar Left -->
	@guest
	<div class="dash-navbar-left dnl-visible">
		<ul class="dnl-nav">
			<li class="">
				<a href="/modelprojekat/public">
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/home.svg') }}" alt="">
					<span class="dnl-link-text">
						POCETNA
					</span>
				</a>
			</li>
			<li>
				<a href="{{ route('login') }}">
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/login.svg') }}" alt="">
					<span class="dnl-link-text">
						ULOGUJTE SE
					</span>
				</a>
			</li>
			<li>
				<a href="{{ route('register') }}">
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/register.svg') }}" alt="">
					<span class="dnl-link-text">
						REGISTRUJTE SE
					</span>
				</a>
			</li>
		</ul>
	</div>
	@else
	<div class="dash-navbar-left dnl-visible">
		<ul class="dnl-nav">
			<li class="">
				<a href="/modelprojekat/public">
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/home.svg') }}" alt="">
					<span class="dnl-link-text">
						POCETNA
					</span>
				</a>
			</li>
			<li>
				<a class="collapsed" data-toggle="collapse" href="#menuProfile">
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/user.svg') }}" alt="">
						<span class="dnl-link-text">
							PROFIL
						</span>
					<span class="nav-arrow">
						<img src="{{ asset('assets/svg/arrow-down.svg') }}" alt="">
					</span>
				</a>
				<!-- Dropdown level one -->
				<ul class="dnl-sub-one collapse" id="menuProfile">
					<li>
						<a href="{{ url('profil') }}">
						<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
						<span class="dnl-link-text">MOJ PROFIL</span>
					  </a>
					</li>
					<li>
						<a href="{{ route('izmena') }}">
						<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
						<span class="dnl-link-text">IZMENI PROFIL</span>
					  </a>
					</li>
				</ul>
			</li>
			<li>
				<a class="collapsed" data-toggle="collapse" href="#menuActivities">
					<span class="dnl-link-icon"></span>
					<img src="{{ asset('assets/svg/bell.svg') }}" alt="">
					<span class="dnl-link-text">AKTIVNOSTI</span>
					<span class="nav-arrow"><img src="{{ asset('assets/svg/arrow-down.svg') }}" alt=""></span>
				</a>
				<!-- Dropdown level one -->
				<ul class="dnl-sub-one collapse" id="menuActivities">
					 <li>
						<a href="/modelprojekat/public/prikaziTekuce">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								TEKUCE AKTIVNOSTI
							</span>
						</a>
					</li>
					<li>
						<a href="/modelprojekat/public/prikaziSveAktivnosti">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								PRETRAGA AKTIVNOSTI
							</span>
					  </a>
					</li>
					@if((auth()->user()->pravaPristupa!='V'))
					<li>
						<a href="/modelprojekat/public/kreiraj">
						<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
						<span class="dnl-link-text">KREIRAJ AKTIVNOST</span>
					  </a>
					</li>
					@endif
				</ul>
			</li>
			@if((auth()->user()->pravaPristupa!='V'))
			<li>
				<a class="collapsed" data-toggle="collapse" href="#menuVolunteers">
					<span class="dnl-link-icon"></span>
					<img src="{{ asset('assets/svg/users.svg') }}" alt="">
					<span class="dnl-link-text">VOLONTERI</span>
					<span class="nav-arrow"><img src="{{ asset('assets/svg/arrow-down.svg') }}" alt=""></span>
				</a>
				<!-- Dropdown level one -->
				<ul class="dnl-sub-one collapse" id="menuVolunteers">
					 <li>
						<a href="/modelprojekat/public/volonteri">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								PRETRAGA VOLONTERA
							</span>
						</a>
					</li>
				</ul>
			</li>
			@endif
			@if((auth()->user()->pravaPristupa!='V'))
			<li>
				<a class="collapsed" data-toggle="collapse" href="#menuTrainings">
					<span class="dnl-link-icon"></span>
					<img src="{{ asset('assets/svg/dribbble.svg') }}" alt="">
					<span class="dnl-link-text">OBUKE</span>
					<span class="nav-arrow"><img src="{{ asset('assets/svg/arrow-down.svg') }}" alt=""></span>
				</a>
				<!-- Dropdown level one -->
				<ul class="dnl-sub-one collapse" id="menuTrainings">
					 <li>
						<a href="/modelprojekat/public/kreirajObuku">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								KREIRAJ OBUKU
							</span>
						</a>
					</li>
					<li>
						<a href="/modelprojekat/public/kreirajObucenost">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								KREIRAJ OBUCENOST
							</span>
					  </a>
					</li>
					<li>
						<a href="/modelprojekat/public/listavolontera">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								ZABELEZI OBUCENOST
							</span>
					  </a>
					</li>
				</ul>
			</li>
			@endif
			
			<li>
				<a class="collapsed" data-toggle="collapse" href="#menuSeminar">
					<span class="dnl-link-icon"></span>
					<img src="{{ asset('assets/svg/books-stack.svg') }}" alt="">
					<span class="dnl-link-text">SEMINARI</span>
					<span class="nav-arrow"><img src="{{ asset('assets/svg/arrow-down.svg') }}" alt=""></span>
				</a>
				<!-- Dropdown level one -->
				<ul class="dnl-sub-one collapse" id="menuSeminar">
					@if((auth()->user()->pravaPristupa!='V'))
					 <li>
						<a href="/modelprojekat/public/kreirajSeminar">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								KREIRAJ SEMINAR
							</span>
						</a>
					</li>
					@endif
					<li>
						<a href="/modelprojekat/public/prikaziTekuceSeminare">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								ZABELEZI PRISUSTVO
							</span>
						</a>
					</li>
					@if((auth()->user()->pravaPristupa!='V'))
					<li>
						<a href="/modelprojekat/public/pregledseminara">
							<img src="{{ asset('assets/svg/subnav-arrow.svg') }}" alt="">
							<span class="dnl-link-text">
								PREGLED PRISUSTVA
							</span>
						</a>
					</li>
					@endif
				</ul>
			</li>
			@if((auth()->user()->pravaPristupa!='V'))
			<li class="">
				<a href="{{ route('statistika') }}">
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/pie-chart.svg') }}" alt="">
					<span class="dnl-link-text">
						STATISTIKA
					</span>
				</a>
			</li>
			@endif
			<li class="">
				<a href="{{ route('logout') }}"
					onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
					<span class="dnl-link-icon"></span>
						<img src="{{ asset('assets/svg/power.svg') }}" alt="">
					<span class="dnl-link-text">
						IZLOGUJTE SE
					</span>
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</div>
	@endguest
</div>