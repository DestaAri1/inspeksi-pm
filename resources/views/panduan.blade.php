@extends('layouts.main')
@section('konten')
<div class="w-full h-[100%] px-[5%]">
    <div class="bg-white overflow-auto h-[100%]">
        <div class="text-center mt-2 text-xl"><b>PANDUAN INSPEKSI PERALATAN MEKANIK</b></div>
        <div class="mx-0 md:mx-[5rem] lg:mx-[13rem] text-justify">
            <p>Panduan inspeksi peralatan mekanik pada website ini sebagai panduan para user menggunakan website. </p>
            <p class="my-2"><b>General</b></p>
            <ul class="ml-8 list-decimal">
                <li>Username dan password yang telah diberikan mohon tidak diberitahukan pada siapapun agar tidak disalahgunakan</li>
                <li>Seluruh pekerja dan staff dapat melakukan scan QR code yang terdapat di peralatan mekanik</li>
                <li>Apabila terdapat tanda kerusakan pada peralatan mekanik dapat menghubungi nomor pihak safety dan mekanik di bawah website</li>
                <li>Menu “Home” adalah grafik diagram lingkaran untuk menginformasikan persentase antara layak, tidak layak dan belum diinspeksi pada tiap peralatan mekanik</li>
            </ul>
            <p class="my-2"><b>Saat peralatan mekanik pertama kali memasuki proyek</b></p>
            <ul class="ml-8 list-decimal">
                <li>Admin menambahkan jenis peralatan mekanik pada menu “tambah peralatan” serta menambahkan no. rangka peralatan dan no. identitas peralatan.</li>
                <li>Team Safety dan team mekanik melaksanakan inspeksi pada menu “form inspeksi” lalu mengisi:
                    <ol class="list-disc ml-5">
                        <li>Periode Inspeksi</li>
                        <li>merk pembuat (apabila pada plat identitas tidak terbaca bisa menghubungi admin)</li>
                        <li>checklist layak/tidak pada komponen (bila tidak layak wajib mengisi kolom keterangan apa yang tidak layak)</li>
                        <li>mengupload dokumentasi dengan bantuan aplikasi “timestamp camera” yang dapat di download di playstore.</li>
                        <li>Klik tombol submit</li>
                    </ol>
                </li>
                <li>Team safety dan team mekanik melakukan validasi pada menu “validasi” dengan mengupload tanda tangan</li>
                <li>Admin mencetak QR code sesuai ukuran peralatan
                    <ul class="list-disc ml-5">
                        <li>Ukuran kecil (5x5cm)</li>
                        <li>Ukuran besar (10x10cm)</li>
                    </ul>
                </li>
                <li>Team safety melakukan penempelan QR code pada peralatan (penempelan stiker QR code tidak menutupi plat identitas peralatan)</li>
                <li>Team safety melakukan penempelan QR code pada peralatan (penempelan stiker QR code tidak menutupi plat identitas peralatan)</li>
            </ul>
            <p class="my-2"><b>Saat inspeksi rutin peralatan mekanik</b></p>
            <ul class="ml-8 list-decimal">
                <li>Fitur reminder akan dikirimkan pada email team safety</li>
                <li>Team safety meminta admin untuk mengaktifkan akses “edit” form inspeksi (di sebelah kiri) pada peralatan yang ingin di inspeksi</li>
                <li>Team Safety dan team mekanik melakukan inspeksi rutin pada menu “form inspeksi” lalu klik submit</li>
                <li>Supervisor memantau kegiatan inspeksi dengan melihat “tagging inspeksi”</li>
                <li>Operator peralatan mekanik dapat melakukan scan QR code pada peralatan untuk melihat hasil inspeksi pada peralatan tersebut apakah layak atau tidak</li>
            </ul>
            <p class="my-2"><b>Saat peralatan mekanik keluar area proyek</b></p>
            <ul class="ml-8 list-decimal">
                <li>Supervisor dan admin dapat menghapus daftar inspeksi peralatan mekanik apabila peralatan tersebut sudah keluar dari proyek dengan menngklik tombol gambar sampah di sebelah kanan</li>
                <li>Peralatan yang telah dihapus tidak bisa dikembalikan seperti semula maka dari itu gunakan dengan sebaik-baiknya</li>
            </ul>
        </div>
    </div>
</div>
@endsection
