<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proposal;
use App\tim_verifikasi;
use \Carbon\Carbon;
use App\notifikasi;

class tim_verifikasi_controller extends Controller
{
    public function index(){
        $data_notifikasi = [
            'tujuan' => 'tim_verifikasi',
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
    	$proposals = proposal::where('status','forward')->orderby('updated_at','DESC')->get();
    	return view('tim_verifikasi/index',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
 
    public function daftar_verifikasi(){
        $data_notifikasi = [
            'tujuan' => 'tim_verifikasi',
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
    	$proposals = proposal::where('status','verifikasi')->get();
    	return view('tim_verifikasi/daftar_verifikasi',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_unvalid(){
        $data_notifikasi = [
            'tujuan' => 'tim_verifikasi',
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where('status','unvalid')->get();
        return view('tim_verifikasi/daftar_unvalid',compact('proposals','top_notifikasis','jumlah_notifikasi'));
    }
  
    public function show_proposal($id){
        $data_notifikasi = [
            'tujuan' => 'tim_verifikasi',
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where('id',$id)->first();
        $galeri = json_decode($proposals->galeri,true);

        $sisa_hari = "";
        $now = Carbon::now();
        $sekarang = Carbon::now();
        $expired = $proposals->tgl_akhir_verifikasi;
        $tgl_akhir = Carbon::parse($expired);
        $sisa = $tgl_akhir->diffInDays($sekarang);
        
        if ($expired > $sekarang) {
            $sisa_hari = $sisa;
        }else{
            $sisa_hari = "habis";
        }

        return view('tim_verifikasi/show_proposal',compact('proposals','galeri','sisa_hari','top_notifikasis','jumlah_notifikasi'));
    }
 
    public function show_proposal_check($id){
        $data_notifikasi = [
            'tujuan' => 'tim_verifikasi',
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $proposals = proposal::where('id',$id)->first();
        $galeri = json_decode($proposals->galeri,true);
        return view('tim_verifikasi/show_proposal_check',compact('proposals','galeri','top_notifikasis','jumlah_notifikasi'));
    }
    public function show_notifikasi($id,$laporan_id){
        $data = ['status' => 'sudah'];
        notifikasi::where('id',$id)->update($data);
        return redirect(url('tim_verifikasi/show_proposal/'.$laporan_id));
    }
    public function all_notifikasi(){
        $data_notifikasi = [
            'tujuan' => 'tim_verifikasi',
            'status' => 'belum'
        ];
        $top_notifikasis = notifikasi::where($data_notifikasi)->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = count($top_notifikasis);
        $notifikasis = notifikasi::where('tujuan','tim_verifikasi')->orderby('created_at','DESC')->get();
        return view('tim_verifikasi/all_notifikasi',compact('notifikasis','jumlah_notifikasi', 'top_notifikasis')); 
    }
    public function validasi(Request $Request){
        $now = Carbon::now()->format('d-m-Y');

        $dokumen = $Request->dokumen_verifikasi;
        $namaDokumen = $dokumen->getClientOriginalName();

        $data = [
            'status' => 'verifikasi',
            'status_foto' => $Request->status_foto,
            'status_dokumen' => $Request->status_dokumen,
            'status_jumlah_rusak' => $Request->status_jumlah_rusak,
            'status_tingkat_rusak' => $Request->status_tingkat_rusak,
            'status_rombongan_belajar' => $Request->status_rombongan_belajar,
            'status_jumlah_siswa' => $Request->status_jumlah_siswa,
            'status_tingkat_sekolah' => $Request->status_tingkat_sekolah,
            'status_jenis_sekolah' => $Request->status_jenis_sekolah,
            'tgl_diverifikasi' => $now,
            'dokumen_verifikasi' => $namaDokumen
        ];
        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => 'tim_verifikasi',
            'tujuan' => 'kasi',
            'deskripsi' => 'verifikasi',
            'tingkat' => $Request->tingkat_sekolah,
            'status' => 'belum'
        ];

        notifikasi::create($dataNotif);
        proposal::where('id',$Request->id)->update($data);
        $dokumen->move('proposal/dokumen_verifikasi',$namaDokumen);
        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];
        return redirect(url('tim_verifikasi'))->with($notif);
    }
    public function unvalid(Request $Request){
        $data = ['status' => 'unvalid'];
        $dataNotif = [
            'proposal_id' => $Request->id,
            'dari' => 'tim_verifikasi',
            'tujuan' => 'kasi',
            'deskripsi' => 'unvalid',
            'tingkat' => $Request->tingkat_sekolah,
            'status' => 'belum'
        ];
        
        notifikasi::create($dataNotif);
        proposal::where('id',$Request->id)->update($data);
        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];
        return redirect(url('tim_verifikasi'))->with($notif);
    }
}
