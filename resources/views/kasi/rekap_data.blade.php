@extends('kasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Rekap Data Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

        <a href="{{url('kasi/download_rekap_data/'.$proposals->id)}}"><button class="btn btn-primary">Download Rekap Data</button></a>
        <br>

		<div class="timeline">
			<div class="tm-body">
				<ol class="tm-items">

						<li>
							<div class="tm-info">
								<div class="tm-icon"><i class="fa fa-star"></i></div>
								<time class="tm-datetime" datetime="2013-11-22 19:13">
									<div class="tm-datetime-date">{{$proposals->created_at}}</div>
							</time>
							</div>
							<div class="tm-box" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
								<h3 class="title">
									Data Proposal
								</h3>
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
				                  <p><b>Deskripsi : </b> {{$proposals->deskripsi}}</p>
				                  <p><b>Sekolah : </b>{{$proposals->sekolah->nama}}</p>
				                  <p><b>NPSN : </b>{{$proposals->sekolah->npsn}}</p>
				                  <p><b>Alamat : </b>{{$proposals->sekolah->alamat}}</p>
				                  <p><b>Telepon : </b>{{$proposals->sekolah->telepon}}</p>
				                  <p><b>Email : </b>{{$proposals->sekolah->email}}</p>
				                  <p><b>Dana yang di ajukan :</b> Rp. {{$proposals->dana_diajukan}},-</p>
													<p><b>Dana yang di kirim :</b>Rp. {{$proposals->dana_total}},-</p>
													<p><b>Jumlah rusak:</b> {{$proposals->jumlah_rusak}}</p>
							</div>
						</li>

						<li>
							<div class="tm-info">
								<div class="tm-icon"><i class="fa fa-star"></i></div>
								<time class="tm-datetime" datetime="2013-11-22 19:13">
									<div class="tm-datetime-date">{{$proposals->tgl_diverifikasi}}</div>
							</time>
							</div>
							<div class="tm-box" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
								<h3 class="title">
									Proposal di verifikasi
								</h3>
							
				                  <p>
				                    <b>Jumlah Rusak :</b>{{$proposals->jumlah_rusak}}
				                       @if($proposals->status_jumlah_rusak == "on")
				                         <i class="fa fa-check" style="color: blue"></i>
				                       @else
				                         <i class="fa fa-times" style="color: red"></i>
				                       @endif 
				                  </p>
				                  <p>
				                    <b>Tingkat Rusak :</b>{{$proposals->tingkat_rusak}}
				                       @if($proposals->status_tingkat_rusak == "on")
				                         <i class="fa fa-check" style="color: blue"></i>
				                       @else
				                         <i class="fa fa-times" style="color: red"></i>
				                       @endif
				                  </p>
				                  <p>
				                    <b>Rombongan belajar :</b>{{$proposals->rombongan_belajar}}
				                       @if($proposals->status_rombongan_belajar == "on")
				                         <i class="fa fa-check" style="color: blue"></i>
				                       @else
				                         <i class="fa fa-times" style="color: red"></i>
				                       @endif
				                  </p>
				                  <p>
				                    <b>Total jumlah siswa :</b>{{$proposals->jumlah_siswa}}
				                       @if($proposals->status_jumlah_siswa == "on")
				                         <i class="fa fa-check" style="color: blue"></i>
				                       @else
				                         <i class="fa fa-times" style="color: red"></i>
				                       @endif
				                  </p>
				                  <p>
				                    <b>Tingkat sekolah :</b>{{$proposals->tingkat_sekolah}}
				                       @if($proposals->status_tingkat_sekolah == "on")
				                         <i class="fa fa-check" style="color: blue"></i>
				                       @else
				                         <i class="fa fa-times" style="color: red"></i>
				                       @endif
				                  </p>
				                  <p>
				                    <b>Jenis sekolah :</b>{{$proposals->jenis_sekolah}}
				                       @if($proposals->status_jenis_sekolah == "on")
				                         <i class="fa fa-check" style="color: blue"></i>
				                       @else
				                         <i class="fa fa-times" style="color: red"></i>
				                       @endif
				                  </p>
							</div>
						</li>


				  @foreach($log_aktivitas as $log)

						<li>
							<div class="tm-info">
								<div class="tm-icon"><i class="fa fa-star"></i></div>
								<time class="tm-datetime" datetime="2013-11-22 19:13">
									<div class="tm-datetime-date">{{$log->created_at}}</div>
							</time>
							</div>
							<div class="tm-box" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
								<h3 class="title">
									{{$log->deskripsi}}
								</h3>
								@if($log->dari == "kasi")
					              @foreach($pengiriman_dana as $dana)
					                @if($log->data_id == $dana->id)
					                <p><b>Jumlah : </b>Rp. {{$dana->jumlah}} ,-</p>
				                    <a class="float-center" href="{{url('proposal/dokumen_kirim_dana/'.$dana->dokumen)}}" download><button class="btn btn-primary">Download dokumen pengiriman dana</button></a>
				                    <br>
				                    <br>
					                <a class="img-thumbnail" href="{{ url('proposal/kirim_dana/'.$dana->foto)}}">
										<img width="215" src="{{ url('proposal/kirim_dana/'.$dana->foto)}}">
									</a>
					                @endif
					              @endforeach
					            @else
					              @foreach($penggunaan_dana as $dana)
					                @if($log->data_id == $dana->id)
					                <p><b>Jumlah : </b>Rp. {{$dana->jumlah}} ,-</p>
														<a class="float-center" href="{{url('penggunaan_dana/'.$dana->dokumen)}}" download><button class="btn btn-primary">Download dokumen penggunaan dana</button></a>
														<br><br>
														<a class="float-center" href="{{url('proposal/dokumen_penggunaan_dana/'.$dana->dokumen_persetujuan)}}" download><button class="btn btn-primary">Download dokumen laporan penggunaan </button></a>
														@endif
					              @endforeach
					            @endif
							</div>
						</li>

					@endforeach

				</ol>
			</div>
		</div>

	</section>
	<!-- end: page -->

@endsection
