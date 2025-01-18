<!DOCTYPE html>
<html>

<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>User</title>

  <!-- Site favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="https://s3-alpha-sig.figma.com/img/9594/6759/ef1f3eed456f4246c36d550b7f626670?Expires=1735516800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=cZ~4av9Coxr~NM6ErwQ~lJiOHHil6BaCcwvx0BdDBIINyUZXYwRLplv0P2ZS4WmFwwzKya~vEWQOvqapM5qlEpYLVTxQLaHm7SLeegNGEa7JB3s3sbiFNdQTef~fNh6IK4cYU5xuM8ZJ2dVoIRjGl7HVugUoA9BrmdZfadigsdydYPDBn1ANWqMacwqCluu5Pe8KN6zAY4O46LNFNW869VdI6sqD4RnYEseGnKz5Q2Pbf8r5FTpiKUNtHmRueRO899u3OhxrwjJWUutFLYwIfvVXQX6rRMQ-cp1ZqWUsgkT9h-eIvaZNJSWCx-4Ma8Ji7emdRcWtiKlqbw1jPjA-fA__">
  <link rel="icon" type="image/png" sizes="32x32" href="https://s3-alpha-sig.figma.com/img/9594/6759/ef1f3eed456f4246c36d550b7f626670?Expires=1735516800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=cZ~4av9Coxr~NM6ErwQ~lJiOHHil6BaCcwvx0BdDBIINyUZXYwRLplv0P2ZS4WmFwwzKya~vEWQOvqapM5qlEpYLVTxQLaHm7SLeegNGEa7JB3s3sbiFNdQTef~fNh6IK4cYU5xuM8ZJ2dVoIRjGl7HVugUoA9BrmdZfadigsdydYPDBn1ANWqMacwqCluu5Pe8KN6zAY4O46LNFNW869VdI6sqD4RnYEseGnKz5Q2Pbf8r5FTpiKUNtHmRueRO899u3OhxrwjJWUutFLYwIfvVXQX6rRMQ-cp1ZqWUsgkT9h-eIvaZNJSWCx-4Ma8Ji7emdRcWtiKlqbw1jPjA-fA__">
  <link rel="icon" type="image/png" sizes="16x16" href="https://s3-alpha-sig.figma.com/img/9594/6759/ef1f3eed456f4246c36d550b7f626670?Expires=1735516800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=cZ~4av9Coxr~NM6ErwQ~lJiOHHil6BaCcwvx0BdDBIINyUZXYwRLplv0P2ZS4WmFwwzKya~vEWQOvqapM5qlEpYLVTxQLaHm7SLeegNGEa7JB3s3sbiFNdQTef~fNh6IK4cYU5xuM8ZJ2dVoIRjGl7HVugUoA9BrmdZfadigsdydYPDBn1ANWqMacwqCluu5Pe8KN6zAY4O46LNFNW869VdI6sqD4RnYEseGnKz5Q2Pbf8r5FTpiKUNtHmRueRO899u3OhxrwjJWUutFLYwIfvVXQX6rRMQ-cp1ZqWUsgkT9h-eIvaZNJSWCx-4Ma8Ji7emdRcWtiKlqbw1jPjA-fA__">


  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>
</head>

<body style="background-color:rgb(32, 32, 70);">
  <!-- <div class="pre-loader">
    <div class="pre-loader-box">
      <div class="loader-logo"><img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt=""></div>
      <div class='loader-progress' id="progress_div">
        <div class='bar' id='bar1'></div>
      </div>
      <div class='percent' id='percent1'>0%</div>
      <div class="loading-text">
        Loading...
      </div>
    </div>
  </div> -->

  @include('Admin.inc.header')
  @include('Admin.inc.right')
  @include('Admin.inc.left_user')

  <div class="main-container">
    <div class="pd-ltr-20">
      @include($body)
    </div>
  </div>


  @include('Admin.inc.footer')

  <!-- js -->
  <script src="{{ asset('vendors/scripts/core.js') }}"></script>
  <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
  <script src="{{ asset('vendors/scripts/process.js') }}"></script>
  <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
  <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendors/scripts/dashboard.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
  <!-- Datatable Setting js -->




</body>

</html>