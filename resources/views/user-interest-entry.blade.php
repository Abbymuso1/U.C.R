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
        <p style="margin-left:85px">Welcome to <em><span style="color:orangered; font-family:cursive">Wise Choice</span></em> Course Recommendation System</p>
    </div>
    <!-- main -->
    <div class="navbar-added">
        <a href="/" class="logo" style="color:orangered; font-size:xx-large; font-family:cursive">
            Wise Choice
        </a>


        <a href="{{ route('dashboard') }}" style="float:right; margin-left:20px; color:white; margin-top:5px;">Back to User Dashboard</a>
        <a style="float:right; margin-top:5px;">Hi👋<span style="color:orange; margin-left:10px;">{{ Auth::user()->name }}</span></a>




    </div>
    <div class="main-agile">

        <!-- <h1>Modern Flip Sign In Form</h1> -->
        <div id="w3ls_form" class="signin-form">



            <form id="signin" action="{{url('')}}" method="POST" style="height:900px">


                @csrf
                <div class="ribbon"><a href="#" id="flipToRecover" class="flipLink" title="Click Here to enter grades">View Points</a></div>
                <h2>Interest Entry</h2>
                @foreach($question as $q)
                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==2)
                <p>{{$q->question}} : {{$hol->holland_name}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option_1">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option1_error_message"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==3)

                <p>{{$q->question}} : {{$hol->holland_name}} </p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option_2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option2_error_message"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==4)
                <p>{{$q->question}} : {{$hol->holland_name}} </p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option_3">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option3_error_message"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==5)
                <p>{{$q->question}} : {{$hol->holland_name}} </p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option_4">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message4"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==6)
                <p>{{$q->question}} : {{$hol->holland_name}} </p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option_5">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option5_error_message"></span>
                @endif
                @endif
                @endforeach
                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==7)
                <p>{{$q->question}} : {{$hol->holland_name}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option_6">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option6_error_message"></span>
                @endif
                @endif
                @endforeach
                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==8)
                <p>{{$q->question}} : {{$hol->holland_name}} </p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>
                @endif
                @endif
                @endforeach
                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==9)
                <p>{{$q->question}} : {{$hol->holland_name}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==10)
                <p>{{$q->question}} : {{$hol->holland_name}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==11)
                <p>{{$q->question}} : {{$hol->holland_name}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==12)
                <p>{{$q->question}} : {{$hol->holland_name}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>
                @endif
                @endif
                @endforeach

                @foreach($holland as $hol)
                @if($hol->id==$q->holland_id)
                @if($q->id==13)
                <p>{{$q->question}}</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select id="option2">
                    <option value="">---</option>
                    <option value="2">Agree</option>

                    <option value="1">Neutral</option>

                    <option value="0">Disagree</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>
                @endif
                @endif
                @endforeach
                @endforeach

    

                <input type="submit" value="{{ __('Submit') }}">


            </form>


            <form id="signup" action="" method="POST">
                <div class="ribbon"><a href="#" id="flipToRecover" class="flipLink" title="Click Here to enter grades">Back</a></div>

                <p>Total Points:</p>
                <span>20</span>
                <p>Average Points:</p>
                <span>20</span>
                <p>Mean Grade:</p>
                <span>20</span>

                <button><a href="/user-interest-entry">Next</a></button>
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