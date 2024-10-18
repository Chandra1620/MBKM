@extends('layouts.theme')

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

                <form method="POST" action="{{ route('riwayat-pekerjaan.update', ['id' => $riwayat->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Bidang Usaha
                            </label>
                            <div class="relative">
                                <input name="bidang_usaha" type="text" value="{{ $riwayat->bidang_usaha }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama bidang usaha">
                                <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            jenis pekerjaan
                        </label>
                        <div class="relative">
                            <input name="jenis_pekerjaan" type="text" value="{{ $riwayat->jenis_pekerjaan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama jenis pekerjaan">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            jabatan
                        </label>
                        <div class="relative">
                            <input name="jabatan" type="text" value="{{ $riwayat->jabatan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <!-- End Form Group -->
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Instansi
                        </label>
                        <div class="relative">
                            <input name="instansi" type="text" value="{{ $riwayat->instansi }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="instansi">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Divisi
                        </label>
                        <div class="relative">
                            <input name="divisi" type="text" value="{{ $riwayat->divisi }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Divisi">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Deskripsi
                        </label>
                        <div class="relative">
                            <input name="deskripsi" type="text" value="{{ $riwayat->deskripsi }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Deskripsi">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Mulai Bekerja
                        </label>
                        <div class="relative">
                            <input name="mulai_bekerja" type="date" value="{{ $riwayat->mulai_bekerja }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="mulai bekerja">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Selesai Bekerja
                        </label>
                        <div class="relative">
                            <input name="selesai_bekerja" type="date" value="{{ $riwayat->selesai_bekerja }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="selesai bekerja">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Area Pekerjaan
                        </label>
                        <div class="relative">
                            <input name="area_pekerjaan" type="text" value="{{ $value->area_pekerjaan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Area Pekerjaan">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Jumlah semester harus lebih dari 0.</p> --}}
                    </div>
                    <div>
                        <label for="file_pendukung" class="block text-sm mb-2 dark:text-white">File
                            Pendukung
                        </label>
                        <div class="relative">
                            <input type="file" id="file_pendukung" name="file_pendukung"
                                value="{{ $riwayat->file_pendukung }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required>
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Jumlah SKS harus lebih dari 0.</p> --}}
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Card -->
    </div>
    </div>
@endsection
