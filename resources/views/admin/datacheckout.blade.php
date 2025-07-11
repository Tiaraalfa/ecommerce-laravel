@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Data Checkout User</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>No Resi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($checkouts as $checkout)
            <tr>
                <td>{{ $checkout->user->name }}</td>
                <td>{{ $checkout->keranjang->barang->nama_produk ?? '-' }}</td>
                <td>{{ $checkout->keranjang->jumlah_produk }}</td>
                <td>{{ $checkout->tanggal }}</td>
                <td>{{ $checkout->status }}</td>
                <td>{{ $checkout->no_resi ?? '-' }}</td>
                <td>
                    @if($checkout->status === 'menunggu_verifikasi')
                    <form action="{{ route('verifikasi.checkout', $checkout->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm" onclick="return confirm('Yakin verifikasi?')">Verifikasi</button>
                    </form>
                    @else
                        ✔️ Sudah diverifikasi
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection