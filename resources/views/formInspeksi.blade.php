@extends('layouts.main1')

@section('konten')
<div class="w-full h-[85%] px-[5%]">
    <form action="{{ route('simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-center pb-2 md:pb-4 font-bold">
            <div class="flex text-center text-xl md:text-3xl">
                <i></i>Form Inspeksi {{ $peralatan->nama }}
            </div>
        </div>
        <div class="mt-2 bg-white rounded-lg">
            <div class="flex flex-col pl-2 mt-3 text-base md:pl-10 md:flex-row md:text-lg">
                <div class="w-[50%]">
                    <div class="flex h-[2.86rem] items-center w-[22rem] md:w-full">
                        <div class="w-[40%]">Nomor Identitas Mesin</div>
                        <div class="w-[2%] md:w-[5%]">:</div>
                        <div class="w-[58%] md:w-[55%]">{{ $peralatan->identitas }}</div>
                    </div>
                    <div class="flex h-[2.74rem] items-center w-[22rem] md:w-full">
                        <div class="w-[40%]">Nomor Rangka</div>
                        <div class="w-[2%] md:w-[5%]">:</div>
                        <div class="w-[48%] md:w-[55%]">{{ $peralatan->rangka }} </div>
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="flex items-center w-[22rem] md:w-full">
                        <div class="w-[40%]">Periode Inspeksi</div>
                        <div class="w-[2%] md:w-[5%]">:</div>
                        <div class="w-[48%] md:w-[55%]">
                            @if ($peralatan->periode == null)
                            <input type="date" class="rounded-md w-full md:w-[15rem]" required name="periode">
                            @else
                            <input type="date" class="rounded-md w-full md:w-[15rem]" name="periode" value="{{ $peralatan->periode }}">
                            @endif
                        </div>
                    </div>
                    <div class="flex mt-1 items-center w-[22rem] md:w-full">
                        <div class="w-[40%]">Merk_Pembuat</div>
                        <div class="w-[2%] md:w-[5%]">:</div>
                        <div class="w-[48%] md:w-[55%]">
                            @if ($peralatan->merk == null)
                            <input type="text" name="merk" required class="h-10 w-full md:w-[15rem] rounded-md focus:border-neutral-700 focus:ring-0">
                            @else
                            <input type="text" name="merk" class="h-10 w-full md:w-[15rem] rounded-md focus:border-neutral-700 focus:ring-0" value="{{ $peralatan->merk }}">
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="id_peralatan" value="{{ $peralatan->id }}">
                </div>
            </div>
            <div class="">
                <img class="w-[40rem] mx-auto" src="
                @if ($peralatan->nama == 'Travo Las Listrik')
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
                @endif
                " alt="">
            </div>
        </div>
        <div class="mb-5 overflow-auto bg-white">
            <table class="w-full text-center border-collapse">
                <thead class="bg-blue-100 md:bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="w-4 px-2 bg-blue-100 border border-black">No.</th>
                        <th class="px-2 w-[10rem] bg-blue-100 border border-black">Komponen</th>
                        <th class="px-6 w-[15rem] bg-blue-100 border border-black">Kondisi Yang Diperiksa</th>
                        <th class="px-2 w-[25rem] bg-blue-100 border border-black">Regulasi</th>
                        <th class="px-2 w-[8rem] bg-blue-100 border border-black">Aman/Tidak</th>
                        <th class="px-6 bg-blue-100 border border-black">Keterangan</th>
                        <th class="px-6 bg-blue-100 border border-black">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($pertanyaan as $p => $i)
                    <tr>
                        <td class="border border-black">{{ $no++ }}</td>
                        <td class="border border-black">{{ $i->komponen }}</td>
                        <td class="w-10 border border-black"> <input type="hidden" name="pertanyaan_{{ $p }}" value="{!! $i->kondisi !!}"> {!! $i->kondisi !!} </td>
                        <td class="border border-black"><p>{{ $i->regulasi }}</p></td>
                        <td class="border border-black">
                            @if ($i->jawaban == 'ya')
                            <input required type="radio" checked name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <input required type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="w-4 h-4 ml-4 text-red-600 border-gray-300 focus:ring-red-700">
                            @endif
                            @if ($i->jawaban == 'tidak')
                            <input required type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <input required type="radio" checked name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="w-4 h-4 ml-4 text-red-600 border-gray-300 focus:ring-red-700">
                            @endif
                            @if ($i->jawaban == null)
                            <input required type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <input required type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="w-4 h-4 ml-4 text-red-600 border-gray-300 focus:ring-red-700">
                            @endif
                        </td>
                        <td class="border border-black">
                            @if ($i->keterangan !== null)
                            <input class="w-full border-transparent focus:border-transparent focus:ring-0" name="name[{{ $p }}]" id="name[{{ $p }}]" type="text" value="{{ $i->keterangan }}">
                            @else
                            <input class="w-full border-transparent focus:border-transparent focus:ring-0" placeholder="Tulis Keterangan" name="name[{{ $p }}]" id="name[{{ $p }}]" type="text">
                            @endif
                        </td>
                        <input type="hidden" value="{{ $i->id }}" name="id[{{ $p }}]" id="id[{{ $p }}]">
                        <td class="border border-black">
                            <input required class="block text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/*" id="images" name="images[{{ $p }}]" type="file">
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="h-4"></td>
                    </tr>
                    <tr class="">
                        <td colspan="2" class="text-right">Catatan</td>
                        <td>:</td>
                        <td colspan="4">
                            @if ($catatan->catatan == null)
                            <textarea name="catatan" cols="90" rows="3"></textarea>
                            @else
                            <textarea name="catatan" cols="90" rows="3">{{ $catatan->catatan }}</textarea>
                            @endif
                        </td>
                        <input type="hidden" name="id_catatan" value="{{ $catatan->id }}">
                    </tr>
                    <tr>
                        <td class="h-4"></td>
                    </tr>
                    {{-- <tr>
                        <td colspan="2" class="text-right">Upload Gambar</td>
                        <td>:</td>
                        <td colspan="4">
                            <div class="w-[50rem] mx-auto">
                                <input class="block w-[50rem] text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/*" id="images" name="images[]" type="file" multiple>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
        <button type="submit" class="w-full text-white bg-blue-500">Simpan</button>
    </form>
</div>
@endsection
