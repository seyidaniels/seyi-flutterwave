<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta charset="utf-8">
  <title>Flutterwave Technical Test 2019</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="assets\plugins\pace\pace-theme-flash.css" rel="stylesheet" type="text/css">
  <link href="assets\plugins\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets\plugins\font-awesome\css\font-awesome.css" rel="stylesheet" type="text/css">
  <link href="assets\plugins\jquery-scrollbar\jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen">
  <link href="pages\css\pages-icons.css" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="pages\css\pages.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="pages/css/hover-min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <link rel="stylesheet" href="https://unpkg.com/vue2-animate/dist/vue2-animate.min.css"/>


  <script type="text/javascript">
    window.onload = function () {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
  </script>
</head>

<body class="fixed-header ">


        <div id="app"></div>



  <script src="assets\plugins\jquery\jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="assets\plugins\modernizr.custom.js" type="text/javascript"></script>
  <script src="assets\plugins\jquery-ui\jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets\plugins\popper\umd\popper.min.js" type="text/javascript"></script>
  <script src="assets\plugins\bootstrap\js\bootstrap.min.js" type="text/javascript"></script>
  <script src="assets\plugins\jquery\jquery-easy.js" type="text/javascript"></script>
  <script src="pages\js\pages.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
  <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

  <style>
  .btn-primary {
      background: #EAA844;
      border-color: white;
  }
  .btn-primary:hover {
     background: #EAA844;
           border-color: white;
  }
  .btn-default {
      background: #e6eaee;
     border-color: white;

  }

   .btn-default:hover {
      background: #e6eaee;
     border-color: white;

  }

  .big-input {
  padding: 30px;
  width: 500px;
  font-size: 20px;
}


  </style>


  <script>
    $(function () {
      $('#form-lock').validate()
    })
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://unpkg.com/vue2-transitions@0.3.0/dist/vue2-transitions.min.js"></script>

        <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
