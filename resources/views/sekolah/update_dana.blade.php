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
				<div class="row">
		          <!-- Left col -->
		          <section class="col-lg-12 connectedSortable">
		            <!-- Custom tabs (Charts with tabs)-->
		            <div class="card">
		              <div class="card-header d-flex p-0">
		                <h3 class="card-title p-3">
		                  Form Input Pengeluaran/penggunaan dana
		                </h3>
		              </div><!-- /.card-header -->
		              <div class="card-body text-center" style="width: 100%">
		                <form action="{{ url('sekolah/input_update_dana')}}" method="post" enctype="multipart/form-data">
		                  <input type="hidden" name="id" value="{{$proposals->id}}">
		                  <div class="row increment">
		                    <div class="control-group input-group">
		                      <div class="col col-md-7">
		                        <label>Barang</label>
		                        <input type="text" name="barang[]" class="form-control" placeholder="Nama Barang" required>
		                      </div>
		                      <div class="col col-md-4">
		                        <label>Harga</label>
		                        <input type="text" name="harga[]" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" placeholder="Ex : 10000">
		                      </div>
		                      <div class="col col-md-1">
		                        <label>action</label>
		                        <button class="btn btn-success btn-add" type="button"><i class="glyphicon glyphicon-plus"></i></button>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="row clone hide">
		                    <div class="control-group input-group" style="margin-top: 10px">
		                      <div class="col col-md-7 control-group">
		                        <input type="text" name="barang[]" class="form-control" placeholder="Nama Barang">
		                      </div>
		                      <div class="col col-md-4 control-group">
		                        <input type="text" name="harga[]" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" placeholder="Ex : 10000">
		                      </div>
		                      <div class="col col-md-1 control-group">
		                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i></button>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="input-group" style="margin-top: 10px">
		                    <label>Input Total Pengeluaran  </label>
		                    <input type="text" name="total" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" placeholder="Max : {{number_format(preg_replace('/[.]/', '', $proposals->dana_terkirim)-preg_replace('/[.]/', '', $proposals->dana_terpakai),0,'','.')}}" required>
	                        @if($errors->has('total'))
	                          <div class="alert alert-danger" role="alert"> {{$errors->first('total')}} </div>
	                        @endif
		                  </div>
		                  <br>
		                  <div class="input-group">
		                  	<label for="exampleInputFile">Pilih File Laporan Penggunaan Dana</label>
	                        <div class="input-group">
	                          <div class="custom-file">
	                            <input name="dokumen_persetujuan" type="file" class="custom-file-input" id="exampleInputFile" required="">
		                        @if($errors->has('dokumen_persetujuan'))
		                          <div class="alert alert-danger" role="alert"> {{$errors->first('dokumen_persetujuan')}} </div>
		                        @endif
	                          </div>
	                        </div>
		                  </div>
		                  <input type="submit" value="SIMPAN" class="btn btn-primary" style="margin-top: 10px;width: 100%">
		                  {{csrf_field()}}
		                </form>
		              </div><!-- /.card-body -->
		            </div>
		            <!-- /.card -->
		          </section>
		          <!-- /.Left col -->
		          <!-- right col (We are only adding the ID to make the widgets sortable)-->
		          
		          <!-- right col -->
		        </div>
			</div>
				
	</section>
	<!-- end: page -->

<script type="text/javascript">

      $(document).ready(function() {

        $(".btn-add").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });

      });

  </script>
@endsection
