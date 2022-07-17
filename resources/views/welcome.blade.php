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

  <div class="sub-header">
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
  <header class="header-area header-sticky">
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
            @if (Route::has('login'))
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#coursecat">Courses</a></li>
              @auth
              @else
              <li class="has-sub">
                <a href="javascript:void(0)">Join In</a>
               
                <ul class="sub-menu">
                  <li><a href="{{ route('login') }}">Sign In</a></li>
                  <li><a href="{{ route('login') }}">Sign Up</a></li>
                
                  @endauth
                  
                </ul>
              </li>

              <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>

            </ul>
            @endif
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>

          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
      <source src={{asset('images/course-video.mp4')}} type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="caption">
              <h6>Hello Students😊</h6>
              <h2>Welcome to U.C.R</h2>
              <p>Need help choosing a course? Do not worry🤗. We got you!<br>We have a variety of courses lined up for you to choose <br>from according to your interests and grades.</p>
              <div class="main-button-red">
                <a href="{{ route('login') }}">Join Us Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">

            <div class="item">
              <div class="icon">
                <img src={{asset('images/service-icon-01.png')}} alt="opsy">
              </div>
              <div class="down-content">
                <h4>Best University Courses</h4>
                <p>From architecture, to medicine, law and technology we have courses that you may have dreamed of ready for recommendation for you</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src={{asset('images/service-icon-02.png')}} alt="">
              </div>
              <div class="down-content">
                <h4>Best Recommendations</h4>
                <p>This is the graphs of the most recommendations made to users. Check it out and get inspiration from what others are recommended too.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src={{asset('images/service-icon-03.png')}} alt="">
              </div>
              <div class="down-content">
                <h4>Serve your Interests</h4>
                <p>Are you technical? Do you like reading? Do you like practicality? Go ahead and find out what course suits you.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src={{asset('images/service-icon-02.png')}} alt="">
              </div>
              <div class="down-content">
                <h4>Considers your grades</h4>
                <p>Go ahead and enter your grades to help recommend your dream course for you. It gives a more accurate recommendation for you.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="coursecat">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Courses Categories</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="categories">
            <h4>Course Categories</h4>
            <ul>
              @foreach($courses as $course)
              <li><a href="#">{{$course->course_name}}</a></li>
              @endforeach
            </ul>
            <div class="main-button-red">
              <a href="meetings.html">Course categories</a>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row">
            @foreach($courses as $course)
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <a href="#"><img src={{asset('images/meeting-01.jpg')}} alt="New Lecturer Meeting"></a>
                </div>
                <div class="down-content">
                  <a href="#">
                    <h4>{{$course->course_name}}</h4>
                    <p>Hello</p>
                  </a>
                  @foreach($holland as $hol)
                  @if($course->id==$hol->course_id)
                  <p>Holland Personality: {{$hol->holland_name}}</p>
                  @endif
                  @endforeach


                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>RECOMMEND UNIVERSITY COURSE NOW</h3>
                <p>Go ahead and join us now to get a recommendation on the desired course you would like.</p>
                <div class="main-button-red">
              <a href="{{ route('login') }}">Join Us Now!</a>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
            <article class="accordion">
              <div class="accordion-head">
                <span>Please tell your friends</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                <p>This site is aimed at especially guiding students who have just completed high school.<br><br> We are aware of the confusion, the indecisiveness and the presure to make up your mind that meets you when you graduate into this new stage.
                    </p>
                </div>
              </div>
            </article>
            <article class="accordion last-accordion">
              <div class="accordion-head">
                <span>Share this to your fellow students</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>All you need is to:<br>
                  1. Create an account<br>
                     Click 'Join In' to log in if you are an existing user or create a new account</p><br>
                  2. Fill in the form<br>
                    <p>When you log in you will see a form to fill in entry of grade and interest.</p>
                    <br>
                  3. Get recommendatiion<br>
                 <p> You will get your course recommendation with univeristies available.</p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>A Few Facts About Our University Course Recommender System</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">{{$courses->count()}}</div>
                    <div class="count-title">Courses Available</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">{{$users->count()}}</div>
                    <div class="count-title">Current users</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content new-students">
                    <div class="count-digit">2345</div>
                    <div class="count-title">highly recommended course</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">32</div>
                    <div class="count-title">the big interest</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src=asset('images/play-icon.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="feedback" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOUR NAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>0701010101</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>ucr@gmail.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Nairobi, 65165</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.ucr.edu</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 U.C.R System. All Rights Reserved. </p>
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