{{-- @dd($perizinan) --}}
@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="flex justify-between">
            <div class="pb-2">
                <p class=" font-bold">Perizinan Cuti</p>
                <div class="flex">
                    <a class="mr-2 group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800"
                        href="#">
                        <div class="p-4 md:p-5">
                            <div class="flex">
                                <svg class="mt-1 shrink-0 w-5 h-5 text-gray-800 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                    <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                </svg>

                                <div class="grow ml-5">
                                    <h3
                                        class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                        {{ $izinCutiSisa->n }}
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        Total Sisa Cuti Tahunan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a><a
                        class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800"
                        href="#">
                        <div class="p-4 md:p-5">
                            <div class="flex">
                                <svg class="mt-1 shrink-0 w-5 h-5 text-gray-800 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                    <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                </svg>

                                <div class="grow ml-5">
                                    <h3
                                        class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                        {{ $totalCutiDiambil }}
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        Jatah Cuti 1 tahun <br />
                                        sudah diambil
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <a href="{{ route('perizinan-cuti.create') }}">

                <button type="button"
                    class="py-2 px-3 mb-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    Buat
                </button>
            </a>
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
                                    placeholder="Search for items">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
                                    <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
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
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl
                                            Ajuan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alasan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis
                                            Cuti
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl
                                            Mulai
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl
                                            Selesai
                                        </th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Persetujuan Atasan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Persetujuan Wadir
                                        </th> --}}

                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($perizinan as $izin)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->created_at }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->alasan }}

                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->jeniscuti->name }}


                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->tgl_mulai }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->tgl_selesai }}

                                            </td>
                                            {{-- <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->pertimbangan_atasan_langsung }}

                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $izin->keputusan_pejabat_berwenang }}

                                            </td> --}}
                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">New York No. 1 Lake Park</td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">
                                                    {{-- <div class="text-center">
                                                        <button type="button"
                                                            class="py-3 mr-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                            data-hs-overlay="#hs-cookies">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>
                                                            Tracer
                                                        </button>
                                                    </div> --}}
                                                    <a href="{{ route('perizinan-cuti.pdfStream', ['id' => $izin->id, 'id_pegawai' => $izin->user_id]) }}"
                                                        class="flex justify-center items-center gap-3 px-3 py-4 me-2 rounded-md border-2 border-orange-200 font-semibold text-orange-500 hover:text-white hover:bg-orange-500 hover:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-eye"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                        </svg>
                                                        Overview
                                                    </a>
                                                    <a href="{{ route('perizinan-cuti.pdfExporting', ['id' => $izin->id, 'id_pegawai' => $izin->user_id]) }}"
                                                        class="flex justify-center items-center gap-3 px-3 py-4 me-2 rounded-md border-2 border-green-200 font-semibold text-green-500 hover:text-white hover:bg-green-500 hover:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-download"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                            <path
                                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                        </svg>
                                                        Download
                                                    </a>
                                                    <!-- <div id="hs-cookies"
                                                        class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto">
                                                        <div
                                                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                            <div
                                                                class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                                                                <div class="absolute top-2 end-2">
                                                                    <button type="button"
                                                                        class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                                        data-hs-overlay="#hs-cookies">
                                                                        <span class="sr-only">Close</span>
                                                                        <svg class="flex-shrink-0 w-4 h-4"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path d="M18 6 6 18" />
                                                                            <path d="m6 6 12 12" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="p-4 sm:p-14 text-center overflow-y-auto">
                                                                    {{-- !start tracking --}}
                                                                    <div class="flex items-center">
                                                                        <div class="w-[80px] h-[80px] rounded-full flex justify-center items-center {{ $izin->verifikasi_admin == null ? 'bg-blue-100' : 'bg-blue-700' }}">
                                                                            <div class="w-[70px] h-[70px] rounded-full  {{ $izin->verifikasi_admin === null ? 'bg-blue-100' : 'bg-blue-300' }} flex justify-center items-center">Admin</div>
                                                                        </div>
                                                                        {{-- TODO start garis --}}
                                                                        <div
                                                                            class="w-[50px] h-[5px] {{ $izin->verifikasi_admin == null ? 'bg-blue-100' : 'bg-blue-700' }}">
                                                                        </div>
                                                                        {{-- TODO end garis --}}
                                                                        <div
                                                                            class="w-[80px] h-[80px] rounded-full flex justify-center items-center {{ $izin->pertimbangan_atasan_langsung == 'proses' ? 'bg-blue-100' : 'bg-blue-700' }} ">

                                                                            <div
                                                                                class="w-[70px] h-[70px] rounded-full  {{ $izin->pertimbangan_atasan_langsung == 'proses' ? 'bg-blue-100' : 'bg-blue-300' }} flex justify-center items-center">
                                                                                Atasan
                                                                            </div>
                                                                        </div>
                                                                        {{-- TODO start garus --}}
                                                                        <div
                                                                            class="w-[50px] h-[5px] {{ $izin->pertimbangan_atasan_langsung == 'proses' ? 'bg-blue-100' : 'bg-blue-700' }}">
                                                                        </div>
                                                                        {{-- TODO end garis --}}
                                                                        <div class="w-[80px] h-[80px] rounded-full {{ $izin->keputusan_pejabat_berwenang == 'proses' ? 'bg-blue-100' : 'bg-blue-700' }} flex justify-center items-center ">
                                                                            <div class="w-[70px] h-[70px] rounded-full  flex justify-center items-center  {{ $izin->keputusan_pejabat_berwenang == 'proses' ? 'bg-blue-100' : 'bg-blue-300' }}">Wadir</div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- !end tracking --}}
                                                                </div>
                                                                <div class="p-4">
                                                                    <div class="flex items-center">
                                                                        <div
                                                                            class="w-[30px] h-[30px] rounded-full bg-blue-700 flex justify-center items-center ">
                                                                            <div
                                                                                class="w-[20px] h-[20px] rounded-full  bg-blue-300 flex justify-center items-center">

                                                                            </div>
                                                                        </div>
                                                                        <p> &nbsp; Sudah divalidasi</p>
                                                                    </div>
                                                                    <div class="flex items-center mt-2">
                                                                        <div
                                                                            class="w-[30px] h-[30px] rounded-full bg-blue-100 flex justify-center items-center ">
                                                                            <div
                                                                                class="w-[20px] h-[20px] rounded-full  bg-white flex justify-center items-center">

                                                                            </div>
                                                                        </div>
                                                                        <p> &nbsp; belum divalidasi</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    @if ($izin->keputusan_pejabat_berwenang == 'proses')
                                                        <form
                                                            action="{{ route('perizinan-cuti.delete', ['id' => $izin->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800 h-full">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                    <path
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-3 flex gap-3 items-center" colspan="2">
                                                <span>Status Persetujuan:</span>
                                                <div id="approval-status" class="flex">
                                                    <div id="admin-kepegawaian" class="flex items-center">
                                                        @if ($izin->verifikasi_admin == null)
                                                            <div class="w-4 h-4 border outline-2 outline outline-slate-300 rounded-full bg-slate-200"></div>
                                                            <div class="bg-slate-300 borderline h-1 w-3"></div>
                                                            <div class="bg-slate-300 borderline h-1 w-3"></div>
                                                        @else   
                                                            <div class="w-4 h-4 border outline-2 outline outline-blue-700 rounded-full bg-blue-700"></div>
                                                            <div class="bg-blue-700 borderline h-1 w-3"></div>
                                                            @if ($izin->pertimbangan_atasan_langsung == "disetujui")
                                                                <div class="bg-blue-700 borderline h-1 w-3"></div>
                                                            @else
                                                                <div class="bg-slate-300 borderline h-1 w-3"></div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div id="atasan-langsung" class="flex items-center">
                                                        @if ($izin->pertimbangan_atasan_langsung == "proses")
                                                            <div class="w-4 h-4 border outline-2 outline outline-slate-300 rounded-full bg-slate-200"></div>
                                                            <div class="bg-slate-300 borderline h-1 w-3"></div>
                                                            <div class="bg-slate-300 borderline h-1 w-3"></div>
                                                        @else
                                                            <div class="w-4 h-4 border outline-2 outline outline-blue-700 rounded-full bg-blue-700"></div>
                                                            <div class="bg-blue-700 borderline h-1 w-3"></div>
                                                            @if ($izin->keputusan_pejabat_berwenang == "disetujui")
                                                                <div class="bg-blue-700 borderline h-1 w-3"></div>
                                                            @else
                                                                <div class="bg-slate-300 borderline h-1 w-3"></div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div id="wakil-direktur" class="flex items-center">
                                                        @if ($izin->keputusan_pejabat_berwenang == "proses")
                                                            <div class="w-4 h-4 border outline-2 outline outline-slate-300 rounded-full bg-slate-200"></div>
                                                        @else   
                                                            <div class="w-4 h-4 border outline-2 outline outline-blue-700 rounded-full bg-blue-700"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-1 px-4">
                            {{ $perizinan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif

    </div>
@endsection
