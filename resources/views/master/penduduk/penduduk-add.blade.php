@extends('template.main')
@section('title', 'Tambah Penduduk')
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
                            <li class="breadcrumb-item"><a href="/penduduk">Penduduk</a></li>
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
                                    <a href="/penduduk" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="/penduduk" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="number" name="nik"
                                                    class="form-control @error('nik') is-invalid @enderror" id="nik"
                                                    placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}"
                                                    required>
                                                @error('nik')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="no_kk">No. KK</label>
                                                <input type="number" name="no_kk"
                                                    class="form-control @error('no_kk') is-invalid @enderror" id="no_kk"
                                                    placeholder="Nomor Kartu Keluarga" value="{{ old('no_kk') }}" required>
                                                @error('no_kk')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                                                @error('nama')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" placeholder="Tempat Lahir"
                                                    value="{{ old('tempat_lahir') }}" required>
                                                @error('tempat_lahir')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir" placeholder="Tanggal Lahir"
                                                    value="{{ old('tanggal_lahir') }}" required>
                                                @error('tanggal_lahir')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select name="jenis_kelamin"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    id="jenis_kelamin" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    id="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat') }}"
                                                    required>
                                                @error('alamat')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="rt">RT</label>
                                                <select name="rt"
                                                    class="form-control @error('rt') is-invalid @enderror" id="rt"
                                                    required>
                                                    <option value="" disabled selected>Pilih RT</option>
                                                    @for ($i = 1; $i <= 8; $i++)
                                                        @php
                                                            $rtValue = str_pad($i, 3, '0', STR_PAD_LEFT);
                                                        @endphp
                                                        <option value="{{ $rtValue }}"
                                                            {{ old('rt') == $rtValue ? 'selected' : '' }}>
                                                            {{ $rtValue }}</option>
                                                    @endfor
                                                </select>
                                                @error('rt')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="rw">RW</label>
                                                <select name="rw"
                                                    class="form-control @error('rw') is-invalid @enderror" id="rw"
                                                    required>
                                                    <option value="" disabled selected>Pilih RW</option>
                                                    @for ($i = 1; $i <= 8; $i++)
                                                        @php
                                                            $rwValue = str_pad($i, 3, '0', STR_PAD_LEFT);
                                                        @endphp
                                                        <option value="{{ $rwValue }}"
                                                            {{ old('rw') == $rwValue ? 'selected' : '' }}>
                                                            {{ $rwValue }}</option>
                                                    @endfor
                                                </select>
                                                @error('rw')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="dusun">Dusun</label>
                                                <select name="dusun"
                                                    class="form-control @error('dusun') is-invalid @enderror"
                                                    id="dusun" required
                                                    {{ auth()->user()->level != 'Admin' ? 'disabled' : '' }}>
                                                    <option value="" disabled {{ !old('dusun') ? 'selected' : '' }}>
                                                        Pilih Dusun</option>
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
                                                @error('dusun')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                                @if (auth()->user()->level != 'Admin')
                                                    <input type="hidden" name="dusun"
                                                        value="{{ auth()->user()->level }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <select name="agama"
                                                    class="form-control @error('agama') is-invalid @enderror"
                                                    id="agama" required>
                                                    <option value="" disabled selected>Pilih Agama</option>
                                                    <option value="Islam"
                                                        {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen"
                                                        {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                    <option value="Katolik"
                                                        {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu"
                                                        {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Buddha"
                                                        {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                    <option value="Konghucu"
                                                        {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                                    </option>
                                                </select>
                                                @error('agama')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status_perkawinan">Status Perkawinan</label>
                                                <select name="status_perkawinan"
                                                    class="form-control @error('status_perkawinan') is-invalid @enderror"
                                                    id="status_perkawinan" required>
                                                    <option value="" disabled selected>Pilih Status Perkawinan
                                                    </option>
                                                    <option value="Belum Kawin"
                                                        {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>
                                                        Belum Kawin</option>
                                                    <option value="Kawin"
                                                        {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin
                                                    </option>
                                                    <option value="Cerai Hidup"
                                                        {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>
                                                        Cerai Hidup</option>
                                                    <option value="Cerai Mati"
                                                        {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>
                                                        Cerai Mati</option>
                                                </select>
                                                @error('status_perkawinan')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="pendidikan">Pendidikan</label>
                                                <select name="pendidikan"
                                                    class="form-control @error('pendidikan') is-invalid @enderror"
                                                    id="pendidikan" required>
                                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                                    <option value="Tidak/Belum Sekolah"
                                                        {{ old('pendidikan') == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>
                                                        Tidak/Belum Sekolah</option>
                                                    <option value="Tidak Tamat SD/Sederajat"
                                                        {{ old('pendidikan') == 'Tidak Tamat SD/Sederajat' ? 'selected' : '' }}>
                                                        Tidak Tamat SD/Sederajat</option>
                                                    <option value="Tamat SD/Sederajat"
                                                        {{ old('pendidikan') == 'Tamat SD/Sederajat' ? 'selected' : '' }}>
                                                        Tamat SD/Sederajat</option>
                                                    <option value="SLTP/Sederajat"
                                                        {{ old('pendidikan') == 'SLTP/Sederajat' ? 'selected' : '' }}>
                                                        SLTP/Sederajat</option>
                                                    <option value="SLTA/Sederajat"
                                                        {{ old('pendidikan') == 'SLTA/Sederajat' ? 'selected' : '' }}>
                                                        SLTA/Sederajat</option>
                                                    <option value="Akademi/Diploma III/S. Muda"
                                                        {{ old('pendidikan') == 'Akademi/Diploma III/S. Muda' ? 'selected' : '' }}>
                                                        Akademi/Diploma III/S. Muda</option>
                                                    <option value="Diploma I/II"
                                                        {{ old('pendidikan') == 'Diploma I/II' ? 'selected' : '' }}>Diploma
                                                        I/II</option>
                                                    <option value="Diploma IV/Strata I"
                                                        {{ old('pendidikan') == 'Diploma IV/Strata I' ? 'selected' : '' }}>
                                                        Diploma IV/Strata I</option>
                                                    <option value="Strata II"
                                                        {{ old('pendidikan') == 'Strata II' ? 'selected' : '' }}>Strata II
                                                    </option>
                                                    <option value="Strata III"
                                                        {{ old('pendidikan') == 'Strata III' ? 'selected' : '' }}>Strata
                                                        III</option>
                                                    <option value="Pendidikan Non-Formal"
                                                        {{ old('pendidikan') == 'Pendidikan Non-Formal' ? 'selected' : '' }}>
                                                        Pendidikan Non-Formal</option>
                                                    <option value="Pendidikan Khusus"
                                                        {{ old('pendidikan') == 'Pendidikan Khusus' ? 'selected' : '' }}>
                                                        Pendidikan Khusus</option>
                                                </select>


                                                @error('pendidikan')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <select name="pekerjaan" id="pekerjaan"
                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                    required>
                                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                                    @foreach ($pekerjaanList as $item)
                                                        <option value="{{ $item->nama }}"
                                                            {{ old('pekerjaan', isset($pekerjaan) ? $pekerjaan->nama : '') == $item->nama ? 'selected' : '' }}>
                                                            {{ $item->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('pekerjaan')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="golongan_darah">Golongan Darah</label>
                                                <select name="golongan_darah"
                                                    class="form-control @error('golongan_darah') is-invalid @enderror"
                                                    id="golongan_darah" required>
                                                    <option value="" disabled selected>Pilih Golongan Darah</option>
                                                    <option value="A"
                                                        {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B"
                                                        {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="AB"
                                                        {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                                                    <option value="O"
                                                        {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                                                </select>
                                                @error('golongan_darah')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="shdk">Status Hubungan Dalam Keluarga</label>
                                                <select name="shdk"
                                                    class="form-control @error('shdk') is-invalid @enderror"
                                                    id="shdk" required>
                                                    <option value="">Pilih Status</option>
                                                    <option value="Anak" {{ old('shdk') == 'Anak' ? 'selected' : '' }}>
                                                        Anak</option>
                                                    <option value="Cucu" {{ old('shdk') == 'Cucu' ? 'selected' : '' }}>
                                                        Cucu</option>
                                                    <option value="Famili Lain"
                                                        {{ old('shdk') == 'Famili Lain' ? 'selected' : '' }}>Famili Lain
                                                    </option>
                                                    <option value="Istri" {{ old('shdk') == 'Istri' ? 'selected' : '' }}>
                                                        Istri</option>
                                                    <option value="Kepala Keluarga"
                                                        {{ old('shdk') == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala
                                                        Keluarga</option>
                                                    <option value="Lainnya"
                                                        {{ old('shdk') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                    <option value="Orangtua"
                                                        {{ old('shdk') == 'Orangtua' ? 'selected' : '' }}>Orangtua</option>
                                                </select>

                                                @error('shdk')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="bantuan">Bantuan</label>
                                                <select name="bantuan" id="bantuan"
                                                    class="form-control @error('bantuan') is-invalid @enderror" required>
                                                    <option value="" disabled selected>Pilih Bantuan Sosial</option>
                                                    <option value="-">Tidak Ada</option>
                                                    @foreach ($bantuanList as $item)
                                                        <option value="{{ $item->jenis }}"
                                                            {{ old('bantuan', isset($bantuan) ? $bantuan->jenis : '') == $item->jenis ? 'selected' : '' }}>
                                                            {{ $item->jenis }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('bantuan')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="kis">JKN-KIS</label>
                                                <select name="kis" id="kis"
                                                    class="form-control @error('kis') is-invalid @enderror" required>
                                                    <option value="" disabled selected>Pilih JKN-KIS</option>
                                                    <option value="-">Tidak Ada</option>
                                                    @foreach ($kisList as $item)
                                                        <option value="{{ $item->jenis }}"
                                                            {{ old('kis', isset($kis) ? $kis->jenis : '') == $item->jenis ? 'selected' : '' }}>
                                                            {{ $item->jenis }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kis')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="ayah">Nama Ayah</label>
                                                <input type="text" name="ayah"
                                                    class="form-control @error('ayah') is-invalid @enderror"
                                                    id="ayah" placeholder="Nama Ayah" value="{{ old('ayah') }}"
                                                    required>
                                                @error('ayah')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="ibu">Nama Ibu</label>
                                                <input type="text" name="ibu"
                                                    class="form-control @error('ibu') is-invalid @enderror"
                                                    id="ibu" placeholder="Nama Ibu" value="{{ old('ibu') }}"
                                                    required>
                                                @error('ibu')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="kepala_keluarga">Nama Kepala Keluarga</label>
                                                <input type="text" name="kepala_keluarga"
                                                    class="form-control @error('kepala_keluarga') is-invalid @enderror"
                                                    id="kepala_keluarga" placeholder="Nama Kepala Keluarga"
                                                    value="{{ old('kepala_keluarga') }}" required>
                                                @error('kepala_keluarga')
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
                                    <button class="btn btn-success" type="submit"><i
                                            class="fa-solid fa-floppy-disk"></i>
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
