@extends('admin/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Daftar Tim Verifikasi</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
                <th>username</th>
                <th>email</th>
                <th>Nip</th>
                <th>HP</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
					</thead>
					<tbody>
						@foreach($timVerifikasis as $timVerifikasi)
              <tr>
                <td>
                  {{$timVerifikasi->username}}
                </td>
                <td>
                  {{$timVerifikasi->email}}
                </td>
                <td>
                  {{$timVerifikasi->nip}}
                </td>
                <td>
                  {{$timVerifikasi->no_hp}}
                </td>
                <td>
                  {{$timVerifikasi->alamat}}
                </td>
                <td>
                  
                  <button onclick="edit_tim_verifikasi('{{$timVerifikasi->id}}','{{$timVerifikasi->username}}','{{$timVerifikasi->email}}','{{$timVerifikasi->nip}}','{{$timVerifikasi->no_hp}}','{{$timVerifikasi->alamat}}')" class="btn btn-warning"><i class="nav-icon fa fa-pencil"></i></button>
                  
                  <button onclick="hapus_tim_verifikasi('{{$timVerifikasi->id}}')" class="btn btn-danger"><i class="nav-icon fa fa-trash-o"></i></button>

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
          <div class="modal fade" id="edit_tim_verifikasi">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding: 10px">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Masukkan Data Laporan</h4>
                </div>
                <div class="modal-body">
                  <form name="form1" action="{{ url('admin/editTimVerifikasi')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Username</label>
                      <div class="col-md-10"><input type="text" name="username" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Email</label>
                      <div class="col-md-10"><input type="email" name="email" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Password</label>
                      <div class="col-md-10"><input type="password" name="password" class="form-control" placeholder="new Password" id="judul"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">NIP</label>
                      <div class="col-md-10"><input type="text" name="nip" class="form-control" placeholder="NIP" id="judul"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">No. HP</label>
                      <div class="col-md-10"><input type="text" name="no_hp" class="form-control" placeholder="NO. HP" id="judul"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Alamat</label>
                      <div class="col-md-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" id="judul"></div>
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
          <div class="modal fade" id="hapus_tim_verifikasi">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form2" action="{{ url('admin/hapusTimVerifikasi')}}" method="post" enctype="multipart/form-data">
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

          function edit_tim_verifikasi(id,username,email,nip,no_hp,alamat)
              {
                document.forms['form1']['id'].value=id;
                document.forms['form1']['username'].value=username;
                document.forms['form1']['email'].value=email;
                document.forms['form1']['nip'].value=nip;
                document.forms['form1']['no_hp'].value=no_hp;
                document.forms['form1']['alamat'].value=alamat;
                  $('#edit_tim_verifikasi').modal('show');
              }
              
          function hapus_tim_verifikasi(id)
            {
                document.forms['form2']['id'].value=id;
                $('#hapus_tim_verifikasi').modal('show');
            }
      </script>




@endsection
