@extends('kasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Detail Data Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

		<div class="panel-body">
			@if($proposals->status == "belum")
              <button style="width: 49%" onclick="tolak('{{$proposals->id}}')" class="btn btn-danger">Reject Proposal</button>
              <button style="width: 49%" onclick="forward('{{$proposals->id}}')" class="btn btn-success">Kirim Tugas Verifikasi</button>
            @elseif($proposals->status == "sudah")
            	@if($proposals->dana_terkirim == $proposals->dana_terpakai)
	              <button style="width: 49%" onclick="kirim_dana('{{$proposals->id}}','{{$proposals->sekolah->no_rekening}}','{{$proposals->sekolah->atas_nama}}','{{$proposals->sekolah->nama_bank}}','{{$proposals->dana_total}}','{{$proposals->dana_terkirim}}')" class="btn btn-success">Kirim Dana</button>
	              <button style="width: 49%" onclick="selesai('{{$proposals->id}}')" class="btn btn-primary">Selesai</button>
            	@else
	              <button style="width: 49%" onclick="popup()" class="btn btn-success">Kirim Dana</button>
	              <button style="width: 49%" onclick="selesai('{{$proposals->id}}')" class="btn btn-primary">Selesai</button>
	              @endif
            @elseif($proposals->status == "sudah" && $proposals->dana_terpakai < $proposals->dana_terkirim)
              <button style="width: 100%" onclick="selesai('{{$proposals->id}}')" class="btn btn-primary">Selesai</button>
            @elseif($proposals->status == "unvalid")
              <a href="{{url('kasi/daftar_unvalid')}}" style="width: 100%" class="btn btn-warning">Back</a>
            @elseif($proposals->status == "tolak")
              <a href="{{url('kasi/daftar_tolak')}}" style="width: 100%" class="btn btn-warning">Back</a>
            @elseif($proposals->status == "forward")
              <a href="{{url('kasi/daftar_pending')}}" style="width: 100%" class="btn btn-warning">Back</a>
            @elseif($proposals->status == "selesai")
              <a href="{{url('kasi/daftar_selesai')}}" style="width: 100%" class="btn btn-warning">Back</a>
            @else
              <button style="width: 49%" onclick="tolak('{{$proposals->id}}')" class="btn btn-danger">Reject Proposal</button>
              <button style="width: 49%" onclick="terima('{{$proposals->id}}','{{$proposals->dana_diajukan}}')" class="btn btn-success">Approve Proposal</button>
            @endif
			
			
			<h2 class="text-semibold text-dark text-uppercase mb-md mt-lg">{{$proposals->judul}}</h2>
			<h4>{{$proposals->deskripsi}}</h4>
			  @if($proposals->status == 'tolak')
	          <p><b>Status: </b>proposal di tolak</p>
	          @elseif($proposals->status == 'sudah')
	            <p><b>Status: </b>proposal sudah di setujui</p>
	          @elseif($proposals->status == 'belum')
	            <p><b>Status: </b>proposal belum di periksa
	          @elseif($proposals->status == 'forward' || $proposals->status == 'verifikasi' || $proposals->status == 'unvalid')
	            <p><b>Status: </b>proposal dalam proses verifikasi
	          @endif
			
			<div class="row">
				<div class="col-md-4 col-lg-4 col-xl-3">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tanggal Di ajukan</h4>
										<h4 class="title"><b>{{$proposals->created_at}}</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-home"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Bangunan Rusak</h4>
										<h4 class="title"><b>{{$proposals->jumlah_rusak}} bangunan

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_jumlah_rusak == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-tachometer"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tingkat Kerusakan</h4>
										<h4 class="title"><b>{{$proposals->tingkat_rusak}}

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_tingkat_rusak == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<a href="{{url('proposal/dokumen/'.$proposals->dokumen)}}" style="color: white" download>
					<section class="panel panel-featured-left panel-featured-primary bg-primary">
						<div class="panel-body bg-primary">
							<div class="widget-summary widget-summary-sm bg-primary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-cloud-download"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h1 class="title"><b>Download File <br> Proposal

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_dokumen == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h1>
									</div>
								</div>
							</div>
						</div>
					</section>
					</a>
					<a href="{{url('proposal/pengantar_dinas/'.$proposals->pengantar_dinas)}}" style="color: white" download>
					<section class="panel panel-featured-left panel-featured-primary bg-primary">
						<div class="panel-body bg-primary">
							<div class="widget-summary widget-summary-sm bg-primary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-cloud-download"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h1 class="title"><b>Download Surat <br> Pengantar Dinas
										</b></h1>
									</div>
								</div>
							</div>
						</div>
					</section>
					</a>
					<a href="{{url('proposal/surat_permohonan/'.$proposals->surat_permohonan)}}" style="color: white" download>
					<section class="panel panel-featured-left panel-featured-primary bg-primary">
						<div class="panel-body bg-primary">
							<div class="widget-summary widget-summary-sm bg-primary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-cloud-download"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h1 class="title"><b>Download Surat <br> Permohonan
										</b></h1>
									</div>
								</div>
							</div>
						</div>
					</section>
					</a>
					@if($proposals->status == "sudah")
	                    @if($dana)
	                    	<a class="float-right" href="{{url('penggunaan_dana/'.$dana->dokumen)}}" download>
	                    		<section class="panel panel-featured-left panel-featured-primary bg-primary">
									<div class="panel-body bg-primary">
										<div class="widget-summary widget-summary-sm bg-primary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-cloud-download"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h1 class="title"><b>Download Detail <br> Pengeluaran</b></h1>
												</div>
											</div>
										</div>
									</div>
								</section>
	                    	</a>
	                    @endif
	                @endif
				</div>
				<div class="col-md-4 col-lg-4 col-xl-3">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Siswa Perkelas</h4>
										<h4 class="title"><b>{{$proposals->rombongan_belajar}} Orang

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_rombongan_belajar == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-group"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Semua Siswa</h4>
										<h4 class="title"><b>{{$proposals->jumlah_siswa}} Orang

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_jumlah_siswa == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-cubes"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tingkat Sekolah</h4>
										<h4 class="title"><b>{{$proposals->sekolah->tingkat}}

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_tingkat_sekolah == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-building"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jenis Sekolah</h4>
										<h4 class="title"><b>Sekolah {{$proposals->jenis_sekolah}}

				                        @if($proposals->status == "verifikasi")
					                        @if($proposals->status_jenis_sekolah == "on")
												<span class="text-primary">(Data Valid)</span>
											@else
												<span class="text-danger">(Tidak Valid)</span>
											@endif
										@endif
										</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>

						@if($proposals->status == "sudah")
		                    @if($dana)
		                    	<a class="float-right" href="{{url('proposal/dokumen_penggunaan_dana/'.$dana->dokumen_persetujuan)}}" download>
		                    		<section class="panel panel-featured-left panel-featured-primary bg-primary">
										<div class="panel-body bg-primary">
											<div class="widget-summary widget-summary-sm bg-primary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-cloud-download"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h1 class="title"><b>Download Dokumen <br> Laporan Pengeluaran</b></h1>
													</div>
												</div>
											</div>
										</div>
									</section>
		                    	</a>
		                    @endif
		                @endif

                      @if($proposals->status == 'forward')
	                      <section class="panel panel-featured-left panel-featured-primary">
							<div class="panel-body">
								<div class="widget-summary widget-summary-sm">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-primary">
											<i class="fa fa-building"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Tanggal Mulai Verifikasi</h4>
											<h4 class="title"><b>{{$proposals->tgl_mulai_verifikasi}}</b></h4>
										</div>
									</div>
								</div>
							</div>
						</section>
                      @endif
				</div>
				<div class="col-md-4 col-lg-4 col-xl-3">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-arrow-circle-o-up"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Jumlah Dana Diajukan</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_diajukan}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-dollar"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total Bantuan</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_total}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-arrow-circle-o-down"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Dana Diturunkan sementara</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_terkirim}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary widget-summary-sm">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-money"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Dana terpakai</h4>
										<h4 class="title"><b>Rp {{$proposals->dana_terpakai}},-</b></h4>
									</div>
								</div>
							</div>
						</div>
					</section>

                      @if($proposals->status == 'forward')
	                      <section class="panel panel-featured-left panel-featured-primary">
							<div class="panel-body">
								<div class="widget-summary widget-summary-sm">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-primary">
											<i class="fa fa-building"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Tanggal Akhir Verifikasi</h4>
											<h4 class="title"><b>{{$proposals->tgl_akhir_verifikasi}}</b></h4>
										</div>
									</div>
								</div>
							</div>
						</section>
                      @endif
				</div>
			</div>

		</div>

		<div class="panel-body">
			<div class="title">
				<h3> Galeri Kerusakan
					@if($proposals->status == "verifikasi")
	                    @if($proposals->status_foto == "on")
							<span class="text-primary">(Data Valid)</span>
						@else
							<span class="text-danger">(Tidak Valid)</span>
						@endif
					@endif
				</h3>
			</div>
			<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
				
	          @foreach($galeri as $fotos)
				<div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="{{ url('proposal/foto/'.$fotos)}}">
								<img src="{{ url('proposal/foto/'.$fotos)}}" class="img-responsive" alt="Project">
							</a>
						</div>
					</div>
				</div>
				@endforeach

			</div>

		</div>
				
	</section>
	<!-- end: page -->

	<div class="section">
        <!-- Modal -->
        <div class="modal fade" id="forward">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Permintaan</h4>
              </div>
              <div class="modal-body">
                
                <form name="form1" action="{{ url('kasi/forward')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id">
                  <p>Kirim Surat Perintah Kepada Tim Verifikasi untuk check validasi berkas ?</p>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai_verifikasi" required>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Berakhir</label>
                        <input type="date" class="form-control" name="tgl_akhir_verifikasi" required>
                      </div>
                      <div class="form-group">
                        <label>Berkas perintah verifikasi</label>
                          <div class="custom-file">
                            <input name="dokumen_forward" type="file" class="custom-file-input" required>
													</div>
												
											</div>
											@if($errors->has('dokumen_forward'))
											<div class="alert alert-danger" role="alert"> {{$errors->first('dokumen_forward')}} </div>
										@endif
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="tolak">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tolak Berkas</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" action="{{ url('kasi/tolak')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                      <p>Apakah anda yakin ingin menolak proposal ini ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="modal_terima">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Terima Berkas</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_terima" action="{{ url('kasi/terima')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id">
                  </div>
                      <p>Apakah anda yakin menerima laporan ini ? jika ya, masukan total dana yang akan di kirim dan tekan tombol Ya</p>

                      <div class="form-group">
                        <label>Dana Yang di ajukan</label>
                        <input type="text" name="dana_diajukan" class="form-control" placeholder="ex: 1000000" disabled>
                      </div>
                      <div class="form-group">
                        <label>Total Dana Yang akan dikirimkan</label>
                      <input type="text" name="dana_total" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="{{old('dana_diajukan')}}" class="form-control" placeholder="ex: 1000000" required>
                      </div>
                      <div class="form-group">
                        <label>Berkas penerimaan proposal</label>
                          <div class="custom-file">
                            <input name="dokumen_terima" type="file" class="custom-file-input" required>
                          </div>
                      </div>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="modal_kirim_dana">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Kirim Dana</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_kirim_dana" action="{{ url('kasi/pengiriman_dana')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>No. Rekening</label>
                          <input type="text" class="form-control" name="no_rekening" disabled>
                        </div>
                        <div class="form-group">
                          <label>Atas Nama</label>
                          <input type="text" class="form-control" name="atas_nama" disabled>
                        </div>
                        <div class="form-group">
                          <label>Bank Tujuan</label>
                          <input type="text" class="form-control" name="nama_bank" disabled>
                        </div>
                        <div class="form-group">
                          <label>Jumlah</label>
                          <input type="text" class="form-control" name="jumlah" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="{{old('dana_diajukan')}}" required>
                        </div>
                        <div class="form-group">
                          <label>Foto Bukti Pengiriman</label>
                            <div class="custom-file">
                              <input name="foto" type="file" class="custom-file-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Berkas Pengiriman dana</label>
                            <div class="custom-file">
                              <input name="dokumen" type="file" class="custom-file-input" required>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="selesai">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Proposal Selesai</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_selesai" action="{{ url('kasi/selesai')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                      <p>Apakah proposal ini sudah selesai ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Proposal Selesai</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_selesai" action="" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                      <p>Sekolah Belum mengupdate penggunaan dana</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tutup">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--section-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>

        function forward(id)
            {
              document.forms['form1']['id'].value=id;
                $('#forward').modal('show');
            }

        function tolak(id)
            { 
              document.forms['form2']['id'].value=id;
              $('#tolak').modal('show');
            }

        function terima(id,dana_diajukan)
            {
              document.forms['form_terima']['id'].value=id;
              document.forms['form_terima']['dana_diajukan'].value="Rp "+dana_diajukan+",-";
                $('#modal_terima').modal('show');
            }

        function kirim_dana(id,no_rekening,atas_nama,nama_bank,dana_total,dana_terkirim)
            {
              var selisih = dana_total - dana_terkirim;
              document.forms['form_kirim_dana']['id'].value=id;
              document.forms['form_kirim_dana']['no_rekening'].value=no_rekening;
              document.forms['form_kirim_dana']['atas_nama'].value=atas_nama;
              document.forms['form_kirim_dana']['nama_bank'].value=nama_bank;
                $('#modal_kirim_dana').modal('show');
            }
        function selesai(id)
            {
              document.forms['form_selesai']['id'].value=id;
                $('#selesai').modal('show');
            }
        function popup()
            {
                $('#modal').modal('show');
            }
    </script>

@endsection
