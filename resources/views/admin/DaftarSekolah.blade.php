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
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
		                    <th>Nama</th>
		                    <th>NPSN</th>
		                    <th>Alamat</th>
		                    <th>Telepon</th>
		                    <th>Email</th>
		                    <th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sekolahs as $sekolah)
		                  <tr>
		                    <td>
		                      {{$sekolah->nama}}
		                    </td>
		                    <td>
		                      {{$sekolah->npsn}}
		                    </td>
		                    <td>
		                      {{$sekolah->alamat}}
		                    </td>
		                    <td>
		                      {{$sekolah->telepon}}
		                    </td>
		                    <td>
		                      {{$sekolah->email}}
		                    </td>
		                    <td>
		                      
		                      <button onclick="edit_sekolah('{{$sekolah->id}}','{{$sekolah->nama}}','{{$sekolah->tingkat}}','{{$sekolah->npsn}}','{{$sekolah->alamat}}','{{$sekolah->telepon}}','{{$sekolah->email}}','{{$sekolah->no_rekening}}','{{$sekolah->atas_nama}}','{{$sekolah->nama_bank}}')" class="btn btn-warning"><i class="nav-icon fa fa-pencil"></i></button>
		                      
		                      <button onclick="hapus_sekolah('{{$sekolah->id}}')" class="btn btn-danger"><i class="nav-icon fa fa-trash-o"></i></button>

		                    </td>
		                  </tr>
		                  @endforeach
					</tbody>
				</table>
			</div>
				
	</section>
	<!-- end: page -->


	{{-- pop up edit data --}}
      <div class="section">
          <!-- Modal -->
          <div class="modal fade" id="edit_sekolah">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding: 10px">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Masukkan Data Laporan</h4>
                </div>
                <div class="modal-body">
                  <form name="form1" action="{{ url('admin/editSekolah')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Nama</label>
                      <div class="col-md-10"><input type="text" name="nama" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Tingkat</label>
                      <div class="col-md-10">
                        <select name="tingkat" class="form-control">
                          <option value="paud">PAUD</option>
                          <option value="sd">SD</option>
                          <option value="smp">SMP</option>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">NPSN</label>
                      <div class="col-md-10"><input type="text" name="npsn" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">alamat</label>
                      <div class="col-md-10"><input type="text" name="alamat" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">telepon</label>
                      <div class="col-md-10"><input type="text" name="telepon" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">email</label>
                      <div class="col-md-10"><input type="email" name="email" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Password</label>
                      <div class="col-md-10"><input type="password" name="password" class="form-control" id="judul" ></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">No Rekening</label>
                      <div class="col-md-10"><input type="text" class="form-control" id="exampleInputPassword1" name="no_rekening" placeholder="No Rekening" required></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Pemilik rekening</label>
                      <div class="col-md-10"><input type="text" class="form-control" id="exampleInputPassword1" name="atas_nama" placeholder="Nama Pemilik Rekening" required></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Bank</label>
                      <div class="col-md-10"><input type="text" class="form-control" id="exampleInputPassword1" name="nama_bank" placeholder="Nama Bank" required></div>
                    </div>
                    <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
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
          <div class="modal fade" id="hapus_sekolah">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form2" action="{{ url('admin/hapusSekolah')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">

                      <input type="hidden" name="id"></div>
                    <p>Apakah anda yakin ingin menghapus data sekolah ini ?</p>
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



      <!-- Fungsi Untuk menampilkan PopUp -->
      <script>

          function edit_sekolah(id,nama,tingkat,npsn,alamat,telepon,email,no_rekening,atas_nama,nama_bank)
              {
                $('#edit_laporan').modal('show');
                document.forms['form1']['id'].value=id;
                document.forms['form1']['nama'].value=nama;
                document.forms['form1']['tingkat'].value=tingkat;
                document.forms['form1']['npsn'].value=npsn;
                document.forms['form1']['alamat'].value=alamat;
                document.forms['form1']['telepon'].value=telepon;
                document.forms['form1']['email'].value=email;
                document.forms['form1']['no_rekening'].value=no_rekening;
                document.forms['form1']['atas_nama'].value=atas_nama;
                document.forms['form1']['nama_bank'].value=nama_bank;
                  $('#edit_sekolah').modal('show');
              }
              
          function hapus_sekolah(id)
            {
                document.forms['form2']['id'].value=id;
                $('#hapus_sekolah').modal('show');
            }
      </script>

@endsection
