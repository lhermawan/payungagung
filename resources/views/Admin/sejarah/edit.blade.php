@extends('template.main')
@section('title', 'Edit Sejarah Desa')
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
                        <div class="text-right mb-3">
                            <a href="/admin/sejarah" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-arrow-rotate-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <form class="needs-validation" novalidate action="/admin/sejarah/{{ $sejarah->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Sejarah</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="content">Sejarah</label>
                                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content"
                                            placeholder="Sejarah Desa" rows="8" required>{{ old('content', $sejarah->content) }}</textarea>
                                        @error('content')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-dark mr-1" type="reset">
                            <i class="fa-solid fa-arrows-rotate"></i> Reset
                        </button>
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i> Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



@endsection
