@extends('pengguna.templates.default')
@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Keranjang</h6>
                    <a href="{{ route('kehilangan-sim.create') }}" class="btn btn-sm btn-primary">Buat laporan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Layanan</th>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#myModal" data-id="{{ $item->user_id }}">
                                        {{ $item->user->name }}
                                    </a>
                                </td>
                                <td>{{ $item->jenis_layanan }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>Rp. {{ number_format($item->biaya) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="user_id" class="user_id">
                    <div class="form-group">
                        <label for="pembayaran">Pembayaran</label>
                        <select name="pembayaran" id="pembayaran" class="form-control">
                            @foreach ($data_pembayaran as $pembayaran)
                            <option value="{{ $pembayaran->nama }}">{{ $pembayaran->nama . ' - ' . $pembayaran->nomor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="font-weight-bold text-right">Rp. <span class="biaya"></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('afterStyle')
<!-- Custom styles for this page -->
<link href="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('afterScripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
{{-- script ajak keranjang berdasarkan user id --}}
<script>
    $('#myModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id');
        $.ajax({
            type: "GET",
            url: '{{ url('
            keranjang ') }}' + '/' + id + '/getUser',
            data: {
                id: id
            },
            success: function(data) {
                $('.user_id').val(data.user_id);
                $('.biaya').html(data.count);
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush