@extends('components.layouts')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-angle-right"></i> Form Edit Sertifikat </h4>
                    </div>
                    <form novalidate class="needs-validation" action="{{ route('sertifikat.doformEdit', $sertifikat->id_sertifikat)}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group text-center">
                                        <div class="crop-edit">
                                            @if (!empty($sertifikat->gambar))
                                                <img id="preview-photo" src="{{ url('assets/img/sertifikat/'.$sertifikat->gambar) }}" class="img-polaroid" width="184" height="186">
                                            @else
                                                <img id="preview-photo" src="{{ url('assets/img/default_logo.jpg') }}" class="img-polaroid" width="184" height="186">
                                            @endif
                                        </div>
                                        <div class='clearfix' style='padding-bottom:5px'></div>
                                        <label class="control-label font-weight-normal">Cover :</label>
                                        <div>
                                            <input type="file" class="upload form-control input-sm" onchange="loadFilePhoto(event)" name="gambar" accept="image/*" style='border: none; color:#4b99d5'>
                                            <div id="gambar_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian foto.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3 row">
                                        <label for="certificateNumber" class="col-sm-3 col-form-label font-weight-normal text-right">Nomor Sertifikat :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" value="{{ old('no_sertifikat', $sertifikat->no_sertifikat) }}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kategori" class="col-sm-3 col-form-label font-weight-normal text-sm-right">Kategori :</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategori as $kategori)
                                                    <option value="{{ $kategori->id_kategori }}" {{ $sertifikat->kategori_id == $kategori->id_kategori ? 'selected' : '' }}>
                                                        {{ $kategori->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div id="id_kategori_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian kategori.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="courseName" class="col-sm-3 col-form-label font-weight-normal text-sm-right">Nama Pelatihan :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pelatihan_name" name="pelatihan_name" value="{{ $sertifikat->pelatihan_name }}" required>
                                            <div id="pelatihan_name_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian nama pelatihan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="participantName" class="col-sm-3 col-form-label font-weight-normal text-sm-right">Nama Peserta :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="peserta_name" name="peserta_name" value="{{ $sertifikat->peserta_name }}" required>
                                            <div id="peserta_name_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian nama peserta.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="startDate" class="col-sm-3 col-form-label font-weight-normal text-sm-right">Tanggal Mulai :</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ \Carbon\Carbon::parse($sertifikat->tanggal_mulai)->format('Y-m-d') }}" required>
                                            <div id="tanggal_mulai_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian tanggal mulai.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="endDate" class="col-sm-3 col-form-label font-weight-normal text-sm-right">Tanggal Akhir :</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup" value="{{ \Carbon\Carbon::parse($sertifikat->tanggal_tutup)->format('Y-m-d') }}" required>
                                            <div id="tanggal_tutup_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian tanggal tutup.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="validUntil" class="col-sm-3 col-form-label font-weight-normal text-sm-right">Masa Berlaku :</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="masa_berlaku" name="masa_berlaku" value="{{ \Carbon\Carbon::parse($sertifikat->masa_berlaku)->format('Y-m-d') }}" required>
                                            <div id="masa_berlaku_feedback" class="invalid-feedback">
                                                Periksa ulang pengisian masa berlaku.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('tampil-sertifikat')}}" class="btn btn-warning" style="margin-right: 20px;">
                                    <i class="fas fa-undo" style="margin-right: 5px;"></i>Cancel
                                </a>
                                <button class="btn btn-primary" style="margin-right: 20px;" type="submit">
                                    <i class="far fa-file-alt" style="margin-right: 5px;"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
	function loadFilePhoto(event) {
		var image = URL.createObjectURL(event.target.files[0]);
		$('#preview-photo').fadeOut(function(){
			$(this).attr('src', image).fadeIn().css({
				'-webkit-animation' : 'showSlowlyElement 700ms',
				'animation'         : 'showSlowlyElement 700ms'
			});
		});
	};
</script>

@endsection
