@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Daftar Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th>Judul</th>
							<th>Status</th>
							<th>tanggal</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($proposals as $proposal)
							<tr>
								<td>{{$proposal->judul}}</td>

		                        @if($proposal->status == "belum")
		                        <td>Belum di periksa</td>
		                        @elseif($proposal->status == "sudah")
		                        <td>Sudah di setujui</td>
		                        @elseif($proposal->status == "forward")
		                        <td>Dalam Pemeriksaan</td>
		                        @elseif($proposal->status == "verifikasi")
		                        <td>Sudah di verifikasi</td>
		                        @elseif($proposal->status == "unvalid")
		                        <td>Tidak Valid</td>
		                        @elseif($proposal->status == "selesai")
		                        <td>Sudah selesai</td>
		                        @else
		                        <td>Ditolak</td>
		                        @endif

								<td>{{$proposal->created_at}}</td>
								<td class="center"><a href="{{url('sekolah/show_proposal/'.$proposal->id)}}" class="btn btn-primary">Show</a></td>
							</tr> 
						@endforeach
					</tbody>
				</table>
			</div>
				
	</section>
	<!-- end: page -->

@endsection
