<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SFR SOFTWARE</title>

    <link href="/resources/assets/templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/assets/templates/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/resources/assets/templates/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/resources/assets/templates/css/animate.css" rel="stylesheet">
    <link href="/resources/assets/templates/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body>

    <div id="wrapper">
        <div id="app"></div>
        <script src="{{ asset('/js/app.js') }}"></script>

    </div>    

    <!-- Mainly scripts -->
  <!--   <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script> -->

    <!-- Peity -->
    <!-- <script src="js/plugins/peity/jquery.peity.min.js"></script> -->

    <!-- Custom and plugin javascript -->
    <!-- <script src="js/inspinia.js"></script> -->
    <!-- <script src="js/plugins/pace/pace.min.js"></script> -->

    <!-- iCheck -->
    <!-- <script src="js/plugins/iCheck/icheck.min.js"></script> -->

    <!-- Peity -->
    <!-- <script src="js/demo/peity-demo.js"></script> -->

    <!-- <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script> -->

</body>

</html>