<?php

use App\Http\Controllers\Admin\MengelolaRolePermissionController;
use App\Http\Controllers\AdminKepegawaian\AdminPangkatGolonganController;
use App\Http\Controllers\AdminKepegawaian\DataPegawaiController;
use App\Http\Controllers\AdminKepegawaian\JabatanFungsionalController;
use App\Http\Controllers\AdminKepegawaian\JabatanStrukturalController;
use App\Http\Controllers\AdminKepegawaian\ManagementAbsensi;
use App\Http\Controllers\AdminKepegawaian\ManagementBeritaController;
use App\Http\Controllers\AdminKepegawaian\ManagementPerizinanAdminController;
use App\Http\Controllers\AdminKepegawaian\ManagementSuratKeputusanController;
use App\Http\Controllers\AdminKepegawaian\ManagementSuratTugasController;
use App\Http\Controllers\AdminKepegawaian\ManagementSuratTugasDinasController;
use App\Http\Controllers\AdminKepegawaian\PegawaiFungsoinalController;
use App\Http\Controllers\AdminKepegawaian\PegawaiStrukturalController;
use App\Http\Controllers\AdminKepegawaian\UnitKerjaController;
use App\Http\Controllers\AdminKepegawaian\UnitKerjaHasJabatanFungsionalController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateAlamatdanKontakController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateKeluargaController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateKependudukanController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateLainlainController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdatePelatihanController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdatePendidikanFormalController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateProfileController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateRiwayatPekerjaanController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateSertifikasiController;
use App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai\UpdateTesController;
use App\Http\Controllers\AdminSystem\AdminPegawaiController;
use App\Http\Controllers\AdminSystem\PegawaiController;
use App\Http\Controllers\AtasanLangsung\AtasanLangsungController;
use App\Http\Controllers\AtasanLangsung\RequestPerizinanAtasanLangsungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ManagementPerizinanAtasanController;
use App\Http\Controllers\ManagementPerizinanLanjutanController;
use App\Http\Controllers\Pegawai\DiklatController;
use App\Http\Controllers\Pegawai\KegiatanController;
use App\Http\Controllers\Pegawai\LogHarianController;
use App\Http\Controllers\Pegawai\PangkatGolonganController;
use App\Http\Controllers\Pegawai\PendidikanFormalController;
use App\Http\Controllers\Pegawai\PerizinanController;
use App\Http\Controllers\Pegawai\ProfileController;
use App\Http\Controllers\pegawai\RiwayatFungsionalController;
use App\Http\Controllers\Pegawai\RiwayatKehadiranController;
use App\Http\Controllers\Pegawai\RiwayatPekerjaanController;
use App\Http\Controllers\pegawai\RiwayatPendidikanController;
use App\Http\Controllers\Pegawai\SertifikasiController;
use App\Http\Controllers\Pegawai\SisaCutiController as PegawaiSisaCutiController;
use App\Http\Controllers\Pegawai\SKController;
use App\Http\Controllers\Pegawai\STController;
use App\Http\Controllers\Pegawai\STPDController;
use App\Http\Controllers\Pegawai\SuratMeyuratController;
use App\Http\Controllers\Pegawai\TesController;
use App\Http\Controllers\SisaCutiController;
use App\Http\Controllers\Wadir\RequestPerizinanWadirController;
use App\Models\RiwayatFungsional;
use App\Models\RiwayatPekerjaan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/perizinan-cuti/{id}/scan', [PerizinanController::class, 'outputScan'])->name('perizinan-cuti.scan');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //!: admin
    Route::middleware(['checkUserRole:admin'])->group(function () {
        Route::get('/admin/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/admin/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('/admin/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/admin/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/admin/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/admin/pegawai/{id}/delete', [PegawaiController::class, 'destroy'])->name('pegawai.delete');

        Route::put('/admin/pegawai/{id}/admin-pegawai', [PegawaiController::class, 'updateRolePegawaiAdmin'])->name('pegawai.updateRolePegawaiAdmin');
        Route::put('/admin/pegawai/{id}/pegawai', [AdminPegawaiController::class, 'updateRolePegawaiPegawai'])->name('pegawai.updateRolePegawaiPegawai');

        Route::get('/admin/admin-pegawai', [AdminPegawaiController::class, 'index'])->name('admin-pegawai.index');
        Route::get('/admin/admin-pegawai/{id}/edit', [AdminPegawaiController::class, 'edit'])->name('admin-pegawai.edit');
        Route::put('/admin/admin-pegawai/{id}/update', [AdminPegawaiController::class, 'update'])->name('admin-pegawai.update');

        Route::get('/admin/atasan-langsung', [AtasanLangsungController::class, 'index'])->name('atasan-langsung.index');
    });
    //!: admin
    //!: ROLE PERMISSIN

    Route::middleware(['permission:mengelola-role-permission'])->group(function () {
        Route::get('/mengelola-role', [MengelolaRolePermissionController::class, 'role'])->name('mengelola-role.index');
        Route::post('/mengelola-role', [MengelolaRolePermissionController::class, 'store_role'])->name('mengelola-role.store');
        Route::put('/mengelola-role/{id}/update', [MengelolaRolePermissionController::class, 'update_role'])->name('mengelola-role.update');
        Route::put('/mengelola-role/{id}/update-role-permission', [MengelolaRolePermissionController::class, 'update_role_permission'])->name('mengelola-role-permission.update');

        Route::get('/mengelola-permission', [MengelolaRolePermissionController::class, 'permission'])->name('mengelola-permission.index');

        // Route::post('/mengelola-permission', [MengelolaRolePermissionController::class, 'store_permission'])->name('mengelola-permission.store');
        // Route::delete('/mengelola-permission/{id}/delete', [MengelolaRolePermissionController::class, 'delete_permission'])->name('mengelola-permission.delete');
        // Route::put('/mengelola-permission/{id}/update', [MengelolaRolePermissionController::class, 'update_permission'])->name('mengelola-permission.update');

        Route::get('/mengelola-user-role', [MengelolaRolePermissionController::class, 'userHasRole'])->name('mengelola-user-role.index');
        // Route::delete('/mengelola-user-role/{id}/delete', [MengelolaRolePermissionController::class, 'deletedUserHasRole'])->name('mengelola-user-role.delete');
    });

    //!: END ROLE PERMISSION

    //TODO: ADMIN PEGAWAI
    Route::middleware(['permission:mengelola-berita'])->group(function () {
        Route::get('/news', [ManagementBeritaController::class, 'index'])->name('news.index');
        Route::get('/news/{id}/detail', [ManagementBeritaController::class, 'detail'])->name('news.detail');
        Route::get('/news/create', [ManagementBeritaController::class, 'create'])->name('news.create');
        Route::post('/news/store', [ManagementBeritaController::class, 'store'])->name('news.store');
        Route::get('/news/{id}/edit', [ManagementBeritaController::class, 'edit'])->name('news.edit');
        Route::put('/news/{id}/update', [ManagementBeritaController::class, 'update'])->name('news.update');
        Route::delete('/news/{id}/delete', [ManagementBeritaController::class, 'destroy'])->name('news.delete');
    });
    Route::middleware(['permission:mengelola-presensi'])->group(function () {
        Route::get('/management-presensi', [ManagementAbsensi::class, 'index'])->name('managementpresensi');
        Route::post('/management-presensi', [ManagementAbsensi::class, 'store'])->name('managementpresensi.store');
        Route::post('/management-presensi/excel', [ManagementAbsensi::class, 'storeexcel'])->name('managementpresensi.storeexcel');
        Route::get('/management-presensi/create', [ManagementAbsensi::class, 'create'])->name('managementpresensi.create');
        Route::delete('/management-presensi/{id}/delete', [ManagementAbsensi::class, 'destroy'])->name('managementpresensi.destroy');
        Route::get('/management-presensi/{id}/edit', [ManagementAbsensi::class, 'edit'])->name('managementpresensi.edit');
    });
    Route::middleware(['permission:mengelola-jabatan-struktural'])->group(function () {
        Route::get('/jabatan-struktural', [JabatanStrukturalController::class, 'index'])->name('jabatan-struktural.index');
        Route::get('/jabatan-struktural/create', [JabatanStrukturalController::class, 'create'])->name('jabatan-struktural.create');
        Route::post('/jabatan-struktural/store', [JabatanStrukturalController::class, 'store'])->name('jabatan-struktural.store');
        Route::get('/jabatan-struktural/{id}/edit', [JabatanStrukturalController::class, 'edit'])->name('jabatan-struktural.edit');
        Route::put('/jabatan-struktural/{id}/update', [JabatanStrukturalController::class, 'update'])->name('jabatan-struktural.update');
        Route::delete('/jabatan-struktural/{id}/delete', [JabatanStrukturalController::class, 'destroy'])->name('jabatan-struktural.delete');
    });
    Route::middleware(['permission:mengelola-pegawai-struktural'])->group(function () {
        Route::get('/pegawai-struktural', [PegawaiStrukturalController::class, 'index'])->name('pegawai-struktural.index');
        Route::get('/pegawai-struktural/create', [PegawaiStrukturalController::class, 'create'])->name('pegawai-struktural.create');
        Route::post('/pegawai-struktural/store', [PegawaiStrukturalController::class, 'store'])->name('pegawai-struktural.store');
        Route::get('/pegawai-struktural/{id}/edit', [PegawaiStrukturalController::class, 'edit'])->name('pegawai-struktural.edit');
        Route::put('/pegawai-struktural/{id}/update', [PegawaiStrukturalController::class, 'update'])->name('pegawai-struktural.update');
        Route::delete('/pegawai-struktural/{id}/delete', [PegawaiStrukturalController::class, 'destroy'])->name('pegawai-struktural.delete');
        Route::post('/pegawai-struktural/store/{id}/jabatan', [PegawaiStrukturalController::class, 'storeJabatanStruktural'])->name('pegawai-struktural.storeJabatan');
    });
    Route::middleware(['permission:mengelola-pegawai-fungsional'])->group(function () {
        Route::get('/pegawai-fungsional', [PegawaiFungsoinalController::class, 'index'])->name('pegawai-fungsional.index');
        Route::get('/pegawai-fungsional/create', [PegawaiFungsoinalController::class, 'create'])->name('pegawai-fungsional.create');
        Route::post('/pegawai-fungsional/{id}/created', [PegawaiFungsoinalController::class, 'created'])->name('pegawai-fungsional.created');
        Route::post('/pegawai-fungsional/store', [PegawaiFungsoinalController::class, 'store'])->name('pegawai-fungsional.store');
        Route::get('/pegawai-fungsional/{id}/edit', [PegawaiFungsoinalController::class, 'edit'])->name('pegawai-fungsional.edit');
        Route::put('/pegawai-fungsional/{id}/update', [PegawaiFungsoinalController::class, 'update'])->name('pegawai-fungsional.update');
        Route::delete('/pegawai-fungsional/{id}/delete', [PegawaiFungsoinalController::class, 'destroy'])->name('pegawai-fungsional.delete');
        Route::post('/pegawai-fungsional/{id}/verifikasi', [PegawaiFungsoinalController::class, 'verifikasi'])->name('pegawai-fungsional.verifikasi');
        Route::get('/pegawai-fungsional/{id}/tolak-verifikasi', [PegawaiFungsoinalController::class, 'tolakVerifikasi'])->name('pegawai-fungsional.tolakVerifikasi');
    });
    Route::middleware(['permission:mengelola-pangkat-golongan'])->group(function () {
        Route::get('/admin-pangkat-golongan', [AdminPangkatGolonganController::class, 'index'])->name('admin-pangkat-golongan.index');
        Route::get('/admin-pangkat-golongan/{id}/detail', [AdminPangkatGolonganController::class, 'detail'])->name('admin-pangkat-golongan.detail');
        Route::post('/admin-pangkat-golongan/{id}/verifikasi', [AdminPangkatGolonganController::class, 'verifikasi'])->name('admin-pangkat-golongan.verifikasi');
        Route::get('/admin-pangkat-golongan/{id}/tolak-verifikasi', [AdminPangkatGolonganController::class, 'tolakVerifikasi'])->name('admin-pangkat-golongan.tolak_verifikasi');
        Route::get('/admin-pangkat-golongan/create', [AdminPangkatGolonganController::class, 'create'])->name('admin-pangkat-golongan.create');
        Route::get('/admin-pangkat-golongan/edit/{id}', [AdminPangkatGolonganController::class, 'edit'])->name('admin-pangkat-golongan.edit');
        Route::put('/admin-pangkat-golongan/update/{id}', [AdminPangkatGolonganController::class, 'update'])->name('admin-pangkat-golongan.update');
        Route::delete('/admin-pangkat-golongan/{id}/delete', [AdminPangkatGolonganController::class, 'destroy'])->name('admin-pangkat-golongan.delete');
        Route::get('/admin-pangkat-golongan/downloadFile/{id}', [AdminPangkatGolonganController::class, 'downloadFile'])->name('admin-pangkat-golongan.download');
    });
    Route::middleware(['permission:mengelola-unit-kerja'])->group(function () {
        Route::get('/unit-kerja', [UnitKerjaController::class, 'index'])->name('unit-kerja.index');
        Route::get('/unit-kerja/{id}/detail', [UnitKerjaController::class, 'detail'])->name('unit-kerja.detail');
        Route::get('/unit-kerja/create', [UnitKerjaController::class, 'create'])->name('unit-kerja.create');
        Route::post('/unit-kerja/store', [UnitKerjaController::class, 'store'])->name('unit-kerja.store');
        Route::get('/unit-kerja/{id}/edit', [UnitKerjaController::class, 'edit'])->name('unit-kerja.edit');
        Route::put('/unit-kerja/{id}/update', [UnitKerjaController::class, 'update'])->name('unit-kerja.update');
        Route::delete('/unit-kerja/{id}/delete', [UnitKerjaController::class, 'destroy'])->name('unit-kerja.delete');
        Route::get('/unit-kerja/{id}/create-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'create'])->name('unit-kerja.createJabatanFungsional');
        Route::post('/unit-kerja/{id}/store-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'store'])->name('unit-kerja.storeJabatanFungsional');
        Route::get('/unit-kerja/{id}/edit-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'edit'])->name('unit-kerja.editJabatanFungsional');
        Route::put('/unit-kerja/{id}/update-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'update'])->name('unit-kerja.updateJabatanFungsional');
        Route::delete('/unit-kerja/{id}/delete-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'destroy'])->name('unit-kerja.deleteJabatanFungsional');
    });
    Route::middleware(['permission:mengelola-surat-tugas-penelitian'])->group(function () {
        Route::get('/management-surat-tugas', [ManagementSuratTugasController::class, 'index'])->name('management-surat-tugas.index');
        Route::post('/management-surat-tugas', [ManagementSuratTugasController::class, 'store'])->name('management-surat-tugas.store');
        Route::get('/management-surat-tugas/{id}/edit', [ManagementSuratTugasController::class, 'edit'])->name('management-surat-tugas.edit');
        Route::put('/management-surat-tugas/{id}/update', [ManagementSuratTugasController::class, 'update'])->name('management-surat-tugas.update');
    });
    Route::middleware(['permission:mengelola-surat-tugas-dinas'])->group(function () {
        Route::get('/management-surat-tugas-dinas', [ManagementSuratTugasDinasController::class, 'index'])->name('management-surat-tugas-dinas.index');
        Route::post('/management-surat-tugas-dinas', [ManagementSuratTugasDinasController::class, 'store'])->name('management-surat-tugas-dinas.store');
    });
    Route::middleware(['permission:mengelola-surat-tugas-keputusan'])->group(function () {
        Route::get('/management-surat-keputusan', [ManagementSuratKeputusanController::class, 'index'])->name('management-surat-keputusan.index');
        Route::post('/management-surat-keputusan', [ManagementSuratKeputusanController::class, 'store'])->name('management-surat-keputusan.store');
    });

    Route::middleware(['permission:mangelola-validasi-perizinan'])->group(function () {
        Route::get('/management-perizinan', [ManagementPerizinanAdminController::class, 'index'])->name('management-perizinan.index');
        Route::post('/management-perizinan/{id}/verifikasi', [ManagementPerizinanAdminController::class, 'verifikasi'])->name('management-perizinan.verifikasi');
        Route::delete('/management-perizinan/{id}/denied', [ManagementPerizinanAdminController::class, 'ditolak'])->name('management-perizinan.ditolak');
    });

    Route::middleware(['checkUserRole:admin-pegawai'])->group(function () {
        // Data Pegawai
        Route::get('/data-pegawai', [DataPegawaiController::class, 'index'])->name('data-pegawai.index');
        Route::get('/data-pegawai/detail/{id}', [DataPegawaiController::class, 'detail_pegawai'])->name('data-pegawai.detail');

        // wil deleted
        Route::get('/jabatan-fungsional', [JabatanFungsionalController::class, 'index'])->name('jabatan-fungsional.index');
        Route::get('/jabatan-fungsional/create', [JabatanFungsionalController::class, 'create'])->name('jabatan-fungsional.create');
        Route::get('/jabatan-fungsional/{id}/create', [JabatanFungsionalController::class, 'created'])->name('jabatan-fungsional.created');
        Route::post('/jabatan-fungsional/store', [JabatanFungsionalController::class, 'store'])->name('jabatan-fungsional.store');
        Route::get('/jabatan-fungsional/{id}/edit', [JabatanFungsionalController::class, 'edit'])->name('jabatan-fungsional.edit');
        Route::put('/jabatan-fungsional/{id}/update', [JabatanFungsionalController::class, 'update'])->name('jabatan-fungsional.update');
        Route::delete('/jabatan-fungsional/{id}/delete', [JabatanFungsionalController::class, 'destroy'])->name('jabatan-fungsional.delete');

        // end will deleted
        Route::get('/pegawai-struktural', [PegawaiStrukturalController::class, 'index'])->name('pegawai-struktural.index');

        Route::get('/pegawai-struktural/create', [PegawaiStrukturalController::class, 'create'])->name('pegawai-struktural.create');

        Route::post('/pegawai-struktural/store', [PegawaiStrukturalController::class, 'store'])->name('pegawai-struktural.store');
        Route::get('/pegawai-struktural/{id}/edit', [PegawaiStrukturalController::class, 'edit'])->name('pegawai-struktural.edit');
        Route::put('/pegawai-struktural/{id}/update', [PegawaiStrukturalController::class, 'update'])->name('pegawai-struktural.update');

        Route::delete('/pegawai-struktural/{id}/delete', [PegawaiStrukturalController::class, 'destroy'])->name('pegawai-struktural.delete');
        Route::post('/pegawai-struktural/store/{id}/jabatan', [PegawaiStrukturalController::class, 'storeJabatanStruktural'])->name('pegawai-struktural.storeJabatan');

        Route::get('/unit-kerja', [UnitKerjaController::class, 'index'])->name('unit-kerja.index');
        Route::get('/unit-kerja/{id}/detail', [UnitKerjaController::class, 'detail'])->name('unit-kerja.detail');
        Route::get('/unit-kerja/create', [UnitKerjaController::class, 'create'])->name('unit-kerja.create');
        Route::post('/unit-kerja/store', [UnitKerjaController::class, 'store'])->name('unit-kerja.store');
        Route::get('/unit-kerja/{id}/edit', [UnitKerjaController::class, 'edit'])->name('unit-kerja.edit');
        Route::put('/unit-kerja/{id}/update', [UnitKerjaController::class, 'update'])->name('unit-kerja.update');
        Route::delete('/unit-kerja/{id}/delete', [UnitKerjaController::class, 'destroy'])->name('unit-kerja.delete');

        Route::get('/unit-kerja/{id}/create-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'create'])->name('unit-kerja.createJabatanFungsional');
        Route::post('/unit-kerja/{id}/store-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'store'])->name('unit-kerja.storeJabatanFungsional');

        Route::get('/unit-kerja/{id}/edit-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'edit'])->name('unit-kerja.editJabatanFungsional');

        Route::put('/unit-kerja/{id}/update-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'update'])->name('unit-kerja.updateJabatanFungsional');
        Route::delete('/unit-kerja/{id}/delete-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'destroy'])->name('unit-kerja.deleteJabatanFungsional');

        Route::get('/management-surat-tugas', [ManagementSuratTugasController::class, 'index'])->name('management-surat-tugas.index');
        Route::get('/management-surat-tugas/detail/{id}', [ManagementSuratTugasController::class, 'detail'])->name('management-surat-tugas.detail');
        Route::post('/management-surat-tugas', [ManagementSuratTugasController::class, 'store'])->name('management-surat-tugas.store');
        Route::get('/management-surat-tugas/download/{id}', [ManagementSuratTugasController::class, 'downloadFile'])->name('management-surat-tugas.download');
        Route::get('/admin-kepegawaian/management-surat-tugas/searchuser', [ManagementSuratTugasController::class, 'searchuser']);
        Route::delete('/management-surat-tugas/{id}', [ManagementSuratTugasController::class, 'destroy'])->name('management-surat-tugas.destroy');

        Route::get('/management-surat-tugas-dinas', [ManagementSuratTugasDinasController::class, 'index'])->name('management-surat-tugas-dinas.index');
        Route::get('/management-surat-tugas-dinas/detail/{id}', [ManagementSuratTugasDinasController::class, 'detail'])->name('management-surat-tugas-dinas.detail');
        Route::post('/management-surat-tugas-dinas', [ManagementSuratTugasDinasController::class, 'store'])->name('management-surat-tugas-dinas.store');
        Route::get('/admin-kepegawaian/management-surat-tugas-dinas/searchuser', [ManagementSuratTugasDinasController::class, 'searchuser']);
        Route::get('/export-pdf-stpd/{id}', [ManagementSuratTugasDinasController::class, 'exportPdf'])->name('export.stpd');
        Route::get('/download-file-stpd/{id}', [ManagementSuratTugasDinasController::class, 'downloadFileSTPD'])->name('download.file-stpd');
        Route::delete('/management-surat-tugas-dinas/{id}', [ManagementSuratTugasDinasController::class, 'destroy'])->name('management-surat-tugas-dinas.destroy');

        Route::get('/management-surat-keputusan', [ManagementSuratKeputusanController::class, 'index'])->name('management-surat-keputusan.index');
        Route::post('/management-surat-keputusan', [ManagementSuratKeputusanController::class, 'store'])->name('management-surat-keputusan.store');
        Route::get('/management-surat-Keputusan/detail/{id}', [ManagementSuratKeputusanController::class, 'detail'])->name('management-surat-keputusan.detail');
        Route::get('/admin-kepegawaian/management-surat-keputusan/searchuser', [ManagementSuratKeputusanController::class, 'searchuser']);
        Route::get('/download-surat/{id}', [ManagementSuratKeputusanController::class, 'downloadFile'])->name('download.sk');
        Route::delete('/management-surat-keputusan/{id}', [ManagementSuratKeputusanController::class, 'destroy'])->name('management-surat-keputusan.destroy');

        Route::get('/admin-pangkat-golongan', [AdminPangkatGolonganController::class, 'index'])->name('admin-pangkat-golongan.index');
    });

    //todo
    // Route::get('/export-pdf/{id}', [PerizinanController::class, 'exportPdf'])->name('perizinan-cuti.exportPdf');
    // Route::get('/overview/{id}', [PerizinanController::class, 'overview'])->name('perizinan-cuti.overview');

    Route::get('/sisa-cuti', [PegawaiSisaCutiController::class, 'index'])->name('sisa-cuti.index');

    Route::get('/perizinan-cuti', [PerizinanController::class, 'index'])->name('perizinan-cuti.index');
    Route::get('/perizinan-cuti/create', [PerizinanController::class, 'create'])->name('perizinan-cuti.create');
    Route::post('/perizinan-cuti/store', [PerizinanController::class, 'store'])->name('perizinan-cuti.store');
    Route::get('/perizinan-cuti-overview', [PerizinanController::class, 'overview'])->name('perizinan-cuti.overview');

    Route::get('/perizinan-cuti/{id}/user/{id_pegawai}/stream', [PerizinanController::class, 'pdfStream'])->name('perizinan-cuti.pdfStream');
    Route::get('/perizinan-cuti/{id}/download', [PerizinanController::class, 'pdfExporting'])->name('perizinan-cuti.pdfExporting');

    Route::get('/perizinan-cuti/{id}/edit', [PerizinanController::class, 'edit'])->name('perizinan-cuti.edit');
    Route::put('/perizinan-cuti/{id}/update', [PerizinanController::class, 'update'])->name('perizinan-cuti.update');
    Route::delete('/perizinan-cuti/{id}/delete', [PerizinanController::class, 'destroy'])->name('perizinan-cuti.delete');

    Route::get('/dinas-luar', [PerizinanController::class, 'index'])->name('dinas-luar.index');
    Route::get('/dinas-luar/create', [PerizinanController::class, 'create'])->name('dinas-luar.create');
    Route::post('/dinas-luar/store', [PerizinanController::class, 'store'])->name('dinas-luar.store');
    Route::get('/dinas-luar/{id}/edit', [PerizinanController::class, 'edit'])->name('dinas-luar.edit');
    Route::put('/dinas-luar/{id}/update', [PerizinanController::class, 'update'])->name('dinas-luar.update');
    Route::delete('/dinas-luar/{id}/delete', [PerizinanController::class, 'destroy'])->name('dinas-luar.delete');

    //todo: end todo

    //!: wadir
    Route::middleware(['permission:mangelola-perizinan-wadir'])->group(function () {
        Route::get('/request-perizinan-wadir', [RequestPerizinanWadirController::class, 'index'])->name('request-perizinan-wadir.index');
        Route::put('/request-perizinan-wadir/{id}/izinkan', [RequestPerizinanWadirController::class, 'izinkan'])->name('request-perizinan-wadir.izinkan');
        Route::get('/request-perizinan-wadir/{id}/ditangguhkan', [RequestPerizinanWadirController::class, 'formditangguhkan'])->name('request-perizinan-wadir.formditangguhkan');
        Route::put('/request-perizinan-wadir/{id}/ditangguhkan', [RequestPerizinanWadirController::class, 'ditangguhkan'])->name('request-perizinan-wadir.ditangguhkan');
        Route::get('/request-perizinan-wadir/{id}/perubahan', [RequestPerizinanWadirController::class, 'formperubahan'])->name('request-perizinan-wadir.formperubahan');
        Route::put('/request-perizinan-wadir/{id}/perubahan', [RequestPerizinanWadirController::class, 'perubahan'])->name('request-perizinan-wadir.perubahan');
        Route::get('/request-perizinan-wadir/{id}/tidakdisetujui', [RequestPerizinanWadirController::class, 'formtidakdisetujui'])->name('request-perizinan-wadir.formtidakdisetujui');
        Route::put('/request-perizinan-wadir/{id}/tolak', [RequestPerizinanWadirController::class, 'tolak'])->name('request-perizinan-wadir.tolak');
    });
    //!: atasan langsung
    Route::middleware(['permission:mengelola-perizinan-atasan-langsung'])->group(function () {
        Route::get('/request-perizinan-atasan-langsung', [RequestPerizinanAtasanLangsungController::class, 'index'])->name('request-perizinan-atasan-langsung.index');
        Route::put('/request-perizinan-atasan-langsung/{id}/izinkan', [RequestPerizinanAtasanLangsungController::class, 'izinkan'])->name('request-perizinan-atasan-langsung.izinkan');
        Route::get('/request-perizinan-atasan-langsung/{id}/ditangguhkan', [RequestPerizinanAtasanLangsungController::class, 'formditangguhkan'])->name('request-perizinan-atasan-langsung.formditangguhkan');
        Route::put('/request-perizinan-atasan-langsung/{id}/ditangguhkan', [RequestPerizinanAtasanLangsungController::class, 'ditangguhkan'])->name('request-perizinan-atasan-langsung.ditangguhkan');
        Route::get('/request-perizinan-atasan-langsung/{id}/perubahan', [RequestPerizinanAtasanLangsungController::class, 'formperubahan'])->name('request-perizinan-atasan-langsung.formperubahan');
        Route::put('/request-perizinan-atasan-langsung/{id}/perubahan', [RequestPerizinanAtasanLangsungController::class, 'perubahan'])->name('request-perizinan-atasan-langsung.perubahan');
        Route::get('/request-perizinan-atasan-langsung/{id}/tidakdisetujui', [RequestPerizinanAtasanLangsungController::class, 'formtidakdisetujui'])->name('request-perizinan-atasan-langsung.formtidakdisetujui');
        Route::put('/request-perizinan-atasan-langsung/{id}/tolak', [RequestPerizinanAtasanLangsungController::class, 'tolak'])->name('request-perizinan-atasan-langsung.tolak');
    });

    Route::get('/management-perizinan-atasan', [ManagementPerizinanAtasanController::class, 'index'])->name('management-perizinan-atasan.index');
    Route::post('/management-perizinan-atasan/{id}/{id_atasan}/verifikasi', [ManagementPerizinanAtasanController::class, 'verifikasi'])->name('management-perizinan-atasan.verifikasi');
    Route::get('/perizinan-cuti-atasan/{id}/stream', [ManagementPerizinanAtasanController::class, 'stream'])->name('perizinan-cuti-atasan.pdfStream');
    Route::delete('/management-perizinan-atasan/{id}/denied', [ManagementPerizinanAtasanController::class, 'ditolak'])->name('management-perizinan-atasan.ditolak');

    Route::get("/management-perizinan-lanjutan", [ManagementPerizinanLanjutanController::class, 'index'])->name("management-perizinan-lanjutan.index");
    //!

    //? belum ada permission yg bener
    Route::get('/management-update-profile', [UpdateProfileController::class, 'index'])->name('update-profile.index');
    Route::post('/management-update-profile/{id}/verifikasi', [UpdateProfileController::class, 'verifikasi'])->name('update-profile.verifikasi');
    Route::post('/management-update-profile/{id}/ditolak', [UpdateProfileController::class, 'ditolak'])->name('update-profile.ditolak');

    Route::get('/management-update-kependudukan', [UpdateKependudukanController::class, 'index'])->name('update-kependudukan.index');
    Route::post('/management-update-kependudukan/{id}/verifikasi', [UpdateKependudukanController::class, 'verifikasi'])->name('update-kependudukan.verifikasi');
    Route::post('/management-update-kependudukan/{id}/ditolak', [UpdateKependudukanController::class, 'ditolak'])->name('update-kependudukan.ditolak');

    Route::get('/management-update-keluarga', [UpdateKeluargaController::class, 'index'])->name('update-keluarga.index');
    Route::post('/management-update-keluarga/{id}/verifikasi', [UpdateKeluargaController::class, 'verifikasi'])->name('update-keluarga.verifikasi');
    Route::post('/management-update-keluarga/{id}/ditolak', [UpdateKeluargaController::class, 'ditolak'])->name('update-keluarga.ditolak');

    Route::get('/management-update-lainlain', [UpdateLainlainController::class, 'index'])->name('update-lainlain.index');
    Route::post('/management-update-lainlain/{id}/verifikasi', [UpdateLainlainController::class, 'verifikasi'])->name('update-lainlain.verifikasi');
    Route::post('/management-update-lainlain/{id}/ditolak', [UpdateLainlainController::class, 'ditolak'])->name('update-lainlain.ditolak');

    Route::get('/management-update-alamat-dan-kontak', [UpdateAlamatdanKontakController::class, 'index'])->name('update-alamatdankontak.index');
    Route::post('/management-update-update-alamat-dan-kontak/{id}/verifikasi', [UpdateAlamatdanKontakController::class, 'verifikasi'])->name('update-alamatdankontak.verifikasi');
    Route::post('/management-update-update-alamat-dan-kontak/{id}/ditolak', [UpdateAlamatdanKontakController::class, 'ditolak'])->name('update-alamatdankontak.ditolak');

    Route::get('/management-update-sertifikasi', [UpdateSertifikasiController::class, 'index'])->name('update-sertifikasi.index');
    Route::post('/management-update-sertifikasi/{id}/verifikasi', [UpdateSertifikasiController::class, 'verifikasi'])->name('update-sertifikasi.verifikasi');
    Route::post('/management-update-sertifikasi/{id}/ditolak', [UpdateSertifikasiController::class, 'ditolak'])->name('update-sertifikasi.ditolak');
    Route::get('/management-update-tes', [UpdateTesController::class, 'index'])->name('update-tes.index');
    Route::post('/management-update-tes/{id}/verifikasi', [UpdateTesController::class, 'verifikasi'])->name('update-tes.verifikasi');
    Route::post('/management-update-tes/{id}/ditolak', [UpdateTesController::class, 'ditolak'])->name('update-tes.ditolak');
    Route::get('/management-update-pelatihan', [UpdatePelatihanController::class, 'index'])->name('update-pelatihan.index');
    Route::post('/management-update-pelatihan/{id}/verifikasi', [UpdatePelatihanController::class, 'verifikasi'])->name('update-pelatihan.verifikasi');
    Route::post('/management-update-pelatihan/{id}/ditolak', [UpdatePelatihanController::class, 'ditolak'])->name('update-pelatihan.ditolak');

    Route::get('/management-update-pendidikan-formal', [UpdatePendidikanFormalController::class, 'index'])->name('update-pendidikanformal.index');
    Route::post('/management-update-pendidikan-formal/{id}/verifikasi', [UpdatePendidikanFormalController::class, 'verifikasi'])->name('update-pendidikanformal.verifikasi');
    Route::post('/management-update-pendidikan-formal/{id}/ditolak', [UpdatePendidikanFormalController::class, 'ditolak'])->name('update-pendidikanformal.ditolak');

    Route::get('/management-update-riwayat-pekerjaan', [UpdateRiwayatPekerjaanController::class, 'index'])->name('update-riwayatpekerjaan.index');
    Route::post('/management-update-riwayat-pekerjaan/{id}/verifikasi', [UpdateRiwayatPekerjaanController::class, 'verifikasi'])->name('update-riwayatpekerjaan.verifikasi');
    Route::post('/management-update-riwayat-pekerjaan/{id}/ditolak', [UpdateRiwayatPekerjaanController::class, 'ditolak'])->name('update-riwayatpekerjaan.ditolak');

    //? belum ada permission yg bener

    Route::middleware(['checkUserRole:atasan-langsung,admin-pegawai,pegawai,wadir,direktur,admin'])->group(function () {
        Route::get('/pangkat-golongan', [PangkatGolonganController::class, 'index'])->name('pangkat-golongan.index');
        Route::get('/pangkat-golongan/tambah', [PangkatGolonganController::class, 'create'])->name('pangkat-golongan.create');
        Route::post('/pangkat-golongan/store', [PangkatGolonganController::class, 'store'])->name('pangkat-golongan.store');
        Route::get('/pangkat-golongan/edit/{id}', [PangkatGolonganController::class, 'edit'])->name('pangkat-golongan.edit');
        Route::put('/pangkat-golongan/update/{id}', [PangkatGolonganController::class, 'update'])->name('pangkat-golongan.update');
        Route::delete('/pangkat-golongan/{id}/delete', [PangkatGolonganController::class, 'destroy'])->name('pangkat-golongan.delete');
        Route::get('pangkat-golongan/{id}/detail', [PangkatGolonganController::class, 'detail'])->name('pangkat-golongan.detail');
        Route::get('/pangkat-golongan/downloadFile/{id}', [PangkatGolonganController::class, 'downloadFile'])->name('pangkat-golongan.download');

        Route::get('/jabatan-fungsional', [RiwayatFungsionalController::class, 'index'])->name('riwayat-fungsional');
        Route::get('/jabatan-fungsional/tambah', [RiwayatFungsionalController::class, 'create'])->name('riwayat-fungsional.create');
        Route::post('/jabatan-fungsional', [RiwayatFungsionalController::class, 'store'])->name('riwayat-fungsional.store');
        Route::delete('jabatan-fungsional/{id}/delete', [RiwayatFungsionalController::class, 'delete'])->name('riwayat-fungsional.delete');
        // Route::get('jabatan-fungsional/{id}/detail', [RiwayatFungsionalController::class, 'detail'])->name('riwayat-fungsional.detail');
        Route::get('/dokumen/jabatan-fungsional/{id}', [RiwayatFungsionalController::class, 'lihatDokumen'])->name('jabatan-fungsional.lihatDokumen');

        Route::get('/surat-keputusan', [SKController::class, 'indexSK'])->name('sk.index');
        Route::get('/surat-keputusan/detail/{id}', [SKController::class, 'detail'])->name('sk.detail');
        Route::get('/SK/download-surat/{id}', [SKController::class, 'downloadFile'])->name('sk.download');
        Route::delete('/surat-keputusan/{id}', [SKController::class, 'destroy'])->name('sk.destroy');

        Route::get('/surat-tugas', [STController::class, 'indexST'])->name('st.index');
        Route::get('/surat-tugas/detail/{id}', [STController::class, 'detail'])->name('st.detail');
        Route::get('/st/download-surat/{id}', [STController::class, 'downloadFile'])->name('st.download');
        Route::delete('/surat-tugas/{id}', [STController::class, 'destroy'])->name('st.destroy');

        Route::get('/surat-tugas-dinas-luar', [STPDController::class, 'indexSTPD'])->name('stpd.index');
        Route::get('/surat-tugas-dinas-luar/detail/{id}', [STPDController::class, 'detail'])->name('stpd.detail');
        Route::get('/STPD/download-surat/{id}', [STPDController::class, 'downloadFile'])->name('stpd.download');
        Route::get('/STPD/export-PDF/{id}', [STPDController::class, 'exportPdf'])->name('stpd.downloadPDF');
        Route::delete('/surat-tugas-dinas-luar/{id}', [STPDController::class, 'destroy'])->name('stpd.destroy');

        Route::get('/pendidikan-formal', [PendidikanFormalController::class, 'index'])->name('pendidikanformal.index');
        Route::post('/pendidikan-formal', [PendidikanFormalController::class, 'store'])->name('pendidikanformal.store');
        Route::get('/pendidikan-formal/{id}/edit', [PendidikanFormalController::class, 'edit'])->name('pendidikanformal.edit');
        Route::put('/pendidikan-formal/{id}/update', [PendidikanFormalController::class, 'update'])->name('pendidikanformal.update');
        Route::get('/pendidikanformal/info/{id}', [PendidikanFormalController::class, 'info'])->name('pendidikanformal.info');
        Route::delete('/pendidikan-formal/{id}/delete', [PendidikanFormalController::class, 'delete'])->name('pendidikanformal.delete');

        Route::get('/diklat', [DiklatController::class, 'index'])->name('diklat.index');
        Route::post('/diklat', [DiklatController::class, 'store'])->name('diklat.store');
        Route::get('/diklat/{id}/edit', [DiklatController::class, 'edit'])->name('diklat.edit');
        Route::put('/diklat/{id}/update', [DiklatController::class, 'update'])->name('diklat.update');
        Route::get('/diklat/{id}/info', [DiklatController::class, 'info'])->name('diklat.info');
        Route::delete('/diklat/{id}/delete', [DiklatController::class, 'delete'])->name('diklat.delete');

        Route::get('/riwayat-pendidikan', [RiwayatPendidikanController::class, 'index'])->name('riwayat-pendidikan.index');

        //! RIWAYAT PEKERJAAN
        Route::get('/riwayat-pekerjaan', [RiwayatPekerjaanController::class, 'index'])->name('riwayat-pekerjaan.index');
        Route::post('/riwayat-pekerjaan', [RiwayatPekerjaanController::class, 'store'])->name('riwayat-pekerjaan.store');
        Route::get('/riwayat-pekerjaan/{id}/edit', [RiwayatPekerjaan::class, 'edit'])->name('riwayat-pekerjaan.edit');
        Route::put('/riwayat-pekerjaan/{id}/update', [RiwayatPekerjaanController::class, 'update'])->name('riwayat-pekerjaan.update');
        Route::get('/riwayat-pekerjaan/{id}/info', [RiwayatPekerjaan::class, 'info'])->name('riwayat-pekerjaan.info');
        Route::delete('/riwayat-pekerjaan/{id}/delete', [RiwayatPekerjaanController::class, 'delete'])->name('riwayat-pekerjaan.delete');

        //! RIWAYAT PEKERJAAN

        Route::get('/diklat', [DiklatController::class, 'index'])->name('diklat.index');
        Route::post('/diklat', [DiklatController::class, 'store'])->name('diklat.store');
        Route::get('/diklat/create', [DiklatController::class, 'create'])->name('diklat.create');
        Route::delete('/diklat/{id}/delete', [DiklatController::class, 'delete'])->name('diklat.delete');
        Route::delete('/diklat/{id}/delete', [DiklatController::class, 'delete'])->name('diklat.delete');

        Route::get('/sertifikasi', [SertifikasiController::class, 'index'])->name('sertifikasi.index');
        Route::get('/sertifikasi-create', [SertifikasiController::class, 'create'])->name('sertifikasi.create');
        Route::post('/sertifikasi', [SertifikasiController::class, 'store'])->name('sertifikasi.store');
        Route::get('/sertifikasi/{id}/edit', [SertifikasiController::class, 'edit'])->name('sertifikasi.edit');
        Route::put('/sertifikasi/{id}/update', [SertifikasiController::class, 'update'])->name('sertifikasi.update');
        Route::delete('/sertifikasi/{id}/delete', [SertifikasiController::class, 'destroy'])->name('sertifikasi.delete');

        Route::get('/tes', [TesController::class, 'index'])->name('tes.index');
        Route::get('/tes-create', [TesController::class, 'create'])->name('tes.create');
        Route::post('/tes', [TesController::class, 'store'])->name('tes.store');
        Route::get('/tes/{id}/edit', [TesController::class, 'edit'])->name('tes.edit');
        Route::put('/tes/{id}/update', [TesController::class, 'update'])->name('tes.update');
        Route::delete('/tes/{id}/delete', [TesController::class, 'destroy'])->name('tes.delete');

        Route::get('/diklat/{id}/edit', [DiklatController::class, 'edit'])->name('diklat.edit');
        Route::get('/diklat/{id}/edit', [DiklatController::class, 'edit'])->name('diklat.edit');

        Route::get('/profile/{name}/download-file-pendukung', [ProfileController::class, 'downloadFilePendukung'])->name('profile.downloadFilePendukung');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

        Route::get('/profile/edit-profil', [ProfileController::class, 'editProfile'])->name('edit-profile');
        Route::put('/profile/store-profil', [ProfileController::class, 'storeProfile'])->name('store-profile');

        Route::get('/profile/edit-kedudukan', [ProfileController::class, 'editKedudukan'])->name('edit-kedudukan');
        Route::put('/profile/update-kedudukan', [ProfileController::class, 'updateKedudukan'])->name('update-kedudukan');

        Route::get('/profile/edit-kepegawaian', [ProfileController::class, 'editKepegawaian'])->name('edit-kepegawaian');
        Route::put('/profile/update-kepegawaian', [ProfileController::class, 'updateKepegawaian'])->name('update-kepegawaian');

        Route::get('/profile/edit-keluarga', [ProfileController::class, 'editKeluarga'])->name('edit-keluarga');
        Route::put('/profile/update-keluarga', [ProfileController::class, 'updateKeluarga'])->name('update-keluarga');

        Route::get('/profile/edit-alamatkontak', [ProfileController::class, 'editAlamatkontak'])->name('edit-alamatkontak');
        Route::put('/profile/update-alamatkontak', [ProfileController::class, 'updateAlamatkontak'])->name('update-alamatkontak');

        Route::get('/profile/edit-lain_lain', [ProfileController::class, 'editLainlain'])->name('edit-lainlain');
        Route::put('/profile/update-lainlain', [ProfileController::class, 'updateLainlain'])->name('update-lainlain');

        Route::get('/profile/edit-tanda_tangan', [ProfileController::class, 'editTandaTangan'])->name('edit-tandatangan');
        Route::put('/profile/update-tanda_tangan', [ProfileController::class, 'updateTandaTangan'])->name('update-tandatangan');
        Route::delete('/profile/delete-tanda_tangan', [ProfileController::class, 'deleteTandaTangan'])->name('delete-tandatangan');

        Route::get('/surat', [SuratMeyuratController::class, 'index'])->name('surat.index');
        Route::get('/surat/unit-kerja', [SuratMeyuratController::class, 'indexunit'])->name('surat.indexunit');

        Route::get('/surat-keluar', [SuratMeyuratController::class, 'indexPengirim'])->name('surat.indexPengirim');
        Route::get('/surat/create', [SuratMeyuratController::class, 'create'])->name('surat.create');
        Route::post('/surat', [SuratMeyuratController::class, 'store'])->name('surat.store');
        Route::get('/surat/{id}/detail', [SuratMeyuratController::class, 'detail'])->name('surat.detail');
        Route::get('/surat/search-users', [SuratMeyuratController::class, 'searchuser'])->name('surat.searchuser');
        Route::get('/admin-kepegawaian/management-surat-tugas/searchuser', [ManagementSuratTugasController::class, 'searchuser']);

        Route::get('/surat/{name}/download', [SuratMeyuratController::class, 'download'])->name('surat.download');
        Route::delete('/surat/{id}/delete', [SuratMeyuratController::class, 'destroy'])->name('surat.delete');

        //!: FITURE PRESENSI
        Route::get('/log-harian', [LogHarianController::class, 'index'])->name('logharian.index');
        Route::get('/log-harian/create', [LogHarianController::class, 'create'])->name('logharian.create');
        Route::post('/log-harian', [LogHarianController::class, 'store'])->name('logharian.store');
        Route::get('/log-harian/{id}/edit', [LogHarianController::class, 'edit'])->name('logharian.edit');
        Route::put('/log-harian/{id}/update', [LogHarianController::class, 'update'])->name('logharian.update');
        Route::delete('/log-harian/{id}/delete', [LogHarianController::class, 'destroy'])->name('logharian.destroy');

        // Route::get('/riwayat-kehadiran', [RiwayatKehadiranController::class, 'index'])->name('riwayatkehadiran.index');
        // Route::get('/riwayat-absensi', [RiwayatKehadiranController::class, 'absence'])->name('riwayatkehadiran.absensi');

        Route::get('/riwayat-kehadiran', [RiwayatKehadiranController::class, 'index'])->name('riwayatkehadiran.index');
        Route::get('/riwayat-absensi', [RiwayatKehadiranController::class, 'absence'])->name('riwayatkehadiran.absensi');
        Route::post('/submit-attendance', [RiwayatKehadiranController::class, 'storeAttendance'])->name('riwayatkehadiran.store');
    });

    Route::prefix('pegawai')->group(function () {
        Route::get('riwayat-pekerjaan', [App\Http\Controllers\Pegawai\RiwayatPekerjaanController::class, 'index'])->name('riwayat-pekerjaan.index');
        Route::post('riwayat-pekerjaan/store', [App\Http\Controllers\Pegawai\RiwayatPekerjaanController::class, 'store'])->name('riwayat-pekerjaan.store');
        Route::get('riwayat-pekerjaan/edit/{id}', [App\Http\Controllers\Pegawai\RiwayatPekerjaanController::class, 'edit'])->name('riwayat-pekerjaan.edit');
        Route::put('riwayat-pekerjaan/update/{id}', [App\Http\Controllers\Pegawai\RiwayatPekerjaanController::class, 'update'])->name('riwayat-pekerjaan.update');
        Route::delete('riwayat-pekerjaan/delete/{id}', [App\Http\Controllers\Pegawai\RiwayatPekerjaanController::class, 'delete'])->name('riwayat-pekerjaan.delete');
        Route::get('riwayat-pekerjaan/{id}/info', [App\Http\Controllers\Pegawai\RiwayatPekerjaanController::class, 'info'])->name('riwayat-pekerjaan.info');
    });
});

// Route::get("/pdf", [DocumentController::class, "create"]);

require __DIR__ . '/auth.php';
