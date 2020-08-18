@extends ('app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Master Kategori</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-kategori"><span class="fa fa-plus"></span> Tambah Siswa</button>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Keterangan (Optional)</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($kategori as $data)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$data->kategori}}</td>
                                <td>{{$data->ket}}</td>
                                <td>
                                    <a href="" type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=""><span class="fa fa-edit"></span></a>
                                    <a href="" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=""><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
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
    </section> <!-- /.content -->

</div> <!-- /.content-wrapper -->


<!-- Modal Tambah Transaksi-->
<div class="modal fade" id="tambah-kategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{url('/kategori')}}" method="post">
                {{ csrf_field()}}
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control" id="" name="kategori" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" id="" name="ket" placeholder="Masukan Keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection