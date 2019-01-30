<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rekap Data</title>
	<link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Rekap Data Proposal</h1>
				<br>
			</div>
		</div>
		<div class="row">
          <div class="col-md-12">
            <ul class="list-group">
              <li class="list-group-item">
                Data Proposal
                <ul>
                  <li><b>Dibuat tanggal : </b> {{$proposals->created_at}}</li>
                  <li><b>Sekolah : </b>{{$proposals->sekolah->nama}}</li>
                  <li><b>NPSN : </b>{{$proposals->sekolah->npsn}}</li>
                  <li><b>alamat : </b>{{$proposals->sekolah->alamat}}</li>
                  <li><b>telepon : </b>{{$proposals->sekolah->telepon}}</li>
                  <li><b>email : </b>{{$proposals->sekolah->email}}</li>
                  <li><b>dana yang di ajukan :</b>{{$proposals->dana_diajukan}}</li>
                  <li><b>dana yang di kirim :</b>{{$proposals->dana_total}}</li>
                </ul>
              </li>
              <li class="list-group-item">
                Data Verifikasi dana
                <ul>
                  <li><b>tanggal verifikasi : </b> {{$proposals->created_at}}</li>
                  <li>
                    <b>Jumlah Rusak :</b>{{$proposals->jumlah_rusak}}
                       @if($proposals->status_jumlah_rusak == "on")
                         <i class="fa fa-check" style="color: blue"></i>
                       @else
                         <i class="fa fa-times" style="color: red"></i>
                       @endif 
                  </li>
                  <li>
                    <b>Tingkat Rusak :</b>{{$proposals->tingkat_rusak}}
                       @if($proposals->status_tingkat_rusak == "on")
                         <i class="fa fa-check" style="color: blue"></i>
                       @else
                         <i class="fa fa-times" style="color: red"></i>
                       @endif
                  </li>
                  <li>
                    <b>Rombongan belajar :</b>{{$proposals->rombongan_belajar}}
                       @if($proposals->status_rombongan_belajar == "on")
                         <i class="fa fa-check" style="color: blue"></i>
                       @else
                         <i class="fa fa-times" style="color: red"></i>
                       @endif
                  </li>
                  <li>
                    <b>Total jumlah siswa :</b>{{$proposals->jumlah_siswa}}
                       @if($proposals->status_jumlah_siswa == "on")
                         <i class="fa fa-check" style="color: blue"></i>
                       @else
                         <i class="fa fa-times" style="color: red"></i>
                       @endif
                  </li>
                  <li>
                    <b>tingkat sekolah :</b>{{$proposals->tingkat_sekolah}}
                       @if($proposals->status_tingkat_sekolah == "on")
                         <i class="fa fa-check" style="color: blue"></i>
                       @else
                         <i class="fa fa-times" style="color: red"></i>
                       @endif
                  </li>
                  <li>
                    <b>jenis sekolah :</b>{{$proposals->jenis_sekolah}}
                       @if($proposals->status_jenis_sekolah == "on")
                         <i class="fa fa-check" style="color: blue"></i>
                       @else
                         <i class="fa fa-times" style="color: red"></i>
                       @endif
                  </li>
                </ul>
              </li>
              <li class="list-group-item">
                Data Pengiriman Dana Oleh Kasi
                <ul>
                  @foreach($pengiriman_danas as $pengiriman)
                  <li>
                    <b>Tanggal : </b> {{$pengiriman->created_at}}
                    <ul>
                      <li>Jumlah : Rp. {{$pengiriman->jumlah}},-</li>
                      <li>Bukti Transfer : <br>
                      <img class="profile-user-img img-fluid"
                           src="{{ url('proposal/kirim_dana/'.$pengiriman->foto)}}"
                           alt="User profile picture" style="width: 400px">
                      </li>
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="list-group-item">
                Data Penggunaan Dana Oleh Sekolah
                <ul>
                  @foreach($penggunaan_danas as $penggunaan)
                  <li>
                    <b>Tanggal : </b> {{$penggunaan->created_at}}
                    <ul>
                      <li>Jumlah : Rp. {{$penggunaan->jumlah}},-</li>
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </div>
    </div>
	</div>
</body>
</html>