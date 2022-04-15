<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Đại Thư Viện - Website chia sẽ mọi thứ trên đời" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://daithuvien.com" />
        <title>Đại Thư Viện | {{$title}}</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}" />
        <!-- END: CSS Assets-->
        <link rel="shortcut icon" href="{{ asset('admin/assets/logos/logo.ico') }}" />
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
        <!-- BEGIN: Mobile Menu -->
        @include('admin.partials.mobile_menu')
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        @include('admin.partials.topbar')
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        @include('admin.partials.top_menu')
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            @yield('content')
        </div>
        <!-- END: Content -->
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('admin/assets/js/app.js') }}"></script>
        
        <!-- END: JS Assets-->
    </body>
</html>