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
                    <h2 class="cat-title">Поиск</h2>
                </div>
                @foreach($cat as $book)
                    <div class="row wow fadeInUp justify-content-center">
                        <div class="col-5 col-md-3 catalog-item-col">
                            <div class="catalog-book-item">
                                <a href="/book/{{$book->id}}">
                                    <img src="/{{$book->cover}}" width="100%" height="auto">
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-9">
                            <a href="/book/{{$book->id}}"><h4 class="book-title">{{$book->name}}</h4></a>

                            @if($book->author_id)
                                <a href="{{route('author_books', ['id'=>$book->author_id])}}">
                                    <h6 class="book-title">{{$book->author_name}}</h6>
                                </a>
                            @else
                                <h6 class="book-title">{{$book->author_name}}</h6>
                            @endif

                            <p>{!! str_limit($book->annotation,300) !!} <a href="/book/{{$book->id}}" class="read-more">Подробнее</a>
                            </p>
                            <p class="book-tags"><strong>Жанры:</strong>
                                @foreach($book->categories as $cat)
                                    <a href="/category/{{$cat->id}}">
                                        <span class="btn btn-light"> {{$cat->name}} </span>
                                    </a>
                                @endforeach
                            </p>
                            <p class="book-tags"><strong>Темматические подборки:</strong>
                                @foreach($book->collections as $cat)
                                    <a href="/collections/{{$cat->id}}">
                                        <span class="btn btn-light">{{$cat->name}}</span>
                                    </a>
                                @endforeach
                            </p>
                            <div class="blog-panel">
                                <div class="blog-stat">
                                    <i class="fas fa-eye"></i> <span> {{$book->count_views}}</span>
                                    <i class="fas fa-comments"></i> <span> {{$book->comments->count()}}</span>
                                    <i class="fas fa-bookmark"></i> <span> {{$book->libraries->count()}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <ul class="pagination justify-content-end  wow fadeInUp ">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Предыдущая</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Следующая</a>
        </li>
    </ul>

@endsection