@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!-- Nama Siswa -->
                        <div class="form-group{{ $errors->has('nama_siswa') ? ' has-error' : '' }}">
                            <label for="nama_siswa" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="nama_siswa" type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') }}" required autofocus>

                                @if ($errors->has('nama_siswa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_siswa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- NISN -->
                        <div class="form-group{{ $errors->has('nisn') ? ' has-error' : '' }}">
                            <label for="nisn" class="col-md-4 control-label">NISN</label>
                            <div class="col-md-6">
                                <input id="nisn" type="number" class="form-control" name="nisn" value="{{ old('nisn') }}" required autofocus>

                                @if ($errors->has('nisn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nisn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">Kelas</label>
                            <div class="col-md-6">
                                <input id="kelas" type="text" class="form-control" name="kelas" value="{{ old('kelas') }}" required>
                                @if ($errors->has('kelas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group{{ $errors->has('jenkel') ? ' has-error' : '' }}">
                            <label for="jenkel" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <select id="jenkel" class="form-control" name="jenkel" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>

                                @if ($errors->has('jenkel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenkel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
