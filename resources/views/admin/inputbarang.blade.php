@extends('layouts.admin.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
              </div>
  
              <!-- Tampilkan error validasi -->
              @if ($errors->any())
                <div class="alert alert-danger mt-2">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
  
              <!-- Form input barang -->
              <form action="{{ url('admin/databarang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan nama produk" value="{{ old('nama_produk') }}" required>
                  </div>
  
                  <div class="form-group">
                    <label for="foto_produk">Foto Barang</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto_produk" required>
                        <label class="custom-file-label">Pilih gambar</label>
                      </div>
                    </div>
                  </div>
  
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Masukkan harga" value="{{ old('harga') }}" required>
                  </div>
  
                  <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" name="qty" placeholder="Masukkan jumlah QTY" value="{{ old('qty') }}" required>
                  </div>

                 <div class="form-group">
  <label for="kategori">Kategori</label>
  <select name="idkategori" class="form-control" required>
      <option value="">-- Pilih Kategori --</option>
      @foreach ($kategori as $kat)
          <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
      @endforeach
  </select>
</div>

  </select>
</div>

                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                  </div>
                </div>
  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan Produk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
    
  <!-- /.content-wrapper -->
  @endsection