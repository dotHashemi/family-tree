<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ورود به پنل شجره‌نامه</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link
        href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.3/Round-Dots/misc/UI-Farsi-Digits/Vazirmatn-RD-UI-FD-font-face.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/panel.css">
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-5 col-sm-10">

                <h3 class="text-center my-3">
                    پنل کاربری شجره‌نامه
                </h3>

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input name="phone" type="text" class="form-control" id="input-username">
                        <label for="input-username">نام کاربری</label>
                    </div>
                    <div class="form-floating">
                        <input name="password" type="password" class="form-control" id="input-password">
                        <label for="input-password">کلمه‌ی عبور</label>
                    </div>

                    <div class="my-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">ورود</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</body>

</html>
