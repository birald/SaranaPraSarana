@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">
		<div class="timeline">
			<div class="tm-body">
				<ol class="tm-items">


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
