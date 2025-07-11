@extends('layouts.user.app')

@section('content')
<div class="site-section">
  <div class="container">
    {{-- FORM UTAMA UNTUK CHECKOUT --}}
    <form action="{{ route('user.checkout') }}" method="POST">
      @csrf
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Select</th>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                @foreach($keranjang as $item)
                  @php
                    $subtotal = $item->barang->harga * $item->jumlah_produk;
                  @endphp
                  <tr data-id="{{ $item->id }}">
                    <td class="text-center">
                      <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="item-checkbox" data-subtotal="{{ $subtotal }}">
                    </td>
                    <td class="product-thumbnail">
                      <img src="{{ asset('storage/' . $item->barang->foto_produk) }}" class="img-fluid" style="max-width: 80px;">
                    </td>
                    <td>{{ $item->barang->nama_produk }}</td>
                    <td>Rp{{ number_format($item->barang->harga, 0, ',', '.') }}</td>
                    <td>
                      <div class="input-group quantity-wrapper" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary btn-sm btn-decrease" type="button">-</button>
                        </div>
                        <input type="number" name="quantities[{{ $item->id }}]" class="form-control form-control-sm text-center item-qty" value="{{ $item->jumlah_produk }}" min="1" data-harga="{{ $item->barang->harga }}">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-sm btn-increase" type="button">+</button>
                        </div>
                      </div>
                    </td>
                    <td class="item-total" data-id="{{ $item->id }}">
                      Rp{{ number_format($subtotal, 0, ',', '.') }}
                    </td>
                    {{-- <td>
                      <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                    </td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row justify-content-end mb-4">
        <div class="col-md-6 text-right">
          <h5>Total Dipilih: <span id="selected-total">Rp0</span></h5>
          <button type="submit" class="btn btn-primary btn-lg">Proceed To Checkout</button>
        </div>
      </div>
    </form>

    {{-- Bagian tambahan (coupon dan total) --}}
    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
          </div>
          <div class="col-md-6">
            <a href="{{ route('shop') }}" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label class="text-black h4" for="coupon">Coupon</label>
            <p>Enter your coupon code if you have one.</p>
          </div>
          <div class="col-md-8 mb-3 mb-md-0">
            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
          </div>
        </div>
      </div>

      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Subtotal (Dipilih)</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black" id="cart-subtotal">Rp0</strong>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black" id="cart-total">Rp0</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- SCRIPT UNTUK UPDATE TOTAL & JUMLAH --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const qtyInputs = document.querySelectorAll('.item-qty');
    const totalText = document.getElementById('selected-total');
    const cartSubtotal = document.getElementById('cart-subtotal');
    const cartTotal = document.getElementById('cart-total');

    function formatRupiah(angka) {
      return 'Rp' + angka.toLocaleString('id-ID');
    }

    function updateItemTotal(input) {
      const harga = parseInt(input.dataset.harga);
      const qty = parseInt(input.value);
      const tr = input.closest('tr');
      const itemId = tr.dataset.id;
      const totalCell = tr.querySelector('.item-total');
      const newSubtotal = harga * qty;
      totalCell.textContent = formatRupiah(newSubtotal);

      const checkbox = tr.querySelector('.item-checkbox');
      checkbox.dataset.subtotal = newSubtotal;

      updateTotal();
    }

    function updateTotal() {
      let total = 0;
      checkboxes.forEach(cb => {
        if (cb.checked) {
          total += parseInt(cb.dataset.subtotal);
        }
      });
      totalText.textContent = formatRupiah(total);
      cartSubtotal.textContent = formatRupiah(total);
      cartTotal.textContent = formatRupiah(total);
    }

    document.querySelectorAll('.btn-increase').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.closest('.quantity-wrapper').querySelector('.item-qty');
        input.value = parseInt(input.value) + 1;
        updateItemTotal(input);
      });
    });

    document.querySelectorAll('.btn-decrease').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.closest('.quantity-wrapper').querySelector('.item-qty');
        if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 1;
          updateItemTotal(input);
        }
      });
    });

    qtyInputs.forEach(input => {
      input.addEventListener('change', () => {
        if (parseInt(input.value) < 1) input.value = 1;
        updateItemTotal(input);
      });
    });

    checkboxes.forEach(cb => {
      cb.addEventListener('change', updateTotal);
    });

    updateTotal();
  });
</script>
@endsection
