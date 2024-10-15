@extends('layouts.theme')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-xl font-bold mb-4">Informasi Pendidikan Formal</h1>
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
                        <td class="p-3 font-medium text-gray-900">Nama Perguruan Tinggi</td>
                        <td class="p-3">{{ $pendidikan->nama_perguruan_tinggi }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Program Studi</td>
                        <td class="p-3">{{ $pendidikan->program_studi }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Gelar Akademik</td>
                        <td class="p-3">{{ $pendidikan->gelar_akademik }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Bidang Studi</td>
                        <td class="p-3">{{ $pendidikan->bidang_studi }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Tahun Masuk</td>
                        <td class="p-3">{{ $pendidikan->tahun_masuk }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Tahun Lulus</td>
                        <td class="p-3">{{ $pendidikan->tahun_lulus }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">NIM</td>
                        <td class="p-3">{{ $pendidikan->nim }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">IPK</td>
                        <td class="p-3">{{ $pendidikan->ipk_kelulusan }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Nomor Ijazah</td>
                        <td class="p-3">{{ $pendidikan->nomor_ijazah }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">File Pendukung</td>
                        <td class="p-3">{{ $pendidikan->file_pendukung }}</td>
                    </tr>
                </tbody>
            </table>
        </div>        
        <div class="mt-4">
            <a href="{{ route('pendidikanformal.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Kembali</a>
        </div>
    </div>
@endsection
