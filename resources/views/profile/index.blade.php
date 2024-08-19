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
                <i class="hidden mt-[0.35rem] mr-3 fa fa-user lg:block"></i>Profile > <b class="pl-1">{{ strtoupper(Auth::user()->name) }}</b>
            </div>
        </div>
    </div>
    <div class="bg-white overflow-auto h-[100%]">
        <form class="max-w-5xl my-[3%] mx-auto" action="{{ route('profile_update', Auth::user()->id) }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ Auth::user()->name }}" disabled />
                    <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ strtoupper(Auth::user()->role) }}" disabled />
                    <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Role</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::user()->email }}" disabled/>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password Baru</label>
                <span class="toggle-password mt-[-13px]">
                    <i class="fas fa-eye-slash"></i>
                </span>
                <p class="text-sm text-gray-900 bg-transparent appearance-none dark:text-white dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600">* Kosongi jika tidak ingin mengubah password</p>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik')
            <button type="button" data-modal-target="lihat-ttd" data-modal-toggle="lihat-ttd" class="text-white mt-2 md:mt-0 bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Lihat Ttd</button>
            <button type="button" data-modal-target="upload-ttd" data-modal-toggle="upload-ttd" class="text-white mt-2 md:mt-0 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Upload Tanda Tangan</button>
            @endif
        @if (Auth::user()->role == 'safety' || Auth::user()->role == 'mekanik')
        </form>
                <!-- Modal -->
                <div id="upload-ttd" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full p-4">
                    <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Upload Tanda Tangan
                                </h3>
                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="upload-ttd">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                        <!-- Modal body -->
                        <form action="{{ route('upload_ttd', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="p-4 space-y-4 md:p-5">
                                <div class="flex flex-wrap mb-6 -mx-3">
                                    <div class="w-full px-3">
                                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" name="image" type="file">
                                        <span class="text-sm">* Ukuran gambar maksimal 2 mb</span> <br>
                                        <span class="text-sm">* Dimensi Gambar Maksimal 400x200</span> <br>
                                        <span class="text-sm">* Format Gambar Berupa .jpg, .jpeg, .png</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-end p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                                <button data-modal-hide="upload-ttd" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div id="lihat-ttd" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-lg max-h-full p-4">
                    <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Lihat Tanda Tangan
                                </h3>
                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="lihat-ttd">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 space-y-4 md:p-5">
                                <div class="flex flex-wrap mb-6 -mx-3">
                                    <div class="w-full px-3">
                                        <img src="{{ asset('signatures/' . Auth::user()->sign ) }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-end p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                <button data-modal-hide="lihat-ttd" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tutup</button>
                            </div>
                    </div>
                </div>
            </div>
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
