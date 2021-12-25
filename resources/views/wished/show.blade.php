<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>@section('title')Carte de Voeux Electronique @show</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    @method('css')
    <link href='../../../../fonts.googleapis.com/css8bf7.css?family=Grand+Hotel&amp;&amp;subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme4.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fa/css/all.min.css') }}">
    <style>
        .wrapper {
            background: url({{ asset('images/bgr/bg-main.jpeg') }}) no-repeat fixed;
            position: relative;
            z-index: 1;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }

        .wrapper:before, .wrapper:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            opacity: .3;
            z-index: -1;
        }

        .social-nav ul {
            padding-left: 0 !important;
        }
    </style>
</head>
<body>
<div>
    <div class="wrapper" id="wrapper" >
        <div class="container" id="black-container" >
            <div class="row">
                <div class="col-12">
                    <div class="logo">
                        <a href="{{ url('/') }}" title="Holiday Greetings">
                            <img src="{{ asset('images/temp/logo2.png') }}" alt="Holiday Greetings"/></a>
                    </div>

                    <!--main-->
                    <main class="main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4">
                                    <div class="greeting text">
                                        <div class="contact" style="color: white">
                                            <div class="wrap">
                                                <h2 style="color: #ff7900;font-weight: bold;text-align: center">{{ $wished->name }}</h2>
                                                <p>
                                                    <img src="{{ asset('images/image/lg/' . $wished->image) }}"
                                                         class="img-fluid" alt="">
                                                </p>
                                                <p class="text-white"
                                                   style="font-family: 'Imperial Script', cursive;    font-size: 3.2em;color: #fff;text-align: center;line-height: 30px;">{!! $wished->content !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav class="social-nav red left">
                            <ul>
                                {!! $links !!}
                            </ul>
                        </nav>
                        <nav class="social-nav red right">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" onclick="generate();" style="background: #ff7900">
                                        <span class="fas fa-download"></span>
                                    </a>
                                </li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/jquery.lettering.js') }}"></script>
<script src="{{ asset('js/jquery.textillate.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>

    (function (exports) {
        function urlsToAbsolute(nodeList) {
            if (!nodeList.length) {
                return [];
            }
            var attrName = 'href';
            if (nodeList[0].__proto__ === HTMLImageElement.prototype || nodeList[0].__proto__ === HTMLScriptElement.prototype) {
                attrName = 'src';
            }
            nodeList = [].map.call(nodeList, function (el, i) {
                var attr = el.getAttribute(attrName);
                if (!attr) {
                    return;
                }
                var absURL = /^(https?|data):/i.test(attr);
                if (absURL) {
                    return el;
                } else {
                    return el;
                }
            });
            return nodeList;
        }

        function screenshotPage() {
            var wrapper = document.getElementById('wrapper');
            $('#black-container').css('background-color', 'black');

            html2canvas(wrapper, {
                onrendered: function (canvas) {
                    canvas.toBlob(function (blob) {

                        saveAs(blob, 'Carte de Voeux Electronique de {{ $wished->name }}.jpg');
                        $('#black-container').css('background-color', 'transparent');
                    });
                }
            });
        }

        function addOnPageLoad_() {
            window.addEventListener('DOMContentLoaded', function (e) {
                var scrollX = document.documentElement.dataset.scrollX || 0;
                var scrollY = document.documentElement.dataset.scrollY || 0;
                window.scrollTo(scrollX, scrollY);
            });
        }

        function generate() {
            screenshotPage();
        }

        exports.screenshotPage = screenshotPage;
        exports.generate = generate;
    })(window);

    $(function () {
        $('.text h1').textillate();
    })
</script>
</body>
