
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CHNTC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="/maindir/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/maindir/css/animate.css">
    
    <link rel="stylesheet" href="/maindir/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/maindir/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/maindir/css/magnific-popup.css">

    <link rel="stylesheet" href="/maindir/css/style.css">
    {{-- <link rel="stylesheet" href="/dashdir/css/main.css"> --}}
  </head>
    {{-- <body class="login_body" style="background-image: url('/storage/classified/Nursing/n3.jpeg');"> --}}
    <body class="login_body" style="background-image: url('/storage/classified/Nursing/img4.jpg');">
    {{-- <body class="login_body" style="background-image: url('/storage/classified/Nursing/img3.jpg');"> --}}
        <div class="my_overlay">
            <div class="row">
                <div class="login_container">
                    <div class="col-md-6 offset-md-3 login_container_inner">

                        <img src="/storage/classified/Nursing/n0.png">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            
                            <h5 class="staff_portal_p">TYPE SERIAL No.</h5>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input placeholder="Serial No" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="sign_in">
                                        {{ __('CONFIRM') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="rights">Copyright © 2021 PivoApps Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>