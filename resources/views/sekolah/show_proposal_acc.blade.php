@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Detail Data Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

		<div class="panel-body">
		
		<a href="{{url('sekolah/daftar_terima')}}" style="width: 49%" class="btn btn-warning">Back</a>
		<?php 
		$dana_terkirimb=str_replace(".","",$proposals->dana_terkirim);
		$dana_terpakaib=str_replace(".","",$proposals->dana_terpakai);
		?>
		@if($proposals->dana_terkirim > $proposals->dana_terpakai)
        <a href="{{url('sekolah/update_dana/'.$proposals->id)}}" style="width: 49%" class="btn btn-success">Update Dana Terpakai</a>
		@else
        <button onclick="popup()" style="width: 49%" class="btn btn-success">Update Dana Terpakai</button>
        @endif
			
			
			<h2 class="text-semibold text-dark text-uppercase mb-md mt-lg">{{$proposals->judul}}</h2>
			<h4>{{$proposals->deskripsi}}</h4>
			  @if($proposals->status == 'tolak')
	          <p><b>Status: </b>proposal di tolak</p>
	          @elseif($proposals->status == 'sudah')
	            <p><b>Status: </b>proposal sudah di setujui</p>
	          @elseif($proposals->status == 'belum')
	            <p><b>Status: </b>proposal belum di periksa pihak dinas </p>
	          @elseif($proposals->status == 'forward' || $proposals->status == 'verifikasi' || $proposals->status == 'unvalid')
	            <p><b>Status: </b>proposal dalam proses verifikasi </p>
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
					<a href="{{url('proposal/dokumen_terima/'.$proposals->dokumen_terima)}}" style="color: white" download>
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
										<h1class="title"><b>Download Berkas <br> Penerimaan</b></h1>
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
										<h4 class="title">Dana Diturunkan sementara</h4>
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
        <div class="modal fade" id="modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                    <p>Dana Belum Dikirimkan oleh kasi</p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Tutup">
                    </div>
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>

        function popup()
            {
                $('#modal').modal('show');
            }
    </script>

@endsection
