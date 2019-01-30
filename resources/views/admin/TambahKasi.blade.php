@extends('admin/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Tambah Daftar Kasi</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

			<div class="panel-body">
				<form role="form" action="{{ url('admin/inputKasi')}}" method="post">
          <div class="card-body">
            <div class="form-group">
              <select name="tingkat" class="form-control">
                <option value="paud">PAUD</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputPassword1" name="nip" placeholder="Nip" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Alamat" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputPassword1" name="no_hp" placeholder="No. HP" required>
            </div>
            {{csrf_field()}}
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
			</div>
				
	</section>
	<!-- end: page -->

@endsection
