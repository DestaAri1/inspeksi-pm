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
                <i class="hidden mt-[0.35rem] mr-3 fas fa-list lg:block"></i><b>{{ strtoupper(Auth::user()->role) }}</b> <p class="pl-1">/ Edit User /</p> <p class="pl-1">{{ $data->name }}</p>
            </div>
        </div>
    </div>
    <div class="bg-white overflow-auto h-[100%]">
        <form class="max-w-5xl my-[3%] mx-auto" action="{{ route('update_user', $data->id) }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $data->name }}" />
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $data->email }}" />
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-state">
                    @if ($data->role == 'mekanik')
                        <option value="mekanik">Mekanik</option>
                        <option value="operator">Operator</option>
                        <option value="safety">Safety</option>
                        <option value="supervisor">Supervisor</option>
                    @endif
                    @if ($data->role == 'operator')
                        <option value="operator">Operator</option>
                        <option value="mekanik">Mekanik</option>
                        <option value="safety">Safety</option>
                        <option value="supervisor">Supervisor</option>
                    @endif
                    @if ($data->role == 'safety')
                    <option value="safety">Safety</option>
                    <option value="mekanik">Mekanik</option>
                    <option value="operator">Operator</option>
                    <option value="supervisor">Supervisor</option>
                    @endif
                    @if ($data->role == 'supervisor')
                    <option value="supervisor">Supervisor</option>
                    <option value="mekanik">Mekanik</option>
                    <option value="operator">Operator</option>
                    <option value="safety">Safety</option>
                @endif
                </select>
            </div>

            <div class="flex flex-wrap mb-5 -mx-3">
                <div class="relative w-full px-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-password">
                        Password
                    </label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-3 mb-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 top-3 right-2 pr-3 flex items-center text-sm leading-5">
                        <svg id="eyeIcon" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.2.57-.442 1.115-.719 1.624M15 12a3 3 0 11-6 0 3 3 0 016 0zM19.84 14.816A9.935 9.935 0 0121 12c-1.274-4.057-5.065-7-9.542-7-1.38 0-2.687.262-3.877.733" />
                        </svg>
                        <svg id="eyeOffIcon" class="h-5 w-5 text-gray-500 hidden" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825a10.001 10.001 0 01-1.757-.125M3.72 9.307a9.953 9.953 0 011.285-1.625m.14 1.818A10.003 10.003 0 0112 5c4.28 0 8.016 2.692 9.577 6.501m-5.092 2.446a3 3 0 01-4.287 0m-.348 3.362A10.001 10.001 0 012.458 12a9.953 9.953 0 011.285-1.625m16.225 9.745a9.953 9.953 0 001.285-1.625m-7.712 2.806a10.001 10.001 0 01-7.712-7.712m0-4.506a10.003 10.003 0 0116.26 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</div>
<script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeOffIcon = document.getElementById('eyeOffIcon');

    togglePasswordButton.addEventListener('click', () => {
        const isPasswordVisible = passwordInput.type === 'text';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';
        eyeIcon.classList.toggle('hidden', !isPasswordVisible);
        eyeOffIcon.classList.toggle('hidden', isPasswordVisible);
    });
</script>
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
@endsection
