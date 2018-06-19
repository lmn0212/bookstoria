@extends('layouts.master')

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-block w-100 slider-item" style="background-image: url(img/banner1.JPG)">

            </div>
        </div>

        <div class="carousel-item">
            <div class="d-block w-100 slider-item" style="background-image: url(img/banner2.JPG)">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <i class="fas fa-angle-down slider-arrow"></i>
</div>

<div class="container main">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
            <h5>Жанры</h5>
            @include('layouts.sidebar')
        </div>

        <div class="col-12 col-md-8 col-lg-9 content">

            <div class="row justify-content-center wow fadeInUp">

                <div class="col-12">
                    <h2 class="cat-title">Буктрейлеры</h2>
                </div>
                    <div class="regulartrailer slick-slider row">
                        @foreach($tailer as $t)
                        <div>
                            <div class="catalog-book-item">
                                <iframe width="100%" height="auto" src="https://www.youtube.com/embed/{{$t->booktailer}}" frameborder="0" allowfullscreen></iframe>
                                <p class="catalog-item-title">Буктрейлер "{{$t->name}}" | {{$t->author_name}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- блок с каруселью -->
                <div class="row justify-content-center wow fadeInUp">
                    <div class="col-12">
                        <h2 class="cat-title">Новые книги</h2>
                    </div>
                    <!-- карусель внутри след.блока -->
                    <div class="regular slick-slider row">
                        @foreach($books as $book)
                        <div>
                            <div class="catalog-book-item">
                                <a href="/book/{{$book->id}}">
                                    <img src="{{$book->cover}}" width="100%" height="auto">
                                    <p class="catalog-item-title">{{$book->name}} | {{$book->author_name}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



                <!-- блок с каруселью -->
                <div class="row justify-content-center wow fadeInUp">
                    <div class="col-12">
                        <h2 class="cat-title">Обновленные книги</h2>
                    </div>
                    <!-- карусель внутри след.блока -->
                    <div class="regular slick-slider row">
                        @foreach($booksup as $book)
                        <div>
                            <div class="catalog-book-item">
                                <a href="/book/{{$book->id}}">
                                    <img src="{{$book->cover}}" width="100%" height="auto">
                                    <p class="catalog-item-title">{{$book->name}} | {{$book->author_name}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <!-- блок с каруселью -->
                <div class="row justify-content-center wow fadeInUp">
                    <div class="col-12">
                        <h2 class="cat-title">Закончены</h2>
                    </div>
                    <!-- сама карусель -->
                    <div class="regular slick-slider row">
                        @foreach($bookscomp as $book)
                        <div>
                            <div class="catalog-book-item">
                                <a href="/book/{{$book->id}}">
                                    <img src="{{$book->cover}}" width="100%" height="auto">
                                    <p class="catalog-item-title">{{$book->name}} | {{$book->author_name}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- блок с каруселью -->
                <div class="row justify-content-center wow fadeInUp">
                    <div class="col-12">
                        <h2 class="cat-title">Наиболее обсуждаемые</h2>
                    </div>
                    <!-- сама карусель -->
                    <div class="regular slick-slider row">
                        @foreach($com as $book)
                        <div>
                            <div class="catalog-book-item">
                                <a href="/book/{{$book->id}}">
                                    <img src="{{$book->cover}}" width="100%" height="auto">
                                    <p class="catalog-item-title">{{$book->name}} | {{$book->author_name}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <!-- блок с каруселью -->
                <div class="row justify-content-center wow fadeInUp">
                    <div class="col-12">
                        <h2 class="cat-title">Бестселлеры</h2>
                    </div>
                    <!-- сама карусель -->
                    <div class="regular slick-slider row">
                        @foreach($bestsellers as $book)
                            <div>
                                <div class="catalog-book-item">
                                    <a href="/book/{{$book->id}}">
                                        <img src="{{$book->cover}}" width="100%" height="auto">
                                        <p class="catalog-item-title">{{$book->name}} | {{$book->author_name}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 about-text-div">
                <p class="about-text"> <strong>Bookstoria</strong> – это библиотека для любителей сетевой литературы. У нас вы можете <strong>читать книги онлайн,</strong> а также, с разрешения автора, скачивать их. На Bookstoria вы можете найти как платные, так и <strong>бесплатные</strong> книги, а также те истории, которые находятся в процессе написания. Благодаря детально прописанным тэгам, жанрам и подборкам, вы с лёгкостью отыщите интересующие вас книги. Даже если вы не знаете, какую именно книгу ищите – мы поможем вам сделать выбор. <br> Современные любовные романы? Женская проза? Фэнтези? Мистика? Эротические рассказы? Или, быть может, триллеры и детективы? Всё это вы можете найти в нашей библиотеке. <br> Возможно, вы ищите определённый тип героя, например, книги об оборотнях, вампирах, феях, герцогах или королях? В таком случае, вы зашли на правильный ресурс. <br> Как насчёт американских любовных романов и young adult? У нас вы найдёте новые книги, написанные в 2018 году, которые находятся на стадии перевода. <br> Наша самиздат платформа круглосуточно пополняется новыми платными и бесплатными книгами, которые сразу же распределяются по тематическим подборкам, например, книги о пиратах, убийцах, бестселлеры 2018, книги о студентах, книги о подростках, учебные заведения, от ненависти до любви, властный герой, разница в возрасте, маги и колдуны и т.д. <br> Наше главное отличие от других библиотек – мы знаем, как важен при выборе книг визуальный ряд: обложка, образы героев, а также – буктрейлеры. Выбирая книгу, у нас вы можете ориентироваться не только на аннотацию, но и на видео отзывы, видео обзоры и, конечно же, непосредственно буктрейлеры. <br> Если вы любите книги конкретного автора – мы предоставляем вам, читателям, опцию «сделать для автора видео обзор» с согласия автора, и таким образом рассказать о прочитанном в наиболее интересном ключе. Наш BookTube канал не дремлет – мы делаем всё возможное, чтобы ваши любимые книги были не только написаны, но и максимально визуализированы, в том числе – на платформе YouTube. <br> Вы и только вы решаете, какой будет ваша роль в нашей библиотеке. На Bookstoria вы можете загружать собственные книги и зарабатывать на этом, а можете просто наслаждаться чтением новых книг. Вы можете комментировать книги автора, влиять на его рейтинг и поддерживать его, пока ваш любимый писатель работает над очередным шедевром. Кроме того, вы сами можете переводить книги с других языков, и зарабатывать на этом. <br> Выбор книги – это как поиск двери в новый увлекательный мир, и мы поможем вам отыскать интересующую вас дверь. Удачного чтения!</p>
            </div>
        </div>
    </div>

@endsection
