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
                <div class="col-sm-3">
                
                    @include('partials.sidebar')
                    @yield('sidebar')

                </div>
                
                <div class="col-sm-9 padding-right">
                
                    @yield('content-header')
                    @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
@include('partials.footer')
    

@include('partials.script')
@yield('script')
</body>
</html>
