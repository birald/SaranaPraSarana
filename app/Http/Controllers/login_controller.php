<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_controller extends Controller
{
    public function login_admin(){
        return view('login/login_admin');
    }
    public function check_login_admin(Request $Request){
        $data = [
            'email' => $Request->email,
            'password' => $Request->password
        ];
        if(auth()->guard('admin')->attempt($data)){
            return redirect(url('/admin/dashboard'));
        }
        else{
            return redirect('/login_admin');
        }
    }
    public function logoutAdmin(){
        auth()->guard('admin')->logout();
        return redirect(url('/login_admin'));
    }
    public function login_kasi(){
    	return view('login/login_kasi');
    }
    public function check_login_kasi(Request $Request){
    	$data = [
    		'email' => $Request->email,
    		'password' => $Request->password
    	];
    	if(auth()->guard('kasi')->attempt($data)){
            return redirect(url('/kasi'));
        }
        else{
            return redirect('/login_kasi');
        }
    }
    public function logout_kasi(){
        auth()->guard('kasi')->logout();
        return redirect(url('/login_kasi'));
    }

    public function login_tim_verifikasi(){
    	return view('login/login_tim_verifikasi');
    }
    public function check_login_tim_verifikasi(Request $Request){
    	$data = [
    		'email' => $Request->email,
    		'password' => $Request->password
    	];
    	if(auth()->guard('tim_verifikasi')->attempt($data)){
            return redirect(url('/tim_verifikasi'));
        }
        else{
            return redirect('/login_tim_verifikasi');
        }
    }
    public function logout_tim_verifikasi(){
        auth()->guard('tim_verifikasi')->logout();
        return redirect(url('/login_tim_verifikasi'));
    }

    public function login_sekolah(){
    	return view('login/login_sekolah');
    }
    public function check_login_sekolah(Request $Request){
    	$data = [
    		'email' => $Request->email,
    		'password' => $Request->password
    	];
    	if(auth()->guard('sekolah')->attempt($data)){
            return redirect(url('/sekolah'));
        }
        else{
            return redirect('/login_sekolah');
        }
    }
    public function logout_sekolah(){
        auth()->guard('sekolah')->logout();
        return redirect(url('/login_sekolah'));
    }

}
