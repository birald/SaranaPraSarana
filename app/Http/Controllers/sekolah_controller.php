<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\proposal;
use App\sekolah;
use PDF;
use \Carbon\Carbon;
use App\penggunaan_dana;
use App\pengiriman_dana;
use App\notifikasi;
use App\log_aktivitas;

class sekolah_controller extends Controller
{
    public function index(){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        // mengambil data proposal
        $proposals = proposal::where('sekolah_id',auth()->guard('sekolah')->id())->orderBy('updated_at','DESC')->get();
        return view('sekolah/index',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }

    public function daftar_terima(){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        $data = [
            'sekolah_id' => auth()->guard('sekolah')->id(),
            'status' => 'sudah'
        ];
        $proposals = proposal::where($data)->orderBy('updated_at','DESC')->get();
        return view('sekolah/daftar_terima',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function show_proposal($id){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        $proposals = proposal::where('id',$id)->first();
        $galeri = json_decode($proposals->galeri,true);
        return view('sekolah/show_proposal',compact('proposals', 'galeri', 'top_notifikasis','jumlah_notifikasi'));
    }
    public function show_proposal_acc($id){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        $proposals = proposal::where('id',$id)->first();
        $galeri = json_decode($proposals->galeri,true);
        return view('sekolah/show_proposal_acc',compact('proposals', 'galeri','top_notifikasis','jumlah_notifikasi'));
    }
    public function update_dana($id){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        $proposals = proposal::where('id',$id)->first();
        return view('sekolah/update_dana',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function tambah_proposal_sekolah(){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        return view('sekolah/tambah_proposal_sekolah',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function show_notifikasi($id,$laporan_id){
        $data = ['status' => 'sudah'];
        notifikasi::where('id',$id)->update($data);
        $notifikasi=notifikasi::where('id',$id)->first();
        if($notifikasi->proposal->status == "sudah"){
            return redirect(url('sekolah/show_proposal_acc/'.$laporan_id));
        }else{
            return redirect(url('sekolah/show_proposal/'.$laporan_id));
        }
    }

    // notif
    public function all_notifikasi(){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        $notifikasis = notifikasi::where('tujuan',auth()->guard('sekolah')->id())->orderby('created_at','DESC')->get();
        return view('sekolah/all_notifikasi',compact('notifikasis','jumlah_notifikasi', 'top_notifikasis')); 
    }

    public function log_aktivitas($id){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => auth()->guard('sekolah')->id(),
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        
        $log_aktivitas = log_aktivitas::where('proposal_id',$id)->get();
        $pengiriman_dana = pengiriman_dana::get();
        $penggunaan_dana = penggunaan_dana::get();
        return view('sekolah/log_aktivitas',compact('log_aktivitas','pengiriman_dana','penggunaan_dana','jumlah_notifikasi', 'top_notifikasis'));
    }

    public function input_update_dana(Request $Request){
        $validator = $this->validate($Request,[
            'dokumen_persetujuan' => 'required|file|max:2000',
            'total' => 'required'
        ]);
        $barang = $Request->barang;
        $harga = $Request->harga;
        $no = 1;
        $total = $Request->total;

        $proposal = proposal::where('id',$Request->id)->first();

        $terkirim = preg_replace('/[.]/', '', $proposal->dana_terkirim);
        $terpakai = preg_replace('/[.]/', '', $proposal->dana_terpakai);
        $selisih = $terkirim-$terpakai;
        $total = preg_replace('/[.]/', '', $Request->total);

        if($total>$selisih ){
            $notif = [
                'message' => 'gagal, total penggunaan besar dari dana terkirim kasi',
                'alert-type' => 'error'
            ];
            return back()->with($notif);
        }else{
            $sekarang = Carbon::now()->format('d-m-y h-m-s');
            $nama_file = 'invoice_'.$sekarang.'.pdf';
            
            $pdf = PDF::loadView('master', compact('barang','harga','no','total'));
            $pdf->save('penggunaan_dana/'.$nama_file);

            $dana_terpakai_updated_ = $terpakai+$total;
            $dana_terpakai_updated = number_format($dana_terpakai_updated_,0,'','.');

            $dokumen_persetujuan = $Request->dokumen_persetujuan;
            $namaDokumen = $dokumen_persetujuan->getClientOriginalName();

            $data_proposal =[
                'dana_terpakai' => $dana_terpakai_updated
            ];
            $data_penggunaan_dana =[
                'proposal_id' => $Request->id,
                'jumlah' => $Request->total,
                'dokumen' => $nama_file,
                'dokumen_persetujuan' => $namaDokumen
            ];

            $dataNotif = [
                'proposal_id' => $proposal->id,
                'dari' => auth()->guard('sekolah')->id(),
                'tujuan' => 'kasi',
                'deskripsi' => 'update_dana',
                'tingkat' => auth()->guard('sekolah')->user()->tingkat,
                'status' => 'belum'
            ];

            $deskripsi = "sekolah mengupdate pemakaian dana bantuan sebesar Rp $total ,-";

            $dokumen_persetujuan->move('proposal/dokumen_penggunaan_dana',$namaDokumen);
            notifikasi::create($dataNotif);
            proposal::where('id',$Request->id)->update($data_proposal);
            penggunaan_dana::create($data_penggunaan_dana);
            $data = penggunaan_dana::orderby('id','desc')->first();
            $dataLog = [
                'proposal_id' => $Request->id,
                'deskripsi' => 'update penggunaan dana oleh sekolah',
                'dari' => 'sekolah',
                'data_id' => $data->id
            ];
            log_aktivitas::create($dataLog);

            $notif = [
                'message' => 'Saved Data Success',
                'alert-type' => 'success'
            ];

            return redirect(url('sekolah/show_proposal_acc/'.$Request->id))->with($notif);
        }
       

    }
    public function edit_proposal_sekolah(Request $Request){
        $validator = Validator::make($Request->all(),[
            'dokumen' => 'required|mimes:doc,docx,pdf|file|max:2000',
            'surat_permohonan' => 'required|mimes:doc,docx,pdf|file|max:2000',
            'pengantar_dinas' => 'required|mimes:doc,docx,pdf|file|max:2000'
        ]);
         if($validator->fails()){
            $notif = [
                'message' => 'Ubah Proposal Gagal',
                'alert-type' => 'error'
            ];
    
            return redirect(url('sekolah'))->with($notif);
         }else{
        $survei = 0 ;
        
        $jmlh_rusak = $this->nilaiJumlahRusak($Request->jumlah_rusak);
        
        $tngkt_rusak = $this->nilaiTingkatRusak($Request->tingkat_rusak);
        
        $jmlh_siswa = $this->nilaiJumlahSiswa($Request->jumlah_siswa);
        
        $rombongan_bljr = $this->nilaiRombonganBelajar($Request->rombongan_belajar);

        // $tngkt_sekolah = $this->nilaiTingkatSekolah($Request->tingkat_sekolah);

        // $jns_sekolah = $this->nilaiJenisSekolah($Request->jenis_sekolah);

        $survei = (((30*$jmlh_rusak)+(40*$tngkt_rusak)+(20*$jmlh_siswa)+(10*$rombongan_bljr))/100);

        if ($Request->foto) {
            foreach($Request->file('foto') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('proposal/foto', $name);  
                $data[] = $name;  
            }

             $galeri=json_encode($data);
             $foto = $data[0];
             $updateFoto = [
                'foto' => $foto,
                'galeri' => $galeri
            ];
            proposal::where('id',$Request->id)->update($updateFoto);
        }
        if ($Request->dokumen) {
            $dokumen = $Request->dokumen;
            $namaDokumen = $dokumen->getClientOriginalName();
            $updateDokumen = [
                'dokumen' => $namaDokumen
            ];
            $dokumen->move('proposal/dokumen',$namaDokumen);
            proposal::where('id',$Request->id)->update($updateDokumen);
        }
        if ($Request->pengantar_dinas) {
            $pengantar_dinas = $Request->pengantar_dinas;
            $namaPengantar = $pengantar_dinas->getClientOriginalName();
            $updatePengantar = [
                'pengantar_dinas' => $namaPengantar
            ];
            $pengantar_dinas->move('proposal/pengantar_dinas',$namaPengantar);
            proposal::where('id',$Request->id)->update($updatePengantar);
        }
        if ($Request->surat_permohonan) {
            $surat_permohonan = $Request->surat_permohonan;
            $namaPermohonan = $surat_permohonan->getClientOriginalName();
            $updatePermohonan = [
                'surat_permohonan' => $namaPermohonan
            ];
            $surat_permohonan->move('proposal/surat_permohonan',$namaPermohonan);
            proposal::where('id',$Request->id)->update($updatePermohonan);
        }
        $data = [
            'judul' => $Request->judul,
            'jumlah_rusak' => $Request->jumlah_rusak,
            'tingkat_rusak' => $Request->tingkat_rusak,
            'jumlah_siswa' => $Request->jumlah_siswa,
            'rombongan_belajar' => $Request->rombongan_belajar,
            'dana_diajukan' => $Request->dana_diajukan,
            'jenis_sekolah' => $Request->jenis_sekolah,
            'tingkat_sekolah' => auth()->guard('sekolah')->user()->tingkat,
            'rate' => $survei
        ];

        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => auth()->guard('sekolah')->id(),
            'tujuan' => 'kasi',
            'deskripsi' => 'edit_proposal',
            'tingkat' => auth()->guard('sekolah')->user()->tingkat,
            'status' => 'belum'
        ];
        notifikasi::create($dataNotif);

        $proposal = proposal::where('id',$Request->id)->update($data);
        $notif = [
            'message' => 'Ubah Proposal Berhasil',
            'alert-type' => 'success'
        ];
    
        return back()->with($notif);
    }}
    function hapus_proposal(Request $Request){
        $proposal = proposal::where('id',$Request->id)->delete();

        $notif = [
            'message' => 'Hapus Data Success',
            'alert-type' => 'success'
        ];

        return redirect(url('sekolah'))->with($notif);
    }
    public function input_proposal_sekolah(Request $Request){

        $validator = $this->validate($Request,[
            'judul' => 'required',
            'deskripsi' => 'required|max:220',
            'dokumen' => 'required|mimes:doc,docx,pdf|file|max:2000',
            'jumlah_rusak' => 'required',
            'jumlah_siswa' => 'required',
            'rombongan_belajar' => 'required',
            'dana_diajukan' => 'required',
            'pengantar_dinas' => 'required|mimes:doc,docx,pdf|file|max:2000',
            'surat_permohonan' => 'required|mimes:doc,docx,pdf|file|max:2000',
        ]); 

    	// variabel untuk nilai rating
        $survei = 0 ;
        
        $jmlh_rusak = $this->nilaiJumlahRusak($Request->jumlah_rusak);
        
        $tngkt_rusak = $this->nilaiTingkatRusak($Request->tingkat_rusak);
        
        $jmlh_siswa = $this->nilaiJumlahSiswa($Request->jumlah_siswa);
        
        $rombongan_bljr = $this->nilaiRombonganBelajar($Request->rombongan_belajar);

        // $tngkt_sekolah = $this->nilaiTingkatSekolah(auth()->guard('sekolah')->user()->tingkat);

        // $jns_sekolah = $this->nilaiJenisSekolah($Request->jenis_sekolah);


        // perhitungan akhir hasil rating, 15% dari jumlah rusak, 15% dari tingkat rusak, 15% dari jumlah siswa, 15% dari jarak sekolah, dan seterus nya.
        $survei = (((30*$jmlh_rusak)+(40*$tngkt_rusak)+(20*$jmlh_siswa)+(10*$rombongan_bljr))/100);

            foreach($Request->file('foto') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('proposal/foto', $name);  
                $data[] = $name;  
            }

         $galeri=json_encode($data);
         $foto = $data[0];

        $dokumen = $Request->dokumen;
        $namaDokumen = $dokumen->getClientOriginalName();

        $pengantar_dinas = $Request->pengantar_dinas;
        $namaPengantar = $pengantar_dinas->getClientOriginalName();

        $surat_permohonan = $Request->surat_permohonan;
        $namaPermohonan = $surat_permohonan->getClientOriginalName();
        
        
        $data = [
            'sekolah_id' => auth()->guard('sekolah')->id(),
            'judul' => $Request->judul,
            'deskripsi' => $Request->deskripsi,
            'dokumen' => $namaDokumen,
            'pengantar_dinas' => $namaPengantar,
            'surat_permohonan' => $namaPermohonan,
            'foto' => $foto,
            'galeri' => $galeri,
            'status' => 'belum',
            'status_kerja' => '0',
            'dana_diajukan' => $Request->dana_diajukan,
            'jumlah_rusak' => $Request->jumlah_rusak,
            'tingkat_rusak' => $Request->tingkat_rusak,
            'jumlah_siswa' => $Request->jumlah_siswa,
            'rombongan_belajar' => $Request->rombongan_belajar,
            'jenis_sekolah' => $Request->jenis_sekolah,
            'tingkat_sekolah' => auth()->guard('sekolah')->user()->tingkat,
            'rate' => $survei
        ];

        $dokumen->move('proposal/dokumen',$namaDokumen);
        $pengantar_dinas->move('proposal/pengantar_dinas',$namaPengantar);
        $surat_permohonan->move('proposal/surat_permohonan',$namaPermohonan);

        $proposal = proposal::create($data);

        $last = proposal::orderby('id','DESC')->take(1)->first();

        $dataNotif = [
            'proposal_id' => $last->id,
            'dari' => auth()->guard('sekolah')->id(),
            'tujuan' => 'kasi',
            'deskripsi' => 'buat_proposal',
            'tingkat' => auth()->guard('sekolah')->user()->tingkat,
            'status' => 'belum'
        ];
        notifikasi::create($dataNotif);
        
       $notif = [
            'message' => 'Buat Proposal Berhasil',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    public function nilaiJumlahRusak($jumlah){

        // variabel untuk menampung hasil hitungan jumlah rusak
        $jmlh_rusak = 0;

        // jika jumlah rusak nya lebih dari 10 buah, maka nilai jumlah rusak nya 100
        if ($jumlah > 5) {
            $jmlh_rusak = 100;

        // jika jumlah rusak nya antara di atas 5 dan kurang dari 10, maka nilai jumlah rusak nya 66
        }else if ($jumlah > 3) {
            $jmlh_rusak = 66;

        // jika jumlah rusak nya antara 1 dan kurang dari 5, maka nilai jumlah rusak nya 33
        }else if ($jumlah >= 1) {
            $jmlh_rusak = 33;
        }
        // contoh, misal jumlah gedung rusak ada 9 buah, maka nilai jumlah_rusak ini 66. dst. 
        return $jmlh_rusak;

    }
    public function nilaiTingkatRusak($tingkat){

        $tngkt_rusak = 0;
        if ($tingkat == 'berat') {
            $tngkt_rusak = 100;
        }else if ($tingkat == 'sedang') {
            $tngkt_rusak = 66;
        }else if ($tingkat == 'ringan') {
            $tngkt_rusak = 33;
        }
        return $tngkt_rusak;      
    }
    public function nilaiJumlahSiswa($jumlah){

        $jmlh_siswa = 0;
        if ($jumlah > 500) {
            $jmlh_siswa = 100;
        }else if ($jumlah > 200) {
            $jmlh_siswa = 66;
        }else if ($jumlah >= 1) {
            $jmlh_siswa = 33;
        }
        return $jmlh_siswa;
    }
    public function nilaiRombonganBelajar($rombel){

       $rombongan_bljr = 0;
        if ($rombel > 50) {
            $rombongan_bljr = 100;
        }else if ($rombel > 35) {
            $rombongan_bljr = 66;
        }else if ($rombel >= 1) {
            $rombongan_bljr = 33;
        }
        return $rombongan_bljr; 
    }
    // public function nilaiTingkatSekolah($tingkat){

    //     $tngkt_sekolah = 0;
    //     if ($tingkat == 'sma') {
    //         $tngkt_sekolah = 100;
    //     }else if ($tingkat == 'smp') {
    //         $tngkt_sekolah = 66;
    //     }else if ($tingkat == 'sd') {
    //         $tngkt_sekolah = 33;
    //     }
    //     return $tngkt_sekolah;
    // }
    // public function nilaiJenisSekolah($jenis){
    //     $jns_sekolah = 0;
    //     if ($jenis == 'negeri') {
    //         $jns_sekolah = 100;
    //     }else if ($jenis == 'swasta') {
    //         $jns_sekolah = 50;
    //     }
    //     return $jns_sekolah;
    // }
}
