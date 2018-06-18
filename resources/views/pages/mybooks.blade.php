@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                @include('pages.usersidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 content">
                <div class="col-12">
                    <h2 class="cat-title">Мои книги</h2>
                </div>
                <div class="col-md-12 cat-title">
                    <a href="/home" class="btn btn-primary">Добавить книгу</a>
                </div>
                @foreach($books as $book)
                    <div class="row wow fadeInUp justify-content-center">
                        <div class="col-5 col-md-3 catalog-item-col">
                            <div class="catalog-book-item">
                               <a href="/book/{{$book->id}}">
                                   <img src="{{$book->cover}}" width="100%" height="auto">
                               </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-9">
                            <a href="/book/{{$book->id}}"><h4 class="book-title">{{$book->name}}</h4></a>
                            <h6 class="book-title">{{$book->author_name}}</h6>
                            <p>{!! $book->annotation !!} <a href="/book/{{$book->id}}" class="read-more">Подробнее</a>
                            </p>
                            <p class="book-tags"><strong>Жанры:</strong> Проза, Фанфик.</p>
                            <p class="book-tags"><strong>Темматические подборки:</strong> Попаданцы, юмор</p>
                            <div class="blog-panel">
                                <div class="blog-stat">
                                    <i class="fas fa-eye"></i> <span> {{$book->count_views}}</span>
                                    <i class="fas fa-comments"></i> <span> {{$book->comments->count()}}</span>
                                    <i class="fas fa-bookmark"></i> <span> {{$book->libraries->count()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row catalog-item-col">
                            <div class="col-md-4"><a class="btn btn-primary" href="/chapter/edit/{{$book->id}}">Добавить главу</a></div>
                            <div class="col-md-4"><a class="btn btn-warning" href="/book/edit/{{$book->id}}">Редактировать</a></div>
                            <div class="col-md-4"><a class="btn btn-danger" href="/book/delete/{{$book->id}}">Удалить</a></div>
                        </div>
                    </div>
                    <ul class="pagination justify-content-end  wow fadeInUp ">
                        {{ $books->links()}}
                    </ul>
                @endforeach
            </div>
        </div>
    </div>



@endsection