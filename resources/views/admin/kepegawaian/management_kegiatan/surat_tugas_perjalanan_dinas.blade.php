@extends('layouts.theme')

@section('content')
    <div class="container">
        <div>
            <p class="pb-1 font-bold">Management Surat Tugas Dinas Luar</p>
            <div class="">
                <button type="button"
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#hs-modal-signup">
                    Kirim Surat
                </button>
            </div>

            <div id="hs-modal-signup"
                class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Kirim Surat</h2>
                            </div>

                            <div class="mt-5">

                                <div
                                    class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:mr-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ml-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">
                                    ||</div>

                                <!-- Form -->
                                <form method="POST" action="{{ route('management-surat-tugas-dinas.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Section -->
                                    <div
                                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Jenis Surat</label>
                                            <select name="jenis_surat" id="kategori" disabled
                                                class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                {{-- <option value="SK">Surat Keputusan (SK)</option>
                                                <option value="ST">Surat Tugas (ST)</option> --}}
                                                <option value="STPD">Surat Tugas Perjalanan Dinas (STPD)</option>
                                            </select>
                                        </div>

                                        <div id="personal">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Pembuat Komitmen (Max.1)
                                            </label>

                                            <div class="mt-2 space-y-3">
                                                <input id="creator-search" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama Pembuat Komitmen">
                                            </div>

                                            <!-- Display search results in a dropdown -->
                                            <div id="creator-results" class="mt-2 space-y-3"></div>

                                            <!-- Display selected creators -->
                                            <div id="selected-creators" class="mt-4">
                                                <p>Daftar Pembuat Komitmen yang Dipilih:</p>
                                                <ul id="selected-creator-list"></ul>
                                            </div>

                                            <!-- Hidden input to store selected creators as JSON string -->
                                            <input type="hidden" name="selected_creators" id="selected-creators-input">
                                            <input type="hidden" name="creatorsSelected" id="creatorsSelected">
                                        </div>

                                        <div id="team">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Ketua (Max.1)
                                            </label>

                                            <div class="mt-2 space-y-3">
                                                <input id="leader-search" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama Ketua">
                                            </div>

                                            <!-- Display search results in a dropdown -->
                                            <div id="leader-results" class="mt-2 space-y-3"></div>

                                            <!-- Display selected leaders -->
                                            <div id="selected-leaders" class="mt-4">
                                                <p>Daftar Ketua yang Dipilih:</p>
                                                <ul id="selected-leader-list"></ul>
                                            </div>

                                            <!-- Hidden input to store selected leaders as JSON string -->
                                            <input type="hidden" name="selected_leaders" id="selected-leaders-input">
                                            <input type="hidden" name="leadersSelected" id="leadersSelected">
                                        </div>

                                        <div id="team-members">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Anggota (Bisa Pilih >= 1)
                                            </label>

                                            <div class="mt-2 space-y-3">
                                                <input id="member-search" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama Anggota">
                                            </div>

                                            <!-- Display search results in a dropdown -->
                                            <div id="member-results" class="mt-2 space-y-3"></div>

                                            <!-- Display selected members -->
                                            <div id="selected-members" class="mt-4">
                                                <p>Daftar Anggota yang Dipilih:</p>
                                                <ul id="selected-member-list"></ul>
                                            </div>

                                            <!-- Hidden input to store selected members as JSON string -->
                                            {{-- <input type="hidden" name="selected_members" id="selected-members-input"> --}}
                                            <input type="hidden" name="membersSelected[]" id="membersSelected">
                                        </div>


                                        <div id="judul">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Judul
                                            </label>
                                            <div class="mt-2 space-y-3">
                                                <input name="judul" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Masukkan Judul Surat">
                                            </div>
                                        </div>

                                        <div id="deskripsi">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Maksud Pengiriman Surat
                                            </label>
                                            <div class="mt-2 space-y-3">
                                                <input type="text" name="deskripsi"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Masukkan maksud dari surat yang dikirim">
                                            </div>
                                        </div>


                                        <div>
                                            <label for="nomor_sk" class="block text-sm mb-2 dark:text-white">Nomor
                                                Surat Tugas</label>
                                            <div class="mt-2 space-y-3">
                                                <input name="nomor_surat" id="nomor_sk" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Isi Nomor Surat Tugas">
                                            </div>
                                        </div>

                                        <div id="tempat_berangkat">
                                            <label for="tempat_berangkat"
                                                class="block text-sm mb-2 dark:text-white">Tempat Berangkat</label>
                                            <div class="relative">
                                                <div class="mt-2 space-y-3">
                                                    <input name="tempat_berangkat" type="text"
                                                        class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                        placeholder="Masukkan Tempat Berangkat (Contoh: Indramayu, Jawa Barat)">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="kota_tujuan">
                                            <label for="kota_tujuan" class="block text-sm mb-2 dark:text-white">Kota
                                                Tujuan/Provinsi</label>
                                            <div class="relative">
                                                <div class="mt-2 space-y-3">
                                                    <input name="tempat_tujuan" type="text"
                                                        class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                        placeholder="Masukkan Tempat Tujuan (Contoh: Bandung, Jawa Barat)">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="transportasi">
                                            <label for="transportasi" class="block text-sm mb-2 dark:text-white">Alat
                                                Angkutan yang dipergunakan</label>
                                            <div class="relative">
                                                <div class="mt-2 space-y-3">
                                                    <input name="transportasi" type="text"
                                                        class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                        placeholder="Transportasi yang digunakan (Contoh: Kendaraan Pribadi)">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tgl_berangkat">
                                            <label class="inline-block text-sm font-medium dark:text-white">Tanggal
                                                Berangkat</label>
                                            <div class="my-1 space-y-3">
                                                <input name="tgl_berangkat" type="date"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Tanggal Berangkat">
                                            </div>
                                        </div>

                                        <div id="tgl_kembali">
                                            <label class="inline-block text-sm font-medium dark:text-white">Tanggal Harus
                                                Kembali</label>
                                            <div class="my-1 space-y-3">
                                                <input name="tgl_kembali" type="date"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Tanggal Kembali">
                                            </div>
                                        </div>
                                        {{-- <div id="biaya">
                                            <label class="inline-block text-sm font-medium dark:text-white">Biaya perjalanan Dinas</label>
                                            <div class="my-1 space-y-3">
                                                <input name="biaya" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Biaya Perjalanan">
                                            </div>
                                        </div> --}}
                                        <div id="catatan">
                                            <label class="inline-block text-sm font-medium dark:text-white">Catatan Lain-lain (Jika Ada)</label>
                                            <div class="my-1 space-y-3">
                                                <input name="catatan" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Catatan Lain-lain">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="filependukung">
                                        <label class="inline-block text-sm font-medium dark:text-white">
                                            Dokumen Pendukung (Contoh: Surat Tugas)
                                        </label>
                                        <div class="mt-2 space-y-3">
                                            <label class="block">
                                                <span class="sr-only">Pilih File</span>
                                                <input name="file_pendukung" type="file"
                                                    class="block w-full text-sm text-gray-500
                                                    file:mr-4 file:py-2 file:px-4
                                                    file:rounded-md file:border-0
                                                    file:text-sm file:font-semibold
                                                    file:bg-blue-500 file:text-white
                                                    hover:file:bg-blue-600
                                                " />
                                            </label>
                                        </div>
                                    </div>
                            </div>

                            <div class="mt-5 flex justify-end gap-x-2">
                                <button type="button"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Kirim
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
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($surat as $log)
                                    {{-- @if ($log->jenis_surat == $jenisSurat) --}}
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $log->created_at->translatedFormat('H:i d F Y') }}
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

                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">New York No. 1 Lake Park</td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                            <div class="flex justify-end">

                                                {{-- <a href="{{ route('logharian.edit', ['id' => $log->id]) }}">
                                                            <button type="submit"
                                                                class="py-3 px-4 iupdatenline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                update
                                                            </button> --}}
                                                </a>
                                                <form
                                                    action="{{ route('management-surat-tugas-dinas.destroy', ['id' => $log->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
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
                                                        </svg></button>
                                                </form>
                                                <a href="{{ route('management-surat-tugas-dinas.detail', ['id' => $log->id]) }}"
                                                    class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
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


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <script>
                        document.getElementById('jenis_surat').addEventListener('change', function() {
                            var jenisSurat = this.value;
                            window.location.href = "{{ route('management-surat-tugas.index') }}?jenis_surat=" + jenisSurat;
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <script>
        const personalComponent = document.getElementById('personal');
        const creatorSearch = document.getElementById('creator-search');
        const creatorResults = document.getElementById('creator-results');
        const selectedCreators = [];
        const selectedCreatorList = document.getElementById('selected-creator-list');
        const selectedCreatorsInput = document.getElementById('selected-creators-input');
        const creatorsSelected = document.getElementById('creatorsSelected');

        creatorSearch.addEventListener('input', function() {
            const userInput = this.value;

            // Make an AJAX request to your server to fetch users based on userInput
            // Replace '/surat/search-users?input=' with the actual route to search for users
            fetch(`/admin-kepegawaian/management-surat-tugas-dinas/searchuser?input=${userInput}`)
                .then(response => response.json())
                .then(data => {
                    creatorResults.innerHTML = '';
                    data.forEach(user => {
                        const userDiv = document.createElement('div');

                        userDiv.textContent = user.name;
                        userDiv.className =
                            'cursor-pointer p-2 hover-bg-gray-200 dark:hover-bg-gray-700';
                        userDiv.addEventListener('click', () => {
                            // Set the selected creator in the input field
                            creatorSearch.value = user.name;

                            // Add the selected creator to the array
                            selectedCreators.push(user);

                            // Update the selected creator list
                            const selectedCreatorItem = document.createElement('li');
                            selectedCreatorItem.textContent = user.name;

                            // Add a button to remove the creator
                            const removeButton = document.createElement('button');
                            removeButton.textContent = 'Hapus';
                            removeButton.className = 'text-red-500 ml-2';
                            removeButton.addEventListener('click', () => {
                                // Remove the selected creator from the array
                                const index = selectedCreators.indexOf(user);
                                if (index !== -1) {
                                    selectedCreators.splice(index, 1);
                                }

                                // Remove the selected creator from the list
                                selectedCreatorList.removeChild(selectedCreatorItem);

                                // Update the hidden input with the selected creators
                                selectedCreatorsInput.value = JSON.stringify(
                                    selectedCreators);
                            });

                            selectedCreatorItem.appendChild(removeButton);
                            selectedCreatorList.appendChild(selectedCreatorItem);

                            // Clear search results
                            creatorResults.innerHTML = '';

                            const list = [];
                            selectedCreators.map((item) => {
                                list.push(item.id);
                            })
                            creatorsSelected.value = list;
                        });
                        creatorResults.appendChild(userDiv);
                    });
                });
        });

        const teamComponent = document.getElementById('team');
        const leaderSearch = document.getElementById('leader-search');
        const leaderResults = document.getElementById('leader-results');
        const selectedLeaders = [];
        const selectedLeaderList = document.getElementById('selected-leader-list');
        const selectedLeadersInput = document.getElementById('selected-leaders-input');
        const leadersSelected = document.getElementById('leadersSelected');

        leaderSearch.addEventListener('input', function() {
            const userInput = this.value;

            // Make an AJAX request to your server to fetch users based on userInput
            // Replace '/surat/search-users?input=' with the actual route to search for users
            fetch(`/admin-kepegawaian/management-surat-tugas-dinas/searchuser?input=${userInput}`)
                .then(response => response.json())
                .then(data => {
                    leaderResults.innerHTML = '';
                    data.forEach(user => {
                        const userDiv = document.createElement('div');

                        userDiv.textContent = user.name;
                        userDiv.className =
                            'cursor-pointer p-2 hover-bg-gray-200 dark:hover-bg-gray-700';
                        userDiv.addEventListener('click', () => {
                            // Set the selected leader in the input field
                            leaderSearch.value = user.name;

                            // Add the selected leader to the array
                            selectedLeaders.push(user);

                            // Update the selected leader list
                            const selectedLeaderItem = document.createElement('li');
                            selectedLeaderItem.textContent = user.name;

                            // Add a button to remove the leader
                            const removeButton = document.createElement('button');
                            removeButton.textContent = 'Hapus';
                            removeButton.className = 'text-red-500 ml-2';
                            removeButton.addEventListener('click', () => {
                                // Remove the selected leader from the array
                                const index = selectedLeaders.indexOf(user);
                                if (index !== -1) {
                                    selectedLeaders.splice(index, 1);
                                }

                                // Remove the selected leader from the list
                                selectedLeaderList.removeChild(selectedLeaderItem);

                                // Update the hidden input with the selected leaders
                                selectedLeadersInput.value = JSON.stringify(
                                    selectedLeaders);
                            });

                            selectedLeaderItem.appendChild(removeButton);
                            selectedLeaderList.appendChild(selectedLeaderItem);

                            // Clear search results
                            leaderResults.innerHTML = '';

                            const list = [];
                            selectedLeaders.map((item) => {
                                list.push(item.id);
                            })
                            leadersSelected.value = list;
                        });
                        leaderResults.appendChild(userDiv);
                    });
                });
        });

        // <script>
    const teamMembersComponent = document.getElementById('team-members');
    const memberSearch = document.getElementById('member-search');
    const memberResults = document.getElementById('member-results');
    const selectedMembers = JSON.parse(document.getElementById('membersSelected').value || '[]');
    const selectedMemberList = document.getElementById('selected-member-list');
    const membersSelected = document.getElementById('membersSelected');

    memberSearch.addEventListener('input', function() {
        const userInput = this.value;

        // Make an AJAX request to your server to fetch users based on userInput
        fetch(`/admin-kepegawaian/management-surat-tugas-dinas/searchuser?input=${userInput}`)
            .then(response => response.json())
            .then(data => {
                memberResults.innerHTML = '';
                data.forEach(user => {
                    const userDiv = document.createElement('div');

                    userDiv.textContent = user.name;
                    userDiv.className = 'cursor-pointer p-2 hover:bg-gray-200 dark:hover:bg-gray-700';

                    userDiv.addEventListener('click', () => {
                        // Set the selected member in the input field
                        memberSearch.value = '';

                        // Add the selected member to the array if not already added
                        if (!selectedMembers.includes(user.id)) {
                            selectedMembers.push(user.id);

                            // Update the selected member list
                            const selectedMemberItem = document.createElement('li');
                            selectedMemberItem.textContent = user.name;

                            // Add a button to remove the member
                            const removeButton = document.createElement('button');
                            removeButton.textContent = 'Hapus';
                            removeButton.className = 'text-red-500 ml-2';
                            removeButton.addEventListener('click', () => {
                                // Remove the selected member from the array
                                const index = selectedMembers.indexOf(user.id);
                                if (index !== -1) {
                                    selectedMembers.splice(index, 1);
                                }

                                // Remove the selected member from the list
                                selectedMemberList.removeChild(selectedMemberItem);

                                // Update the hidden input with the selected members
                                membersSelected.value = JSON.stringify(selectedMembers);
                            });

                            selectedMemberItem.appendChild(removeButton);
                            selectedMemberList.appendChild(selectedMemberItem);
                        }

                        // Clear search results
                        memberResults.innerHTML = '';

                        // Update the hidden input with the selected members
                        membersSelected.value = JSON.stringify(selectedMembers);
                    });

                    memberResults.appendChild(userDiv);
                });
            });
    });
</script>

    <script>
        const kategoriSelect = document.getElementById('kategori');
        const judul = document.getElementById('judul');
        const deskripsi = document.getElementById('deskripsi');
        const tempatBerangkatInput = document.getElementById('tempat_berangkat');
        const kotaTujuanInput = document.getElementById('kota_tujuan');
        const TranspotasiInput = document.getElementById('transportasi');
        const tglBerangkatInput = document.getElementById('tgl_berangkat');
        const tglKembaliInput = document.getElementById('tgl_kembali');
        const FilePendukung = document.getElementById('filependukung');

        function handleKategoriChange() {
            const selectedKategori = kategoriSelect.value;

            // Sembunyikan semua elemen terlebih dahulu
            judul.style.display = 'none';
            deskripsi.style.display = 'none';
            tempatBerangkatInput.style.display = 'none';
            kotaTujuanInput.style.display = 'none';
            TranspotasiInput.style.display = 'none';
            tglBerangkatInput.style.display = 'none';
            tglKembaliInput.style.display = 'none';
            FilePendukung.style.display = 'none';

            if (selectedKategori === 'STPD') {
                // Tampilkan elemen yang relevan jika kategori "STPD" dipilih
                judul.style.display = 'block';
                deskripsi.style.display = 'block';
                tempatBerangkatInput.style.display = 'block';
                kotaTujuanInput.style.display = 'block';
                TranspotasiInput.style.display = 'block';
                tglBerangkatInput.style.display = 'block';
                tglKembaliInput.style.display = 'block';
                FilePendukung.style.display = 'block';
            } else if (selectedKategori === 'ST') {
                // Tampilkan elemen "Isi" jika kategori "ST" dipilih
                judul.style.display = 'block';
                deskripsi.style.display = 'block';
                tglBerangkatInput.style.display = 'block';
                tglKembaliInput.style.display = 'block';
                FilePendukung.style.display = 'block';
            } else if (selectedKategori === 'SK') {
                judul.style.display = 'block';
                deskripsi.style.display = 'block';
                FilePendukung.style.display = 'block';

            }
        }

        kategoriSelect.addEventListener('change', handleKategoriChange);

        // Panggil fungsi handleKategoriChange saat halaman dimuat ulang untuk mengatur tampilan awal
        handleKategoriChange();
    </script>
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
