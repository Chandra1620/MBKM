@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4 sm:px-6 lg:px-8 mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Edit Riwayat Pekerjaan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>
                <form method="POST" action="{{ route('riwayat-pekerjaan.update', $riwayatPekerjaan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Bidang Usaha -->
                    <div class="mb-4">
                        <label for="bidang_usaha" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Bidang Usaha</label>
                        <input type="text" name="bidang_usaha" id="bidang_usaha" value="{{ old('bidang_usaha', $riwayatPekerjaan->bidang_usaha) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('bidang_usaha')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenis Pekerjaan -->
                    <div class="mb-4">
                        <label for="jenis_pekerjaan" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jenis Pekerjaan</label>
                        <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" value="{{ old('jenis_pekerjaan', $riwayatPekerjaan->jenis_pekerjaan) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('jenis_pekerjaan')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-4">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $riwayatPekerjaan->jabatan) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('jabatan')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Instansi -->
                    <div class="mb-4">
                        <label for="instansi" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Instansi</label>
                        <input type="text" name="instansi" id="instansi" value="{{ old('instansi', $riwayatPekerjaan->instansi) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('instansi')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Divisi -->
                    <div class="mb-4">
                        <label for="divisi" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Divisi</label>
                        <input type="text" name="divisi" id="divisi" value="{{ old('divisi', $riwayatPekerjaan->divisi) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('divisi')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">{{ old('deskripsi', $riwayatPekerjaan->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Mulai Bekerja -->
                    <div class="mb-4">
                        <label for="mulai_bekerja" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Mulai Bekerja</label>
                        <input type="date" name="mulai_bekerja" id="mulai_bekerja" value="{{ old('mulai_bekerja', $riwayatPekerjaan->mulai_bekerja) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('mulai_bekerja')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Selesai Bekerja -->
                    <div class="mb-4">
                        <label for="selesai_bekerja" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Selesai Bekerja</label>
                        <input type="date" name="selesai_bekerja" id="selesai_bekerja" value="{{ old('selesai_bekerja', $riwayatPekerjaan->selesai_bekerja) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('selesai_bekerja')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Area Pekerjaan -->
                    <div class="mb-4">
                        <label for="area_pekerjaan" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Area Pekerjaan</label>
                        <input type="text" name="area_pekerjaan" id="area_pekerjaan" value="{{ old('area_pekerjaan', $riwayatPekerjaan->area_pekerjaan) }}"
                               class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @error('area_pekerjaan')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- File Pendukung -->
                    <div class="mb-4">
                        <label for="file_pendukung" class="block text-sm font-medium text-gray-700 dark:text-gray-400">File Pendukung</label>
                        <input type="file" name="file_pendukung" id="file_pendukung" class="block w-full shadow-sm text-sm rounded-lg border-gray-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
                        @if($riwayatPekerjaan->file_pendukung)
                            <small class="text-sm text-gray-600 dark:text-gray-400">File saat ini: {{ $riwayatPekerjaan->file_pendukung }}</small>
                        @endif
                        @error('file_pendukung')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
