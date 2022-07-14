<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ Session::token() }}">
    {{--
    <link href="/css/app.css" rel="stylesheet"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/6d51c26809.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"> </script>
    <script src="https://kit.fontawesome.com/347b9e054d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}

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
        $(document).ready(function(){
            $(".flash").fadeOut(6000);

        });
    </script>
</head>

<body>
    @yield('layoutContent')
</body>

</html>