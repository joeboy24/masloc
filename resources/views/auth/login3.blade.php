
@extends('layouts.app')

@section('header_text')
  <div class="header_top_col">
    <p class="logo_text1"><i class="fa fa-grav" style="font-size:1.4em"></i>&nbsp; PIVO<b class="logo_text2">APPS</b></p>
  </div>
@endsection

@section('main_content')

<div class="login_body">

</div>

  <div class="login_body2">

    {{-- <div class="row"> --}}
      {{-- <div class="col-md-6"> --}}

        <div class="lock_container">
          <p><i class="fa fa-unlock-alt"></i></p>
        </div>

        <section class="login_content">
          {{-- <div style="height: 50px"></div> --}}
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <input placeholder="Phone / Email" id="email" type="text" class="@error('email') is-invalid @enderror login_input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror login_input" name="password" required autocomplete="current-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="login_btn_container">
              <button type="submit" class="login_btn">Login</button>
              {{-- <button type="submit" class="login_btn2">Login</button> --}}
            </div>
          </form>
        </section>

      {{-- </div> --}}

      {{-- <div class="col-md-6">
        <img class="sf_img1" src="/maindir/images/sf3.webp" width="100%" alt="">
        <img class="sf_img2" src="/maindir/images/sf2.jpeg" width="100%" alt="">
      </div>
    </div> --}}

  </div>


@endsection

    
  