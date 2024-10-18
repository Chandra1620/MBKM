{{-- @dd($diklat) --}}
@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Diklat
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('diklat.update', ['id' => $diklat->id]) }}">
                    @csrf
                    @method('PUT')
                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jenis Diklat
                        </label>

                        <select name="jenis" id="jenis"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>-- pilih jenis diklat --</option>
                            <option value="Pelatihan Professional"
                                {{ $diklat->jenis == 'Pelatihan Professional' ? 'selected' : '' }}> Pelatihan Professional
                            </option>
                            <option value="Lemhanas" {{ $diklat->jenis == 'Lemhanas' ? 'selected' : '' }}> Lemhanas</option>
                            <option value="Diklat Prajabatan" {{ $diklat->jenis == 'Diklat Prajabatan' ? 'selected' : '' }}>
                                Diklat Prajabatan</option>
                            <option value="Diklat Kepemimpinan"
                                {{ $diklat->jenis == 'Diklat Kepemimpinan' ? 'selected' : '' }}> Diklat Kepemimpinan
                            </option>
                            <option value="Academic Exchange" {{ $diklat->jenis == 'Academic Exchange' ? 'selected' : '' }}>
                                Academic Exchange</option>
                        </select>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nama diklat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="nama" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                value="{{ $diklat->nama }}" placeholder="Nama Diklat">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Penyelanggara
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="penyelenggara" type="text" value="{{ $diklat->penyelenggara }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Penyelenggara">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Peran
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="peran" type="text" value="{{ $diklat->peran }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Peran">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tingkat Diklat
                        </label>

                        <select name="tingkat_diklat" id="tingkat_diklat"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>-- pilih tingkat diklat --</option>
                            <option value="Lokal" {{ $diklat->tingkat_diklat == 'Lokal' ? 'selected' : '' }}> Lokal
                            </option>
                            <option value="Regional" {{ $diklat->tingkat_diklat == 'Regional' ? 'selected' : '' }}>
                                Regional</option>
                            <option value="Nasional" {{ $diklat->tingkat_diklat == 'Nasional' ? 'selected' : '' }}>
                                Nasional</option>
                            <option value="Internasional"
                                {{ $diklat->tingkat_diklat == 'Internasionl' ? 'selected' : '' }}> Internasional</option>
                        </select>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jumlah Jam
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="jumlah_jam" type="number" value="{{ $diklat->jumlah_jam }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Jumlah Jam">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            No. Sertifikat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="no_sertifikat" type="text" value="{{ $diklat->no_sertifikat }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nomor sertifikat">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Sertifikat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tgl_sertifikat" type="date" value="{{ $diklat->tgl_sertifikat }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Sertifikat">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tahun penyelenggara
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tahun_penyelenggaraan" type="number" value="{{ $diklat->tahun_penyelenggaraan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tahun Penyelenggara">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tempat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tempat" type="text" value="{{ $diklat->tempat }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tempat">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Mulai
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tanggal_mulai" type="date" value="{{ $diklat->tanggal_mulai }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Mulai">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Selesai
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tanggal_selesai" type="date" value="{{ $diklat->tanggal_selesai }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Selesai">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nomor SK Penugasan
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="nomor_sk_penugasan" type="text" value="{{ $diklat->nomor_sk_penugasan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nomor SK Penugasan">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal SK Penugasan
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="tanggal_sk_penugasan" type="date" value="{{ $diklat->tanggal_sk_penugasan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal SK Penugasan">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Edit
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
