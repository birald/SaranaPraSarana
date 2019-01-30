<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Penggunaan Dana</title>
	<link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Detail Data Pengeluaran Dana Bantuan</h1>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
				  <thead>
				    <tr style="border: 1px solid black">
				      <th scope="col" style="border: 1px solid black" style="width: 10px">No.</th>
				      <th scope="col" style="border: 1px solid black">Nama Barang</th>
				      <th scope="col" style="border: 1px solid black">harga(Rupiah)</th>
				    </tr>
				  </thead>
				  <tbody>
						@foreach(array_combine($barang, $harga) as $barangs => $hargas)
						<tr scope="row">
							<td style="width: 10px">{{$no++}}</td>
							<td>{{$barangs}}</td>
							<td>{{$hargas}}</td>
						</tr>
						@endforeach
						<tr scope="row">
							<th>TOTAL</th>
							<td></td>
							<td>Rp {{$total}},-</td>
						</tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>