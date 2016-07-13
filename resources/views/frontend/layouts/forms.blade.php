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


    {!! HTML::style('plugins/select2/select2.min.css') !!}

    {!! Html::style('frontend/css/demo.css') !!}   

    @yield('header-style') 
    @yield('header-inline-script') 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="ng-app" ng-app="app">

    <!-- Navigation -->
     @include('frontend.includes.navbar')
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
             
            <div class="col-lg-8">
                 <!-- Blog Post -->

                <!-- Title -->
                <h1> @yield('content-head')</h1>
                <hr>

                    @yield('content')
                <hr>
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                @include('partials.countrylist')
                
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script> 

     <!-- Angular JS -->
     <script src="http://code.angularjs.org/1.1.5/angular.min.js"></script>

     <script src="{!!asset('angularjs/uploader/angular-file-upload.min.js')!!}"></script>
    
     @yield('footer-script')
     
     <script src="{!!asset('angularjs/uploader/controllers.js')!!}"></script>
     
     <!--thumbnails for images-->
     <script src="{!!asset('angularjs/uploader/directives.js')!!}"></script>

     {!! HTML::script('plugins/select2/select2.full.min.js') !!}

     <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
   
    

    @yield('footer-inline-script') 

    <script>
    $(function () {
        $(".select2").select2();        
    });
    </script>
</body>

</html>
