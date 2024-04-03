<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('sentuh.jpeg') }}" />
    <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            background: #f0f0f0;
            padding: 20px;
        }

        .canvas-container {
            flex: 1;
            background: #e0e0e0;
        }

        canvas {
            width: 100%;
            height: 100%;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="display:none;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel1.jpg') }}" class="d-block w-100" alt="#">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel2.png') }}" class="d-block w-100" alt="#">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel3.jpg') }}" class="d-block w-100" alt="#">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        <img src="{{ asset('sentuh.jpeg') }}" width="50%" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Layout</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/user" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/login" aria-expanded="false">
                                <span>
                                    <i class="ti ti-login"></i>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/register" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">@yield('title')</h5>
                        @yield('content')
                        <div class="container">
                            <div class="sidebar">
                                <div class="draggable" draggable="true" data-type="carousel">Carousel</div>
                                <div class="draggable" draggable="true" data-type="image">Image</div>
                                <div class="draggable" draggable="true" data-type="video">Video</div>
                            </div>
                            <div class="canvas-container">
                                <canvas id="canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = new fabric.Canvas('canvas');
            resizeCanvas();

            window.addEventListener('resize', resizeCanvas);

            function resizeCanvas() {
                var canvasContainer = document.querySelector('.canvas-container');
                canvas.setDimensions({
                    width: canvasContainer.offsetWidth,
                    height: canvasContainer.offsetHeight
                });
            }

            var draggableElements = document.querySelectorAll('.draggable');
            draggableElements.forEach(function(element) {
                element.addEventListener('dragstart', function(event) {
                    event.dataTransfer.setData('text/plain', event.target.dataset.type);
                });
            });

            var canvasContainer = document.querySelector('.canvas-container');
            canvasContainer.addEventListener('dragover', function(event) {
                event.preventDefault();
            });

            canvasContainer.addEventListener('drop', function(event) {
                event.preventDefault();
                var type = event.dataTransfer.getData('text/plain');
                var position = {
                    x: event.offsetX,
                    y: event.offsetY
                };

                if (type === 'carousel') {
                    // let carousel = new fabric.Rect({
                    //     left: position.x,
                    //     top: position.y,
                    //     width: 100,
                    //     height: 50,
                    //     fill: 'red'
                    // });
                    // canvas.add(carousel);
                    var carouselElement = document.getElementById('carouselExampleIndicators');
                    var carouselImage = carouselElement.querySelector('.carousel-item.active img');
                    var imageUrl = carouselImage.getAttribute('src');
                    fabric.Image.fromURL(imageUrl, function(img) {
                        var canvasWidth = canvasContainer.offsetWidth;
                        var canvasHeight = canvasContainer.offsetHeight;
                        var imageWidth = canvasWidth;
                        var imageHeight = canvasHeight * 0.3;

                        img.set({
                            left: position.x,
                            top: position.y,
                            width: imageWidth,
                            height: imageHeight
                        });
                        canvas.add(img);
                    });
                } else if (type === 'image') {
                    fabric.Image.fromURL("http://localhost:8000/images/image.jpg", function(img) {
                        img.set({
                            left: position.x,
                            top: position.y,
                            scaleX: 0.5,
                            scaleY: 0.5
                        });
                        canvas.add(img);
                    });
                } else if (type === 'video') {
                    fabric.Image.fromURL("http://localhost:8000/images/video.png", function(img) {
                        img.set({
                            left: position.x,
                            top: position.y,
                            scaleX: 0.5,
                            scaleY: 0.5
                        });
                        canvas.add(img);
                    });
                }
            });
            fabric.Image.fromURL("http://localhost:8000/drag.png", function(img) {
                img.set({
                    left: 0,
                    top: 0,
                    scaleX: 0.55,
                    scaleY: 0.3,
                    selectable: false,
                    eventable: false
                });
                canvas.add(img);
            });
            fabric.Image.fromURL("http://localhost:8000/drag.png", function(img) {
                img.set({
                    left: 0,
                    top: 300,
                    scaleX: 0.55,
                    scaleY: 0.3,
                    selectable: false,
                    eventable: false
                });
                canvas.add(img);
            });
            fabric.Image.fromURL("http://localhost:8000/drag.png", function(img) {
                img.set({
                    left: 0,
                    top: 600,
                    scaleX: 0.55,
                    scaleY: 0.3,
                    selectable: false,
                    eventable: false
                });
                canvas.add(img);
            });
        });
    </script>
    <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/dashboard.js') }}"></script>
</body>

</html>
