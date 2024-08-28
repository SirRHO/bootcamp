<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/cetak.css') }}"> --}}
    <style>
        @page {
            size: A4 landscape;
            margin: 0mm;
        }

        .certificate-container {
            width: 297mm;
            height: 210mm;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 10mm;
            left: 15mm;
            width: 70mm;
            height: auto;
        }

        .certificate-header {
            text-align: center;
            margin-top: 30mm;
        }

        .certificate-content {
            text-align: center;
        }

        .certificate-footer {
            text-align: center;
            margin-top: 4%;
            margin-left: 35%;
            bottom: 10mm;
            right: 15mm;
        }

        .underline-text {
            border-bottom: 3px solid #aaa;
            display: inline-block;
            /* Membuat elemen bisa mendapatkan border bottom */
            padding-bottom: 5px;
            /* Jarak antara teks dan garis bawah */
        }

        .underline-text-two {
            border-bottom: 2px solid #aaa;
            display: inline-block;
            /* Membuat elemen bisa mendapatkan border bottom */
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div style="position: absolute; right: 0; top: 0; margin: 20px;">
            <!-- QR Code ditempatkan di pojok kanan atas -->
            @if (!empty($qr))
                {{-- <a href="#" id="container">{!! $qrCodes['simple'] !!}</a><br/> --}}
                {{-- {!! $qr !!} --}}
                <img src="data:image/png;base64, {!! $qr !!}">
                {{-- <button id="download" class="mt-2 btn btn-info text-light" onclick="downloadSVG()">DownloadSVG</button> --}}
            @else
                <p>QR code tidak tersedia.</p>
            @endif
        </div>
        <img src="{{ $imagePath1 }}" alt="middle"
            style="position: absolute; right: 15%; top: 0; width: 27%; z-index: -1;">
        <img src="{{ $imagePath2 }}" alt="middle"
            style="position: absolute; right: 45%; bottom: 0; width: 12%; z-index: -1;">
        <img src="{{ $imagePath3 }}" alt="right"
            style="position: absolute; right: 0; bottom: 0; width: 22%; z-index: -1;">
        <img src="{{ $imagePath4 }}" alt="left"
            style="position: absolute; left: 0; bottom: 0; width: 30%; z-index: -1;">
        <img src="{{ $imageLogo }}" alt="Logo Perusahaan" class="logo">
        <div class="certificate-header">
            <h1 style="font-size: 75px; color: #173A56;">SERTIFIKAT </h1>

            <h3 class="underline-text-two"
                style="font-size: 25px; margin-top: -60px; color: #173A56; font-weight: 200; font-family: 'Montserrat', sans-serif;">
                {{ $sertifikat->no_sertifikat }}</h3>

            <h4 class="description"
                style="font-size: 30px; margin-top: -40px; color: #173A56; font-weight: 200; font-family: 'Montserrat', sans-serif;">
                {{ $sertifikat->pelatihan_name }}</h4>

        </div>
        <div class="certificate-content">

            <p style="font-size: 18px; margin-top: -10px; color: #647780;">diberikan kepada:</p>
            <h2 class="underline-text "
                style="font-size: 48px; margin-top: -10px; color: #173A56; font-family: 'Brush Script MT', cursive, sans-serif; font-weight: 550;">
                {{ $sertifikat->peserta_name }}</h2>
            <p style="font-size: 15px; margin-top: 0px; color: #647780; font-family: 'Montserrat', sans-serif;">Telah
                melaksanakan MAGANG di CV. Natusi</p>
            <p style="font-size: 15px; margin-top: -15px; color: #647780;font-family: 'Montserrat', sans-serif;">Pada
                {{ $tanggalMulaiFormatted }} - {{ $tanggalTutupFormatted }}</p>
            <p style="font-size: 15px; margin-top: -15px; color: #647780; font-family: 'Montserrat', sans-serif;">dengan
                hasil : <span style="color: #414CA8; font-weight: bold;">BAIK</span></p>
            <p style="font-size: 15px; margin-top: -15px; color: #647780;">Demikian sertifikat ini diterbitkan untuk
                dapat digunakan sebagaimana mestinya.</p>
        </div>
        <div class="certificate-footer">
            <p style="font-size: 14px; color: #647780;">Mojokerto, {{ $tanggalSekarang }}</p>
            <p style="font-size: 14px; margin-top: -10px; color: #647780;">Direktur CV. Natusi</p>
            <br><br>
            <h5>ARIF RAKHMAN HADI, S.Kom</h5>
        </div>
    </div>
    <script>
        function downloadSVG() {
            const svg = document.getElementById('container').innerHTML;
            const blob = new Blob([svg.toString()]);
            const element = document.createElement("a");
            element.download = "qrcode.svg";
            element.href = window.URL.createObjectURL(blob);
            element.click();
            element.remove();
        }
    </script>
</body>

</html>
