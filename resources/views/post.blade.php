<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <!-- Scripts -->
    @vite([
        'resources/sass/app.scss',
        'resources/sass/styles.sass',
        'resources/js/app.js'
    ])
</head>
<body>
    <!-- Logo -->
    <nav class="navbar navbar-light bg-main">
        <div class="container p-2">
            <a class="navbar-brand m-auto" href="#">
                <img src="{{ Vite::asset('resources/images/blog/logo.png') }}" height="80" alt="" loading="lazy">
            </a>
        </div>
    </nav>
    <!-- Contenido -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>CSS3 con Javascript</h1>
                <hr>
                <img src="{{ Vite::asset('resources/images/blog/7.png') }}" alt="Post Javascript" class="img-fluid">

                <p class="text-left mt-3 post-txt">
                    <span>Autor: YouDevs</span>
                    <span class="float-right">Publicado: Hace 2 semanas</span>
                </p>
                <p class="text-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eaque nemo accusantium libero hic repellat corporis assumenda
                    debitis adipisci modi expedita inventore vel excepturi,
                    facere animi accusamus? Voluptatem ab ad harum?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eaque nemo accusantium libero hic repellat corporis assumenda
                    debitis adipisci modi expedita inventore vel excepturi,
                    facere animi accusamus? Voluptatem ab ad harum?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eaque nemo accusantium libero hic repellat corporis assumenda
                    debitis adipisci modi expedita inventore vel excepturi,
                    facere animi accusamus? Voluptatem ab ad harum?
                </p>
                <p class="text-left post-txt"><i>Categoría: Desarrollo web</i></p>
            </div>

            <!-- Entradas recientes -->
            <div class="col-md-3 offset-md-1">
                <p>Últimas entradas</p>
                <div class="row mb-4">
                    <div class="col-4 p-0">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/images/blog/3.png') }}" class="img-fluid rounded" width="100" alt="">
                        </a>
                    </div>
                    <div class="col-7 pl-0">
                        <a href="#" class="link-post">Aprende Python en un dos tres</a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-4 p-0">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/images/blog/5.png') }}" class="img-fluid rounded" width="100" alt="">
                        </a>
                    </div>
                    <div class="col-7 pl-0">
                        <a href="#" class="link-post">PHP sigue vivito y coleando</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Posts relacionados -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-10 text-center">
                <h2>Entradas relacionadas</h2>
                <hr class="post-hr">

                <!-- 3 posts-->
                <div class="row text-center">
                    <!-- Post 1 -->
                    <div class="col-md-6 col-lg-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{ Vite::asset('resources/images/blog/3.png') }}" alt="Post Python">
                            <div class="card-body">
                                <small class="card-txt-category">Categoría: Programación</small>
                                <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                                <div class="d-card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                    eius corrupti nulla veniam, molestias nemo repudiandae?
                                </div>
                                <a href="#" class="post-link"><b>Leer más</b></a>
                                <hr>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <span class="card-txt-author">YouDevs</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span class="card-txt-date">Hace 2 semanas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post 2 -->
                    <div class="col-md-6 col-lg-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{ Vite::asset('resources/images/blog/3.png') }}" alt="Post Python">
                            <div class="card-body">
                                <small class="card-txt-category">Categoría: Programación</small>
                                <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                                <div class="d-card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                    eius corrupti nulla veniam, molestias nemo repudiandae?
                                </div>
                                <a href="#" class="post-link"><b>Leer más</b></a>
                                <hr>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <span class="card-txt-author">YouDevs</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span class="card-txt-date">Hace 2 semanas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post 3 -->
                    <div class="col-md-6 col-lg-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{ Vite::asset('resources/images/blog/3.png') }}" alt="Post Python">
                            <div class="card-body">
                                <small class="card-txt-category">Categoría: Programación</small>
                                <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                                <div class="d-card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                    eius corrupti nulla veniam, molestias nemo repudiandae?
                                </div>
                                <a href="#" class="post-link"><b>Leer más</b></a>
                                <hr>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <span class="card-txt-author">YouDevs</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span class="card-txt-date">Hace 2 semanas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Footer -->
    <footer class="container-fluid bg-main">
        <div class="row text-center p-4">
            <div class="mb-3">
                <img src="{{ Vite::asset('resources/images/blog/logo.png') }}" alt="Strategying logo" width="120" id="logofooter">
            </div>
            <div id="col-md-10">
                <a href="https://www.facebook.com/strategying" target="_blank">
                    <img src="{{ Vite::asset('resources/images/blog/facebook.png') }}" class="img-fluid" width="40px" alt="facebook Strategying">
                </a>
                <a href="https://www.twitter.com/NewStrategying" target="_blank">
                    <img src="{{  Vite::asset('resources/images/blog/twitter.png')  }}" class="img-fluid" width="40px" alt="instagram Strategying">
                </a>
                <a href="https://www.youtube.com/channel/UC5PR7A_FBSiFl_4PVkBx--A" target="_blank">
                    <img src="{{ Vite::asset('resources/images/blog/youtube.png') }}" class="img-fluid" width="50px" alt="youtube Strategying">
                </a>
                <p class="mt-3">Copyright © 2023 Strategying, Blog. <br> Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>