@extends($theme.'layouts.login_layout')

@section('content')

    <!-- contact-style-two -->
    <section class="auth-style-one" style="background-image: url({{asset($themeTrue.'frontend/assets/images/background/contact-3.jpg')}});">
        <div class="auto-container">
            <div class="col-xl-6 col-lg-12 col-md-12 inner-column">
            <div class="row">

               <!--  <div class="default-form pull-left">
                    <figure class="logo"><a href="index.html"><img src="{{asset($themeTrue.'frontend/assets/images/logo-6.png')}}" alt=""></a></figure>
                <hr>
                </div> -->
            
            </div>

            <form method="post" action="{{ route('login') }}" id="contact-form" class="default-form"> 
                @csrf
                <div class="row clearfix">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            
                            <div class="form-group">
                             <label for="">Username:</label>
                            <input type="text" name="username" placeholder="@lang('Email Or Username')" required="">
                            @error('username')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                            @error('email')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                        </div>

                            <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" name="password" placeholder="@lang('Password')" required="">
                            @error('password')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="remember-me d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between mb-30">
                                    <div class="checkbox custom-control custom-checkbox mt-10">
                                        <input id="remember" type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">@lang('Remember Me')</label>
                                    </div>
                                    <a class="text-white mt-10"  href="#">@lang("Forgot password?")</a>
                        </div>

                            <div class="form-group message-btn">
                                <button class="theme-btn style-one" type="submit">Account Login</button>
                            </div>

                            <div class="login-query mt-30 text-center">
                                    <a  href="#">@lang("Don't have any account? Sign Up")</a>
                                </div>
                        </div>
    
                    </div>
                </form>
               
            </div>
        </div>
    </section>
    <!-- contact-style-two end -->
    
@endsection
