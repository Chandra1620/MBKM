<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function create()
    {
        $data = [
            'invoice_number' => 'INV-12345',
            'date' => now()->format('Y-m-d'),
            'customer' => [
                'name' => 'John Doe',
                'address' => '123 Main Street, City, Country',
                'phone' => '555-1234'
            ],
            'items' => [
                ['description' => 'Product 1', 'quantity' => 2, 'price' => 50],
                ['description' => 'Product 2', 'quantity' => 1, 'price' => 100],
            ],
            'subtotal' => 200,
            'tax' => 20,
            'total' => 220,
            'images' => public_path('assets/test/pngwing.com.png')
        ];
        

        $pdf = Pdf::loadView('pdf.test', $data);
        return $pdf->download('testinvoice.pdf');
    }
//     public function store(Request $request)
//     {
//     // Membuat instance PhpWord
//     $phpWord = new PhpWord();
    
//     // Mengatur gaya bentuk shape (rectangle)
//     $rectangleStyle = [
//         'width' => 500,           // Lebar kotak (dalam satuan points)
//         'height' => 300,          // Tinggi kotak (dalam satuan points)
//         'borderColor' => '000000', // Warna border (hitam)
//         'borderSize' => 6,        // Ketebalan border (dalam points)
//         'fill' => null            // Tanpa warna isi (transparan)
//     ];

//     // Mengatur margin section
//     $sectionStyle = [
//         'marginTop' => 400,    // Margin atas
//         'marginBottom' => 400, // Margin bawah
//         'marginLeft' => 400,   // Margin kiri
//         'marginRight' => 400,  // Margin kanan
//     ];

//     // Mengatur gaya tabel
//     $tableStyle = [
//         'width' => 10000,        // Lebar tabel 100% dari lebar halaman
//         'alignment' => 'center', // Tabel berada di tengah halaman
//         'borderSize' => 6,       // Ketebalan border tabel
//     ];

//     $textboxStyle = [
//         'width' => 300,
//         'height'=> 110,
//         'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END,      // Menempatkan ke kanan
//         'borderSize' => 0,
//         'borderColor' => 'FFFFFF'
//     ];

//     // Menambahkan section dengan pengaturan margin
//     $section = $phpWord->addSection($sectionStyle);

//     // Menambahkan TextBox ke section
//     $textBox = $section->addTextBox($textboxStyle);

    
//     $textBox->addText('ANAK LAMPIRAN 1.b', ['size' => 9]);
    
//     $textBox->addTextBreak(0);
//     $textBox->addText('PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA NOMOR 24 TAHUN 2017', ['size' => 9]);

//     $textBox->addTextBreak(0);
//     $textBox->addText('TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL', ['size' => 9]);

//     $textBox->addTextBreak(1);
//     $textBox->addText('Indramayu, ………………… 2024', ['name' => 'Times New Roman']);

//     $textBox->addText("Kepada", ['name' => 'Times New Roman']);
//     $textBox->addText("Yth. Direktur Politeknik Negeri Indramayu", ['name' => 'Times New Roman']);
//     $textBox->addText("di. Indramayu", ['name' => 'Times New Roman']);

//     // Menambah Teks "FORMULIR PERMINTAAN DAN PEMBERIAN CUTI"
//     $section->addText("FORMULIR PERMINTAAN DAN PEMBERIAN CUTI", ['name' => 'Times New Roman', 'size' => 13], ['alignment' => 'center']);

//     $section->addTextBreak(1);

//     // Menambahkan tabel pertama ke section
//     $tableOne = $section->addTable($tableStyle);

//     // Menambahkan baris header pada tabel pertama
//     $tableOne->addRow();

//     $headerCell = $tableOne->addCell(10000);
//     $headerCell->getStyle()->setGridSpan(4); // Menggabungkan 4 kolom pada header
//     $headerCell->addText("I. Test");

//     // Menambahkan baris data tabel pertama
//     $tableOne->addRow();
//     $tableOne->addCell(2000)->addText("Nama");
//     $tableOne->addCell(5000);
//     $tableOne->addCell(3000);
//     $tableOne->addCell(2000);

//     $tableOne->addRow();
//     $tableOne->addCell(2000)->addText("Jabatan");
//     $tableOne->addCell(5000);
//     $tableOne->addCell(3000);
//     $tableOne->addCell(2000);

//     $tableOne->addRow();
//     $tableOne->addCell(2000)->addText("Unit Kerja");
//     $tableOne->addCell(5000)->getStyle()->setGridSpan(3); // Menggabungkan 3 kolom pada cell kedua

//     $section->addTextBreak(1); // Menambahkan spasi antar tabel

//     // Menambahkan tabel kedua
//     $tableTwo = $section->addTable($tableStyle);

//     // Menambahkan header tabel kedua
//     $tableTwo->addRow();

//     $cell = $tableTwo->addCell(20000);
//     $cell->getStyle()->setGridSpan(6);
//     $cell->addText("II.JENIS CUTI YANG DIAMBIL **");


//     // Menambahkan baris data tabel kedua
//     $tableTwo->addRow();
//     $tableTwo->addCell(8000);
//     $tableTwo->addCell(2000);
//     $tableTwo->addCell(8000);
//     $tableTwo->addCell(2000);

//     $tableTwo->addRow();
//     $tableTwo->addCell(8000);
//     $tableTwo->addCell(2000);
//     $tableTwo->addCell(8000);
//     $tableTwo->addCell(2000);

//     $section->addTextBreak(1); // Menambahkan spasi antar tabel

//     // Menambahkan tabel ketiga
//     $tableThree = $section->addTable($tableStyle);

//     // Menambahkan header tabel ketiga
//     $tableThree->addRow();
//     $tableThree->addCell(20000)->addText("III. Alasan Cuti");

//     // Menambahkan baris data tabel ketiga
//     $tableThree->addRow(400);
//     $tableThree->addCell(20000);

//     $section->addTextBreak(1); // Menambahkan spasi antar tabel

//     // Menambahkan tabel keempat
//     $tableFour = $section->addTable($tableStyle);

//     // Menambahkan header tabel keempat
//     $tableFour->addRow();

//     $cell = $tableFour->addCell(20000);
//     $cell->getStyle()->setGridSpan(6);
//     $cell->addText("IV. LAMANYA CUTI");


//     // Menambahkan baris data tabel keempat
//     $tableFour->addRow();
//     $tableFour->addCell(2000);
//     $tableFour->addCell(6000);
//     $tableFour->addCell(3000);
//     $tableFour->addCell(4000);
//     $tableFour->addCell(1000);
//     $tableFour->addCell(3000);

//     // Menyimpan dokumen sebagai file Word
//     $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
//     $objWriter->save('tabel_dinamis.docx');
//     $objWriter->save('tabel_margin_tipis.docx');

//     // Mengembalikan file untuk diunduh
//     return response()->download(public_path('tabel_margin_tipis.docx'));
// }


}