<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .content {
            margin: 10px;
            border: 1px solid black;
            padding: 10px;
        }

        .header-lampiran {
            background-color: blue;
            padding: 10px;
        }

        .lampiran {
            width: 50%;
            padding: 15px;
            background-color: white;
            float: right;
            /* Use float to align right */
        }

        p {
            font-size: 10px
        }

        .tabel {
            border-collapse: collapse;
            width: 100%;
        }

        .border {
            border: 1px solid black;
        }

        .teks-lampiran {
            text-align: start;
            font-size: 10px;
        }

        .teks-lampiran-2 {
            text-align: start;
            margin-top: 5px;
            font-size: 10px;
        }

        .teks-lampiran-3 {
            text-align: start;
            margin-top: 5px;
            font-size: 10px;
        }

        .form-title {
            text-align: center;
            font-size: 17.5px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .padding-table-x {
            padding-left: 10px;
            padding-right: 10px;
        }

        .margin-table-x-y {
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <title>Invoice</title>
</head>

<body>
    <div class="content">
        <table class="tabel">
            <tr>
                <td></td>
                <td></td>
                <td style="width: 440px;"></td>
                <td>
                    <p class="teks-lampiran">
                        ANAK LAMPIRAN 1.b
                        <br>PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA
                        <br>NOMOR 24 TAHUN 2017
                        <br>TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
                    </p>
                    <p class="teks-lampiran-2">
                        Indramayu, ………………… 2024
                    </p>
                    <p class="teks-lampiran-3">
                        Kepada
                        <br>Yth. Direktur Politeknik Negeri Indramayu
                        <br>di. Indramayu
                    </p>
                </td>
            </tr>
        </table>
        <p class="form-title">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h1>
        <table class="tabel">
            <tr>
                <td class="border padding-table-x" colspan="4"><strong>I.&nbsp;&nbsp;&nbsp;&nbsp;DATA
                        PEGAWAI</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 20%;">Nama</td>
                <td class="border padding-table-x" style="width: 30%;">{{ $customer['name'] }}</td>
                <td class="border padding-table-x" style="width: 20%;">NIP</td>
                <td class="border padding-table-x" style="width: 30%">123</td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 20%;">Jabatan</td>
                <td class="border padding-table-x" style="width: 30%;"></td>
                <td class="border padding-table-x" style="width: 20%;">Masa Kerja</td>
                <td class="border padding-table-x" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 20%;" colspan="4">Unit Kerja</td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" colspan="4"><strong>II.&nbsp;&nbsp;&nbsp;DATA PEGAWAI **</strong>
                </td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 40%;">1. Cuti Tahunan</td>
                <td class="border padding-table-x" style="width: 10%;"></td>
                <td class="border padding-table-x" style="width: 40%;">2. Cuti Besar</td>
                <td class="border padding-table-x" style="width: 10%">123</td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 40%;">3. Cuti Sakit</td>
                <td class="border padding-table-x" style="width: 10%;"></td>
                <td class="border padding-table-x" style="width: 40%;">4. Cuti Melahirkan</td>
                <td class="border padding-table-x" style="width: 10%"></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 40%;">5. Cuti Karena Alasan Penting</td>
                <td class="border padding-table-x" style="width: 10%;"></td>
                <td class="border padding-table-x" style="width: 40%;">6. Cuti di Luar Tanggungan Negara</td>
                <td class="border padding-table-x" style="width: 10%"></td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" style="width: 100%"><strong>III.&nbsp;&nbsp;&nbsp;ALASAN
                        CUTI</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 100%; height: 40px;"></td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" colspan="6"><strong>IV.&nbsp;&nbsp;&nbsp;LAMANYA
                        CUTI</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 10%;">Selama</td>
                <td class="border padding-table-x" style="width: 20%;">Hari/Bulan/Tahun</td>
                <td class="border padding-table-x" style="width: 20%;">Mulai Tanggal</td>
                <td class="border padding-table-x" style="width: 20%"></td>
                <td class="border padding-table-x" style="width: 10%;">s/d</td>
                <td class="border padding-table-x" style="width: 20%;"></td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" colspan="5"><strong>V.&nbsp;&nbsp;&nbsp;CATATAN
                        CUTI ***</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" colspan="3">1. CUTI TAHUNAN</td>
                <td class="border padding-table-x" style="width: 40%">2. CUTI BESAR</td>
                <td class="border padding-table-x" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:10%;">Tahun</td>
                <td class="border padding-table-x" style="width:10%;">Sisa</td>
                <td class="border padding-table-x" style="width:10%;">Keterangan</td>
                <td class="border padding-table-x" style="width:40%;">3. CUTI SAKIT</td>
                <td class="border padding-table-x" style="width:30%;"></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:10%;">N-2</td>
                <td class="border padding-table-x" style="width:10%;"></td>
                <td class="border padding-table-x" style="width:10%;"></td>
                <td class="border padding-table-x" style="width:40%;">4. CUTI MELAHIRKAN</td>
                <td class="border padding-table-x" style="width:30%;"></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:10%;">N-1</td>
                <td class="border padding-table-x" style="width:10%;"></td>
                <td class="border padding-table-x" style="width:10%;"></td>
                <td class="border padding-table-x" style="width:40%;">5. CUTI KARENA ALASAN PENTING</td>
                <td class="border padding-table-x" style="width:30%;"></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:10%;">N</td>
                <td class="border padding-table-x" style="width:10%;"></td>
                <td class="border padding-table-x" style="width:10%;"></td>
                <td class="border padding-table-x" style="width:40%;">6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
                <td class="border padding-table-x" style="width:30%;"></td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" colspan="3"><strong>VI.&nbsp;&nbsp;&nbsp;ALAMAT SELAMA
                        MENJALANKAN CUTI</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:40%;">Alamat Lengkap</td>
                <td class="border padding-table-x" style="width:20%;">Telpon</td>
                <td class="border padding-table-x relative" rowspan="2"
                    style="width:40%; height:50px; text-align: center;">
                    <span>Hormat Saya</span>
                    <br>
                    <img class="absolute" src="{{ $images }}" alt="tanda tangan" style="width:150px;">
                    <br>
                    <span style="margin-top: 20px;">&#40;………………………………..……………….&#41;
                        NIP ……………………………..</span>
                </td>
            </tr>
            <tr>
                <td class="border padding-table-x"></td>
                <td class="border padding-table-x"></td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" colspan="4"><strong>VII.&nbsp;&nbsp;&nbsp;PERTIMBANGAN ATASAN
                        LANGSUNG **</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 0%;">DISETUJUI</td>
                <td class="border padding-table-x" style="width:25%;">PERUBAHAN ****</td>
                <td class="border padding-table-x" style="width:50%;">DITANGGUHKAN ****</td>
                <td class="border padding-table-x" style="width:25%;">TIDAK DISETUJUI ****</td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:0%;">a</td>
                <td class="border padding-table-x" style="width:25%;">b</td>
                <td class="border padding-table-x" style="width:50%;">c</td>
                <td class="border padding-table-x" style="width:25%;">d</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="border padding-table-x relative" style="width:35%; height:50px; text-align: center;">
                    Hormat Saya
                    <br>
                    <img class="absolute" src="{{ $images }}" alt="tanda tangan" style="width:150px;">
                    <br>
                    &#40;………………………………..……………….&#41;
                    NIP ……………………………..
                </td>
            </tr>
        </table>
        <table class="tabel margin-table-x-y">
            <tr>
                <td class="border padding-table-x" colspan="4"><strong>VIII.&nbsp;&nbsp;&nbsp;KEPUTUSAN PEJABAT
                        YANG BERWENANG MEMBERIKAN CUTI **</strong></td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width: 0%;">DISETUJUI</td>
                <td class="border padding-table-x" style="width:25%;">PERUBAHAN ****</td>
                <td class="border padding-table-x" style="width:25%;">DITANGGUHKAN ****</td>
                <td class="border padding-table-x" style="width:35%;">TIDAK DISETUJUI ****</td>
            </tr>
            <tr>
                <td class="border padding-table-x" style="width:0%;"></td>
                <td class="border padding-table-x" style="width:25%;"></td>
                <td class="border padding-table-x" style="width:25%;"></td>
                <td class="border padding-table-x" style="width:35%;">a.n Direktur<br>Wakil Direktur Bidang</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="border padding-table-x relative" style="width:35%; height:50px; text-align: center;">
                    Hormat Saya
                    <br>
                    <img class="absolute" src="{{ $images }}" alt="tanda tangan" style="width:150px;">
                    <br>
                    &#40;………………………………..……………….&#41;
                    NIP ……………………………..
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>
                        Tembusan:
                        <br>
                        -Direktur
                        <br>
                        Catatan :
                        <br>
                        * Coret yang tidak perlu
                        <br>
                        ** Pilih salah satu dengan memberi tanda centang ( )
                        <br>
                        *** diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan Cuti
                        <br>
                        **** diberi tanda centang dan alasannya,.
                        <br>
                        N = Cuti tahun berjalan
                        <br>
                        N-1 = Sisa cuti 1 tahun sebelumnya
                        <br>
                        N-2 = Sisa cuti 2 tahun sebelumnya
                    </p>
                </td>
            </tr>
        </table>
        {{-- <div class="header-lampiran">
            <div id="lampiran" class="lampiran">
            </div>
        </div>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam itaque perferendis fuga sint et, tempora
            cum
            iste nobis obcaecati libero impedit voluptas laudantium, rem molestiae earum inventore deleniti minus
            ratione!
        </p> --}}

        {{-- <h1>Invoice #{{ $invoice_number }}</h1>
        <p>Date: {{ $date }}</p>

        <h2>Customer Details</h2>
        <p>Name: {{ $customer['name'] }}</p>
        <p>Address: {{ $customer['address'] }}</p>
        <p>Phone: {{ $customer['phone'] }}</p> --}}

        {{-- <h2>Items</h2>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        {{-- 
        <div class="footer">
            <p>Subtotal: ${{ $subtotal }}</p>
            <p>Tax: ${{ $tax }}</p>
            <p>Total: ${{ $total }}</p>
        </div> --}}
    </div>
</body>

</html>