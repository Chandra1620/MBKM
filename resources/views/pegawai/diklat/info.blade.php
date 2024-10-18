@extends('layouts.theme')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-xl font-bold mb-4">Informasi Pelatihan</h1>
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
                        <td class="p-3 font-medium text-gray-900">Jenis Diklat</td>
                        <td class="p-3">{{ $diklat->jenis }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Nama diklat</td>
                        <td class="p-3">{{ $diklat->nama }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Penyelanggara</td>
                        <td class="p-3">{{ $diklat->penyelenggara }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Peran</td>
                        <td class="p-3">{{ $diklat->peran }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Tingkat Diklat</td>
                        <td class="p-3">{{ $diklat->tingkat_diklat }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Jumlah Jam</td>
                        <td class="p-3">{{ $diklat->jumlah_jam }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">No. Sertifikat</td>
                        <td class="p-3">{{ $diklat->no_sertifikat }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Tanggal Sertifikat</td>
                        <td class="p-3">{{ $diklat->tgl_sertifikat }}</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="p-3 font-medium text-gray-900">Tahun penyelenggara</td>
                        <td class="p-3">{{ $diklat->tahun_penyelenggaraan }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Tempat</td>
                        <td class="p-3">{{ $diklat->tempat }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Tanggal Mulai</td>
                        <td class="p-3">{{ $diklat->tanggal_mulai }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Tanggal Selesai</td>
                        <td class="p-3">{{ $diklat->tanggal_selesai }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Nomor SK Penugasan</td>
                        <td class="p-3">{{ $diklat->nomor_sk_penugasan }}</td>
                    </tr>
                    <tr class="bg-gray-50 border-b">
                        <td class="p-3 font-medium text-gray-900">Tanggal SK Penugasan</td>
                        <td class="p-3">{{ $diklat->tanggal_sk_penugasan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>        
        <div class="mt-4">
            <a href="{{ route('diklat.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Kembali</a>
        </div>
    </div>
@endsection
