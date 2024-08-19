<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pertanyaan;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pertanyaan::truncate();
        pertanyaan::create([
            'komponen' => 'Mesin',
            'kondisi' => 'Tidak ada tanda kerusakan (visual)',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'V-Belt',
            'kondisi' => 'Kondisi V- belt tidak retak',
            'regulasi' => 'Buku Informasi Melakukan Perawatan Berkala Engine oleh Kementerian Ketenagakerjaan R.I.',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Cover V-Belt',
            'kondisi' => 'Cover sabuk tidak rusak',
            'regulasi' => 'ISO 12100 klasusul 6.3.3.1',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Pengunci pin Bending',
            'kondisi' => 'Tidak bergerak saat operasi',
            'regulasi' => 'ANSI B11.19 Bab 12.1.1',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Tombol on/off',
            'kondisi' => 'Berfungsi dengan baik',
            'regulasi' => 'Permenaker 38 Tahun 2016 pasal 7 ayat 1',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Stopkontak',
            'kondisi' => 'Cover tidak rusak',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat 1 bagian 2',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka.',
            'regulasi' => 'NFPA 70E bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Menghubungkan steker',
            'kondisi' => 'Ketat, tidak longgar',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat 1 bagian 4',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Tombol emergency stop',
            'kondisi' => 'Mudah dijangkau operator ',
            'regulasi' => 'ISO 13850 (2015) klausul 4.1.1.1',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Lampu indikator',
            'kondisi' => 'Berfungsi dengan baik ',
            'regulasi' => 'ANSI B11.19 Klausul 12.3.1.5',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding',
            'kondisi' => 'Tersedia dan berfungsi',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebersihan',
            'kondisi' => 'Meja kerja bersih',
            'regulasi' => 'OSHA 1926.25(a)',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebisingan',
            'kondisi' => 'Emisi kebisingan <85 db',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian B',
            'nama_peralatan' => 'Mesin Bar Bender',
        ]);

        ##Seeder Bar Cutter
        pertanyaan::create([
            'komponen' => 'Mesin',
            'kondisi' => 'Tidak ada tanda kerusakan ',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'V-belt',
            'kondisi' => 'Tidak retak',
            'regulasi' => 'Buku Informasi Melakukan Perawatan Berkala Engine oleh Kementerian Ketenagakerjaan R.I.',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Cover V-Belt',
            'kondisi' => 'Cover sabuk tidak rusak',
            'regulasi' => 'ISO 12100 klasusul 6.3.3.1',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol mesin ',
            'kondisi' => 'Mudah untuk operasi on dan off ',
            'regulasi' => 'Permenaker 38 Tahun 2016 pasal 7 ayat 1',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Stopkontak',
            'kondisi' => 'Cover tidak rusak',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat 1 bagian 2',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka.',
            'regulasi' => 'NFPA 70E bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Menghubungkan steker',
            'kondisi' => 'Ketat, tidak longgar',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat 1 bagian 4',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Tombol emergency stop',
            'kondisi' => 'Mudah dijangkau operator dan Berwarna merah',
            'regulasi' => 'ISO 13850 (2015) klausul 4.1.1.1',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding ',
            'kondisi' => 'Tersedia dan berfungsi',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebersihan',
            'kondisi' => 'Meja kerja bersih',
            'regulasi' => 'OSHA 1926.25(a)',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebisingan',
            'kondisi' => 'Emisi kebisingan <85 db',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian B',
            'nama_peralatan' => 'Mesin Bar Cutter',
        ]);

        // Gerinda Tangan Listrik

        pertanyaan::create([
            'komponen' => 'Handle',
            'kondisi' => 'Tersedia (kokoh dan tidak rusak)',
            'regulasi' => 'NFPA 79 Klausul 5.1.11.1',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Cover mata gerinda',
            'kondisi' => 'Tidak rusak, tidak retak',
            'regulasi' => 'ISO 12100 klasusul 6.3.3.1',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Pengunci baut mata gerinda',
            'kondisi' => 'Terpasang dengan rapat',
            'regulasi' => 'ANSI B11.19 Bab 12.1.1',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol menyalakan terus-menerus',
            'kondisi' => 'Berfungsi dengan baik',
            'regulasi' => 'OSHA 1910.243.(a).(2).(ii)',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol pengganti arah',
            'kondisi' => 'Berfungsi',
            'regulasi' => 'NFPA 70e Bab 2 Pasal 220 ayat 1',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Roda',
            'kondisi' => 'Tidak ada keretakan',
            'regulasi' => 'OSHA 1926.1412(f)(2)(iii)',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Motor',
            'kondisi' => 'Tidak ada percikan',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka.',
            'regulasi' => 'NFPA 70E Bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Steker',
            'kondisi' => 'Ketat, Tidak Longgar',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat (1) bagian 4',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Sambungan stopkontak',
            'kondisi' => 'Kabel sambungan tidak kusut',
            'regulasi' => 'NFPA 79 klausul 11.2.1.8',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding',
            'kondisi' => 'Tersedia',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebisingan',
            'kondisi' => 'Emisi kebisingan <85 db',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian B',
            'nama_peralatan' => 'Gerinda Tangan Listrik',
        ]);

        // Mesin JackHammer
        pertanyaan::create([
            'komponen' => 'Mesin',
            'kondisi' => 'Tidak ada tanda kerusakan (visual)',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Handle',
            'kondisi' => 'Kokoh dan tidak ada retakan',
            'regulasi' => 'NFPA 79 Klausul 5.1.11.1',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol Tekanan konstan',
            'kondisi' => 'Tersedia & Berfungsi dengan baik',
            'regulasi' => 'OSHA 1910.243.(a).(2).(ii)',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka.',
            'regulasi' => 'NFPA 70E bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Steker',
            'kondisi' => 'Ketat, Tidak Longgar',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat 1 bagian 4',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Sambungan stopkontak',
            'kondisi' => 'Kabel sambungan tidak kusut',
            'regulasi' => 'NFPA 79 klausul 11.2.1.8',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding',
            'kondisi' => 'Tersedia',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebisingan',
            'kondisi' => 'Emisi kebisingan <85 db',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian B',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        pertanyaan::create([
            'komponen' => 'Getaran',
            'kondisi' => 'Emisi getaran <5m/det<sup>2</sup>',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian C',
            'nama_peralatan' => 'Mesin JackHammer',
        ]);
        //Trafo Las Listrik
        pertanyaan::create([
            'komponen' => 'Klem masa',
            'kondisi' => 'Bebas dari partikel logam yang menempel dan tidak menimbulkan percikan',
            'regulasi' => 'OSHA 1910.254(d)(2)',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Pegangan elektroda',
            'kondisi' => 'Tidak panas saat dipegang',
            'regulasi' => 'OSHA 1926.351(h)(2)',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Pegangan elektroda',
            'kondisi' => 'Dalam keadaan kering dan tidak basah',
            'regulasi' => 'OSHA 1926.351(h)(2)',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'APAR',
            'kondisi' => 'Terdapat APAR yang layak pada area pengelasan',
            'regulasi' => 'OSHA 1910.252 (a) (2) (ii)',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Tombol On/Off',
            'kondisi' => 'Berfungsi dengan baik',
            'regulasi' => 'Permenaker 38 Tahun 2016 pasal 7 ayat 1',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Mesin',
            'kondisi' => 'Tidak ada tanda kerusakan (visual)',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka',
            'regulasi' => 'NFPA 70E bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Steker',
            'kondisi' => 'Ketat, Tidak Longgar',
            'regulasi' => 'NFPA 70E bab 2 pasal 245 ayat 1 bagian 4',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Sambungan stopkontak',
            'kondisi' => 'Kabel sambungan tidak kusut',
            'regulasi' => 'NFPA 79 klausul 11.2.1.8',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding',
            'kondisi' => 'Tersedia',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Travo Las Listrik',
        ]);

        // Mesin Bor Listrik
        pertanyaan::create([
            'komponen' => 'Mesin',
            'kondisi' => 'Tidak ada tanda kerusakan (visual)',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Gear / roda gigi',
            'kondisi' => 'Dipasang dengan baik',
            'regulasi' => 'ISO 12100 klasusul 6.3.3.1',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Pengunci Mata Bor',
            'kondisi' => 'Dipasang dengan Rapat',
            'regulasi' => 'ANSI B11.19 Bab 12.1.1',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol Pengganti Arah',
            'kondisi' => 'Tersedia & mudah ditekan',
            'regulasi' => 'NFPA 70e Bab 2 Pasal 220 ayat 1',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Handle',
            'kondisi' => 'Kokoh dan tidak ada retakan',
            'regulasi' => 'NFPA 79 Klausul 5.1.11.1',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol Tekanan konstan',
            'kondisi' => 'Tersedia & Berfungsi dengan baik',
            'regulasi' => 'OSHA 1910.243.(a).(2).(ii)',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka',
            'regulasi' => 'NFPA 70E bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Steker',
            'kondisi' => 'Ketat, Tidak Longgar',
            'regulasi' => 'NFPA 70E Bab 2 pasal 245 ayat 1 bagian 4',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Sambungan stopkontak',
            'kondisi' => 'Kabel sambungan tidak kusut',
            'regulasi' => 'NFPA 79 klausul 11.2.1.8',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding',
            'kondisi' => 'Tersedia',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebisingan',
            'kondisi' => 'Emisi kebisingan <85 db',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian B',
            'nama_peralatan' => 'Mesin Bor Listrik',
        ]);

        // Gergaji Mesin Lingkaran
        pertanyaan::create([
            'komponen' => 'Handle',
            'kondisi' => 'Kokoh dan permukaan tidak licin',
            'regulasi' => 'NFPA 79 Klausul 5.1.11.1',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol tekanan konstan',
            'kondisi' => 'Tersedia dan berfungsi',
            'regulasi' => 'OSHA 1910.243.(a).(2).(ii)',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Mesin',
            'kondisi' => 'Tidak ada tanda kerusakan (visual)',
            'regulasi' => 'ISO 12100 Klausul 12.5',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol penyesuaian kemiringan',
            'kondisi' => 'Berfungsi',
            'regulasi' => 'OSHA 1910.243(a)(2)(iv)',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Roda gergaji',
            'kondisi' => 'Tidak ada retakan',
            'regulasi' => 'Permenaker 38 Tahun 2016 tentang Pesawat Tenaga dan Produksi pasal 70 ayat 4',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Kontrol penyesuaian kedalaman',
            'kondisi' => 'Berfungsi',
            'regulasi' => 'OSHA 1910.243(a)(2)(iv)',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Cover pisau',
            'kondisi' => 'Terpasang dengan baik',
            'regulasi' => 'OSHA 1910.243(a).(1).(i)',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Kabel',
            'kondisi' => 'Tidak sobek atau terbuka.',
            'regulasi' => 'NFPA 70E bab 2 pasal 215 ayat (1)',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Steker',
            'kondisi' => 'Ketat, Tidak Longgar',
            'regulasi' => 'NFPA 70E bab 2 pasal 245 ayat 1 bagian 4',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Sambungan stopkontak',
            'kondisi' => 'Kabel sambungan tidak kusut',
            'regulasi' => 'NFPA 79 klausul 11.2.1.8',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Grounding',
            'kondisi' => 'Berfungsi',
            'regulasi' => 'NFPA 70B klausul 29.1.4',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebersihan',
            'kondisi' => 'Area kerja bersih',
            'regulasi' => 'OSHA 1926.(25).(a)',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
        pertanyaan::create([
            'komponen' => 'Kebisingan',
            'kondisi' => 'Emisi kebisingan <85 db',
            'regulasi' => 'Permenaker 5 tahun 2018 Lampiran 1 bagian B',
            'nama_peralatan' => 'Gergaji Mesin Lingkaran',
        ]);
    }
}
