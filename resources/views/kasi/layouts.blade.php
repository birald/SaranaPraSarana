<!doctype html>
<html class="boxed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Sarana | Dinas Pendidikan | Kepala Seksi</title>
		<meta name="keywords" content="HTML5 Admin Template" />

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{ url('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ url('assets/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ url('assets/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ url('assets/stylesheets/theme-custom.c')}}ss">

		<!-- Head Libs -->
		<script src="{{ url('assets/vendor/modernizr/modernizr.js')}}"></script>
		
	  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

	  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="{{ url('assets/images/logo.png')}}" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<ul class="notifications">
								<li>

						          @if($jumlah_notifikasi > 0)
									<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
										<i class="fa fa-bell"></i>
										<span class="badge">{{$jumlah_notifikasi}}</span>
									</a>
									<div class="dropdown-menu notification-menu">
										<div class="notification-title">
											Alerts
										</div>
					
										<div class="content">
											<ul>
								            @foreach($top_notifikasis as $notifikasi)
								              @if($notifikasi->deskripsi == 'buat_proposal')
												<li>
													<a href="{{ url('kasi/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}" class="clearfix">
														<div class="image">
															<i class="fa fa-bell bg-danger"></i>
														</div>
														<span class="title">Proposal Baru</span>
														<span class="message">{{$notifikasi->created_at}}</span>
													</a>
												</li>
								              @elseif($notifikasi->deskripsi == 'update_dana')
												<li>
													<a href="{{ url('kasi/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}" class="clearfix">
														<div class="image">
															<i class="fa fa-bell bg-danger"></i>
														</div>
														<span class="title">Update Penggunaan Dana</span>
														<span class="message">{{$notifikasi->created_at}}</span>
													</a>
												</li>
								              @elseif($notifikasi->deskripsi == 'edit_proposal')
												<li>
													<a href="{{ url('kasi/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}" class="clearfix">
														<div class="image">
															<i class="fa fa-bell bg-danger"></i>
														</div>
														<span class="title">Pengeditan proposal</span>
														<span class="message">{{$notifikasi->created_at}}</span>
													</a>
												</li>
								              @elseif($notifikasi->deskripsi == 'verifikasi')
												<li>
													<a href="{{ url('kasi/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}" class="clearfix">
														<div class="image">
															<i class="fa fa-bell bg-danger"></i>
														</div>
														<span class="title">Proposal di verifikasi</span>
														<span class="message">{{$notifikasi->created_at}}</span>
													</a>
												</li>
								              @elseif($notifikasi->deskripsi == 'unvalid')
												<li>
													<a href="{{ url('kasi/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}" class="clearfix">
														<div class="image">
															<i class="fa fa-bell bg-danger"></i>
														</div>
														<span class="title">Proposal tidak valid</span>
														<span class="message">{{$notifikasi->created_at}}</span>
													</a>
												</li>
												@endif
											@endforeach
											</ul>
					
											<hr />
					
											<div class="text-right">
												<a href="{{url('kasi/all_notifikasi')}}" class="view-more">View All</a>
											</div>
										</div>
									</div>
									@else
									<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
										<i class="fa fa-bell"></i>
									</a>
										<div class="dropdown-menu notification-menu">
					
									<div class="content">
											<p>Null</p>
					
											<hr />
					
											<div class="text-right">
												<a href="{{url('kasi/all_notifikasi')}}" class="view-more">View All</a>
											</div>
										</div>
									</div>
									@endif
					
									
								</li>
							</ul>
							
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="{{ url('assets/images/!logged-user.jpg')}}')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{ url('assets/images/!logged-user.jpg')}}')}}" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{auth()->guard('kasi')->user()->username}}</span>
								<span class="role">Administrator Kasi</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>					
								<li>
									<a role="menuitem" tabindex="-1" href="{{ url('logout_kasi')}}"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-parent">
										<a>
											<i class="fa fa-laptop" aria-hidden="true"></i>
											<span>Proposal</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ url('/kasi')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Permintaan 
												</a>
											</li>
											<li>
												<a href="{{ url('/kasi/daftar_pending')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Proposal Pending
												</a>
											</li>
											<li>
												<a href="{{ url('/kasi/daftar_verifikasi')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Proposal di Verifikasi
												</a>
											</li>
											{{-- <li>
												<a href="{{ url('/kasi/daftar_unvalid')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Proposal Tidak Valid
												</a>
											</li> --}}
											<li>
												<a href="{{ url('/kasi/daftar_terima')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Proposal Prioritas
												</a>
											</li>
											<li>
												<a href="{{ url('/kasi/daftar_tolak')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Proposal di Tolak
												</a>
											</li>
											<li>
												<a href="{{ url('/kasi/daftar_selesai')}}">
												<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
													 Daftar Proposal di Selesai
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="{{ url('/kasi/all_notifikasi')}}">
											<i class="fa fa-bell" aria-hidden="true"></i>
											<span>Notifikasi</span>
										</a>
									</li>
									<li>
										<a href="{{ url('/logout_kasi')}}">
											<i class="fa fa-sign-out" aria-hidden="true"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</nav>
				
							<hr class="separator" />

						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					
					@yield('content')

				</section>
			</div>

			<!-- Vendor -->
			<script src="{{ url('assets/vendor/jquery/jquery.js')}}"></script>
			<script src="{{ url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
			<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
			<script src="{{ url('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
			<script src="{{ url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
			<script src="{{ url('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
			<script src="{{ url('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
			
			<!-- Specific Page Vendor -->
			<script src="{{ url('assets/vendor/select2/select2.js')}}"></script>
			<script src="{{ url('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
			<script src="{{ url('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
			<script src="{{ url('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
			
			<!-- Theme Base, Components and Settings -->
			<script src="{{ url('assets/javascripts/theme.js')}}"></script>
			
			<!-- Theme Custom -->
			<script src="{{ url('assets/javascripts/theme.custom.js')}}"></script>
			
			<!-- Theme Initialization Files -->
			<script src="{{ url('assets/javascripts/theme.init.js')}}"></script>

			<!-- Examples -->
			<script src="{{ url('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
			<script src="{{ url('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
			<script src="{{ url('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
			<script src="{{ url('assets/javascripts/ui-elements/examples.modals.js')}}"></script>

			<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
			<script>
			  @if(Session::has('message'))
			    var type="{{Session::get('alert-type','success')}}"
			  
			    switch(type){
			      case 'success':
			       toastr.info("{{ Session::get('message') }}");
			       break;
			    case 'error':
			      toastr.error("{{ Session::get('message') }}");
			      break;
			    }
			  @endif
			</script>
			  <script>
			  function tandaPemisahTitik(b){
				var _minus = false;
				if (b<0) _minus = true;
				b = b.toString();
				b=b.replace(".","");
				b=b.replace("-","");
				c = "";
				panjang = b.length;
				j = 0;
				for (i = panjang; i > 0; i--){
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)){
				c = b.substr(i-1,1) + "." + c;
				} else {
				c = b.substr(i-1,1) + c;
				}
				}
				if (_minus) c = "-" + c ;
				return c;
				}

				function numbersonly(ini, e){
				if (e.keyCode>=49){
				if(e.keyCode<=57){
				a = ini.value.toString().replace(".","");
				b = a.replace(/[^\d]/g,"");
				b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
				ini.value = tandaPemisahTitik(b);
				return false;
				}
				else if(e.keyCode<=105){
				if(e.keyCode>=96){
				//e.keycode = e.keycode - 47;
				a = ini.value.toString().replace(".","");
				b = a.replace(/[^\d]/g,"");
				b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
				ini.value = tandaPemisahTitik(b);
				//alert(e.keycode);
				return false;
				}
				else {return false;}
				}
				else {
				return false; }
				}else if (e.keyCode==48){
				a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
				b = a.replace(/[^\d]/g,"");
				if (parseFloat(b)!=0){
				ini.value = tandaPemisahTitik(b);
				return false;
				} else {
				return false;
				}
				}else if (e.keyCode==95){
				a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
				b = a.replace(/[^\d]/g,"");
				if (parseFloat(b)!=0){
				ini.value = tandaPemisahTitik(b);
				return false;
				} else {
				return false;
				}
				}else if (e.keyCode==8 || e.keycode==46){
				a = ini.value.replace(".","");
				b = a.replace(/[^\d]/g,"");
				b = b.substr(0,b.length -1);
				if (tandaPemisahTitik(b)!=""){
				ini.value = tandaPemisahTitik(b);
				} else {
				ini.value = "";
				}

				return false;
				} else if (e.keyCode==9){
				return true;
				} else if (e.keyCode==17){
				return true;
				} else {
				//alert (e.keyCode);
				return false;
				}

				}
				</script>

		</section>
	</body>
</html>