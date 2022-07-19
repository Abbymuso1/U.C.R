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



            <form id="signin" action="{{url('/addusergradeentry')}}" method="POST" style="height:500px">


                @csrf
                <div class="ribbon"><a href="#" id="flipToRecover" class="flipLink" title="Click Here to enter grades">View Points</a></div>
                <h2>Grade Entry</h2>
                <p style="color:white; text-align:center;">Enter grades for Maths, English, Swahili and two sciences or one humanity and one technical or two humanities</p>

                <p>Mathematics</p>
                <!-- <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> -->
                <select name="mathematics" id="option2">
                    <option value="">---</option>
                    <option value="12">A</option>
                    <option value="11">A-</option>
                    <option value="10">B+</option>
                    <option value="9">B</option>
                    <option value="8">B-</option>
                    <option value="7">C+</option>
                    <option value="6">C</option>
                    <option value="5">C-</option>
                    <option value="4">D+</option>
                    <option value="3">D</option>
                    <option value="2">D-</option>
                    <option value="1">E</option>
                </select>

                <span class="error_form" id="option_error_message2"></span>


                <p>English</p>
                <select name="english" id="option3">
                    <option value="">---</option>
                    <option value="12">A</option>
                    <option value="11">A-</option>
                    <option value="10">B+</option>
                    <option value="9">B</option>
                    <option value="8">B-</option>
                    <option value="7">C+</option>
                    <option value="6">C</option>
                    <option value="5">C-</option>
                    <option value="4">D+</option>
                    <option value="3">D</option>
                    <option value="2">D-</option>
                    <option value="1">E</option>
                </select>
                <span class="error_form" id="option_error_message3"></span>

                <p>Swahili</p>
                <select name="swahili" id="option4">
                    <option value="">---</option>
                    <option value="12">A</option>
                    <option value="11">A-</option>
                    <option value="10">B+</option>
                    <option value="9">B</option>
                    <option value="8">B-</option>
                    <option value="7">C+</option>
                    <option value="6">C</option>
                    <option value="5">C-</option>
                    <option value="4">D+</option>
                    <option value="3">D</option>
                    <option value="2">D-</option>
                    <option value="1">E</option>
                </select>
                <span class="error_form" id="option_error_message4"></span>


                <p>Science 1/ Humanity 1</p>
                <select name="chemistry" id="option5">
                    <option value="">---</option>
                    <option value="12">A</option>
                    <option value="11">A-</option>
                    <option value="10">B+</option>
                    <option value="9">B</option>
                    <option value="8">B-</option>
                    <option value="7">C+</option>
                    <option value="6">C</option>
                    <option value="5">C-</option>
                    <option value="4">D+</option>
                    <option value="3">D</option>
                    <option value="2">D-</option>
                    <option value="1">E</option>
                </select>
                <span class="error_form" id="option_error_message5"></span>

                <p>Science 2/ Humanity 2/ Technical</p>
                <select name="science" id="option6">
                    <option value="">---</option>
                    <option value="12">A</option>
                    <option value="11">A-</option>
                    <option value="10">B+</option>
                    <option value="9">B</option>
                    <option value="8">B-</option>
                    <option value="7">C+</option>
                    <option value="6">C</option>
                    <option value="5">C-</option>
                    <option value="4">D+</option>
                    <option value="3">D</option>
                    <option value="2">D-</option>
                    <option value="1">E</option>
                </select>
                <span class="error_form" id="option_error_message6"></span>




                <p></p>

                <input type="submit" value="{{ __('Click here then click view points') }}">


            </form>


            <form id="signup" action="" method="POST">
                <div class="ribbon"><a href="#" id="flipToRecover" class="flipLink" title="Click Here to enter grades">Back</a></div>
                @foreach($grades as $grade)

                <p>Recommendation Grade Entry ID: {{$grade->id}}</p>
                
                <p>Total Points: {{$grade->totalpoints}}</p>
              
              
            
                <p>Average Points: {{$grade->average}}</p>
                
                
                @foreach($graderef as $gr)
                @if($grade->average==$gr->score)
                <p>Mean Grade: {{$gr->grade}}</p>
                @endif
                @endforeach
                @endforeach
                <p>--------</p>
                



                <button style="width:300px; margin-left:60px; padding:1em; margin-top:10px;"><a href="/user-interest-entry">Next</a></button>
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