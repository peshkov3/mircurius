<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | @yield('title', 'E-Shopper')</title>
    @include('partials.style')
    @yield('style')
</head><!--/head-->

<body>

@include('partials.header')
@yield('slider')

 
    <section>
        <div class="container">
            <div class="row">

                @yield('content-header')
                @yield('content')

            </div>
        </div>
    </section>
    
@include('partials.footer')
    

@include('partials.script')
@yield('script')
</body>
</html>
