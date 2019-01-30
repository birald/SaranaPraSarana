@extends('sekolah/layouts')

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
													<label class="col-md-3 control-label" for="profileFirstName">Nama Sekolah</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->nama}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">NPSN</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->npsn}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Tingkat</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->tingkat}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Alamat</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->alamat}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telepon</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->telepon}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Email</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->email}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">No. Rekening</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->no_rekening}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Nama Rekening</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->atas_nama}}</b></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Bank Rekening</label>
													<div class="col-md-8">
														<label class="control-label"><b>{{$sekolahs->nama_bank}}</b></label>
													</div>
												</div>
											</fieldset>
									</div>
									<div id="edit" class="tab-pane">

										<form class="form-horizontal" action="{{ url('sekolah/editSekolah')}}" method="post" enctype="multipart/form-data">
											<input type="hidden" name="id" value="{{$sekolahs->id}}">
											<h4 class="mb-xlg">Edit Personal Information</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nama Sekolah</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileFirstName" name="nama" value="{{$sekolahs->nama}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">NPSN</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileLastName" name="npsn" value="{{$sekolahs->npsn}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Tingkat</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress" name="tingkat" value="{{$sekolahs->tingkat}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Alamat</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="alamat" value="{{$sekolahs->alamat}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telepon</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="telepon" value="{{$sekolahs->telepon}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Email</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="email" value="{{$sekolahs->email}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Password</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="profileCompany" name="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">No. Rekening</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="no_rekening" value="{{$sekolahs->no_rekening}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Nama Rekening</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="atas_nama" value="{{$sekolahs->atas_nama}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Bank Rekening</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="nama_bank" value="{{$sekolahs->nama_bank}}">
													</div>
												</div>
											</fieldset>
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
