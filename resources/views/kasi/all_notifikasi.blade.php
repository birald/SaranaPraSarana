@extends('kasi/layouts')

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
						            @if($notifikasi->deskripsi == 'buat_proposal')
										<h4 class="title">Proposal Baru</h4>
									@elseif($notifikasi->deskripsi == 'update_dana')
										<h4 class="title">Update Dana Proposal {{$notifikasi->proposal->judul}}</h4>
									@elseif($notifikasi->deskripsi == 'edit_proposal')
										<h4 class="title">Edit Proposal {{$notifikasi->proposal->judul}}</h4>
									@elseif($notifikasi->deskripsi == 'verifikasi')
										<h4 class="title">Proposal {{$notifikasi->proposal->judul}} di verifikasi</h4>
									@endif
										<div class="info">
											<strong class="amount">{{$notifikasi->created_at}}</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-uppercase" href="{{ url('kasi/show_notifikasi/'.$notifikasi->id.'/'.$notifikasi->proposal_id)}}">(view)</a>
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
