@extends('layout.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group-sm">
                          <a href="{{ route('user.excel.export') }}" class="btn btn-success"><i class="fas fa-file-excel"></i>Unduh Excel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="product_tb" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>produk</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($orders as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>{{ number_format($data->price) }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <div class="row">
                                            <button type="button" class="btn btn-info btn-sm mr-1 mt-1" title="Detail" data-toggle="modal" data-target="#modal-detail{{ $data->id }}"><i class="fas fa-info-circle"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                
                                {{-- Modal Detail --}}
                                <div class="modal fade" id="modal-detail{{ $data->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="product">Produk</label>
                                                            <input class="form-control" type="text" name="product" value="{{ $data->product_name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="price">Harga</label>
                                                            <input name="price" class="form-control" type="text" value="{!! number_format($data->price) !!}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <input class="form-control" type="text" name="status" value="{{ $data->status }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="payment_photo">Bukti Pembayaran</label>
                                                            <div class="container">
                                                                @if ($data->payment_photo)
                                                                <img src="{{ asset('storage/' . $data->payment_photo) }}" alt="Image with Border" style="border: 2px solid #ccc;" width="150">
                                                                @else
                                                                <span>-</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Keluar</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->                                                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

@push('script')
<script>
    CKEDITOR.replace('my-editor');
    CKEDITOR.replaceAll('product_edit');
</script>

<script>
    $(function () {
        $("#product_tb").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        })
        .buttons()
        .container()
        .appendTo('#product_tb_wrapper .col-md-6:eq(0)');
        
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>

@endpush
