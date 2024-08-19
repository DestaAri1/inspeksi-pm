<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="flex justify-center pl-8 text-sm">
        <div>
            @include('backup.kop')
            <div class="w-[50.25rem] mb-3">
                <div class="mt-2 bg-white rounded-lg">
                    <div class="flex flex-row pl-4 text-sm">
                        <div class="w-[50%]">
                            <div class="flex h-[2.86rem] items-center w-[20rem]">
                                <div class="w-[50%]">Nomor Identitas Mesin</div>
                                <div class="w-[5%]">:</div>
                                <div class="w-[40%]">{{ $peralatan->identitas }}</div>
                            </div>
                            <div class="flex h-[2.74rem] items-center w-[20rem]">
                                <div class="w-[50%]">Nomor Rangka</div>
                                <div class="w-[5%]">:</div>
                                <div class="w-[40%]">{{ $peralatan->rangka }} </div>
                            </div>
                        </div>
                        <div class="w-[50%]">
                            <div class="flex items-center w-[20rem]">
                                <div class="w-[50%]">Periode Inspeksi</div>
                                <div class="w-[5%]">:</div>
                                <div class="w-[40%]">
                                    <input readonly type="date" class="rounded-md w-[10rem]" name="periode" value="{{ $peralatan->periode }}">
                                </div>
                            </div>
                            <div class="flex mt-1 items-center w-[20rem]">
                                <div class="w-[50%]">Merk Pembuat</div>
                                <div class="w-[5%]">:</div>
                                <div class="w-[40%]">
                                    <input readonly type="text" name="merk" class="h-10 w-[10rem] rounded-md focus:border-neutral-700 focus:ring-0" value="{{ $peralatan->merk }}">
                                </div>
                            </div>
                            <input type="hidden" name="id_peralatan" value="{{ $peralatan->id }}">
                        </div>
                    </div>
                    <div>
                        <img class="w-[30rem] mx-auto" src="@if ($peralatan->nama == 'Travo Las Listrik')
                {{ asset('mesin_las.png') }}
                @endif
                @if ($peralatan->nama == "Mesin Bar Bender")
                {{ asset('bar_bender.png') }}
                @endif
                @if ($peralatan->nama == "Mesin Bar Cutter")
                {{ asset('bar_cutter.png') }}
                @endif
                @if ($peralatan->nama == "Gerinda Tangan Listrik")
                {{ asset('mesin_gerinda.png') }}
                @endif
                @if ($peralatan->nama == "Gergaji Mesin Lingkaran")
                {{ asset('gergaji_lingkaran.png') }}
                @endif
                @if ($peralatan->nama == "Mesin JackHammer")
                {{ asset('Jackhammer.png') }}
                @endif
                @if ($peralatan->nama == "Mesin Bor Listrik")
                {{ asset('mesin_bor.png') }}
                @endif" alt="">
                    </div>
                </div>
            </div>
            <div class="w-[50.25rem] mb-5">
                <table class="w-[48rem] text-center border-collapse">
                    <thead class="bg-slate-700">
                        <tr>
                            <th class="w-4 px-2 border border-black bg-slate-300">No.</th>
                            <th class="px-2 w-[6rem] bg-slate-300 border border-black">Komponen</th>
                            <th class="px-6 w-[10rem] bg-slate-300 border border-black">Kondisi Yang Diperiksa</th>
                            <th class="px-2 w-[15rem] bg-slate-300 border border-black">Regulasi</th>
                            <th class="px-2 w-[4rem] bg-slate-300 border border-black">Aman/Tidak</th>
                            <th class="px-6 w-[6rem] border border-black bg-slate-300">Keterangan</th>
                            <th class="px-3 border border-black bg-slate-300">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($peralatan->jawabans as $i)
                        <tr>
                            <td class="border border-black">{{ $no++ }}</td>
                            <td class="border border-black">{{ $i->pertanyaan->komponen }}</td>
                            <td class="w-10 border border-black">{!! $i->pertanyaan->kondisi !!}</td>
                            <td class="border border-black">{{ $i->pertanyaan->regulasi }}</td>
                            <td class="border border-black">
                                @if ($i->jawaban == 'ya')
                                <input type="checkbox" checked class="w-4 h-4 custom-checkbox-2" disabled>
                                <input type="checkbox" class="w-4 h-4 ml-4 custom-checkbox" disabled>
                                @elseif ($i->jawaban == 'tidak')
                                <input type="checkbox" class="w-4 h-4 custom-checkbox-2" disabled>
                                <input type="checkbox" checked class="w-4 h-4 ml-4 custom-checkbox" disabled>
                                @else
                                <input type="checkbox" class="w-4 h-4 custom-checkbox-2" disabled>
                                <input type="checkbox" class="w-4 h-4 ml-4 custom-checkbox" disabled>
                                @endif
                            </td>
                            <td class="border border-black">{{ $i->keterangan }}</td>
                            <td class="border border-black">
                                <button data-modal-target="qr_modal{{ $i->pertanyaan->komponen }}" data-modal-toggle="qr_modal{{ $i->pertanyaan->komponen }}" class="w-[2rem]" type="button">
                                    <img src="{{ asset('picture.png') }}" class="w-[2rem] mx-auto" alt="">
                                </button>

                                <!-- Main modal -->
                                <div id="qr_modal{{ $i->pertanyaan->komponen }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-sm max-h-full p-4">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Foto {{ $i->pertanyaan->komponen }}
                                                </h3>
                                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="qr_modal{{ $i->pertanyaan->komponen }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="flex justify-center py-4">
                                                @if (is_null($i->images))
                                                <p>Tidak Ada Data Gambar</p>
                                                @else
                                                <img src="{{ asset( $i->images ) }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-[48rem] mb-5">
                <div class="flex text-right mb-5">
                    <div class="w-[30%] pr-4">Catatan Inspektor</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[63.8%]">
                        <p class="text-left pl-4">{{ $peralatan->catatan->catatan }}</p>
                    </div>
                </div>
                <div class="flex text-right mb-5">
                    <div class="w-[30%] pr-4">Status Inspeksi</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[63.8%] flex justify-evenly">
                        @if (is_null($peralatan->keterangan))
                        <div>
                            <input type="checkbox" class="w-4 h-4 custom-checkbox-2" disabled>
                            <label for="custom-checkbox-2">Layak</label>
                        </div>
                        <div>
                            <input type="checkbox" class="w-4 h-4 custom-checkbox" disabled>
                            <label for="custom-checkbox">Tidak Layak</label>
                        </div>
                        @elseif ($peralatan->keterangan == '0')
                        <div>
                            <input type="checkbox" checked class="w-4 h-4 custom-checkbox-2" disabled> Layak
                        </div>
                        <div>
                            <input type="checkbox" class="w-4 h-4 custom-checkbox" disabled> Tidak Layak
                        </div>
                        @else
                        <div>
                            <input type="checkbox" class="w-4 h-4 custom-checkbox-2" disabled> Layak
                        </div>
                        <div>
                            <input type="checkbox" checked class="w-4 h-4 custom-checkbox" disabled> Tidak Layak
                        </div>
                        @endif
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="w-[45%] text-center mr-20">
                        <div class="w-full h-[10rem]">
                            <p>Diperiksa Oleh</p>
                            @if (is_null($peralatan->safety_sign))
                            <img src="" class="mx-auto h-[9.2rem]" alt="">
                            @else
                            <img src="{{ asset('signatures/'.$peralatan->safety->sign) }}" class="mx-auto h-[8rem]" alt="tanda-tangan">
                            @endif
                            <p>______</p>
                            <p class="mt-[-6px]">HSE</p>
                            @if (!is_null($peralatan->safety_sign))
                            <p class="">({{ $peralatan->safety->name }})</p>
                            @endif
                        </div>
                    </div>
                    <div class="w-[45%] text-center">
                        <div class="w-full h-[10rem]">
                            <p>Diketahui Oleh</p>
                            @if (is_null($peralatan->mechanic_sign))
                            <img src="" class="mx-auto h-[9.2rem]" alt="">
                            @else
                            <img src="{{ asset('signatures/'.$peralatan->mekanik->sign) }}" class="mx-auto h-[8rem]" alt="tanda-tangan">
                            @endif
                            <p>___________</p>
                            <p class="mt-[-6px]">Mekanik</p>
                            @if (!is_null($peralatan->mechanic_sign))
                            <p class="">({{ $peralatan->mekanik->name }})</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-8">
                    @foreach ($peralatan->images as $p)
                    <div>
                        <img class="max-w-[20rem] max-h-[20rem] object-contain mt-4" src="{{ asset($p->pertanyaan->komponen) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('pdfDownload', $peralatan->slug) }}" method="POST">
        @csrf
        <div class="w-8 h-8 md:w-16 md:h-16 fixed right-[1rem] bottom-[1rem] rounded-full bg-slate-200 flex items-center justify-center">
            <button type="submit">
                <i class="fa fa-download"></i>
            </button>
        </div>

    </form>
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
