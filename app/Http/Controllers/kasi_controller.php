<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\proposal;
use App\kasi;
use App\pengiriman_dana;
use App\penggunaan_dana;
use App\notifikasi;
use App\log_aktivitas;
use PDF;

class kasi_controller extends Controller
{
    public function index(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'belum', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderBy('updated_at','DESC')->get();
    	return view('kasi/index',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_pending(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'forward', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderby('updated_at','DESC')->get();
        return view('kasi/daftar_pending',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_verifikasi(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'verifikasi', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderby('updated_at','DESC')->get();
        return view('kasi/daftar_verifikasi',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_unvalid(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'unvalid', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderby('updated_at','DESC')->get();
        return view('kasi/daftar_unvalid',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_terima(){
        // mengambil data notifikasi
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        // mengambil data proposal
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'sudah', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderBy('rate','DESC')->get();
        return view('kasi/daftar_terima',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_selesai(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'selesai', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderBy('rate','DESC')->get();
        return view('kasi/daftar_selesai',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_tolak(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where(['status' => 'tolak', 'tingkat_sekolah' => auth()->guard('kasi')->user()->tingkat])->orderby('updated_at','DESC')->get();
        return view('kasi/daftar_tolak',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function show_proposal($id){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where('id',$id)->first();
        $galeri = json_decode($proposals->galeri,true);
        $dana = penggunaan_dana::where('proposal_id',$id)->orderby('created_at','DESC')->first();
        return view('kasi/show_proposal',compact('proposals','galeri','dana','top_notifikasis','jumlah_notifikasi'));
    }
    // public function galeri($id){
    //     $data_notifikasi = [
    //         'tujuan' => 'kasi',
    //         'tingkat' => auth()->guard('kasi')->user()->tingkat,
    //         'status' => 'belum'
    //     ];
    //     $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
    //     $jumlah_notifikasi = count($top_notifikasis);
    //     $proposals = proposal::where('id',$id)->first();
    //     $galeri = json_decode($proposals->galeri,true);
    //     return view('kasi/galeri',compact('proposals','galeri','top_notifikasis','jumlah_notifikasi'));
    // }
    public function show_notifikasi($id,$laporan_id){
        $data = ['status' => 'sudah'];
        notifikasi::where('id',$id)->update($data);
        return redirect(url('kasi/show_proposal/'.$laporan_id));
    }
    public function all_notifikasi(){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $notifikasis = notifikasi::where('tujuan','kasi')->orderby('created_at','DESC')->get();
        return view('kasi/all_notifikasi',compact('notifikasis','jumlah_notifikasi', 'top_notifikasis')); 
    }
    public function log_aktivitas($id){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $log_aktivitas = log_aktivitas::where('proposal_id',$id)->get();
        $pengiriman_dana = pengiriman_dana::get();
        $penggunaan_dana = penggunaan_dana::get();
        return view('kasi/log_aktivitas',compact('log_aktivitas','pengiriman_dana','penggunaan_dana','jumlah_notifikasi', 'top_notifikasis'));
    }
    public function rekap_data($id){
        $data_notifikasi = [
            'tujuan' => 'kasi',
            'tingkat' => auth()->guard('kasi')->user()->tingkat,
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);

        $proposals = proposal::where('id',$id)->first();
        $pengiriman_danas = pengiriman_dana::where('proposal_id',$id)->get();
        $penggunaan_danas = penggunaan_dana::where('proposal_id',$id)->get();
        $log_aktivitas = log_aktivitas::where('proposal_id',$id)->get();
        $pengiriman_dana = pengiriman_dana::get();
        $penggunaan_dana = penggunaan_dana::get();
        $galeri = json_decode($proposals->galeri,true);
        return view('kasi/rekap_data',compact('log_aktivitas','pengiriman_dana','penggunaan_dana','proposals','pengiriman_danas','penggunaan_danas','jumlah_notifikasi', 'top_notifikasis','galeri'));
    }
    
    public function download_rekap_data($id){
        $proposals = proposal::where('id',$id)->first();
        $pengiriman_danas = pengiriman_dana::where('proposal_id',$id)->get();
        $penggunaan_danas = penggunaan_dana::where('proposal_id',$id)->get();

        $pdf = PDF::loadView('rekap_data', compact('proposals','pengiriman_danas','penggunaan_danas'));
        return $pdf->download('rekap_data_'.$proposals->sekolah->npsn.'.pdf');
    }
    public function terima(Request $Request){

        $dokumen = $Request->dokumen_terima;
        $namaDokumen = $dokumen->getClientOriginalName();

        $data = [
            'status' => 'sudah',
            'dokumen_terima' => $namaDokumen,
            'dana_total' => $Request->dana_total
        ];
        $proposal = proposal::where('id',$Request->id)->first();
        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => 'kasi',
            'tujuan' => $proposal->sekolah_id,
            'deskripsi' => 'terima',
            'status' => 'belum'
        ];
        $deskripsi = "Kasi menerima proposal sekolah dengan total dana Rp $Request->dana_total ,-";
        notifikasi::create($dataNotif);
        proposal::where('id',$Request->id)->update($data);
        $dokumen->move('proposal/dokumen_terima',$namaDokumen);
        
        $notif = [
            'message' => 'Accept Data Success',
            'alert-type' => 'success'
        ];

        return redirect(url('kasi/daftar_verifikasi'))->with($notif);
    }
    public function forward(Request $Request){
        $validator = Validator::make($Request->all(),[
            'dokumen_forward' => 'required|mimes:doc,docx,pdf|file|max:2000',
        ]);
        
        if($validator->fails()){
            $notif = [
                'message' => 'Kirim Tugas Verifikasi Gagal',
                'alert-type' => 'error'
            ];
    
            return redirect(url('kasi'))->with($notif);
         }else{

        $dokumen = $Request->dokumen_forward;
        $namaDokumen = $dokumen->getClientOriginalName();

    	$data = [
            'status' => 'forward',
    		'dokumen_forward' => $namaDokumen,
            'tgl_mulai_verifikasi' => $Request->tgl_mulai_verifikasi,
            'tgl_akhir_verifikasi' => $Request->tgl_akhir_verifikasi
    	];
        $proposal = proposal::where('id',$Request->id)->first();
        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => 'kasi',
            'tujuan' => 'tim_verifikasi',
            'deskripsi' => 'forward',
            'status' => 'belum'
        ];

        notifikasi::create($dataNotif);
    	proposal::where('id',$Request->id)->update($data);
        $dokumen->move('proposal/dokumen_forward',$namaDokumen);
        
        $notif = [
            'message' => 'Kirim Tugas Verifikasi Berhasil',
            'alert-type' => 'success'
        ];

        return redirect(url('kasi'))->with($notif);
    }
    }
    public function tolak(Request $Request){
    	$data = [
    		'status' => 'tolak'
    	];
        $proposal = proposal::where('id',$Request->id)->first();
        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => 'kasi',
            'tujuan' => $proposal->sekolah_id,
            'deskripsi' => 'tolak',
            'status' => 'belum'
        ];
        notifikasi::create($dataNotif);
    	proposal::where('id',$Request->id)->update($data);
        
        $notif = [
            'message' => 'Decline Data Success',
            'alert-type' => 'success'
        ];

        return redirect(url('kasi'))->with($notif);
    }
    public function selesai(Request $Request){
        $data = [
            'status' => 'selesai'
        ];
        $proposal = proposal::where('id',$Request->id)->first();
        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => 'kasi',
            'tujuan' => $proposal->sekolah_id,
            'deskripsi' => 'selesai',
            'status' => 'belum'
        ];

        notifikasi::create($dataNotif);
        proposal::where('id',$Request->id)->update($data);
        
        $notif = [
            'message' => 'Proposal Selesai',
            'alert-type' => 'success'
        ];

        return redirect(url('kasi'))->with($notif);
    }
    public function pengiriman_dana(Request $Request){
        $proposal = proposal::where('id',$Request->id)->first();
        $dana_terkirim_1 = preg_replace('/[.]/', '', $proposal->dana_terkirim);
        $dana_terkirim_2 = preg_replace('/[.]/', '', $Request->jumlah);
        $dana_total = preg_replace('/[.]/', '', $proposal->dana_total);


        $selisih = $dana_total - $dana_terkirim_1;

        if($dana_terkirim_2 > $selisih){
            $notif = [
                'message' => 'Gagal, pengiriman dana besar dari total bantuan',
                'alert-type' => 'error'
            ];
            return back()->with($notif);
        }else{
            $dana_terkirim_updated_ = $dana_terkirim_1+$dana_terkirim_2;
            $dana_terkirim_updated = number_format($dana_terkirim_updated_,0,'','.');

            $foto = $Request->foto;
            $namaFoto = $foto->getClientOriginalName();

            $dokumen = $Request->dokumen;
            $namaDokumen = $dokumen->getClientOriginalName();

            $data_pengiriman = [
                'proposal_id' => $Request->id,
                'jumlah' => $Request->jumlah,
                'foto' => $namaFoto,
                'dokumen' => $namaDokumen,
            ];

            $data_proposal = [
                'dana_terkirim' => $dana_terkirim_updated
            ];
            $dataNotif = [
                'proposal_id' => $Request->id,
                'dari' => 'kasi',
                'tujuan' => $proposal->sekolah_id,
                'deskripsi' => 'kirim_dana',
                'status' => 'belum'
            ];

            $deskripsi = "Kasi mengirim dana sebanyak Rp. $Request->jumlah ,-";

            notifikasi::create($dataNotif);
            pengiriman_dana::create($data_pengiriman);
            proposal::where('id',$Request->id)->update($data_proposal);
            $foto->move('proposal/kirim_dana',$namaFoto);
            $dokumen->move('proposal/dokumen_kirim_dana',$namaDokumen);
            $data = pengiriman_dana::orderby('id','desc')->first();
            
        $dataLog = [
                'proposal_id' => $Request->id,
                'deskripsi' => 'Kasi mengirim dana',
                'dari' => 'kasi',
                'data_id' => $data->id
            ];
            log_aktivitas::create($dataLog);

            $notif = [
                'message' => 'Update Data Success',
                'alert-type' => 'success'
            ];

            return redirect(url('kasi/show_proposal/'.$Request->id))->with($notif);
        }
        
    }
}
