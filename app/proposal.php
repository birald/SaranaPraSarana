<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class proposal extends Authenticatable
{
    protected $table = "proposal";

    protected $fillable = [
        'sekolah_id', 'judul', 'deskripsi', 'foto', 'galeri', 'dokumen', 'status', 'dana_diajukan', 'dana_total', 'dana_terpakai', 'rate','jumlah_rusak', 'tingkat_rusak', 'jumlah_siswa', 'rombongan_belajar', 'jenis_sekolah', 'tingkat_sekolah', 'dana_terkirim', 'tgl_mulai_verifikasi', 'tgl_akhir_verifikasi', 'dokumen_verfikasi', 'dokumen_terima', 'dokumen_forward', 'pengantar_dinas', 'surat_permohonan', 'tgl_diverifikasi', 'created_at', 'updated_at', 'status_foto', 'status_dokumen', 'status_jumlah_rusak', 'status_tingkat_rusak', 'status_rombongan_belajar', 'status_jumlah_siswa', 'status_tingkat_sekolah', 'status_jenis_sekolah'
    ];
    public function sekolah(){
    	return $this->belongsTo(sekolah::class, 'sekolah_id');
    }
    public function pengiriman_dana(){
    	return $this->hasMany(pengiriman_dana::class);
    }
    public function penggunaan_dana(){
        return $this->hasMany(penggunaan_dana::class);
    }
    public function notifikasi(){
        return $this->hasMany(notifikasi::class);
    }
    public function rekap_data(){
        return $this->hasMany(rekap_data::class);
    }
    public function log_aktivitas(){
        return $this->hasMany(log_aktivitas::class);
    }
}
