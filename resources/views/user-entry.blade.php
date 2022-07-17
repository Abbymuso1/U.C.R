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
    <div class="navbar-title-added">
        <p style="margin-left:85px">Welcome to <span style="color:orange;">U.C.R</span> Course Recommendation System</p>
    </div>
    <!-- main -->
    <div class="navbar-added">
        <a style="font-size:x-large; margin-left:20px">U.C.R</a>

        <a href="{{ route('dashboard') }}" style="float:right; margin-left:20px; color:white; margin-top:5px;">Back to User Dashboard</a>
        <a style="float:right; margin-top:5px;">Hi👋<span style="color:orange; margin-left:10px;">{{ Auth::user()->name }}</span></a>




    </div>
    <div class="main-agile">

        <!-- <h1>Modern Flip Sign In Form</h1> -->
        <div id="w3ls_form" class="signin-form">



            <form id="signin" action="{{url('/adduserinterestentry')}}" method="POST">
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                @csrf
                <div class="ribbon"><a href="#" id="flipToRecover" class="flipLink" title="Click Here to enter grades">Grade Entry</a></div>
                <h2>Interest Entry</h2>

                @foreach($courses as $cor)
                @foreach($holland as $hol)
                @if($cor->id==$hol->course_id)
                @foreach($interest as $int)
                @if($hol->id==$int->holland_id)
                <p>{{$int->question}}</p>
                <select name="int_ans">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <input hidden name="course_id" value="{{$cor->id}}">
                <input hidden name="holland_id" value="{{$hol->id}}">
                <input hidden name="interest_id" value="{{$int->id}}">
                <input hidden name="user_id" value="{{ Auth::user()->id }}">
                @endif
                @endforeach
                @endif
                @endforeach
                @endforeach

                <input type="submit" value="{{ __('Submit') }}">


            </form>


            <form id="signup" action="" method="POST">
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                @csrf
                <div class="ribbon"><a href="#" id="flipToRecover1" class="flipLink" title="Click Here to enter Interest">Interest Entry</a></div>
                <h3>Grades</h3>

                @foreach($subject as $sub)
                <p>{{$sub->subject_name}}</p>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @endforeach
                <input type="submit" style="margin-left:60px;" value=" {{ __('Submit') }}">
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