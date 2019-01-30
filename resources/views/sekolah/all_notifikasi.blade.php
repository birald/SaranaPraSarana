@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Semua Notifikasi</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

		<div class="col-md-12 col-lg-12 col-xl-4">
			<div class="row">

				@foreach($notifikasis as $notifikasi)
				<div class="col-md-12 col-xl-12">
					<section class="panel">
						<div class="panel-body bg-primary">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon">
										<i class="fa fa-bell"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
						            @if($notifikasi->deskripsi == 'terima')
										<h4 class="title">Proposal {{$notifikasi->proposal->judul}} Di terima</h4>
									@elseif($notifikasi->deskripsi == 'tolak')
										<h4 class="title">Proposal {{$notifikasi->proposal->judul}} Di tolak</h4>
									@elseif($notifikasi->deskripsi == 'selesai')
										<h4 class="title">Proposal {{$notifikasi->proposal->judul}} Sudah Selesai</h4>
									@elseif($notifikasi->deskripsi == 'kirim_dana')
										<h4 class="title">Pengiriman Dana proposal {{$notifikasi->proposal->judul}}</h4>
									@endif
										<div class="info">
											<strong class="amount">{{$notifikasi->created_at}}</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-uppercase" href="{{ url('sekolah/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}">(view)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				@endforeach

			</div>
		</div>
	</section>
	<!-- end: page -->

@endsection
