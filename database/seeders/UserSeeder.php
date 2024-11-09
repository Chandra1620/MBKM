<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kependudukan;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\AlamatdanKontak;
use App\Models\Lainlain;
use App\Models\TandaTangan;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $adminsystem = User::create([
            'name' => 'admin',
            'email' => 'admin@polindra.ac.id',
            'nip' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('123456')
        ]);
        $adminsystem->assignRole('admin');

        $users = [
            [
                'name' => 'Hj. Winani, S.Kep. Ners., M.Kep.',
                'email' => 'winani@polindra.ac.id',
                'nip' => '196806241992032010',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Ketua Jurusan Kesehatan',
                'password' => bcrypt('123456')
                // 'jabatan_atasan_langsung' => 'Ketua Jurusan Kesehatan'
            ],
            [
                'name' => 'Bachtiar Efendi, S.Kep., Ns., M.H.',
                'email' => 'bachtiar@polindra.ac.id',
                'nip' => '197111231994031002',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dr. Indra Ruswandi, S.Kep., NS., M.PH.',
                'email' => 'indra@polindra.ac.id',
                'nip' => '196709271987031001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Nurohmat, S.KM., M.H.',
                'email' => 'nurohmat@polindra.ac.id',
                'nip' => '197709192000031002',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala UPA Pengembangan Karier dan Kewirausahaan',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Nengsih Yulianingsih, S.Kep., Ns., M.PH.',
                'email' => 'nengsih@polindra.ac.id',
                'nip' => '196801101991022002',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Hasim Asyari, S.K.M., M.Kes.',
                'email' => 'hasim@polindra.ac.id',
                'nip' => '197103151991031005',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Priyanto, S.Pd., M.Kes.',
                'email' => 'priyanto@polindra.ac.id',
                'nip' => '196502231984121001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Kayubi, S.KM., M.Si.',
                'email' => 'kayubi@polindra.ac.id',
                'nip' => '196804191988031003',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dr. H. Marsono, M.Pd.',
                'email' => 'dr.marsono@polindra.ac.id',
                'nip' => '196105031980031003',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Gilar Wisnu Hardi, S.Ft., M.T.',
                'email' => 'gilar@polindra.ac.id',
                'nip' => '199308112022031008',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sari Artauli Lumban Toruan, M.Biomed.',
                'email' => 'sari@polindra.ac.id',
                'nip' => '199403162022032008',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Berlian Kusuma Dewi, S.Kep.,Ns.,M.S.',
                'email' => 'berlian@polindra.ac.id',
                'nip' => '199103132022032003',
                'role' => 'pegawai',
                'jabatan' => 'Kepala UPA Bahasa',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ns. Niken Wulan Hasthi Murti, M.Kep.',
                'email' => 'niken@polindra.ac.id',
                'nip' => '199508092022032010',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ike Puspitaningrum, S.Kep.,Ns.,M.Kep.',
                'email' => 'ike@polindra.ac.id',
                'nip' => '198902222022032005',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Evi Supriatun, S.Kep.,Ns.,M.Kep.',
                'email' => 'evi@polindra.ac.id',
                'nip' => '198902172022032005',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Suci Nurjanah, S.Kep.,Ns.,M.Kep.',
                'email' => 'suci@polindra.ac.id',
                'nip' => '198810282022032004',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sally Yustinawati Suryatna, S.Kep.,Ns.,M.Kep.',
                'email' => 'sally@polindra.ac.id',
                'nip' => '198903152022032006',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Nafisah Itsna Hasni, S.Psi.,M.Psi.',
                'email' => 'nafisah@polindra.ac.id',
                'nip' => '199011042022032006',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sukma Diani Putri, S.Pd.,M.Biomed.',
                'email' => 'sukma@polindra.ac.id',
                'nip' => '199303242022032004',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Fachrul Pralienka Bani Muhamad, M.Kom.',
                'email' => 'fachrul@polindra.ac.id',
                'nip' => '199204232018031001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Esti Mulyani, M.Kom.',
                'email' => 'esti.mulyani@polindra.ac.id',
                'nip' => '199003162018032001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Kurnia Adi Cahyanto, M.Kom.',
                'email' => 'kurnia.adi@polindra.ac.id',
                'nip' => '198503022018031001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dr., Raswa., M.Pd.',
                'email' => 'raswa@polindra.ac.id',
                'nip' => '196409251997021001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'A Sumarudin, S.Pd., M.T.',
                'email' => 'sumarudin@polindra.ac.id',
                'nip' => '198610102019031014',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ahmad Lubis Ghozali, S.Kom., M.Kom.',
                'email' => 'ahmad.lubis@polindra.ac.id',
                'nip' => '198605102019031011',
                'role' => 'pegawai',
                'role_khusus_1' => 'Wadir Bidang Perencanaan, Keuangan, dan Umum',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Wakil Direktur Bidang Perencanaan, Keuangan, dan Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Munengsih Sari Bunga, S.Kom., M.Eng.',
                'email' => 'munengsih@polindra.ac.id',
                'nip' => '198507202019032015',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Willy Permana Putra, S.T., M.Eng',
                'email' => 'willy.permana@polindra.ac.id',
                'nip' => '198610042019031004',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Iryanto, S.Si., M.Si.',
                'email' => 'iryanto@polindra.ac.id',
                'nip' => '199008012019031014',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Muhamad Mustamiin, S.Pd.,M.Kom.',
                'email' => 'muhamad.mustamiin@polindra.ac.id',
                'nip' => '199205052019031011',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Adi Suheryadi, S.ST.,M.Kom.',
                'email' => 'adi.suheryadi@polindra.ac.id',
                'nip' => '199003222019031007',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Alifia Puspaningrum, S.Pd.,M.Kom.',
                'email' => 'alifia.puspaningrum@polindra.ac.id',
                'nip' => '199305282019032024',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Muhammad Anis Al Hilmi, S.Si., M.T.',
                'email' => 'anis.alhilmi@polindra.ac.id',
                'nip' => '199002282019031012',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dr. Mohammad Yani, S.T.,M.T.,M.Sc.',
                'email' => 'mohammad.yani@polindra.ac.id',
                'nip' => '198003072021211006',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala Pusat Penelitian dan Pengabdian Kepada Masyarakat',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Eka Ismantohadi, S.Kom., M.Eng.',
                'email' => 'eka.ismantohadi@polindra.ac.id',
                'nip' => '198107092021211005',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Ketua Jurusan Teknik Informatika',
                // 'jabatan_atasan_langsung' => 'Ketua Jurusan Teknik Informatika',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Darsih, A.Md., S.Kom., M.Kom.',
                'email' => 'darsih@polindra.ac.id',
                'nip' => '198109062021212004',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sonty Lena, S.Kom., M.Kom.',
                'email' => 'sonty.lena@polindra.ac.id',
                'nip' => '198703182019032014',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Renol Burjulius, S.T., M.Kom.',
                'email' => 'renol.burjulius@polindra.ac.id',
                'nip' => '198407092019031003',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Nur Budi Nugraha, S.Kom.,M.T.',
                'email' => 'nur.budi@polindra.ac.id',
                'nip' => '198711162022031001',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala UPA TIK',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Robi Robiyanto, M.T.I.',
                'email' => 'robi.robiyanto@polindra.ac.id',
                'nip' => '198707222022031001',
                'role' => 'pegawai',
                'jabatan' => 'Dosen Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rendi, M.Kom.',
                'email' => 'rendi@polindra.ac.id',
                'nip' => '199212132022031007',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala UPA Perpustakaan',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dian Pramadhana, M.Kom.',
                'email' => 'dian.pramadhana@polindra.ac.id',
                'nip' => '199302282022031007',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Yaqutina Marjani Santosa, S.Pd.,M.Cs.',
                'email' => 'yaqutina.santosa@polindra.ac.id',
                'nip' => '199211022022032014',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dita Rizki Amalia, S.Pd.,M.Kom.',
                'email' => 'dita.amalia@polindra.ac.id',
                'nip' => '198803022022032005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Fauzan Ishlakhuddin, S.Kom.,M.Cs.',
                'email' => 'fauzan.ishlakhuddin@polindra.ac.id',
                'nip' => '199105222022031003',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Salamet Nur Himawan, S.Si.,M.Si.',
                'email' => 'salamet.himawan@polindra.ac.id',
                'nip' => '199407022022031005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Robieth Sohiburoyyan, S.Si.,M.Si.',
                'email' => 'robieth.sohiburoyyan@polindra.ac.id',
                'nip' => '199005172022031003',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Moh. Ali Fikri, M.Kom.',
                'email' => 'moh.ali.fikri@polindra.ac.id',
                'nip' => '198901182022031002',
                'role' => 'pegawai',
                'jabatan' => 'Kepala UPA Layanan Uji Kompetensi',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Riyan Farismana, M.Kom.',
                'email' => 'riyan.farismana@polindra.ac.id',
                'nip' => '198905112022031005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Felix Dionisius, M.T.',
                'email' => 'felix.dionisius@polindra.ac.id',
                'nip' => '198703102018031001',
                'role' => 'pegawai',
                'jabatan' => 'Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Agus Sifa, S.Pd., M.Sc., M.T.',
                'email' => 'agus.sifa@polindra.ac.id',
                'nip' => '198608162019031010',
                'role' => 'pegawai',
                'jabatan' => 'Lektor Kepala',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Badruzzaman, S.ST., M.T.',
                'email' => 'badruzzaman@polindra.ac.id',
                'nip' => '198409162019031004',
                'role' => 'pegawai',
                'role_khusus_1' => 'Wadir Bidang Akademik',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Wakil Direktur Bidang Akademik',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dedi Suwandi, S.ST., MT.',
                'email' => 'dedi.suwandi@polindra.ac.id',
                'nip' => '198405052019031016',
                'role' => 'pegawai',
                'jabatan' => 'Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Muhammad Luthfi, S.Si., M.Sc.',
                'email' => 'muhammad.luthfi@polindra.ac.id',
                'nip' => '199301042020121010',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Tito Endramawan, S.Pd., M.Eng.',
                'email' => 'tito.endramawan@polindra.ac.id',
                'nip' => '198308312021211002',
                'role' => 'pegawai',
                'jabatan' => 'Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Emin Haris, S.T., M.Eng.',
                'email' => 'emin.haris@polindra.ac.id',
                'nip' => '198205052021211009',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Yusup Nur Rohmat, S.T., M.T.',
                'email' => 'yusup.nur.rohmat@polindra.ac.id',
                'nip' => '198605062024211018',
                'role' => 'pegawai',
                'jabatan' => 'Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Mohammad Azwar Amat, S.T.,M.T.',
                'email' => 'azwar.amat@polindra.ac.id',
                'nip' => '199202282022031006',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sukroni, S.T.,M.T.',
                'email' => 'sukroni@polindra.ac.id',
                'nip' => '198909242022031004',
                'role' => 'pegawai',
                'jabatan' => 'Kepala UPA Perawatan dan Perbaikan',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Leo Van Gunawan, M.T.',
                'email' => 'leo.gunawan@polindra.ac.id',
                'nip' => '199207302022031005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Muhamad Ghozali, S.T.,M.T.',
                'email' => 'muhamad.ghozali@polindra.ac.id',
                'nip' => '199106222022031005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Bobi Khoerun, M.T.',
                'email' => 'bobi.khoerun@polindra.ac.id',
                'nip' => '198806032018031001',
                'role' => 'pegawai',
                'jabatan' => 'Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Wardika, S.ST., M.Eng.',
                'email' => 'wardika@polindra.ac.id',
                'nip' => '198511172019031011',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Ketua Jurusan Teknik',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rofan Aziz, S.T., M.T.',
                'email' => 'rofan.aziz@polindra.ac.id',
                'nip' => '198506212020121004',
                'role' => 'pegawai',
                'role_khusus_1' => 'Wadir Bidang Perencanaan, Keuangan, dan Umum',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Direktur',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Yudhy Kurniawan, A.Md., S.T., M.T.',
                'email' => 'yudhy.kurniawan@polindra.ac.id',
                'nip' => '197710112021211003',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Aa Setiawan, S.T.,M.T.',
                'email' => 'aa.setiawan@polindra.ac.id',
                'nip' => '197901012021211013',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Karsid, S.T., M.T.',
                'email' => 'karsid@polindra.ac.id',
                'nip' => '198307182021211001',
                'role' => 'pegawai',
                'role_khusus_1' => 'Wadir Bidang Kemahasiswaan dan Alumni',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Wakil Direktur Bidang Kemahasiswaan dan Alumni',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ahmad Maulana Kartika, A.Md., S.T.,MT.',
                'email' => 'ahmad.maulana@polindra.ac.id',
                'nip' => '198306022021211006',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sunanto, S.T., M.Eng.',
                'email' => 'sunanto@polindra.ac.id',
                'nip' => '198007242021211005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ferry Sugara, S.T.,M.Eng.',
                'email' => 'ferry.sugara@polindra.ac.id',
                'nip' => '197801062024211003',
                'role' => 'pegawai',
                'jabatan' => 'Lektor',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Icha Fatwasauri, S.Si.,M.T.',
                'email' => 'icha.fatwasauri@polindra.ac.id',
                'nip' => '199503152022032015',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Indra Fitriyanto, S.Pd.,M.T.',
                'email' => 'indra.fitriyanto@polindra.ac.id',
                'nip' => '199503032022031009',
                'role' => 'pegawai',
                'jabatan' => 'Kepala UPA Lab Terpadu',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Tri Haryanti, S.T.,M.T.',
                'email' => 'tri.haryanti@polindra.ac.id',
                'nip' => '198710252022032004',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Fauzan Amri, S.Si.,M.T.',
                'email' => 'fauzan.amri@polindra.ac.id',
                'nip' => '199509062022031007',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Jauharotul Maknunah, M.T.',
                'email' => 'jauharotul.maknunah@polindra.ac.id',
                'nip' => '199212092022032008',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Vera Wati, M.Kom.',
                'email' => 'vera.wati@polindra.ac.id',
                'nip' => '199409032024062002',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dwianti Westari, S.T., M.T.',
                'email' => 'dwianti.westari@polindra.ac.id',
                'nip' => '199201062024062002',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rhesti Nurlina Suhanto, S.Si., M.T.',
                'email' => 'rhesti.suhanto@polindra.ac.id',
                'nip' => '199309172024062005',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Firda Julianita Pradina Putri, S.T., M.T.',
                'email' => 'firda.putri@polindra.ac.id',
                'nip' => '199407032024062001',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Muhammad Edi Iswanto, M.Kom.',
                'email' => 'edi.iswanto@polindra.ac.id',
                'nip' => '199401302024061002',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Syaeful Ilman, S.T., M.T.',
                'email' => 'syaeful.ilman@polindra.ac.id',
                'nip' => '199303252024061001',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Candra Irawan, S.Tr., M.Eng.',
                'email' => 'candra.irawan@polindra.ac.id',
                'nip' => '199210062024061004',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ahmad Farhan, M.T.',
                'email' => 'ahmad.farhan@polindra.ac.id',
                'nip' => '199204232024061003',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rahajeng Kurnianingtyas, M.T.',
                'email' => 'rahajeng.kurnianingtyas@polindra.ac.id',
                'nip' => '199410192024062003',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Bagus Dharmawan Hadi, S.T., M.T.',
                'email' => 'bagus.dharmawan@polindra.ac.id',
                'nip' => '199301162024061001',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Claudha Alba Pradhana, S.T., M.T.',
                'email' => 'claudha.pradhana@polindra.ac.id',
                'nip' => '199507092024061001',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Arif Maulana Yusuf, S.Kom., M.Kom.',
                'email' => 'arif.yusuf@polindra.ac.id',
                'nip' => '199110092024061003',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Joko Irawan, S.Kom., M.Kom.',
                'email' => 'joko.irawan@polindra.ac.id',
                'nip' => '199107282024061001',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Adi Kusmayadi, S.ST., M.Sc.',
                'email' => 'adi.kusmayadi@polindra.ac.id',
                'nip' => '199303202024061001',
                'role' => 'pegawai',
                'jabatan' => 'Asisten Ahli',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ade Syarief, S.E., M.Si.',
                'email' => 'ade.syarief@polindra.ac.id',
                'nip' => '197904122006041008',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala Bagian Akademik dan Kemahasiswaan',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Marsono, S.AP.',
                'email' => 'marsono@polindra.ac.id',
                'nip' => '197201021999011001',
                'role' => 'pegawai',
                'jabatan' => 'Kepala Subbagian Akademik',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rais Faisal Ahyar, S.T., M.Eng.',
                'email' => 'rais.faisal@polindra.ac.id',
                'nip' => '198202192008121001',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala Bagian Perencanaan, Keuangan, dan Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Faizal Muamar, S.H.',
                'email' => 'faizal.muamar@polindra.ac.id',
                'nip' => '198204292014041001',
                'role' => 'pegawai',
                'role_khusus_2' => 'Atasan Langsung',
                'jabatan' => 'Kepala Subbagian Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Tantowi Yahya Yogas Tamara, A.Md.',
                'email' => 'tantowi.yogas@polindra.ac.id',
                'nip' => '199602092019031011',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Pusat Penjaminan Mutu dan Pengembangan Pembelajaran',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Markiyah, A.Md.',
                'email' => 'markiyah@polindra.ac.id',
                'nip' => '199108092019032020',
                'role' => 'pegawai',
                'jabatan' => 'Pustakawan Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Darwati, S.Sos.',
                'email' => 'darwati@polindra.ac.id',
                'nip' => '198701092021212001',
                'role' => 'pegawai',
                'jabatan' => 'Pustakawan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Hadi Nurdiansyah',
                'email' => 'hadi.nurdiansyah@polindra.ac.id',
                'nip' => '198301122021211004',
                'role' => 'pegawai',
                'jabatan' => 'Pustakawan Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sukandar, A.Md.',
                'email' => 'sukandar@polindra.ac.id',
                'nip' => '199005142019031018',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Situs/WEB',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ida Nuraini',
                'email' => 'ida.nuraini@polindra.ac.id',
                'nip' => '197703202009012004',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rudi Supriat',
                'email' => 'rudi.supriat@polindra.ac.id',
                'nip' => '196712162021211004',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Komputer Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Adi Surya Suwardi Ansyah, S.Kom.',
                'email' => 'adi.surya@polindra.ac.id',
                'nip' => '199712272024211016',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Komputer Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Wahyu Winarto',
                'email' => 'wahyu.winarto@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Petugas Teknologi Informasi Komputer',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sinta Oktalia, S.E.',
                'email' => 'sinta.oktalia@polindra.ac.id',
                'nip' => '199410262019032016',
                'role' => 'pegawai',
                'jabatan' => 'Analis PK APBN Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rina Fatimah, A.Md.',
                'email' => 'rina.fatimah@polindra.ac.id',
                'nip' => '198607202019032008',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Keuangan APBN Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sani Maulana Hadi, S.E.',
                'email' => 'sani.maulana@polindra.ac.id',
                'nip' => '198609082021211003',
                'role' => 'pegawai',
                'jabatan' => 'Perencana Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Aprilia Purwanti, S.Pd.',
                'email' => 'aprilia.purwanti@polindra.ac.id',
                'nip' => '198704242021212002',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Hubungan Masyarakat Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Heru Khaerudin, S.Pd.i',
                'email' => 'heru.khaerudin@polindra.ac.id',
                'nip' => '198807062021211001',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Hubungan Masyarakat Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dharmawan Trisanto',
                'email' => 'dharmawan.trisanto@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Tenaga Peliputan',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Jaya Nugraha, A.Md.',
                'email' => 'jaya.nugraha@polindra.ac.id',
                'nip' => '198812132019031007',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Barang Milik Negara',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Zakia Risky Mirza, A.Md.',
                'email' => 'zakia.risky@polindra.ac.id',
                'nip' => '199504282019031009',
                'role' => 'pegawai',
                'jabatan' => 'Pengolah Data',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Halida Nurul Fitri, S.E.',
                'email' => 'halida.nurulfitri@polindra.ac.id',
                'nip' => '199602232019032016',
                'role' => 'pegawai',
                'jabatan' => 'Analis Sumber Daya Manusia Aparatur',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Madirah, S.H.',
                'email' => 'madirah@polindra.ac.id',
                'nip' => '198601102021211001',
                'role' => 'pegawai',
                'jabatan' => 'Analis Sumber Daya Manusia Aparatur Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Eko Purnomo, S.E.',
                'email' => 'eko.purnomo@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Keuangan',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Hikmawati Safitri Zain, S.E.',
                'email' => 'hikmawati.safitri@polindra.ac.id',
                'nip' => '198904222021212001',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Kusnadi',
                'email' => 'kusnadi@polindra.ac.id',
                'nip' => '197601032021211006',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Faizin',
                'email' => 'faizin@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Barang Milik Negara',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Agus Supriadi',
                'email' => 'agus.supriadi@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Khusni Prihadi',
                'email' => 'khusni.prihadi@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Agus Abdurahman, S.E.',
                'email' => 'agus.abdurahman@polindra.ac.id',
                'nip' => '198007192021211007',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Atik Sulaisiyah, S.T.',
                'email' => 'atik.sulaisiyah@polindra.ac.id',
                'nip' => '198209042021212014',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Komputer Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Hery Prayitno, S.Sos.',
                'email' => 'hery.prayitno@polindra.ac.id',
                'nip' => '198401192021211002',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Mayang Sofiani, S.E.',
                'email' => 'mayang.sofiani@polindra.ac.id',
                'nip' => '198108102021212009',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Komputer Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Maria Ulfah, S.Ds.',
                'email' => 'maria.ulfah@polindra.ac.id',
                'nip' => '198411262021212002',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ahmad Jamaludin, A.Md.',
                'email' => 'ahmad.jamaludin@polindra.ac.id',
                'nip' => '199006062021211001',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Komputer Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Nyoman Yos Valetta, S.T.',
                'email' => 'nyoman.yos@polindra.ac.id',
                'nip' => '197212162021211002',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Heru Hermawan, S.Kom.',
                'email' => 'heru.hermawan@polindra.ac.id',
                'nip' => '199101262024211016',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ade Novaria, A.Md.',
                'email' => 'ade.novaria@polindra.ac.id',
                'nip' => '199110102019032033',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Informasi Akademik',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Warjo',
                'email' => 'warjo@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Indra Purnama',
                'email' => 'indra.purnama@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Sarana dan Prasarana',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sodikin',
                'email' => 'sodikin@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Teknisi Laboratorium',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Suwanda, A.Md.',
                'email' => 'suwanda.amd@polindra.ac.id',
                'nip' => '198510052021211002',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Hadi Prayietno, S.T.',
                'email' => 'hadi.prayietno@polindra.ac.id',
                'nip' => '199007052021211001',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Saiful Bachri, S.T.',
                'email' => 'saiful.bachri@polindra.ac.id',
                'nip' => '197310192021211001',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Isni Somimah, S.E.',
                'email' => 'isni.somimah@polindra.ac.id',
                'nip' => '198107172021212008',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dodi Rustandi',
                'email' => 'dodi.rustandi@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Umum',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Ririn Herliyanti, A.Md.',
                'email' => 'ririn.herliyanti@polindra.ac.id',
                'nip' => '198401152021212001',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dulmuin, S.ST.',
                'email' => 'dulmuin@polindra.ac.id',
                'nip' => '198508262021211001',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Didi Tasyadi, S.T.',
                'email' => 'didi.tasyadi@polindra.ac.id',
                'nip' => '198912132021211001',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Bhakti Wibowo, A.Md.',
                'email' => 'bhakti.wibowo@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Teknisi Laboratorium',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Mamat Matori',
                'email' => 'mamat.matori@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengadministrasi Sarana dan Prasarana',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Erika Candrasari',
                'email' => 'erika.candrasari@polindra.ac.id',
                'nip' => '198005082021212009',
                'role' => 'pegawai',
                'jabatan' => 'Pranata Komputer Terampil',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Achyani, S.P.',
                'email' => 'achyani@polindra.ac.id',
                'nip' => '198011022021211002',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Dede Paulina Pugar, S.E.',
                'email' => 'dede.paulina@polindra.ac.id',
                'nip' => '198602072021212006',
                'role' => 'pegawai',
                'jabatan' => 'Arsiparis Ahli Pertama',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Icha Syahrotul Anam, S.TP., M.Sc.',
                'email' => 'icha.syahrotul@polindra.ac.id',
                'nip' => '',
                'role' => 'pegawai',
                'jabatan' => 'Pengelola Pengabdian Kepada Masyarakat',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($users as $userData) {
            // Pastikan NIP tidak kosong
            if (empty($userData['nip'])) {
                // Jika NIP kosong, kita bisa memberikan NIP default atau menghasilkan NIP unik
                $userData['nip'] = 'default_nip_' . uniqid();
            }

            // Periksa apakah NIP sudah ada di database (menghindari duplikasi)
            if (User::where('nip', $userData['nip'])->exists()) {
                // Jika NIP sudah ada, lewati pengguna ini
                continue;
            }
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'nip' => $userData['nip'],
                'role' => $userData['role'],
                'jabatan' => $userData['jabatan'],
                'password' => $userData['password']
            ]);

            if (isset($userData['role_khusus_1'])) {
                $user->role_khusus_2 = $userData['role_khusus_1'];
                $user->save();
            }
            if (isset($userData['role_khusus_2'])) {
                $user->role_khusus_2 = $userData['role_khusus_2'];
                $user->save();
            }

            Kependudukan::create(['user_id' => $user->id]);
            Keluarga::create(['user_id' => $user->id]);
            Kepegawaian::create(['user_id' => $user->id]);
            AlamatdanKontak::create(['user_id' => $user->id]);
            Lainlain::create(['user_id' => $user->id]);
            TandaTangan::create(['user_id' => $user->id]);
        }
    }
}