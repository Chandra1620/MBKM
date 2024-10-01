@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Form Tambah Riwayat Jabatan Fungsional
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('riwayat-fungsional.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Unit Kerja
                        </label>
                        <select id="unitKerja"
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 sm:p-4">
                            <option disabled selected>Unit Kerja</option>
                            @foreach ($unitKerja as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jabatan Fungsional
                        </label>
                        <input type="hidden" id="jabatan_fungsional_id" name="jabatan_fungsional">

                        <select name="jabatan_id" id="jabatanFungsional" 
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 sm:p-4">
                            <option disabled selected>Jabatan Fungsional</option>
                        </select>

                        <script>
                            const unitKerjaDropdown = document.getElementById('unitKerja');
                            const jabatanFungsionalDropdown = document.getElementById('jabatanFungsional');

                            unitKerjaDropdown.addEventListener('change', () => {
                                // alert('ehm')
                                // Ambil nilai yang dipilih dari dropdown Unit Kerja
                                const selectedUnitKerjaId = unitKerjaDropdown.value;

                                // Hapus opsi lama pada dropdown Jabatan Fungsional
                                jabatanFungsionalDropdown.innerHTML =
                                    '<option disabled selected>Jabatan Fungsional</option>';

                                // Deklarasikan variabel jabatanOption di luar loop
                                let jabatanOption;

                                // Perbarui dropdown Jabatan Fungsional berdasarkan Unit Kerja yang dipilih
                                @foreach ($unitKerja as $unit)
                                    if (selectedUnitKerjaId == {{ $unit->id }}) {
                                        @foreach ($unit->jabatanfungsional as $fgs)
                                            jabatanOption = document.createElement('option');
                                            jabatanOption.value = '{{ $fgs->id }}';
                                            jabatanOption.textContent = '{{ $fgs->name }}';
                                            jabatanFungsionalDropdown.appendChild(jabatanOption);
                                        @endforeach
                                    }
                                @endforeach

                            });

                            jabatanFungsionalDropdown.addEventListener('change', function(event) {
                                // Mendapatkan nilai dari opsi yang dipilih
                                var selectedOption = event.target.value;
                                    var jabatan_fungsional_id = document.getElementById('jabatan_fungsional_id')
                                    jabatan_fungsional_id.value = selectedOption;
                                // Lakukan sesuatu dengan nilai opsi yang dipilih
                                console.log('Opsi yang dipilih:', selectedOption);

                                // Misalnya, jika Anda ingin melakukan sesuatu berdasarkan nilai opsi yang dipilih
                                // Anda dapat menambahkan logika atau perintah-perintah lain di sini.
                            });
                        </script>


                        {{-- <label class="inline-block text-sm font-medium dark:text-white">
                            Jabatan Fungsional
                        </label>
                        <select name="jabatan_fungsional"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>--Pilih Jabatan Fungsional--</option>
                            <option value="dosen lektor">Dosen Lektor</option>
                            <option value="dosen asisten ahli">Dosen Asisten Ahli</option>
                            <option value="PPPM">Pengelola Pusat Penjaminan Mutu dan Pengembangan Pembelajaran</option>
                            <option value="pustakawan terampil ">Pustakawan Terampil </option>
                            <option value="pengelola situs/web">Pengelola Situs/Web</option>
                            <option value="pengadministrasi umum">Pengadministrasi Umum</option>
                            <option value="teknisi laboratorium">Teknisi Laboratorium</option>
                            <option value="APBN">Analis Pengelolaan Keuangan APBN Ahli Muda</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="penyusun laporan keuangan">Penyusun Laporan Keuangan</option>
                            <option value="pengelola keuangan">Pengelola Keuangan</option>
                            <option value="perencana ahli pertama">Perencana Ahli Pertama</option>
                            <option value="arsiparis terampil">Arsiparis Terampil</option>
                            <option value="arsiparis ahli pertama">Arsiparis Ahli Pertama</option>
                            <option value="PHMAP">Pranata Hubungan Masyarakat Ahli Pertama</option>
                            <option value="pengelola barang milik negara">Pengelola Barang Milik Negara</option>
                            <option value="pengolah data">Pengolah Data</option>
                            <option value="ASDMA">Analis Sumber Daya Manusia Aparatur</option>
                            <option value="ASDMAAP">Analis Sumber Daya Manusia Aparatur Ahli Pertama</option>
                            <option value="PKAP">Pranata Komputer Ahli Pertama</option>
                            <option value="PKT">Pranata Komputer Terampil</option>
                            <option value="PLPT">Pranata Laboratorium Pendidikan Terampil</option>
                            <option value="PLPAP">Pranata Laboratorium Pendidikan Ahli Pertama</option>
                            <option value="PDA">Pengolah Data Akademik</option>
                            <option value="PDPPKM">Pengolah Data Penelitian dan Pengabdian kepada Masyarakat</option>
                            <option value="PSP">Pengadministrasi Sarana dan Prasarana</option>
                        </select> --}}

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nomor SK
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="nomor_sk" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nomor SK">
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
