@extends('layouts.theme')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-xl font-bold mb-4">Informasi Riwayat Pekerjaan</h1>
        <div class="bg-white shadow-md rounded-lg p-5">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="text-center p-3 font-semibold">Keterangan</th>
                        <th class="text-center p-3 font-semibold">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Bidang Usaha</td>
                        <td class="p-3">{{ $riwayatPekerjaan->bidang_usaha }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Jenis Pekerjaan</td>
                        <td class="p-3">{{ $riwayatPekerjaan->jenis_pekerjaan }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Jabatan</td>
                        <td class="p-3">{{ $riwayatPekerjaan->jabatan }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Instansi</td>
                        <td class="p-3">{{ $riwayatPekerjaan->instansi }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Divisi</td>
                        <td class="p-3">{{ $riwayatPekerjaan->divisi }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Deskripsi</td>
                        <td class="p-3">{{ $riwayatPekerjaan->deskripsi_kerja }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Mulai Bekerja</td>
                        <td class="p-3">{{ $riwayatPekerjaan->mulai_bekerja }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Selesai Bekerja</td>
                        <td class="p-3">{{ $riwayatPekerjaan->selesai_bekerja }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Area Pekerjaan</td>
                        <td class="p-3">{{ $riwayatPekerjaan->area_pekerjaan }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">File Pendukung</td>
                        <td class="p-3">{{ $riwayatPekerjaan->file_pendukung }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <a href="{{ route('riwayat-pekerjaan.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Kembali</a>
        </div>
    </div>
@endsection
