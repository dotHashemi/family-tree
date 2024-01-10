<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Family Tree</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link href="https://css.gg/css" rel="stylesheet" />
    <link
        href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.3/Round-Dots/misc/UI-Farsi-Digits/Vazirmatn-RD-UI-FD-font-face.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/panel.css">
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-3">
                @include('panel.layouts.sidebar')
            </div>

            <div class="col-9">
                @yield('content')
            </div>

        </div>
    </div>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap-bundle.js"></script>
</body>

</html>
