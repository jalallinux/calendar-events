<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="ای پی آی(api) مناسبت(تعطیلی) های تقویم فارسی، دریافت تعطیلی ها و مناسبت های تقویم جلالی یا فارسی به صورت برنامه نویسی">
    <meta name="og:title" property="og:title" content="ای پی آی مناسبت(تعطیلی) های تقویم فارسی">
    <meta property="og:type" content="website"/>


    <title>ای پی آی مناسبت های تقویم فارسی</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel='stylesheet' type='text/css'>


    <!-- Styles -->
    <style>
        @font-face {
            font-family: 'IranNastaliq';
            src: url('{{ asset('css/fonts/IranNastaliq.eot?#') }}') format('eot'),
            url('{{ asset('css/fonts/IranNastaliq.ttf') }}') format('truetype'),
            url('{{ asset('css/fonts/IranNastaliq.woff') }}') format('woff');
        }

        @font-face {
            font-family: Shabnam;
            src: url('{{ asset('css/fonts/shabnam.ttf') }}');
        }

        html, body {
            background-color: #fff;
            color: #636b6f;
            /*font-family: 'Nunito', sans-serif;*/
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: calc(1em + 5vw);
            font-family: IranNastaliq, 'IranNastaliq', tahoma, sans-serif;
        }

        a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .links {
            font-family: Shabnam;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            ای پی آی مناسبت های تقویم فارسی
        </div>

        <div class="links">
            <h2 style="text-align: right; direction: rtl">نحوه استفاده:</h2>
            <pre style="text-align: left">
{{ url('/[type]/[year]/[month]/[day]') }}

type: jalali | gregorian
            </pre>
            <h2 style="text-align: right;  direction: rtl">مثال:</h2>
            <pre style="text-align: left">
{{ url('/jalali/1374/10/12') }}

{{ url('/gregorian/1996/01/02') }}
            </pre>
        </div>
        <br><br><br>
        <br><br><br>
        <a href="mailto:smj.jalalzadeh93@gmail.com" style="text-align: center; font-family: Shabnam; font-size: medium"><i
                class="fas fa-envelope"></i></a>
        <a href="https://www.linkedin.com/in/jalallinux/"
           style="text-align: center; font-family: Shabnam; font-size: medium"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://github.com/jalallinux/calendar-events"
           style="text-align: center; font-family: Shabnam; font-size: medium"><i class="fab fa-github"></i></a>
        <a href="https://www.twitter.com/jalallinux" style="text-align: center; font-family: Shabnam; font-size: medium"><i
                class="fab fa-twitter"></i></a>
    </div>
</div>
</body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118714654-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-118714654-2');
</script>
</html>
