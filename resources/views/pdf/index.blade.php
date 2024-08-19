<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dokumen</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    /* Gaya CSS 2.1 */
    body{
        font-size: 12px;
        font-family:'Times New Roman', Times, serif;
    }

    table {
      border-collapse: collapse; /* Menggabungkan border sel */
      width: 100%; /* Lebar tabel 100% */
    }

    tr, td {
      border: 1px solid #ccc; /* Border untuk setiap sel */
      padding: 2px; /* Padding untuk setiap sel */
      text-align: center; /* Teks di tengah sel */
      border-color: black
    }

    .table-width {
        width: 312px;
        text-align: left;
        font-size: 16px !important;
    }

    .text-head {
        text-align: center;
    }

    .text-sub-title{
        text-align: left;
    }
    .center{
        display: inline-block;
        float: left;
        width: 50%;
        object-position: center /* Adjust width as needed */
    }
    .text{
        display: inline-block;
        width: 40%;
        text-align: left;
        padding-left: 10px
    }
    .titik{
        display: inline-block;
        width: 2%;
    }
    .isian{
        display: inline-block;
        text-align: left;
        width: 50%;
    }

    .centered-div{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 804px;
    }

    .image-container {
      width: 480px; /* Adjust width as needed */
      position:relative /* Set relative positioning for the container */
    }

    .centered-image {
      position: fixed; /* Set absolute positioning for the image */
      top: 35%; /* Center the image vertically */
      left: 42%; /* Center the image horizontally */
      transform: translate(-50%, -50%); /* Offset the image to compensate for positioning */
      max-width: 100%; /* Prevent the image from overflowing the container */
      height: auto; /* Maintain aspect ratio */
    }

    .thead-border {
        background-color: #F0F0F0; /* Light gray background */
        border: 1px solid #808080; /* Gray border */
        text-align: center; /* Set text alignment */
    }

    .image-container-2 img {
        display: block;
        margin: 0 auto;
    }

    .container {
        width: 100%;
        display: table;
        margin-top: 15px;
    }

    .content {
        display: table-cell;
        text-align: center;
        /* vertical-align: middle; */
    }
  </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td style="width: 152px" rowspan="4"><img  src="data:image/png;base64,{{ base64_encode(file_get_contents('logo/kso_logo.png')) }}" width="152" alt=''></td>
                <td colspan="2" class="table-width text-head">Form Inspeksi {{ $peralatan->nama }}</td>
                <td style="width: 152px" rowspan="4"><img src="data:image/png;base64,{{ base64_encode(file_get_contents('logo/logo-k3.png')) }}" width="152" alt=""></td>
            </tr>
            <tr>
                <td style="width: 150px" class="text-sub-title">Perusahaan</td>
                <td style="width: 150px" class="text-sub-title">KSO PD-SWA</td>
            </tr>
            <tr>
                <td style="width: 150px" class="text-sub-title">Proyek Pembangunan</td>
                <td style="width: 150px" class="text-sub-title">RS. Kaliwaron</td>
            </tr>
            <tr>
                <td style="width: 150px" class="text-sub-title">No. Dokumen</td>
                <td style="width: 150px" class="text-sub-title">FM.OHS.005.01 Inspeksi K3 Peralatan</td>
            </tr>
        </thead>
    </table>
    <div style="text-align: center; margin-top: 15px">
        <div class="center" style="display: inline-block;">
            <div style="align-items: right">
                <div class="text">Nomor Identitas Mesin</div>
                <div class="titik">:</div>
                <div class="isian">{{ $peralatan->identitas }}</div>
            </div>
            <div style="margin-top: 7px">
                <div class="text">Serial Nomor Mesin</div>
                <div class="titik">:</div>
                <div class="isian">{{ $peralatan->rangka }}</div>
            </div>
        </div>
        <div class="center" style="display: inline-block;">
            <div style="align-items: right">
                <div class="text">Periode Inspeksi</div>
                <div class="titik">:</div>
                <div class="isian">{{ $formattedDate }}</div>
            </div>
            <div style="margin-top: 7px">
                <div class="text">Merk_Pembuat</div>
                <div class="titik">:</div>
                <div class="isian">{{ $peralatan->merk }}</div>
            </div>
        </div>
    </div>
    <div class="image-container" style="margin-top: -10px">
        <img class="centered-image" style="max-width: 480px !important;  max-height: 270px !important" src="data:image/png;base64,
        @if ($peralatan->nama == 'Travo Las Listrik')
        {{ base64_encode(file_get_contents('mesin_las.png')) }}
        @endif
        @if ($peralatan->nama == "Mesin Bar Bender")
        {{ base64_encode(file_get_contents('bar_bender.png')) }}
        @endif
        @if ($peralatan->nama == "Mesin Bar Cutter")
        {{ base64_encode(file_get_contents('bar_cutter.png')) }}
        @endif
        @if ($peralatan->nama == "Gerinda Tangan Listrik")
        {{ base64_encode(file_get_contents('mesin_gerinda.png')) }}
        @endif
        @if ($peralatan->nama == "Gergaji Mesin Lingkaran")
        {{ base64_encode(file_get_contents('gergaji_lingkaran.png')) }}
        @endif
        @if ($peralatan->nama == "Mesin JackHammer")
        {{ base64_encode(file_get_contents('Jackhammer.png')) }}
        @endif
        @if ($peralatan->nama == "Mesin Bor Listrik")
        {{ base64_encode(file_get_contents('mesin_bor.png')) }}
        @endif
        " alt="">
    </div>
    <table style="margin-top: 350px">
        <thead>
            <tr>
                <td style="padding: 0 2 0 2; width: 30px" class="thead-border">No.</td>
                <td style="padding: 0 2 0 2; width: 75px" class="thead-border">Komponen</td>
                <td style="padding: 0 6 0 6; width: 100px" class="thead-border">Kondisi Yang Diperiksa</td>
                <td style="padding: 0 2 0 2; width: 175px;" class="thead-border">Regulasi</td>
                <td style="padding: 0 2 0 2; width: 75px" class="thead-border">Aman/Tidak</td>
                <td style="padding: 0 6 0 6" class="thead-border">Keterangan</td>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1
            @endphp
            @foreach ($pertanyaan as $p => $i)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $i->komponen }}</td>
                    <td style="width: 40px"><input type="hidden" name="pertanyaan_{{ $p }}" value="{!! $i->kondisi !!}"> {!! $i->kondisi !!} </td>
                    <td><p>{{ $i->regulasi }}</p></td>
                    <td>
                        @if ($i->jawaban == 'ya')
                        <input type="checkbox" checked name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="w-4 h-4 custom-checkbox-2">
                        <input disabled type="checkbox" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="w-4 h-4  custom-checkbox">
                        @endif
                        @if ($i->jawaban == 'tidak')
                        <input disabled type="checkbox" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="w-4 h-4 custom-checkbox-2">
                        <input type="checkbox" checked name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="w-4 h-4  custom-checkbox">
                        @endif
                        @if ($i->jawaban == null)
                        <input disabled type="checkbox" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="ya" class="w-4 h-4 custom-checkbox-2">
                        <input disabled type="checkbox" name="opsi[{{ $p }}]" id="opsi[{{ $p }}]" value="tidak" class="w-4 h-4  custom-checkbox">
                        @endif
                    </td>
                    <td>{{ $i->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <div style="align-items: right; margin-top: 10px">
            <div class="text" style="width: 20% !important">Catatan Inspeksi</div>
            <div class="titik">:</div>
            <div class="isian" style="max-height: 100px; width: 70%">{{ $catatan->catatan }}</div>
        </div>
        <div style="align-items: right; margin-top: 10px;">
            <div class="text" style="width: 20% !important">Status Inspeksi</div>
            <div class="titik">:</div>
            <div class="isian" style="width: 70%; vertical-align: middle">
                @if ($peralatan->keterangan == null)
                <div class="center" style="margin-top: -10px">
                    <div style="display: inline-block; vertical-align: middle;">
                        <input type="checkbox" class="custom-checkbox-2" style="vertical-align: middle" disabled>
                    </div>
                    <div style="display: inline-block; vertical-align: middle;">Layak</div>
                </div>
                <div class="center" style="margin-top: -10px">
                    <input type="checkbox" class="custom-checkbox" style="ertical-align: middle" disabled>
                    <p style="display: inline-block; vertical-align: middle; margin: 0;">Tidak Layak</p>
                </div>
                @endif
                @if ($peralatan->keterangan == '0')
                    <div class="center" style="margin-top: -10px;">
                        <div style="display: inline-block; vertical-align: middle;">
                            <input style="margin-left: 75px" type="checkbox" class="custom-checkbox-2" style="vertical-align: middle;" checked disabled>
                        </div>
                        <div style="display: inline-block; vertical-align: middle;">Layak</div>
                    </div>
                    <div class="center" style="margin-top: -10px">
                        <input type="checkbox" class="custom-checkbox" style="vertical-align: middle;" disabled>
                        <p style="display: inline-block; vertical-align: middle; margin: 0;">Tidak Layak</p>
                    </div>
                @endif
                @if ($peralatan->keterangan == '1')
                    <div class="center" style="margin-top: -10px">
                        <div style="display: inline-block; vertical-align: middle;">
                            <input type="checkbox" class="custom-checkbox-2" style="display: inline-block; vertical-align: middle" disabled>
                        </div>
                        <div style="display: inline-block; vertical-align: middle;">Layak</div>
                    </div>
                    <div class="center" style="margin-top: -10px">
                        <input type="checkbox" class="custom-checkbox" style="display: inline-block; vertical-align: middle" checked disabled>
                        <p style="display: inline-block; vertical-align: middle; margin: 0;">Tidak Layak</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div style="text-align: center; margin-top: 10px; height: 120px;">
        <div class="center">
            <div>
                Diperiksa Oleh
            </div>
            <div>
                @if ($peralatan->safety_sign == null)
                    <div style="width: 150px; height: 100px"></div>
                @else
                    <img style="width: 200px; max-height: 100px" src="data:image/png;base64,{{ base64_encode(file_get_contents('signatures/'.$safety->sign)) }}" alt="gambar">
                @endif
            </div>
            <div>
                HSE
            </div>
            @if ($peralatan->safety_sign !== null)
            <div>
                ({{ $safety->name }})
            </div>
            @endif
        </div>
        <div class="center">
            <div>
                Diketahui Oleh
            </div>
            <div>
                @if ($peralatan->mechanic_sign == null)
                    <div style="width: 150px; height: 100px"></div>
                @else
                    <img style="width: 200px; max-height: 100px" src="data:image/png;base64,{{ base64_encode(file_get_contents('signatures/'.$mekanik->sign)) }}" alt="gambar">
                @endif
            </div>
            <div>
                Mekanik
            </div>
            @if ($peralatan->mechanic_sign !== null)
            <div>
                ({{ $mekanik->name }})
            </div>
            @endif
        </div>
    </div>
    <div style="margin_top:40px"></div>
    @foreach ($image as $i)
    <div class="container">
        <div class="content">
            <img style="max-width: 320px; max-height: 320px;" src="data:image/png;base64,{{ base64_encode(file_get_contents($i->image)) }}" alt="gambar">
        </div>
    </div>
    @endforeach
    @foreach ($pertanyaan as $i)
    <div class="container">
        <div class="content">
            <img style="max-width: 320px; max-height: 320px;" src="data:image/png;base64,{{ base64_encode(file_get_contents($i->images)) }}" alt="gambar">
        </div>
    </div>
    @endforeach
</body>
</html>
