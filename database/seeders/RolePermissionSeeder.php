<?php

namespace Database\Seeders;

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
        // List of permissions
        $permissions = [
            'mengelola-role-permission',
            'mengelola-role',
            'mengelola-permission',
            'mengelola-user-role',
            'mangelola-validasi-perizinan',
            'mangelola-perizinan-wadir',
            'mengelola-perizinan-atasan-langsung',
            'mengelola-unit-kerja',
            'mengelola-jabatan-struktural',
            'mengelola-pegawai-struktural',
            'mengelola-pegawai-fungsional',
            'mengelola-pangkat-golongan',
            'mengelola-surat-tugas-penelitian',
            'mengelola-surat-tugas-dinas',
            'mengelola-surat-keputusan',
            'mengelola-berita',
            'data-pegawai',
            'mengelola-presensi',
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        // List of roles
        $roles = [
            'admin',
            'admin-pegawai',
            'wadir',
            'atasan-langsung',
        ];

        // Create roles if they don't exist
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Assign permissions to roles
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->syncPermissions([
            'mengelola-role-permission',
        ]);

        $roleAdminPegawai = Role::findByName('admin-pegawai');
        $roleAdminPegawai->syncPermissions([
            'mengelola-role-permission',
            'mengelola-unit-kerja',
            'mengelola-jabatan-struktural',
            'mengelola-pegawai-struktural',
            'mengelola-pegawai-fungsional',
            'mengelola-pangkat-golongan',
            'mengelola-surat-tugas-penelitian',
            'mengelola-surat-tugas-dinas',
            'mengelola-surat-keputusan',
            'mengelola-berita',
            'data-pegawai',
            'mengelola-presensi',
            'mangelola-validasi-perizinan',
        ]);

        $roleAtasanLangsung = Role::findByName('atasan-langsung');
        $roleAtasanLangsung->syncPermissions([
            'mengelola-perizinan-atasan-langsung',
        ]);

        $roleWadir = Role::findByName('wadir');
        $roleWadir->syncPermissions([
            'mangelola-perizinan-wadir',
        ]);
    }
}
