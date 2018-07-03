@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                <h5>Жанры</h5>
                @include('layouts.sidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 content">
                <div class="col-12">
                    <h2 class="cat-title">Все жанры</h2>
                </div>

                @foreach($books as $c)
                    @if(isset($c) && !empty($c) && $c->public == '1')

                            <div class="row wow mar-15 fadeInUp justify-content-center">
                                <div class="col-5 col-md-3 catalog-item-col">
                                    <a href="/book/{{$c->id}}">
                                        <div class="catalog-book-item">
                                            <img src="/{{$c->cover}}" width="100%" height="auto">
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-md-9">
                                    <a href="/book/{{$c->id}}"><h4 class="book-title">{{$c->name}}</h4></a>
                                    <h6 class="book-title">{{$c->author_name}}</h6>
                                    <p>{!! str_limit($c->annotation,300) !!} <a href="/book/{{$c->id}}" class="read-more">Подробнее</a>
                                    </p>
                                    <p class="book-tags"><strong>Жанры:</strong>
                                        @foreach($c->categories as $cat)
                                            <a href="/category/{{$cat->id}}">
                                                <span class="btn btn-light"> {{$cat->name}} </span>
                                            </a>
                                        @endforeach
                                    </p>
                                    <p class="book-tags"><strong>Темматические подборки:</strong>
                                        @foreach($c->collections as $cat)
                                            <a href="/collections/{{$cat->id}}">
                                                <span class="btn btn-light">{{$cat->name}}</span>
                                            </a>
                                        @endforeach
                                    </p>
                                    <div class="blog-panel">
                                        <div class="blog-stat">
                                            <i class="fas fa-eye"></i> <span>{{$c->count_views}}</span>
                                            <i class="fas fa-comments"></i> <span> {{$c->comments->count()}}</span>
                                            <i class="fas fa-bookmark"></i> <span> {{$c->libraries->count()}}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    @endif
                @endforeach


            </div>
        </div>
    </div>

    <ul class="pagination justify-content-end  wow fadeInUp ">
        {{ $books->links()}}
    </ul>

@endsection