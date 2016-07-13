<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Meta::tag('description'); !!}
    {!! Meta::tag('keywords'); !!}
    
    <title>{!! Meta::meta('title')!!}</title>
    <!-- Bootstrap Core CSS -->
    {!! Html::style('frontend/css/bootstrap.min.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('frontend/css/portfolio-item.css') !!}    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    @include('frontend.includes.navbar')

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        @yield('content-head')
       
       @yield('content')
        <hr>

        <!-- Footer -->
         @include('frontend.includes.footer')

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script> 

    <script type="text/javascript">
        
        jQuery('.carousel[data-type="multi"] .item').each(function(){
        var next = jQuery(this).next();
        if (!next.length) {
            next = jQuery(this).siblings(':first');
        }
            next.children(':first-child').clone().appendTo(jQuery(this));

        for (var i=0;i<2;i++) {
         next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo(jQuery(this));
        }
        });

    </script>

     @yield('footer-script')
</body>

</html>
