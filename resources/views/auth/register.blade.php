@extends('layouts.app')
@section('content')
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="http://127.0.0.1:8000" class="h1"><b>CTC_PASURUAN</b></br>REGISTER</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new user</p>
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="gender" :value="data.gender" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus placeholder="Gender">
            <option value="" disabled selected>Select Gender</option>
            <option value="M">Men</option>
            <option value="W">Women</option>
          </select>
          @error('gender')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <select name="ro_id" :value="data.ro_id" id="gender" class="form-control @error('ro_id') is-invalid @enderror" name="ro_id" value="{{ old('ro_id') }}" required autocomplete="ro_id" autofocus placeholder="RO">
            <option value="" disabled selected>Select RO</option>
            <option value="1">BANGIL</option>
            <option value="2">PASURUAN</option>
            <option value="3">PROBOLINGGO</option>
            <option value="4">KRAKSAAN</option>
            <option value="5">LUMAJANG</option>
          </select>
          @error('ro_id')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus placeholder="NIK">
          @error('nik')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone">
          @error('phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <input type="hidden" class="image" name="image" value="assets/dist/img/AdminLTELogo.png">
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
      </form>
      <a href="{{route('login') }}" class="text-center">SAYA SUDAH PUNYA AKUN</a>
    </div>
  </div>
</div>
@endsection