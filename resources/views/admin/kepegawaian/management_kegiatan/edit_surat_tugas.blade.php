@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Surat Tugas
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('management-surat-tugas.update', ['id' => $surat->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label class="inline-block text-sm font-medium dark:text-white mb-2">
                                Jenis Surat
                            </label>
                            <div class="relative">
                                <select name="jenis_surat" id="kategori"
                                    class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    {{-- <option value="SK">Surat Keputusan (SK)</option> --}}
                                    <option value="ST" {{ $surat->jenis_surat == 'st' ? 'selected' : '' }}>Surat Tugas
                                        (ST)</option>
                                    {{-- <option value="STPD">Surat Tugas Perjalanan Dinas (STPD)</option> --}}
                                </select>
                                <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div>
                        <label for="leader-select" class="inline-block text-sm font-medium dark:text-white">
                            Ketua (Max. 1)
                        </label>
                        <div class="relative">
                            <div class="mt-2">
                                <select id="leader-select" name="leader"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <option value="pilih_ketua" {{ $surat->ketua_id == 'pilih_ketua' ? 'selected' : '' }}
                                        selected disabled>Pilih ketua</option>
                                </select>
                            </div>
                            <div id="selected-leader" class="mt-4">
                                <p class="text-sm font-medium">Daftar Ketua yang Dipilih:</p>
                                <ul id="selected-leader-list"
                                    class="list-disc pl-5 text-sm text-gray-700 dark:text-gray-300"></ul>
                            </div>
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div>
                        <label for="member-select" class="inline-block text-sm font-medium dark:text-white">
                            Anggota ( Bisa Pilih Lebih Dari 1 )
                        </label>
                        <div class="relative">
                            <div class="mt-2">
                                <select id="member-select" name="member"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <option value="pilih_anggota" {{ $surat->anggota == 'pilih_anggota' ? 'selected' : '' }}
                                        selected disabled>Pilih Anggota</option>
                                </select>
                            </div>
                            <div id="selected-member" class="mt-4">
                                <p class="text-sm font-medium">Daftar Anggota yang Dipilih:</p>
                                <ul id="selected-member-list"
                                    class="list-disc pl-5 text-sm text-gray-700 dark:text-gray-300"></ul>
                            </div>
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
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

                    <!-- End Form Group -->
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Judul
                        </label>
                        <div class="relative">
                            <input name="judul" type="text" value="{{ $surat->judul ?? '' }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Judul Surat">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Maksud Pengiriman Surat
                        </label>
                        <div class="relative">
                            <input type="text" name="deskripsi" value="{{ $surat->deskripsi ?? '' }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Masukkan maksud dari surat yang dikirim">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label for="nomor_sk" class="block text-sm mb-2 dark:text-white">Nomor
                            Surat</label>
                        <div class="relative">
                            <input name="nomor_surat" id="nomor_sk" type="text" value="{{ $surat->nomor_surat ?? '' }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Isi Nomor Surat Tugas">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">Tanggal
                            Mulai</label>
                        <div class="relative">
                            <input name="tempat_berangkat" type="text"
                            value="{{ $surat->tgl_berangkat ?? '' }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Isi Nomor Surat Tugas">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">Tanggal Harus
                            Selesai</label>
                        <div class="relative">
                            <input name="tgl_kembali" type="date"
                            value="{{ $surat->tgl_kembali ?? '' }}"
                                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                    placeholder="Tanggal Kembali">
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                    </div>
                    <div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            File Pendukung
                        </label>
                        <div class="relative">
                            <input type="file" id="file_pendukung" name="file_pendukung"
                                value="{{ $surat->file_pendukung ?? '' }}"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                required>
                            <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </div>
                        {{-- <p class="hidden text-xs text-red-600 mt-2" id="error-message">Jumlah semester harus lebih dari 0.</p> --}}
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Card -->
    </div>
    </div>
@endsection
