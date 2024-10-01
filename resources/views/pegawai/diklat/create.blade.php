@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Pelatihan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('diklat.store') }}">
                    @csrf

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">


                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jenis Diklat
                        </label>
                        <select name="jenis" id="jenis"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>-- pilih jenis diklat --</option>
                            <option value="Pelatihan Professional"> Pelatihan Professional</option>
                            <option value="Lemhanas"> Lemhanas</option>
                            <option value="Diklat Prajabatan"> Diklat Prajabatan</option>
                            <option value="Diklat Kepemimpinan"> Diklat Kepemimpinan</option>
                            <option value="Academic Exchange<"> Academic Exchange</option>
                        </select>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nama diklat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="nama" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama diklat">
                        </div>


                        <label class="inline-block text-sm font-medium dark:text-white">
                            Penyelanggara
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="penyelenggara" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Penyelanggara">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Peran
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="peran" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Peran">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tingkat Diklat
                        </label>

                        <select name="tingkat_diklat" id="tingkat_diklat"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>-- pilih tingkat diklat --</option>
                            <option value="Lokal"> Lokal</option>
                            <option value="Regional"> Regional</option>
                            <option value="Nasional"> Nasional</option>
                            <option value="Internasionl"> Internasionl</option>
                        </select>


                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jumlah Jam
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="jumlah_jam" type="number"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Jumlah Jam">
                        </div>

                        
                        <label class="inline-block text-sm font-medium dark:text-white">
                            No. Sertifikat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="no_sertifikat" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nomor sertifikat">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Sertifikat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tgl_sertifikat" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Sertifikat">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tahun penyelenggara
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tahun_penyelenggaraan" type="number"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tahun penyelenggara">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tempat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tempat" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tempat">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Mulai
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tanggal_mulai" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Mulai">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Selesai
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tanggal_selesai" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Selesai">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nomor SK Penugasan
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="no_sk_penugasan" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nomor SK Penugasan">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal SK Penugasan
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tgl_sk_penugasan" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal SK Penugasan">
                        </div>





                    </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Cancel
                        </button>
                        <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Save changes
                        </button>
                    </div>

                </form>


            </div>
            <!-- End Card -->
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

    </div>
@endsection
