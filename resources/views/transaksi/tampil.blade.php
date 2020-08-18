@extends ('app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Transaksi</li>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-transaksi"><span class="fa fa-plus"></span> Tambah Transaksi</button>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody id="transaksi-list" name="transaksi-list">
                            @foreach($transaksi as $trans)
                            <tr>
                                <td>{{$trans->nama}}</td>
                                <td>{{$trans->kelas}}</td>
                                <td>{{$trans->tanggal}}</td>
                                <td>{{$trans->kategori}}</td>
                                <td>{{$trans->nominal}}</td>
                                <td>
                                    <a href="" type="button" class="btn btn-warning btn-sm open_modal" value="{{$trans->id}}"><span class="fa fa-edit"></span></a>
                                    <a href="" type="button" class="btn btn-sm btn-danger delete_transaksi" value="{{$trans->id}}"><span class="fa fa-trash"></span></a>
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

<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">

<!-- MODAL SECTION -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="frmTransaksi" name="frmTransaksi">
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukan Nominal">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Tanggal">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button>
                <input type="hidden" id="transaksi_id" name="transaksi_id" value="0">
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<!-- Modal Edit Transaksi-->
<div class="modal fade" id="edit-transaksi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" id="n" name="" value="" placeholder="Masukan Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" class="form-control" id="ke" name="" value="" placeholder="Masukan Kelas">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" id="ka" name="" value="" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" class="form-control" id="n" name="" value="" placeholder="Masukan Nominal">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" id="t" name="" value="" placeholder="Masukan Tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection