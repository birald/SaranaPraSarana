<?php

Route::get('/login_admin', 'login_controller@login_admin')->name('login_admin');
Route::post('/check_login_admin', 'login_controller@check_login_admin')->name('check_login_admin');

Route::get('/login_kasi', 'login_controller@login_kasi')->name('login_kasi');
Route::post('/check_login_kasi', 'login_controller@check_login_kasi')->name('check_login_kasi');

Route::get('/login_tim_verifikasi', 'login_controller@login_tim_verifikasi')->name('login_tim_verifikasi');
Route::post('/check_login_tim_verifikasi', 'login_controller@check_login_tim_verifikasi')->name('check_login_tim_verifikasi');

Route::get('/login_sekolah', 'login_controller@login_sekolah')->name('login_sekolah');
Route::post('/check_login_sekolah', 'login_controller@check_login_sekolah')->name('check_login_sekolah');

Route::group(['middleware' => 'admin'], function(){

	Route::get('/admin/dashboard', 'admin_controller@index');

	Route::get('/admin/daftarSekolah', 'admin_controller@daftarSekolah');
	Route::get('/admin/tambahSekolah', 'admin_controller@tambahSekolah');
	Route::post('/admin/inputSekolah', 'admin_controller@inputSekolah');
	Route::put('/admin/editSekolah', 'admin_controller@editSekolah');
	Route::delete('/admin/hapusSekolah', 'admin_controller@hapusSekolah');

	Route::get('/admin/daftarKasi', 'admin_controller@daftarKasi');
	Route::get('/admin/tambahKasi', 'admin_controller@tambahKasi');
	Route::post('/admin/inputKasi', 'admin_controller@inputKasi');
	Route::put('/admin/editKasi', 'admin_controller@editKasi');
	Route::delete('/admin/hapusKasi', 'admin_controller@hapusKasi');

	Route::get('/admin/daftarTimVerifikasi', 'admin_controller@daftarTimVerifikasi');
	Route::get('/admin/tambahTimVerifikasi', 'admin_controller@tambahTimVerifikasi');
	Route::post('/admin/inputTimVerifikasi', 'admin_controller@inputTimVerifikasi');
	Route::put('/admin/editTimVerifikasi', 'admin_controller@editTimVerifikasi');
	Route::delete('/admin/hapusTimVerifikasi', 'admin_controller@hapusTimVerifikasi');

	Route::get('/admin/logoutAdmin', 'login_controller@logoutAdmin');

});

Route::group(['middleware' => 'kasi'], function(){

	Route::get('/kasi', 'kasi_controller@index')->name('kasi');
	Route::get('/kasi/show_proposal/{id}', 'kasi_controller@show_proposal')->name('kasi.show_proposal');
	Route::put('/kasi/forward', 'kasi_controller@forward')->name('kasi.forward');
	Route::put('/kasi/terima', 'kasi_controller@terima')->name('kasi.terima');
	Route::put('/kasi/tolak', 'kasi_controller@tolak')->name('kasi.tolak');
	Route::get('/kasi/daftar_pending', 'kasi_controller@daftar_pending')->name('kasi.daftar_pending');
	Route::get('/kasi/daftar_verifikasi', 'kasi_controller@daftar_verifikasi')->name('kasi.daftar_verifikasi');
	Route::get('/kasi/daftar_unvalid', 'kasi_controller@daftar_unvalid')->name('kasi.daftar_unvalid');
	Route::get('/kasi/daftar_terima', 'kasi_controller@daftar_terima')->name('kasi.daftar_terima');
	Route::get('/kasi/daftar_tolak', 'kasi_controller@daftar_tolak')->name('kasi.daftar_tolak');
	Route::post('/kasi/pengiriman_dana', 'kasi_controller@pengiriman_dana')->name('kasi.pengiriman_dana');
	Route::get('/kasi/show_notifikasi/{id}/{proposal_id}', 'kasi_controller@show_notifikasi');
	Route::get('/kasi/all_notifikasi', 'kasi_controller@all_notifikasi');
	Route::get('/logout_kasi', 'login_controller@logout_kasi')->name('logout_kasi');
	Route::get('/kasi/log_aktivitas/{id}', 'kasi_controller@log_aktivitas')->name('kasi.log_aktivitas');
	Route::put('/kasi/selesai', 'kasi_controller@selesai')->name('kasi.selesai');
	Route::get('/kasi/daftar_selesai', 'kasi_controller@daftar_selesai')->name('kasi.daftar_selesai');
	Route::get('/kasi/rekap_data/{id}', 'kasi_controller@rekap_data')->name('kasi.rekap_data');
	Route::get('/kasi/download_rekap_data/{id}', 'kasi_controller@download_rekap_data')->name('kasi.download_rekap_data');
	Route::get('/kasi/profile/{id}', 'kasi_controller@profile')->name('kasi.profile');
	Route::put('/kasi/editKasi', 'kasi_controller@editKasi');

});


