@extends('template.main')
@section('title', 'Edit Disabilitas')
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
                            <li class="breadcrumb-item"><a href="/mdisabilitas">Disabilitas</a></li>
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
                                    <a href="/mdisabilitas" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate
                                action="/mdisabilitas/{{ $disabilitas->id_disabilitas }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input readonly type="text" name="nik"
                                                    class="form-control @error('nik') is-invalid @enderror" id="nik"
                                                    placeholder="Nomor Induk Kependudukan"
                                                    value="{{ old('nik', $disabilitas->nik) }}" required>
                                                @error('nik')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input disabled type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    value="{{ old('nama', $disabilitas->penduduk_nama) }}" required>
                                                @error('nama')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select name="kategori" id="kategori"
                                                    class="form-control @error('kategori') is-invalid @enderror" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="Fisik"
                                                        {{ old('kategori', $disabilitas->kategori) == 'Fisik' ? 'selected' : '' }}>
                                                        Fisik</option>
                                                    <option value="Ganda"
                                                        {{ old('kategori', $disabilitas->kategori) == 'Ganda' ? 'selected' : '' }}>
                                                        Ganda</option>
                                                    <option value="Mental"
                                                        {{ old('kategori', $disabilitas->kategori) == 'Mental' ? 'selected' : '' }}>
                                                        Mental</option>
                                                    <option value="Sensorik"
                                                        {{ old('kategori', $disabilitas->kategori) == 'Sensorik' ? 'selected' : '' }}>
                                                        Sensorik</option>
                                                </select>
                                                @error('kategori')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        @if (auth()->user()->level == 'Admin')
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="dusun">Dusun</label>
                                                    <select name="dusun" id="dusun"
                                                        class="form-control @error('dusun') is-invalid @enderror" required>
                                                        <option value="">Pilih Dusun</option>
                                                        <option value="Pamekaran"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Pamekaran' ? 'selected' : '' }}>
                                                            Pamekaran</option>
                                                        <option value="Cimaja"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Cimaja' ? 'selected' : '' }}>
                                                            Cimaja</option>
                                                        <option value="Cimanglid"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Cimanglid' ? 'selected' : '' }}>
                                                            Cimanglid</option>
                                                        <option value="Limusagung"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Limusagung' ? 'selected' : '' }}>
                                                            Limusagung</option>
                                                        <option value="Mangunjaya"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Mangunjaya' ? 'selected' : '' }}>
                                                            Mangunjaya</option>
                                                        <option value="Nanggeleng"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Nanggeleng' ? 'selected' : '' }}>
                                                            Nanggeleng</option>
                                                        <option value="Darawati"
                                                            {{ old('dusun', $disabilitas->dusun) == 'Darawati' ? 'selected' : '' }}>
                                                            Darawati</option>
                                                    </select>
                                                    @error('dusun')
                                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="dusun" value="{{ auth()->user()->level }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-dark mr-1" type="reset"><i
                                            class="fa-solid fa-arrows-rotate"></i>
                                        Reset</button>
                                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
