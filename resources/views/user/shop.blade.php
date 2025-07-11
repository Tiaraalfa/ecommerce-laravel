@extends('layouts.user.app')

@section('content')

  {{-- Hero Section --}}
  <div class="site-blocks-cover inner-page" data-aos="fade">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto order-md-2 align-self-start">
          <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2024</h2>
            <h1>Arrivals Sales</h1>
            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
          </div>
        </div>
        <div class="col-md-6 order-1 align-self-end">
          <img src="{{ asset('fe/images/model_4.png') }}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  {{-- Breadcrumb --}}
  <div class="custom-border-bottom py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="{{ url('/') }}">Home</a> 
          <span class="mx-2 mb-0">/</span> 
          <strong class="text-black">Shop</strong>
        </div>
      </div>
    </div>
  </div>

  {{-- Shop Content --}}
<div class="container py-5">
  <div class="row">
    {{-- Sidebar --}}
    <div class="col-md-3 order-2 mb-5 mb-md-0">
      <div class="border p-4 rounded mb-4">
        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
        <ul>
          @foreach ($kategori as $item)
          <li><a href="{{ url('user/shop/kategori/' . $item->id) }}">{{ $item->nama }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="border p-4 rounded mb-4">
        <div class="mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
          <div id="slider-range" class="border-primary"></div>
          <input type="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled />
        </div>

        <div class="mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
          <label for="s_sm" class="d-flex">
            <input type="checkbox" id="s_sm" class="mr-2 mt-1"> 
            <span class="text-black">Small (2,319)</span>
          </label>
          <label for="s_md" class="d-flex">
            <input type="checkbox" id="s_md" class="mr-2 mt-1"> 
            <span class="text-black">Medium (1,282)</span>
          </label>
          <label for="s_lg" class="d-flex">
            <input type="checkbox" id="s_lg" class="mr-2 mt-1"> 
            <span class="text-black">Large (1,392)</span>
          </label>
        </div>

        <div class="mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
          <a href="#" class="d-flex color-item align-items-center">
            <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> 
            <span class="text-black">Red (2,429)</span>
          </a>
          <a href="#" class="d-flex color-item align-items-center">
            <span class="bg-success color d-inline-block rounded-circle mr-2"></span> 
            <span class="text-black">Green (2,298)</span>
          </a>
          <a href="#" class="d-flex color-item align-items-center">
            <span class="bg-info color d-inline-block rounded-circle mr-2"></span> 
            <span class="text-black">Blue (1,075)</span>
          </a>
          <a href="#" class="d-flex color-item align-items-center">
            <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> 
            <span class="text-black">Purple (1,075)</span>
          </a>
        </div>
      </div>
    </div>

    {{-- Produk --}}
    <div class="col-md-9 order-1">
      <div class="row">
        @foreach($barang as $item)
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="{{ route('shop.detail', $item->id) }}" class="product-item md-height bg-gray d-block">
              <img src="{{ asset('storage/' . $item->foto_produk) }}" alt="{{ $item->nama_produk }}" class="img-fluid" style="max-height: 300px; object-fit: contain;">
            </a>
            <h2 class="item-title">
              <a href="{{ route('shop.detail', $item->id) }}">{{ $item->nama }}</a>
            </h2>
            <strong class="item-price">
              Rp{{ number_format($item->harga, 0, ',', '.') }}
            </strong>
            <p class="text-muted">
              {{ $item->kategori->nama ?? '-' }}
            </p>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>


@endsection
