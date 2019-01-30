@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Daftar Proposal di Terima</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th>Judul</th>
							<th>tanggal</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($proposals as $proposal)
							<tr>
								<td>{{$proposal->judul}}</td>
								<td>{{$proposal->created_at}}</td>
								<td class="center">
									<a href="{{url('sekolah/show_proposal_acc/'.$proposal->id)}}" class="btn btn-primary">Detail</a>
									<a href="{{url('sekolah/log_aktivitas/'.$proposal->id)}}" class="btn btn-primary">Log</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
				
	</section>
	<!-- end: page -->

@endsection
