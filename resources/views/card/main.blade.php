<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Card</title>
</head>
<body style="background-color: #010521">
    <img src="{{ asset('assets/img/footer3.png') }}" alt="Section Image" style="position: absolute; z-index: -1; left: 0; bottom: 10px; width: 150px;">
    <img src="{{ asset('assets/img/layer_left.png') }}" alt="Section Image" style="position: absolute; z-index: -1; left: 20px; top: 0; width: 150px">
    <img src="{{ asset('assets/img/section13.png') }}" alt="Section Image" style="position: absolute; z-index: -1; right: 40px; bottom: 25px;">
    <img src="{{ asset('assets/img/footer1.png') }}" alt="Section Image" style="position: absolute; z-index: -1; right: 395px; top: 50px; width: 120px;">
    <section class="flex-column">
        <div class="card card-one" style="width: 300px; margin-top: 20px; background-color: transparent;">
            <div class="card-body" style="background-color: transparent;">
                <img src="{{ asset('assets/img/Logo_Natusi.png')}}" alt="Placeholder Image" class="card-img" style="background-color: transparent;">
            </div>
        </div>
        <div class="card card-three" style="background-color: #008ED6; color: #fff;">
            <h2 style="font-weight: bold;">PESERTA</h2>
        </div>
    </section>
    <section class="container mt-4">
        <div class="d-flex">
            <!-- Card with image -->
            <div class="card card-two" style="width: 450px; height: 450px;">
                <img src="{!! url('assets/img/sertifikat/'.$sertifikat->gambar) !!}" class="card-image-two" alt="Admin Image">
            </div>
            <div class="card card-four" style="height: 450px; padding: 20px; z-index: 1;">
                <div class="card-body">
                    <div class="col-md-12" style="margin-bottom: 40px; border-bottom: 4px solid gray;">
                        <h2 class="certificate-heading">NOMOR SERTIFIKAT <span>: {{ $sertifikat->no_sertifikat}}</span></h2>
                        <h2 class="certificate-heading">NAMA PESERTA <span>: {{ $sertifikat->peserta_name}}</span></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="certificate">NAMA PELATIHAN</h3>
                            <span class="certificate-heading2">{{ $sertifikat->pelatihan_name }}</span>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h3 class="certificate">TANGGAL MULAI</h3>
                            <span class="certificate-heading2">{{ $sertifikat->tanggal_mulai}}</span>
                        </div>
                        <div class="col-md-6">
                            <h3 class="certificate">TANGGAL SELESAI</h3>
                            <span class="certificate-heading2">{{ $sertifikat->tanggal_tutup }}</span>
                        </div>
                        <div class="col-md-6">
                            <h3 class="certificate">MASA BERLAKU</h3>
                            <span class="certificate-heading2">{{ $sertifikat->masa_berlaku }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center" style="margin-top: 20px;">
                    <p>Sertifikat ini berlaku untuk jangka waktu yang disebutkan dan diberikan kepada peserta setelah berhasil menyelesaikan pelatihan.</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
