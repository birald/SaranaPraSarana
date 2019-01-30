@extends('tim_verifikasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Profile User</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			
						<div class="col-md-12 col-lg-12">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Detail</a>
									</li>
									<li>
										<a href="#edit" data-toggle="tab">Edit</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
											<h4 class="mb-xlg">Personal Information</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nama</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$tim_verifikasis->username}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Email</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$tim_verifikasis->email}}</b></label>
													</div>
												</div>
											</fieldset>
									</div>
									<div id="edit" class="tab-pane">

										<form class="form-horizontal" action="{{ url('tim_verifikasi/editTimVerifikasi')}}" method="post" enctype="multipart/form-data">
											<input type="hidden" name="id" value="{{$tim_verifikasis->id}}">
											<h4 class="mb-xlg">Edit Personal Information</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nama</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileFirstName" name="username" value="{{$tim_verifikasis->username}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Email</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="email" value="{{$tim_verifikasis->email}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Password</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="profileCompany" name="password">
													</div>
												</div>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Update</button>
													</div>
												</div>
											</div>
						                    <input type="hidden" name="_method" value="PUT">
						                      {{csrf_field()}}
										</form>

									</div>
								</div>
							</div>
						</div>
				
	</section>
	<!-- end: page -->

@endsection
