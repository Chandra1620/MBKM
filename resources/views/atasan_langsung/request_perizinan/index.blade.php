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
                                        {{ $sisaCuti }}
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
                                                    <div class="text-center">
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
                                                    </div>

                                                    <div id="hs-cookies"
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
                                                                        <div
                                                                            class="w-[80px] h-[80px] rounded-full flex justify-center items-center {{ $izin->verifikasi_admin == null ? 'bg-blue-100' : 'bg-blue-700' }}">

                                                                            <div
                                                                                class="w-[70px] h-[70px] rounded-full  {{ $izin->verifikasi_admin == null ? 'bg-blue-100' : 'bg-blue-300' }} flex justify-center items-center">
                                                                                Admin
                                                                            </div>
                                                                        </div>
                                                                        {{-- TODO start garus --}}
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
                                                                        <div
                                                                            class="w-[80px] h-[80px] rounded-full {{ $izin->keputusan_pejabat_berwenang == 'proses' ? 'bg-blue-100' : 'bg-blue-700' }} flex justify-center items-center ">

                                                                            <div
                                                                                class="w-[70px] h-[70px] rounded-full  flex justify-center items-center  {{ $izin->keputusan_pejabat_berwenang == 'proses' ? 'bg-blue-100' : 'bg-blue-300' }}">
                                                                                Wadir
                                                                            </div>
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
                                                    </div>



                                                    @if ($izin->keputusan_pejabat_berwenang == 'diizinkan')
                                                        <a
                                                            href="{{ route('perizinan-cuti.exportPdf', ['id' => $izin->id]) }}">
                                                            <button type="button"
                                                                class="py-3 mr-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-yellow-200 font-semibold text-yellow-500 hover:text-white hover:bg-yellow-500 hover:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                Export PDF
                                                            </button>
                                                        </a>
                                                    @endif


                                                    @if ($izin->keputusan_pejabat_berwenang == 'proses')
                                                        <form
                                                            action="{{ route('perizinan-cuti.delete', ['id' => $izin->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif

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
