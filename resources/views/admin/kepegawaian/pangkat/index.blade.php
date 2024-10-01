@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="flex justify-between">
            <p class="pb-2 font-bold">Pangkat dan Golongan</p>
            <a href="{{ route('admin-pangkat-golongan.create') }}">
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
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Nama Pegawai</th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Golongan/Pangkat
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nomor SK
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

                                    @foreach ($pangkatGolongans as $golongan)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $golongan->user->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $golongan->pangkat_golongan }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $golongan->nomor_sk }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $golongan->status }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">
                                                    @if ($golongan->status == 'pengajuan')
                                                    <form
                                                        action="{{ route('admin-pangkat-golongan.verifikasi', ['id' => $golongan->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('post')

                                                        <input type="hidden" name="user_id" value="{{ $golongan->user_id }}">
                                                        <button type="submit"
                                                        class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />  <polyline points="22 4 12 14.01 9 11.01" /></svg>
                                                        
                                                        </button>
                                                    </form>
                                                    <form
                                                    action="{{ route('admin-pangkat-golongan.tolak_verifikasi', ['id' => $golongan->id]) }}">
                                                    @csrf
                                                    <button type="submit"
                                                    class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                                                        
                                                    </button>
                                                </form>
                                                    @endif
                                                    
                                                    <a href="{{ route('admin-pangkat-golongan.detail', ['id' => $golongan->id]) }}"
                                                        class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <line x1="12" y1="8" x2="12"
                                                                y2="12" />
                                                            <line x1="12" y1="16" x2="12.01"
                                                                y2="16" />
                                                        </svg>
                                                    </a>
                                                    @if ($golongan->status == 'diverifikasi' || $golongan->status == 'ditolak')
                                                    <form
                                                    action="{{ route('admin-pangkat-golongan.delete', ['id' => $golongan->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                    class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    <svg class="h-10 w-10 text-white" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <line x1="4" y1="7" x2="20"
                                                            y2="7" />
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17" />
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    </button>
                                                </form>
                                                    {{-- <a href="{{ route('admin-pangkat-golongan.edit', ['id' => $golongan->id]) }}"
                                                        class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                          </svg>
                                                          
                                                    </a> --}}
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-1 px-4">
                            {{-- {{ $sertifikasi->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
