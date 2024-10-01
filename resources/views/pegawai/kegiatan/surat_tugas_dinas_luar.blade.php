@extends('layouts.theme')

@section('content')

    <div class="container">
        <div>
            <p class="pb-1 font-bold">Surat Tugas Perjalanan Dinas</p>
        </div>
        <div class="flex flex-col">
            <div class=" overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Dikirim Pada
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Jenis Surat
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Nomor Surat
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Judul Surat
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
    
                                    @foreach ($surat as $log)
                                    {{-- @if ($log->jenis_surat == $jenisSurat) --}}
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $log->created_at->format('H:i d M Y') }}
                                            </td>
    
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $log->jenis_surat }}
    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $log->nomor_surat }}
                                                
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $log->judul }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">
                                                    <a href="{{ route('stpd.detail', ['id' => $log->id]) }}"
                                                        class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="12" />  <line x1="12" y1="16" x2="12.01" y2="16" /></svg>
                                                    </a>
                                                    
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
    
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="py-1 px-4">
                            {{ $perizinan->links() }}
                        </div> --}}
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
