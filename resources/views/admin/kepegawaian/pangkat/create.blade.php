@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Form Tambah Pangkat dan Golongan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('pangkat-golongan.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div id="personal">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nama Pegawai
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
                            <p>Nama Pegawai yang Dipilih:</p>
                            <ul id="selected-recipient-list"></ul>
                        </div>
                    
                        <!-- Hidden input to store selected recipients as JSON string -->
                        <input type="hidden" name="selected_recipients" id="selected-recipients-input">
                        <input type="hidden" name="usersSelected" id="usersSelected">
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

                    <!-- Section -->
                    <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Pangkat/Golongan
                        </label>
                        <select name="pangkat_golongan" id="pangkatGolongan" 
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 sm:p-4">
                            <option disabled selected>Pilih Pangkat/Golongan</option>
                        </select>
                    </div>
                    
                    <script>
                        // Data pangkat/golongan dosen
                        var pangkatGolonganData = [
                            "Penata Muda / III/a",
                            "Penata Muda Tk. I / III/b",
                            "Penata / III/c",
                            "Penata Tk.I / III/d",
                            "Pembina / IV/a",
                            "Pembina Tk. I / IV/b",
                            "Pembina Utama Muda / IV/c",
                            "Pembina Utama Madya / IV/d",
                            "Pembina Utama / IV/e"
                        ];
                    
                        // Fungsi untuk mengisi dropdown dengan data pangkat/golongan
                        function populateDropdown() {
                            var dropdown = document.getElementById("pangkatGolongan");
                    
                            // Hapus opsi-opsi yang sudah ada (kecuali opsi pertama)
                            while (dropdown.options.length > 1) {
                                dropdown.remove(1);
                            }
                    
                            // Tambahkan opsi-opsi baru berdasarkan data pangkat/golongan
                            for (var i = 0; i < pangkatGolonganData.length; i++) {
                                var option = document.createElement("option");
                                option.text = pangkatGolonganData[i];
                                option.value =  pangkatGolonganData[i]; // Atau ganti dengan nilai unik sesuai kebutuhan
                                dropdown.add(option);
                            }
                        }
                    
                        // Panggil fungsi untuk mengisi dropdown saat halaman dimuat
                        window.onload = populateDropdown;
                    </script>
                    
                    

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nomor SK
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="nomor_sk" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nomor SK">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal SK
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="tanggal_sk" type="date" id="tanggalMulai"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal SK">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Terhitung Mulai Tanggal
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="tanggal_mulai" type="date" id="tanggalMulai"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Terhitung Mulai Tanggal">
                        </div>

                        <script>
                            // Ambil elemen input tanggal
                            var inputTanggalMulai = document.getElementById("tanggalMulai");
                        
                            // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
                            var today = new Date().toISOString().split('T')[0];
                        
                            // Set atribut min dengan nilai hari ini
                            inputTanggalMulai.setAttribute("min", today);
                        </script> 
                        
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Angka Kredit
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="kredit" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Angka Kredit">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Masa Kerja Golongan (Tahun)
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="masakerja_tahun" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Masa Kerja Golongan">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Masa Kerja Golongan (Bulan)
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="masakerja_bulan" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Masa Kerja Golongan">
                        </div>
                    </div>

                    <label class="inline-block text-sm font-medium dark:text-white">
                        Dokumen Pendukung
                    </label>
                    <div class=" space-y-3">
                        <label class="block">
                            <span class="sr-only">Pilih Dokumen Pendukung</span>
                            <input name="dokumen_pendukung" type="file" accept=".pdf"
                                class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-md file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-500 file:text-white
                                        hover:file:bg-blue-600" />
                        </label>

                        {{-- button --}}
                        <div class="mt-5 flex justify-end gap-x-2">
                            {{-- <a href="{{ route(sertifikasi.index) }}"> --}}
                            <button type="button"
                                class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                                Kembali
                            </button>
                            </a>

                            <button type="submit"
                                class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Simpan
                            </button>
                        </div>

                </form>


            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
