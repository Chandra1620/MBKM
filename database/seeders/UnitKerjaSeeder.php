<?php

namespace Database\Seeders;

use App\Models\JabatanStruktural;
use App\Models\UnitKerja;
// use App\Models\UnitKerjaHasAtasanBerwenang;
// use App\Models\UnitKerjaHasAtasanLangsung;
use App\Models\UnitKerjaHasJabatanFungsional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $wadir1 = JabatanStruktural::where('name', 'wadir 1')->first();
        $wadir2 = JabatanStruktural::where('name', 'wadir 2')->first();
        // $wadir3 = JabatanStruktural::where('name', 'wadir 3')->first();

        $jabatanStrukturalPolindra = JabatanStruktural::create([
            'name' => 'Politeknik Negeri Indramayu'
        ]);
        $PoliteknikNegeriIndramayu = UnitKerja::create([
            'name' => 'Politeknik Negeri Indramayu',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jabatanStrukturalPolindra->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Direktur',
            'unit_kerja_id' => $PoliteknikNegeriIndramayu->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Wakil Direktur Bidang Akademik',
            'unit_kerja_id' => $PoliteknikNegeriIndramayu->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Wakil Direktur Bidang Perencanaan, Keuangan, dan Umum',
            'unit_kerja_id' => $PoliteknikNegeriIndramayu->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Wakil Direktur Bidang Kemahasiswaan, Alumnim, dan Kerja Sama',
            'unit_kerja_id' => $PoliteknikNegeriIndramayu->id,
        ]);

        $jabatanStrukturalKesehatan = JabatanStruktural::create([
            'name' => 'ketua jurusan kesehatan'
        ]);
        $jurusanKesehatan = UnitKerja::create([
            'name' => 'jurusan kesehatan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jabatanStrukturalKesehatan->id,

        ]);

        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Ketua Jurusan',
            'unit_kerja_id' => $jurusanKesehatan->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Sekretaris Jurusan',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Koordinator Program Studi',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Profesor',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Lektor Kepala',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Lektor',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Asisten Ahli',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Pertama',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Penyelia',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Mahir',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Terampil',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer Terampil',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Muda',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Penyelia',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan  Mahir',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Terampil',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Teknisi Laboratorium',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $jurusanKesehatan->id,
        //     'jabatan_struktural_id' => $jabatanStrukturalKesehatan->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $jurusanKesehatan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $jabatanStrukturalTI = JabatanStruktural::create([
            'name' => 'ketua jurusan teknik informatika'
        ]);
        $jurusanTI = UnitKerja::create([
            'name' => 'jurusan teknik informatika',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jabatanStrukturalTI->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Ketua Jurusan',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Sekretaris Jurusan',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Koordinator Program Studi',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Profesor',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Lektor Kepala',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Lektor',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Asisten Ahli',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Penyelia',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan  Mahir',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Terampil',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Pertama',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Penyelia',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Mahir',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Terampil',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Laboratorium',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Teknisi Laboratorium',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $jurusanTI->id,
        //     'jabatan_struktural_id' => $jabatanStrukturalTI->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $jurusanTI->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        
        $jurusanStrukturalTeknik = JabatanStruktural::create([
            'name' => 'ketua jurusan teknik'
        ]);
        $jurusanteknik = UnitKerja::create([
            'name' => 'jurusan teknik',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jurusanStrukturalTeknik->id,


        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Ketua Jurusan',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Sekretaris Jurusan',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Koordinator Program Studi',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Profesor',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Lektor Kepala',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Lektor',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Asisten Ahli',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Pertama',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Penyelia',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Mahir',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Terampil',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Madya',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Muda',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Penyelia',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan  Mahir',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Terampil',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Teknisi Laboratorium',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $jurusanteknik->id,
        //     'jabatan_struktural_id' => $jurusanStrukturalTeknik->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $jurusanteknik->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);
        



        $strukturalPusatPenjaminMutudanPengembanganPembelajaran = JabatanStruktural::create([
            'name' => 'ketua pusat penjaminan mutu dan pengembangan pembelajaran',
        ]);
        $pusatPenjaminMutudanPengembanganPembelajaran = UnitKerja::create([
            'name' => 'pusat penjaminan mutu dan pengembangan pembelajaran',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalPusatPenjaminMutudanPengembanganPembelajaran->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengelola Pengembangan Pembelajaran dan Penjaminan Mutu Pendidikan',
            'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id,
        //     'jabatan_struktural_id' => $strukturalPusatPenjaminMutudanPengembanganPembelajaran->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);



        $strukturalUpaPerpustakaan = JabatanStruktural::create([
            'name' => 'ketua upa perpustakaan'
        ]);
        $upaPerpustakaan = UnitKerja::create([
            'name' => 'upa perpustakaan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaPerpustakaan->id,


        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Perpustakaan',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pustakawan Ahli Pertama',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pustakawan Terampil',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPerpustakaan->id,
        //     'jabatan_struktural_id' => $strukturalUpaPerpustakaan->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPerpustakaan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalUpaTik = JabatanStruktural::create([
            'name' => 'ketua upa teknologi informasi dan komunikasi'
        ]);
        $upaTik = UnitKerja::create([
            'name' => 'upa teknologi informasi dan komunikasi',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaTik->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Teknologi Informasi, dan Komunikasi',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer Ahli Muda',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer Ahli Pertama',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer Terampil',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Penata Kelola Sistem dan Teknologi Informasi',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengelola Situs/Web',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Umum',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $upaTik->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaTik->id,
        //     'jabatan_struktural_id' => $strukturalUpaTik->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaTik->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalPusatPenelitiandanPengabdian = JabatanStruktural::create([
            'name' => 'ketua pusat penelitian dan pengabdian kepada masyarakat (p3m)'
        ]);

        $pusatPenelitiandanPengabdian = UnitKerja::create([
            'name' => 'pusat penelitian dan pengabdian kepada masyarakat (p3m)',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalPusatPenelitiandanPengabdian->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Pertama',
            'unit_kerja_id' => $pusatPenelitiandanPengabdian->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $pusatPenelitiandanPengabdian->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $pusatPenelitiandanPengabdian->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $pusatPenelitiandanPengabdian->id,
        //     'jabatan_struktural_id' => $strukturalPusatPenelitiandanPengabdian->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $pusatPenelitiandanPengabdian->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);




        $strukturalUpaBahasa = JabatanStruktural::create([
            'name' => 'ketua upa bahasa'
        ]);
        $upabahasa = UnitKerja::create([
            'name' => 'upa bahasa',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaBahasa->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Bahasa',
            'unit_kerja_id' => $upabahasa->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upabahasa->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upabahasa->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $upabahasa->id
        ]);
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upabahasa->id,
        //     'jabatan_struktural_id' => $strukturalUpaBahasa->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upabahasa->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalPerawatandanPerbaikan = JabatanStruktural::create([
            'name' => 'ketua upa perawatan dan perbaikan'
        ]);
        $upaPerawatandanPerbaikan = UnitKerja::create([
            'name' => 'upa perawatan dan perbaikan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalPerawatandanPerbaikan->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Perawatan dan Perbaikan',
            'unit_kerja_id' => $upaPerawatandanPerbaikan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upaPerawatandanPerbaikan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upaPerawatandanPerbaikan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $upaPerawatandanPerbaikan->id
        ]);
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPerawatandanPerbaikan->id,
        //     'jabatan_struktural_id' => $strukturalPerawatandanPerbaikan->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPerawatandanPerbaikan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalUpaPengKarir = JabatanStruktural::create([
            'name' => 'ketua upa pengembangan karir dan kewirausahaan'
        ]);

        $upaPengKarirDanKewirausahaan = UnitKerja::create([
            'name' => 'upa pengembangan karir dan kewirausahaan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaPengKarir->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Pengembangan Karier dan Kewirausahaan',
            'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id
        ]);
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id,
        //     'jabatan_struktural_id' => $strukturalUpaPengKarir->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);

        
        $strukturalUpaUjiKompetensi = JabatanStruktural::create([
            'name' => 'ketua upa layanan uji kompetensi'
        ]);
        $upaPengLayananUjiKompetensi = UnitKerja::create([
            'name' => 'upa layanan uji kompetensi',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaUjiKompetensi->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Layanan Uji Kompetensi',
            'unit_kerja_id' => $upaPengLayananUjiKompetensi->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upaPengLayananUjiKompetensi->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $upaPengLayananUjiKompetensi->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upaPengLayananUjiKompetensi->id
        ]);
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPengLayananUjiKompetensi->id,
        //     'jabatan_struktural_id' => $strukturalUpaUjiKompetensi->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPengLayananUjiKompetensi->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalLaboratoriumTerpadu = JabatanStruktural::create([
            'name' => 'ketua upa laboratorium terpadu'
        ]);
        $upaPengLaboratoriumTerpadu = UnitKerja::create([
            'name' => 'upa laboratorium terpadu',
            'has_atasan_langsung' => true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalLaboratoriumTerpadu->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala UPA Laboratorium Terpadu',
            'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id
        ]);
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id,
        //     'jabatan_struktural_id' => $strukturalLaboratoriumTerpadu->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);



        $bagianPerencanaanKeuangandanUmum = UnitKerja::create([
            'name' => 'bagian perencanaan, keuangan, dan umum',
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $wadir2->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala Bagian Perencanaan, Keuangan, dan Umum',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala Subbagian Umum',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Analis Pengelolaan Keuangan APBN Ahli Madya',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Madya',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Perencana Ahli Madya',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Analis Pengelolaan Keuangan APBN Ahli Muda',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Analis SDM Aparatur Ahli Muda',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Perencana Ahli Muda',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Muda',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Keuangan APBN Penyelia',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Analis Pengelolaan Keuangan APBN Ahli Pertama',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Analis SDM Aparatur Ahli Pertama',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Perencana Ahli Pertama',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Keuangan APBN Mahir',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Hubungan Masyarakat Ahli Pertama',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata SDM Aparatur Penyelia',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Keuangan APBN Terampil',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata SDM Aparatur Mahir',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata SDM Aparatur Terampil',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Pertama',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Penyelia',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Mahir',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Penyusun Materi Hukum dan Perundang-undangan',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Penelaah Teknis Kebijakan',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Analis Sumber Daya Manusia Aparatur',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Bendahara',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Penyusun Laporan Keuangan',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Terampil',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengelola Keprotokolan',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengelola Barang Milik Negara',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengelola Keuangan',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Operator Layanan Operasional',
            'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id
        ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);

        $akademikdankemahasiswaan = UnitKerja::create([
            'name' => 'bagian akademik dan kemahasiswaan',
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $wadir2->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala Bagian Akademik dan Kemahasiswaan',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Kepala Subbagian Akademik',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Muda',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer Ahli Muda',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer  Ahli Pertama',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Ahli Pertama',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Penelaah Teknis Kebijakan',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Mahir',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Arsiparis Terampil',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pranata Komputer Terampil',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengolah Data dan Informasi',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengelola Informasi Akademik',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'Pengadministrasi Perkantoran',
            'unit_kerja_id' => $akademikdankemahasiswaan->id
        ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $akademikdankemahasiswaan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);        
    }
}
