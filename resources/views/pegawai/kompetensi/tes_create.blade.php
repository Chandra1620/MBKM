@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                       Form Tambah Tes 
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('tes.store') }}">
                    @csrf
                    

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nama Tes*
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="nama_tes" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Tes">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Skor Tes*
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="skor" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Skor Tes">



                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jenis Tes*
                        </label>
                        <select name="jenis_tes"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option value="0" hidden selected>Pilih</option>
                            <option value="IELTS,maks : 9.00">IELTS,maks : 9.00</option>
                            <option value="TOEFL CBT, maks : 300.00">TOEFL CBT, maks : 300.00</option>
                            <option value="TOEFL IBT, maks :120.00 ">TOEFL IBT, maks :120.00</option>
                            <option value="TOEFL ITP, maks :677.00 ">TOEFL ITP, maks :677.00</option>
                            <option value="TOEP-TEFLIN, maks: 100.00 ">TOEP-TEFLIN, maks: 100.00</option>
                        </select>


                        <label class="inline-block text-sm font-medium dark:text-white">
                            Penyelenggara*
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="penyelenggara" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Penyelenggara">
                        </div>


                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tahun*
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="tahun" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tahun Tes">
                        </div>

                     
                    </div>

                    {{-- button --}}
                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Kembali
                        </button>
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
