@extends('kasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Daftar Proposal di verifikasi</h2>
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
								<td class="center"><a href="{{url('kasi/show_proposal/'.$proposal->id)}}" class="btn btn-primary">Show</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
				
	</section>
	<!-- end: page -->

@endsection
