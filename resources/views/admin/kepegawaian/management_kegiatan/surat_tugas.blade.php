@extends('layouts.theme')

@section('content')
    <div class="container">
        <div>
            <p class="pb-1 font-bold">Management Surat Tugas</p>
            <div class="flex justify-end mr-4">
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
                                <form method="POST" action="{{ route('management-surat-tugas.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Section -->
                                    <div
                                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                                        <div class="flex flex-col items-start">
                                            <label class="inline-block text-sm font-medium dark:text-white mb-2">
                                                Jenis Surat
                                            </label>
                                            <select name="jenis_surat" id="kategori"
                                                class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                {{-- <option value="SK">Surat Keputusan (SK)</option> --}}
                                                <option value="ST">Surat Tugas (ST)</option>
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

                                        <div id="team">
                                            <label for="leader-select"
                                                class="inline-block text-sm font-medium dark:text-white">
                                                Ketua (Max. 1)
                                            </label>
                                            <div class="mt-2">
                                                <select id="leader-select" name="leader"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                    <option value="" selected disabled>Pilih ketua</option>
                                                </select>
                                            </div>
                                            <div id="selected-leader" class="mt-4">
                                                <p class="text-sm font-medium">Daftar Ketua yang Dipilih:</p>
                                                <ul id="selected-leader-list"
                                                    class="list-disc pl-5 text-sm text-gray-700 dark:text-gray-300"></ul>
                                            </div>
                                            <input type="hidden" name="selected_leader" id="selected-leader-input">
                                            <input type="hidden" name="leadersSelected" id="leadersSelected">
                                        </div>

                                        <div id="team-members">
                                            <label for="member-select"
                                                class="inline-block text-sm font-medium dark:text-white">
                                                Anggota ( Bisa Pilih Lebih Dari 1 )
                                            </label>
                                            <div class="mt-2">
                                                <select id="member-select" name="member"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                    <option value="" selected disabled>Pilih Anggota</option>
                                                </select>
                                            </div>
                                            <div id="selected-member" class="mt-4">
                                                <p class="text-sm font-medium">Daftar Anggota yang Dipilih:</p>
                                                <ul id="selected-member-list"
                                                    class="list-disc pl-5 text-sm text-gray-700 dark:text-gray-300"></ul>
                                            </div>
                                            <input type="hidden" name="selected_member" id="selected-member-input">
                                            <input type="hidden" name="membersSelected" id="membersSelected">
                                        </div>

                                        <script>
                                            const leaderSelect = document.getElementById('leader-select');
                                            const selectedLeaderList = document.getElementById('selected-leader-list');
                                            const selectedLeadersInput = document.getElementById('selected-leader-input');
                                            const leadersSelected = document.getElementById('leadersSelected');
                                            let selectedLeaders = [];

                                            fetch('/admin-kepegawaian/management-surat-tugas/searchuser?role=ketua')
                                                .then(response => response.json())
                                                .then(data => {
                                                    data.forEach(user => {
                                                        const option = document.createElement('option');
                                                        option.value = user.id;
                                                        option.textContent = user.name;
                                                        leaderSelect.appendChild(option);
                                                    });
                                                })
                                                .catch(error => {
                                                    console.error('Error fetching leaders:', error);
                                                });

                                            leaderSelect.addEventListener('change', function() {
                                                const selectedOption = this.options[this.selectedIndex];
                                                const leaderId = selectedOption.value;
                                                const leaderName = selectedOption.textContent;

                                                if (selectedLeaders.length > 0) {
                                                    const previousLeader = selectedLeaders[0];
                                                    selectedLeadersList.innerHTML = '';
                                                }

                                                selectedLeaders = [{
                                                    id: leaderId,
                                                    name: leaderName
                                                }];

                                                const selectedLeaderItem = document.createElement('li');
                                                selectedLeaderItem.textContent = leaderName;

                                                const removeButton = document.createElement('button');
                                                removeButton.textContent = 'Hapus';
                                                removeButton.className = 'text-red-500 ml-2';
                                                removeButton.addEventListener('click', () => {
                                                    selectedLeaders = [];
                                                    selectedLeaderList.innerHTML = '';
                                                    leaderSelect.value = '';
                                                    updateSelectedLeaders();
                                                });

                                                selectedLeaderItem.appendChild(removeButton);
                                                selectedLeaderList.appendChild(selectedLeaderItem);

                                                updateSelectedLeaders();
                                            });

                                            function updateSelectedLeaders() {
                                                selectedLeadersInput.value = JSON.stringify(selectedLeaders);
                                                leadersSelected.value = selectedLeaders.length > 0 ? selectedLeaders[0].id : '';
                                            }

                                            // <script>
                                            const memberSelect = document.getElementById('member-select');
                                            const selectedMemberList = document.getElementById('selected-member-list');
                                            const selectedMembersInput = document.getElementById('selected-member-input');
                                            const membersSelected = document.getElementById('membersSelected');
                                            let selectedMembers = [];

                                            fetch('/admin-kepegawaian/management-surat-tugas/searchuser?role=anggota')
                                                .then(response => response.json())
                                                .then(data => {
                                                    data.forEach(user => {
                                                        const option = document.createElement('option');
                                                        option.value = user.id;
                                                        option.textContent = user.name;
                                                        memberSelect.appendChild(option);
                                                    });
                                                })
                                                .catch(error => {
                                                    console.error('Error fetching members:', error);
                                                });

                                            memberSelect.addEventListener('change', function() {
                                                const selectedOption = this.options[this.selectedIndex];
                                                const memberId = selectedOption.value;
                                                const memberName = selectedOption.textContent;

                                                if (selectedMembers.some(member => member.id === memberId)) {
                                                    alert('Anggota ini sudah dipilih!');
                                                    return;
                                                }

                                                const selectedMemberItem = document.createElement('li');
                                                selectedMemberItem.textContent = memberName;

                                                const removeButton = document.createElement('button');
                                                removeButton.textContent = 'Hapus';
                                                removeButton.className = 'text-red-500 ml-2';
                                                removeButton.addEventListener('click', () => {
                                                    selectedMembers = selectedMembers.filter(member => member.id !== memberId);
                                                    selectedMemberList.removeChild(selectedMemberItem);
                                                    updateSelectedMembers();
                                                });

                                                selectedMemberItem.appendChild(removeButton);
                                                selectedMemberList.appendChild(selectedMemberItem);

                                                selectedMembers.push({
                                                    id: memberId,
                                                    name: memberName
                                                });
                                                updateSelectedMembers();
                                            });

                                            function updateSelectedMembers() {
                                                selectedMembersInput.value = JSON.stringify(selectedMembers);
                                                membersSelected.value = selectedMembers.map(member => member.id).join(',');
                                            }
                                        </script>


                                        <div id="judul">
                                            <label class="inline-block text-sm font-medium dark:text-white">
                                                Judul
                                            </label>
                                            <div class="mt-2 space-y-3">
                                                <input name="judul" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Judul Surat">
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
                                                Surat</label>
                                            <div class="mt-2 space-y-3">
                                                <input name="nomor_surat" id="nomor_sk" type="text"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Isi Nomor Surat Tugas">
                                            </div>
                                        </div>

                                        <div id="tempat_berangkat">
                                            <label for="tempat_berangkat" class="block text-sm mb-2 dark:text-white">Tempat
                                                Berangkat</label>
                                            <div class="relative">
                                                <div class="mt-2 space-y-3">
                                                    <input name="tempat_berangkat" type="text"
                                                        class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                        placeholder="Isi Nomor Surat Tugas">
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
                                                        placeholder="Isi Nomor Surat Tugas">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tgl_berangkat">
                                            <label class="inline-block text-sm font-medium dark:text-white">Tanggal
                                                Mulai</label>
                                            <div class="my-1 space-y-3">
                                                <input name="tgl_berangkat" type="date"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Tanggal Berangkat">
                                            </div>
                                        </div>

                                        <div id="tgl_kembali">
                                            <label class="inline-block text-sm font-medium dark:text-white">Tanggal Harus
                                                Selesai</label>
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
                                        class="px-6 py-3     text-right text-xs font-medium text-gray-500 uppercase">Action
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
                                                <div class="flex space-x-2">
                                                    <form
                                                        action="{{ route('management-surat-tugas.edit', ['id' => $log->id]) }}">
                                                        <button type="submit"
                                                            class="py-1 px-2 flex justify-center items-center space-x-2 h-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <svg class="h-5 w-5 text-white" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M12 20h9" />
                                                                <path
                                                                    d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('management-surat-tugas.destroy', ['id' => $log->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="py-1 px-2 flex justify-center items-center space-x-2 h-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <svg class="h-5 w-5 text-white" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <polyline points="3 6 5 6 21 6" />
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                                <line x1="10" y1="11" x2="10"
                                                                    y2="17" />
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17" />
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    <form
                                                        action="{{ route('management-surat-tugas.detail', ['id' => $log->id]) }}">
                                                        <button type="submit"
                                                            class="py-1 px-2 flex justify-center items-center space-x-2 h-[2.2rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <svg class="h-5 w-5 text-white" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <circle cx="12" cy="12" r="10" />
                                                                <line x1="12" y1="8" x2="12"
                                                                    y2="12" />
                                                                <line x1="12" y1="16" x2="12.01"
                                                                    y2="16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @endif --}}
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
