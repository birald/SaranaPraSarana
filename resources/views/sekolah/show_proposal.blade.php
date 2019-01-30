@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Detail Data Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

		<div class="panel-body">
		@if($proposals->status == "selesai" || $proposals->status == "sudah")
		    <button style="width: 49%" onclick="sudah()" class="btn btn-warning">Ubah</button>

		    <button style="width: 49%" onclick="sudah()" class="btn btn-danger">Hapus</button>
	    @elseif($proposals->status == 'tolak')
		    <button style="width: 49%" onclick="tolak()" class="btn btn-warning">Ubah</button>

		    <button style="width: 49%" onclick="tolak()" class="btn btn-danger">Hapus</button>
	    @elseif($proposals->status == 'verifikasi' || $proposals->status == 'forward' || $proposals->status == 'unvalid')
		    <button style="width: 49%" onclick="verifikasi()" class="btn btn-warning">Ubah</button>

		    <button style="width: 49%" onclick="verifikasi()" class="btn btn-danger">Hapus</button>
	    @else
		      <button style="width: 49%" onclick="edit_proposal('{{$proposals->id}}','{{$proposals->judul}}','{{$proposals->deskripsi}}','{{$proposals->jumlah_rusak}}','{{$proposals->tingkat_rusak}}','{{$proposals->jumlah_siswa}}','{{$proposals->rombongan_belajar}}','{{$proposals->dana_diajukan}}','{{$proposals->jenis_sekolah}}')" class="btn btn-success">Ubah</button>
		      <button style="width: 49%" onclick="hapus_proposal('{{$proposals->id}}')" class="btn btn-danger">Hapus</button>
	    @endif
			
			
			<h2 class="text-semibold text-dark text-uppercase mb-md mt-lg">{{$proposals->judul}}</h2>
			<h4>{{$proposals->deskripsi}}</h4>
			  @if($proposals->status == 'tolak')
	          <p><b>Status: </b>proposal di tolak</p>
	          @elseif($proposals->status == 'sudah')
	            <p><b>Status: </b>proposal sudah di setujui</p>
	          @elseif($proposals->status == 'belum')
	            <p><b>Status: </b>proposal belum di periksa pihak dinas </p>
	          @elseif($proposals->status == 'forward' || $proposals->status == 'verifikasi' || $proposals->status == 'unvalid')
	            <p><b>Status: </b>proposal dalam proses verifikasi </p>
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
										<h4 class="title"><b>{{$proposals->jumlah_rusak}} bangunan</b></h4>
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
										<h4 class="title"><b>{{$proposals->tingkat_rusak}}</b></h4>
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
										<h1class="title"><b>Download File <br> Proposal</b></h1>
									</div>
								</div>
							</div>
						</div>
					</section>
					</a>
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
										<h4 class="title"><b>{{$proposals->rombongan_belajar}} Orang</b></h4>
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
										<h4 class="title"><b>{{$proposals->jumlah_siswa}} Orang</b></h4>
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
				</div>
				<div class="col-md-4 col-lg-4 col-xl-3">
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
				</div>
			</div>

		</div>

		<div class="panel-body">
			<div class="title">
				<h3> Galeri Kerusakan</h3>
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

	<!-- pop up edit data -->
    <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="edit_proposal">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 10px;width: 700px">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Masukkan Data proposal</h4>
              </div>
              <div class="modal-body">
                <form name="form1" action="{{ url('sekolah/edit_proposal_sekolah')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id">
                  
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('judul')}}" name="judul">
                      </div>
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea value="{{old('deskripsi')}}" class="form-control" id="exampleInputPassword1" name="deskripsi" cols="30" rows="4" placeholder="max: 220 huruf"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Jumlah Rusak</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('jumlah_rusak')}}" name="jumlah_rusak">
                      </div>
                      <div class="form-group">
                        <label>Jumlah Siswa</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('jumlah_siswa')}}" name="jumlah_siswa">
                      </div>
                      <div class="form-group">
                        <label>Rombongan Belajar</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('rombongan_belajar')}}" name="rombongan_belajar">
                      </div>
                      <div class="form-group">
                        <label>Dana Diajukan</label>
                        <input type="text" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="{{old('dana_diajukan')}}" value="{{old('dana_diajukan')}}" name="dana_diajukan">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tingkat Rusak</label>
                        <select class="form-control" name="tingkat_rusak">
                          <option value="ringan">Ringan</option>
                          <option value="sedang">Sedang</option>
                          <option value="berat">Berat</option>
                        </select>                   
                      </div>
                      <div class="form-group">
                        <label>Jenis Sekolah</label>
                        <select class="form-control" name="jenis_sekolah">
                          <option value="negeri">NEGERI</option>
                          <option value="swasta">SWASTA</option>
                        </select>                   
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Dokumen</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="dokumen" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Pilih File Proposal</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Pilih File Surat Pengantar Dinas</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="pengantar_dinas" type="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Pilih File Surat Permohonan</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="surat_permohonan" type="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group control-group increment" >
                        <input type="file" name="foto[]" class="form-control">
                        <div class="input-group-btn"> 
                          <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                      </div>
                      <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                          <input type="file" name="foto[]" class="form-control">
                          <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="SIMPAN">
                </div>
                  <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->


     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="hapus_proposal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Hapus Datas</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" action="{{ url('sekolah/hapus_proposal')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                      <p>Apakah anda yakin ingin menghapus proposal ini ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->


     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="sudah">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                    <p>proposal ini sudah di selesai, tidak bisa di edit dan di hapus</p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Tutup">
                    </div>
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="tolak">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                    <p>proposal ini sudah di tolak pihak dinas, tidak bisa di edit dan di hapus</p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Tutup">
                    </div>
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->

     <div class="section">
        <!-- Modal -->
        <div class="modal fade" id="verifikasi">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
              </div>
              <div class="modal-body">
                
                <form name="form2" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                    <p>proposal ini sedang proses verifikasi pihak dinas, tidak bisa di edit dan di hapus</p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Tutup">
                    </div>
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>

        function edit_proposal(id,judul,deskripsi,jumlah_rusak,tingkat_rusak,jumlah_siswa,rombongan_belajar,dana_diajukan,jenis_sekolah)
            {
              document.forms['form1']['id'].value=id;
              document.forms['form1']['judul'].value=judul;
              document.forms['form1']['deskripsi'].value=deskripsi;
              document.forms['form1']['jumlah_rusak'].value=jumlah_rusak;
              document.forms['form1']['tingkat_rusak'].value=tingkat_rusak;
              document.forms['form1']['jumlah_siswa'].value=jumlah_siswa;
              document.forms['form1']['rombongan_belajar'].value=rombongan_belajar;
              document.forms['form1']['dana_diajukan'].value=dana_diajukan;
              document.forms['form1']['jenis_sekolah'].value=jenis_sekolah;
                $('#edit_proposal').modal('show');
            }

        function hapus_proposal(id)
            { 
              document.forms['form2']['id'].value=id;
              $('#hapus_proposal').modal('show');
            }
        function sudah()
            {
                $('#sudah').modal('show');
            }

        function tolak()
            {
                $('#tolak').modal('show');
            }

        function verifikasi()
            {
                $('#verifikasi').modal('show');
            }
    </script>
    <script type="text/javascript">

	    $(document).ready(function() {

	      $(".btn-success").click(function(){ 
	          var html = $(".clone").html();
	          $(".increment").after(html);
	      });

	      $("body").on("click",".btn-danger",function(){ 
	          $(this).parents(".control-group").remove();
	      });

	    });

	</script>

@endsection
