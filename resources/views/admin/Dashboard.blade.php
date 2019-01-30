@extends('admin/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Daftar Sekolah</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			<div class="panel-body">
				<div class="row">
            <div class="col-md-6 col-xl-12">
              <section class="panel">
                <div class="panel-body bg-primary">
                  <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                      <div class="summary-icon">
                        <i class="fa fa-inbox"></i>
                      </div>
                    </div>
                    <div class="widget-summary-col">
                      <div class="summary">
                        <div class="info">
                          <strong class="amount">Total Proposal</strong>
                        </div>
                        <h4 class="title">{{$proposal}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="col-md-6 col-xl-12">
              <section class="panel">
                <div class="panel-body bg-secondary">
                  <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                      <div class="summary-icon">
                        <i class="fa fa-check"></i>
                      </div>
                    </div>
                    <div class="widget-summary-col">
                      <div class="summary">
                        <div class="info">
                          <strong class="amount">Proposal Selesai</strong>
                        </div>
                        <h4 class="title">{{$proposalSelesai}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="col-md-6 col-xl-12">
              <section class="panel">
                <div class="panel-body bg-tertiary">
                  <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                      <div class="summary-icon">
                        <i class="fa fa-dollar"></i>
                      </div>
                    </div>
                    <div class="widget-summary-col">
                      <div class="summary">
                        <div class="info">
                          <strong class="amount">Total Bantuan</strong>
                        </div>
                        <h4 class="title">Rp. {{$dana_terkirim}},-</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="col-md-6 col-xl-12">
              <section class="panel">
                <div class="panel-body bg-quartenary">
                  <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                      <div class="summary-icon">
                        <i class="fa fa-university"></i>
                      </div>
                    </div>
                    <div class="widget-summary-col">
                      <div class="summary">
                        <div class="info">
                          <strong class="amount">Sekolah Terdaftar</strong>
                        </div>
                        <h4 class="title">{{$sekolah}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
			</div>
				
	</section>
	<!-- end: page -->
  <!-- start: page -->
  <section class="panel">
      <div class="panel-body">
        <section class="panel">
            <header class="panel-heading panel-heading-transparent">
              <h2 class="panel-title">Proposal Stats</h2>
            </header>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped mb-none">
                  <thead>
                    <tr>
                      <th>Proposal</th>
                      <th>Status</th>
                      <th>Oleh</th>
                      <th>Rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataproposal as $data)
                    <tr>
                      <td>{{$data->judul}}</td>

                        @if($data->status == "belum")
                        <td>Belum di periksa</td>
                        @elseif($data->status == "sudah")
                        <td>Sudah di setujui</td>
                        @elseif($data->status == "forward")
                        <td>Dalam Pemeriksaan</td>
                        @elseif($data->status == "verifikasi")
                        <td>Sudah di verifikasi</td>
                        @elseif($data->status == "unvalid")
                        <td>Tidak Valid</td>
                        @elseif($data->status == "selesai")
                        <td>Sudah selesai</td>
                        @else
                        <td>Ditolak</td>
                        @endif

                      <td>{{$data->sekolah->nama}}</td>
                      <td>{{$data->rate}} %</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </section>
      </div>
        
  </section>

@endsection
