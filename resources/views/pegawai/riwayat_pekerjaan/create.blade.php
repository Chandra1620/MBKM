@extends('layouts.theme')
{{-- 'jabatan',
        'instansi',
        'divisi',
        'deskripsi_kerja',
        'mulai_bekerja',
        'selesai_bekerja',
        'area_pekerjaan',
        'file_pendukung', --}}

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Riwayat Pekerjaan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('riwayat-pekerjaan.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Bidang Usaha
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="bidang_usaha" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama bidang_usaha">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            jenis pekerjaan
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="jenis_pekerjaan" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama jenis_pekerjaan">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            jabatan
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="jabatan" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Instansi
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="instansi" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="instansi">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Divisi
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="divisi" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Divisi">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Deskripsi
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="deskripsi" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan Struktural">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Mulai Bekerja
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="mulai_bekerja" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="mulai bekerja">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Selesai Bekerja
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="selesai_bekerja" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="selesai bekerja">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Area Pekerjaan
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="area_pekerjaan" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Area Pekerjaan">
                        </div>


                    

                        <label class="inline-block text-sm font-medium dark:text-white">
                            File Pendukung
                        </label>

                        <div class="mt-2 space-y-3">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input name="file" type="file"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600"/>
                            </label>
                        </div>


                    </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Kembali
                        </button>
                        <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Simpan 
                        </button>
                    </div>

                </form>


            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
