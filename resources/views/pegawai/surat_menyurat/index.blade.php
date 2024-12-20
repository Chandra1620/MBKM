@extends('layouts.theme')

@section('content')
    <div class="container">


        <div class="">
            <p class="pb-2 font-bold">Surat Menyurat</p>
            <a href="{{ route('surat.create') }}">
                <button type="button"
                    class="py-2 mt-8 px-3 mb-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    Buat Surat
                </button>
            </a>
        </div>
        <div class="flex flex-col">
            <div class=" overflow-x-auto">
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

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($surat as $item)
                                    <a href="{{ route('surat.detail', ['id' => $item->id]) }}">

                                            <td class="w-[100px] px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <a href="{{ route('surat.detail', ['id' => $item->id]) }}">
                                                        <p class="font-semibold">
                                                            @if ($item->is_read == 0)
                                                            <button type="button" class="mr-1 py-1 px-1 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                Pesan Baru
                                                              </button>
                                                            @endif
                                                            
                                                            {{ $item->pengirim->name }}</p>
                                                    
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <a href="{{ route('surat.detail', ['id' => $item->id]) }}">
                                                    <div>
                                                
                                                {{ $item->jenis_surat }}
                                            </div>

                                            </a>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <a href="{{ route('surat.detail', ['id' => $item->id]) }}">
                                                    <div>
                                                
                                                {{ $item->judul }}
                                            </div>

                                            </a>

                                            </td>
                                            <td class="w-[40px] px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <a href="{{ route('surat.detail', ['id' => $item->id]) }}">
                                                
                                                21 okt
                                            </a>

                                            </td>
                                        </tr>
              

                                    @endforeach
                                </tbody>
                                
                                
                            </table>
                        </div>
                        <div class="py-1 px-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
