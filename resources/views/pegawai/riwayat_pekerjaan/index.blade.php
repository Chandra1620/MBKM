@extends('layouts.theme')

@section('content')
    <div class="container">
        <div>
            <p class="pb-1 font-bold">Riwayat Pekerjaan</p>
            <div class="text-right">
                <button type="button"
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800 mb-4"
                    data-hs-overlay="#hs-modal-signup">
                    Tambah
                </button>
            </div>

            <div id="hs-modal-signup"
                class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Riwayat Pekerjaan
                                </h2>
                            </div>

                            <div class="mt-5">
                                <div
                                    class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:mr-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ml-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">
                                    Or</div>

                                <!-- Form -->
                                <form method="POST" action="{{ route('riwayat-pekerjaan.store') }}">
                                    @csrf
                                    <div class="grid gap-y-4">
                                        <!-- Form Group -->
                                        <div>
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Bidang Usaha
                                            </label>
                                            <div class="relative">
                                                <input name="bidang_usaha" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama bidang usaha">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                jenis pekerjaan
                                            </label>
                                            <div class="relative">
                                                <input name="jenis_pekerjaan" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama jenis pekerjaan">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="jabatan" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama Jabatan">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="instansi" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="instansi">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="divisi" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Divisi">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="deskripsi" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Deskripsi">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="mulai_bekerja" type="date"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="mulai bekerja">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="selesai_bekerja" type="date"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="selesai bekerja">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
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
                                                <input name="area_pekerjaan" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Area Pekerjaan">
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                                        </div>

                                        <div>
                                            <label for="file_pendukung" class="block text-sm mb-2 dark:text-white">File
                                                Pendukung
                                            </label>
                                            <div class="relative">
                                                <input type="file" id="file_pendukung" name="file_pendukung"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                    required>
                                                <div
                                                    class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                                    <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                                        </div>
                                        <button type="submit"
                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800 mb-4">
                                            Tambah
                                        </button>

                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                        <div class="py-3 px-4">
                            <div class="relative max-w-xs">
                                <label for="hs-table-with-pagination-search" class="sr-only">Search</label>
                                <input type="text" name="hs-table-with-pagination-search"
                                    id="hs-table-with-pagination-search"
                                    class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Cari Riwayat Pendidikan ">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
                                    <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bidang
                                            Usaha </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis
                                            Pekerjaan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jabatan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Instansi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Divisi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mulai
                                            Bekerja </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Selesai
                                            Bekerja</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($riwayatPekerjaan as $riwayat)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->bidang_usaha }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->jenis_pekerjaan }}
                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->jabatan }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->instansi }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->divisi }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->mulai_bekerja }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->selesai_bekerja }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $riwayat->status }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">
                                                    <a href="{{ route('riwayat-pekerjaan.info', $riwayat->id) }}"
                                                        class="ml-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-yellow-200 font-semibold text-yellow-500 hover:text-white hover:bg-yellow-500 hover:border-yelow-500 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                        Info</a>
                                                    @if ($riwayat->status == 'pengajuan')
                                                        <a href="{{ route('riwayat-pekerjaan.edit', ['id' => $riwayat->id]) }}">
                                                            <button type="button"
                                                                class="ml-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                Edit
                                                            </button>
                                                        </a>
                                                    @endif
                                                    <form
                                                        action="{{ route('riwayat-pekerjaan.delete', ['id' => $riwayat->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="ml-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
