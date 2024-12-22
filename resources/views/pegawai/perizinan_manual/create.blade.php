@extends('layouts.theme')

@section('content')
    <div class="container mx-auto py-6">
        <div class="max-w-4xl px-4 sm:px-6 lg:px-8 mx-auto">
            <!-- Card -->
            <div class="bg-white w-full rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Perizinan Cuti
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('perizinan-manual.store') }}">
                    @csrf

                    <!-- Pilih Pegawai -->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800">
                            Pilih Pegawai
                        </label>
                        <select name="user_id" id="user_id"
                            class="select2 py-2 px-3 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option disabled selected>Pilih Pegawai</option>
                            @foreach ($pegawai as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pilih Unit Kerja -->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800 dark:text-white">
                            Unit Kerja
                        </label>
                        <select name="unit_kerja_id"
                            class="py-2 px-3 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>Pilih Unit Kerja</option>
                            @foreach ($unitKerja as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('unit_kerja_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Jenis Cuti -->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800 dark:text-white">
                            Jenis Cuti
                        </label>
                        <select name="jenis_cuti"
                            class="py-2 px-3 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>Pilih Jenis Cuti</option>
                            @foreach ($jenisCuti as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Alasan -->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800 dark:text-white">
                            Alasan
                        </label>
                        <input name="alasan" type="text"
                            class="py-2 px-3 block w-full border-gray-200 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="Alasan">
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800 dark:text-white">
                            Tanggal Mulai
                        </label>
                        <input name="tgl_mulai" type="date"
                            class="py-2 px-3 block w-full border-gray-200 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800 dark:text-white">
                            Tanggal Selesai
                        </label>
                        <input name="tgl_selesai" type="date"
                            class="py-2 px-3 block w-full border-gray-200 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                    </div>

                    <!-- Nomor Telepon-->
                    <div class="mb-4">
                        <label class="inline-block text-sm font-medium text-gray-800 dark:text-white">
                            Nomor Telepon
                        </label>
                        <input name="no_telp_bisa_dihubungi" type="text"
                            class="py-2 px-3 block w-full border-gray-200 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-5 flex justify-end gap-2">
                        <button type="submit"
                            class="py-2 px-4 rounded-md bg-blue-500 text-white font-semibold hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Tambahkan jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> <!-- Tambahkan Select2 -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('#user_id').select2({
                placeholder: 'Pilih Pegawai',
                allowClear: true, // Tambahkan tombol clear
                width: '100%' // Sesuaikan lebar
            });
        });
    </script>
@endsection
