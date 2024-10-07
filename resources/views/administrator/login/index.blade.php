<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Каталог Автомобилей - Админ. Панель</title>
    <!-- Bootstrap -->
    <link href="/Administrator/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/Administrator/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/Administrator/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/Administrator/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/Administrator/build/css/custom.min.css" rel="stylesheet">
    <link href="/Administrator/build/css/admin.css" rel="stylesheet">
  </head>

  <body class="login">
    <div class="bn-login">
      <div class="bn-login__cont">
        <img src="logo" alt="" class="bn-login__logo">
        <div class="bn-login__form-wr">
          <form method="post" action="{{ route('LoginAdmin') }}" class="bn-login__form">
            <div class="bn-login__inps">
              @csrf
              <div class="bn-login__inp-wr">
                <input type="text" name="email" class="bn-login__inp {{ $errors->has('email') ? 'bn-login__inp_error' : '' }}" placeholder="E-mail" value="{{ old('email') }}">
              </div>
              <div class="bn-login__inp-wr">
                <input type="password" name="password" class="bn-login__inp {{ $errors->has('password') ? 'bn-login__inp_error' : '' }}" placeholder="Пароль" />
              </div>
            </div>
            <div class="bn-login__sub-wr">
            <!-- <button class="btn btn-default submit" href="index.html"></button> -->
              <button href="index.html" class="bn-login__sub">{{ trans('admin.login') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
