{{-- @dd("$carbonStart->timestamp . $carbonEnd->timestamp") --}}
{{-- @dd($sisaCuti) --}}
@extends('layouts.theme')

@section('content')
    <div class="overflow-hidden">
        {{-- <p class="mb-5">Sisa Cuti Selanjutnya akan diupdate pada tanggal: <br/></p> --}}
        <p class="font-bold pb-4">Sisa Cuti</p>
        <table class="min-w-full divide-y divide-gray-50 dark:divide-gray-700 border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700 border border-gray-300">
                <tr class="border border-gray-300">
                    <th scope="col" rowspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border border-gray-300">NIP</th>
                    <th scope="col" rowspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border border-gray-300">Nama</th>
                    <th scope="col" rowspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border border-gray-300">Tahun</th>
                    <th scope="col" colspan="5" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase border border-gray-300">Sisa Cuti</th>
                </tr>
                <tr class="border border-gray-300">
                    <th class="text-gray-500 text-xs font-medium border border-gray-300">N</th>
                    <th class="text-gray-500 text-xs font-medium border border-gray-300">N-1</th>
                    <th class="text-gray-500 text-xs font-medium border border-gray-300">N-2</th>
                    <th class="text-gray-500 text-xs font-medium border border-gray-300">JML</th>
                    <th class="text-gray-500 text-xs font-medium border border-gray-300">Dipakai</th>
                </tr>
            </thead>
                @foreach ($sisaCuti as $cuti)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $cuti->nip }}</td>
                        <td class="px-6 py-4 border-b">{{ $cuti->name }}</td>
                        <td class="px-6 py-4 border-b">{{ $year }}</td>
                        <td class="px-6 py-4 border-b text-center">{{ $cuti->n }}</td>
                        <td class="px-6 py-4 border-b text-center">{{ $cuti->n_minus_1 }}</td>
                        <td class="px-6 py-4 border-b text-center">{{ $cuti->n_minus_2 }}</td>
                        <td class="px-6 py-4 border-b text-center">{{ $cuti->n + $cuti->n_minus_1 + $cuti->n_minus_2 }}</td>
                        <td class="px-6 py-4 border-b text-center">{{ $cuti->cuti_dipakai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $sisaCuti->links() }}
        </div>
    </div>
@endsection
