<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin pegawai
        // jabatan
        Permission::create([
            'name' => 'mengelola-role-permission',
        ]);
        
        Permission::create([
            'name' => 'mengelola-role',
        ]);
        Permission::create([
            'name' => 'mengelola-permission',
        ]);
        Permission::create([
            'name' => 'mengelola-user-role',
        ]);

        Permission::create([
            'name' => 'mangelola-validasi-perizinan',
        ]);

        Permission::create([
            'name' => 'mangelola-perizinan-wadir',
        ]);
        Permission::create([
            'name' => 'mengelola-perizinan-atasan-langsung',
        ]);
        Permission::create([
            'name' => 'mengelola-unit-kerja',
        ]);
        Permission::create([
            'name' => 'mengelola-jabatan-struktural',
        ]);
        Permission::create([
            'name' => 'mengelola-pegawai-struktural',
        ]);
        Permission::create([
            'name' => 'mengelola-pegawai-fungsional',
        ]);
        Permission::create([
            'name' => 'mengelola-pangkat-golongan',
        ]);
        // kegiatan
        Permission::create([
            'name' => 'mengelola-surat-tugas-penelitian',
        ]);
        Permission::create([
            'name' => 'mengelola-surat-tugas-dinas',
        ]);
        Permission::create([
            'name' => 'mengelola-surat-keputusan',
        ]);
        // berita
        Permission::create([
            'name' => 'mengelola-berita',
        ]);
        Permission::create([
            'name' => 'data-pegawai',
        ]);
        // berita
        Permission::create([
            'name' => 'mengelola-presensi',
        ]);


        Role::create(['name' => 'admin']);
        Role::create(['name' => 'admin-pegawai']);
        Role::create(['name' => 'wadir']);
        Role::create(['name' => 'atasan-langsung']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('mengelola-role-permission');
        $roleAdminPegawai = Role::findByName('admin-pegawai');
        $roleAdminPegawai->givePermissionTo('mengelola-role-permission');
        $roleAdminPegawai->givePermissionTo('mengelola-unit-kerja');
        $roleAdminPegawai->givePermissionTo('mengelola-jabatan-struktural');
        $roleAdminPegawai->givePermissionTo('mengelola-pegawai-struktural');
        $roleAdminPegawai->givePermissionTo('mengelola-pegawai-fungsional');
        $roleAdminPegawai->givePermissionTo('mengelola-pangkat-golongan');
        $roleAdminPegawai->givePermissionTo('mengelola-surat-tugas-penelitian');
        $roleAdminPegawai->givePermissionTo('mengelola-surat-tugas-dinas');
        $roleAdminPegawai->givePermissionTo('mengelola-surat-keputusan');
        $roleAdminPegawai->givePermissionTo('mengelola-berita');
        $roleAdminPegawai->givePermissionTo('data-pegawai');
        $roleAdminPegawai->givePermissionTo('mengelola-presensi');
        $roleAdminPegawai->givePermissionTo('mangelola-validasi-perizinan');

        $roleAtasanLangsung = Role::findByName('atasan-langsung');
        $roleAtasanLangsung->givePermissionTo('mengelola-perizinan-atasan-langsung');

        $roleAtasanLangsung = Role::findByName('wadir');
        $roleAtasanLangsung->givePermissionTo('mangelola-perizinan-wadir');

    }
}
