@extends('layouts.admin.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div>
            </div>       
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Produk</h3>
                            <a href="{{ url ('admin/databarang/create') }}" class="btn btn-sm btn-success float-right">Tambah Produk</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Foto Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>
                                          @if ($item->foto_produk)
                                          <img src="{{ asset('storage/' . $item->foto_produk) }}" width="70" height="70" class="rounded">
                                      
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->kategori->nama ?? '-' }}</td> 
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>             
                                        <a href="{{ url('admin/databarang/' . $item->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ url('admin/databarang/' . $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

 @endsection