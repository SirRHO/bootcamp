@extends('components.layouts')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-angle-right"></i> Form Edit Kategori </h4>
                        </div>
                        <form novalidate class="needs-validation" action="{{ route('kategori.doformEdit', $kategori->id_kategori)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <label for="categoryName" class="col-sm-2 col-form-label font-weight-normal text-right">Nama Kategori :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                                                <div id="nama_kategori_feedback" class="invalid-feedback">
                                                    Periksa ulang pengisian nama kategori.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('kategori') }}" class="btn btn-warning"
                                        style="margin-right: 20px;">
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
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
