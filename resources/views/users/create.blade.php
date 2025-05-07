@extends('template.main')
@section('title', 'Tambah Akun')
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
                            <li class="breadcrumb-item"><a href="/users">Akun</a></li>
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
                                    <a href="/users" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="/users" method="POST">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    placeholder="Email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" required>
                                                @error('password')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="password_confirmation" placeholder="Konfirmasi Password" required>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" class="form-control @error('level') is-invalid @enderror"
                                            id="level" required>
                                            <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="Pamekaran" {{ old('level') == 'Pamekaran' ? 'selected' : '' }}>
                                                Pamekaran</option>
                                            <option value="Limusagung" {{ old('level') == 'Limusagung' ? 'selected' : '' }}>
                                                Limusagung</option>
                                            <option value="Nanggeleng" {{ old('level') == 'Nanggeleng' ? 'selected' : '' }}>
                                                Nanggeleng</option>
                                            <option value="Darawati" {{ old('level') == 'Darawati' ? 'selected' : '' }}>
                                                Darawati</option>
                                            <option value="Mangunjaya"
                                                {{ old('level') == 'Mangunjaya' ? 'selected' : '' }}>Mangunjaya</option>
                                            <option value="Cimaja" {{ old('level') == 'Cimaja' ? 'selected' : '' }}>Cimaja
                                            </option>
                                            <option value="Cimanglid" {{ old('level') == 'Cimanglid' ? 'selected' : '' }}>
                                                Cimanglid</option>
                                        </select>
                                        @error('level')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                        @enderror
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
