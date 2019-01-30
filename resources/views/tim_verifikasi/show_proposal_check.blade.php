@extends('tim_verifikasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Detail Data Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

		<div class="panel-body">
			
			<h2 class="text-semibold text-dark text-uppercase mb-md mt-lg">{{$proposals->judul}}</h2>
			<h4>{{$proposals->deskripsi}}</h4>
			  @if($proposals->status == 'verifikasi')
		          <p><b>Status: </b>Proposal di verifikasi</p>
	          @elseif($proposals->status == 'unvalid')
	            <p><b>Status: </b>Proposal tidak valid</p>
	          @endif
			
			<div class="row">
				<div class="col-md-4 col-lg-4 col-xl-3">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tanggal Di ajukan</h4>
										<h4 class="title"><b>{{$proposals->created_at}}</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-home"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Bangunan Rusak</h4>
										<h4 class="title"><b>{{$proposals->jumlah_rusak}} bangunan</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-tachometer"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tingkat Kerusakan</h4>
										<h4 class="title"><b>{{$proposals->tingkat_rusak}}</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<a href="{{url('proposal/dokumen/'.$proposals->dokumen)}}" style="color: white" download>
					<section class="panel panel-featured-left panel-featured-primary bg-primary">
						<div class="panel-body bg-primary">
							<div class="widget-summary widget-summary-sm bg-primary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-cloud-download"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h1class="title"><b>Download File <br> Proposal</b></h1>
									</div>
								</div>
							</div>
						</div>
					</section>
					</a>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-3">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Siswa Perkelas</h4>
										<h4 class="title"><b>{{$proposals->rombongan_belajar}} Orang</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-group"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Semua Siswa</h4>
										<h4 class="title"><b>{{$proposals->jumlah_siswa}} Orang</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-arrow-circle-o-up"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Dana Diajukan</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_diajukan}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<a href="{{url('proposal/dokumen_forward/'.$proposals->dokumen_forward)}}" style="color: white" download>
					<section class="panel panel-featured-left panel-featured-primary bg-primary">
						<div class="panel-body bg-primary">
							<div class="widget-summary widget-summary-sm bg-primary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-cloud-download"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h1class="title"><b>Download Berkas <br> Perintah</b></h1>
									</div>
								</div>
							</div>
						</div>
					</section>
					</a>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-3">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-dollar"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total Bantuan</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_total}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-arrow-circle-o-down"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Dana Diturunkan</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_terkirim}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-money"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Dana terpakai</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_terpakai}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>

		</div>

		<div class="panel-body">
			<div class="title">
				<h3> Galeri Kerusakan</h3>
			</div>
			<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
				
	          @foreach($galeri as $fotos)
				<div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="{{ url('proposal/foto/'.$fotos)}}">
								<img src="{{ url('proposal/foto/'.$fotos)}}" class="img-responsive" alt="Project">
							</a>
						</div>
					</div>
				</div>
				@endforeach

			</div>

		</div>
				
	</section>
	<!-- end: page -->



     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="valid">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Validasi Data</h4>
              </div>
              <div class="modal-body">
                
                <form name="form1" action="{{ url('tim_verifikasi/validasi')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                    <input type="hidden" name="id">
                    <input type="hidden" name="tingkat_sekolah">
                  </div>
                      <p>silahkan centang data yang valid</p>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_foto"">
                      <label class="form-check-label" for="defaultCheck1">
                        Foto
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_dokumen"">
                      <label class="form-check-label" for="defaultCheck1">
                        Dokumen
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_jumlah_rusak"">
                      <label class="form-check-label" for="defaultCheck1">
                        Jumlah Rusak
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_tingkat_rusak"">
                      <label class="form-check-label" for="defaultCheck1">
                        Tingkat Rusak
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_rombongan_belajar"">
                      <label class="form-check-label" for="defaultCheck1">
                        Rombongan Belajar
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_jumlah_siswa"">
                      <label class="form-check-label" for="defaultCheck1">
                        Jumlah Siswa
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_tingkat_sekolah"">
                      <label class="form-check-label" for="defaultCheck1">
                        Tingkat Sekolah
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status_jenis_sekolah"">
                      <label class="form-check-label" for="defaultCheck1">
                        Jenis sekolah
                      </label>
                    </div>
                    <br>
                      <div class="form-group">
                        <label>Berkas verifikasi</label>
                          <div class="custom-file">
                            <input name="dokumen_verifikasi" type="file" class="custom-file-input" required>
                          </div>
                      </div>
                    <br>
                  <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="unvalid">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tolak Berkas</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" action="{{ url('tim_verifikasi/unvalid')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                    <input type="hidden" name="id">
                    <input type="hidden" name="tingkat_sekolah">
                  </div>
                      <p>Apakah anda yakin berkas ini tidak valid ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>

        function valid(id,tingkat_sekolah)
            {
              document.forms['form1']['id'].value=id;
              document.forms['form1']['tingkat_sekolah'].value=tingkat_sekolah;
                $('#valid').modal('show');
            }

        function unvalid(id,tingkat_sekolah)
            { 
              document.forms['form2']['id'].value=id;
              document.forms['form2']['tingkat_sekolah'].value=tingkat_sekolah;
              $('#unvalid').modal('show');
            }
    </script>

@endsection
