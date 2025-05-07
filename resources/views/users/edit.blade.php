@extends('template.main')
@section('title', 'Edit User')
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
                            <li class="breadcrumb-item"><a href="/users">Users</a></li>
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
                            <form class="needs-validation" novalidate action="/users/{{ $user->id_user }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    placeholder="Name" value="{{ old('name', $user->name) }}" required>
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
                                                    placeholder="Email" value="{{ old('email', $user->email) }}" required>
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
                                                    id="password" placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" id="level"
                                            class="form-control @error('level') is-invalid @enderror" required>
                                            <option value="">Select Level</option>
                                            <option value="Admin"
                                                {{ old('level', $user->level) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="Pamekaran"
                                                {{ old('level', $user->level) == 'Pamekaran' ? 'selected' : '' }}>Pamekaran
                                            </option>
                                            <option value="Limusagung"
                                                {{ old('level', $user->level) == 'Limusagung' ? 'selected' : '' }}>
                                                Limusagung</option>
                                            <option value="Nanggeleng"
                                                {{ old('level', $user->level) == 'Nanggeleng' ? 'selected' : '' }}>
                                                Nanggeleng</option>
                                            <option value="Darawati"
                                                {{ old('level', $user->level) == 'Darawati' ? 'selected' : '' }}>Darawati
                                            </option>
                                            <option value="Mangunjaya"
                                                {{ old('level', $user->level) == 'Mangunjaya' ? 'selected' : '' }}>
                                                Mangunjaya</option>
                                            <option value="Cimaja"
                                                {{ old('level', $user->level) == 'Cimaja' ? 'selected' : '' }}>Cimaja
                                            </option>
                                            <option value="Cimanglid"
                                                {{ old('level', $user->level) == 'Cimanglid' ? 'selected' : '' }}>Cimanglid
                                            </option>
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
