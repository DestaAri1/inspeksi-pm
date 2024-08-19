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
        @if ($errors->any())
            <div id="successPopup" class="bg-red-500 text-white px-4 py-2 rounded-md fixed top-24 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="flex">
                    <span>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                    <button id="closePopup" class="ml-4 bg-white text-gray-800 px-2 rounded">X</button>
                </div>
            </div>
        @endif

        <div class="flex items-center text-base md:text-lg">
            <div class="flex">
                <i class="hidden mt-[0.35rem] mr-3 fa fa-user lg:block"></i>Control Pengguna > <b class="pl-1">{{ strtoupper(Auth::user()->role) }}</b>
            </div>
        </div>
        <div class="flex">
            <form action="{{ route('search_user') }}" method="GET" class="flex">
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
                    Tambah User
                </button>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block h-10 px-10 py-2 ml-2 font-bold text-white bg-blue-700 rounded md:hidden hover:bg-blue-800" type="button">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>

                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Tambah User
                                </h3>
                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('create_user') }}" method="POST">
                                @csrf
                                <div class="p-4 space-y-4 md:p-5">
                                    <div class="flex flex-wrap mb-6 -mx-3">
                                        <div class="w-full px-3">
                                            <div class="flex flex-wrap mb-6 -mx-3">
                                                <div class="w-full px-3">
                                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                                    Username
                                                    </label>
                                                    <input required type="text" name="name" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap mb-6 -mx-3">
                                                <div class="w-full px-3">
                                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                                    Email
                                                </label>
                                                <input required type="email" name="email" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap mb-6 -mx-3">
                                                <div class="relative w-full px-3">
                                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                                        Password
                                                    </label>
                                                    <input required type="password" id="password" name="password" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                                                    <span class="toggle-password">
                                                        <i class="fas fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                                Role
                                            </label>
                                            <select name="role" class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                <option>Pilih Role ...</option>
                                                <option value="mekanik">Mekanik</option>
                                                <option value="operator">Operator</option>
                                                <option value="safety">Safety</option>
                                                <option value="supervisor">Supervisor</option>
                                            </select>
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
        @if ($search->isEmpty())
            <div class="text-center h-full mt-[-3rem] content-center text-xl">Data Tidak Ditemukan</div>
        @else
            <table class="w-full text-center border-collapse">
                <thead>
                    <tr>
                        <th class="w-8 px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">No</th>
                        <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Username</th>
                        <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Email</th>
                        <th class="px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Role</th>
                        <th class="w-44 px-3 text-sm font-bold uppercase border-b md:py-2 bg-grey-lightest text-grey-dark border-grey-light">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($search as $p)
                    <tr>
                        <td class="border-b md:py-2 border-grey-light">{{ $no++ }}</td>
                        <td class="border-b md:py-2 border-grey-light">{{ $p->name }}</td>
                        <td class="border-b md:py-2 border-grey-light">{{ $p->email }}</td>
                        <td class="border-b md:py-2 border-grey-light">{{ $p->role }}</td>
                        <td class="border-b md:py-2 border-grey-light">
                            <div class="flex justify-center">
                                <a href="{{ route('show_user', $p->id) }}">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                                </a>
                                <button data-modal-target="delete-modal{{ $p->id }}" data-modal-toggle="delete-modal{{ $p->id }}" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                <div id="delete-modal{{ $p->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-sm max-h-full p-4">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Hapus Akun
                                                </h3>
                                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal{{ $p->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{ route('delete_user', $p->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="p-4 space-y-4 md:p-5">
                                                    <div class="flex flex-wrap mb-6 -mx-3">
                                                        <div class="w-full px-3">
                                                            Apakah Anda Yakin Untuk Menghapus <b>{{ $p->name }}</b> dengan Email : <b>{{ $p->email }}</b> ?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex justify-end p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                                                    <button data-modal-hide="delete-modal{{ $p->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
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
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('.toggle-password');
        const passwordField = document.querySelector('#password');
        const icon = togglePassword.querySelector('i');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    });
</script>
@endsection
