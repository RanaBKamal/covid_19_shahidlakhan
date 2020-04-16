@extends('adminlte::master')
@section('adminlte_css')
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
    @yield('css')
@stop
@section('body')
	<div class="wrapper">
		<div class="header-wrapper clearfix">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-2">
						<div class="logo-wrapper clearfix"><a href="/">
							<img src="{{asset('assets/images/chhap.svg')}}" class="logo_nishan" alt="covid 19 logo shahidlakhan">
						</a>
						</div>
					</div>
					<div class="col-12 col-md-7">
						<div class="heading-wrapper clearfix">
							<h1>शहिद लखन गाउँपालिका</h1>
							<h4>पिपलछाप, घैरुङ्ग, गोरखा जिल्ला, गण्डकी प्रदेश , नेपाल।</h4>
							<h5>वडा न. ५, (चाप्पानी-बझादि)को सहकार्यमा</h5>
						</div>
					</div>
					<div class="col-12 col-md-3">
						<div class="side-heading-wrapper clearfix">
							<span>COVID-19, सम्बन्धि सूचना, विवरण तथा जानकारी</span>
						</div>
						<div class="login-wrapper clearfix">
							<ul class="login-container clearfix">
								@guest
									<li>
										<span>
											<a href="{{ route('login') }}">{{ __('Login') }}</a>
										</span> |
										<span>
											<a href="{{ route('register') }}">{{ __('Register') }}</a>
										</span>
									</li>
								@else
									<li>
										<span>{{ Auth::user()->name }}</span> |<span>
										<a class="btn btn-small" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{__('Logout') }}
	                                    </a>

	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                        @csrf
	                                    </form>
										</span>
									</li>
								@endguest
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="body-wrapper clearfix">
			<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
			  <a class="navbar-brand" href="/"><i class="fa fa-home" style="color: #2A7DBE;"></i></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    {{menu('Site', 'bootstrap4-menu')}}
			  </div>
			</nav>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-8">
						<div class="page-content clearfix">
							@yield('page-content')		
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="side-content clearfix">
							<div class="side-widget clearfix">
								<div class="small-box bg-warning text-center">
									<div class="inner">
										<h2 style="font-weight: bold;">सहयोग गर्न चाहानुहुन्छ ?</h2>
									</div>
									<a href="{{route('donate-link')}}" class="btn btn-primary" style="margin-bottom: 10px;color: #ffffff !important;font-weight: bold;font-size:16px;">
									यहाँ थिच्नुहोस
									</a>
								</div>
								<div class="card card-outline card-primary">
									<p class="text-center info-text">
										विश्वभर महामारीको रुपमा फैलिएको कोरोना भाइरस (COVID-19) का घटनाहरुको नियमित सूचना संकलन र विश्लेषणलाई मध्यनजर गर्दै कोरोना संक्रमणको असहज परिस्थितिमा दैनिक अत्यावश्यक उपभोग्य बस्तुको सहज आपूर्ति तथा गुणस्तरसम्बन्धी कार्यको अनुगमन तथा सुपरिवेक्षण र सम्पूर्ण जनताहरु समक्ष सहि सूचना आदानप्रदान गर्ने कुरालाई महत्त्व दिएर यस पोर्टल निर्माण गरिएको छ।
									</p>
								</div>
							</div>
							<div class="side-widget clearfix">
								<div class="card card-outline card-primary">
									<p class="text-center info-text">
										शहिद लाखन संग सम्बन्धित सबैले यस पोर्टल मार्फत सुचना प्रबाह, सहयोग साथै फारमहरू पनि भर्न सकिनेछ। 
									</p>
								</div>
							</div>
							<div class="side-widget clearfix">
								<div class="card card-outline card-primary">
									<div class="text-center info-text">
										@php 
											echo	setting('site.representatives_detail');
										@endphp
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<!-- The Modal -->
						<div class="modal" id="myModal">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">COVID-19, शहिद लखन गाउँपालिका</h4>
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <img class="rounded img-fluid" src="{{Voyager::image(setting('site.front_message'))}}" alt="COVID-19, शहिद लखन गाउँपालिका">
						      </div>

						      <!-- Modal footer -->
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						      </div>

						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-wrapper clearfix">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<span class="copyright"> <b>© २०२०, शहिद लखन गाउँपालिका</b>, | Developed By: <a href="https://rkamal.com.np" target="_blank" style="font-weight: bold;">Kamal B. Rana</a></span>

					</div>
				</div>
			</div>
		</div>
	</div>
@stop



@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
	<script>
		$(document).ready(function() {
			if (sessionStorage.getItem("story") !== 'true') {
			    // sessionStorage.setItem('key', 'value'); pair
			    sessionStorage.setItem("story", "true");
			    // Calling the bootstrap modal
			    $("#myModal").modal();
		    }
		    $('#reset-session').on('click',function(){
			  	sessionStorage.setItem('story','');
			});
		} );
	</script>
    @stack('js')
    @yield('js')
@stop