@extends('layouts.main')

@section('konten')
<div class="w-full h-[85%] px-[5%]">
    <div class="flex flex-col justify-between pb-4 lg:flex-row items-center">
        @if ($message = Session::get('success'))
            <div id="successPopup" class="bg-green-500 text-white px-4 py-2 rounded-md fixed top-24 left-1/2 transform -translate-x-1/2 -translate-y-1/2 transition duration-[5000ms]">
                <span class="mr-2">{{ $message }}</span>
                <button id="closePopup" class="ml-4 bg-white text-gray-800 px-2 rounded">X</button>
            </div>
        @endif
        @if ($message = Session::get('error'))
        <div id="successPopup" class="bg-red-500 text-white px-4 py-2 rounded-md fixed top-24 left-1/2 transform -translate-x-1/2 -translate-y-1/2 transition duration-[5000ms]">
            <span class="mr-2">{{ $message }}</span>
            <button id="closePopup" class="ml-4 bg-white text-gray-800 px-2 rounded">X</button>
        </div>
        @endif

        <div class="flex items-center text-base md:text-lg">
            <div class="flex">
                <i class="hidden mt-[0.35rem] mr-3 fas fa-list lg:block"></i>Inspeksi Peralatan Mekanik > <b class="pl-1">{{ strtoupper(Auth::user()->role) }}</b>
            </div>
        </div>
        <div class="flex">
            <form action="{{ route('cari_data') }}" method="GET" class="flex">
                <div>
                    <input type="text" class="w-48 px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none md:h-10 md:w-72 focus:outline-none focus:shadow-outline" name="search" id="search">
                </div>
                <div class="pl-2">
                    <button type="submit" class="px-3 py-2 font-bold text-white bg-green-700 rounded md:h-10 hover:bg-green-800">Cari</button>
                </div>
            </form>

            @if (Auth::user()->role == 'admin')
                <!-- Modal toggle -->
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="hidden h-10 px-3 py-2 ml-10 font-bold text-white bg-blue-700 rounded md:block hover:bg-blue-800" type="button">
                    Tambah Peralatan
                </button>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block h-10 px-10 py-2 ml-2 font-bold text-white bg-blue-700 rounded md:hidden hover:bg-blue-800" type="button">
                    +
                </button>

                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Tambah Peralatan Mekanik
                                </h3>
                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('tambah_data') }}" method="POST">
                                @csrf
                                <div class="p-4 space-y-4 md:p-5">
                                    <div class="flex flex-wrap mb-6 -mx-3">
                                        <div class="w-full px-3">
                                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Nama Peralatan Mekanik
                                            </label>
                                            <select name="nama" class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                <option>Pilih Nama Alat ...</option>
                                                <option value="Mesin Bar Bender">Mesin Bar Bender</option>
                                                <option value="Mesin Bar Cutter">Mesin Bar Cutter</option>
                                                <option value="Travo Las Listrik">Travo Las Listrik</option>
                                                <option value="Gerinda Tangan Listrik">Gerinda Tangan</option>
                                                <option value="Gergaji Mesin Lingkaran">Gergaji Mesin Lingkaran</option>
                                                <option value="Mesin JackHammer">Mesin JackHammer</option>
                                                <option value="Mesin Bor Listrik">Bor Tangan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap mb-6 -mx-3">
                                        <div class="w-full px-3">
                                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                            Nomor Rangka Mesin
                                            </label>
                                            <input required name="rangka" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap mb-6 -mx-3">
                                        <div class="w-full px-3">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                            Nomor Identitas Mesin
                                        </label>
                                        <input required name="identitas" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex justify-end p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="bg-white overflow-auto h-[100%]">
        <table class="w-full text-center border-collapse">
            <thead>
                <tr>
                    <th class="w-8 px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">No</th>
                    <th class="pr-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Nama Peralatan Mekanik</th>
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">No. Identitas</th>
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">No. Rangka</th>
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Periode Inspeksi</th>
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Keterangan</th>
                    @if (Auth::user()->role !== 'operator' && Auth::user()->role !== 'supervisor')
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">
                        @if (Auth::user()->role == 'admin')
                            Edit Akses
                        @endif
                        @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik')
                            Form Inspeksi
                        @endif
                    </th>
                    @endif
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Tagging Inspeksi</th>
                    @if (Auth::user()->role == 'admin')
                    <th class="w-12 px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">QR_Code</th>
                    @endif
                    @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik' )
                    <th class="w-12 px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Validasi</th>
                    @endif
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'supervisor')
                    <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach ($peralatan as $p)
                <tr class="hover:bg-grey-lighter">
                    <td class="border-b md:py-2 border-grey-light">{{$no++}}</td>
                    <td class="border-b md:py-2 border-grey-light">
                        @if (Auth::user()->role == 'admin')
                            <div class="flex items-center">
                                <div class="relative inline-block text-left w-[10%]">
                                    <div>
                                        <button type="button" id="dropdownButton{{ $p->id }}" data-dropdown-toggle="dropdown{{ $p->id }}" class="btn btn-secondary">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                        <!-- Dropdown menu -->
                                    <div id="dropdown{{ $p->id }}" class="hidden absolute z-10 w-32 bg-white rounded shadow dark:bg-gray-700">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton{{ $p->id }}">
                                            <li>
                                                <form action="{{ route('active', $p->id) }}" method="POST">
                                                @csrf
                                                    <input type="hidden" name="status" value="active">
                                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('active', $p->id) }}" method="POST">
                                                @csrf
                                                    <input type="hidden" name="status" value="deactive">
                                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Inactivate</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w-[90%]">{{ $p->nama }}</div>
                            </div>
                        @else
                        {{ $p->nama }}
                        @endif
                    </td>
                    <td class="border-b md:py-2 border-grey-light">{{ $p->identitas }}</td>
                    <td class="border-b md:py-2 border-grey-light">{{ $p->rangka }}</td>
                    <td class="border-b md:py-2 border-grey-light">
                        @if ($p->periode == NULL)
                        Belum Diinspeksi
                        @else
                        {{\Carbon\Carbon::parse($p->periode)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($p->periode_akhir)->format('d-m-Y') }} @if (now()->diffInDays($p->periode_akhir) < 7)
                        <o class="text-red-600">*</o>
                        @else

                        @endif
                        @endif
                    </td>
                    <td class="border-b md:py-2 border-grey-light">
                        @if ($p->keterangan == '0')
                        Layak
                        @endif
                        @if ($p->keterangan == '1')
                        Tidak Layak
                        @endif
                        @if ($p->keterangan == null)
                        Belum Diinspeksi
                        @endif
                    </td>
                    @if (Auth::user()->role == 'admin')
                    <td class="border-b md:py-2 border-grey-light">
                        @if ($p->style == 'none')
                        Aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                    @endif
                    @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik')
                        <td class="border-b md:py-2 border-grey-light">
                            <a class="{{ $p->style }}" href="{{ route('pertanyaan', $p->slug) }}">
                                <img src="{{ asset('writing.png') }}" class="w-[2rem] mx-auto" alt="">
                            </a>
                        </td>
                    @endif
                    <td class="border-b md:py-2 border-grey-light">
                        @if ($p->keterangan == null)
                        <button class="popupButton bg-transparent border-none p-0 cursor-pointer" data-id="{{ $p->id }}">
                            <img src="{{ asset('print.png') }}" alt="Button Image" class="w-[2rem] mx-auto">
                        </button>

                        <!-- Modal -->
                        <div id="popup-{{ $p->id }}" class="modal bg-red-500 text-white px-4 py-2 rounded-md fixed top-24 left-1/2 transform -translate-x-1/2 hidden">
                            <span class="mr-2">Mohon Untuk Menyelesaikan Inspeksinya Terlebih Dahulu</span>
                            <button class="closeButton ml-4 bg-white text-gray-800 px-2 rounded" data-id="{{ $p->id }}">X</button>
                        </div>
                        @else
                        <a href="{{ route('pdf_view', $p->slug) }}" target='_blank'>
                            <img src="{{ asset('print.png') }}" class="w-[2rem] mx-auto" alt="">
                        </a>
                        @endif
                    </td>
                    @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik' || Auth::user()->role == 'admin')
                    <td class="border-b md:py-2 border-grey-light">
                        @if (Auth::user()->role == 'admin')
                            <!-- Modal toggle -->
                            <button data-modal-target="qr_modal{{ $p->slug }}" data-modal-toggle="qr_modal{{ $p->slug }}" class="w-[2rem]" type="button">
                                <img src="{{ asset('picture.png') }}" class="w-[2rem] mx-auto" alt="">
                            </button>

                            <!-- Main modal -->
                            <div id="qr_modal{{ $p->slug }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-sm max-h-full p-4">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                QR Code
                                            </h3>
                                            <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="qr_modal{{ $p->slug }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="flex justify-center py-4">
                                            {{ QrCode::size(200)->generate('http:://localhost:8080/inspeksi/hasil/'.$p->slug) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik')
                        <form action="{{ route('saveSign', $p->slug) }}" method="POST" class="flex justify-center" method="POST">
                            @csrf
                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2.5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Validasi</button>
                            {{-- <img src="{{ asset('signature.png') }}" class="w-[2rem] mx-auto" alt=""> --}}
                            @if (Auth::user()->role == 'safety' && $p->pdf_status == 1 && $p->safety_sign == null)
                            <p class="mt-[-.1rem] ml-[.2rem] text-red-600">*</p>
                            @endif
                            @if (Auth::user()->role == 'mekanik' && $p->pdf_status == 1 && $p->mechanic_sign == null)
                            <p class="mt-[-.3rem] text-red-600">*</p>
                            @endif
                        </form>
                        @endif
                    </td>
                    @endif
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'supervisor')
                        <td class="border-b md:py-2 border-grey-light">
                            <form action="{{ route('hapus_data', $p->id) }}" method="POST">
                                @csrf
                                <button type="submit"><img class="w-[2rem]" src="{{ asset('delete_6861362.png') }}" alt=""></button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
// Fungsi untuk menyembunyikan pop-up
function hideSuccessPopup() {
    document.getElementById('successPopup').classList.add('hidden');
}

// Mendaftarkan event listener untuk tombol Close
document.getElementById('closePopup').addEventListener('click', function() {
    hideSuccessPopup();
});

// Fungsi untuk menyembunyikan pop-up setelah beberapa detik
setTimeout(function() {
    hideSuccessPopup();
}, 5000);

</script>
<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const popupButtons = document.querySelectorAll('.popupButton');
            const closeButtons = document.querySelectorAll('.closeButton');

            popupButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    document.getElementById(`popup-${id}`).classList.remove('hidden');
                });
            });

            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    document.getElementById(`popup-${id}`).classList.add('hidden');
                });
            });

            // Hide the modal when clicking outside of it
            window.addEventListener('click', function(event) {
                closeButtons.forEach(button => {
                    const id = button.getAttribute('data-id');
                    const modal = document.getElementById(`popup-${id}`);
                    if (event.target == modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        });
</script>
@endsection
