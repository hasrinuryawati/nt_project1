@extends('layout.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product_tb" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($product as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ number_format($data->price) }}</td>
                                    <td>{{ number_format($data->stock) }}</td>
                                    <td>
                                        <div class="row">
                                            <button type="button" class="btn btn-info btn-sm mr-1 mt-1" title="Detail" data-toggle="modal" data-target="#modal-detail{{ $data->id }}"><i class="fas fa-info-circle"></i></button>
                                            <form action="{{ route('user.order.create', $data->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm mt-1" title="Order" onclick="return confirm('Order?')"><i class="fas fa-plus"></i>Order</button>
                                            </form>
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
                                                            <label for="name">Nama</label>
                                                            <input class="form-control" type="text" name="name" value="{{ $data->name }}" disabled>
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
                                                            <label for="stock">Stok</label>
                                                            <input name="stock" class="form-control" type="text" value="{!! number_format($data->stock) !!}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="description">Deskripsi</label>
                                                            <div class="card bg-light d-flex flex-fill">
                                                                <div class="card-body pt-0">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <p @disabled(true)>{!! $data->description !!}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
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

{{-- number format add price --}}
<script>
    $(document).ready(function() {
        // Function to add thousand separators to a number
        function addThousandSeparators(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        // Function to remove non-numeric characters from a string
        function extractNumbers(input) {
            return input.replace(/\D/g, "");
        }
        
        // Event handler for the input field
        $('.numberInput').on('input', function() {
            // Get the raw input value and extract numbers from it
            let rawInput = $(this).val();
            let numericInput = extractNumbers(rawInput);
            
            // Format the number with thousand separators
            let formattedNumber = addThousandSeparators(numericInput);
            
            // Update the input field with the formatted number
            $(this).val(formattedNumber);
        });
    });
</script>

@endpush
