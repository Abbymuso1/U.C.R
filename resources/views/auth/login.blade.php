<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Flip Sign In Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href='//fonts.googleapis.com/css?family=Athiti:400,200,300,500,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('new/frontend/css/style.css') }}">




</head>

<body>
    <!-- main -->
    <div class="main-agile">
        <!-- <h1>Modern Flip Sign In Form</h1> -->
        <div id="w3ls_form" class="signin-form">



            <form id="signin" action="{{route('login')}}" method="POST">
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                @csrf
                <div class="ribbon"><a href="#" id="flipToRecover" class="flipLink" title="Click Here to SignUp">Sign Up</a></div>
                <h2>Sign In Form</h2>
                <p>{{ __('Email') }}</p>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <span class="text-danger">@error('Email') {{$message}} @enderror</span>

                <p>{{ __('Password') }}</p>
                <input id="password" type="password" name="password" required autocomplete="current-password" />
                <span class="text-danger">@error('Password') {{$message}} @enderror</span>

                <input type="checkbox" id="remember_me" name="remember">
                <label for="brand"><span></span> {{ __('Remember me') }}</label>
                <input type="submit" value="{{ __('Log in') }}">
                @if (Route::has('password.request'))
                <div class="signin-agileits-bottom">
                    <p><a href="{{ route('password.request') }}">Forgot password ?</a></p>
                </div>
                @endif
             
            </form>


            <form id="signup" action="{{ route('register') }}" method="POST">
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                @csrf
                <div class="ribbon"><a href="#" id="flipToRecover1" class="flipLink" title="Click Here to signin">Sign In</a></div>
                <h3>Sign Up Form</h3>

                <p>{{ __('Name') }}</p>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <span class="text-danger">@error('Full_Name') {{$message}} @enderror</span>

                <p>{{ __('Email') }} </p>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email"/>
                <span class="text-danger">@error('Email') {{$message}} @enderror</span>

                <p>{{ __('Password') }}</p>
                <input id="password" type="password" name="password" required autocomplete="new-password"/>
                <span class="text-danger">@error('Password') {{$message}} @enderror</span>

                <p>{{ __('Confirm Password') }}</p>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <span class="text-danger">@error('Password') {{$message}} @enderror</span>
    
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <input type="checkbox" id="brand1" value="">
                <label for="brand1"><span></span>I accept the terms of use</label>
                @endif

                <div class="signin-agileits-bottom">
                    <p><a href="{{ route('login') }}">Already Registered?</a></p>
                </div>
                <input type="submit" value=" {{ __('Register') }}">
            </form>
            <!-- Sign up Form-->
        </div>

    </div>

    <script>
        $(function() {

            // Checking for CSS 3D transformation support
            $.support.css3d = supportsCSS3D();

            var w3ls_form = $('#w3ls_form');

            // Listening for clicks on the ribbon links
            $('.flipLink').click(function(e) {

                // Flipping the forms
                w3ls_form.toggleClass('flipped');

                // If there is no CSS3 3D support, simply
                // hide the sign in form (exposing the signup one)
                if (!$.support.css3d) {
                    $('#signin').toggle();
                }
                e.preventDefault();
            });


            function supportsCSS3D() {
                var props = [
                        'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
                    ],
                    testDom = document.createElement('a');

                for (var i = 0; i < props.length; i++) {
                    if (props[i] in testDom.style) {
                        return true;
                    }
                }

                return false;
            }
        });
    </script>
    <script src="{{asset('new/js/jquery.min.js') }}"></script>
    <script src="{{asset('new/js/script.js') }}"></script>
</body>

</html>

