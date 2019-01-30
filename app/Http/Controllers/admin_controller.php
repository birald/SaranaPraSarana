<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kasi;
use App\sekolah;
use App\tim_verifikasi;
use App\proposal;

class admin_controller extends Controller
{
    public function index(){
        $proposal = proposal::count();
        $proposalSelesai = proposal::where('status','selesai')->count();
        $sekolah = sekolah::count();
        $dataproposal = proposal::orderBy('created_at','DESC')->get();
        $dana_terkirim_ = 0;
        foreach ($dataproposal as $data) {
            $dana_terkirim_ += preg_replace('/[.]/', '', $data->dana_terkirim);
        }
        $dana_terkirim = number_format($dana_terkirim_,0,'','.');
        
        return view('Admin/Dashboard',compact('proposal','proposalSelesai','sekolah','dataproposal','dana_terkirim'));
	}
	public function daftarSekolah(){
    	$sekolahs = sekolah::orderBy('created_at','DESC')->get();
	    return view('Admin/DaftarSekolah',compact('sekolahs'));	
	}
	public function tambahSekolah(){
	    return view('Admin/TambahSekolah');	
	}
    function inputSekolah(Request $Request){
        $data = [
            'nama' => $Request->nama,
            'tingkat' => $Request->tingkat,
            'npsn' => $Request->npsn,
            'alamat' => $Request->alamat,
            'telepon' => $Request->telepon,
            'email' => $Request->email,
            'password' => bcrypt($Request->password),
            'no_rekening' => $Request->no_rekening,
            'atas_nama' => $Request->atas_nama,
            'nama_bank' => $Request->nama_bank
        ];
        $sekolah = sekolah::create($data);
        
        $notif = [
            'message' => 'Input Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    function editSekolah(Request $Request){
    	if(isset($Request->password)){
	        $data = [
	            'nama' => $Request->nama,
	            'tingkat' => $Request->tingkat,
	            'npsn' => $Request->npsn,
	            'alamat' => $Request->alamat,
	            'telepon' => $Request->telepon,
	            'email' => $Request->email,
	            'password' => bcrypt($Request->password),
	            'no_rekening' => $Request->no_rekening,
	            'atas_nama' => $Request->atas_nama,
	            'nama_bank' => $Request->nama_bank,
	        ];
        }else{
	        $data = [
	            'nama' => $Request->nama,
	            'tingkat' => $Request->tingkat,
	            'npsn' => $Request->npsn,
	            'alamat' => $Request->alamat,
	            'telepon' => $Request->telepon,
	            'email' => $Request->email,
	            'no_rekening' => $Request->no_rekening,
	            'atas_nama' => $Request->atas_nama,
	            'nama_bank' => $Request->nama_bank,
	        ];
        }
        $sekolah = sekolah::where('id',$Request->id)->update($data);

        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    function hapusSekolah(Request $Request){
        $sekolah = sekolah::where('id',$Request->id)->delete();

        $notif = [
            'message' => 'Delete Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
	public function daftarKasi(){
    	$kasis = kasi::orderBy('created_at','DESC')->get();
    	return view('admin/DaftarKasi',compact('kasis'));	
	}
    public function tambahKasi(){
        return view('admin/TambahKasi'); 
    }
    function inputKasi(Request $Request){
        $data = [
            'username' => $Request->username,
            'tingkat' => $Request->tingkat,
            'email' => $Request->email,
            'password' => bcrypt($Request->password),
            'nip' => $Request->nip,
            'no_hp' => $Request->no_hp,
            'alamat' => $Request->alamat,
        ];
        kasi::create($data);
        
        $notif = [
            'message' => 'Input Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    function editKasi(Request $Request){
        if(isset($Request->password)){
            $data = [
                'username' => $Request->username,
                'tingkat' => $Request->tingkat,
                'email' => $Request->email,
                'password' => bcrypt($Request->password),
                'nip' => $Request->nip,
                'no_hp' => $Request->no_hp,
                'alamat' => $Request->alamat,
            ];
        }else{
            $data = [
                'username' => $Request->username,
                'tingkat' => $Request->tingkat,
                'email' => $Request->email,
                'nip' => $Request->nip,
                'no_hp' => $Request->no_hp,
                'alamat' => $Request->alamat,
            ];
        }
        kasi::where('id',$Request->id)->update($data);

        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    function hapusKasi(Request $Request){
        $kasi = kasi::where('id',$Request->id)->delete();

        $notif = [
            'message' => 'Delete Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    public function daftarTimVerifikasi(){
        $timVerifikasis = tim_verifikasi::orderBy('created_at','DESC')->get();
        return view('admin/DaftarTimVerifikasi',compact('timVerifikasis'));   
    }
    public function tambahTimVerifikasi(){
        return view('admin/TambahTimVerifikasi'); 
    }
    function inputTimVerifikasi(Request $Request){
        $data = [
            'username' => $Request->username,
            'email' => $Request->email,
            'password' => bcrypt($Request->password),
            'nip' => $Request->nip,
            'no_hp' => $Request->no_hp,
            'alamat' => $Request->alamat,
        ];
        tim_verifikasi::create($data);
        
        $notif = [
            'message' => 'Input Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    function editTimVerifikasi(Request $Request){
        if(isset($Request->password)){
            $data = [
                'username' => $Request->username,
                'email' => $Request->email,
                'password' => bcrypt($Request->password),
                'nip' => $Request->nip,
                'no_hp' => $Request->no_hp,
                'alamat' => $Request->alamat,
            ];
        }else{
            $data = [
                'username' => $Request->username,
                'email' => $Request->email,
                'nip' => $Request->nip,
                'no_hp' => $Request->no_hp,
                'alamat' => $Request->alamat,
            ];
        }
        tim_verifikasi::where('id',$Request->id)->update($data);

        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
    function hapusTimVerifikasi(Request $Request){
        tim_verifikasi::where('id',$Request->id)->delete();

        $notif = [
            'message' => 'Delete Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
}
