@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="flex justify-between">
            <p class="pb-2 font-bold">Tes</p>
            <a href="{{ route('tes.create') }}">
            <button type="button"
                class="py-2 px-3 mb-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                Tambah
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
                                    placeholder="Cari Nama Tes ">
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
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Tes
                                        </th>


                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Skor Tes
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis
                                            Tes </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Penyelenggara </th>


                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($tes as $test)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $test->nama_tes}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $test->skor}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $test->jenis_tes}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $test->penyelenggara}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $test->tahun}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $test->status}}
                                        </td>

                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">New York No. 1 Lake Park</td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                            <div class="flex justify-end">

                                                @if ($test->status == 'pengajuan')
                                                        <form
                                                            action="{{ route('update-tes.verifikasi', ['id' => $test->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('post')

                                                            <input type="hidden" name="user_id"
                                                                value="{{ $test->user_id }}">
                                                            <button type="submit"
                                                                {{ $test->status != 'pengajuan' ? 'disabled' : '' }}
                                                                class="
                                                       
                                                                py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md
                                                                border-2 border-blue-200 font-semibold text-blue-500 hover:text-white
                                                                hover:bg-blue-500 hover:border-blue-500 focus:outline-none
                                                                focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all
                                                                text-sm dark:focus:ring-offset-gray-800">
                                                                Verifikasi
                                                            </button>

                                                        </form>


                                                        <form
                                                            action="{{ route('update-tes.ditolak', ['id' => $test->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('post')

                                                            <button type="submit"
                                                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                Tolak
                                                            </button>
                                                        </form>
                                                    @else
                                                        <p>sudah ditinjau</p>
                                                    @endif
                                            </div>



                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-1 px-4">
                            {{ $tes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
