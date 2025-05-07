@extends('template.main')
@section('title', 'Edit JKN-KIS')
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
                            <li class="breadcrumb-item"><a href="/master/kis">JKN-KIS</a></li>
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
                                    <a href="/master/kis" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="/master/kis/{{ $kis->id_kis }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="jenis">Jenis JKN-KIS</label>
                                                <input type="text" name="jenis"
                                                    class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                                    placeholder="Jenis Jaminan" value="{{ old('jenis', $kis->jenis) }}"
                                                    required>
                                                @error('jenis')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select name="kategori"
                                                    class="form-control @error('kategori') is-invalid @enderror"
                                                    id="kategori" required>
                                                    <option value="PBI"
                                                        {{ old('kategori', $kis->kategori) == 'PBI' ? 'selected' : '' }}>
                                                        PBI</option>
                                                    <option value="Non PBI"
                                                        {{ old('kategori', $kis->kategori) == 'Non PBI' ? 'selected' : '' }}>
                                                        Non PBI</option>

                                                </select>
                                                @error('kategori')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                                    placeholder="Keterangan" rows="4" required>{{ old('keterangan', $kis->keterangan) }}</textarea>
                                                @error('keterangan')
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
