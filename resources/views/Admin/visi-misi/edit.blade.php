@extends('template.main')
@section('title', 'Edit Visi Misi')
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
                            <a href="/admin/visi-misi" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-arrow-rotate-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>


                <form class="needs-validation" novalidate action="/admin/visi-misi/{{ $visiMisi->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Visi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="visi">Visi</label>
                                        <textarea name="visi" class="form-control @error('visi') is-invalid @enderror" id="visi" placeholder="Visi"
                                            rows="8" required>{{ old('visi', $visiMisi->visi) }}</textarea>
                                        @error('visi')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Misi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="misi">Misi</label>
                                        <textarea name="misi" class="form-control @error('misi') is-invalid @enderror" id="misi" placeholder="Misi"
                                            rows="8" required>{{ old('misi', $visiMisi->misi) }}</textarea>
                                        @error('misi')
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('misi');
            textarea.addEventListener('input', function() {
                let lines = textarea.value.split('\n');
                for (let i = 0; i < lines.length; i++) {
                    if (!lines[i].startsWith((i + 1) + '. ')) {
                        lines[i] = (i + 1) + '. ' + lines[i].replace(/^\d+\.\s*/, '');
                    }
                }
                textarea.value = lines.join('\n');
            });
        });
    </script>

@endsection
