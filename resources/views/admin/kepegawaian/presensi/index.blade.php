@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="">
            <p class="pb-2 font-bold">Management Presensi</p>
            <div class="flex justify-between">
                <a href="{{ route('managementpresensi.create') }}">
                <button type="button"
                    class="py-2 px-3 mb-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    Buat
                </button>
            </a>
                <div>
                <div class="text-center">
                <button type="button"
                    class="py-2 px-3 mb-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#hs-modal-signin">
                    Upload File
                </button>
            </div>
            </div>
            
            

            <div id="hs-modal-signin"
                class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Riwayat Kehadiran</h2>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    Politeknik Negeri Indramayu
                                </p>
                            </div>

                            <div class="mt-5">

                                <div
                                    class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">
                                    Or</div>

                                <!-- Form -->
                                {{-- <form action="{{ route('managementpresensi.storeexcel') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input name="file" type="file">
                            <button type="submit">gas</button>
                        </form> --}}

                                <form action="{{ route('managementpresensi.storeexcel') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <div class="grid gap-y-4">
                                        <!-- Form Group -->
                                        <label class="inline-block text-sm font-medium dark:text-white">
                                            File Pendukung
                                        </label>

                                        <div class=" space-y-3">
                                            <label class="block">
                                                <span class="sr-only">Upload File</span>
                                                <input name="file" type="file" accept=".xls, .xlsx"
                                                    class="block w-full text-sm text-gray-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-md file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-blue-500 file:text-white
                                                hover:file:bg-blue-600" />
                                            </label>

                                        </div>
                                        <!-- End Checkbox -->

                                        <button type="submit"
                                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Upload
                                            File</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
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
                                    placeholder="Cari Berita">
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
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIP</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam
                                            Masuk</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam
                                            Keluar</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam
                                            Tanggal</th>

                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($berita as $news)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $news->user->nip }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $news->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"
                                                style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $news->status }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"
                                                style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $news->jam_masuk }}

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"
                                                style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $news->jam_keluar }}

                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-nowrap max-w-xs text-sm text-gray-800 dark:text-gray-200">
                                                <div class="w-[50px] h-50px">
                                                    {{ $news->tanggal_kehadiran }}

                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">

                                                    <a href="{{ route('managementpresensi.edit', ['id' => $news->id]) }}">
                                                        <button type="button"
                                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-yellow-200 font-semibold text-yellow-500 hover:text-white hover:bg-yellow-500 hover:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                            Update
                                                        </button>
                                                    </a>


                                                    <form
                                                        action="{{ route('managementpresensi.destroy', ['id' => $news->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
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
                        <div class="py-1 px-4">
                            {{ $berita->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $errors->first() }}',
                });
            </script>
        @endif
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif
    </div>
@endsection
