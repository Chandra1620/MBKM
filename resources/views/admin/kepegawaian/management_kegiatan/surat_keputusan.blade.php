@extends('layouts.theme')

@section('content')

    <div class="container">
        <div>
            <p class="pb-1 font-bold">Management Surat Keputusan</p>
            <div class="">
                <button type="button"
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#hs-modal-signup">
                    Buat Surat
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
                                <form method="POST" action="{{ route('management-surat-keputusan.store') }}" enctype="multipart/form-data">
                                    @csrf
                                
                                    <!-- Section -->
                                    <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Jenis Surat</label>
                                            <select name="jenis_surat" id="kategori" disabled
                                                class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                <option value="SK">Surat Keputusan (SK)</option>
                                                {{-- <option value="ST">Surat Tugas (ST)</option> --}}
                                                {{-- <option value="STPD">Surat Tugas Perjalanan Dinas (STPD)</option> --}}
                                            </select>
                                        </div>
                
                                        <br>
                                        
                                        <!-- Hapus komponen Unit Kerja -->
                                        {{-- <div id="hiddenComponent" style="display: none;">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Unit Kerja
                                            </label>
                                        
                                            <select name="unit_kerja_id" id="unit_kerja_id"
                                                class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                <option disabled selected>Pilih Unit Kerja</option>
                                                @foreach ($unitkerja as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        
                                        <div id="personal">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Penerima
                                            </label>
                                        
                                            <div class="mt-2 space-y-3">
                                                <input id="recipient-search" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama Jabatan fungsional">
                                            </div>
                                        
                                            <!-- Display search results in a dropdown -->
                                            <div id="search-results" class="mt-2 space-y-3"></div>
                                        
                                            <!-- Display selected recipients -->
                                            <div id="selected-recipients" class="mt-4">
                                                <p>Daftar Penerima yang Dipilih:</p>
                                                <ul id="selected-recipient-list"></ul>
                                            </div>
                                        
                                            <!-- Hidden input to store selected recipients as JSON string -->
                                            <input type="hidden" name="selected_recipients" id="selected-recipients-input">
                                            <input type="hidden" name="usersSelected[]" id="usersSelected">
                                        </div>
                                        
                                        <script>
                                            const personalComponent = document.getElementById('personal');
                                            const recipientSearch = document.getElementById('recipient-search');
                                            const searchResults = document.getElementById('search-results');
                                            const selectedRecipients = [];
                                            const selectedRecipientList = document.getElementById('selected-recipient-list');
                                            const selectedRecipientsInput = document.getElementById('selected-recipients-input');
                                            const usersSelected = document.getElementById('usersSelected');
                                        
                                            recipientSearch.addEventListener('input', function () {
                                                const userInput = this.value;
                                        
                                                // Make an AJAX request to your server to fetch users based on userInput
                                                // Replace '/surat/search-users?input=' with the actual route to search for users
                                                fetch(`/admin-kepegawaian/management-surat-keputusan/searchuser?input=${userInput}`)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        searchResults.innerHTML = '';
                                                        data.forEach(user => {
                                                            const userDiv = document.createElement('div');
                                        
                                                            userDiv.textContent = user.name;
                                                            userDiv.className =
                                                                'cursor-pointer p-2 hover-bg-gray-200 dark:hover-bg-gray-700';
                                                            userDiv.addEventListener('click', () => {
                                                                // Set the selected recipient in the input field
                                                                recipientSearch.value = user.name;
                                        
                                                                // Add the selected recipient to the array
                                                                selectedRecipients.push(user);
                                        
                                                                // Update the selected recipient list
                                                                const selectedRecipientItem = document.createElement('li');
                                                                selectedRecipientItem.textContent = user.name;
                                        
                                                                // Add a button to remove the recipient
                                                                const removeButton = document.createElement('button');
                                                                removeButton.textContent = 'Hapus';
                                                                removeButton.className = 'text-red-500 ml-2';
                                                                removeButton.addEventListener('click', () => {
                                                                    // Remove the selected recipient from the array
                                                                    const index = selectedRecipients.indexOf(user);
                                                                    if (index !== -1) {
                                                                        selectedRecipients.splice(index, 1);
                                                                    }
                                        
                                                                    // Remove the selected recipient from the list
                                                                    selectedRecipientList.removeChild(
                                                                        selectedRecipientItem);
                                        
                                                                    // Update the hidden input with the selected recipients
                                                                    selectedRecipientsInput.value = JSON.stringify(
                                                                        selectedRecipients);
                                                                });
                                        
                                                                selectedRecipientItem.appendChild(removeButton);
                                                                selectedRecipientList.appendChild(selectedRecipientItem);
                                        
                                                                // Clear search results
                                                                searchResults.innerHTML = '';
                                        
                                                                const list = [];
                                                                selectedRecipients.map((item) => {
                                                                    list.push(item.id);
                                                                })
                                                                usersSelected.value = list;
                                                            });
                                                            searchResults.appendChild(userDiv);
                                                        });
                                                    });
                                            });
                                        </script>
                                        
                
                                        <div id="judul">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Judul
                                            </label>
                                            <div class="mt-2 space-y-3">
                                                <input name="judul" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Nama Jabatan fungsional">
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
                                        </div></div>
                                        
                
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
                                            <label for="tempat_berangkat" class="block text-sm mb-2 dark:text-white">Tempat Berangkat</label>
                                            <div class="relative">
                                                <div class="mt-2 space-y-3">
                                                    <input name="tempat_berangkat" type="text"
                                                        class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                        placeholder="Isi Nomor Surat Tugas">
                                                </div>
                                            </div>
                                        </div>
                
                                        <div id="kota_tujuan">
                                            <label for="kota_tujuan" class="block text-sm mb-2 dark:text-white">Kota Tujuan/Provinsi</label>
                                            <div class="relative">
                                                <div class="mt-2 space-y-3">
                                                    <input name="tempat_tujuan" type="text"
                                                        class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                        placeholder="Isi Nomor Surat Tugas">
                                                </div>
                                            </div>
                                        </div>
                
                                        <div id="tgl_berangkat">
                                            <label class="inline-block text-sm font-medium dark:text-white">Tanggal Berangkat</label>
                                        <div class="my-1 space-y-3">
                                            <input name="tgl_berangkat" type="date"
                                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                placeholder="Tanggal Berangkat">
                                        </div>
                                        </div>
                
                                        <div id="tgl_kembali">
                                            <label class="inline-block text-sm font-medium dark:text-white">Tanggal Harus Kembali</label>
                                        <div class="my-1 space-y-3">
                                            <input name="tgl_kembali" type="date"
                                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                placeholder="Tanggal Kembali">
                                        </div>
                                        </div>
                                    </div>
                
                                    <div id="filependukung">
                                        <label class="inline-block text-sm font-medium dark:text-white">
                                            File Pendukung
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
                        {{-- <div class="mb-4">
                            <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Pilih Jenis Surat:</label>
                            <select id="jenis_surat" name="jenis_surat" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                                <option value="ST" @if($jenisSurat == 'ST') selected @endif>Surat Tugas (ST)</option>
                                <option value="SK" @if($jenisSurat == 'SK') selected @endif>Surat Keputusan (SK)</option>
                                <option value="STPD" @if($jenisSurat == 'STPD') selected @endif>Surat Tugas Penugasan Dinas (STPD)</option>
                            </select>
                        </div> --}}
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
                                            
                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">New York No. 1 Lake Park</td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">
    
                                                    {{-- <a href="{{ route('logharian.edit', ['id' => $log->id]) }}">
                                                            <button type="submit"
                                                                class="py-3 px-4 iupdatenline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                                update
                                                            </button> --}}
                                                    </a>
                                                    <form action="{{ route('management-surat-keputusan.destroy', ['id' => $log->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                        class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-reed-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg></button>
                                                    </form>
                                                    <a href="{{ route('management-surat-keputusan.detail', ['id' => $log->id]) }}"
                                                        class="py-1 px-2 flex justify-center items-center h-[2.2rem] w-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        <svg class="h-10 w-10 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="12" />  <line x1="12" y1="16" x2="12.01" y2="16" /></svg>
                                                    </a>
                                                    
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- @endif --}}
                                    @endforeach
    
                                </tbody>
                            </table>
                        </div>
                        <script>
                            document.getElementById('jenis_surat').addEventListener('change', function () {
                                var jenisSurat = this.value;
                                window.location.href = "{{ route('management-surat-tugas.index') }}?jenis_surat=" + jenisSurat;
                            });
                        </script>
                        
                        <div class="py-1 px-4">
                            {{-- {{ $perizinan->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const kategoriSelect = document.getElementById('kategori');
            const judul = document.getElementById('judul');
            const deskripsi = document.getElementById('deskripsi');
            const tempatBerangkatInput = document.getElementById('tempat_berangkat');
            const kotaTujuanInput = document.getElementById('kota_tujuan');
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
                tglBerangkatInput.style.display = 'none';
                tglKembaliInput.style.display = 'none';
                FilePendukung.style.display = 'none';
        
                if (selectedKategori === 'STPD') {
                    // Tampilkan elemen yang relevan jika kategori "STPD" dipilih
                    judul.style.display = 'block';
                    deskripsi.style.display = 'block';
                    tempatBerangkatInput.style.display = 'block';
                    kotaTujuanInput.style.display = 'block';
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
                } else if (selectedKategori === 'SK'){
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
