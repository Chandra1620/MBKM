<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STPD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        #header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 130px;
        }

        #logo {
            margin-right: 20px;
        }

        #content {
            text-align: center;
        }

        #address {
            margin-top: 10px;
        }

        #table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        h3 {
            margin-bottom: 5px;
        }

        h4 {
            margin: 0;
        }
    </style>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div style="position: relative; text-align: left; margin-right: 20px;">
            <img src="polindra.png" alt="" width="100" height="100" style="position: absolute; z-index: 1;">
        </div>
        <div style="text-align: center;">
            <h3>KEMENTRERIAN PENDIDIKAN, KEBUDAYAAN<br />
                RISET DAN TEKNOLOGI<br />
                POLITEKNIK NEGERI INDRAMAYU</h3>
            Jl. Lohbener Lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252
            <br />
            Telepon/Faksimile: (0234) 5746464 - Laman: http://polindra.ac.id - Email: info@polindra.ac.id
            <br />
            <div style="display: flex; justify-content: center;">
                <div style="text-align: center;">
                    <p>
                        Lembar ke: <br>
                        Kode No : <br>
                        Nomor :
                    </p>
                </div>
            </div>

        </div>
    </div>


    <center>
        <h3>
            SURAT PERJALANAN DINAS <br>
            (S P D)
        </h3>
    </center>

    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">1</td>
            <td colspan="2">
                <p style="margin: 0;"> Pejabat Pembuat Komitmen</p>
            </td>
            <td colspan="2">
                <h4 style="margin: 0;">{{ $surat->pembuatkomitmen->name }}/{{ $surat->pembuatkomitmen->nip }}</h4>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">2</td>
            <td colspan="2">
                <p style="margin: 0;"> Nama/NIP Pegawai yang melaksanakan perjalanan dinas</p>
            </td>
            <td colspan="2">
                <p style="margin: 0;">{{ $surat->ketua->name }}/{{ $surat->ketua->nip }}</p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">3</td>
            <td colspan="2">
                <p style="margin: 0;">
                    a. Pangkat dan Golongan <br>
                    b. Jabatan/Instansi <br>
                    c. Tingkat biaya perjalanan dinas
                </p>
            </td>
            <td colspan="2">
                <p style="margin: 0;">
                    a. Penata Muda Tk 1/III/b <br>
                    b. {{ $surat->ketua->kepegawaian->jabatan_struktural }} <br>
                    c. 
                    {{-- Rp. {{ number_format($surat->biaya, 0, ',', '.') }},00 --}}
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">4</td>
            <td colspan="2">
                <p style="margin: 0;"> Maksud perjalanan dinas</p>
            </td>
            <td colspan="2">
                <p style="margin: 0;">{{ $surat->deskripsi }}
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">5</td>
            <td colspan="2">
                <p style="margin: 0;">Alat angkutan yang digunakan</p>
            </td>
            <td colspan="2">
                <p style="margin: 0;">{{ $surat->transportasi }}</p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">6</td>
            <td colspan="2">
                <p style="margin: 0;">
                    a. Tempat Berangkat <br>
                    b. Kota Tujuan/Provinsi
                </p>
            </td>
            <td colspan="2">
                <p style="margin: 0;">
                    a. {{ $surat->tempat_berangkat }}<br>
                    b. {{ $surat->tempat_tujuan }}
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">7</td>
            <td colspan="2">
                <p style="margin: 0;">
                    a. Lamanya Perjalanan Dinas <br>
                    b. Tanggal Berangkat <br>
                    c. Tanggal Harus Kembali
                </p>
            </td>
            <td colspan="2">
                <p style="margin: 0;">
                    @php
                        // Menghitung lamanya perjalanan dinas
                        $tanggalBerangkat = \Carbon\Carbon::parse($surat->tgl_berangkat);
                        $tanggalKembali = \Carbon\Carbon::parse($surat->tgl_kembali);
                        $lamaPerjalanan = $tanggalBerangkat->diffInDays($tanggalKembali) + 1; // ditambah 1 hari karena termasuk hari berangkat
                    @endphp

                    a. {{ $lamaPerjalanan }} ({{ $lamaPerjalanan > 1 ? 'hari' : 'hari' }}) <br>
                    b. {{ $tanggalBerangkat->translatedFormat('d F Y') }} <br> {{-- Format tanggal, nama bulan, dan tahun --}}
                    c. {{ $tanggalKembali->translatedFormat('d F Y') }}
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">8</td>
            <td colspan="2">
                <p style="margin: 0;">Nama Pengikut/NIP</p>
            </td>
            <td colspan="1" style="text-align: center;">
                <p style="margin: 0;">Golongan/Ruang</p>
            </td>
            <td colspan="1" style="text-align: center;">
                <p style="margin: 0;">Keterangan</p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">
                @php
                    $abjad = 'a';
                @endphp
                @foreach ($anggota as $user)
                    {{ $abjad }}<br>
                    @php
                        // Menambahkan karakter abjad
                        $abjad++;
                    @endphp
                @endforeach
            </td>
            <td colspan="2">
                <p style="margin: 0;">
                    @foreach ($anggota as $user)
                        {{ $user->name }}/{{ $user->nip }}<br>
                    @endforeach
                </p>
            </td>
            <td colspan="1" style="text-align: center;">
                <p style="margin: 0;">
                    @foreach ($anggota as $user)
                    Penata Muda Tk 1/III/b <br>
                    @endforeach
                </p>
            </td>
            <td colspan="1" style="text-align: center;">
                <p style="margin: 0;">
                    @foreach ($anggota as $user)
                        Anggota<br>
                    @endforeach
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">9</td>
            <td colspan="2">
                <p style="margin: 0;">
                    a. Instansi <br>
                    b. Akun
                </p>
            </td>
            <td colspan="1">
                <p style="margin: 0;">
                    a. Politeknik Negeri Indramayu <br>
                    b. 524111
                </p>
            </td>
            <td colspan="1">
                <p style="margin: 0;"></p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; text-align: center;">10</td>
            <td colspan="2">
                <p style="margin: 0;">Keterangan lain-lain</p>
            </td>
            <td colspan="1">
                <p style="margin: 0;">No. Surat Tugas <br>
                    Tanggal <br></p>
            </td>
            <td colspan="1">
                <p style="margin: 0;">
                    {{ $surat->nomor_surat }}<br>
                    {{ $surat->created_at->translatedFormat('d F Y') }} <br>
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; border-right: none;"></td>
            <td colspan="2" style=" border-left: none;">
                <p style="margin: 0;"></p>
            </td>
            <td colspan="1" style="border-right: none;">
                <p style="margin: 0;">
                    Dikeluarkan di <br>
                    Tanggal <br>
                    <b>Pejabat Pembuat Komitmen</b>
                    <br><br><br><br><br>
                    <b>{{ $surat->pembuatkomitmen->name }}</b><br>
                    NIP. {{ $surat->pembuatkomitmen->nip }}
                </p>
            </td>
            <td style="border-left: none;">
                Indramayu <br>
                {{ $surat->created_at->translatedFormat('d F Y') }} <br>
                <br><br><br><br><br><br><br>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; height:50px; border-right: none; text-align: center;">I.</td>
            <td colspan="2" style=" border-left: none;">
                <p style="margin: 0;"></p>
            </td>
            <td colspan="1" style="border-right: none;">
                <p style="margin: 0;">
                    Berangkat dari<br>
                    Pada Tanggal <br>
                    Ke <br>
                    Kepala <br>
                    <br><br><br><br><br><br>

                </p>
            </td>
            <td style="border-left: none;">
                : {{ $surat->tempat_berangkat }} <br>
                : {{ $tanggalBerangkat->translatedFormat('d F Y') }} <br>
                : {{ $surat->tempat_tujuan }} <br>
                <b>: Pejabat Pembuat Komitmen</b>
                <br><br><br><br><br>
                <b>&nbsp; {{ $surat->pembuatkomitmen->name }}</b><br>
                &nbsp; NIP. {{ $surat->pembuatkomitmen->nip }}
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; height:50px; border-right: none; text-align: center;">II.</td>
            <td colspan="1" style="width: 100px; border-right: none; border-left:none;">
                <p style="margin: 0;">
                    Tiba di <br>
                    Pada Tanggal <br>
                    Kepala <br>
                    <br><br><br><br><br><br><br>

                </p>
            </td>
            <td colspan="1" style=" border-left: none;">
                <p style="margin: 0;">
                    : <br>
                    : <br>
                    <b>: </b><br>
                    <br><br><br><br><br>
                    . . . . . . . . . . . . . . . . . . . . . . .<br>
                    NIP.
                </p>
            </td>

            <td colspan="1" style="border-right: none;">
                <p style="margin: 0;">
                    Berangkat dari <br>
                    Pada Tanggal <br>
                    Ke <br>
                    Kepala <br>
                    <br><br><br><br><br><br>

                </p>
            </td>
            <td style="border-left: none;">
                : <br>
                : <br>
                : <br>
                <b>: </b>
                <br><br><br><br><br>
                . . . . . . . . . . . . . . . . . . . . . . .<br>
                NIP.
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; height:50px; border-right: none; text-align: center;">III.</td>
            <td colspan="1" style="width: 100px; border-right: none; border-left:none;">
                <p style="margin: 0;">
                    Tiba di <br>
                    Pada Tanggal <br>
                    <!-- Kepala <br> -->
                    <br><br><br><br><br><br><br><br>

                </p>
            </td>
            <td colspan="1" style=" border-left: none;">
                <p style="margin: 0;">
                    : <br>
                    : <br>
                    <!-- :   Indaramyu <br> -->
                    <br><br><br><br><br><br>
                    . . . . . . . . . . . . . . . . . . . . . . .<br>
                    NIP.
                </p>
            </td>

            <td colspan="1" style="border-right: none;">
                <p style="margin: 0;">
                    Berangkat dari <br>
                    Pada Tanggal <br>
                    Ke <br>
                    Kepala <br>
                    <br><br><br><br><br><br>

                </p>
            </td>
            <td style="border-left: none;">
                : <br>
                : <br>
                : <br>
                <b>: </b>
                <br><br><br><br><br>
                . . . . . . . . . . . . . . . . . . . . . . .<br>
                NIP..
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; height:50px; border-right: none; text-align: center;">IV.</td>
            <td colspan="1" style="width: 100px; border-right: none; border-left:none;">
                <p style="margin: 0;">
                    Tiba di <br>
                    Pada Tanggal <br>
                    Kepala <br>
                    <br><br><br><br><br><br><br>

                </p>
            </td>
            <td colspan="1" style=" border-left: none;">
                <p style="margin: 0;">
                    : <br>
                    : <br>
                    <b>: </b><br>
                    <br><br><br><br><br>
                    . . . . . . . . . . . . . . . . . . . . . . .<br>
                    NIP.
                </p>
            </td>

            <td colspan="1" style="border-right: none;">
                <p style="margin: 0;">
                    Berangkat dari <br>
                    Pada Tanggal <br>
                    Ke <br>
                    Kepala <br>
                    <br><br><br><br><br><br>

                </p>
            </td>
            <td style="border-left: none;">
                : <br>
                : <br>
                : <br>
                <b>: </b>
                <br><br><br><br><br>
                . . . . . . . . . . . . . . . . . . . . . . .<br>
                NIP.
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; height:50px; border-right: none; text-align: center;">V.</td>
            <td colspan="1" style="width: 100px; border-right: none; border-left:none;">
                <p style="margin: 0;">
                    Tiba di <br>
                    Pada Tanggal
                    <br><br>
                    <br><br><br><br><br><br><br>

                </p>
            </td>
            <td colspan="1" style=" border-left: none;">
                <p style="margin: 0;">
                    : <br>
                    : <br>
                    <br>
                    <b>Pejabat Pembuat Komitmen</b><br>
                    <br><br><br><br>
                    <b>{{ $surat->pembuatkomitmen->name }}</b><br>
                    <b>NIP. {{ $surat->pembuatkomitmen->nip }}</b>
                </p>
            </td>

            <td colspan="2" style="border-left: none;">
                Telah diperiksa dengan keterangan bahwa perjalanan tersebut<br>
                atas perintahnya dan semata-mata untuk jabatan<br>
                dalam waktu yang sesingkat-singkatnya<br><br>
                <b>&nbsp; Pejabat Pembuat Komitmen</b><br>
                <br><br><br><br>
                <b>&nbsp; {{ $surat->pembuatkomitmen->name }}</b><br>
                <b>&nbsp; NIP. {{ $surat->pembuatkomitmen->nip }}</b>
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="1" style="width: 20px; height:50px; border-right: none; text-align: center;">VI.</td>
            <td colspan="2" style="width: 100px;border-left:none;">
                <p style="margin: 0;">
                    CATATAN LAIN LAIN
                </p>
            </td>

            <td colspan="2">
                {{ $surat->catatan }}
            </td>
        </tr>

    </table>



</body>

</html>
