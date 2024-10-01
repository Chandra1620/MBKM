@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="flex justify-between"> <!-- Tambahkan class flex justify-between di sini -->
            <div class="flex justify-between w-full" > <!-- Tambahkan class flex justify-between di sini -->
                <div>
                    <p class="pb-1 text-lg font-bold">
                        Detail
                        @if ($surat->jenis_surat == 'STPD')
                            Surat Tugas Perjalanan Dinas (STPD)
                        @elseif ($surat->jenis_surat == 'ST')
                            Surat Tugas (ST)
                        @elseif ($surat->jenis_surat == 'SK')
                            Surat Keputusan (SK)
                        @else
                            Jenis Surat Tidak Dikenal
                        @endif
                    </p>
                    <p class="text-xs">Dikirim pada : {{ $surat->created_at->translateDformat('H:i, d F Y') }}</p>
                    <br>
                </div>
                @if ($surat->jenis_surat == 'STPD')
                <div class="ml-auto"> <!-- Tambahkan class ml-auto di sini -->
                    <a href="@if ($surat->jenis_surat == 'STPD')
                        {{ route('export.stpd', ['id' => $surat->id]) }}
                        @elseif ($surat->jenis_surat == 'ST')
                        {{ route('management-surat-tugas.download', ['id' => $surat->id]) }}
                        @elseif ($surat->jenis_surat == 'SK')
                        {{ route('download.sk', ['id' => $surat->id]) }} @endif"
                        class="py-5 px-8 flex justify-center items-center h-[30px] w-[30px] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg class="flex-shrink-0 w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg" width="40"
                            height="40" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                        </svg>
                    </a>
                </div>
                @endif
            </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                            <div class="py-3 px-4">
                                <!-- Pencarian -->
                            </div>
                            
                            <!-- Detail Surat -->
                            <div class="flex flex-col">
                                <div class="-m-1.5 overflow-x-auto">
                                    <div class="p-1.5 min-w-full inline-block align-middle">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Judul
                                                            Surat</th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                            {{ $surat->judul }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Maksud Pengiriman Surat</th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            {{ $surat->deskripsi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Nomor
                                                            Surat</th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            {{ $surat->nomor_surat }}</td>
                                                    </tr>
                                                    @if ($surat->jenis_surat == 'SK')
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Penerima</th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            @foreach ($penerima as $user)
                                                                {{ $user->name }}<br>
                                                            @endforeach</td>
                                                    </tr>
                                                    @endif
                                                    @if ($surat->jenis_surat == 'ST')

                                                <tr>
                                                    <th scope="row"
                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                        Ketua</th>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $surat->ketua->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"
                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                        Anggota
                                                    </th>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        @foreach ($anggota as $user)
                                                            {{ $user->name }}<br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                @endif
                                                    @if ($surat->jenis_surat == 'STPD')
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Pembuat Komitmen</th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            {{ $surat->pembuatkomitmen->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Ketua</th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            {{ $surat->ketua->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            Anggota
                                                        </th>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            @foreach ($anggota as $user)
                                                                {{ $user->name }}<br>
                                                            @endforeach
    
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                Tempat
                                                                Berangkat</th>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $surat->tempat_berangkat }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th scope="row"
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                Tempat
                                                                Tujuan</th>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $surat->tempat_tujuan }}</td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th scope="row"
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                Biaya Perjalanan Dinas</th>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                Rp. {{ number_format($surat->biaya, 0, ',', '.') }},00</td>
                                                        </tr> --}}
                                                        <tr>
                                                            <th scope="row"
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                Catatan Lain-Lain</th>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $surat->catatan }}</td>
                                                        </tr>
                                                    @endif
                                                    @if ($surat->jenis_surat == 'STPD' || $surat->jenis_surat == 'ST')
                                                        <tr>
                                                            @php
                                                            // Menghitung lamanya perjalanan dinas
                                                            $tanggalBerangkat = \Carbon\Carbon::parse($surat->tgl_berangkat);
                                                            $tanggalKembali = \Carbon\Carbon::parse($surat->tgl_kembali); // ditambah 1 hari karena termasuk hari berangkat
                                                        @endphp
                                                            <th scope="row"
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                Tanggal
                                                                Berangkat</th>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $tanggalBerangkat->translatedFormat('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                Tanggal
                                                                Kembali</th>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $tanggalKembali->translatedFormat('d F Y') }}</td>
                                                        </tr>
                                                    @endif
                                                    
                                                <tr>
                                                  <th scope="row"
                                                      class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                      Lampiran Surat</th>
                                                  <td
                                                      class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                      {{ $surat->file_pendukung }}</td>
                                                      <td><a href="@if ($surat->jenis_surat == 'STPD')
                                                        {{ route('stpd.download', ['id' => $surat->id]) }}
                                                        @elseif ($surat->jenis_surat == 'ST')
                                                        {{ route('st.download', ['id' => $surat->id]) }}
                                                        @elseif ($surat->jenis_surat == 'SK')
                                                        {{ route('sk.download', ['id' => $surat->id]) }}
                                                        @endif"
                                                        class="py-1 px-2 flex justify-center items-center h-[30px] w-[30px] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                                                        </svg>
                                                    </a></td>
                                              </tr>
                                                <!-- Tambahkan baris lain sesuai dengan atribut surat yang ingin ditampilkan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-1 px-4">
                            {{-- {{ $perizinan->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
