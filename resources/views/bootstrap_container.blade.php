<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>Cars</title>
</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
@include('layouts.navigation')

<!-- Page wraper -->
    <div id="page-wrapper" class="bg-transparent container">

        <!-- Page wrapper -->
    @include('layouts.topnavbar')

    <!-- Main view  -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->
<!-- Get current controller and action names -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

@yield('pagescripts')

@if (\File::exists(public_path('js/pages/'.str_replace('.', '/', Route::currentRouteName()).'.js')))
    <script src="{!! asset('js/pages/'.str_replace('.', '/', Route::currentRouteName()).'.js?v='.time()) !!}" type="text/javascript"></script>
@endif
<script type="text/javascript">
    url = "{{ url('/') }}";
</script>

@section('scripts')
@show

</body>
</html>