Route::group(['middleware' => 'sekolah'], function(){

	Route::get('/sekolah', 'sekolah_controller@index')->name('sekolah');
	Route::get('/sekolah/daftar_terima', 'sekolah_controller@daftar_terima')->name('sekolah.daftar_terima');
	Route::get('/sekolah/show_proposal/{id}', 'sekolah_controller@show_proposal')->name('sekolah.show_proposal');
	Route::get('/sekolah/show_proposal_acc/{id}', 'sekolah_controller@show_proposal_acc')->name('sekolah.show_proposal_acc');
	Route::delete('/sekolah/hapus_proposal', 'sekolah_controller@hapus_proposal')->name('sekolah.hapus_proposal');
	Route::put('/sekolah/edit_proposal_sekolah', 'sekolah_controller@edit_proposal_sekolah')->name('sekolah.edit_proposal_sekolah');
	Route::get('/sekolah/tambah_proposal_sekolah', 'sekolah_controller@tambah_proposal_sekolah')->name('sekolah.tambah_proposal_sekolah');
	Route::post('/sekolah/input_proposal_sekolah', 'sekolah_controller@input_proposal_sekolah')->name('sekolah.input_proposal_sekolah');
	Route::get('/sekolah/update_dana/{id}', 'sekolah_controller@update_dana')->name('kasi.update_dana');
	Route::post('/sekolah/input_update_dana', 'sekolah_controller@input_update_dana')->name('kasi.input_update_dana');
	Route::get('/sekolah/show_notifikasi/{id}/{proposal_id}', 'sekolah_controller@show_notifikasi');
	Route::get('/sekolah/all_notifikasi', 'sekolah_controller@all_notifikasi');
	Route::get('/logout_sekolah', 'login_controller@logout_sekolah')->name('logout_sekolah');
	Route::get('/sekolah/log_aktivitas/{id}', 'sekolah_controller@log_aktivitas')->name('sekolah.log_aktivitas');
	Route::get('/sekolah/profile/{id}', 'sekolah_controller@profile')->name('sekolah.profile');
	Route::put('/sekolah/editSekolah', 'sekolah_controller@editSekolah');

});

Route::group(['middleware' => 'tim_verifikasi'], function(){

	Route::get('/tim_verifikasi', 'tim_verifikasi_controller@index')->name('tim_verifikasi');
	Route::get('/tim_verifikasi/daftar_verifikasi', 'tim_verifikasi_controller@daftar_verifikasi')->name('tim_verifikasi.daftar_verifikasi');
	Route::get('/tim_verifikasi/daftar_unvalid', 'tim_verifikasi_controller@daftar_unvalid')->name('tim_verifikasi.daftar_unvalid');
	Route::get('/tim_verifikasi/show_proposal/{id}', 'tim_verifikasi_controller@show_proposal')->name('tim_verifikasi.show_proposal');
	Route::put('/tim_verifikasi/validasi', 'tim_verifikasi_controller@validasi')->name('tim_verifikasi.validasi');
	Route::put('/tim_verifikasi/unvalid', 'tim_verifikasi_controller@unvalid')->name('tim_verifikasi.unvalid');
	Route::get('/tim_verifikasi/show_proposal_check/{id}', 'tim_verifikasi_controller@show_proposal_check')->name('tim_verifikasi.show_proposal_check');
	Route::get('/tim_verifikasi/show_notifikasi/{id}/{proposal_id}', 'tim_verifikasi_controller@show_notifikasi');
	Route::get('/tim_verifikasi/all_notifikasi', 'tim_verifikasi_controller@all_notifikasi');
	Route::get('/logout_tim_verifikasi', 'login_controller@logout_tim_verifikasi')->name('logout_tim_verifikasi');
});