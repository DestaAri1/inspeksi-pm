<div class="mt-2 w-full overflow-auto">
    <table class="bg-white border-collapse rounded-md shadow-lg">
        <thead>
            <tr>
                <th class="px-4 bg-blue-100 border border-black w-4">No.</th>
                <th class="px-2 bg-blue-100 border border-black w-[10rem]">Komponen</th>
                <th class="px-6 bg-blue-100 border border-black w-[15rem]">Kondisi Yang Diperiksa</th>
                <th class="px-2 bg-blue-100 border border-black w-[25rem]">Regulasi</th>
                <th class="px-2 bg-blue-100 border border-black w-[8rem]">Aman / Tidak</th>
                <th class="px-6 bg-blue-100 border border-black">Keterangan</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
                $no=1;
            @endphp
            <form action="{{ route('simpan') }}" method="POST">
                @csrf
                @foreach ($pertanyaan as $p => $i)
                <tr>
                    <td class="border border-black">{{ $no++ }}</td>
                    <td class="border border-black">{{ $i->komponen }}</td>
                    <td class="border border-black w-10"> <input type="hidden" name="pertanyaan_{{ $p }}" value="{!! $i->kondisi !!}"> {!! $i->kondisi !!} </td>
                    <td class="border border-black"><p>{{ $i->regulasi }}</p></td>
                    <td class="border border-black">
                        @if ($i->jawaban == 'ya')
                        <input type="radio" checked name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <input type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="focus:ring-red-700 ml-4 h-4 w-4 text-red-600 border-gray-300">
                        @endif
                        @if ($i->jawaban == 'tidak')
                        <input type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <input type="radio" checked name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="focus:ring-red-700 ml-4 h-4 w-4 text-red-600 border-gray-300">
                        @endif
                        @if ($i->jawaban == null)
                        <input type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <input type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="focus:ring-red-700 ml-4 h-4 w-4 text-red-600 border-gray-300">
                        @endif
                        {{-- <input type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <input type="radio" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="focus:ring-red-700 ml-4 h-4 w-4 text-red-600 border-gray-300"> --}}
                    </td>
                    <td class="border border-black">
                    </td>
                    <input type="hidden" value="{{ $i->id }}" name="id[{{ $p }}]" id="id[{{ $p }}]">
                </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <button type="submit" class="bg-blue-500 w-full rounded-md">Submit</button>
                </td>
            </tr>
            </form>

            <tr>
                <td class="h-4"></td>
            </tr>
            <tr class="">
                <td colspan="2" class="text-right">Catatan</td>
                <td>:</td>
                <td colspan="4"><textarea name="" id="" cols="90" rows="3"></textarea></td>
            </tr>
        </tbody>
    </table>
</div>
