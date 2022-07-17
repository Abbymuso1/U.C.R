<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>U.C.R</title>

    <!-- Bootstrap core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-edu-meeting.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/6d51c26809.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"> </script>
    <script src="https://kit.fontawesome.com/347b9e054d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <title>{{$title ?? 'U.C.R'}}</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "blue-rich": "#0597F2",
                        'esomagreen': '#F2A81D',
                        'esomablue': '#014773',
                        'esomawhite': 'rgb(255 255 255)',
                        'esomagrey': '#757575',
                        'esomaoffwhite': '#F8F8F8',
                        'esomalightblue': '#0597F2'
                    },
                    screens: {
                        xmd: "860px",
                    },
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".flash").fadeOut(6000);

        });
    </script>
</head>

<body>
    <div class="sub-header" style="position:relative;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p>Welcome to <em>U.C.R</em> University Course Recommendation System</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area" style="margin-top:30px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            U.C.R
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->

                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Courses</a></li>
                            <li class="scroll-to-section"><a href="#coursecat">Hi {{ Auth::user()->name }}</a></li>

                            <li class="has-sub">
                                <a href="javascript:void(0)">Actions</a>

                                <ul class="sub-menu">
                                    <li><a href="{{ route('login') }}">{{ __('Back to Dashboard') }}</a></li>

                                    <li><a href="{{ route('register') }}">Log out</a></li>


                                </ul>
                            </li>

                            <li class=""><a href="{{ route('user-entry') }}">Back</a></li>


                        </ul>


                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->

    <section class="our-courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Univeristy Course Recommendations for <span style="color: orange;"> {{ Auth::user()->name }}</span></h2>
                    </div>
                </div>

                <div class="row">
                    @foreach($userinterestentry as $userint)
                    @if(Auth::user()->id==$userint->user_id)
                    @foreach($course as $co)
                    @if($co->id==$userint->course_id)

                    <div class="col-lg-3">
                        <div class="item">
                            <img src={{asset('images/course-01.jpg')}} alt="Course One">
                            <div class="down-content">
                                @if($userint->answer == 1)
                                <h4>{{$co->course_name}}</h4>
                                @elseif($userint->answer==0)
                                <h4>No recommendation</h4>
                                @endif
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$160</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endif
                    @endforeach
                    @endif
                    @endforeach
                </div>


            </div>
        </div>
        </div>
    </section>








    <script src={{asset('jquery/jquery.min.js')}}></script>
    <script src={{asset('js/bootstrap.bundle.min.js')}}></script>

    <script src={{asset('js/isotope.min.js')}}></script>
    <script src={{asset('js/owl-carousel.js')}}></script>
    <script src={{asset('js/lightbox.js')}}></script>
    <script src={{asset('js/tabs.js')}}></script>
    <script src={{asset('js/video.js')}}></script>
    <script src={{asset('js/slick-slider.js')}}></script>
    <script src={{asset('js/custom.js')}}></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>