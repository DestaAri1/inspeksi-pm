<!DOCTYPE html>
<html>
<head>
    <title>Tanda Tangan Dokumen</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>
<body>
    <h1>Tanda Tangan Dokumen: {{ $peralatan->nama }}</h1>
    <form method="POST" action="{{ route('saveSign', $peralatan->slug) }}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="document_id" value="{{ $document->id }}"> --}}
        <div>
            <canvas id="signature-pad" style="border: 1px solid black;"></canvas>
        </div>
        <button type="button" id="clear">Bersihkan</button>
        <button type="submit">Kirim</button>
        <textarea id="signature64" name="signature" style="display: none;"></textarea>
    </form>

    <script>
        var canvas = document.getElementById('signature-pad');
        var signaturePad = new SignaturePad(canvas);

        document.querySelector('form').addEventListener('submit', function (e) {
            if (signaturePad.isEmpty()) {
                alert("Harap tanda tangan terlebih dahulu.");
                e.preventDefault();
            } else {
                var dataUrl = signaturePad.toDataURL();
                document.getElementById('signature64').value = dataUrl;
                console.log("Base64 Data URL: ", dataUrl); // Log Base64 data URL untuk debugging
            }
        });

        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
        });
    </script>
</body>
</html>
