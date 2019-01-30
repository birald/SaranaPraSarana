@extends('sekolah/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">

    <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
             <form name="form1" action="{{ url('sekolah/input_proposal_sekolah')}}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('judul')}}" name="judul" placeholder="Ex : proposal kerusakan gedung">
                        @if($errors->has('judul'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('judul')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea value="{{old('deskripsi')}}" class="form-control" id="exampleInputPassword1" name="deskripsi" cols="30" rows="4" placeholder="max: 220 huruf"></textarea>
                        @if($errors->has('deskripsi'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('deskripsi')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Jumlah Ruangan Rusak</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('jumlah_rusak')}}" name="jumlah_rusak" placeholder="Ex : 12">
                        @if($errors->has('jumlah_rusak'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('jumlah_rusak')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Jumlah Siswa</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('jumlah_siswa')}}" name="jumlah_siswa" placeholder="Ex : 100">
                        @if($errors->has('jumlah_siswa'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('jumlah_siswa')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Rombongan Belajar</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('rombongan_belajar')}}" name="rombongan_belajar" placeholder="(dalam satu kelas)">
                        @if($errors->has('rombongan_belajar'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('rombongan_belajar')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Jumlah Dana yang di Ajukan</label>
                        <input type="text" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="{{old('dana_diajukan')}}" name="dana_diajukan" placeholder="(Ex : 1000000)">
                        @if($errors->has('dana_diajukan'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('dana_diajukan')}} </div>
                        @endif
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
                        @if($errors->has('tingkat_rusak'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('tingkat_rusak')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Jenis Sekolah</label>
                        <select class="form-control" name="jenis_sekolah">
                          <option value="negeri">NEGERI</option>
                          <option value="swasta">SWASTA</option>
                        </select>
                        @if($errors->has('jenis_sekolah'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('jenis_sekolah')}} </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Pilih File Dokumen Proposal</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="dokumen" type="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                            @if($errors->has('dokumen'))
                              <div class="alert alert-danger" role="alert"> {{$errors->first('dokumen')}} </div>
                            @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Pilih File Surat Pengantar Dinas</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="pengantar_dinas" type="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                            @if($errors->has('pengantar_dinas'))
                              <div class="alert alert-danger" role="alert"> {{$errors->first('pengantar_dinas')}} </div>
                            @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Pilih File Surat Permohonan</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="surat_permohonan" type="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                            @if($errors->has('surat_permohonan'))
                              <div class="alert alert-danger" role="alert"> {{$errors->first('surat_permohonan')}} </div>
                            @endif
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
                  <div class="form-group">
                    <input type="checkbox" id="toggle3" checked />
                    <span>Setuju dengan syarat dan ketentuan</span>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="SIMPAN" id="simpan">
                  </div>
                </div>
                  {{csrf_field()}}
              </form>
            </div>
            <!-- /.card -->

          </div>
      </div><!-- /.container-fluid -->
    </section>
	</section>
	<!-- end: page -->

<!-- /.content -->
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

	<script>
	  $('#toggle3').click(function () {
	    //check if checkbox is checked
	    if ($(this).is(':checked')) {
	        
	        $('#simpan').removeAttr('disabled'); //enable input
	        
	    } else {
	        $('#simpan').attr('disabled', true); //disable input
	    }
	});
	</script>
  <script>
  function tandaPemisahTitik(b){
var _minus = false;
if (b<0) _minus = true;
b = b.toString();
b=b.replace(".","");
b=b.replace("-","");
c = "";
panjang = b.length;
j = 0;
for (i = panjang; i > 0; i--){
j = j + 1;
if (((j % 3) == 1) && (j != 1)){
c = b.substr(i-1,1) + "." + c;
} else {
c = b.substr(i-1,1) + c;
}
}
if (_minus) c = "-" + c ;
return c;
}

function numbersonly(ini, e){
if (e.keyCode>=49){
if(e.keyCode<=57){
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
ini.value = tandaPemisahTitik(b);
return false;
}
else if(e.keyCode<=105){
if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
return false; }
}else if (e.keyCode==48){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==95){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==8 || e.keycode==46){
a = ini.value.replace(".","");
b = a.replace(/[^\d]/g,"");
b = b.substr(0,b.length -1);
if (tandaPemisahTitik(b)!=""){
ini.value = tandaPemisahTitik(b);
} else {
ini.value = "";
}

return false;
} else if (e.keyCode==9){
return true;
} else if (e.keyCode==17){
return true;
} else {
//alert (e.keyCode);
return false;
}

}
</script>

@endsection
