<div class="modal fade" id="modal-modal-{{ $sertifikat->id_sertifikat }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4b99d5; color: #fff;">
                <h4 class="modal-title">Detail Sertifikat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <!-- Kolom Kiri: Teks -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h1 style="color: #4b99d5;">{{ $sertifikat->pelatihan_name }}</h1>
                    <h2 style="border-bottom: 5px solid #4b99d5;">{{ $sertifikat->peserta_name }}</h2>
                    <div class="form-group" style="border-bottom: 2px solid #aaa;">
                        <label style="color: gray;">NOMOR SERTIFIKAT</label>
                        <h6 style="margin-left: 5%;">{{ $sertifikat->no_sertifikat }}</h6>
                    </div>
                    <div class="form-group" style="border-bottom: 2px solid #aaa;">
                        <label style="color: gray;">KATEGORI</label>
                        <h6 style="margin-left: 5%;">
                        @php
                            $kategori = App\Models\Kategori::find($sertifikat->kategori_id);
                        @endphp
                        @if ($kategori)
                            {{ $kategori->nama_kategori }}
                        @else
                            Tidak ada kategori
                        @endif</h6>
                    </div>
                    <div class="form-group" style="border-bottom: 2px solid #aaa;">
                        <label style="color: gray;">TANGGAL MULAI PELATIHAN</label>
                        <h6 style="margin-left: 5%;">{{ $sertifikat->tanggal_mulai }}</h6>
                    </div>
                    <div class="form-group" style="border-bottom: 2px solid #aaa;">
                        <label style="color: gray;">TANGGAL SELESAI PELATIHAN</label>
                        <h6 style="margin-left: 5%;">{{ $sertifikat->tanggal_tutup }}</h6>
                    </div>
                    <div class="form-group">
                        <label style="color: gray;">MASA BERLAKU</label>
                        <h6 style="margin-left: 5%;">{{ $sertifikat->masa_berlaku }}</h6>
                    </div>
                </div>

                <!-- Kolom Kanan: Gambar -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="{!! url('assets/img/sertifikat/'.$sertifikat->gambar) !!}"class="img-fluid" alt="Sertifikat Image" style="width: 50%; margin: auto; display: block; margin-top: 30px;">
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
