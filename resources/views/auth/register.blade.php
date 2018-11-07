<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="/resources/assets/templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/assets/templates/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/resources/assets/templates/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/resources/assets/templates/css/animate.css" rel="stylesheet">
    <link href="/resources/assets/templates/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SRF SOFTWARE</h1>

            </div>
            <h3>Register to SRF SOFTWARE MEMBER</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="{{ route('auth.register.register') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password'" placeholder="Password" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('auth.login.login') }}">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/resources/assets/templates/js/jquery-2.1.1.js"></script>
    <script src="/resources/assets/templates/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/resources/assets/templates/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
