<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex justify-center bg-gray-50 min-h-screen items-center">

        <div class="container">
            <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto py-4">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                            Perizinan Cuti
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Politeknik Negeri Indramayu
                        </p>
                    </div>
    
                    <form>
    
                        <!-- Section -->
                        <div
                            class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Nama
                            </label>
    
                            <div class="mt-2 space-y-3">
                                <input disabled
                                    value="{{ $perizinanCuti->user->name }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Nip
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                    value="{{ $perizinanCuti->user->nip }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Unit Kerja
                            </label>
                            <div class="mt-2 space-y-3">
                                <input 
                                    disabled
                                    value="{{ $perizinanCuti->user->pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Jabatan
                            </label>
                            <div class="mt-2 space-y-3">
                                <input 
                                disabled
                                value="{{ $perizinanCuti->user->pegawaiFungsional->unit_kerja_has_jabatan_fungsional->name }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Jenis Cuti yang diambil
                            </label>
                            <div class="mt-2 space-y-3">
                                <input 
                                    disabled
                                    value="{{ $perizinanCuti->jeniscuti->name}}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Alasan Cuti
                            </label>
                            <div class="mt-2 space-y-3">
                                <input 
                                    disabled
                                    value="{{ $perizinanCuti->alasan }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Lamanya Cuti
                            </label>
                            <div class="mt-2 space-y-3">
                                <input 
                                    disabled
                                    value="{{ $perizinanCuti->tgl_mulai }} s/d  {{ $perizinanCuti->tgl_selesai }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Sisa Cuti Tahun ini
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                value="{{ $sisaCutiTahunIni }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Sisa Cuti 1 Tahun Sebelumnya
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                value="{{ $sisaCutiTahunN1 }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Sisa Cuti 2 Tahun Sebelumnya
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                value="{{ $sisaCutiTahunN2 }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Alamat Selama Cuti
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                value="{{ $perizinanCuti->alamat_selama_cuti }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                No Telepon
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                value="{{ $perizinanCuti->no_telp_bisa_dihubungi }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Status
                            </label>
                            <div class="mt-2 space-y-3">
                                <input disabled
                                value="Sudah Disetujui Pihak Berwennag"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>

                        </div>
    
    
                    </form>
    
    
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

</body>

</html>
