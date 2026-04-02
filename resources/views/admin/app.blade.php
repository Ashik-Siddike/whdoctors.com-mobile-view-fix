<!DOCTYPE html>
<html lang="en">
<head>
    <title>WH Doctors || @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Meta data -->
    <meta name="author" content="WH Doctors" />
    <meta name="description" content="@yield('seo_description')"/>
    <meta name="Resource-type" content="@yield('seo_resource_type')" />
    <meta name="keywords" content="@yield('seo_keywords')">


    <link rel="image_src" href="@yield('seo_image')"/>

{{--	<meta name="keywords" content="WH doctors">--}}
{{--	<meta name="author" content="WH doctors">--}}
{{--	<meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--	<meta name="description" content="WH doctors">--}}
{{--	<meta property="og:title" content="WH doctors">--}}
{{--	<meta property="og:description" content="WH doctors">--}}
{{--	<meta name="format-detection" content="telephone=no">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-y8DjN49yO6WyMWNnVG9k+Kpij9LQieLtVZ7U5+Ue2zVV0NNfwD9C07SkcRBxD/TG0ayJAl9+ydhs0uCRHkP5Yg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- PAGE TITLE HERE -->
	<title>@yield('title')</title>

    @include('admin.includes.favicon')


    @include('admin.includes.styles')
    @stack('custom-style')

     <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
         <link rel='stylesheet' href="css/ie/ie8.css">
     <![endif]-->

</head>
<body>
    <div id="main-wrapper">
        @include('admin.includes.sidebar')

        <div class="content scrollbar" id="fullpage">
            @include('admin.includes.header')
            <div class="content-body">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    @include('admin.includes.scripts')
    @stack('custom-scripts')
    <script>
        function confirmDeletion(url) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                }
            });
        }
    </script>

</body>
</html>
