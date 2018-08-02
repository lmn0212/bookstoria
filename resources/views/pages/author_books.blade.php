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
                    @if($user)
                        <h2 class="cat-title">{{$user->name}}</h2>
                    @else
                        <h2 class="cat-title">Не найден автор в базе</h2>
                    @endif
                </div>
                @foreach($books as $book)
                    @if($book->public == '1')
                        <div class="row wow mar-15 fadeInUp justify-content-center">
                            <div class="col-5 col-md-3 catalog-item-col">
                                <a href="/book/{{$book->id}}">
                                    <div class="catalog-book-item">
                                        <img src="/{{$book->cover}}" width="100%" height="auto">
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-md-9">
                                <a href="/book/{{$book->id}}">
                                    <h4 class="book-title">
                                        {{$book->name}}
                                    </h4>
                                </a>

                                @php
                                    $authors = explode(", ", $book->author_name);
                                @endphp
                                @if(count($authors))
                                    <h6 class="book-title">
                                        @foreach($authors as $author)
                                            <a href="{{route('author_books', ['author_name'=>$author])}}">{{$author}}</a>{{($loop->last)?'':', '}}
                                        @endforeach
                                    </h6>
                                @else
                                    <h6 class="book-title">
                                        <a href="{{route('author_books', ['author_name'=>$book->author_name])}}"></a>
                                    </h6>
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
                                        <i class="fas fa-eye"></i> <span>{{$book->count_views}}</span>
                                        <i class="fas fa-comments"></i> <span> {{$book->comments->count()}}</span>
                                        <i class="fas fa-bookmark"></i> <span> {{$book->libraries->count()}}</span>
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
        {{$books->links()}}
    </ul>

@endsection