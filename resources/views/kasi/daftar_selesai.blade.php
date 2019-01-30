@extends('kasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Daftar Proposal telah selesai</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th>Judul</th>
							<th>Tanggal</th>
							<th>Rate</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($proposals as $proposal)
							<tr class="gradeX">
								<td>{{$proposal->judul}}</td>
								<td>{{$proposal->created_at}}</td>
								<td>{{$proposal->rate}}</td>
								<td class="center">
									<a href="{{url('kasi/show_proposal/'.$proposal->id)}}" class="btn btn-primary">Detail</a>
									<a href="{{ url('kasi/rekap_data/'.$proposal->id)}}" class="btn btn-primary">Rekap</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
				
	</section>
	<!-- end: page -->

@endsection
