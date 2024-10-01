<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table width="100%">
        <tr>
            <td>
            </td>
            <td width="50%" class="bg-red-200">
                <div>
                    ANAK LAMPIRAN 1.b <br />
                    PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA <br />
                    NOMOR 24 TAHUN 2017 <br />
                    TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
                    <br />
                    <br />
                    Indramayu, {{ $createdAtIndo }} 
                    <br />
                    <br />
                    Kepada<br />
                    Yth. Direktur Politeknik Negeri Indramayu <br />
                    di <u>indramayu</u>
                </div>
            </td>
        </tr>
    </table>
    <center>
        <h3>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h3>
    </center>

{{-- <p>Original Link: {{ $qrCode }}</p> --}}

    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="4">
                <h4 style="margin: 0;">&nbsp; I. DATA PEGAWAI</h4>
            </td>
        </tr>
        <tr>
            <td>
                <p style="margin: 0;">&nbsp; Nama</p>

            </td>
            <td>
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->user->name }} 
                </p>
            </td>
            <td>
                <p style="margin: 0;">&nbsp; NIP</p>
            </td>
            <td style="width: 170px">
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->user->nip }}</p>
            </td>
        </tr>
        <tr>
            <td style="width:100px">
                <p style="margin: 0;">&nbsp; Jabatan</p>

            </td>
            <td>
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->user->pegawaiFungsional->unit_kerja_has_jabatan_fungsional->name }}</p>
            </td>
            <td>
                <p style="margin: 0;">&nbsp; Masa Kerja</p>
            </td>
            <td>
                <p style="margin: 0;"> - </p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="margin: 0;">&nbsp; Unit Kerja</p>
            </td>
            <td colspan="3">
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->user->pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name }}</p>
            </td>
        </tr>
    </table><br />
    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="2">
                <h4 style="margin: 0;">&nbsp; II. JENIS CUTI YANG DIAMBIL **</h4>
            </td>
        </tr>
        @foreach ($jeniscuti as $jenis)
        <tr>
            <td>
                <p style="margin: 0;">&nbsp; {{ $jenis->name }}</p>
                {{-- {{$perizinanCuti->jenis_cuti_id }} ||
                {{ $jenis->id}} --}}

            </td>
            <td style="width: 70px">
                <p style="margin: 0;">&nbsp; 
                @if ($perizinanCuti->jenis_cuti_id == $jenis->id)
                    Ceklis
                @endif
                
                </p>
            </td>
        </tr>
        @endforeach
        {{-- <tr>
            <td>
                <p style="margin: 0;">&nbsp; Cuti Tahunanan</p>

            </td>
            <td style="width: 70px">
                <p style="margin: 0;">&nbsp; CEKLIS </p>
            </td>
            <td>
                <p style="margin: 0;">&nbsp; CUTI BESAR</p>
            </td>
            <td style="width: 70px">
                <p style="margin: 0;">&nbsp; CEKLIS </p>
            </td>
        </tr> --}}
        

    </table><br />
    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td>
                <h4 style="margin: 0;">&nbsp; III. ALASAN CUTI</h4>
            </td>
        </tr>
        <tr>
            <td>
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->alasan}}</p>

            </td>
        </tr>

    </table><br />
    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="6">
                <h4 style="margin: 0;">&nbsp; IV. LAMANYA CUTI</h4>
            </td>
        </tr>
        <tr>
            <td style="width:70px">
                <p style="margin: 0;">&nbsp; Selama</p>

            </td>
            <td>
                <div style="margin: 0; display:flex; justify-content:space-between;">
                    <p style="margin: 0;">
                        
                        &nbsp; {{ $totalLamanyaCuti }} &nbsp;&nbsp;&nbsp;
                        @if (intval($totalLamanyaCuti) > 30)
                            <span style="text-decoration: line-through;">Hari</span>/
                        @else
                            <span>Hari</span>/
                        @endif
                        @if (intval($totalLamanyaCuti) < 30)
                            <span style="text-decoration: line-through;">Bulan</span>/
                        @else
                            <span>Bulan</span>/
                        @endif
                        @if (intval($totalLamanyaCuti) < 364)
                            <span style="text-decoration: line-through;">Tahun</span>/
                        @else
                            <span>Tahun</span>/
                        @endif *
                    </p>
                    
                    
                </div>
            </td>
            <td style="width: 110px">
                <p style="margin: 0;">&nbsp; Mulai Tanggal </p>
            </td>
            <td style="width: 140px">
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->tgl_mulai }}</p>
            </td>
            <td style="width: 32px">
                <p style="margin: 0;">&nbsp; s/d </p>
            </td>
            <td style="width: 140px">
                <p style="margin: 0;">&nbsp; {{ $perizinanCuti->tgl_selesai }}</p>
            </td>
        </tr>

    </table><br/>
    
    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="3">
                <h4 style="margin: 0;">&nbsp; V. CATATAN CUTI</h4>
            </td>
        </tr>
        <tr>
            <td>&nbsp;tahun</td>
            <td>&nbsp;sisa</td>
            <td>&nbsp;keterangan</td>
        </tr>
        <tr>
            <td>&nbsp;N-2</td>
            <td>&nbsp; {{$sisaCutiN2}}</td>
            <td>&nbsp;</td>
        </tr><tr>
            <td>&nbsp;N-1</td>
            <td>&nbsp; {{$sisaCutiN1}}</td>
            <td>&nbsp;</td>
        </tr><tr>
            <td>&nbsp;N</td>
            <td>&nbsp; {{$sisaCuti}}</td>
            <td>&nbsp; </td>
        </tr>
        

    </table><br/>

    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="3">
                <h4 style="margin: 0;">&nbsp; VI. ALAMAT SELAMA MENJALANKAN CUTI</h4>
            </td>
        </tr>
        <tr>
            <td style="width:70px">
                <p style="margin: 0;">&nbsp; Alamat Lengkap</p>
            </td>
            <td style="width:70px">
                <p style="margin: 0;">&nbsp; Telpon</p>
            </td>
            <td style="width:70px">
                <center>
                <p style="margin: 0;">&nbsp; Hormat Saya</p>

                </center>
            </td>
        </tr>
        <tr style="height: 100px">
            <td style="width:70px">
                <p style="margin: 0;">{{ $perizinanCuti->alamat_selama_cuti }}</p>
            </td>
            <td style="width:70px">
                <p style="margin: 0;">{{ $perizinanCuti->no_telp_bisa_dihubungi }}</p>
            </td>
            <td style="width:70px">
                <center>
                    <p>

                        @if ($qrCodePerizinan)
                            <img width="70px" src="data:image/svg+xml;base64,{{ $qrCodePerizinan }}" alt="QR Code">
            
                        @endif
                    </p>

                    <span>
                        {{ $perizinanCuti->user->name }}
                    </span><br/>
                    <b>{{ $perizinanCuti->user->nip }}</b>
                </center>      
            </td>
        </tr>
        

    </table><br/>
    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="4">
                <h4 style="margin: 0;">&nbsp; VII. PERTIMBANGAN ATASAN LANGSUNG</h4>
            </td>
        </tr>
        <tr>
            <td >
                <p style="margin: 0;">&nbsp; DISETUJUI</p>
            </td>
            <td >
                <p style="margin: 0;">&nbsp; PERUBAHAN</p>
            </td>
            <td >
                <p style="margin: 0;">&nbsp; DITANGGUHKAN</p>
            </td>
            <td >
                <p style="margin: 0;">&nbsp; TIDAK DISETUJUI</p>
            </td>
        </tr>
        <tr style="height: 30px">
            <td>&nbsp;Ceklis</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="height: 30px">
            <td></td>
            <td></td>
            <td></td>
            <td>
                <center>
                <p style="margin: 0;">&nbsp; Hormat Saya</p>

                    <p>@if ($qrCodePerizinan)
                        <img width="70px" src="data:image/svg+xml;base64,{{ $qrCodePerizinan }}" alt="QR Code">
        
                    @endif
                    </p>

                    <span>
                        {{ $namaPejabatBerwenang }} 
                    </span><br/>
                    <b>{{ $nipPejabatBerwenang }} </b>
                </center>      
            </td>
        </tr>


        

    </table><br/>

    <table width="100%" border="1" style="border-collapse: collapse">
        <tr>
            <td colspan="4">
                <h4 style="margin: 0;">&nbsp; VIII. PERTIMBANGAN ATASAN BERWENANG</h4>
            </td>
        </tr>
        <tr>
            <td >
                <p style="margin: 0;">&nbsp; DISETUJUI</p>
            </td>
            <td >
                <p style="margin: 0;">&nbsp; PERUBAHAN</p>
            </td>
            <td >
                <p style="margin: 0;">&nbsp; DITANGGUHKAN</p>
            </td>
            <td >
                <p style="margin: 0;">&nbsp; TIDAK DISETUJUI</p>
            </td>
        </tr>
        <tr style="height: 30px">
            <td>&nbsp;Ceklis</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="height: 30px">
            <td></td>
            <td></td>
            <td></td>
            <td>
                <center>
                <p style="margin: 0;">&nbsp; Hormat Saya</p>

                    <p>@if ($qrCodePerizinan)
                        <img width="70px" src="data:image/svg+xml;base64,{{ $qrCodePerizinan }}" alt="QR Code">
        
                    @endif
                    </p>

                    <span>
                        {{ $namaAtasanLangsung }} 
                    </span><br/>
                    <b>{{ $nipAtasanLangsung }} </b>
                </center>      
            </td>
        </tr>


        

    </table><br/>
    

    <u><b>Catatan</b></u>
    <table>
        <tr>
            <td>*</td>
            <td>
                
                &nbsp;
                &nbsp;
                Pilih salah satu dengan memberi tanda centang ( )</td>
        </tr>
        <tr>
            <td>**</td>
            <td>
                &nbsp;
                &nbsp;
                Pilih salah satu dengan memberi tanda centang ( )</td>
        </tr>
        <tr>
            <td>***</td>
            <td>
                &nbsp;
                &nbsp;
                Pilih salah satu dengan memberi tanda centang ( )</td>
        </tr><tr>
            <td>****</td>
            <td>
                &nbsp;
                &nbsp;
                Pilih salah satu dengan memberi tanda centang ( )</td>
        </tr>
        <tr>
            <td>N</td>
            <td>
                =
                &nbsp;
                Cuti tahun berjalan</td>
        </tr>
        <tr>
            <td>N-1</td>
            <td>
                =
                &nbsp;
                Sisa cuti 1 tahun sebelumnya</td>
        </tr>
        <tr>
            <td>N-2</td>
            <td>
                =
                &nbsp;
                Sisa cuti 2 tahun sebelumnya</td>
        </tr>

    </table>
    


</body>

</html>
