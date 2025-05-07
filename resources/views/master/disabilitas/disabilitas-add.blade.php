@extends('template.main')
@section('title', 'Tambah Disabilitas')
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
                            <form class="needs-validation" novalidate action="/mdisabilitas" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text" name="nik"
                                                    class="form-control @error('nik') is-invalid @enderror" id="nik"
                                                    placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}"
                                                    required>
                                                <span id="nik-error" class="invalid-feedback text-danger"
                                                    style="display: none;">NIK tidak ditemukan dalam database
                                                    penduduk</span>
                                                @error('nik')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="kategori">Kategori Disabilitas</label>
                                                <select name="kategori"
                                                    class="form-control @error('kategori') is-invalid @enderror"
                                                    id="kategori" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="Fisik"
                                                        {{ old('kategori') == 'Fisik' ? 'selected' : '' }}>Fisik</option>
                                                    <option value="Ganda"
                                                        {{ old('kategori') == 'Ganda' ? 'selected' : '' }}>Ganda</option>
                                                    <option value="Mental"
                                                        {{ old('kategori') == 'Mental' ? 'selected' : '' }}>Mental</option>
                                                    <option value="Sensorik"
                                                        {{ old('kategori') == 'Sensorik' ? 'selected' : '' }}>Sensorik
                                                    </option>
                                                </select>
                                                @error('kategori')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row {{ auth()->user()->level != 'Admin' ? 'hidden' : '' }}">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="dusun">Dusun</label>
                                                @if (auth()->user()->level == 'Admin')
                                                    <select name="dusun"
                                                        class="form-control @error('dusun') is-invalid @enderror"
                                                        id="dusun" required>
                                                        <option value="Pamekaran"
                                                            {{ old('dusun', auth()->user()->level) == 'Pamekaran' ? 'selected' : '' }}>
                                                            Pamekaran</option>
                                                        <option value="Cimaja"
                                                            {{ old('dusun', auth()->user()->level) == 'Cimaja' ? 'selected' : '' }}>
                                                            Cimaja</option>
                                                        <option value="Cimanglid"
                                                            {{ old('dusun', auth()->user()->level) == 'Cimanglid' ? 'selected' : '' }}>
                                                            Cimanglid</option>
                                                        <option value="Limusagung"
                                                            {{ old('dusun', auth()->user()->level) == 'Limusagung' ? 'selected' : '' }}>
                                                            Limusagung</option>
                                                        <option value="Mangunjaya"
                                                            {{ old('dusun', auth()->user()->level) == 'Mangunjaya' ? 'selected' : '' }}>
                                                            Mangunjaya</option>
                                                        <option value="Nanggeleng"
                                                            {{ old('dusun', auth()->user()->level) == 'Nanggeleng' ? 'selected' : '' }}>
                                                            Nanggeleng</option>
                                                        <option value="Darawati"
                                                            {{ old('dusun', auth()->user()->level) == 'Darawati' ? 'selected' : '' }}>
                                                            Darawati</option>
                                                    </select>
                                                @else
                                                    <input type="hidden" name="dusun"
                                                        value="{{ auth()->user()->level }}"
                                                        class="form-control @error('dusun') is-invalid @enderror"
                                                        id="dusun" required>
                                                @endif
                                                @error('dusun')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
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
