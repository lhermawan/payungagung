@extends('template.main')
@section('title', 'Tambah Lapak Desa')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/lapakdesa">Lapak Desa</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="/admin/lapakdesa" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i> Back</a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="/admin/lapakdesa" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nama_produk">Nama Produk</label>
                                                <input type="text" name="nama_produk"
                                                    class="form-control @error('nama_produk') is-invalid @enderror"
                                                    id="nama_produk" placeholder="Nama Produk"
                                                    value="{{ old('nama_produk') }}" required>
                                                @error('nama_produk')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="number" name="harga"
                                                    class="form-control @error('harga') is-invalid @enderror" id="harga"
                                                    placeholder="Harga" value="{{ old('harga') }}" required>
                                                @error('harga')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="mitra">Mitra</label>
                                                <input type="text" name="mitra"
                                                    class="form-control @error('mitra') is-invalid @enderror" id="mitra"
                                                    placeholder="Mitra" value="{{ old('mitra') }}"
                                                    style="text-transform: uppercase" required>
                                                @error('mitra')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select name="kategori"
                                                    class="form-control @error('kategori') is-invalid @enderror"
                                                    id="kategori" required>
                                                    <option value="" disabled selected>Pilih Kategori</option>
                                                    <option value="Makanan"
                                                        {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>
                                                        Makanan</option>
                                                    <option value="Pakaian"
                                                        {{ old('kategori') == 'Pakaian' ? 'selected' : '' }}>Pakaian
                                                    </option>
                                                    <option value="Kerajinan"
                                                        {{ old('kategori') == 'Kerajinan' ? 'selected' : '' }}>Kerajinan
                                                    </option>
                                                    <option value="Hasil Bumi"
                                                        {{ old('kategori') == 'Hasil Bumi' ? 'selected' : '' }}>
                                                        Hasil Bumi</option>
                                                </select>
                                                @error('kategori')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                                    placeholder="Deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                                                @error('deskripsi')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="link_wa">Link Pembelian</label>
                                                <input type="url" name="link_wa"
                                                    class="form-control @error('link_wa') is-invalid @enderror"
                                                    id="link_wa" placeholder="Link Pembelian"
                                                    value="{{ old('link_wa') }}" required>
                                                @error('link_wa')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="link_maps">Link Maps</label>
                                                <input type="url" name="link_maps"
                                                    class="form-control @error('link_maps') is-invalid @enderror"
                                                    id="link_maps" placeholder="Link Maps" value="{{ old('link_maps') }}"
                                                    required>
                                                @error('link_maps')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar</label>
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror" id="image">
                                        @error('image')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-dark mr-1" type="reset"><i
                                            class="fa-solid fa-arrows-rotate"></i> Reset</button>
                                    <button class="btn btn-success" type="submit"><i
                                            class="fa-solid fa-floppy-disk"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
