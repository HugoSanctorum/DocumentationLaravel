<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Hugo SANCTORUM">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>DU WIKI</title>    

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/overlayer.css') }}" rel="stylesheet">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />


        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logoWhite.png') }}">
    </head>
    <body>

        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="{{ route('welcome') }}"><img class="image-logo" src="{{ asset('images/logoWhite.png') }}"></a>
                    <hr/ >
                    <span><b style="color:white;">DU</b> DOCUMENTATION</span>
                </div>

                <ul class="list-unstyled components">
                    <li>
                       <a class="first-range" href="{{ route('welcome') }}"><b style="color:white;">Home</b></a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Wiki</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a class="first-range" href="{{ URL('/section') }}"><b>Wiki Home</b></a>
                            </li>
                            @foreach(App\Section::All() as $section)
                                <li>
                                    <a class="first-range" href="{{ URL('section/'.$section->id) }}">{{ $section->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                       <a class="first-range" href="{{ /*route('contact')*/ '#' }}">Contact</a>
                    </li>
                    <li>
                       <a class="first-range" href="{{ /*route('about')*/ '#'  }}">About</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li><a id="printPDF" href="#" class="download">Download page to PDF</a></li>
                    <li><a href="" onclick="window.print();return false;" class="article">Print Content</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn closeButton">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <div class="navbar-header">
                            <button type="button" class="navbar-btn backButton" onclick="location.href='{{ URL::previous() }}'">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                @guest
                                    <li><a href="{{ route('register') }}">Register a new account</a></li>
                                    <li><a href="{{ route('login') }}">Login to your account</a></li>
                                @else
                                    <li><a href="{{ route('home') }}">Welcome <b>{{ Auth::user()->name }}</b></a></li>
                                @endguest   
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="contentPDF">
                    @yield('content')
                </div>
                <div id="editor"></div>
            </div>


        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>   
        
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('js/search.js') }}" defer></script>
        <script src="{{ asset('js/form.js') }}" defer></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });
        </script>
        <script>
            $(function() {
                $('textarea#froala-editor').froalaEditor()
            });
        </script>
        <script>
            var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

            $('#printPDF').click(function () {
                doc.fromHTML($('#contentPDF').html(), 15, 15, {
                    'width': 170,
                        'elementHandlers': specialElementHandlers
                });
                doc.save('sample-file.pdf');
            });
        </script>
        @yield('scripts')
    </body>
</html>