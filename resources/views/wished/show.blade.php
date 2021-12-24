<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" >
	<title>@section('title')Carte de Voeux Electronique @show</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
@method('css')
    <link href='../../../../fonts.googleapis.com/css8bf7.css?family=Grand+Hotel&amp;&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/theme4.css') }}" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .xs-black-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .wrapper{
            background: url({{ asset('images/bgr/bg-main.jpeg') }}) no-repeat fixed;
            background-repeat: no-repeat;background-size: cover;
            background-position: center center;
height: 100vh;
position:relative;
        }
    </style>
</head>
<body class="wrapper" style="background-color:black;">
    <div class="xs-black-overlay"></div>
    <div >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo"><a href="{{ url('/') }}" title="Holiday Greetings"><img src="{{ asset('images/temp/logo2.png') }}" alt="Holiday Greetings" /></a></div>

        <!--main-->
        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="greeting text">
                            <div class="contact" style="color: white">
                                <div class="wrap">
                                    <h2>{{ $wished->name }}</h2>
                                    <p>
                                        <img src="{{ asset('images/image/lg/' . $wished->image) }}" class="img-fluid" alt="">
                                    </p>
                                    <p class="text-white">{!! $wished->content !!}</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="social-nav red left">
					<ul>
						<li><a href="#" title="" style="background: #ff7900"><span class="tw-icon-facebook"></span></a></li>
						<li><a href="#" title="" style="background: #ff7900"><span class="tw-icon-instagram"></span></a></li>
					</ul>
				</nav>
                <nav class="social-nav red right">
					<ul>
						<li><a href="#" title="" style="background: #ff7900"><span class="tw-icon-dropbox"></span></a></li>
					</ul>
				</nav>
        </main>
                </div>
            </div>
        </div>
    </div>

    </div>
	<!--contact-->
	<!--//contact-->

@method('scrip')
	<script src="../../../../code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/jquery.lettering.js') }}"></script>
	<script src="{{ asset('js/jquery.textillate.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
	<script>
		$(function () {
		$('.text h1').textillate();
	})
	</script>
</body>