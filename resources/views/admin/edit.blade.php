@extends('layouts.admin.app')

@section('content')
  <!-- /.navbar -->

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Input Data Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Edit Barang</h3>
              </div>
              
            </div>
            <form action="{{ route('databarang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{ $barang->nama_produk }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="foto_produk">Foto Barang</label><br>
                        <img src="{{ asset('storage/' . $barang->foto_produk) }}" width="100" class="mb-2">
                        <input type="file" name="foto_produk" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" value="{{ $barang->harga }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" class="form-control" name="qty" value="{{ $barang->qty }}" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="4" required>{{ $barang->deskripsi }}</textarea>
                    </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
    
  @endsection