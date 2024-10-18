@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Pendidikan Formal
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('pendidikanformal.update', ['id' => $pendidikan->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="nama_perguruan_tinggi" class="block text-sm mb-2 dark:text-white">Nama Perguruan
                                Tinggi*</label>
                            <div class="relative">
                                <input type="text" id="nama_perguruan_tinggi"
                                    value="{{ $pendidikan->nama_perguruan_tinggi ?? '' }}" name="nama_perguruan_tinggi"
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
                            {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div>
                        <label for="program_studi" class="block text-sm mb-2 dark:text-white">Program Studi*</label>
                        <div class="relative">
                            <input type="text" id="program_studi" name="program_studi"
                                value="{{ $pendidikan->program_studi ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div>
                        <label for="gelar_akademik" class="block text-sm mb-2 dark:text-white">Gelar Akademik</label>
                        <div class="relative">
                            <input type="text" id="gelar_akademik" name="gelar_akademik"
                                value="{{ $pendidikan->gelar_akademik ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <!-- End Form Group -->
                    <div>
                        <label for="bidang_studi" class="block text-sm mb-2 dark:text-white">Bidang Studi*</label>
                        <div class="relative">
                            <input type="text" id="bidang_studi" name="bidang_studi"
                                value="{{ $pendidikan->bidang_studi ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label for="tahun_masuk" class="block text-sm mb-2 dark:text-white">Tahun Masuk*</label>
                        <div class="relative">
                            <input type="number" id="tahun_masuk" name="tahun_masuk"
                                value="{{ $pendidikan->tahun_masuk ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label for="tahun_lulus" class="block text-sm mb-2 dark:text-white">Tahun Lulus*</label>
                        <div class="relative">
                            <input type="number" id="tahun_lulus" name="tahun_lulus"
                                value="{{ $pendidikan->tahun_lulus ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label for="tanggal_kelulusan" class="block text-sm mb-2 dark:text-white">Tanggal
                            Kelulusan*</label>
                        <div class="relative">
                            <input type="date" id="tanggal_kelulusan" name="tanggal_kelulusan"
                                value="{{ $pendidikan->tanggal_kelulusan ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label for="nim" class="block text-sm mb-2 dark:text-white">Nomor Induk Mahasiswa*</label>
                        <div class="relative">
                            <input type="text" id="nim" name="nim" value="{{ $pendidikan->nim ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required pattern="\d{7}" title="NIM harus terdiri dari 7 digit angka.">
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
                        <label for="jumlah_semester_tempuh" class="block text-sm mb-2 dark:text-white">Jumlah Semester
                            Tempuh*</label>
                        <div class="relative">
                            <input type="number" id="jumlah_semester_tempuh" name="jumlah_semester_tempuh"
                                value="{{ $pendidikan->jumlah_semester_tempuh ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required min="1" title="Jumlah semester harus lebih dari 0.">
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
                        <label for="jumlah_sks_kelulusan" class="block text-sm mb-2 dark:text-white">Jumlah SKS
                            Kelulusan*</label>
                        <div class="relative">
                            <input type="number" id="jumlah_sks_kelulusan" name="jumlah_sks_kelulusan"
                                value="{{ $pendidikan->jumlah_sks_kelulusan ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required min="1" title="Jumlah SKS harus lebih dari 0.">
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
                    <div>
                        <label for="ipk_kelulusan" class="block text-sm mb-2 dark:text-white">IPK Kelulusan *</label>
                        <div class="relative">
                            <input type="number" step="0.01" id="ipk_kelulusan" name="ipk_kelulusan"
                                value="{{ $pendidikan->ipk_kelulusan ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required min="0" max="4.0"
                                title="Masukkan nilai IPK antara 0.00 hingga 4.00.">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">IPK harus antara 0.00 hingga 4.00.</p> --}}
                    </div>
                    <div>
                        <label for="nomor_sk_penyetaraan" class="block text-sm mb-2 dark:text-white">Nomor SK
                            Penyetaraan</label>
                        <div class="relative">
                            <input type="text" id="nomor_sk_penyetaraan" name="nomor_sk_penyetaraan"
                                value="{{ $pendidikan->nomor_sk_penyetaraan ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Nomor SK Penyetaraan harus diisi.</p> --}}
                    </div>
                    <div>
                        <label for="tanggal_sk_penyetaraan" class="block text-sm mb-2 dark:text-white">Tanggal SK
                            Penyetaraan</label>
                        <div class="relative">
                            <input type="date" id="tanggal_sk_penyetaraan" name="tanggal_sk_penyetaraan"
                                value="{{ $pendidikan->tanggal_sk_penyetaraan ?? '' }}"
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
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Tanggal SK Penyetaraan harus diisi.</p> --}}
                    </div>
                    <div>
                        <label for="nomor_ijazah" class="block text-sm mb-2 dark:text-white">Nomor Ijazah</label>
                        <div class="relative">
                            <input type="text" id="nomor_ijazah" name="nomor_ijazah"
                                value="{{ $pendidikan->nomor_ijazah ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required>
                            <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Nomor Ijazah harus diisi.</p> --}}
                    </div>
                    <div>
                        <label for="judul_tesis" class="block text-sm mb-2 dark:text-white">Judul Tesis/Disertasi</label>
                        <div class="relative">
                            <input type="text" id="judul_tesis" name="judul_tesis"
                                value="{{ $pendidikan->judul_tesis ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required>
                            <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Judul tesis/disertasi harus diisi.</p> --}}
                    </div>
                    <div>
                        <label for="file_pendukung" class="block text-sm mb-2 dark:text-white">File Pendukung</label>
                        <div class="relative">
                            <input type="file" id="file_pendukung" name="file_pendukung"
                                value="{{ $pendidikan->file_pendukung ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required>
                            <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">File pendukung harus diunggah.</p> --}}
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
