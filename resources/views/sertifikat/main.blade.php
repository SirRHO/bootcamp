@extends('components.layouts')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ route('sertifikat.formAdd') }}" type="button" class="btn btn-primary" style="padding: 8px 16px;">
                                    <i class="fa fa-plus" style="margin-right: 5px;"></i><span>Tambah Sertifikat</span>
                                </a>
                            </div>
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Sertifikat</th>
                                        <th>Kategori</th>
                                        <th>Nama Pelatihan</th>
                                        <th>Nama Peserta</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Masa Berlaku</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sertifikat as $sertifikat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sertifikat->no_sertifikat }}</td> <!-- Pastikan ini sesuai dengan nama kolom di database -->
                                        <td>{{ $sertifikat->kategori ? $sertifikat->kategori->nama_kategori : 'Kategori tidak tersedia' }}</td>
                                        <td>{{ $sertifikat->pelatihan_name }}</td>
                                        <td>{{ $sertifikat->peserta_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($sertifikat->tanggal_mulai)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($sertifikat->tanggal_tutup)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($sertifikat->masa_berlaku)->format('d-m-Y') }}</td>
                                        {{-- <td>{{ $sertifikat->tanggal_mulai }}</td>
                                        <td>{{ $sertifikat->tanggal_tutup }}</td>
                                        <td>{{ $sertifikat->masa_berlaku }}</td> --}}
                                        {{-- <td><img src="{{ asset('assets/img/sertifikat/'.$sertifikat->gambar) }}" alt=""></td> --}}
                                        <td align='center'>
                                            <div class="btn-group">
                                                <a href="#" class="dropdown" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a href="{{ route('sertifikat.certificate', ['id_sertifikat' => $sertifikat->id_sertifikat]) }}?export=pdf" class="dropdown-item">
                                                            <i class="fa fa-print"></i> Cetak
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button data-toggle="modal" data-target="#modal-modal-{{ $sertifikat->id_sertifikat }}" type="button" class="dropdown-item">
                                                            <i class="far fa-eye"></i> Detail
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('sertifikat.formEdit', $sertifikat->id_sertifikat) }}" class="dropdown-item">
                                                            <i class="fas fa-pencil-alt"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button data-toggle="modal" data-target="#modal-delete-{{ $sertifikat->id_sertifikat }}" type="button" class="dropdown-item">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete-{{ $sertifikat->id_sertifikat }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus item ini?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('sertifikat.delete', $sertifikat->id_sertifikat) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('sertifikat.modal', ['sertifikat' => $sertifikat])
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable(

            {

        "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5
        }
            );
    } );
    </script>
@endsection
