@extends('layouts.user.app')

@section('content')
<div class="site-wrap">
  <div class="container py-5">
    <div class="row">
     @if($barang)
        <div class="col-md-6 mb-4">
         <img src="{{ asset('storage/' . $barang->foto_produk) }}" 
     alt="{{ $barang->nama_produk }}" 
     class="img-fluid rounded shadow" 
     style="max-height: 600px; width: auto; object-fit: contain;">

        </div>
        <div class="col-md-6 mb-4">
          <h2 class="mb-3">{{ $barang->nama_produk }}</h2>
          <strong class="h4 d-block mb-3 text-primary">Rp{{ number_format($barang->harga, 0, ',', '.') }}</strong>
          <p class="text-muted mb-2">Kategori: {{ $barang->kategori->nama ?? '-' }}</p>
           <p class="text-muted mb-2">Deskripsi: {{ $barang->deskripsi ?? '-' }}</p>
        <form action="{{ route('keranjang.tambah', $barang->id) }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" style="width: 100px;">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
</form>

        </div>
      @else
        <div class="col-12 text-center">
          <p class="text-muted">Produk tidak ditemukan.</p>
        </div>
      @endif
    </div>
  </div>
</div>

{{-- Featured Products (Boleh tetap seperti contoh) --}}
 <div class="site-section block-3 site-blocks-2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="{{ asset('fe/images/model_1.png')}}" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Smooth Cloth</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>
                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="{{ asset('fe/images/prod_3.png')}}" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Blue Shoe High Heels</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>

                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="{{ asset('fe/images/model_5.png')}}" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Denim Jacket</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>

                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="{{ asset('fe/images/prod_1.png')}}" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Leather Green Bag</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>
                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="{{ asset('fe/images/model_7.png')}}" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Yellow Jacket</a></h2>
                  <strong class="item-price">$58.00</strong>
                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection
